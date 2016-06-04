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
 * Esta es la parte del controlador para generar backup de la base de datos
 *
 ******************************************************************************/
?>
<?php

    // Establecemos el nombre que tendrá el archivo de backup en base a la fecha actual
    $filename = "hotel_backup_".date("Ymd").".sql";

    // Establecemos las opciones de mysqldump
    $dumpSettings = array(
        "compress" => "GZIP",
        "no-data" => false,
        "add-drop-database" => false,
        "add-drop-table" => true,
        "single-transaction" => false,
        "lock-tables" => false,
        "add-locks" => false,
        "extended-insert" => true,
        "disable-foreign-keys-check" => false
    );

    // Instanciamos la clase Mysqldum y llamamos al método que comienza un dump de la base de datos
    $dump = new Mysqldump(DB_NAME, DB_USER, DB_PASSWORD, DB_HOST, "mysql", $dumpSettings);
    $dump->start("backups/{$filename}");

    ?>