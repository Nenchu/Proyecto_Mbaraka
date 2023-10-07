-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2018 a las 04:14:14
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectombaraka`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `descripcionCateg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `descripcionCateg`) VALUES
(1, 'Bombachas Hombre'),
(2, 'Bombachas Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `idconsulta` int(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`idconsulta`, `nombre`, `telefono`, `email`, `mensaje`) VALUES
(2, 'maria agostina', '3777678905', 'maritabarrios@gmail.com', 'Hola mi compra cuando me enviarian??'),
(3, 'carolina', '3774456789', 'caro_listorit@hotmail.com', 'hola mundo ja'),
(4, 'Yesica', '3777894523', 'layesi_93@gmail.com', 'Cuando me envian lo solicitado?? espero respuesta.gracias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetalle` int(10) NOT NULL,
  `idEncabezado` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`idDetalle`, `idEncabezado`, `idProducto`, `cantidad`, `precio`) VALUES
(1, 1, 4, 1, '1850.9'),
(2, 1, 1, 1, '1500'),
(3, 2, 4, 2, '1850.9'),
(4, 3, 4, 1, '1850.9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encabezadopedido`
--

CREATE TABLE `encabezadopedido` (
  `idEncabezado` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `total` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encabezadopedido`
--

INSERT INTO `encabezadopedido` (`idEncabezado`, `idUsuario`, `fecha`, `total`) VALUES
(1, 2, '2018-05-27', '3350.9'),
(2, 3, '2018-05-27', '3701.8'),
(3, 2, '2018-05-28', '1850.9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `idprovincia` int(11) NOT NULL,
  `idlocalidad` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`idprovincia`, `idlocalidad`, `descripcion`) VALUES
(1, 1, 'Ciudad Autónoma de Buenos Aires'),
(1, 2, 'Colegiales'),
(1, 3, 'Retiro'),
(1, 4, 'Villa Lugano'),
(1, 5, 'Villa Santa Rita'),
(2, 1, 'Adrogué'),
(2, 2, 'Alberti'),
(2, 3, 'Arrecifes'),
(2, 4, 'Avellaneda'),
(2, 5, 'Ayacucho'),
(2, 6, 'Azul'),
(2, 7, 'Bahía Blanca'),
(2, 8, 'Balcarce'),
(2, 9, 'Baradero'),
(2, 10, 'Belén de Escobar'),
(2, 11, 'Benito Juárez'),
(2, 12, 'Berisso'),
(2, 13, 'Bragado'),
(2, 14, 'Brandsen'),
(2, 15, 'Campana'),
(2, 16, 'Cañuelas'),
(2, 17, 'Capilla del Señor'),
(2, 18, 'Capitán Sarmiento'),
(2, 19, 'Carhué'),
(2, 20, 'Cariló'),
(2, 21, 'Carlos Casares'),
(2, 22, 'Carlos Tejedor'),
(2, 23, 'Carmen de Areco'),
(2, 24, 'Carmen de Patagones'),
(2, 25, 'Caseros'),
(2, 26, 'Castelli'),
(2, 27, 'Chacabuco'),
(2, 28, 'Chascomús'),
(2, 29, 'Chivilcoy'),
(2, 30, 'Colón'),
(2, 31, 'Coronel Dorrego'),
(2, 32, 'Coronel Pringles'),
(2, 33, 'Coronel Suárez'),
(2, 34, 'Coronel Vidal'),
(2, 35, 'Daireaux'),
(2, 36, 'Dolores'),
(2, 37, 'Ensenada'),
(2, 38, 'Ezeiza'),
(2, 39, 'Florencio Varela'),
(2, 40, 'Florentino Ameghino'),
(2, 41, 'General Alvear'),
(2, 42, 'General Arenales'),
(2, 43, 'General Belgrano'),
(2, 44, 'General Conesa'),
(2, 45, 'General Guido'),
(2, 46, 'General Juan Madariaga'),
(2, 47, 'General La Madrid'),
(2, 48, 'General Las Heras'),
(2, 49, 'General Lavalle'),
(2, 50, 'General Pinto'),
(2, 51, 'General Rodríguez'),
(2, 52, 'General San Martín'),
(2, 53, 'General Viamonte'),
(2, 54, 'General Villegas'),
(2, 55, 'Guaminí'),
(2, 56, 'Guernica'),
(2, 57, 'Henderson'),
(2, 58, 'Hurlingham'),
(2, 59, 'Ituzaingó'),
(2, 60, 'Junín'),
(2, 61, 'La Plata'),
(2, 62, 'Lanús'),
(2, 63, 'Laprida'),
(2, 64, 'Las Flores'),
(2, 65, 'Lincoln'),
(2, 66, 'Lobería'),
(2, 67, 'Lobos'),
(2, 68, 'Lomas de Zamora'),
(2, 69, 'Luján'),
(2, 70, 'Magdalena'),
(2, 71, 'Maipú'),
(2, 72, 'Mar del Plata'),
(2, 73, 'Mar del Tuyú'),
(2, 74, 'Marcos Paz'),
(2, 75, 'Médanos'),
(2, 76, 'Mercedes'),
(2, 77, 'Merlo'),
(2, 78, 'Miramar'),
(2, 79, 'Monte Hermoso'),
(2, 80, 'Morón'),
(2, 81, 'Navarro'),
(2, 82, 'Necochea'),
(2, 83, 'Nueve de Julio'),
(2, 84, 'Olavarría'),
(2, 85, 'Olivos'),
(2, 86, 'Pehuajó'),
(2, 87, 'Pellegrini'),
(2, 88, 'Pergamino'),
(2, 89, 'Pigüé'),
(2, 90, 'Pila'),
(2, 91, 'Pilar'),
(2, 92, 'Pinamar'),
(2, 93, 'Pontevedra'),
(2, 94, 'Puan'),
(2, 95, 'Punta Alta'),
(2, 96, 'Quilmes'),
(2, 97, 'Ramallo'),
(2, 98, 'Ranchos'),
(2, 99, 'Rauch'),
(2, 100, 'Rojas'),
(2, 101, 'Roque Pérez'),
(2, 102, 'Saladillo'),
(2, 103, 'Salliqueló'),
(2, 104, 'Salto'),
(2, 105, 'San Andrés de Giles'),
(2, 106, 'San Antonio de Areco'),
(2, 107, 'San Carlos de Bolívar'),
(2, 108, 'San Cayetano'),
(2, 109, 'San Clemente del Tuyú'),
(2, 110, 'San Isidro'),
(2, 112, 'San Miguel del Monte'),
(2, 113, 'San Nicolás de los Arroyos'),
(2, 114, 'San Pedro'),
(2, 115, 'San Vicente'),
(2, 116, 'Santa Catalina - Dique Lujan'),
(2, 117, 'Suipacha'),
(2, 118, 'Tandil'),
(2, 119, 'Tapalqué'),
(2, 120, 'Tigre'),
(2, 121, 'Tornquist'),
(2, 122, 'Trenque Lauquen'),
(2, 123, 'Tres Arroyos'),
(2, 124, 'Tres Lomas'),
(2, 125, 'Vedia'),
(2, 126, 'Veinticinco de Mayo'),
(2, 127, 'Verónica'),
(2, 128, 'Villa Gesell'),
(2, 129, 'Zárate'),
(3, 1, 'Ancasti'),
(3, 2, 'Andalgalá'),
(3, 3, 'Antofagasta de la Sierra'),
(3, 4, 'Bañado de Ovanta'),
(3, 5, 'Belén'),
(3, 6, 'Capayán'),
(3, 7, 'Chumbicha'),
(3, 8, 'El Alto'),
(3, 9, 'El Rodeo'),
(3, 10, 'Esquiú'),
(3, 11, 'Fiambalá'),
(3, 12, 'Hualfín'),
(3, 13, 'Huillapima'),
(3, 14, 'Icaño'),
(3, 15, 'La Merced'),
(3, 16, 'La Puerta'),
(3, 17, 'La Puerta de San José'),
(3, 18, 'Londres'),
(3, 19, 'Los Altos'),
(3, 20, 'Los Varela'),
(3, 21, 'Mutquín'),
(3, 22, 'Pomán'),
(3, 23, 'Puerta de Corral Quemado'),
(3, 24, 'Recreo'),
(3, 25, 'San Antonio'),
(3, 26, 'San Antonio'),
(3, 27, 'San Fernando del Valle de Catamarca'),
(3, 28, 'San Isidro'),
(3, 29, 'San José'),
(3, 30, 'Santa María'),
(3, 31, 'Saujil'),
(3, 32, 'Tinogasta'),
(4, 1, 'Aviá Terai'),
(4, 2, 'Barranqueras'),
(4, 3, 'Basail'),
(4, 4, 'Campo Largo'),
(4, 5, 'Capitán Solari'),
(4, 6, 'Castelli'),
(4, 7, 'Charadai'),
(4, 8, 'Charata'),
(4, 9, 'Chorotis'),
(4, 10, 'Ciervo Petiso'),
(4, 11, 'Colonia Benítez'),
(4, 12, 'Colonia Elisa'),
(4, 13, 'Colonias Unidas'),
(4, 14, 'Concepción del Bermejo'),
(4, 15, 'Coronel Du Graty'),
(4, 16, 'Corzuela'),
(4, 17, 'Coté-Lai'),
(4, 18, 'Fontana'),
(4, 19, 'Gancedo'),
(4, 20, 'General José de San Martín'),
(4, 21, 'General Pinedo'),
(4, 22, 'General Vedia'),
(4, 23, 'Hermoso Campo'),
(4, 24, 'La Clotilde'),
(4, 25, 'La Eduvigis'),
(4, 26, 'La Escondida'),
(4, 27, 'La Leonesa'),
(4, 28, 'La Tigra'),
(4, 29, 'La Verde'),
(4, 30, 'Laguna Limpia'),
(4, 31, 'Lapachito'),
(4, 32, 'Las Breñas'),
(4, 33, 'Las Garcitas'),
(4, 34, 'Los Frentones'),
(4, 35, 'Machagai'),
(4, 36, 'Makallé'),
(4, 37, 'Margarita Belén'),
(4, 38, 'Napenay'),
(4, 39, 'Pampa Almirón'),
(4, 40, 'Pampa del Indio'),
(4, 41, 'Pampa del Infierno'),
(4, 42, 'Presidencia de la Plaza'),
(4, 43, 'Presidencia Roca'),
(4, 44, 'Presidencia Roque Sáenz Peña'),
(4, 45, 'Puerto Bermejo'),
(4, 46, 'Puerto Tirol'),
(4, 47, 'Puerto Vilelas'),
(4, 48, 'Quitilipi'),
(4, 49, 'Resistencia'),
(4, 50, 'Samuhú'),
(4, 51, 'San Bernardo'),
(4, 52, 'Santa Sylvina'),
(4, 53, 'Taco Pozo'),
(4, 54, 'Tres Isletas'),
(4, 55, 'Villa Ángela'),
(4, 56, 'Villa Berthet'),
(5, 1, 'Alto Río Senguer'),
(5, 2, 'Camarones'),
(5, 3, 'Comodoro Rivadavia'),
(5, 4, 'Dolavón'),
(5, 5, 'El Maitén'),
(5, 6, 'Esquel'),
(5, 7, 'Gaimán'),
(5, 8, 'Gastre'),
(5, 9, 'Gobernador Costa'),
(5, 10, 'Hoyo de Epuyén'),
(5, 11, 'José de San Martín'),
(5, 12, 'Lago Puelo'),
(5, 13, 'Las Plumas'),
(5, 14, 'Leleque'),
(5, 15, 'Paso de Indios'),
(5, 16, 'Puerto Madryn'),
(5, 17, 'Rada Tilly'),
(5, 18, 'Rawson'),
(5, 19, 'Río Mayo'),
(5, 20, 'Río Pico'),
(5, 21, 'Sarmiento'),
(5, 22, 'Tecka'),
(5, 23, 'Telsen'),
(5, 24, 'Trelew'),
(5, 25, 'Trevelin'),
(6, 1, 'Achiras'),
(6, 2, 'Adelia María'),
(6, 3, 'Agua de Oro'),
(6, 4, 'Alejandro Roca'),
(6, 5, 'Alejo Ledesma'),
(6, 6, 'Almafuerte'),
(6, 7, 'Alta Gracia'),
(6, 8, 'Altos de Chipión'),
(6, 9, 'Arias'),
(6, 10, 'Arroyito'),
(6, 11, 'Arroyo Cabral'),
(6, 12, 'Balnearia'),
(6, 13, 'Bell Ville'),
(6, 14, 'Berrotarán'),
(6, 15, 'Brinkmann'),
(6, 16, 'Buchardo'),
(6, 17, 'Camilo Aldao'),
(6, 18, 'Canals'),
(6, 19, 'Cañada de Luque'),
(6, 20, 'Capilla del Monte'),
(6, 21, 'Carnerillo'),
(6, 22, 'Carrilobo'),
(6, 23, 'Cavanagh'),
(6, 24, 'Charras'),
(6, 25, 'Chazón'),
(6, 26, 'Cintra'),
(6, 27, 'Colonia La Tordilla'),
(6, 28, 'Colonia San Bartolomé'),
(6, 29, 'Córdoba'),
(6, 30, 'Coronel Baigorria'),
(6, 31, 'Coronel Moldes'),
(6, 32, 'Corral de Bustos'),
(6, 33, 'Corralito'),
(6, 34, 'Cosquín'),
(6, 35, 'Costa Sacate'),
(6, 36, 'Cruz Alta'),
(6, 37, 'Cruz del Eje'),
(6, 38, 'Cuesta Blanca'),
(6, 39, 'Dalmacio Vélez Sársfield'),
(6, 40, 'Deán Funes'),
(6, 41, 'Del Campillo'),
(6, 42, 'Despeñaderos'),
(6, 43, 'Devoto'),
(6, 44, 'Dolores'),
(6, 45, 'El Arañado'),
(6, 46, 'El Tío'),
(6, 47, 'Elena'),
(6, 48, 'Embalse'),
(6, 49, 'Etruria'),
(6, 50, 'General Baldissera'),
(6, 51, 'General Cabrera'),
(6, 52, 'General Levalle'),
(6, 53, 'General Roca'),
(6, 54, 'Guatimozín'),
(6, 55, 'Hernando'),
(6, 56, 'Huanchillas'),
(6, 57, 'Huerta Grande'),
(6, 58, 'Huinca Renancó'),
(6, 59, 'Idiazábal'),
(6, 60, 'Inriville'),
(6, 61, 'Isla Verde'),
(6, 62, 'Italó'),
(6, 63, 'James Craik'),
(6, 64, 'Jesús María'),
(6, 65, 'Justiniano Posse'),
(6, 66, 'La Calera'),
(6, 67, 'La Carlota'),
(6, 68, 'La Cesira'),
(6, 69, 'La Cumbre'),
(6, 70, 'La Falda'),
(6, 71, 'La Francia'),
(6, 72, 'La Granja'),
(6, 73, 'La Para'),
(6, 74, 'La Playosa'),
(6, 75, 'Laborde'),
(6, 76, 'Laboulaye'),
(6, 77, 'Laguna Larga'),
(6, 78, 'Las Acequias'),
(6, 79, 'Las Higueras'),
(6, 80, 'Las Junturas'),
(6, 81, 'Las Perdices'),
(6, 82, 'Las Varas'),
(6, 83, 'Las Varillas'),
(6, 84, 'Leones'),
(6, 85, 'Los Cóndores'),
(6, 86, 'Los Surgentes'),
(6, 87, 'Malagueño'),
(6, 88, 'Malvinas Argentinas'),
(6, 89, 'Marcos Juárez'),
(6, 90, 'Marull'),
(6, 91, 'Mattaldi'),
(6, 92, 'Mendiolaza'),
(6, 93, 'Mina Clavero'),
(6, 94, 'Miramar'),
(6, 95, 'Monte Buey'),
(6, 96, 'Monte Cristo'),
(6, 97, 'Monte Maíz'),
(6, 98, 'Morrison'),
(6, 99, 'Morteros'),
(6, 100, 'Noetinger'),
(6, 101, 'Obispo Trejo'),
(6, 102, 'Oliva'),
(6, 103, 'Oncativo'),
(6, 104, 'Ordóñez'),
(6, 105, 'Pascanas'),
(6, 106, 'Pasco'),
(6, 107, 'Pilar'),
(6, 108, 'Piquillín'),
(6, 109, 'Porteña'),
(6, 110, 'Pozo del Molle'),
(6, 111, 'Quilino'),
(6, 112, 'Río Ceballos'),
(6, 113, 'Río Cuarto'),
(6, 114, 'Río Segundo'),
(6, 115, 'Río Tercero'),
(6, 116, 'Sacanta'),
(6, 117, 'Saldán'),
(6, 118, 'Salsacate'),
(6, 119, 'Salsipuedes'),
(6, 120, 'Sampacho'),
(6, 121, 'San Agustín'),
(6, 122, 'San Antonio de Litín'),
(6, 123, 'San Basilio'),
(6, 124, 'San Carlos'),
(6, 125, 'San Francisco'),
(6, 126, 'San Francisco del Chañar'),
(6, 127, 'San José de la Dormida'),
(6, 128, 'Santa Eufemia'),
(6, 129, 'Santa Magdalena'),
(6, 130, 'Santa Rosa de Calamuchita'),
(6, 131, 'Santa Rosa de Río Primero'),
(6, 132, 'Santiago Temple'),
(6, 133, 'Saturnino M. Laspiur'),
(6, 134, 'Sebastián Elcano'),
(6, 135, 'Serrano'),
(6, 136, 'Serrezuela'),
(6, 137, 'Tancacha'),
(6, 138, 'Ticino'),
(6, 139, 'Tío Pujio'),
(6, 140, 'Toledo'),
(6, 141, 'Ucacha'),
(6, 142, 'Unquillo'),
(6, 143, 'Valle Hermoso'),
(6, 144, 'Viamonte'),
(6, 145, 'Vicuña Mackenna'),
(6, 146, 'Villa Allende'),
(6, 147, 'Villa Ascasubi'),
(6, 148, 'Villa Berna'),
(6, 149, 'Villa Carlos Paz'),
(6, 150, 'Villa Concepción del Tío'),
(6, 151, 'Villa Cura Brochero'),
(6, 152, 'Villa de María'),
(6, 153, 'Villa de Soto'),
(6, 154, 'Villa del Dique'),
(6, 155, 'Villa del Rosario'),
(6, 156, 'Villa del Totoral'),
(6, 157, 'Villa Dolores'),
(6, 158, 'Villa General Belgrano'),
(6, 159, 'Villa Giardino'),
(6, 160, 'Villa Huidobro'),
(6, 161, 'Villa Las Rosas'),
(6, 162, 'Villa María'),
(6, 163, 'Villa Nueva'),
(6, 164, 'Villa Reducción'),
(6, 165, 'Villa Rumipal'),
(6, 166, 'Villa Tulumba'),
(6, 167, 'Villa Valeria'),
(6, 168, 'Wenceslao Escalante'),
(7, 1, 'Alvear'),
(7, 2, 'Bella Vista'),
(7, 3, 'Berón de Astrada'),
(7, 4, 'Bonpland'),
(7, 5, 'Chavarría'),
(7, 6, 'Concepción'),
(7, 7, 'Corrientes'),
(7, 8, 'Cruz de los Milagros'),
(7, 9, 'Curuzú Cuatiá'),
(7, 10, 'Empedrado'),
(7, 11, 'Esquina'),
(7, 12, 'Felipe Yofré'),
(7, 13, 'Garruchos'),
(7, 14, 'Gobernador Ingeniero Valentín Virasoro'),
(7, 15, 'Gobernador Juan E. Martínez'),
(7, 16, 'Goya'),
(7, 17, 'Herlitzka'),
(7, 18, 'Itá Ibaté'),
(7, 19, 'Itatí'),
(7, 20, 'Ituzaingó'),
(7, 21, 'Juan Pujol'),
(7, 22, 'La Cruz'),
(7, 23, 'Libertad'),
(7, 24, 'Lomas de Vallejos'),
(7, 25, 'Loreto'),
(7, 26, 'Mariano I. Loza'),
(7, 27, 'Mburucuyá'),
(7, 28, 'Mercedes'),
(7, 29, 'Mocoretá'),
(7, 30, 'Monte Caseros'),
(7, 31, 'Nuestra Señora del Rosario de Caa Catí'),
(7, 32, 'Nueve de Julio'),
(7, 33, 'Palmar Grande'),
(7, 34, 'Paso de la Patria'),
(7, 35, 'Paso de los Libres'),
(7, 36, 'Pedro R. Fernández'),
(7, 37, 'Perugorría'),
(7, 38, 'Pueblo Libertador'),
(7, 39, 'Riachuelo'),
(7, 40, 'Saladas'),
(7, 41, 'San Carlos'),
(7, 42, 'San Cosme'),
(7, 43, 'San Lorenzo'),
(7, 44, 'San Luis del Palmar'),
(7, 45, 'San Miguel'),
(7, 46, 'San Roque'),
(7, 47, 'Santa Lucía'),
(7, 48, 'Santa Rosa'),
(7, 49, 'Santo Tomé'),
(7, 50, 'Sauce'),
(7, 51, 'Yapeyú'),
(7, 52, 'Yataity Calle'),
(8, 1, 'Aldea San Antonio'),
(8, 2, 'Aranguren'),
(8, 3, 'Bovril'),
(8, 4, 'Caseros'),
(8, 5, 'Ceibas'),
(8, 6, 'Chajarí'),
(8, 7, 'Colón'),
(8, 8, 'Colonia Elía'),
(8, 9, 'Concepción del Uruguay'),
(8, 10, 'Concordia'),
(8, 11, 'Conscripto Bernardi'),
(8, 12, 'Crespo'),
(8, 13, 'Diamante'),
(8, 14, 'Domínguez'),
(8, 15, 'Federación'),
(8, 16, 'Federal'),
(8, 17, 'General Campos'),
(8, 18, 'General Galarza'),
(8, 19, 'General Ramírez'),
(8, 20, 'Gobernador Mansilla'),
(8, 21, 'Gualeguay'),
(8, 22, 'Gualeguaychú'),
(8, 23, 'Hasenkamp'),
(8, 24, 'Hernández'),
(8, 25, 'Herrera'),
(8, 26, 'La Criolla'),
(8, 27, 'La Paz'),
(8, 28, 'Larroque'),
(8, 29, 'Los Charrúas'),
(8, 30, 'Los Conquistadores'),
(8, 31, 'Lucas González'),
(8, 32, 'Maciá'),
(8, 33, 'Nogoyá'),
(8, 34, 'Oro Verde'),
(8, 35, 'Paraná'),
(8, 36, 'Piedras Blancas'),
(8, 37, 'Pronunciamiento'),
(8, 38, 'Puerto Ibicuy'),
(8, 39, 'Puerto Yeruá'),
(8, 40, 'Rosario del Tala'),
(8, 41, 'San Benito'),
(8, 42, 'San Gustavo'),
(8, 43, 'San José de Feliciano'),
(8, 44, 'San Justo'),
(8, 45, 'San Salvador'),
(8, 46, 'Santa Ana'),
(8, 47, 'Santa Anita'),
(8, 48, 'Santa Elena'),
(8, 49, 'Sauce de Luna'),
(8, 50, 'Seguí'),
(8, 51, 'Tabossi'),
(8, 52, 'Ubajay'),
(8, 53, 'Urdinarrain'),
(8, 54, 'Viale'),
(8, 55, 'Victoria'),
(8, 56, 'Villa del Rosario'),
(8, 57, 'Villa Elisa'),
(8, 58, 'Villa Hernandarias'),
(8, 59, 'Villa Mantero'),
(8, 60, 'Villa María Grande'),
(8, 61, 'Villa Paranacito'),
(8, 62, 'Villa Urquiza'),
(8, 63, 'Villaguay'),
(9, 1, 'Clorinda'),
(9, 2, 'Comandante Fontana'),
(9, 3, 'El Colorado'),
(9, 4, 'Espinillo'),
(9, 5, 'Estanislao del Campo'),
(9, 6, 'Formosa'),
(9, 7, 'General Enrique Mosconi'),
(9, 8, 'Herradura'),
(9, 9, 'Ibarreta'),
(9, 10, 'Ingeniero Guillermo N. Juárez'),
(9, 11, 'Laguna Naick-Neck'),
(9, 12, 'Laguna Yema'),
(9, 13, 'Las Lomitas'),
(9, 14, 'Palo Santo'),
(9, 15, 'Pirané'),
(9, 16, 'Pozo del Tigre'),
(9, 17, 'Riacho Eh-Eh'),
(9, 18, 'San Francisco de Laishí'),
(9, 19, 'Villa Escolar'),
(10, 1, 'Abra Pampa'),
(10, 2, 'Caimancito'),
(10, 3, 'Calilegua'),
(10, 4, 'El Aguilar'),
(10, 5, 'El Carmen'),
(10, 6, 'Fraile Pintado'),
(10, 7, 'Humahuaca'),
(10, 8, 'Ingenio La Esperanza'),
(10, 9, 'La Mendieta'),
(10, 10, 'La Quiaca'),
(10, 11, 'Libertador General San Martín'),
(10, 12, 'Maimará'),
(10, 13, 'Palma Sola'),
(10, 14, 'Palpalá'),
(10, 15, 'Rinconada'),
(10, 16, 'San Antonio'),
(10, 17, 'San Pedro'),
(10, 18, 'San Salvador de Jujuy'),
(10, 19, 'Santa Catalina'),
(10, 20, 'Santa Clara'),
(10, 21, 'Susques'),
(10, 22, 'Tilcara'),
(10, 23, 'Tumbaya'),
(10, 24, 'Valle Grande'),
(10, 25, 'Yuto'),
(11, 1, 'Algarrobo del Águila'),
(11, 2, 'Alpachiri'),
(11, 3, 'Alta Italia'),
(11, 4, 'Anguil'),
(11, 5, 'Arata'),
(11, 6, 'Bernardo Larroudé'),
(11, 7, 'Bernasconi'),
(11, 8, 'Caleufú'),
(11, 9, 'Catriló'),
(11, 10, 'Colonia Barón'),
(11, 11, 'Cuchillo Có'),
(11, 12, 'Doblas'),
(11, 13, 'Eduardo Castex'),
(11, 14, 'Embajador Martini'),
(11, 15, 'General Acha'),
(11, 16, 'General Manuel J. Campos'),
(11, 17, 'General Pico'),
(11, 18, 'General San Martín'),
(11, 19, 'Guatraché'),
(11, 20, 'Ingeniero Luiggi'),
(11, 21, 'Intendente Alvear'),
(11, 22, 'Jacinto Arauz'),
(11, 23, 'La Maruja'),
(11, 24, 'Limay Mahuida'),
(11, 25, 'Lonquimay'),
(11, 26, 'Macachín'),
(11, 27, 'Miguel Riglos'),
(11, 28, 'Parera'),
(11, 29, 'Puelches'),
(11, 30, 'Quemú Quemú'),
(11, 31, 'Rancul'),
(11, 32, 'Realicó'),
(11, 33, 'Santa Isabel'),
(11, 34, 'Santa Rosa'),
(11, 35, 'Telén'),
(11, 36, 'Toay'),
(11, 37, 'Trenel'),
(11, 38, 'Uriburu'),
(11, 39, 'Veinticinco de Mayo'),
(11, 40, 'Victorica'),
(11, 41, 'Winifreda'),
(12, 1, 'Aimogasta'),
(12, 2, 'Aminga'),
(12, 3, 'Arauco'),
(12, 4, 'Castro Barros'),
(12, 5, 'Chamical'),
(12, 6, 'Chepes'),
(12, 7, 'Chilecito'),
(12, 8, 'Famatina'),
(12, 9, 'La Rioja'),
(12, 10, 'Malanzán'),
(12, 11, 'Milagro'),
(12, 12, 'Olta'),
(12, 13, 'Patquía'),
(12, 14, 'San Blas de los Sauces'),
(12, 15, 'Sañogasta'),
(12, 16, 'Tama'),
(12, 17, 'Ulapes'),
(12, 18, 'Villa Bustos'),
(12, 19, 'Villa Castelli'),
(12, 20, 'Villa Unión'),
(12, 21, 'Vinchina'),
(13, 1, 'General Alvear'),
(13, 2, 'General Lavalle'),
(13, 3, 'Godoy Cruz'),
(13, 4, 'Junín'),
(13, 5, 'La Consulta'),
(13, 6, 'La Paz'),
(13, 7, 'Las Heras'),
(13, 8, 'Luján de Cuyo'),
(13, 9, 'Maipú'),
(13, 10, 'Malargüe'),
(13, 11, 'Mendoza'),
(13, 12, 'Rivadavia'),
(13, 13, 'San Martín'),
(13, 14, 'San Rafael'),
(13, 15, 'Santa Rosa'),
(13, 16, 'Tunuyán'),
(13, 17, 'Tupungato'),
(13, 18, 'Villa Nueva'),
(14, 1, 'Alba Posse'),
(14, 2, 'Almafuerte'),
(14, 3, 'Apóstoles'),
(14, 4, 'Aristóbulo del Valle'),
(14, 5, 'Arroyo del Medio'),
(14, 6, 'Azara'),
(14, 7, 'Bernardo de Irigoyen'),
(14, 8, 'Bonpland'),
(14, 9, 'Campo Grande'),
(14, 10, 'Campo Ramón'),
(14, 11, 'Campo Viera'),
(14, 12, 'Candelaria'),
(14, 13, 'Capioví'),
(14, 14, 'Caraguatay'),
(14, 15, 'Cerro Azul'),
(14, 16, 'Cerro Corá'),
(14, 17, 'Colonia Aurora'),
(14, 18, 'Colonia Wanda'),
(14, 19, 'Concepción de la Sierra'),
(14, 20, 'Dos Arroyos'),
(14, 21, 'Dos de Mayo'),
(14, 22, 'El Alcázar'),
(14, 23, 'El Soberbio'),
(14, 24, 'Eldorado'),
(14, 25, 'Florentino Ameghino'),
(14, 26, 'Garuhapé'),
(14, 27, 'Garupá'),
(14, 28, 'General Alvear'),
(14, 29, 'Gobernador Roca'),
(14, 30, 'Guaraní'),
(14, 31, 'Jardín América'),
(14, 32, 'Leandro N. Alem'),
(14, 33, 'Loreto'),
(14, 34, 'Los Helechos'),
(14, 35, 'Mártires'),
(14, 36, 'Mojón Grande'),
(14, 37, 'Montecarlo'),
(14, 38, 'Oberá'),
(14, 39, 'Panambí'),
(14, 40, 'Picada Gobernador López'),
(14, 41, 'Posadas'),
(14, 42, 'Puerto Eldorado'),
(14, 43, 'Puerto Esperanza'),
(14, 44, 'Puerto Iguazú'),
(14, 45, 'Puerto Leoni'),
(14, 46, 'Puerto Libertad'),
(14, 47, 'Puerto Piray'),
(14, 48, 'Puerto Rico'),
(14, 49, 'Ruiz de Montoya'),
(14, 50, 'San Ignacio'),
(14, 51, 'San Javier'),
(14, 52, 'San José'),
(14, 53, 'San Pedro'),
(14, 54, 'San Vicente'),
(14, 55, 'Santa Ana'),
(14, 56, 'Santa María'),
(14, 57, 'Santo Pipó'),
(14, 58, 'Tres Capones'),
(14, 59, 'Veinticinco de Mayo'),
(15, 1, 'Aluminé'),
(15, 2, 'Andacollo'),
(15, 3, 'Añelo'),
(15, 4, 'Barrancas'),
(15, 5, 'Buta Ranquil'),
(15, 6, 'Centenario'),
(15, 7, 'Chos Malal'),
(15, 8, 'Cutral-Có'),
(15, 9, 'El Huecú'),
(15, 10, 'Junín de los Andes'),
(15, 11, 'Las Coloradas'),
(15, 12, 'Las Lajas'),
(15, 13, 'Las Ovejas'),
(15, 14, 'Loncopué'),
(15, 15, 'Mariano Moreno'),
(15, 16, 'Neuquén'),
(15, 17, 'Picún Leufú'),
(15, 18, 'Piedra del Águila'),
(15, 19, 'Plaza Huincul'),
(15, 20, 'Plottier'),
(15, 21, 'San Martín de los Andes'),
(15, 22, 'Senillosa'),
(15, 23, 'Villa La Angostura'),
(15, 24, 'Vista Alegre'),
(15, 25, 'Zapala'),
(16, 1, 'Allen'),
(16, 2, 'Catriel'),
(16, 3, 'Cervantes'),
(16, 4, 'Chichinales'),
(16, 5, 'Chimpay'),
(16, 6, 'Choele Choel'),
(16, 7, 'Cinco Saltos'),
(16, 8, 'Cipolletti'),
(16, 9, 'Comallo'),
(16, 10, 'Contraalmirante Cordero'),
(16, 11, 'Coronel Belisle'),
(16, 12, 'Darwin'),
(16, 13, 'El Bolsón'),
(16, 14, 'El Cuy'),
(16, 15, 'Fray Luis Beltrán'),
(16, 16, 'General Conesa'),
(16, 17, 'General Enrique Godoy'),
(16, 18, 'General Fernández Oro'),
(16, 19, 'General Roca'),
(16, 20, 'Ingeniero Jacobacci'),
(16, 21, 'Ingeniero Luis A. Huergo'),
(16, 22, 'Lamarque'),
(16, 23, 'Los Menucos'),
(16, 24, 'Mainque'),
(16, 25, 'Maquinchao'),
(16, 26, 'Ñorquinco'),
(16, 27, 'Pilcaniyeu'),
(16, 28, 'Río Colorado'),
(16, 29, 'San Antonio Oeste'),
(16, 30, 'San Carlos de Bariloche'),
(16, 31, 'Sierra Colorada'),
(16, 32, 'Sierra Grande'),
(16, 33, 'Valcheta'),
(16, 34, 'Viedma'),
(16, 35, 'Villa Regina'),
(17, 1, 'Apolinario Saravia'),
(17, 2, 'Cachí'),
(17, 3, 'Cafayate'),
(17, 4, 'Campo Quijano'),
(17, 5, 'Cerrillos'),
(17, 6, 'Chicoana'),
(17, 7, 'El Carril'),
(17, 8, 'El Galpón'),
(17, 9, 'El Quebrachal'),
(17, 10, 'Embarcación'),
(17, 11, 'General Enrique Mosconi'),
(17, 12, 'General Martín Miguel de Güemes'),
(17, 13, 'Guachipas'),
(17, 14, 'Iruya'),
(17, 15, 'Joaquín V. González'),
(17, 16, 'La Caldera'),
(17, 17, 'La Candelaria'),
(17, 18, 'La Poma'),
(17, 19, 'La Viña'),
(17, 20, 'Las Lajitas'),
(17, 21, 'Metán'),
(17, 22, 'Molinos'),
(17, 23, 'Rivadavia'),
(17, 24, 'Rosario de la Frontera'),
(17, 25, 'Rosario de Lerma'),
(17, 26, 'Salta'),
(17, 27, 'San Antonio de los Cobres'),
(17, 28, 'San Carlos'),
(17, 29, 'San Ramón de la Nueva Orán'),
(17, 30, 'Santa Rosa de Tastil'),
(17, 31, 'Santa Victoria'),
(17, 32, 'Tartagal'),
(18, 1, 'Albardón'),
(18, 2, 'Calingasta'),
(18, 3, 'Caucete'),
(18, 4, 'Chimbas'),
(18, 5, 'Nueve de Julio'),
(18, 6, 'Pocito'),
(18, 7, 'Rivadavia'),
(18, 8, 'Rodeo'),
(18, 9, 'San Agustín de Valle Fértil'),
(18, 10, 'San José de Jáchal'),
(18, 11, 'San Juan'),
(18, 12, 'San Martín'),
(18, 13, 'Santa Lucía'),
(18, 14, 'Tamberías'),
(18, 15, 'Villa Aberastain'),
(18, 16, 'Villa Basilio Nievas'),
(18, 17, 'Villa del Salvador'),
(18, 18, 'Villa Krause'),
(18, 19, 'Villa Media Agua'),
(18, 20, 'Villa Paula de Sarmiento'),
(18, 21, 'Villa San Isidro'),
(18, 22, 'Villa Santa Rosa'),
(19, 1, 'Buena Esperanza'),
(19, 2, 'Candelaria'),
(19, 3, 'Concarán'),
(19, 4, 'Justo Daract'),
(19, 5, 'La Punta'),
(19, 6, 'La Toma'),
(19, 7, 'Libertador General San Martín'),
(19, 8, 'Luján'),
(19, 9, 'Merlo'),
(19, 10, 'Naschel'),
(19, 11, 'San Francisco del Monte de Oro'),
(19, 12, 'San Luis'),
(19, 13, 'Santa Rosa del Conlara'),
(19, 14, 'Tilisarao'),
(19, 15, 'Unión'),
(19, 16, 'Villa General Roca'),
(19, 17, 'Villa Mercedes'),
(20, 1, '28 de Noviembre'),
(20, 2, 'Caleta Olivia'),
(20, 3, 'Comandante Luis Piedra Buena'),
(20, 4, 'El Calafate'),
(20, 5, 'Gobernador Gregores'),
(20, 6, 'Las Heras'),
(20, 7, 'Los Antiguos'),
(20, 8, 'Perito Moreno'),
(20, 9, 'Pico Truncado'),
(20, 10, 'Puerto Deseado'),
(20, 11, 'Puerto Santa Cruz'),
(20, 12, 'Río Gallegos'),
(20, 13, 'Río Turbio'),
(20, 14, 'San Julián'),
(20, 15, 'Yacimiento Río Turbio'),
(21, 1, 'Armstrong'),
(21, 2, 'Arroyo Seco'),
(21, 3, 'Arrufó'),
(21, 4, 'Avellaneda'),
(21, 5, 'Bella Italia'),
(21, 6, 'Calchaquí'),
(21, 7, 'Cañada de Gómez'),
(21, 8, 'Capitán Bermúdez'),
(21, 9, 'Carcarañá'),
(21, 10, 'Casilda'),
(21, 11, 'Ceres'),
(21, 12, 'Chañar Ladeado'),
(21, 13, 'Coronda'),
(21, 14, 'El Trébol'),
(21, 15, 'Esperanza'),
(21, 16, 'Firmat'),
(21, 17, 'Fray Luis A. Beltrán'),
(21, 18, 'Funes'),
(21, 19, 'Gálvez'),
(21, 20, 'Gobernador Gálvez'),
(21, 21, 'Granadero Baigorria'),
(21, 22, 'Helvecia'),
(21, 23, 'Hersilia'),
(21, 24, 'Laguna Paiva'),
(21, 25, 'Las Parejas'),
(21, 26, 'Las Rosas'),
(21, 27, 'Las Toscas'),
(21, 28, 'Malabrigo'),
(21, 29, 'Melincué'),
(21, 30, 'Pérez'),
(21, 31, 'Rafaela'),
(21, 32, 'Reconquista'),
(21, 33, 'Recreo'),
(21, 34, 'Roldán'),
(21, 35, 'Rosario'),
(21, 36, 'Rufino'),
(21, 37, 'San Carlos Centro'),
(21, 38, 'San Cristóbal'),
(21, 39, 'San Javier'),
(21, 40, 'San Jorge'),
(21, 41, 'San Justo'),
(21, 42, 'San Lorenzo'),
(21, 43, 'Santa Fe de la Vera Cruz'),
(21, 44, 'Santo Tomé'),
(21, 45, 'Sastre'),
(21, 46, 'Sunchales'),
(21, 47, 'Tostado'),
(21, 48, 'Totoras'),
(21, 49, 'Venado Tuerto'),
(21, 50, 'Vera'),
(21, 51, 'Villa Cañás'),
(21, 52, 'Villa Constitución'),
(21, 53, 'Villa Ocampo'),
(21, 54, 'Villa Trinidad'),
(22, 1, 'Añatuya'),
(22, 2, 'Arraga'),
(22, 3, 'Bandera'),
(22, 4, 'Beltrán'),
(22, 5, 'Brea Pozo'),
(22, 6, 'Campo Gallo'),
(22, 7, 'Clodomira'),
(22, 8, 'Colonia Dora'),
(22, 9, 'El Hoyo'),
(22, 10, 'El Simbolar'),
(22, 11, 'Fernández'),
(22, 12, 'Frías'),
(22, 13, 'Garza'),
(22, 14, 'Herrera'),
(22, 15, 'La Banda'),
(22, 16, 'La Cañada'),
(22, 17, 'Los Juríes'),
(22, 18, 'Los Telares'),
(22, 19, 'Monte Quemado Airport'),
(22, 20, 'Nueva Esperanza'),
(22, 21, 'Pampa de los Guanacos'),
(22, 22, 'Pozo Hondo'),
(22, 23, 'Quimilí'),
(22, 24, 'San Pedro'),
(22, 25, 'Santiago del Estero'),
(22, 26, 'Selva'),
(22, 27, 'Sumampa'),
(22, 28, 'Suncho Corral'),
(22, 29, 'Termas de Río Hondo'),
(22, 30, 'Tintina'),
(22, 31, 'Villa Atamisqui'),
(22, 32, 'Villa General Mitre'),
(22, 33, 'Villa Ojo de Agua'),
(22, 34, 'Villa Unión'),
(23, 1, 'Río Grande'),
(23, 2, 'Ushuaia'),
(24, 1, 'Aguilares'),
(24, 2, 'Alderetes'),
(24, 3, 'Banda del Río Salí'),
(24, 4, 'Bella Vista'),
(24, 5, 'Burruyacú'),
(24, 6, 'Concepción'),
(24, 7, 'Famaillá'),
(24, 8, 'Graneros'),
(24, 9, 'La Cocha'),
(24, 10, 'Monteros'),
(24, 11, 'San Isidro de Lules'),
(24, 12, 'San Miguel de Tucumán'),
(24, 13, 'Simoca'),
(24, 14, 'Tafí del Valle'),
(24, 15, 'Tafí Viejo'),
(24, 16, 'Trancas'),
(24, 17, 'Yerba Buena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `precio` text NOT NULL,
  `estado` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `descripcion`, `idCategoria`, `stock`, `imagen`, `precio`, `estado`) VALUES
(1, 'Bombacha Gabardina Hombre', 1, 3, 'assets/images/BombachasH1.jpg', '1500', 1),
(2, 'Bombacha Corderoy hombre', 1, 3, 'assets/images/BombachasH4.jpg', '2000', 1),
(3, 'Bombacha Hombre bolsillo pampa', 1, 5, 'assets/images/BombachasH2.jpg', '1850', 1),
(4, 'Bombachas Lisas colores varios Mujer', 2, 0, 'assets/images/BombachasM3.jpg', '1850.90', 1),
(5, 'Bombachas Bordadas Mujer (varios colores)', 2, 6, 'assets/images/BombachasM1.jpg', '1500.80', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `idprovincia` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `km2` int(11) DEFAULT NULL,
  `cantdptos` int(11) DEFAULT NULL,
  `poblacion` int(11) DEFAULT NULL,
  `nomcabe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idprovincia`, `descripcion`, `km2`, `cantdptos`, `poblacion`, `nomcabe`) VALUES
(1, 'Capital Federal', 203, 1, 2891082, 'Capital Federal'),
(2, 'Buenos Aires', 307571, 127, 15594428, 'La Plata'),
(3, 'Catamarca', 102602, 16, 367820, 'San Fernando del Valle de Catamarca'),
(4, 'Chaco', 99633, 24, 1053466, 'Resistencia'),
(5, 'Chubut', 224686, 15, 506668, 'Rawson'),
(6, 'Córdoba', 165321, 26, 3304825, 'Córdoba'),
(7, 'Corrientes', 88199, 25, 993338, 'Corrientes'),
(8, 'Entre Rios', 78781, 16, 1236300, 'Paraná'),
(9, 'Formosa', 72066, 9, 527895, 'Formosa'),
(10, 'Jujuy', 53219, 16, 672260, 'San Salvador de Jujuy'),
(11, 'La Pampa', 14344, 22, 316940, 'Santa Rosa'),
(12, 'La Rioja', 8968, 10, 331847, 'La Rioja'),
(13, 'Mendoza', 148827, 10, 1741610, 'Mendoza'),
(14, 'Misiones', 29801, 17, 1097829, 'Posadas'),
(15, 'Neuquén', 94078, 16, 550344, 'Neuquén'),
(16, 'Río Negro', 203013, 10, 633374, 'Viedma'),
(17, 'Salta', 155488, 23, 1215207, 'Salta'),
(18, 'San Juan', 89651, 19, 680427, 'San Juan'),
(19, 'San Luis', 76748, 9, 431588, 'San Luis'),
(20, 'Santa Cruz', 243943, 7, 272524, 'Río Gallegos'),
(21, 'Santa Fe', 133007, 19, 3200736, 'Santa Fe'),
(22, 'Santiago del Estero', 106351, 27, 896461, 'Santiago del Estero'),
(23, 'Tierra del Fuego', 21263, 4, 126190, 'Ushuaia'),
(24, 'Tucuman', 22524, 17, 1448200, 'San Miguel de Tucumán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(10) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(8) NOT NULL,
  `dni` int(8) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contrasena` varchar(8) NOT NULL,
  `idRol` int(10) NOT NULL DEFAULT '2',
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `dni`, `nombre`, `apellido`, `email`, `contrasena`, `idRol`, `estado`) VALUES
(3, 25890678, 'Maria Agostina', 'Barrios', 'maritabarrios@gmail.com', 'mari567', 2, 1),
(2, 28678345, 'Graciela Susana', 'Gomez', 'graGomez@hotmail.com', '123456', 2, 1),
(1, 31210691, 'Nancy Elizabet', 'Rivero', 'nenchu_22@hotmail.com', 'nen123', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idconsulta`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetalle`);

--
-- Indices de la tabla `encabezadopedido`
--
ALTER TABLE `encabezadopedido`
  ADD PRIMARY KEY (`idEncabezado`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`idprovincia`,`idlocalidad`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idprovincia`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `id_Usuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idconsulta` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetalle` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `encabezadopedido`
--
ALTER TABLE `encabezadopedido`
  MODIFY `idEncabezado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `FK_localidad_pcia` FOREIGN KEY (`idprovincia`) REFERENCES `provincia` (`idprovincia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
