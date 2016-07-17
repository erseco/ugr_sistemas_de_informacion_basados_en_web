<?php
/*******************************************
 *
 * 2016 - Sistemas de Informacion Basados en Web
 * Grado en Ingenier�a Inform�tica
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * Nikolai Giovanni Gonz�lez L�pez <nigolo@correo.ugr.es>
 *
 *
 *******************************************
 *
 *  Esta clase permite gestionar la tabla de la entidad indicada
 *
 ******************************************************************************/
?>
<?php

class Language extends Model {

    // Atributos
    public $id;

    public $code;

    // Esta funci�n obtiene todos los usuarios de la base de datos
    public static function all()
    {

        $sql = "SELECT
                    l.*
                FROM
                    languages l
                ORDER BY l.id ASC";

        return Model::fetchAll($sql, __CLASS__);
    }

    // Esta funci�n obtiene la fila del usuario indicado como par�metro
    public static function byId($id)
    {
        $sql = "SELECT
                    l.*
                FROM
                    languages l
                WHERE
                    l.id = ?";

        return Model::fetch($sql, __CLASS__, $id);
    }

   // Esta funci�n inserta el registro actual en la base de datos
    public function insert() {

        $sql = "INSERT INTO language
                    (code)
                VALUES
                    (:code);";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":code", $this->code);

        $statement->execute();

        $this->id = Db::getInstance()->lastInsertId();
        return $this->id;
    }

    // Esta funci�n actualiza el registro actual (definido por el id)
    public function update()
    {
        // Actualiza
        $sql = "UPDATE language
                SET
                    code = :code
                WHERE id = :id;";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":id", $this->id);
        $statement->bindValue(":code", $this->code);

        return $statement->execute();
    }

    // Esta funci�n borra el registro actual
    public function delete()
    {

        $sql = "DELETE FROM languages
                WHERE
                    id = ?";

        $data = array(
            $this->id
        );

        $sth = Db::getInstance()->prepare($sql);
        return $sth->execute($data);
    }

}