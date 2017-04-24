  -- phpMyAdmin SQL Dump
  -- version 4.6.4
  -- https://www.phpmyadmin.net/
  --
  -- Host: 127.0.0.1
  -- Generation Time: Apr 23, 2017 at 07:58 PM
  -- Server version: 5.7.14
  -- PHP Version: 5.6.25

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Database: `addressdetails`
  --

  -- --------------------------------------------------------

  --
  -- Table structure for table `state_city`
  --

  CREATE TABLE `state_city` (
    `id` int(11) NOT NULL,
    `state` varchar(250) NOT NULL,
    `city` varchar(250) NOT NULL
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

  --
  -- Dumping data for table `state_city`
  --

  INSERT INTO `state_city` (`id`, `state`, `city`) VALUES
  (1, 'Maharashtra', 'Mumbai'),
  (2, 'Maharashtra', 'Pune'),
  (3, 'Rajasthan', 'Jaipur'),
  (4, 'Rajasthan', 'Jodhpur');

  --
  -- Indexes for dumped tables
  --

  --
  -- Indexes for table `state_city`
  --
  ALTER TABLE `state_city`
    ADD PRIMARY KEY (`id`);

  --
  -- AUTO_INCREMENT for dumped tables
  --

  --
  -- AUTO_INCREMENT for table `state_city`
  --
  ALTER TABLE `state_city`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
