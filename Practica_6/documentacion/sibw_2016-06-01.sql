# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.27)
# Database: sibw
# Generation Time: 2016-06-01 11:29:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_room` int(11) unsigned DEFAULT NULL COMMENT 'es el admin quien asigna la habitacion',
  `id_physicalroom` int(11) unsigned DEFAULT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `date_booking` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_range` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comments` text COLLATE utf8_spanish_ci,
  `state` int(11) DEFAULT NULL,
  `creditcard` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idx` (`id_physicalroom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;

INSERT INTO `bookings` (`id`, `id_room`, `id_physicalroom`, `id_user`, `date_booking`, `date_range`, `comments`, `state`, `creditcard`, `month`, `year`, `cvv`)
VALUES
	(1,2,4,21,'2016-05-05 17:56:19','04/01/2016 - 04/04/2016','texto de prueba',1,0,2,2016,123),
	(2,2,5,21,'2016-05-05 18:07:35','04/01/2016 - 04/04/2016','asdfasdf',1,0,1,2016,122),
	(6,2,NULL,1,'2016-05-06 08:03:13','04/01/2016 - 04/04/2016','hola',0,0,3,2020,123),
	(7,2,0,1,'2016-05-06 08:03:23','04/01/2016 - 04/04/2016','hola',2,0,3,2016,123);

/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms`;

CREATE TABLE `cms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `cms` WRITE;
/*!40000 ALTER TABLE `cms` DISABLE KEYS */;

INSERT INTO `cms` (`id`, `name`)
VALUES
	(162,'BACKUP'),
	(147,'BOOKING'),
	(179,'BOOKINGS'),
	(183,'CANCELED'),
	(198,'CHECK_YOUR_LOGIN_DATA'),
	(146,'CLOSE_SESSION'),
	(195,'COMMENTS'),
	(182,'CONFIRMED'),
	(150,'CONTACT'),
	(151,'CONTACT_DETAILS'),
	(191,'CREDIT_CARD'),
	(170,'CREDITS'),
	(194,'CVV'),
	(180,'DATA_RECEIVED_SUCCESFULLY'),
	(186,'DATE'),
	(174,'DAY'),
	(189,'DELETE'),
	(166,'EDIT'),
	(171,'EDIT_ROOM'),
	(173,'EDIT_SERVICE'),
	(169,'EDIT_TRANSLATIONS'),
	(156,'EMAIL'),
	(154,'FULL_NAME'),
	(148,'GALLERY'),
	(1,'HOME'),
	(4,'HOME_DESCRIPTION'),
	(188,'INVOICE'),
	(149,'LOCATION'),
	(167,'LOGIN'),
	(157,'MESSAGE'),
	(192,'MONTH'),
	(184,'NAME'),
	(172,'NIGHT'),
	(190,'NUMBER'),
	(161,'OTHER_ROOMS'),
	(165,'OTHER_SERVICES'),
	(176,'PASSWORD'),
	(181,'PENDING'),
	(155,'PHONE'),
	(160,'PRICE'),
	(163,'PROFILE'),
	(178,'REMEMBER_ME'),
	(159,'ROOM'),
	(2,'ROOMS'),
	(196,'SAVE'),
	(158,'SEND'),
	(153,'SEND_US_A_MESSAGE'),
	(164,'SERVICE'),
	(3,'SERVICES'),
	(177,'SIGN_IN'),
	(175,'SIGN_IN_TO_CONTINUE_TO'),
	(187,'STATE'),
	(142,'TOGGLE_NAVIGATION'),
	(197,'TOTAL'),
	(185,'TYPE'),
	(145,'VIEW_BOOKINGS'),
	(144,'VIEW_PROFILE'),
	(143,'WELCOME'),
	(193,'YEAR');

/*!40000 ALTER TABLE `cms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms_lang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_lang`;

CREATE TABLE `cms_lang` (
  `id` int(11) unsigned NOT NULL,
  `id_lang` int(11) NOT NULL DEFAULT '0',
  `value` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`,`id_lang`),
  CONSTRAINT `cms` FOREIGN KEY (`id`) REFERENCES `cms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `cms_lang` WRITE;
/*!40000 ALTER TABLE `cms_lang` DISABLE KEYS */;

