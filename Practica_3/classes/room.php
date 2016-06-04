<?php
/*********************************************************
 *
 * 2016 - Sistemas de Informacion Basados en Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * Nikolai Giovanni González López <nigolo@correo.ugr.es>
 *
 *********************************************************
 *
 * Modelo de dato de habitacion
 *
 **********************************************************/

// Aquí definimos el objeto donde almacenaremos los datos (en espera de la BBDD)
class Room
{
	public $title;
	public $description;
    public $photos;
    public $price;

    public function __construct($title, $description, $photos, $price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->photos = $photos;
        $this->price = $price;
    }

}

?>