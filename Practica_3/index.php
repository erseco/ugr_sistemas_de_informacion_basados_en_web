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
 * Página principal, desde aqui se llama a todas las demás paginas
 *
 **********************************************************/
header('Content-Type: text/html; charset=utf-8');

// Cargamos el modelo de datos y creamos una instancia de la clase Model
require 'classes/model.php';
$model = new Model();


$page = 'home'; // La pagina por defecto será la home
$t_selected = ' id="selected"';

if ( !empty($_GET) and isset($_GET['page']) and file_exists('pages/page_'.$_GET['page'].'.php') )
	$page = $_GET['page'];


require 'pages/header.php';

echo '		<div id="content">';

require 'pages/sidebar.php';
require 'pages/content.php';

echo '		</div>';

require 'pages/footer.php';

 ?>