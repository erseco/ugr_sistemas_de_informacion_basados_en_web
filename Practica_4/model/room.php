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

class Room extends Model {

	// Atributos
	public $id;

	public $price;
	public $name;
	public $description;

	// Esta función obtiene todos los usuarios de la base de datos
	public static function all()
	{

		$sql = "SELECT
					r.*,
					l.*
				FROM
					rooms r, rooms_lang l
				WHERE
					r.id = l.id AND l.id_lang = ".ID_LANG."
				ORDER BY r.id ASC";

		return Model::fetchAll($sql, __CLASS__);
	}

	// Esta función obtiene la fila del usuario indicado como parámetro
	public static function byId($id)
	{
		$sql = "SELECT
					r.*,
					l.*
				FROM
					rooms r, rooms_lang l
				WHERE
					r.id = l.id AND l.id_lang = ".ID_LANG." AND r.id = ?";

		return Model::fetch($sql, __CLASS__, $id);
	}

	// Esta función inserta el registro actual en la base de datos
	public function insert() {

		// Hacemos sendos insert en una transacción
        $sql = "BEGIN;
                INSERT INTO room
                    (price)
                VALUES
                    (:price);
                INSERT INTO room_lang
                    (id, id_lang, name, description)
                VALUES
                    (LAST_INSERT_ID(), :id_lang, :name, :description);
                COMMIT;";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":price", $this->price);
        $statement->bindValue(":name", $this->name);
        $statement->bindValue(":description", $this->description);
        $statement->bindValue(":id_lang", ID_LANG);

        $statement->execute();

        $this->id = Db::getInstance()->lastInsertId();
		return $this->id;
	}

	// Esta función actualiza el registro actual (definido por el id)
	public function update()
	{
		// Actualiza
        $sql = "BEGIN;
                UPDATE rooms
                SET
                    price = :price
                WHERE id = :id;
                INSERT INTO rooms_lang
                    (id, id_lang, name, description)
                VALUES
                    (:id, :id_lang, :name, :description)
                ON DUPLICATE KEY UPDATE name = :name, description = :description;
                COMMIT;";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":id", $this->id);
        $statement->bindValue(":price", $this->price);
        $statement->bindValue(":name", $this->name);
        $statement->bindValue(":description", $this->description);
        $statement->bindValue(":id_lang", ID_LANG);

        return $statement->execute();
	}

	// Esta función borra el registro actual
	public function delete()
	{

		$sql = "DELETE r, l from rooms r
 				JOIN rooms_lang l ON r.id = l.id
 				WHERE r.id= ?";

		$data = array(
			$this->id
		);

		$sth = Db::getInstance()->prepare($sql);
		return $sth->execute($data);
	}

}