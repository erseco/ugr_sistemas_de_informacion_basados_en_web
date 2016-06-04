<?php
/*******************************************
 *
 * 2014 - Programación Web
 * Grado en Ingeniería Informática
 *
 * Ernesto Serrano <info@ernesto.es>
 * 
 *
 *******************************************
 *
 * Esta es la parte del controlador para restaurar backup de la base de datos
 *
 ******************************************************************************/
?>
<?php

    // Conectamos al servidor MySQL
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if ($mysqli->connect_errno) {
        die('Error connecting to MySQL server: ' . $mysqli->error);
    }

    // Seleccionamos la codififacion UTF8 (Unicode) 
    $mysqli->set_charset("utf8");

    // Variable temporal, usada para guardar el query actual
    $templine = '';

    // Leemos un archivo gz entero (a un array)
    $lines = gzfile($filename);

    // Vamos recorriendo las lineas
    foreach ($lines as $line)
    {
        // Omitimos los comentarioss
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;
     
        // Incrementamos el query actual
        $templine .= $line;

        // Si tenemos un punto y coma es que ha terminado el query actual
        if (substr(trim($line), -1, 1) == ';') {
            // Lanzamos el query
            if (!$mysqli->query($templine)) {
                print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');
            }
            
            // Reseteamos la variable temporal para el siguiente query
            $templine = '';
        }
    }

    // Cerramos la conexión
    $mysqli->close();


?>