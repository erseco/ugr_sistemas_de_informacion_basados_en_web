/* ARRAY DE IMAGENES */
var images = new Array(8);
images[0] = "images/header1.jpg";
images[1] = "images/header2.jpg";
images[2] = "images/header3.jpg";
images[3] = "images/header4.jpg";
images[4] = "images/header5.jpg";
images[5] = "images/header6.jpg";
images[6] = "images/header7.jpg";
images[7] = "images/header8.jpg";

//variable para llevar la cuenta de las imagenes
var contador = 0;

// Cambia la imagen cada segundo en este ejemplo
var tiempo = 3; // En segundos
var timer = tiempo * 1000;

function changeBanner(dir) {

	// El parámetro dir es para controlar cuando las paginas cuelgan de pages
	dir = typeof dir !== 'undefined' ? dir : "";

	banner = document.getElementById("header");

    if (banner) {
        banner.style.backgroundImage = "url(" + dir + images[contador] + ")";
        setTimeout("changeBanner('" + dir + "')", timer);
        
        contador++;

        if (contador == images.length) {
            contador = 0;
        }
    }
}