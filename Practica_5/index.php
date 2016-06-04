<?php

// // Codigo para reducir el html eliminando saltos de linea, tabuladores y espacios
// function sanitize_output($buffer) {

//     $search = array(
//         '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
//         '/[^\S ]+\</s',  // strip whitespaces before tags, except space
//         '/(\s)+/s',       // shorten multiple whitespace sequences
//         '/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/' // Comentarios html (sin quitar las excepciones de IE)
//     );

//     $replace = array(
//         '>',
//         '<',
//         '\\1',
//         ''
//     );

//     $buffer = preg_replace($search, $replace, $buffer);

//     return $buffer;
// }

// ob_start("sanitize_output");

?>
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
header('Content-Type: text/html; charset=utf-8');

// Requerimos la comprobaci�n de que la sesi�n est� iniciada, si no redirigir� a la ventana de login
require_once "session.php";

include "config.php";

include "controller/controller.php";



// Include('dbinit.php');

// $rooms = Room::all();

// die("hola");

// Si no se solicita ninguna pagina mostramos la home
if(!isset($_GET['page'])) {

    $page = "home";
    $page_title = "Home";
    include('view/header.phtml');
    include('view/breadcrumb.phtml');
    include('view/menu.phtml');
    include('view/sidebar.phtml');
	include('view/home.phtml');

} else {

	$page = $_GET['page'];

    // Si no existe mostramos la pagina de error
	if(!file_exists("view/" . $page . ".phtml")) {

        header("Location: 404.html");
        exit();

	} else {

        // Cargamos la p�gina solicitada
        $page_title = ucwords(str_replace("_", " ", $page));
        include('view/header.phtml');
        include('view/breadcrumb.phtml');
        include('view/menu.phtml');
        include('view/sidebar.phtml');

		include('view/' . $page . '.phtml');
	}
}

// Cargamos el pie de la p�gina
include "view/footer.phtml";


?>