-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2017 at 04:12 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ticket`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizaEstado` (IN `EntIdTicket` INT(4), IN `EntDescripcion` VARCHAR(14))  NO SQL
UPDATE Ticket set Ticket.IdEstado=(

select Estado.IdEstado FROM  Estado,Ticket
where Ticket.IdTicket=EntIdTicket
and  Estado.descripcion=EntDescripcion
    )
    where Ticket.IdTicket=EntIdTicket$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InformacionUsuario` (IN `EntIdUsuario` INT(4))  BEGIN
 select Usuario.NombreUsuario,Usuario.Correo,Departamento.Descripcion from Usuario,Departamento where Usuario.IdUsuario=1 and Usuario.IdDepartamento=Departamento.IdDepartamento and Usuario.IdUsuario=EntIdUsuario ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RetornaComentarioTicketEspecifico` (IN `EntIdTicket` INT(10))  BEGIN 
select Administrador.IdUsuario,Comen.Nombre,Comen.Fecha,Comen.Comentario FROM Administrador right join
(
select Usuario.IdUsuario,Usuario.Nombre,TablaComentario.Fecha,TablaComentario.Comentario from Usuario right join ( select Comentario.IdUsuarioComento, Comentario.Fecha,Comentario.Comentario from Comentario where IdTicket=EntIdTicket ) as TablaComentario on Usuario.IdUsuario=TablaComentario.IdUsuarioComento
)as Comen
on Administrador.IdUsuario=Comen.IdUsuario
;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RetornaPorcentajeEstadoTicket` ()  begin 
set @total=(select count(*) from Ticket) ;
select count(IdTicket)/@total as Porcentaje,Estado.IdEstado,Estado.descripcion from Ticket inner join Estado on Ticket.IdEstado = Estado.IdEstado and Estado.IdEstado=1
union
select count(IdTicket)/@total as Porcentaje,Estado.IdEstado,Estado.descripcion from Ticket inner join Estado on Ticket.IdEstado = Estado.IdEstado and Estado.IdEstado=2
union
select count(IdTicket)/@total as Porcentaje,Estado.IdEstado,Estado.descripcion from Ticket inner join Estado on Ticket.IdEstado = Estado.IdEstado and Estado.IdEstado=3
union
select count(IdTicket)/@total as Porcentaje,Estado.IdEstado,Estado.descripcion from Ticket inner join Estado on Ticket.IdEstado = Estado.IdEstado and Estado.IdEstado=4
union
select @total,'Total Tickets','tt';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RetornaTicketEspecifico` (IN `EntIdTicket` INT(4))  BEGIN   select TablaTicket.IdTicket,TablaTicket.NombreUsuario,Estado.Descripcion as Estado,Departamento.Descripcion as Departamento , TablaTicket.Descripcion,TablaTicket.Mensaje,TablaTicket.FechaAlta from Departamento,Estado, ( select Ticket.IdTicket,Usuario.IdUsuario,Usuario.NombreUsuario,Usuario.IdDepartamento,Ticket.IdEstado ,Ticket.Descripcion,Ticket.Mensaje,Ticket.FechaAlta from Ticket inner Join Usuario on Usuario.IdUsuario=Ticket.IdUsuario and Ticket.IdTicket=EntIdTicket )as TablaTicket where Departamento.IdDepartamento=TablaTicket.IdDepartamento and Estado.IdEstado=TablaTicket.IdEstado ; END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RetornaTodosLosTickets` ()  BEGIN  select TablaTicket.IdTicket,TablaTicket.NombreUsuario,Estado.Descripcion as Estado,Departamento.Descripcion as Departamento , TablaTicket.Descripcion,TablaTicket.Mensaje,TablaTicket.FechaAlta from Departamento,Estado, ( select Ticket.IdTicket,Usuario.IdUsuario,Usuario.NombreUsuario,Usuario.IdDepartamento,Ticket.IdEstado ,Ticket.Descripcion,Ticket.Mensaje,Ticket.FechaAlta from Ticket inner Join Usuario on Usuario.IdUsuario=Ticket.IdUsuario )as TablaTicket where Departamento.IdDepartamento=TablaTicket.IdDepartamento and Estado.IdEstado=TablaTicket.IdEstado ; END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UsuarioEsAdministrador` (IN `EntIdUsuario` INT(4))  BEGIN
select 'Administrador',Usuario.IdUsuario from Usuario,Departamento,Administrador where Usuario.IdUsuario = Administrador.IdUsuario and Usuario.IdDepartamento=Departamento.IdDepartamento and Usuario.IdUsuario=EntIdUsuario;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UsuarioExiste` (IN `EntNombreUsuario` VARCHAR(20), IN `EntContrasena` VARCHAR(20))  BEGIN  select Usuario.IdUsuario from Usuario where Usuario.NombreUsuario=EntNombreUsuario and Contrasena=EntContrasena; end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Administrador`
--

