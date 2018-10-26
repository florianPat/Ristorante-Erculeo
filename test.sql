-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 26. Okt 2018 um 13:48
-- Server-Version: 10.1.36-MariaDB
-- PHP-Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `test`
--

DELIMITER $$
--
-- Prozeduren
--
CREATE DEFINER=`` PROCEDURE `AddGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64), `t_srid` INT)  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' ADD ', geometry_column,' GEOMETRY REF_SYSTEM_ID=', t_srid); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

CREATE DEFINER=`` PROCEDURE `DropGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64))  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' DROP ', geometry_column); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`, `name`, `size`, `time`) VALUES
(2, 1, 1, '2018-10-25 08:30:20'),
(3, 1, 7, '2018-10-25 08:34:38'),
(4, 1, 7, '2018-10-25 08:39:07'),
(5, 1, 7, '2018-10-25 08:40:11'),
(6, 1, 7, '2018-10-25 08:41:15'),
(7, 1, 7, '2018-10-25 08:43:25'),
(8, 1, 7, '2018-10-25 08:43:43'),
(9, 1, 7, '2018-10-25 08:46:23'),
(10, 1, 7, '2018-10-25 08:47:01'),
(11, 1, 7, '2018-10-25 08:50:55'),
(12, 1, 7, '2018-10-25 08:51:36'),
(13, 1, 7, '2018-10-25 08:52:17'),
(14, 1, 7, '2018-10-25 08:52:42'),
(15, 1, 7, '2018-10-25 08:52:52'),
(16, 1, 7, '2018-10-25 08:53:09'),
(17, 1, 7, '2018-10-25 08:53:48'),
(18, 1, 7, '2018-10-25 08:55:17'),
(19, 1, 7, '2018-10-25 08:55:40'),
(20, 1, 7, '2018-10-25 08:55:58'),
(21, 1, 7, '2018-10-25 08:56:11'),
(22, 1, 7, '2018-10-25 08:56:30'),
(23, 1, 7, '2018-10-25 08:56:59'),
(24, 1, 7, '2018-10-25 08:57:11'),
(25, 1, 7, '2018-10-25 08:57:24'),
(26, 1, 7, '2018-10-25 08:58:04'),
(27, 1, 7, '2018-10-25 08:58:10'),
(28, 1, 7, '2018-10-25 08:58:16'),
(29, 1, 7, '2018-10-25 08:58:21'),
(30, 1, 1, '2018-10-25 09:00:34'),
(31, 1, 1, '2018-10-25 09:10:27'),
(37, 1, 7, '2018-10-25 12:03:49'),
(38, 1, 1, '2018-10-25 12:05:01'),
(39, 1, 7, '2018-10-25 12:06:19'),
(41, 1, 1, '2018-10-25 12:46:04'),
(42, 1, 1, '2018-10-25 13:21:29'),
(43, 1, 1, '2018-10-25 13:21:46'),
(44, 1, 1, '2018-10-25 13:22:34'),
(45, 1, 1, '2018-10-25 13:22:55'),
(46, 1, 1, '2018-10-25 13:23:14'),
(47, 1, 1, '2018-10-25 13:26:52'),
(48, 1, 1, '2018-10-25 13:27:04'),
(49, 1, 1, '2018-10-25 13:27:17'),
(50, 1, 1, '2018-10-25 13:29:04'),
(51, 1, 1, '2018-10-25 13:43:08'),
(52, 1, 1, '2018-10-25 13:43:51'),
(53, 1, 1, '2018-10-25 13:44:27'),
(54, 1, 1, '2018-10-25 13:44:53'),
(55, 1, 1, '2018-10-25 13:45:25'),
(56, 1, 1, '2018-10-25 13:45:55'),
(57, 1, 1, '2018-10-25 13:51:23'),
(60, 1, 1, '2018-10-25 13:55:51'),
(61, 1, 1, '2018-10-25 14:18:48'),
(62, 1, 1, '2018-10-25 14:20:24'),
(63, 1, 1, '2018-10-25 14:21:10'),
(64, 1, 1, '2018-10-25 14:21:33'),
(65, 1, 1, '2018-10-25 14:26:32'),
(66, 1, 1, '2018-10-25 14:30:51'),
(67, 1, 1, '2018-10-25 14:31:25'),
(68, 1, 1, '2018-10-25 14:33:02'),
(69, 1, 1, '2018-10-25 14:34:05'),
(70, 1, 1, '2018-10-25 14:34:36'),
(71, 1, 1, '2018-10-25 14:34:56'),
(72, 1, 1, '2018-10-25 14:35:29'),
(73, 1, 1, '2018-10-25 14:35:55'),
(74, 1, 1, '2018-10-26 08:00:27');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `ingredients` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `price`, `image`, `description`, `ingredients`) VALUES
(1, 'dfajkfh', 45.7, 'sadfe', 'Hakfjdsaf', 'jadsfhlsda, fdasjkfh');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 'small'),
(7, 'medium'),
(8, 'large');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pizza` (`name`),
  ADD KEY `size` (`size`);

--
-- Indizes für die Tabelle `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT für Tabelle `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`name`) REFERENCES `pizza` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`size`) REFERENCES `sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
