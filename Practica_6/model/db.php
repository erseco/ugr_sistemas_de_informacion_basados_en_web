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
 *  Esta es la clase que carga PDO
 *
 ******************************************************************************/
?>
<?php

class Db
{
    //Patron singleton para el objeto db
    private static $instance = NULL;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance()
    {
        if (!self::$instance)
        {
            try
            {
                $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=UTF8';
                self::$instance = new PDO($dsn, DB_USER, DB_PASSWORD);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $e)
            {
                die('Connection error: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>
