-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2018 at 07:14 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `eventdb`
--

CREATE TABLE `eventdb` (
  `id` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `rtype` varchar(272) NOT NULL,
  `amountpaid` int(11) NOT NULL,
  `regdate` date NOT NULL,
  `regtime` time NOT NULL,
  `orderi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventdb`
--

INSERT INTO `eventdb` (`id`, `eventid`, `userid`, `team`, `rtype`, `amountpaid`, `regdate`, `regtime`, `orderi`, `status`, `payment`) VALUES
(9, 2, 28, 2, 'Player', 1500, '2018-07-28', '20:10:23', 1, 1, 'Paid');

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
  `rsdate` varchar(272) NOT NULL,
  `redate` varchar(272) NOT NULL,
  `edate` varchar(255) NOT NULL,
  `adate` varchar(255) NOT NULL,
  `etype` varchar(255) NOT NULL,
  `eprice` varchar(255) NOT NULL,
  `einfo` longtext NOT NULL,
  `rules` longtext NOT NULL,
  `teams` longtext NOT NULL,
  `fixtures` longtext NOT NULL,
  `results` longtext NOT NULL,
  `tables` longtext NOT NULL,
  `news` longtext NOT NULL,
  `filefl` varchar(272) NOT NULL,
  `staff` longtext NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ex_mmenu`
--

INSERT INTO `ex_mmenu` (`id`, `title`, `rsdate`, `redate`, `edate`, `adate`, `etype`, `eprice`, `einfo`, `rules`, `teams`, `fixtures`, `results`, `tables`, `news`, `filefl`, `staff`, `order`, `status`) VALUES
(23, 'qwqwqw', '01-08-2018', 'qwqw', 'qwqw', 'qwqw', 'q', 'wqwqw', '', '', '', '', '', '', '', '5b871a5e83168Event logo-02.png', '<p><img src=\"../../se/tinymce/editor_images//p1.jpg\" alt=\"\" width=\"154\" height=\"152\" />xvxcvxcv xfbd dhfdhdhdfn</p>', 3, 1),
(2, 'ELITE EIGHTS LEAGUE â€“ SEASON 1', '01-08-2018', '10-08-2018', '08-08-2018', '19-07-2018', 'League', '1500', '<p>Captain Registration : Rs. 4000 (10 slots)</p>\r\n<p>Player Registration : Rs. 1500 (100 slots)</p>\r\n<p>Registration dates : 1<sup>st</sup> Aug to 10<sup>th</sup> Aug 2018</p>\r\n<p>&nbsp;</p>\r\n<p><u>JERSEY</u></p>\r\n<p>For Registered <strong>CAPTAINS</strong> : Fitness test, 1 practice match ball, 1 Half sleeve Jersey, 1 Soccer shorts (with team logo, and Soccer Intimacy logo), Captains Arm Band, Pair of Sock, Lunch on Auction day</p>\r\n<p>For Registered <strong>PLAYERS</strong> : Fitness test , 1 Half sleeve Jersey, 1 Soccer shorts (with team logo, and Soccer Intimacy logo), Pair of Sock</p>\r\n<p>&nbsp;</p>\r\n<p><u>PRIZE</u></p>\r\n<p>Champions 1 team Trophy/Shield, Rs.40000 Cash Prize, Gift vouchers, Individual medals &amp; certificates</p>\r\n<p>Runners 1 team Trophy/Shield, Rs.20000 Cash Prize, Gift vouchers Individual medals &amp; certificates</p>\r\n<p>3<sup>rd</sup> Place 1 team Trophy/Shield, Rs.10000 Cash Prize, Individual medals &amp; certificates</p>\r\n<p>&nbsp;</p>\r\n<p>All other teams Individual Participation Certificate</p>\r\n<p>Other Prizes for</p>\r\n<p>Best Captain</p>\r\n<p>Best Player</p>\r\n<p>Best Young Player</p>\r\n<p>Top scorer</p>\r\n<p>Best Goal Keeper</p>\r\n<p>Fair Play award</p>\r\n<p>Fastest goal</p>\r\n<p>Top Goal</p>\r\n<p>Top Save</p>\r\n<p>And many many more</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Venue</strong> : D Block Ground, AECS Layout</p>\r\n<p><u>AUCTION (19<sup>th</sup> Aug)</u></p>\r\n<p>Who can attend the Auction : Soccer Intimacy staffs and the EEL&rsquo;s Registered Captains</p>\r\n<p>Auction will be conducted to achieve 10 teams, each of whose SQUAD will consist of 11 players in total (1 Captain, 10 Players - 2 of whom will start the game as reserves as per Captain&rsquo;s decision)</p>\r\n<p>Each Captain (Auction Bidder) will be given 1000 Cash Points by default</p>\r\n<p>Each Player (Auction Biddee) costs&rsquo; 20 Cash Points as Starting Price</p>\r\n<p>Bidding increment slabs are 10 Cash Points per raise/bid</p>\r\n<p>A player bid can reach upto the Max. limit of 1000 Cash Points</p>\r\n<p>A player bid can go down to the Min. limit of 30 Cash Points</p>\r\n<p>If the team do achieve a SQUAD of 11 players, and have run out of Cash Points, then the team will no longer participate in the Bidding process. The remaining players to complete the SQUAD will be random entries of players who were not bidded for during the Bidding process.</p>\r\n<p>If the team have achieved a SQUAD of 11 players, and have Cash Points remaining with them will count to nothing, and the team will no longer participate in the Bidding process.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Ownership of Players:</strong> Captains will manage the team that he has made out of his Cash points.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>AUCTION LIVESTREAMING :</strong> For all who have registered for this Event at soccerintimacy.com</p>\r\n<p>Practice Fixtures : 24<sup>th</sup> and 25<sup>th</sup> Aug 2018</p>\r\n<p>EVENT Kick off : 31<sup>st</sup> Aug</p>\r\n<p>Finals &amp; Event closure : 2<sup>nd</sup> Oct 2018.</p>', '<p>Who can attend the Auction : Soccer Intimacy staffs and the EEL&rsquo;s Registered Captains</p>\r\n<p>Auction will be conducted to achieve 10 teams, each of whose SQUAD will consist of 11 players in total (1 Captain, 10 Players - 2 of whom will start the game as reserves as per Captain&rsquo;s decision)</p>\r\n<p>Each Captain (Auction Bidder) will be given 1000 Cash Points by default</p>\r\n<p>Each Player (Auction Biddee) costs&rsquo; 20 Cash Points as Starting Price</p>\r\n<p>Bidding increment slabs are 10 Cash Points per raise/bid</p>\r\n<p>A player bid can reach upto the Max. limit of 1000 Cash Points</p>\r\n<p>A player bid can go down to the Min. limit of 30 Cash Points</p>\r\n<p>If the team do achieve a SQUAD of 11 players, and have run out of Cash Points, then the team will no longer participate in the Bidding process. The remaining players to complete the SQUAD will be random entries of players who were not bidded for during the Bidding process.</p>\r\n<p>If the team have achieved a SQUAD of 11 players, and have Cash Points remaining with them will count to nothing, and the team will no longer participate in the Bidding process.</p>', '', '<div class=\"match-list\">\r\n<div class=\"overly-bg\">&nbsp;</div>\r\n<table class=\"match-table\">\r\n<tbody>\r\n<tr>\r\n<td class=\"medium-font\">Mirpur King</td>\r\n<td class=\"big-font\">VS</td>\r\n<td class=\"medium-font\">Netra King</td>\r\n<td>June 16, 17:00</td>\r\n<td>Olympic Stadium</td>\r\n<td><a href=\"#\">Buy a Ticket</a></td>\r\n</tr>\r\n<tr>\r\n<td class=\"medium-font\">Badda</td>\r\n<td class=\"big-font\">VS</td>\r\n<td class=\"medium-font\">Dhoar King</td>\r\n<td>June 16, 17:00</td>\r\n<td>National Stadium</td>\r\n<td><a href=\"#\">Buy a Ticket</a></td>\r\n</tr>\r\n<tr>\r\n<td class=\"medium-font\">Uttra King</td>\r\n<td class=\"big-font\">VS</td>\r\n<td class=\"medium-font\">Badda King</td>\r\n<td>June 16, 17:00</td>\r\n<td>Nepoli Stadium</td>\r\n<td><a href=\"#\">Buy a Ticket</a></td>\r\n</tr>\r\n<tr>\r\n<td class=\"medium-font\">Mirpur King</td>\r\n<td class=\"big-font\">VS</td>\r\n<td class=\"medium-font\">Badda King</td>\r\n<td>June 16, 17:00</td>\r\n<td>Santhiago Stadium</td>\r\n<td><a href=\"#\">Buy a Ticket</a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '<p><span style=\"font-size: 18pt;\">Coming Soon</span></p>', '<div class=\"rs-point-table\">\r\n<div class=\"container\">\r\n<div class=\"tab-content\">\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>&nbsp;</td>\r\n<td class=\"team-name\">TEAM</td>\r\n<td>P</td>\r\n<td>W</td>\r\n<td>D</td>\r\n<td>L</td>\r\n<td>F</td>\r\n<td>A</td>\r\n<td>GD</td>\r\n<td>PTS</td>\r\n</tr>\r\n<tr>\r\n<td>01</td>\r\n<td class=\"team-name\">Banani FC</td>\r\n<td>60</td>\r\n<td>35</td>\r\n<td>08</td>\r\n<td>16</td>\r\n<td>02</td>\r\n<td>04</td>\r\n<td>11</td>\r\n<td>95</td>\r\n</tr>\r\n<tr>\r\n<td>02</td>\r\n<td class=\"team-name\">Badda FC</td>\r\n<td>57</td>\r\n<td>33</td>\r\n<td>07</td>\r\n<td>17</td>\r\n<td>02</td>\r\n<td>04</td>\r\n<td>10</td>\r\n<td>93</td>\r\n</tr>\r\n<tr>\r\n<td>03</td>\r\n<td class=\"team-name\">Joypur FC</td>\r\n<td>60</td>\r\n<td>32</td>\r\n<td>12</td>\r\n<td>18</td>\r\n<td>02</td>\r\n<td>04</td>\r\n<td>8</td>\r\n<td>92</td>\r\n</tr>\r\n<tr>\r\n<td>04</td>\r\n<td class=\"team-name\">Bramma FC</td>\r\n<td>58</td>\r\n<td>35</td>\r\n<td>08</td>\r\n<td>14</td>\r\n<td>02</td>\r\n<td>05</td>\r\n<td>7</td>\r\n<td>90</td>\r\n</tr>\r\n<tr>\r\n<td>05</td>\r\n<td class=\"team-name\">Trishal FC</td>\r\n<td>57</td>\r\n<td>32</td>\r\n<td>10</td>\r\n<td>16</td>\r\n<td>04</td>\r\n<td>06</td>\r\n<td>7</td>\r\n<td>88</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>', '<p><span style=\"font-size: 18pt;\">Coming Soon</span></p>', '5b59d424b0427highlights-icon.png', '<p>Staff Content</p>', 2, 1);

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
(53, 2, 0, 'Ad-1-01.jpg', '', '', 1, 0, '271839'),
(52, 0, 2, 'abtbanner.jpg', '', '', 1, 0, '120248');

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
  `filefl` varchar(272) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `btime` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 'yyyypraba.wg@gmail.com', 1, 1, '2018-07-21', '16:43:02');

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
  `dob` varchar(272) NOT NULL,
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
  `uid` int(11) NOT NULL,
  `designation` varchar(272) NOT NULL,
  `orders` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `mobile`, `age`, `dob`, `gender`, `filefl`, `email`, `reg_date`, `reg_time`, `password`, `height`, `weight`, `country`, `position1`, `position2`, `jersysize`, `expereince`, `uid`, `designation`, `orders`, `status`) VALUES
(28, 'praba', 'praba', '1231231231', 12, '08-03-2005', '', '5b5b6bf8d0cfa5b5a1c2d9d7105b59d424b0427highlights-icon.png', 'yyyypraba.wg@gmail.com', '2018-07-26', '01:12:24', 'qwqwqw', '', '', '', '', '', 0, '', 208, 'Goal keeper', 2, 1);

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
(3, 'edit2', '45', '<p>adqwdasdas</p>', '5b4f9721ba7e0san.jpg', 2, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `higli`
--
ALTER TABLE `higli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
