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
 * Página principal, desde aqui se llama a todas las demás paginas
 *
 ******************************************************************************/
?>
<?php

//Cargamos la configuración
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