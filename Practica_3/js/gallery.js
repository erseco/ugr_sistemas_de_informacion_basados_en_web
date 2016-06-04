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
 * para cargar la galeria
 *
 **********************************************************/
window.onload = function() {

    // Inicializamos el scrip de galería solo si la pagina contiene alguna
	var galleries = document.getElementsByClassName("baguetteBox");

	if (galleries.length > 0)
    	baguetteBox.run('.baguetteBox');
};
