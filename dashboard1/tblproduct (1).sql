-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2016 at 09:13 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phppot_examples`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `quantity`) VALUES
(1, 'Buku', '0001', 'BUKU.jpg', 10.00, 15),
(2, 'Dragon Cheese', '0002', 'dragoncheese.jpg', 10.00, 10),
(3, 'Buah', '0003', 'BUAH.jpg', 10.00, 10),
(4, 'Cadbury', '0004', 'cadburry.jpg', 40.00, 10),
(5, 'Coklat', '0005', 'Holiday Inn.jpg', 20.00, 10),
(6, 'Lapis Oreo', '0006', 'LAPIS OREO.jpg', 30.00, 10),
(7, 'Nur Kasih', '0007', 'Nur Kasih.jpg', 10.00, 10),
(8, 'Madu Tiga', '0008', 'MADU TIGA.jpg', 20.00, 10),
(9, 'Ombak Rindu', '0009', 'Ombak Rindu.jpg', 20.00, 10),
(10, 'Sisik Ikan', '0010', 'SISIK IKAN.jpg', 20.00, 10),
(11, 'Tiga Rasa', '0011', 'TIGA RASA.jpg', 10.00, 10),
(12, 'Tiga Serangkai', '0012', 'TIGA SERANGKAI.jpg', 20.00, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
