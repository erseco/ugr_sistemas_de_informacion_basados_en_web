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
 * Pagina de contacto
 *
 **********************************************************/
 ?>

			<h3>Formulario de contacto</h3>

			<div>

	<?php if ( !empty( $_POST ) ) { ?>

		<h4>Datos recibidos correctamente, gracias.</h4>

<?php

	$email = $_POST['email'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$subject = "Nuevo mensaje de " . $name;

	$text = $message . "\n";
	$text .= "Nombre: ".$name . "\n";
	$text .= "Email: ".$email . "\n";
	$text .= "Telefono: ".$phone . "\n";


	// $to = 'erseco@gmail.com,'.$email;

	// mail($to , $subject, $text);


	require("include/class.smtp.php");
	require("include/class.phpmailer.php");
	$mail = new PHPMailer();

	//Luego tenemos que iniciar la validación por SMTP:
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = "mail.granadatoday.es";
	$mail->Username = "info@granadatoday.es";
	$mail->Password = "Espera1234()";
	$mail->Port = 26;

	$mail->From = "info@granadatoday.es";
	$mail->FromName = "Hotel Plaza Nueva";

	$mail->AddAddress("erseco@gmail.com");
	$mail->AddAddress($email);

	$mail->IsHTML(false);
	$mail->Subject = $subject;
	$mail->Body = $text;

	if(!$mail->Send())
	{
		echo "Hubo un inconveniente. Contacta a un administrador.";
	}




?>


	<?php } else { ?>

		<form id="contact_form" class="appnitro" onsubmit="return validateForm()" method="post" action="index.php?page=contact">
			<label for="name">Nombre y Apellidos: </label>
			<div>
				<input id="name" name="name" type="text" maxlength="255" value=""/>
				<span id="name_msg"></span>
			</div>
			<label for="phone">Telefono: </label>
			<div>
				<input id="phone" name="phone" type="text" maxlength="255" value=""/>
				<span id="phone_msg"></span>
			</div>
			<label for="email">E-Mail: </label>
			<div>
				<input id="email" name="email" type="text" maxlength="255" value=""/>
				<span id="email_msg"></span>
			</div>

			<label for="message">Mensaje: </label>
			<div>
				<textarea id="message" name="message" rows="10" required="required"></textarea>
			</div>

			<input type="submit" name="submit" value="Enviar" />
		</form>

	<?php } ?>


			</div>

			<h3>Datos de contacto</h3>
			<p>Dirección: Imprenta, nº 2</p>
			<p>Localidad: Granada</p>
			<p>Provincia: Granada</p>
			<p>País: España</p>
			<p>Teléfono: <a href="tel:+34958215273">+34 958 215 273</a></p>
			<p>Fax: <a href="tel:+34958225765">+34 958 225 765</a></p>
			<p>Email: <a href="mailto:info@hotel-plazanueva.com">info@hotel-plazanueva.com</a></p>

			<h3>Redes sociales</h3>
			<p>También puede contactarnos a través de las principales redes sociales</p>
			<p><a href="http://www.facebook.com/hotel-plaza-nueva">Facebook</a></p>
			<p><a href="http://www.twitter.com/hotel-plaza-nueva">Twitter</a></p>

			<script src="js/form.js" type="text/javascript" charset="utf-8" async defer></script>