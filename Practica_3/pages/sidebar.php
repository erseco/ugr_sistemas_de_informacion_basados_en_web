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
 * Muestra el menu lateral
 *
 **********************************************************/
 ?>


			<div id="right_menu">
				<div id="bannersidebar"></div>
				<h4>Menu rápido</h4>

				<div class="navcontainer">

					<div id="sidebar"></div>


					<ul class="navlist">



					<?php

						if ($page != 'services')
						{
							echo '<li><strong>Servicios</strong></li>';
						  	// Mostramos todos los servicios que haya en el modelo
						  	foreach ($model->services as $key => $service)
						  	{
								echo '<a href="index.php?page=services&service='.$key.'">'.$service->title.'</a>';
						  	}
					  	}
					  	if ($page != 'rooms')
						{
							echo '<li><strong>Habitaciones</strong></li>';
						  	// Mostramos todos los servicios que haya en el modelo
						  	foreach ($model->rooms as $key => $room)
						  	{
								echo '<a href="index.php?page=rooms&room='.$key.'">'.$room->title.'</a>';
						  	}
					  	}


						// <!-- <li><a href="#"><strike>Reservar (en construccion)</strike></a></li> -->


						if ($page != 'rooms')
						{
							echo '<li><strong><a href="index.php?page=contact">Contacto</a><strong></li>';
						}
						?>
					</ul>
				</div>
			</div>

