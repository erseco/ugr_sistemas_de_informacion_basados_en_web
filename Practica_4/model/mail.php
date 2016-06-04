

<?php

    class Mail
    {

    	public static function Send($email, $subject, $message)
    	{
            require_once "include/class.smtp.php";
            require_once "include/class.phpmailer.php";

            $mail = new PHPMailer();


            //Luego tenemos que iniciar la validación por SMTP:
            $mail->IsSMTP();

            // Esto es para evitar la verificacion de SSL
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->SMTPAuth = true;
            $mail->Host = MAIL_HOST;
            $mail->Username = MAIL_USER;
            $mail->Password = MAIL_PASS;
            $mail->Port = MAIL_PORT;

            $mail->From = MAIL_FROM;
            $mail->FromName = SITE_NAME;

            $mail->AddAddress(SUPPORT_MAIL);
            $mail->AddAddress($email);

            $mail->IsHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $message;

            return $mail->Send();

    	}
    }

?>