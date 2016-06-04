<?php
/*******************************************
 *
 * 2014 - Sistemas de Informacion Basados en Web
 * Grado en Ingenier�a Inform�tica
 *
 * Ernesto Serrano <erseco@correo.ugr.es>
 * Nikolai Giovanni Gonz�lez L�pez <nigolo@correo.ugr.es>
 *
 *
 *******************************************
 *
 * Requerimos la comprobaci�n de que la sesi�n est� iniciada,
 * si no redirigir� a la ventana de login
 *
 ******************************************************************************/
 ?>
<?php

//Iniciamos la sesi�n php

session_start();

//Comprobamos si tenemos almacenadas las cookies
if (isset($_COOKIE['email']))
{

	//Las asignamos a la sesi�n
	$_SESSION["sess_id_user"] = $_COOKIE['cookie_id_user'];
	$_SESSION["sess_name"] = $_COOKIE['cookie_name'];
	$_SESSION["sess_email"] = $_COOKIE['cookie_email'];
	$_SESSION["sess_role"] = $_COOKIE['cookie_role'];
	$_SESSION["sess_creation_date"] = $_COOKIE['cookie_creation_date'];

//Si no, comprobamos si est� establecida la variable de sesi�n user
} if (!isset($_SESSION['sess_email']))
{

	//Si no lo est�, solicitamos que el usuario see loguee
	// header("Location: login.php");
	// exit;

}

?>
