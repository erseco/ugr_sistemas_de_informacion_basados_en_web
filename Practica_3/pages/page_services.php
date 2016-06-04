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
 * Pagina que carga los distintos servicios
 *
 **********************************************************/

$id_service = ( !empty($_GET) and isset($_GET['service']) and is_numeric($_GET['service']) and ($_GET['service'] <= count($model->services)) ) ? $_GET['service'] : 0;


if ( !$id_service )
{

	echo '<h3>Servicios</h3>';
	echo '<p>Estos son los servicios de los que disfrutará durante su estancia en el Hotel Plaza Nueva, entre los que destacamos el servicio de cuna gratuito (según disponibilidad) y servicio de reserva de entradas para la Alhambra y para espectáculos de flamenco.</p>';
	echo '<h3>Servicios Destacados</h3>';
	echo '<ul>';

	foreach ($model->services as $key => $service)
	{

		echo '<li><a href="index.php?page=services&service='.$key. '">'.$service->title.'</a> '.$service->price.'</li>';

	}

	echo '</ul>';
	echo '<h3>Servicios Básicos</h3>';
	echo '<img  src="images/services.png" alt="Servicios del Hotel" title="Servicios del hotel" />';


} else {

	$service = $model->services[$id_service];

	echo '<h3>'.$service->title.'</h3>';
	echo '<p>'.$service->description.'</p>';
    echo '<p>Precio:  <strong>'.$service->price.'</strong></p>';

	echo '<div class="baguetteBox">';

	for ($i=1;$i<=$service->photos; $i++)
	{
		echo '	<a href="images/service_'.$id_service.'_'.$i.'.jpg"><img class="gallery" src="images/service_'.$id_service.'_'.$i.'.jpg" alt="imagen de la galeria" title="imagen de la galeria" /></a>';
	}

	echo '</div>';

}

?>
