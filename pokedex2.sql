-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 04:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokedex2`
--

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `id_gym` int(10) NOT NULL,
  `gym_leader` varchar(50) NOT NULL,
  `spesialis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`id_gym`, `gym_leader`, `spesialis`) VALUES
(1, 'roxanne', 'rock'),
(2, 'brawly', 'fighting'),
(3, 'wattson', 'electric'),
(4, 'flannery', 'fire'),
(5, 'norman', 'normal'),
(6, 'winona', 'flying'),
(7, 'tate&liza', 'psychic'),
(8, 'wallace', 'water');

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `id_index` int(10) NOT NULL,
  `nama_pokemon` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `id_trainer` int(10) NOT NULL,
  `id_gym` int(10) NOT NULL,
  `id_villain` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`id_index`, `nama_pokemon`, `tipe`, `id_trainer`, `id_gym`, `id_villain`) VALUES
(1, 'treeko', 'grass', 1, 2, 1),
(2, 'GROVYLE', 'grass', 1, 2, 2),
(3, 'sceptile', 'Grass', 1, 1, 1),
(4, 'Torchic', 'Fire', 2, 1, 2),
(5, 'Combusken', 'FIRE, fighting', 2, 3, 2),
(6, 'Blaziken', 'fire, Fighting', 2, 4, 1),
(7, 'mudkip', 'water', 2, 1, 2),
(8, 'Marshtomp', 'water, GROUND', 2, 2, 1),
(27, 'Wingull', 'water, Flying', 1, 2, 2),
(28, 'Pelipper', 'water, FLYING', 1, 6, 2),
(29, 'RALTS', 'psychic, Fairy', 3, 5, 1),
(30, 'Kirlia', 'Psychic, Fairy', 3, 5, 1),
(31, 'gardevoir', 'psychic, FAIRY', 3, 8, 1),
(32, 'Gallade', 'PSYCHIC, fighting', 3, 8, 1),
(156, 'Tropius', 'grass, flying', 1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id_trainer` int(10) NOT NULL,
  `nama_trainer` varchar(50) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id_trainer`, `nama_trainer`, `id_user`) VALUES
(1, 'Brendan', 1),
(2, 'MAY', 2),
(3, 'Wally', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpassword` varchar(50) NOT NULL,
  `level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `userpassword`, `level`) VALUES
(1, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 1),
(2, 'user2', '7e58d63b60197ceb55a1c487989a3720', 2),
(3, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 3);

-- --------------------------------------------------------

--
-- Table structure for table `villain`
--

CREATE TABLE `villain` (
  `id_villain` int(10) NOT NULL,
  `nama_grup` varchar(50) NOT NULL,
  `villain_leader` varchar(50) NOT NULL,
  `obsesi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `villain`
--

INSERT INTO `villain` (`id_villain`, `nama_grup`, `villain_leader`, `obsesi`) VALUES
(1, 'AQUA', 'archie', 'expand'),
(2, 'magma', 'maxie', 'expand the land');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`id_gym`);

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id_index`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id_trainer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `villain`
--
ALTER TABLE `villain`
  ADD PRIMARY KEY (`id_villain`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