INSERT INTO `cms_lang` (`id`, `id_lang`, `value`)
VALUES
	(1,1,'Inicio'),
	(1,2,'Start'),
	(1,3,'Start'),
	(1,4,'Home'),
	(2,1,'Habitaciones'),
	(2,2,'Bedrooms'),
	(2,3,'Chambres'),
	(2,4,'Zimmer'),
	(3,1,'Servicios'),
	(3,2,'Services'),
	(3,3,'Services'),
	(3,4,'Dienstleistungen'),
	(4,1,'<p>El Hotel Plaza Nueva está situado en el pleno centro monumental, comercial y administrativo de Granada, a 10 minutos de la Alhambra.</p>\r\n<p>El hotel ofrece una amplia y eficiente gama de servicios extra que satisfarán cualquier necesidad que le surja, reservas a shows de flamenco o visitas turísticas por la ciudad y la Alhambra.</p>\r\n<p>El hotel le ofrece 25 amplias y luminosas habitaciones repartidas sobre 3 plantas con ascensor.</p>\r\n<p>Cada planta del hotel y cada habitación poseen un nombre y encanto propio. Este nombre es una representación de un evento importante en la vida e historia de Granada. No tienen tarjetas magnéticas para abrir las puertas de las habitaciones, preferimos la originalidad que proporciona una tradicional llave.</p>\r\n<p>El hotel ofrece el servicio de desayuno continental en la cafetería, donde podrá disfrutar de conexión WIFI. Asimismo podrá obtener mediante pago del servicio conexión WIFI en su habitación.</p>\r\n<p>Confiamos en que disfrute plenamente su estancia entre nosotros así como de nuestra bella ciudad.</p>\r\n<p>Número de registro del hotel en la consejería de turismo de Andalucía: H/GR/01181</p>'),
	(4,2,'<P> The Hotel Plaza Nueva is situated in the very monumental, commercial and administrative center of Granada, 10 minutes from the Alhambra.</p>\r\n<p>The hotel offers a wide and efficient range of additional services to meet any needs that may arise, reservations for flamenco shows or sightseeing around the city and the Alhambra. </ P>  r  n <p> The hotel offers 25 bright and spacious rooms spread over 3 floors with elevator. </ p>  r  n <p> each floor of the hotel and each room have a name and own charm. This name is a representation of a major life event and history of Granada. They have magnetic cards to open the doors of the rooms, prefer the originality that provides a traditional key. </ P>  r  n <p> The hotel offers continental breakfast service in the cafeteria, where you can enjoy WIFI . It may also be obtained by payment service WIFI in your room. </ P>  r  n <p> We hope you thoroughly enjoy your stay with us as well as our beautiful city. </ P>  r  n <p > registration of the hotel in the tourist board of Andalusia H / GR / 01181</p>'),
	(4,3,'<P> L\'Hôtel Plaza Nueva est situé dans le centre monumental, administratif et commercial de Grenade, à 10 minutes du Alhambra.</p>\r\n<p>The hotel offers a wide and efficient range of additional services to meet any needs that may arise, reservations for flamenco shows or sightseeing around the city and the Alhambra. </ P>  r  n <p> The hotel offers 25 bright and spacious rooms spread over 3 floors with elevator. </ p>  r  n <p> each floor of the hotel and each room have a name and own charm. This name is a representation of a major life event and history of Granada. They have magnetic cards to open the doors of the rooms, prefer the originality that provides a traditional key. </ P>  r  n <p> The hotel offers continental breakfast service in the cafeteria, where you can enjoy WIFI . It may also be obtained by payment service WIFI in your room. </ P>  r  n <p> We hope you thoroughly enjoy your stay with us as well as our beautiful city. </ P>  r  n <p > registration of the hotel in the tourist board of Andalusia H / GR / 01181</p>'),
	(4,4,'<P> Das Hotel Plaza Nueva befindet sich im monumentalen, Handels- und Verwaltungszentrum von Granada, 10 Minuten von der Alhambra entfernt. </ P>  r \n<p>El hotel ofrece una amplia y eficiente gama de servicios extra que satisfarán cualquier necesidad que le surja, reservas a shows de flamenco o visitas turísticas por la ciudad y la Alhambra.</p>\r\n<p>El hotel le ofrece 25 amplias y luminosas habitaciones repartidas sobre 3 plantas con ascensor.</p>\r\n<p>Cada planta del hotel y cada habitación poseen un nombre y encanto propio. Este nombre es una representación de un evento importante en la vida e historia de Granada. No tienen tarjetas magnéticas para abrir las puertas de las habitaciones, preferimos la originalidad que proporciona una tradicional llave.</p>\r\n<p>El hotel ofrece el servicio de desayuno continental en la cafetería, donde podrá disfrutar de conexión WIFI. Asimismo podrá obtener mediante pago del servicio conexión WIFI en su habitación.</p>\r\n<p>Confiamos en que disfrute plenamente su estancia entre nosotros así como de nuestra bella ciudad.</p>\r\n<p>Número de registro del hotel en la consejería de turismo de Andalucía: H/GR/01181</p>'),
	(142,1,'Desplegar'),
	(142,2,'To deploy'),
	(142,3,'Pour déployer'),
	(142,4,'Entfalten'),
	(143,1,'Bienvenido'),
	(143,2,'Welcome'),
	(143,3,'Bienvenue'),
	(143,4,'Willkommen'),
	(144,1,'Ver perfil'),
	(144,2,'View profile'),
	(144,3,'Voir le profil'),
	(144,4,'Ihr Profil'),
	(145,1,'Ver reservas'),
	(145,2,'See reserves'),
	(145,3,'Voir réserves'),
	(145,4,'Siehe Reserven'),
	(146,1,'Cerrar sesión'),
	(146,2,'Sign off'),
	(146,3,'Inscrivez-off'),
	(146,4,'Logout'),
	(147,1,'Reservar'),
	(147,2,'Reserve'),
	(147,3,'Livre'),
	(147,4,'Book'),
	(148,1,'Galería'),
	(148,2,'Gallery'),
	(148,3,'Galerie'),
	(148,4,'Galerie'),
	(149,1,'Ubicación'),
	(149,2,'Location'),
	(149,3,'Location'),
	(149,4,'Location'),
	(150,1,'Contacte'),
	(150,2,'Contact'),
	(150,3,'Contact'),
	(150,4,'Kontakt'),
	(151,1,'Detalles de contacto'),
	(151,2,'Contact Details'),
	(151,3,'Détails de contact'),
	(151,4,'Kontaktdaten'),
	(153,1,'Envianos un mensaje'),
	(153,2,'Send us a message '),
	(153,3,'Envoyez-nous un message'),
	(153,4,'Senden Sie uns eine Nachricht'),
	(154,1,'Nombre completo'),
	(154,2,'Full name'),
	(154,3,'Nom complet'),
	(154,4,'Name voll'),
	(155,1,'Teléfono'),
	(155,2,'Phone'),
	(155,3,'Téléphone'),
	(155,4,'Phone'),
	(156,1,'E-Mail'),
	(156,2,'E-mail'),
	(156,3,'E-mail'),
	(156,4,'E-Mail'),
	(157,1,'Mensaje'),
	(157,2,'Message'),
	(157,3,'Message'),
	(157,4,'Message'),
	(158,1,'Enviar'),
	(158,2,'Submit'),
	(158,3,'Soumettre'),
	(158,4,'Senden'),
	(159,1,'Habitación'),
	(159,2,'Room'),
	(159,3,'Room'),
	(159,4,'Room'),
	(160,1,'Precio'),
	(160,2,'Price'),
	(160,3,'Prix'),
	(160,4,'Preis'),
	(161,1,'Otras habitaciones'),
	(161,2,'Other rooms'),
	(161,3,'Autres pièces'),
	(161,4,'Andere Räume'),
	(162,1,'Backup'),
	(162,2,'Backup '),
	(162,3,'Sauvegarde'),
	(162,4,'Sicherung'),
	(163,1,'Mi perfil'),
	(163,2,'My profile'),
	(163,3,'Mon profil'),
	(163,4,'Mein Profil'),
	(164,1,'Servicio'),
	(164,2,'Service'),
	(164,3,'Service'),
	(164,4,'Service'),
	(165,1,'Otros servicios'),
	(165,2,'Other services'),
	(165,3,'Autres services'),
	(165,4,'Sonstige Dienstleistungen'),
	(166,1,'Editar'),
	(166,2,'Edit'),
	(166,3,'Edit'),
	(166,4,'Edit'),
	(167,1,'Iniciar sesión'),
	(167,2,'Log in'),
	(167,3,'Se connecter'),
	(167,4,'Login'),
	(169,1,'Editar traducciones'),
	(169,2,'Edit translations'),
	(169,3,'Modifier les traductions'),
	(169,4,'Bearbeiten Übersetzungen'),
	(170,1,'Creditos'),
	(170,2,'Credits'),
	(170,3,'Crédits'),
	(170,4,'Credits'),
	(171,1,'Editar habitación'),
	(171,2,'Edit room '),
	(171,3,'Modifier room'),
	(171,4,'Bearbeiten Raum'),
	(172,1,'Noche'),
	(172,2,'Night'),
	(172,3,'Night'),
	(172,4,'Night'),
	(173,1,'Editar servicio'),
	(173,2,'Edit Service '),
	(173,3,'Modifier Service'),
	(173,4,'Dienst bearbeiten'),
	(174,1,'Dia'),
	(174,2,'Day'),
	(174,3,'Day'),
	(174,4,'Dia'),
	(175,1,'Inicie sesión para continuar en'),
	(175,2,'Login to continue '),
	(175,3,'Connectez-vous pour continuer'),
	(175,4,'Melde dich an, um fortzufahren'),
	(176,1,'Contraseña'),
	(176,2,'Password'),
	(176,3,'Mot de passe'),
	(176,4,'Passwort'),
	(177,1,'Iniciar sesión'),
	(177,2,'Log in'),
	(177,3,'Se connecter'),
	(177,4,'Login'),
	(178,1,'Recordarme'),
	(178,2,'Remember '),
	(178,3,'Rappelez-vous'),
	(178,4,'Denken Sie daran'),
	(179,1,'Reservas'),
	(179,2,'Reserves'),
	(179,3,'Réserves'),
	(179,4,'Reservierungen'),
	(180,1,'Datos recibidos correctamente'),
	(180,2,'Correctly received data '),
	(180,3,'Correctement reçu des données'),
	(180,4,'Korrekt empfangenen Daten'),
	(181,1,'Pendiente'),
	(181,2,'Pending'),
	(181,3,'Dans l\'attente'),
	(181,4,'Bis'),
	(182,1,'Confirmado'),
	(182,2,'Confirmed'),
	(182,3,'Confirmé'),
	(182,4,'Bestätigt'),
	(183,1,'Cancelado'),
	(183,2,'Canceled'),
	(183,3,'Annulé'),
	(183,4,'Abgebrochen'),
	(184,1,'Nombre'),
	(184,2,'Name'),
	(184,3,'Nom'),
	(184,4,'Name'),
	(185,1,'Tipo'),
	(185,2,'Kind'),
	(185,3,'Kind'),
	(185,4,'Typ'),
	(186,1,'Fecha'),
	(186,2,'Date'),
	(186,3,'Date'),
	(186,4,'Date'),
	(187,1,'Estado'),
	(187,2,'State'),
	(187,3,'État'),
	(187,4,'State'),
	(188,1,'Factura'),
	(188,2,'Bill'),
	(188,3,'Bill'),
	(188,4,'Rechnung'),
	(189,1,'Borrar'),
	(189,2,'Delete'),
	(189,3,'Supprimer'),
	(189,4,'Löschen'),
	(190,1,'Numero'),
	(190,2,'Number'),
	(190,3,'Numéro'),
	(190,4,'Number'),
	(191,1,'Tarjeta de credito'),
	(191,2,'Credit card'),
	(191,3,'Carte de crédit'),
	(191,4,'Kreditkarte'),
	(192,1,'Mes'),
	(192,2,'Month'),
	(192,3,'Mois'),
	(192,4,'Monat'),
	(193,1,'Año'),
	(193,2,'Year'),
	(193,3,'Année'),
	(193,4,'Year'),
	(194,1,'CVV'),
	(194,2,'CVV '),
	(194,3,'CVV'),
	(194,4,'CVV'),
	(195,1,'Comentarios'),
	(195,2,'Comments'),
	(195,3,'Commentaires'),
	(195,4,'Kommentare'),
	(196,1,'Guardar'),
	(196,2,'Save'),
	(196,3,'Enregistrer'),
	(196,4,'Speichern'),
	(197,1,'Total'),
	(197,2,'Total'),
	(197,3,'Total'),
	(197,4,'Total'),
	(198,1,'Compruebe sus datos de acceso'),
	(198,2,'Check your login data'),
	(198,3,'Check your login data'),
	(198,4,'Check your login data');

