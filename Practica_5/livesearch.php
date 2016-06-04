<?php

if (isset($_GET['q']))
{

  require_once 'config.php';
  define('ID_LANG', 1);

  $q = $_GET['q'];

  $results = Search::find($q);

  $response = "";

  foreach ($results as $result)
  {


    $response .= '<a href="index.php?page=bookings&id='.$result->id.'">Reserva: #'.$result->id.'&nbsp;- '.$result->name.'&nbsp;'.$result->email.'&nbsp;'.$result->dni.'</a><br>';




  }

  if ($response=="")
  {
    $response="no encontrado";
  }
  echo $response;

}
?>