
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
 * Modelo de datos
 *
 **********************************************************/

// Agregamos los datos
require 'room.php';
require 'service.php';

Class Model
{

    public $rooms;
    public $servides;

    public function __construct()
    {
        // Aquí definimos el objeto donde almacenaremos los datos (en espera de la BBDD)
        // Introducimos los datos en un array (instanciando objetos)
        $this->rooms = array();
        $this->rooms[1] = new Room("Habitación doble o twin (2 camas)", "En nuestras habitaciones standard disfrutará de todo el equipamiento y comodidades que su estancia en Granada merece.", 4, "36€/noche.");
        $this->rooms[2] = new Room("Habitación doble superior", "Disfrute de una magnifica vista de Plaza Nueva y el centro de Granada desde nuestras habitaciones superiores.", 2, "56€/noche.");
        $this->rooms[3] = new Room("Habitación triple", "En nuestras habitaciones triples podrá disfrutar de sus vacaciones en familia o con amigos en el centro de Granada.", 1, "86€/noche.");

        // Activar esto para probar
        $this->rooms[4] = new Room("Habitación Baratera", "Esta es una habitación muy cutre, para probar si esto ba, encima es carísima.", 1, "1€/noche.");


        $this->services = array();
        $this->services[1] = new Service("Visita a la Alhambra", "Descubrirá con nostros la única Ciudad Medieval Musulmana bien conservada del mundo, la Alhambra; visitando sus palacios, Mexuar, Comares, Leones, Generalife; paseando por sus patios, de los Leones, de los Arrayenes, la Reja, la Acequia, la Sultana; y disfrutando de sus jardines, de Partal, de la Medina y por suspuesto del Generalife con sus gracioso juegos de agua, y su laberíntico diseño.", 8, "46€/persona.");
        $this->services[2] = new Service("Viaje a Sierra Nevada", "Podrá disfrutar de paseos por los senderos del parque natural de Sierra Nevada en temporada de verano o de un día de esquí con alquiler de equipo, profesor privado y forfait por un día en temporada de invierno.", 8, "26€/día y persona.");

        // Activar esto para probar
        $this->services[3] = new Room("Visita a Albolote", "Visita a la carcel de albolote, por solo 1 euro!.", 1, "1€/persona.");

    }


}