/*!40000 ALTER TABLE `cms_lang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(2) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;

INSERT INTO `languages` (`id`, `code`)
VALUES
	(1,'es'),
	(2,'en'),
	(3,'fr'),
	(4,'de');

/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table physicalrooms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `physicalrooms`;

CREATE TABLE `physicalrooms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_room` int(11) unsigned DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `physicalrooms` WRITE;
/*!40000 ALTER TABLE `physicalrooms` DISABLE KEYS */;

INSERT INTO `physicalrooms` (`id`, `id_room`, `number`)
VALUES
	(1,1,101),
	(2,1,102),
	(3,1,103),
	(4,2,201),
	(5,2,202),
	(6,2,203),
	(7,3,301),
	(8,3,302),
	(9,3,303),
	(10,4,401),
	(11,4,402),
	(12,4,403);

/*!40000 ALTER TABLE `physicalrooms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rooms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;

INSERT INTO `rooms` (`id`, `price`)
VALUES
	(1,38),
	(2,56),
	(3,86),
	(4,2);

/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rooms_lang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rooms_lang`;

CREATE TABLE `rooms_lang` (
  `id` int(11) unsigned NOT NULL,
  `id_lang` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_spanish_ci DEFAULT '',
  PRIMARY KEY (`id`,`id_lang`),
  CONSTRAINT `rooms` FOREIGN KEY (`id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `rooms_lang` WRITE;
/*!40000 ALTER TABLE `rooms_lang` DISABLE KEYS */;

