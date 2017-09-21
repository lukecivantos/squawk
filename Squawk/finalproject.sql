-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 04:50 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `entry_id` int(10) NOT NULL,
  `comment` varchar(3000) NOT NULL,
  `comment_score` int(10) NOT NULL DEFAULT '0',
  `time_made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `entry_id`, `comment`, `comment_score`, `time_made`) VALUES
(95, 40, 303, 'haha funny', 1, '2015-12-06 15:59:44'),
(96, 41, 303, 'hi this is a comment', -2, '2015-12-06 16:06:19'),
(97, 42, 303, 'hi', 0, '2015-12-06 16:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `entry` varchar(3000) NOT NULL,
  `entry_score` int(10) NOT NULL DEFAULT '0',
  `time_made` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `number_comments` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=312 ;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `user_id`, `entry`, `entry_score`, `time_made`, `number_comments`) VALUES
(299, 28, 'not wanting to get up to go to the bathroom in the middle of class cause social anxiety...', 1, '2015-12-06 15:23:58', 0),
(301, 28, 'My dad lied a lot. I was 17 before I realized the ''Silver Table Cat'' wasn''t a real species, and that we didn''t own a pet, we owned a toaster ', 1, '2015-12-06 15:36:39', 0),
(302, 28, 'You''d think that atoms bonding with other atoms would mean they''re being friendly, but really they steal each other''s electrons.  How ionic. ', 0, '2015-12-06 15:37:38', 0),
(303, 28, '- I''d like to make a reservation. - Name? - Matthew McConaughey. - Can you spell that for me? - No. ', 2, '2015-12-06 15:37:50', 3),
(304, 28, 'I''ll date any guy that can digest a seagull faster than me.', 2, '2015-12-06 15:38:09', 0),
(305, 28, 'If by ''paleontologist'' you mean I can name all 5 shapes in the box of dinosaur chicken nuggets then, yes, I am a paleontologist.', -1, '2015-12-06 15:38:20', 0),
(306, 28, 'That awkward moment when the music is so good, you turn into a transdimensional space goat. ', 2, '2015-12-06 15:38:55', 0),
(307, 28, ' they can''t date any hot chicks #SnowmanDatingProblems', 2, '2015-12-06 15:41:20', 0),
(308, 40, 'CS50 is gr8!', 4, '2015-12-06 16:00:07', 0),
(309, 41, 'Chris Fenaroli is on Squawk!', 0, '2015-12-06 16:03:55', 0),
(310, 41, 'I just joined Squawk!', 2, '2015-12-06 16:05:00', 0),
(311, 42, 'Squawk is Great!', -1, '2015-12-06 16:16:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `score` int(10) unsigned NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `emailkey` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `hash`, `score`, `active`, `emailkey`) VALUES
(28, 'Lukecivantos@college.harvard.edu', '$2y$10$xXEO29qCzMpvvmZtnevEvu3rmUSg2SzmzM.h8f/KLqt.C4mjWGDNu', 0, 18, 2269),
(30, 'casebrabham@college.harvard.edu', '$2y$10$xWQWB3jQZHwCSLKn92Dmk.Z5hTq25NXA/nitBFMcdWV/ZNpULD1U6', 0, 18, 7338),
(32, 'msimon@college.harvard.edu', '$2y$10$hZy7u2IeLwcwgKOubf0rMejpHXrEH2TF8b6q5DiPohGIrTwCXSf7i', 0, 18, 7199),
(33, 'jeffereyhuang@college.harvard.edu', '$2y$10$bCNcG.8Dn1.lbYG.U4Kix.J/Bwy1Im1dcsWqAZnRg7dNALrIQudiW', 0, 18, 1985),
(34, 'mbenegas@college.harvard.edu', '$2y$10$SUk41V9u5815skPbczTadO/z7AqwnfqLpVj2ty6Ja4X0j6Xt2OGJW', 0, 0, 2086),
(37, 'cfenaroli@college.harvard.edu', '$2y$10$ZKe2.DlMeMDXp8kFN/XY..FUve5US/8oIhzNQUkSxY9pnVYXQ1m16', 0, 18, 6235),
(40, 'chris@college.harvard.edu', '$2y$10$aXjwuDBqoFuiQ4RugEeKQuGRAJw42hCbAfKZhkZtwvGdSH/awmVjq', 0, 18, 1619),
(41, 'jgeorge@college.harvard.edu', '$2y$10$.Cv0l12wct5zLYTuNch3U.YlFlOlKUZxDSvuuAbM3GMYBWRjNnr/u', 0, 18, 1174),
(42, 'david.malan@college.harvard.edu', '$2y$10$yraB8X.MNPyjRvP9M//RJOxojoGCAsiNMjkxlklKJGCH08UdChHei', 0, 18, 1298);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `entry_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `up_down` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=710 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `entry_id`, `user_id`, `up_down`) VALUES
(670, 299, 28, 1),
(672, 299, 34, 1),
(673, 299, 37, 2),
(675, 301, 34, 1),
(676, 306, 34, 1),
(677, 304, 34, 1),
(679, 303, 37, 1),
(683, 304, 37, 1),
(684, 307, 34, 1),
(686, 307, 37, 1),
(687, 306, 37, 1),
(688, 305, 37, 2),
(691, 307, 40, 0),
(692, 305, 40, 1),
(693, 304, 40, 2),
(694, 303, 40, 1),
(695, 308, 40, 1),
(696, 304, 41, 1),
(697, 305, 41, 2),
(701, 310, 41, 1),
(702, 309, 41, 2),
(703, 308, 41, 1),
(705, 311, 42, 2),
(706, 310, 42, 1),
(707, 309, 42, 1),
(708, 308, 42, 1),
(709, 308, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes2`
--

CREATE TABLE IF NOT EXISTS `votes2` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `entry_id` int(10) NOT NULL,
  `comment_id` int(10) NOT NULL,
  `up_down` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `votes2`
--

INSERT INTO `votes2` (`id`, `user_id`, `entry_id`, `comment_id`, `up_down`) VALUES
(114, 40, 303, 95, 2),
(115, 41, 303, 95, 1),
(116, 41, 303, 96, 2),
(117, 42, 303, 95, 1),
(118, 42, 303, 96, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
