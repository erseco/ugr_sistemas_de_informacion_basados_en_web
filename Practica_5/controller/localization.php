<?php

// Aqui almacenamos todas las cadenas del idioma actual
$GLOBALS['translations'] = Cms::all();

function _e($value)
{
	echo __($value);
}

function __($value)
{
	// Ponemos la cadena en mayusculas y sustituimos los espacios por "_"
	$value = strtoupper( str_replace(' ', '_', $value) );

	foreach ( $GLOBALS['translations'] as $cms )
		if ( strcasecmp($cms->name, $value) == 0 && trim($cms->value != ""))
			return $cms->value;

	// Si no encontramos la cadena creamos el registro en la BBDD y
	// devolvemos el $value original con % % para detectarlo
	if (!Cms::byName($value))
	{
		$new_cms = new Cms();
		$cms->name = $value;
		$cms->value = '';
		$cms->insert();
	}
	return '%'.$value.'%'; //'';
}

?>