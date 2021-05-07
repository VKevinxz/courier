
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE DATABASE IF NOT EXISTS `xbussines` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `xbussines`;


DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente` varchar(80) DEFAULT NULL,
  `dnicliente` int(8) DEFAULT NULL,
  `ubicacion` varchar(40) DEFAULT NULL,
  `fechapedido` date DEFAULT NULL,
  `fechaentrega` datetime DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `importetotal` float DEFAULT NULL,
  `estado` varchar(60) DEFAULT NULL,
  `lista` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `detallepedido`;
CREATE TABLE `detallepedido` (
  `id` int(11) NOT NULL,
  `tipo` varchar(35) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `fechavencimiento` date DEFAULT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `precio` varchar(10) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `correo` varchar(70) DEFAULT NULL,
  `contraseña` varchar(70) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
