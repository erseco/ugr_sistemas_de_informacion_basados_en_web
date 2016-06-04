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
 * El slider superior
 *
 **********************************************************/

/* ARRAY DE IMAGENES */
var header = new Array(8);
header[0] = "images/header1.jpg";
header[1] = "images/header2.jpg";
header[2] = "images/header3.jpg";
header[3] = "images/header4.jpg";
header[4] = "images/header5.jpg";
header[5] = "images/header6.jpg";
header[6] = "images/header7.jpg";
header[7] = "images/header8.jpg";

var bannersidebar = new Array(3);
bannersidebar[0] = "images/banner_offer_1.jpg";
bannersidebar[1] = "images/banner_offer_2.jpg";
bannersidebar[2] = "images/banner_offer_3.jpg";


function changeBanner(contador, element)
{

	var array = eval(element);

	banner = document.getElementById(element);

    if (banner)
    {
        banner.style.backgroundImage = "url(" +  array[contador] + ")";
        contador = ((contador+1) % array.length) ;
        setTimeout("changeBanner(" + contador + ",'" + element + "')", 3000);
    }
}

changeBanner(0, "header");
changeBanner(0, "bannersidebar");