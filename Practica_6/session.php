<?php
/*******************************************
 *
 * 2014 - Sistemas de Informacion Basados en Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * Nikolai Giovanni González López <nigolo@correo.ugr.es>
 *
 *
 *******************************************
 *
 * Requerimos la comprobación de que la sesión esté iniciada,
 * si no redirigirá a la ventana de login
 *
 ******************************************************************************/
 ?>
<?php

//Iniciamos la sesión php

session_start();

//Comprobamos si tenemos almacenadas las cookies
if (isset($_COOKIE['email']))
{

	//Las asignamos a la sesión
	$_SESSION["sess_id_user"] = $_COOKIE['cookie_id_user'];
	$_SESSION["sess_name"] = $_COOKIE['cookie_name'];
	$_SESSION["sess_email"] = $_COOKIE['cookie_email'];
	$_SESSION["sess_role"] = $_COOKIE['cookie_role'];
	$_SESSION["sess_creation_date"] = $_COOKIE['cookie_creation_date'];

//Si no, comprobamos si está establecida la variable de sesión user
} if (!isset($_SESSION['sess_email']))
{

	//Si no lo está, solicitamos que el usuario see loguee
	// header("Location: login.php");
	// exit;

}

?>