INSERT INTO `rooms_lang` (`id`, `id_lang`, `name`, `description`)
VALUES
	(1,1,'Habitación doble o twin (2 camas)','En nuestras habitaciones standard disfrutará de todo el equipamiento y comodidades que su estancia en Granada merece.'),
	(1,2,'double or twin room (2 beds)','In our standard rooms you will enjoy all the facilities and amenities make your stay in Granada deserves.'),
	(1,3,'chambre double ou twin (2 lits)','Dans nos chambres standard, vous pourrez profiter de toutes les facilites et commodites que votre sejour a Grenade merite.'),
	(1,4,'Doppel- oder Zweibettzimmer (2 Betten) ','In unserem Standard-Zimmern finden Sie alle Annehmlichkeiten genieben und Annehmlichkeiten machen Ihren Aufenthalt in Granada verdient.'),
	(2,1,'Habitación doble superior','Disfrute de una magnifica vista de Plaza Nueva y el centro de Granada desde nuestras habitaciones superiores.'),
	(2,2,'Superior Double Room','Enjoy a magnificent view from Plaza Nueva and the center of Granada from our superior rooms.'),
	(2,3,'Chambre Double Superieure','Profitez d\'une vue magnifique de la Plaza Nueva et du centre de Grenade a partir de nos chambres superieures.'),
	(2,4,'Superior Doppelzimmer ','Genieben Sie einen herrlichen Blick von der Plaza Nueva und dem Zentrum von Granada aus unserer Superior-Zimmer.'),
	(3,1,'Habitacion triple','En nuestras habitaciones triples podrá disfrutar de sus vacaciones en familia o con amigos en el centro de Granada.'),
	(3,2,'Triple room','In our triple rooms can enjoy your holiday with family or friends in the center of Granada.'),
	(3,3,'Triple room','Dans nos chambres triples peuvent profiter de vos vacances en famille ou entre amis dans le centre de Grenade.'),
	(3,4,'Triple-Raum','In unserem Dreibettzimmer konnen Sie Ihren Urlaub mit der Familie oder Freunden im Zentrum von Granada genieben.'),
	(4,1,'Habitación Baratera','Esta es una habitación muy cutre, para probar si esto ba, encima es carísima.'),
	(4,2,'Cheap room','This is a very shabby room, to test whether this ba, above is very expensive.'),
	(4,3,'Room Baratera','Ceci est une piece tres minable, pour verifier si cette ba, ci-dessus est tres cher.'),
	(4,4,'Room merde','Dies ist ein sehr schabige Zimmer, zu prufen, ob diese ba vor sehr teuer ist.');

