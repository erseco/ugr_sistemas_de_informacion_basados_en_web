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

class Search extends Model {

	// Atributos
	public $id;

	public $email;
	public $name;
	public $dni;

	// Esta función obtiene todos los usuarios de la base de datos
	public static function find($value)
	{



		$sql = "SELECT
					b.id, u.email, u.name, u.dni
				FROM
					bookings b, users u
				WHERE b.id_user = u.id AND ( u.email LIKE :value OR u.name LIKE :value OR u.dni LIKE :value )
				ORDER BY b.id ASC";


        $sth = Db::getInstance()->prepare($sql);

        $sth->setFetchMode(PDO::FETCH_CLASS, __CLASS__);


        $sth->bindValue(":value", '%'.$value.'%');

		$sth->execute();

        return $sth->fetchAll();



	}






}