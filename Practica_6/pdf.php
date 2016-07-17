<?php

require_once 'config.php';
define('ID_LANG', 1);

if ( isset($_GET['id']))
{

	$booking = Booking::byId($_GET['id']);
	$user = User::byId($booking->id_user);
	$room = Room::byId($booking->id_room);


	// HEADER
	// create a PDF object
	$pdf = new pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

	// set document (meta) information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Hotel Plaza Nueva');
	$pdf->SetTitle('Hotel Plaza Nueva');
	$pdf->SetSubject('Hotel Plaza Nueva');
	$pdf->SetKeywords('hotel, plaza, nueva, granada');

	// add a page
	$pdf->AddPage();

	// create address box
	$pdf->CreateTextBox($user->name, 0, 55, 80, 10, 10, 'B');
	$pdf->CreateTextBox($user->email, 0, 60, 80, 10, 10);
	$pdf->CreateTextBox($user->phone, 0, 65, 80, 10, 10);
	//$pdf->CreateTextBox('Zip, city name', 0, 70, 80, 10, 10);

	// invoice title / number
	$pdf->CreateTextBox('Factura #'.$booking->id, 0, 90, 120, 20, 16);

	// date, order ref
	$date = date_create($booking->date_booking);
	$pdf->CreateTextBox('Fecha: '.date_format($date,"d/m/Y H:i:s"), 0, 100, 0, 10, 10, '', 'R');
	$pdf->CreateTextBox('Order ref.: #'.$booking->id, 0, 105, 0, 10, 10, '', 'R');


	// ROWS

	// list headers
	$pdf->CreateTextBox('Dias', 0, 120, 20, 10, 10, 'B', 'C');
	$pdf->CreateTextBox('Habitacion', 20, 120, 90, 10, 10, 'B');
	$pdf->CreateTextBox('Precio', 110, 120, 30, 10, 10, 'B', 'R');
	$pdf->CreateTextBox('Total', 140, 120, 30, 10, 10, 'B', 'R');

	$pdf->Line(20, 129, 195, 129);




	$currY = 128;

		$pdf->CreateTextBox($booking->getDays(), 0, $currY, 20, 10, 10, '', 'C');
		$pdf->CreateTextBox($room->name, 20, $currY, 90, 10, 10, '');
		$pdf->CreateTextBox('€'.$room->price, 110, $currY, 30, 10, 10, '', 'R');
		$pdf->CreateTextBox('€'.$booking->getTotal(), 140, $currY, 30, 10, 10, '', 'R');
		$currY = $currY+5;

	$pdf->Line(20, $currY+4, 195, $currY+4);


	// FOOTER
	// output the total row
	$pdf->CreateTextBox('Total', 20, $currY+5, 135, 10, 10, 'B', 'R');
	$pdf->CreateTextBox('€'.number_format($booking->getTotal(), 2, '.', ''), 140, $currY+5, 30, 10, 10, 'B', 'R');

	// some payment instructions or information
	$pdf->setXY(20, $currY+30);
	$pdf->SetFont(PDF_FONT_NAME_MAIN, '', 10);
	$pdf->MultiCell(175, 10, '<em>Lorem ipsum dolor sit amet, consectetur adipiscing elit</em>.
	Vestibulum sagittis venenatis urna, in pellentesque ipsum pulvinar eu. In nec <a href="http://www.google.com/">nulla libero</a>, eu sagittis diam. Aenean egestas pharetra urna, et tristique metus egestas nec. Aliquam erat volutpat. Fusce pretium dapibus tellus.', 0, 'L', 0, 1, '', '', true, null, true);

	//Close and output PDF document
	$pdf->Output('factura_'.$booking->id.'.pdf', 'D');


}
?>