CREATE TABLE `Administrador` (
  `IdUsuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Administrador`
--

INSERT INTO `Administrador` (`IdUsuario`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `Comentario`
--

CREATE TABLE `Comentario` (
  `IdComentario` int(10) NOT NULL,
  `IdTicket` int(10) NOT NULL,
  `Comentario` varchar(200) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `IdUsuarioComento` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Comentario`
--

INSERT INTO `Comentario` (`IdComentario`, `IdTicket`, `Comentario`, `Fecha`, `IdUsuarioComento`) VALUES
(1, 1, 'Buenas tardes, lamentamos el inconveniente, mandaremos un técino para arreglar la situación.', '2017-05-21', 1),
(2, 3, 'Buenas tardes,perdona el inconveniente, mandarmos a una persona a cambiar su Mouse deforma inmediata.Gracias por reportar.', '2017-05-21', 1),
(3, 3, 'La Persona que debió de haber llegado hace como media hora simplemento no aparece y necesito trabajar.\r\nPudieran  mandar a otra persona ?', '2017-05-21', 2),
(4, 3, '', '2017-05-28', 1),
(5, 3, 'Perdone, creo que hubo un mal entendido, esa persona debio de haber llegado hace 20 minutos. EN seguida mandaremos a otra persona.\r\nGracias por su paciencia', '2017-05-28', 1),
(6, 3, 'Se nos notificÃ³ que el mouse fue reemplazado. Gracias por su paciencia', '2017-05-28', 1),
(7, 1, 'COmentario', '2017-05-29', 1),
(8, 1, 'Com', '2017-05-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Departamento`
--

CREATE TABLE `Departamento` (
  `IdDepartamento` int(2) NOT NULL,
  `Descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Departamento`
--

INSERT INTO `Departamento` (`IdDepartamento`, `Descripcion`) VALUES
(1, 'Sistemas'),
(2, 'FrontEnd'),
(3, 'BackEnd');

-- --------------------------------------------------------

--
-- Table structure for table `Estado`
--

CREATE TABLE `Estado` (
  `IdEstado` int(4) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Estado`
--

INSERT INTO `Estado` (`IdEstado`, `descripcion`) VALUES
(1, 'Pendiente'),
(2, 'Abierto'),
(3, 'Procesando'),
(4, 'Cerrado');

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

CREATE TABLE `Ticket` (
  `IdTicket` int(10) NOT NULL,
  `IdUsuario` int(10) NOT NULL,
  `FechaAlta` date NOT NULL,
  `IdEstado` int(4) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Mensaje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ticket`
--

INSERT INTO `Ticket` (`IdTicket`, `IdUsuario`, `FechaAlta`, `IdEstado`, `Descripcion`, `Mensaje`) VALUES
(1, 1, '2017-05-21', 1, 'Mi computadora no enciende', ''),
(2, 2, '2017-05-21', 2, 'Falla en conexión a Internet(Permisos Denegados)', ''),
(3, 2, '2017-05-21', 4, 'Mi mouse dejó de funcinar', 'Hola,quize usar mi mouse en la mañana, pero no funcionaba, ya verifiqué la conexión del mouse,pero sigue sin funcionar.');

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `IdUsuario` int(5) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `NombreUsuario` varchar(20) NOT NULL,
  `Contrasena` varchar(10) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `IdDepartamento` int(2) DEFAULT NULL,
  `Correo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`IdUsuario`, `Nombre`, `Apellido`, `NombreUsuario`, `Contrasena`, `Estado`, `IdDepartamento`, `Correo`) VALUES
(1, 'Mats Johann', 'Leal Rangel', 'ddiatlov', '123456', 'Jalisco', 1, 'matsleal@Intel.com'),
(2, 'Pedro', 'Salcido', 'grio', '123456', 'Jalisco', 2, 'grio@INTEL.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- Indexes for table `Comentario`
--
ALTER TABLE `Comentario`
  ADD PRIMARY KEY (`IdComentario`);

--
-- Indexes for table `Departamento`
--
ALTER TABLE `Departamento`
  ADD PRIMARY KEY (`IdDepartamento`);

--
-- Indexes for table `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`IdTicket`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comentario`
--
ALTER TABLE `Comentario`
  MODIFY `IdComentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Departamento`
--
ALTER TABLE `Departamento`
  MODIFY `IdDepartamento` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Estado`
--
ALTER TABLE `Estado`
  MODIFY `IdEstado` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `IdTicket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `IdUsuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
