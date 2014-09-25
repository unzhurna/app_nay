-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2014 at 10:05 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_nay`
--

-- --------------------------------------------------------

--
-- Table structure for table `mt_dosen`
--

CREATE TABLE IF NOT EXISTS `mt_dosen` (
`id` int(11) NOT NULL,
  `ndn` varchar(10) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mt_dosen`
--

INSERT INTO `mt_dosen` (`id`, `ndn`, `nama`, `id_jurusan`) VALUES
(2, '564645', 'hgfhfdhdfh', 3),
(3, '7898908098', 'jhkjhkhkjhkh', 1),
(4, '3134324', 'sadasdsadsa', 1),
(5, '0429117402', 'Ade Irma Purnama Sari', 1),
(6, '0970970970', 'uytuytuytuytu', 2),
(7, '0998878765', 'ghfghfjhjhgjh', 2),
(8, '7858757858', 'teeyteytrytrytr', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mt_group`
--

CREATE TABLE IF NOT EXISTS `mt_group` (
`id` int(11) NOT NULL,
  `group` varchar(30) NOT NULL,
  `akses` tinytext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mt_group`
--

INSERT INTO `mt_group` (`id`, `group`, `akses`) VALUES
(1, 'root', 'kopok|tes'),
(2, 'dosen', '');

-- --------------------------------------------------------

--
-- Table structure for table `mt_jurusan`
--

CREATE TABLE IF NOT EXISTS `mt_jurusan` (
`id` int(11) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `jurusan` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mt_jurusan`
--

INSERT INTO `mt_jurusan` (`id`, `kode`, `jurusan`) VALUES
(1, '55201', 'Teknik Informatika'),
(2, '57401', 'Manajemen Informatika'),
(3, '57402', 'Komputerisasi Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `mt_user`
--

CREATE TABLE IF NOT EXISTS `mt_user` (
`id` int(5) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mt_user`
--

INSERT INTO `mt_user` (`id`, `username`, `password`, `id_group`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
`id` int(11) NOT NULL,
  `nm_group` varchar(100) DEFAULT NULL,
  `hak_akses` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mt_dosen`
--
ALTER TABLE `mt_dosen`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ndn` (`ndn`), ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `mt_group`
--
ALTER TABLE `mt_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_jurusan`
--
ALTER TABLE `mt_jurusan`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `mt_user`
--
ALTER TABLE `mt_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD KEY `id_group` (`id_group`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`,`username`), ADD KEY `id_group` (`id_group`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mt_dosen`
--
ALTER TABLE `mt_dosen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mt_group`
--
ALTER TABLE `mt_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mt_jurusan`
--
ALTER TABLE `mt_jurusan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mt_user`
--
ALTER TABLE `mt_user`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mt_dosen`
--
ALTER TABLE `mt_dosen`
ADD CONSTRAINT `mt_dosen_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `mt_jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mt_user`
--
ALTER TABLE `mt_user`
ADD CONSTRAINT `mt_user_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `mt_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `user_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
