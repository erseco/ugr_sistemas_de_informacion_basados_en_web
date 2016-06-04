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
 * Cabecera de la pagina
 *
 **********************************************************/
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Hotel Plaza Nueva en Granada. Web Oficial. Hotel de 3 estrellas situado en Imprenta, nº 2, Granada. Reserve online al Mejor Precio."/>
	<meta name="keywords" content="hotel, plaza, nueva, granada, habitaciones, calidad, alhambra, andalucia"/>
	<meta name="author" content="erseco, niko"/>
    <link rel="shorcut icon" href="images/favicon.ico"/>
	<title>Hotel Plaza Nueva en Granada</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/baguetteBox.css">

</head>

<body>

	<div id="container">

		<div id="header">
			<h1>Hotel Plaza Nueva ***</h1>
			<h2>Tu hotel en Granada</h2>
		</div>


		<div id="linkbar">
			<div id="navcontainer">
				<ul id="navlist">
					<li><a href="index.php"<?php if($page=="home") echo $t_selected ?>>Home</a></li>
					<li class="dropdown"><a href="index.php?page=rooms"<?php if($page=="rooms") echo $t_selected ?>>Habitaciones</a>

					  <div class="dropdown-content">

					  <?php
					  	// Mostramos todas las habitacions que haya en el modelo
					  	foreach ($model->rooms as $key => $room)
					  	{
							echo '<a href="index.php?page=rooms&room='.$key.'">'.$room->title.'</a>';
					  	}

					  ?>

					  </div>

					</li>
					<li class="dropdown"><a href="index.php?page=services"<?php if($page=="services") echo $t_selected ?>>Servicios</a>

					  <div class="dropdown-content">

					  <?php
					  	// Mostramos todos los servicios que haya en el modelo
					  	foreach ($model->services as $key => $service)
					  	{
							echo '<a href="index.php?page=services&service='.$key.'">'.$service->title.'</a>';
					  	}

					  ?>

					  </div>

					</li>
					<li><a href="index.php?page=location"<?php if($page=="location") echo $t_selected ?>>Ubicacion</a></li>
					<li><a href="index.php?page=gallery"<?php if($page=="gallery") echo $t_selected ?>>Fotografías</a></li>
					<li class="dropdown"><a href="index.php?page=contact"<?php if($page=="contact") echo $t_selected ?>>Contacto</a></li>
				</ul>
			</div>
		</div>