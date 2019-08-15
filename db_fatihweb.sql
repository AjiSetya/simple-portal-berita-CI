-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2019 at 09:06 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fatihweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `id_news` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `news` text NOT NULL,
  `datetime` datetime NOT NULL,
  `img` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` enum('draf','post') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id_news`, `title`, `news`, `datetime`, `img`, `category`, `status`) VALUES
(1, 'Sauqi Belajar', '<p style=\"text-align: left;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2019-03-17 00:00:00', 'sauki.png', 'belajar', 'post'),
(2, 'Fatihnn', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', '2019-03-29 23:06:40', 'fatih.png', 'makan', 'post'),
(5, 'Kakikaki', '<p>vbvcbvbvbvcbvcb</p>\r\n', '2019-03-31 00:41:48', 'hijau2.png', 'game', 'post'),
(6, 'ghfghgfhg', '<p>fghfghgdfdgdfgsdfsdf</p>\r\n', '2019-03-31 00:42:35', 'merah.png', 'game', 'post'),
(8, 'tututut', '<p>tututut</p>\r\n', '2019-06-03 09:08:25', 'udemy_downloader.png', 'game', 'post'),
(9, 'Kakikaki', '<p>m bnmn</p>\r\n', '2019-03-30 23:38:43', 'biru1.png', 'game', 'post'),
(12, 'mamam', '<p>mama mamam</p>\r\n', '2019-06-14 14:43:15', 'gado-gado.jpg', 'makanan', 'post'),
(14, 'rarariri', 'sdfdksfjsdfjkhdjkfhdsjkfhdsjhfdjkh', '2019-06-16 13:49:57', '', 'game', 'post'),
(15, 'yayaya', 'asdfhsdkjhfkdsf', '2019-06-16 14:05:59', 'ungu.png', 'game', 'post');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `img` text,
  `level` enum('superadmin','author') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `name`, `email`, `password`, `alamat`, `img`, `level`) VALUES
(1, 'Fatih', 'fatih@gmail.com', 'aji', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'aji.png', 'superadmin'),
(2, 'fatih', 'fatih@gmail.com', 'fatih', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'fatih.png', 'author'),
(3, 'hilmi', 'hilmi@gmail.com', 'hilmi', 'kendal', NULL, 'superadmin'),
(4, 'gilang', 'gilang@gmail.com', 'c37fddfb7b3f538674c6e9a77e7bf486', 'kendal', NULL, 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
