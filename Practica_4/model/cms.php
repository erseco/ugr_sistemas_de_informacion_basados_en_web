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

class Cms extends Model {

	// Atributos
	public $id;

	public $name;
	public $value;

	// Esta función obtiene todos los usuarios de la base de datos
	public static function all()
	{

		$sql = "SELECT
					c.*,
					l.*
				FROM
					cms c, cms_lang l
				WHERE
					c.id = l.id AND l.id_lang = ".ID_LANG."
				ORDER BY c.id ASC";

		return Model::fetchAll($sql, __CLASS__);
	}

	// Esta función obtiene la fila del usuario indicado como parámetro
	public static function byId($id)
	{
		$sql = "SELECT
					c.*,
					l.*
				FROM
					cms c, cms_lang l
				WHERE
					c.id = l.id AND l.id_lang = ".ID_LANG." AND c.id = ?";

		return Model::fetch($sql, __CLASS__, $id);
	}

	// Esta función obtiene la fila del usuario indicado como parámetro
	public static function byName($name)
	{
		$sql = "SELECT
					c.*,
					l.*
				FROM
					cms c, cms_lang l
				WHERE
					c.id = l.id AND l.id_lang = ".ID_LANG." AND c.name = ?";

		return Model::fetch($sql, __CLASS__, $name);
	}

	// Esta función inserta el registro actual en la base de datos
	public function insert() {

		// Hacemos sendos insert en una transacción
        $sql = "BEGIN;
                INSERT INTO cms
                    (name)
                VALUES
                    (:name);
                INSERT INTO cms_lang
                    (id, id_lang, value)
                VALUES
                    (LAST_INSERT_ID(), :id_lang, :value);
                COMMIT;";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":name", $this->name);
        $statement->bindValue(":value", $this->value);
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
                UPDATE cms
                SET
                    name = :name
                WHERE id = :id;
                INSERT INTO cms_lang
                    (id, id_lang, value)
                VALUES
                    (:id, :id_lang, :value)
                ON DUPLICATE KEY UPDATE value = :value;
                COMMIT;";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":id", $this->id);
        $statement->bindValue(":name", $this->name);
        $statement->bindValue(":value", $this->value);
        $statement->bindValue(":id_lang", ID_LANG);

        return $statement->execute();
	}

	// Esta función borra el registro actual
	public function delete()
	{

		$sql = "DELETE s, l from cms s
 				JOIN cms_lang l ON s.id = l.id
 				WHERE s.id= ?";

		$data = array(
			$this->id
		);

		$sth = Db::getInstance()->prepare($sql);
		return $sth->execute($data);
	}

}