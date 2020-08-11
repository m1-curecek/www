-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2020 at 01:55 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knizni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kdb_autor`
--

CREATE TABLE `kdb_autor` (
  `id_autora` int(11) NOT NULL,
  `jmeno` text NOT NULL,
  `prijmeni` text NOT NULL,
  `rok_narozeni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kdb_autor`
--

INSERT INTO `kdb_autor` (`id_autora`, `jmeno`, `prijmeni`, `rok_narozeni`) VALUES
(5, 'JmenoAutora1', 'PrijmeniAutora1', 1984),
(7, 'JmenoAutora2', 'PrijmeniAutora2', 1944),
(8, 'JmenoAutora3', 'PrijmeniAutora3', 1999),
(9, 'JmenoAutora4', 'PrijmeniAutora4', 2000),
(10, 'JmenoAutora5', 'PrijmeniAutora5', 1899),
(11, 'JmenoAutora6', 'PrijmeniAutora6', 1600),
(12, 'JmenoAutora7', 'PrijmeniAutora7', 1999),
(13, 'JmenoAutora8', 'PrijmeniAutora8', 2000),
(14, 'JmenoAutora9', 'PrijmeniAutora9', 1865),
(15, 'JmenoAutora10', 'PrijmeniAutora10', 1888);

-- --------------------------------------------------------

--
-- Table structure for table `kdb_knihy`
--

CREATE TABLE `kdb_knihy` (
  `id_kniha` int(11) NOT NULL,
  `nazev` text NOT NULL,
  `jazyk` text NOT NULL,
  `pocet_stran` int(11) NOT NULL,
  `rok_vydani` int(11) NOT NULL,
  `zanr` text NOT NULL,
  `id_autora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kdb_knihy`
--

INSERT INTO `kdb_knihy` (`id_kniha`, `nazev`, `jazyk`, `pocet_stran`, `rok_vydani`, `zanr`, `id_autora`) VALUES
(10, 'Kniha1', 'Česky', 121, 1990, 'zanr1', 5),
(12, 'Kniha2', 'Česky', 1544, 1900, 'Science fiction', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kdb_autor`
--
ALTER TABLE `kdb_autor`
  ADD PRIMARY KEY (`id_autora`);

--
-- Indexes for table `kdb_knihy`
--
ALTER TABLE `kdb_knihy`
  ADD PRIMARY KEY (`id_kniha`),
  ADD KEY `id_autora` (`id_autora`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kdb_autor`
--
ALTER TABLE `kdb_autor`
  MODIFY `id_autora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kdb_knihy`
--
ALTER TABLE `kdb_knihy`
  MODIFY `id_kniha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kdb_knihy`
--
ALTER TABLE `kdb_knihy`
  ADD CONSTRAINT `kdb_knihy_ibfk_1` FOREIGN KEY (`id_autora`) REFERENCES `kdb_autor` (`id_autora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
