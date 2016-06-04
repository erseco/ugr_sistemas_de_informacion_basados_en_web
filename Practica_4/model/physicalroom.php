<?php
/*******************************************
 *
 * 2016 - Sistemas de Informacion Basados en Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * Nikolai Giovanni González López <nigolo@correo.ugr.es>
 *
 *
 *******************************************
 *
 *  Esta clase permite gestionar la tabla de la entidad indicada
 *
 ******************************************************************************/
?>
<?php

class Physicalroom extends Model {

	// Atributos
	public $id;

	public $id_room;
	public $number;

	// Esta función obtiene todos los usuarios de la base de datos
	public static function all()
	{

		$sql = "SELECT
					r.*
				FROM
					physicalrooms r
				ORDER BY r.id ASC";

		return Model::fetchAll($sql, __CLASS__);
	}

	public static function byId($id)
	{
		$sql = "SELECT
					r.*
				FROM
					physicalrooms r
				WHERE
					r.id = ?";

		return Model::fetch($sql, __CLASS__, $id);
	}

	public static function byIdRoom($id_room)
	{
		$sql = "SELECT
					r.*
				FROM
					physicalrooms r
				WHERE
					r.id_room = ?";

		return Model::fetchAll($sql, __CLASS__, $id_room);
	}


	// Esta función inserta el registro actual en la base de datos
	public function insert() {

		// Hacemos sendos insert en una transacción
        $sql = "INSERT INTO physicalrooms
                    (id_room, number)
                VALUES
                    (:id_room, :number);";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":id_room", $this->id_room);
        $statement->bindValue(":number", $this->number);

        $statement->execute();

        $this->id = Db::getInstance()->lastInsertId();
		return $this->id;
	}

	// Esta función actualiza el registro actual (definido por el id)
	public function update()
	{
		// Actualiza
        $sql = "UPDATE physicalrooms
                SET
                    id_room = :id_room,
                    number = :number
                WHERE id = :id;";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":id", $this->id);
        $statement->bindValue(":id_room", $this->id_room);
        $statement->bindValue(":number", $this->number);

        return $statement->execute();
	}

	// Esta función borra el registro actual
	public function delete()
	{

		$sql = "DELETE FROM physicalrooms r
 				WHERE r.id= ?";

		$data = array(
			$this->id
		);

		$sth = Db::getInstance()->prepare($sql);
		return $sth->execute($data);
	}

}