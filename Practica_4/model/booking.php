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

class Booking extends Model {

	// Atributos
	public $id;

	public $id_room;
	public $id_physicalroom;
	public $id_user;
	public $date_booking;
	public $date_range;
	public $comments;
	public $state;
	public $creditcard;
	public $month;
	public $year;
	public $cvv;



	// Esta funci�n obtiene todos los usuarios de la base de datos
	public static function all()
	{

		$sql = "SELECT
					b.*
				FROM
					bookings b
				ORDER BY b.id ASC";

		return Model::fetchAll($sql, __CLASS__);
	}

	public static function byId($id)
	{
		$sql = "SELECT
					b.*
				FROM
					bookings b
				WHERE
					b.id = ?";

		return Model::fetch($sql, __CLASS__, $id);
	}

	public static function byUser($id_user)
	{
		$sql = "SELECT
					b.*
				FROM
					bookings b
				WHERE
					b.id_user = ?";

		return Model::fetchAll($sql, __CLASS__, $id_user);
	}


	// Calculamos los dias que estar� a partir de la fecha de entrada y salida
	public function getDays()
	{
		$dates = explode(' - ', $this->date_range);

		if (count($dates) == 2)
		{
			$date_in = DateTime::createFromFormat('j/m/Y', $dates[0]);
			$date_out = DateTime::createFromFormat('j/m/Y', $dates[1]);

			$interval = $date_in->diff($date_out);

			return $interval->days;
		}

		return 0;
	}


	// Calculamos los dias que estar� a partir de la fecha de entrada y salida
	public function getTotal()
	{
		$price = Room::byId($this->id_room)->price;
		return $this->getDays() * $price;
	}

	// Esta funci�n inserta el registro actual en la base de datos
	public function insert() {



		// Hacemos sendos insert en una transacci�n
        $sql = "INSERT INTO bookings
                    (id_room,id_physicalroom,id_user,date_range,comments,state,creditcard,month,year,cvv)
                VALUES
                    (:id_room,:id_physicalroom,:id_user,:date_range,:comments,:state,:creditcard,:month,:year,:cvv);";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":id_room", $this->id_room);
        $statement->bindValue(":id_physicalroom", $this->id_physicalroom);
        $statement->bindValue(":id_user", $this->id_user);
        $statement->bindValue(":date_range", $this->date_range);
        $statement->bindValue(":comments", $this->comments);
        $statement->bindValue(":state", $this->state);
        $statement->bindValue(":creditcard", $this->creditcard);
        $statement->bindValue(":month", $this->month);
        $statement->bindValue(":year", $this->year);
        $statement->bindValue(":cvv", $this->cvv);

        $statement->execute();

        $this->id = Db::getInstance()->lastInsertId();
		return $this->id;
	}



	// Esta funci�n actualiza el registro actual (definido por el id)
	public function update()
	{
		// Actualiza
        $sql = "UPDATE bookings
                SET
                    id_room = :id_room,
                    id_physicalroom = :id_physicalroom,
                    id_user = :id_user,
                    date_range = :date_range,
					comments = :comments,
                    state = :state,
                    creditcard = :creditcard,
                    month = :month,
                    year = :year,
                    cvv = :cvv
                WHERE id = :id;";

        $statement = Db::getInstance()->prepare($sql);
        $statement->bindValue(":id", $this->id);
        $statement->bindValue(":id_room", $this->id_room);
        $statement->bindValue(":id_physicalroom", $this->id_physicalroom);
        $statement->bindValue(":id_user", $this->id_user);
        $statement->bindValue(":date_range", $this->date_range);
        $statement->bindValue(":comments", $this->comments);
        $statement->bindValue(":state", $this->state);
        $statement->bindValue(":creditcard", $this->creditcard);
        $statement->bindValue(":month", $this->month);
        $statement->bindValue(":year", $this->year);
        $statement->bindValue(":cvv", $this->cvv);

        return $statement->execute();
	}

	// Esta funci�n borra el registro actual
	public function delete()
	{

		$sql = "DELETE FROM bookings
				WHERE
					id = ?";

		$data = array(
			$this->id
		);

		$sth = Db::getInstance()->prepare($sql);
		return $sth->execute($data);
	}

}