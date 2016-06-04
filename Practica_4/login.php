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
 * P�gina principal, desde aqui se llama a todas las dem�s paginas
 *
 ******************************************************************************/
?>
<?php

//Cargamos la configuraci�n
require_once "config.php";

require_once "controller/login.php";

//Cargamos el controlador
require_once "controller/controller.php";



//Cargamos la vista
$page = "login";
$page_title = "Login";

require_once "view/header.phtml";
require_once "view/menu.phtml";
require_once "view/login.phtml";
require_once "view/footer.phtml";

?>