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
 * El slider de ofertas
 *
 **********************************************************/

/* ARRAY DE IMAGENES */

var bannersidebar = new Array(3);
bannersidebar[0] = "offers/banner_offer_1.jpg";
bannersidebar[1] = "offers/banner_offer_2.jpg";
bannersidebar[2] = "offers/banner_offer_3.jpg";


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

changeBanner(0, "bannersidebar");