/*!40000 ALTER TABLE `rooms_lang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services`;

CREATE TABLE `services` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;

INSERT INTO `services` (`id`, `price`)
VALUES
	(1,46),
	(2,26),
	(3,1);

/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table services_lang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `services_lang`;

CREATE TABLE `services_lang` (
  `id` int(11) unsigned NOT NULL,
  `id_lang` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`,`id_lang`),
  CONSTRAINT `services` FOREIGN KEY (`id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `services_lang` WRITE;
/*!40000 ALTER TABLE `services_lang` DISABLE KEYS */;

INSERT INTO `services_lang` (`id`, `id_lang`, `name`, `description`)
VALUES
	(1,1,'Visita a la Alhambra','Descubrirá con nostros la única Ciudad Medieval Musulmana bien conservada del mundo, la Alhambra; visitando sus palacios, Mexuar, Comares, Leones, Generalife; paseando por sus patios, de los Leones, de los Arrayenes, la Reja, la Acequia, la Sultana; y disfrutando de sus jardines, de Partal, de la Medina y por suspuesto del Generalife con sus gracioso juegos de agua, y su laberíntico diseño.'),
	(1,2,'Visit to the Alhambra','You will discover with us the only well-preserved World Muslim medieval city, the Alhambra, visiting palaces, Mexuar, Comares, Leones, Generalife, walking around their yards, Lions, Arrayenes of the Reja, the Acequia, the Sultana;. and enjoying their gardens, Partal, the Medina and the Generalife suspuesto with funny water games, and its labyrinthine design '),
	(1,3,'Visite de l\'Alhambra','Vous découvrirez avec nous la cité médiévale monde musulman que bien conservé, l\'Alhambra, visite des palais, Mexuar, Comares, Leones, Generalife, la marche autour de leurs verges, Lions, Arrayenes de la Reja, la Acequia, la sultane;. et profiter de leurs jardins, Partal, la Médina et la suspuesto Generalife avec des jeux d\'eau drôles, et sa conception labyrinthique '),
	(1,4,'Besuch der Alhambra','Sie werden mit uns entdecken Sie die einzige gut erhaltene Welt muslimischen mittelalterlichen Stadt, die Alhambra, besuchen Paläste, Mexuar, Comares, Leones, Generalife, zu Fuß rund um ihre Höfe, Löwen, Arrayenes der Reja, der Acequia, die Sultana;. und ihre Gärten zu genießen, Partal, die Medina und die Generalife suspuesto mit lustigen Wasserspielen , und seine labyrinthischen Design '),
	(2,1,'Viaje a Sierra Nevada','Podrá disfrutar de paseos por los senderos del parque natural de Sierra Nevada en temporada de verano o de un día de esquí con alquiler de equipo, profesor privado y forfait por un día en temporada de invierno.'),
	(2,2,'Trip to Sierra Nevada','You can enjoy walks along the paths of the natural park of Sierra Nevada in summer or a day of ski equipment rentals, private teacher and ski pass for a day in season of winter.'),
	(2,3,'Voyage à Sierra Nevada ',' Vous pouvez vous promener le long des sentiers du parc naturel de la Sierra Nevada en été ou une journée de location de matériel de ski, professeur privé et forfait de ski pour une journée dans la saison hiver. '),
	(2,4,'Reise nach Sierra Nevada','können Sie Spaziergänge genießen auf den Pfaden des Naturpark der Sierra Nevada im Sommer oder einem Tag der Skiverleih, Privatlehrer und Skipass für einen Tag in der Saison Winter. '),
	(3,1,'Viaje a Albolote','Visita a la carcel de albolote, por solo 1 euro!. con entrada a la celda'),
	(3,2,'Trip to Albolote','Visit to Albolote jail, for only 1 euro !. with entrance to the cell'),
	(3,3,'Trip to Albolote','Visite de Albolote prison, pour seulement 1 euro avec entrée à la cellule!.'),
	(3,4,'Reise nach Albolote ',' Besuchen Gefängnis Albolote, für nur 1 Euro mit Eintritt in die Zelle!.');

/*!40000 ALTER TABLE `services_lang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `role`, `date_add`, `name`, `phone`)
VALUES
	(1,'admin@ernesto.es','c93ccd78b2076528346216b3b2f701e6',1,'2014-04-30 22:00:00','Administrador',''),
	(2,'user@ernesto.es','b5b73fae0d87d8b4e2573105f8fbe7bc',0,'2014-04-30 22:00:00','User',''),
	(21,'eserrano@trevenque.es','b5b73fae0d87d8b4e2573105f8fbe7bc',0,'2016-05-05 18:11:27','Ernesto Serrano','34654594460');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
