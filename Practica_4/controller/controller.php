<?php




if ( isset( $_GET['id_lang'] ) )
{
	$id_lang = $_GET['id_lang']; // es
}
elseif ( isset( $_COOKIE['id_lang'] ) )
{
	$id_lang = $_COOKIE['id_lang'];
}
else
{
	$id_lang = 1;
}

setcookie("id_lang", $id_lang, time() + 3600);

define("ID_LANG", $id_lang);


$languages = Language::all();


if ( isset($_SESSION["sess_id_user"]))
	$user = User::byId($_SESSION['sess_id_user']);

$rooms = Room::all();
$services = Service::all();


require 'controller/localization.php';


$booking_states = array();
$booking_states[0] = __('pending');
$booking_states[1] = __('confirmed');
$booking_states[2] = __('canceled');

 ?>