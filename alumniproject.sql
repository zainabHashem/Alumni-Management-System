-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 11:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `graduationyear` int(11) NOT NULL,
  `userimage` varchar(200) DEFAULT '8f4e2cd4-71cf-4f99-9c13-f0632279052b.jpeg',
  `gender` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `listid` int(11) NOT NULL,
  `bio` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `events` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `volunteering` text DEFAULT NULL,
  `githublink` varchar(500) DEFAULT NULL,
  `linkedinlink` varchar(500) DEFAULT NULL,
  `gmaillink` varchar(500) DEFAULT NULL,
  `twitterlink` varchar(500) DEFAULT NULL,
  `facebooklink` varchar(500) DEFAULT NULL,
  `resumelink` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `graduationyear`, `userimage`, `gender`, `department`, `userid`, `listid`, `bio`, `education`, `experience`, `location`, `events`, `skills`, `volunteering`, `githublink`, `linkedinlink`, `gmaillink`, `twitterlink`, `facebooklink`, `resumelink`) VALUES
(1, 2023, '8f4e2cd4-71cf-4f99-9c13-f0632279052b.jpeg', '', '', 2, 44214124, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 2023, '8f4e2cd4-71cf-4f99-9c13-f0632279052b.jpeg', '', '', 5, 421654, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 2023, '8f4e2cd4-71cf-4f99-9c13-f0632279052b.jpeg', '', '', 3, 141545, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 2023, '8f4e2cd4-71cf-4f99-9c13-f0632279052b.jpeg', '', '', 4, 32565, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 2022, 'avatar2.png', 'female', 'IS', 14, 86826, '', '', '', '', '', '', '', '', '', '', '', '', 'time-table-20210424.pdf'),
(12, 0, '8f4e2cd4-71cf-4f99-9c13-f0632279052b.jpeg', '0', '0', 1, 2341, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 2020, '8f4e2cd4-71cf-4f99-9c13-f0632279052b.jpeg', 'female', 'IT', 15, 32565, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alumnilist`
--

CREATE TABLE `alumnilist` (
  `nationalid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Graduationyear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnilist`
--

INSERT INTO `alumnilist` (`nationalid`, `name`, `email`, `Department`, `Graduationyear`) VALUES
(2341, 'mm@gmail.com', 'mm', 'cs', 2020),
(32565, 'sama mostafa', 'samamostafa@gmail.com', '', 0),
(86826, 'sarah@gmail.com', 'www', 'cs', 2021),
(123456, 'wiiii@gmail.com', 'wiii', 'cs', 2021),
(141545, 'sara mahmoud', 'saramahmoud@gmail.com', '', 0),
(421654, 'Zainab hashim', 'zainabhashim@gmail.com', '', 0),
(578875, 'sarah@gmail.com', 'www', 'cs', 2020),
(44214124, 'sara ashraf', 'SarahAshraf@gmail.com', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`, `subject`, `message`, `firstname`, `lastname`, `userid`) VALUES
(2, 'sarahashraf21240@gmail.com', 'hi', 'wiii', 'sarah', 'ashraf', 14);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `emoji` varchar(50) NOT NULL,
  `feedbackdesc` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interact`
--

CREATE TABLE `interact` (
  `id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interact`
--

INSERT INTO `interact` (`id`, `comment`, `postid`, `userid`) VALUES
(40, 'nnn', 52, 1),
(41, 'fhd', 52, 1),
(42, 'mnm', 52, 14),
(43, 'mnm', 52, 14),
(44, 'mnm', 52, 14),
(45, 'kjbjkb', 52, 1),
(46, 'hiiii', 54, 15);

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id` int(11) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `days` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `validation` varchar(50) NOT NULL DEFAULT 'pending',
  `date:To` date NOT NULL,
  `date:From` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newsimage` varchar(100) NOT NULL,
  `desc` varchar(2000) NOT NULL,
  `newstitle` varchar(50) NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `posttype` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `validation` varchar(50) NOT NULL DEFAULT 'accepted',
  `postdescription` varchar(200) NOT NULL,
  `postdate` date NOT NULL DEFAULT current_timestamp(),
  `posttime` time NOT NULL DEFAULT current_timestamp(),
  `uploadedimage` varchar(500) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `postlink` varchar(200) NOT NULL,
  `uploadedlink` varchar(500) NOT NULL,
  `uploadedfile` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `posttype`, `validation`, `postdescription`, `postdate`, `posttime`, `uploadedimage`, `userid`, `postlink`, `uploadedlink`, `uploadedfile`) VALUES
(52, 'event', 'accepted', 'bnbn', '2023-05-10', '11:30:28', '', 1, '', '', ''),
(53, 'event', 'accepted', '', '2023-05-10', '11:32:32', 'avatar3.png', 1, '', '', ''),
(54, 'event', 'accepted', 'hi', '2023-05-10', '14:14:57', 'avatar2 (2).png', 14, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `react`
--

CREATE TABLE `react` (
  `id` int(11) NOT NULL,
  `react` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `react`
--

INSERT INTO `react` (`id`, `react`, `userid`, `postid`) VALUES
(35, 'liked', 1, 52),
(36, 'liked', 14, 52),
(37, 'liked', 15, 54);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `rolename` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `rolename`) VALUES
(1, 'Admin'),
(2, 'Alumni');

-- --------------------------------------------------------

--
-- Table structure for table `savedposts`
--

CREATE TABLE `savedposts` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `roleid`) VALUES
(1, 'The', 'Admin', 'Admin@gmail.com', '123', 1),
(2, 'Sara', 'Ashraf', 'SarahAshraf@gmail.com', '123012340', 2),
(3, 'Sara', 'mahmoud', 'saramahmoud@gmail.com', '123', 2),
(4, 'Sama', 'mostafa', 'samamostafa@gmail.com', '1234', 2),
(5, 'Zainab', 'hashim', 'zainabhashim@gmail.com', '12345', 2),
(14, 'Sara', 'ashraf', 'saraa@gmail.com', '123', 2),
(15, 'sama', 'mostafa', 'samaa@gmail.com', '234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_ibfk_1` (`userid`),
  ADD KEY `account_ibfk_2` (`listid`);

--
-- Indexes for table `alumnilist`
--
ALTER TABLE `alumnilist`
  ADD PRIMARY KEY (`nationalid`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donation_ibfk_1` (`userid`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_ibfk_1` (`userid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_ibfk_1` (`userid`);

--
-- Indexes for table `interact`
--
ALTER TABLE `interact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interact_ibfk_2` (`userid`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentor_ibfk_1` (`userid`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_ibfk_1` (`userid`);

--
-- Indexes for table `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`id`),
  ADD KEY `react_ibfk_2` (`postid`),
  ADD KEY `react_ibfk_1` (`userid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savedposts`
--
ALTER TABLE `savedposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `savedposts_ibfk_1` (`postid`),
  ADD KEY `savedposts_ibfk_2` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interact`
--
ALTER TABLE `interact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `savedposts`
--
ALTER TABLE `savedposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`listid`) REFERENCES `alumnilist` (`nationalid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interact`
--
ALTER TABLE `interact`
  ADD CONSTRAINT `interact_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interact_ibfk_3` FOREIGN KEY (`postid`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentor`
--
ALTER TABLE `mentor`
  ADD CONSTRAINT `mentor_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `react`
--
ALTER TABLE `react`
  ADD CONSTRAINT `react_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `react_ibfk_2` FOREIGN KEY (`postid`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `savedposts`
--
ALTER TABLE `savedposts`
  ADD CONSTRAINT `savedposts_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `savedposts_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
