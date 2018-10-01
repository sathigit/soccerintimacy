-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 11:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socceri`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `content` longtext NOT NULL,
  `mtitle` varchar(255) NOT NULL,
  `mkeyword` varchar(255) NOT NULL,
  `mdescription` varchar(255) NOT NULL,
  `eid` int(11) NOT NULL,
  `filefl` varchar(272) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `btime` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `mtitle`, `mkeyword`, `mdescription`, `eid`, `filefl`, `bdate`, `btime`, `order`, `status`) VALUES
(5, 'qwqwqw123', '<p>qwqw</p>', 'qw1', 'qw12', 'qw3', 2, '', '2018-05-08', '09:24:17-pm', 2, 1),
(8, 'qwqwqw', '<p>qwqwqw</p>', 'qwqwqw', 'qwqwqw', 'qwqwqw', 2, '', '2018-05-12', '07:36:53-pm', 3, 1),
(9, 'xZXZX', '<p>sdfsdfdsf</p>', 'sdfsdf', 'sdfsdf', 'sdf', 2, '5b4f93e167348', '2018-07-19', '12:54:17-am', 4, 1),
(10, 'INR', '<p>dvxcvc</p>', 'cxvxc', 'vxcvxc', 'vxcvxc', 2, '5b4f979f4626asv.jpg', '2018-07-19', '01:06:03-am', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `eventdb`
--

CREATE TABLE `eventdb` (
  `id` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `regdate` date NOT NULL,
  `regtime` time NOT NULL,
  `orderi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventdb`
--

INSERT INTO `eventdb` (`id`, `eventid`, `userid`, `team`, `regdate`, `regtime`, `orderi`, `status`, `payment`) VALUES
(7, 2, 28, 2, '2018-05-19', '15:42:21', 1, 1, 'paid'),
(9, 2, 27, 2, '2018-07-18', '23:59:23', 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `ex_admin`
--

CREATE TABLE `ex_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ex_admin`
--

INSERT INTO `ex_admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin1', 'info@soccerintimacy.com');

-- --------------------------------------------------------

--
-- Table structure for table `ex_category`
--

CREATE TABLE `ex_category` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ex_mmenu`
--

CREATE TABLE `ex_mmenu` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `edate` varchar(255) NOT NULL,
  `adate` varchar(255) NOT NULL,
  `etype` varchar(255) NOT NULL,
  `eprice` varchar(255) NOT NULL,
  `rules` longtext NOT NULL,
  `teams` longtext NOT NULL,
  `fixtures` longtext NOT NULL,
  `results` longtext NOT NULL,
  `tables` longtext NOT NULL,
  `news` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ex_mmenu`
--

INSERT INTO `ex_mmenu` (`id`, `title`, `edate`, `adate`, `etype`, `eprice`, `rules`, `teams`, `fixtures`, `results`, `tables`, `news`, `order`, `status`) VALUES
(1, 'Eventone', '09-05-2018', '11-05-2018', '1212', '12', '<p>qw1</p>', '<p>qw2</p>', '<p>qw3</p>', '<p>qw4</p>', '<p>qw5</p>', '<p>qw6</p>', 1, 1),
(2, 'Event 2', '08-08-2018', '19-07-2018', '1212', '1212212', '<p>1222121212</p>', '', '<p>12</p>', '<p>12</p>', '<p>12</p>', '<p>12</p>', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `size` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `catid`, `subcatid`, `name`, `title`, `description`, `status`, `type`, `size`) VALUES
(37, 0, 1, 'eve2.jpg', '', '', 1, 0, '266739'),
(38, 0, 2, 'eve2 (1).jpg', '', '', 1, 0, '266739'),
(39, 0, 2, '1.jpg', '', '', 1, 0, '71546'),
(40, 0, 2, 'saami.jpg', '', '', 0, 0, '54655');

-- --------------------------------------------------------

--
-- Table structure for table `higli`
--

CREATE TABLE `higli` (
  `id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `content` longtext NOT NULL,
  `mtitle` varchar(255) NOT NULL,
  `mkeyword` varchar(255) NOT NULL,
  `mdescription` varchar(255) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `btime` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `higli`
--

INSERT INTO `higli` (`id`, `title`, `content`, `mtitle`, `mkeyword`, `mdescription`, `bdate`, `btime`, `order`, `status`) VALUES
(1, '1', '<p>orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '33', '44', '55', '2018-05-08', '09:48:04-pm', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `orderi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `orderi`, `status`, `reg_date`, `reg_time`) VALUES
(8, 'yyyypraba.wg@gmail.com', 1, 1, '2018-05-16', '00:52:29'),
(9, 'yyyypraba2.wg@gmail.com', 2, 1, '2018-05-16', '00:54:35'),
(10, 'yyyypraba12.wg@gmail.com', 3, 1, '2018-05-16', '00:57:04'),
(11, 'yyyypraba1212.wg@gmail.com', 4, 1, '2018-05-16', '00:57:30'),
(12, 'yyyyprabaASas.wg@gmail.com', 5, 1, '2018-05-16', '00:59:25'),
(13, 'yyyyprabaAAAAA.wg@gmail.com', 6, 1, '2018-05-16', '00:59:56'),
(14, 'yyyyprabaaqaqaq.wg@gmail.com', 7, 1, '2018-05-16', '01:00:11'),
(15, 'yyyyprabaqwqwqwwqwqw.wg@gmail.com', 8, 1, '2018-05-16', '01:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `filefl` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  `reg_time` time NOT NULL,
  `password` varchar(255) NOT NULL,
  `height` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `country` varchar(200) NOT NULL,
  `position1` varchar(100) NOT NULL,
  `position2` varchar(100) NOT NULL,
  `jersysize` int(11) NOT NULL,
  `expereince` varchar(255) NOT NULL,
  `orders` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `mobile`, `age`, `gender`, `filefl`, `email`, `reg_date`, `reg_time`, `password`, `height`, `weight`, `country`, `position1`, `position2`, `jersysize`, `expereince`, `orders`, `status`) VALUES
(27, 'prabagaran', 'praba', '121212121212', 12, 'male', '5ae9d64cf08a7san.jpg', 'praba.wg@yahoo.co.in', '2018-05-02', '20:46:28', 'qwqwqw', '', '', '', '', '', 0, '', 1, 1),
(28, 'dummuku', 'praba', '121212121212', 0, 'male', '5aec90d3e84372.png', 'yyyypraba.wg@gmail.com', '2018-05-04', '22:26:51', 'qwqwqw', '', '', '', '', '', 0, '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `tname` varchar(272) NOT NULL,
  `tno` varchar(272) NOT NULL,
  `tcontent` longtext NOT NULL,
  `filefl` varchar(272) NOT NULL,
  `orderi` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `tname`, `tno`, `tcontent`, `filefl`, `orderi`, `status`) VALUES
(2, 'edit1', '12', '<p>edit2</p>', '5b4e586ca06a6sv.jpg', 1, 1),
(3, 'edit2', '12', '<p>adqwdasdas</p>', '5b4f9721ba7e0san.jpg', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventdb`
--
ALTER TABLE `eventdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_admin`
--
ALTER TABLE `ex_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_category`
--
ALTER TABLE `ex_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_mmenu`
--
ALTER TABLE `ex_mmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `higli`
--
ALTER TABLE `higli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `eventdb`
--
ALTER TABLE `eventdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ex_admin`
--
ALTER TABLE `ex_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ex_category`
--
ALTER TABLE `ex_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ex_mmenu`
--
ALTER TABLE `ex_mmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `higli`
--
ALTER TABLE `higli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
