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
 * Pagina que carga las distintas habitaciones
 *
 **********************************************************/

$id_room = ( !empty($_GET) and isset($_GET['room']) and is_numeric($_GET['room']) and ($_GET['room'] <= count($model->rooms)) ) ? $_GET['room'] : 0;


if ( !$id_room )
{

	echo "<h3>Habitaciones</h3>";
	foreach ($model->rooms as $key => $room)
	{

		echo '<div class="room" id="room'.$key.'">';
		echo '<a href="index.php?page=rooms&room='.$key. '">';
		echo '	<h4>'.$room->title.'</h4>';
		echo '	<img class="gallery" src="images/room'.$key.'_1.jpg" alt="habitacion" title="habitacion" />';
		echo '	<p>'.$room->description.'.</p>';
        echo '    <p>Precio:  <strong>'.$room->price.'</strong></p>';
		echo '<a>';
		echo '</div>';
		echo '<hr>';
	}


} else {

	$room = $model->rooms[$id_room];


	echo '<h3>'.$room->title.'</h3>';
	echo '<p>'.$room->description.'</p>';
    echo '<p>Precio:  <strong>'.$room->price.'</strong></p>';

	echo '<div class="baguetteBox">';

	for ($i=1;$i<=$room->photos; $i++)
	{
		echo '	<a href="images/room'.$id_room.'_'.$i.'.jpg"><img class="gallery" src="images/room'.$id_room.'_'.$i.'.jpg" alt="imagen de la galeria" title="imagen de la galeria" /></a>';
	}

	echo '</div>';

}

?>


