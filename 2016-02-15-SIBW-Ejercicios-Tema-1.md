---
title: SIBW Ejercicios Tema 1
layout: post
author: erseco
permalink: /sibw-ejercicios-tema-1/
source-id: 1V3o78lPd9DWHRmCT_2crsJ2r9XVAz89OgY7PjzisG70
published: true
---
SIBW - Ejercicios Tema 1

# Ejercicio 1. ¿En qué momento la sociedad civil empezó a hacer suyo el proyecto inicialmente militar? 

Las redes militares y universitarias se interconectaron y unificaron en el llamado "internetwork" (posteriormente abreviado a Internet) en 1983, una vez todas migraron a TCP/IP, pero el uso totalmente abierto no limitado a las universidades no comenzó hasta principios de los 90, es ahí cuando comienza el llamado internet “comercial”.

# Ejercicio 2. ¿Por qué he afirmado tan taxativamente que Internet y la Web no es lo mismo? Explique lo que es cada cosa para que lo entienda un profano en la materia. 

Internet es el conjunto global de servicios o red de comunicaciones, la web es simplemente un servicio dentro de internet. 

Una explicación sencilla sería que Internet son un montón de dispositivos conectados, ya sean ordenadores, servidores, móviles e incluso hoy en dia cafeteras, todos estos cacharros se comunican entre sí e intercambian datos tales como correos electrónicos, chats, videollamadas y como no, páginas web, por lo que la web es uno de los múltiples servicios que se transmiten por Internet y que simplemente consiste en el intercambio de páginas de texto (con algunas cosicas añadidas como videos, fotos, etc...).

# Ejercicio 3. Documente en sus apuntes las responsabilidades y protocolos usados en cada una de las cuatro capas indicadas.

* **Capa de aplicación: **Es el nivel mas alto (séptimo) del modelo OSI, aquí aparecen los protocolos de aplicación HTTP, FTP, POP, TELNET, etcétera

* **Capa de transporte: **Es el cuarto nivel, es donde están los protocolos de transporte TCP y UDP, que se diferencian por ser uno con control y otro sin control de recepción de paquetes.

* **Capa de internet: **Es el tercer nivel del modelo OSI y es el que establece la comunicación, en esta capa vemos los protocolos IP (IPv4 y IPv6), así como ICMP que usamos para hacer ping. 

* **Capa de acceso a red: **Es el segundo nivel del modelo OSI y el que controla que la comunicaciòn sea correcta, en esta capa se define la dirección MAC de cada elemento conectado a la red, así como del control de errores.

# Ejercicio 4. ¿A qué capa pertenece el protocolo TCP? ¿Qué utilidad tienen los puertos? 

El protocolo TCP pertenece a la capa de transporte y usa el concepto de número de puerto para identificar a las aplicaciones emisoras y receptoras. Cada lado de la conexión TCP tiene asociado un número de puerto (de 16 bits sin signo, con lo que existen 65536 puertos posibles) asignado por la aplicación emisora o receptora. 

# Ejercicio 5. Investigue y documente cómo hacer que un ordenador de casa, conectado con IP dinámica, pueda hacer de servidor con un nombre de dominio fijo, de forma que siempre que tecleemos www.elordenadordemicasa.com estemos accediendo al servicio web que tengamos funcionando. Si dispone de dominio propio, utilice su ordenador de casa para ello. 

Lo primero instalar un servidor web (p.e. apache) después le decimos a nuestro router que todas las peticiones al puerto 80 las redirija a nuestro ordenador y luego usando un servicio tipo dyndns o homeip lo configuramos para que cada vez que cambie nuestra ip se actualice el registro que apunta a nuestro ordenador, dicha configuración se puede hacer mediante un router que tenga la función de conectarse a dyndns o mediante un programa en nuestro ordenador.

# Ejercicio 6. Investigue y documente cómo obtener via telnet una página web. 

**1. Abrimos una conexión a la url  www.google.es a través del puerto 80**

**bender:~ ernesto$ telnet www.google.es 80**

**Trying 216.58.193.131...**

**Connected to www.google.es.**

**Escape character is '^]'.**

**2. Le pedimos mediante GET que nos devuelva el archivo /index.php**

**GET /index.html**

**HTTP/1.0 200 OK**

**Date: Sat, 13 Feb 2016 14:42:22 GMT**

**Expires: -1**

**Cache-Control: private, max-age=0**

**Content-Type: text/html; charset=ISO-8859-1**

**P3P: CP="This is not a P3P policy! See https://www.google.com/support/accounts/answer/151657?hl=en for more info."**

**Server: gws**

**X-XSS-Protection: 1; mode=block**

**X-Frame-Options: SAMEORIGIN**

**Set-Cookie: NID=76=XS-Rx0ATa7P8O5MGer9N5Pif9eSh0F2Cf8UDqIggybKpbSVZkpgO8tvZnPGfhCNfDjemyvD0bSEC0Ak5Lr5UjsN7jvUksV609QfvW3e9Dl6rhDqbaRDbtg9xg0_EjxCFusHTL8kHG4wDtNM; expires=Sun, 14-Aug-2016 14:42:22 GMT; path=/; domain=.google.com; HttpOnly**

**Accept-Ranges: none**

**Vary: Accept-Encoding**

**<!doctype html><html itemscope="" itemtype="http://schema.org/WebPage" lang="en"><head><meta **

**[...]**

Nótese que muchos servidores web tienen protegida este tipo de conexiones para que no sea tan sencillo acceder a los datos, esto es, sin especificar tanto parámetros como solicita un navegador.

