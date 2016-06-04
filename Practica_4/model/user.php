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

class User extends Model {

	// Atributos
	public $id;

	public $email;
	public $password;
	public $role;
	public $date_add;
	public $name;
	public $phone;

	// Esta función obtiene todos los usuarios de la base de datos
	public static function all()
	{

		$sql = "SELECT
					u.*
				FROM
					users u
				ORDER BY u.id ASC";

		return Model::fetchAll($sql, __CLASS__);
	}

	// Esta función obtiene la fila del usuario indicado como parámetro
	public static function byId($id)
	{
		$sql = "SELECT
					u.*
				FROM
					users u
				WHERE
					u.id = ?";

		return Model::fetch($sql, __CLASS__, $id);
	}

	public static function byEmail($email)
	{
		$sql = "SELECT
					u.*
				FROM
					users u
				WHERE
					u.email = ?";

		return Model::fetch($sql, __CLASS__, $email);
	}

	// Esta función inserta el registro actual en la base de datos
	public function insert() {

		// Hacemos sendos insert en una transacción
        $sql = "INSERT INTO users
                    (email, password, role, name, phone)
                VALUES
                    (:email, :password, :role, :name, :phone);";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":email", $this->email);
		$statement->bindValue(":password", md5($this->password));
        $statement->bindValue(":role", $this->role);
        $statement->bindValue(":name", $this->name);
		$statement->bindValue(":phone", $this->phone);

        $statement->execute();

        $this->id = Db::getInstance()->lastInsertId();
		return $this->id;


	}

	// Esta función actualiza el registro actual (definido por el id)
	public function update()
	{
		// Actualiza
        $sql = "UPDATE user
                SET
                    email = :email,
					password, :password,
					role = :role,
					date_add = :date_add,
					name = :name,
					phone = :phone,
                WHERE id = :id;";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":email", $this->email);
		$statement->bindValue(":password", md5($this->password));
        $statement->bindValue(":role", $this->role);
		$statement->bindValue(":date_add", $this->date_add);
        $statement->bindValue(":name", $this->name);
		$statement->bindValue(":phone", $this->phone);

        return $statement->execute();
	}

	// Esta función borra el registro actual
	public function delete()
	{

		$sql = "DELETE FROM users
				WHERE
					id = ?";

		$data = array(
			$this->id
		);

		$sth = Db::getInstance()->prepare($sql);
		return $sth->execute($data);
	}


	// Esta función comprueba si el usuario existe en la base de datos
	public static function checkUser($email, $password)
	{


		$sql = "SELECT
					u.*
				FROM
					users u
				WHERE
					u.email = ? AND
					u.password = ?";

		$data = array(
			$email,
			md5($password)
		);

		return Model::fetch($sql, __CLASS__, $data);

	}

}