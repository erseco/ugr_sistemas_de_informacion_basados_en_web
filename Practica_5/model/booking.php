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
	public $id_service;
	public $adults;
	public $childs;



	// Esta función obtiene todos los usuarios de la base de datos
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


	// Calculamos los dias que estará a partir de la fecha de entrada y salida
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


	// Calculamos los dias que estará a partir de la fecha de entrada y salida
	public function getTotal()
	{
		$room_price = Room::byId($this->id_room)->price;

		$service_price = ($this->id_service > 0) ? Service::byId($this->id_service)->price : 0;
		if ($service_price)
			$service_price *= ($this->adults + $this->childs);

		return ($this->getDays() * $room_price) + $service_price;
	}

	// Esta función inserta el registro actual en la base de datos
	public function insert() {



		// Hacemos sendos insert en una transacción
        $sql = "INSERT INTO bookings
                    (id_room,id_physicalroom,id_user,date_range,comments,state,creditcard,month,year,cvv, id_service, adults, childs)
                VALUES
                    (:id_room,:id_physicalroom,:id_user,:date_range,:comments,:state,:creditcard,:month,:year,:cvv, :id_service, :adults, :childs);";

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

		$statement->bindValue(":id_service", $this->id_service);
        $statement->bindValue(":adults", $this->adults);
        $statement->bindValue(":childs", $this->childs);

        $statement->execute();

        $this->id = Db::getInstance()->lastInsertId();
		return $this->id;
	}



	// Esta función actualiza el registro actual (definido por el id)
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
                    cvv = :cvv,
                    id_service = :id_service,
                    adults = :adults,
                    childs = :childs
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

		$statement->bindValue(":id_service", $this->id_service);
        $statement->bindValue(":adults", $this->adults);
        $statement->bindValue(":childs", $this->childs);

        return $statement->execute();
	}

	// Esta función borra el registro actual
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