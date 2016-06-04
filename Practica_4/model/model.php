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
 * Usaremos PHP Data Objects, ya que está recomendado por PHP
 *
 *******************************************/

class Model
{

    public function getImages()
    {
        // Devolvemos todas las imagenes que cumplan el patron NOMBRE_CLASE+ID
        $class_name = strtolower( get_class($this) );

        return glob("images/".$class_name.$this->id."*.*");
    }

    public static function fetchAll($sql, $class_name, $id=null)
    {
        $sth = Db::getInstance()->prepare($sql);

        $sth->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($id)
            $sth->execute(array($id));
        else
            $sth->execute();

        return $sth->fetchAll();
    }

    public static function fetch($sql, $class_name, $id)
    {
        $sth = Db::getInstance()->prepare($sql);

        $sth->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ( is_array($id))
            $sth->execute($id);
        else
            $sth->execute(array($id));

        return $sth->fetch();
    }

}