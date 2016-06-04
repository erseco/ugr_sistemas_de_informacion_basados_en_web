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
 * validaciones de email
 *
 **********************************************************/

// Validamos el email usando una expresión regular
function validateEmail(email)
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

// Validamos el telefono usando una expresión regular (9 digitos)
function validatePhone(phone)
{
 	var re = /^\d{9}$/;
    return re.test(phone);
}

// Establecemos un error en el campo indicado
function setError(element, message)
{
	element.style.backgroundColor = "LightCoral";
	document.getElementById(element.name + "_msg").innerHTML = message;
}

// Quitamos el error del campo indicado
function removeError(element)
{
	element.style.backgroundColor = "white";
	document.getElementById(element.name + "_msg").innerHTML = "";
}

function validateForm()
{

	var correct = true;

    var name = document.forms["contact_form"]["name"];
    if (name.value == null || name.value == "")
    {
    	setError(name, "Rellene el Nombre");
    	correct = false;
    } else
    {
    	removeError(name);
    }


    var phone = document.forms["contact_form"]["phone"];
    if (phone.value === null || phone.value === "" || !validatePhone(phone.value) )
    {
    	setError(phone, "Rellene el Teléfono (debe ser un numero de 9 dígitos)");
    	correct = false;
    } else
    {
    	removeError(phone);
    }


    var email = document.forms["contact_form"]["email"];
    if (email.value == null || email.value == "" || !validateEmail(email.value) )
    {
    	setError(email, "Rellene el email (debe ser un email correcto xxx@xxx.xxx)");
    	correct = false;
    } else
    {
    	removeError(email);
    }

    return correct;

}
