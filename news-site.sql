-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 12:32 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-yeahoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'Sport', 2),
(31, 'Entertainment', 3),
(32, 'Politics', 1),
(33, 'Health', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(50, 'testing IMG ', 'testing IMG testing IMG testing IMG testing IMG testing IMG testing IMG testing IMG ', '31', '09 Aug, 2021', 27, '090821p07c40rq.jpg'),
(51, 'Image Testing 1 ', ' Image Testing 1 Image Testing 1 Image Testing 1 Image Testing 1 Image Testing 1 Image Testing 1 Image Testing 1                                 ', '33', '09 Aug, 2021', 27, '0908211628519345KkWY7W4k7NyeUJh9d0K-Hg_store_banner_image.jpeg'),
(45, 'Hello World', 'Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World Hello World                 ', '30', '26 Jul, 2021', 24, 'fantasy poster.jpg'),
(46, 'Hello Admin ', 'Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin Hello Admin ', '31', '26 Jul, 2021', 24, '-downloadfiles-wallpapers-2560_1600-orange_wallpaper_abstract_other_.jpg'),
(47, 'WoW Post ', '                      WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post WoW Post                                                 ', '32', '26 Jul, 2021', 24, '0908211628519638Fantasy Backgrounds 1220.jpg'),
(48, 'Unknown Post ', '                    Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post Unknown Post                 ', '31', '26 Jul, 2021', 24, 'Fantasy Backgrounds 1222.jpg'),
(49, 'Fahim Post', 'Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post Fahim Post                                                 ', '30', '08 Aug, 2021', 27, 'off_peak_hours_by_tullusion_de4wxi3-pre.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `website_name` varchar(50) NOT NULL,
  `logo` varchar(60) NOT NULL,
  `fotter_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`website_name`, `logo`, `fotter_desc`) VALUES
('News site', 'news.jpg', '© Copyright 2019 News | Powered by Mahady Jaman                                                                                           ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'Mahady', 'Jaman', 'mahady', '5841341b85c40a42d730c5c6ecabe4b5', 1),
(27, 'Fahim', 'Hasan', 'fahim', 'dcbb9006afaee1296ff36eabe1cddb28', 0),
(26, 'Yeasir', 'Arafat', 'yeasir', 'e6f2f68b16e1c3f845e4270808002e00', 0),
(28, 'Kobita', 'Akther', 'kobita', '158d916d1d3991c7a38745867dac630c', 0),
(29, 'Sarita', 'Kumari', 'sarita', 'fb4e529ea6b9320c8bd32577f78a7fdf', 0),
(30, 'Salman', 'Khan', 'salman', '03346657feea0490a4d4f677faa0583d', 0),
(31, 'Ayub', 'Baccu', 'ayub', '6549414559f5668350421dcd8d5c8bb0', 0),
(32, 'karim', 'Ullah', 'karim', '2167a6ac80340b69f3b05b800417d6c7', 0),
(33, 'Sajal', 'Khan', 'sajal', '64a521d8cc0d1ff66edf5c2843a622cb', 0),
(34, 'sumi', 'Akter', 'sumi', '41008f06b76981093c7aa369d83c08ea', 0),
(35, 'Jhon', 'Kabir', 'jhon', 'ab792dcd756b92ffc11994da8a0a1bf0', 0),
(36, 'Anil', 'kafur', 'anil', '71b9b5bc1094ee6eaeae8253e787d654', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
