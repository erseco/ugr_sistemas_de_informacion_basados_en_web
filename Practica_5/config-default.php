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
 * 	En este fichero se guardan los datos de acceso a la base de datos, así como
 *	la fución común de __autoload de clases
 *
 ******************************************************************************/
?>
<?php

// Notificar todos los errores de PHP (ver el registro de cambios)
error_reporting(E_ALL);

// Definimos los valores estáticos de la página
define("SITE_NAME", "Hotel Plaza Nueva");

// define("DB_HOST", "127.0.0.1");
// define("DB_USER", "root");
// define("DB_PASSWORD", "");
// define("DB_NAME", "sibw");
// define("TQM_DIR_PATH", "/sibw/Practica_4/"); //Introduzca aqui la ruta del directorio donde esté TQM dentro de apache (acabado en /)
// 							 		//por ejemplo, si tqm está dentro del directorio tqm introduzca /tqm/

define("DB_HOST", "localhost");
define("DB_USER", "PLEASECHANGEME");
define("DB_PASSWORD", "PLEASECHANGEME");
define("DB_NAME", "PLEASECHANGEME");

define("TQM_DIR_PATH", "/"); //Introduzca aqui la ruta del directorio donde esté TQM dentro de apache (acabado en /)
							 		//por ejemplo, si tqm está dentro del directorio tqm introduzca /tqm/

define("SUPPORT_MAIL", "PLEASECHANGEME"); //ATENCIÓN!! Asegurese de haber configurado sendmail o el smtp correctamente
										   //en la configuración de su fichero php.ini

// Valores estáticos para enviar e-mails
define("MAIL_HOST", "PLEASECHANGEME");
define("MAIL_USER", "PLEASECHANGEME");
define("MAIL_PASS", "PLEASECHANGEME");
define("MAIL_PORT", PLEASECHANGEME);

define("MAIL_FROM", "PLEASECHANGEME");


//La funcion __autoload de PHP5 automáticamente carga un fichero .php cuando se hace referencia a
//su clase, por definicion nuestra pondremos el archivo en minúscula
function __autoload($class) {

	// Establecemos el nombre que debería tener el archivo
	$file_name = "model/".strtolower($class).".php";

	// Comprobamos si el fichero existe
    if (file_exists($file_name )){

    	// Lo incluimos
        require_once $file_name;

    }

}

?>