# Ejercicio 7. Lea la autoentrevista que Tim Berners‐Lee ofrece en la web del W3C y destaque lo que más le ha llamado la atención: [https://www.w3.org/People/Berners-Lee/FAQ.html](https://www.w3.org/People/Berners-Lee/FAQ.html) 

Lo que mas me ha llamado la atención, aparte del tono bastante humorístico del señor Lee es que diga cual fue la primera pagina web, de la que se puede ver un alias en [http://info.cern.ch/hypertext/WWW/TheProject.html](http://info.cern.ch/hypertext/WWW/TheProject.html) y que usaba una estación Next cuando desarrolló la WWW.

Lo de la petición de que no le envien mas ideas la comparto completamente, no hay semana que no reciba un email o una llamada pidiendo colaboración para un proyecto "rompedor".

También son muy curiosas las preguntas para "niños".

# Ejercicio 8. (Optativo) Lea el artículo original en el que se "crea" la WWW, disponible en [http://www.w3.org/History/1989/proposal.html](http://www.w3.org/History/1989/proposal.html) y haga un resumen 

Según explica Tim Berners Lee, aunque en el CERN tienen una estructura jerarquizada similar a una tela de araña (web), la información no fluía correctamente, y había pérdidas de información, información duplicada y muchos "cotilleos" de pasillo sobre lo que hacían otros departamentos, después de su trabajo con el hipertexto Tim creyó que si pudieran colocar toda la información mediante páginas enlazadas se acabarían esas duplicidades y todo el mundo podría acceder a la información.

También explica que él ve al CERN como un modelo a escala del mundo real™ pero un poco adelantado a su tiempo, es decir, que los problemas con los que ellos se encuentran son los problemas que tendrá el resto de la humanidad en un futuro cercano.

Se fija en la documentación estructurada en árbol no es un fiel reflejo del mundo real, por lo que cree que lo de interconectar nodos es un mejor reflejo para evitar duplicidades y hacerlo mas extensible, por todo ello explica su trabajo con hipertexto y cómo podría solucionar todos estos problemas.

# Ejercicio 9. Indique al menos tres ejemplos de sitios web de las categorías descritas anteriormente.

**‐  Webs informativas o de presencia.** Lo único que contienen es un mínimo contenido estático que permite mostrar productos y servicios. Hoy en día, cualquier pequeña empresa intenta tener presencia en Internet, y la primera aproximación es esa.

* [http://www.ernesto.es](http://www.ernesto.es)

* [http://www.isabelvives.photo](http://www.isabelvives.photo) 

* [http://www.trevenque.es](http://www.trevenque.es) 

**‐  Webs de descargas.** Su objetivo principal es proporcionar documentos en formato distinto a HTML para su descarga por los visitantes. Podemos pensar en webs de grupos musicales que ofrecen sus composiciones gratuitamente, de fundaciones que ponen a disposición del visitante los libros que generan, etc.

* [http://www.proyectokrahe.org](http://www.proyectokrahe.org) 

* [http://www.sourceforge.net](http://www.sourceforge.net) 

* [http://www4.tecnun.es/recursos/labmat0.html](http://www4.tecnun.es/recursos/labmat0.html) 

**‐  Webs interactivas.** El usuario interacciona con la página, genera contenido y se pone en contacto con otros usuarios. Ejemplos claros son los foros temáticos.

* [http://www.stackoverflow.com](http://www.stackoverflow.com)

* [http://www.meneame.net](http://www.meneame.net)

* [http://www.facebook.com](http://www.facebook.com) 

**‐  Webs de contacto con el usuario.** Este tipo de webs son aquellas que permiten al usuario generar mensajes dirigidos al propietario de la aplicación. Pensemos en las aplicaciones de control de bugs o las de gestión del servicio de atención al cliente de un proveedor de servicios en internet.

* [https://bugzilla.mozilla.org](https://bugzilla.mozilla.org) 

* [http://trac.aircrack-ng.org](http://trac.aircrack-ng.org) 

* [https://es.zopim.com/](https://es.zopim.com/) 

**‐  Webs orientadas a servicios.** Una aplicación web orientada a servicios implementa el final de un servicio web, y genera la salida de éste. Pensemos en una aplicación web de reserva de vuelos; detrás del interfaz web HTML hay un complejo nudo de aplicaciones ejecutándose en el servidor que darán como resultado la modificación de uno o varios sistemas informáticos donde queda registrado el billete que hemos comprado.

* [http://www.skyscanner.com/](http://www.skyscanner.com/) 

* [http://www.xe.com/es/currencyconverter/](http://www.xe.com/es/currencyconverter/) 

* [http://www.eltiempo.es](http://www.eltiempo.es) 

**‐  Portales,** que no son más que sitios webs colectores de información y enlaces a otros sitios interesantes y relacionados con la temática.

* [http://www.genbetadev.com/](http://www.genbetadev.com/) 

* [http://www.terra.com/](http://www.terra.com/) 

* [https://www.yahoo.com/](https://www.yahoo.com/) 

**‐  Web alternativas a herramientas de escritorio. **El futuro es el cloud computing, el almacenamiento de los datos en eso que se viene a llamar la nube y que permitirá realizar todo lo que actualmente hacemos en escritorio a través de un navegador web. 

* [https://docs.google.com/](https://docs.google.com/) 

* [https://jsfiddle.net/](https://jsfiddle.net/) 

* [http://pastebin.com/](http://pastebin.com/) 

