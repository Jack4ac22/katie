-- phpMyAdmin SQL Dump s
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 08, 2022 at 10:28 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katie`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `value` enum('essential','important','normal','personal') NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` date NOT NULL,
  `edited_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `description`, `created_at`, `edited_at`) VALUES
(1, 'brave', 'some fighters', '2022-10-08 22:33:36', '2022-10-08 20:33:21'),
(3, 'gladiators', 'Arena heros', '2022-10-08 22:33:36', '2022-10-08 20:33:21'),
(4, 'sleeper', 'bed lovers who stay up late and sleep till noon.', '2022-10-08 22:34:51', '2022-10-08 20:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_titles`
--

INSERT INTO `job_titles` (`id`, `title`, `description`) VALUES
(1, 'Bossy', 'do not do but say'),
(2, 'My best work', 'not that important'),
(3, 'something', 'not that important'),
(4, 'something', 'not that important'),
(5, 'asdasd', 'not tasdasdhat important'),
(6, 'asd', 'asdasd'),
(7, 'new job title for test', 'asdasd and asdlkj alsdkj'),
(8, 'presedent', 'this title belong to me alone'),
(10, 'jack title', 'this is a work that only jack can do'),
(11, 'player', 'does nothing beside complaining and playing'),
(12, 'Brave', 'solder'),
(14, 'Baba', 'kjkkkas '),
(15, 'asda', 'asdasd'),
(16, 'asdaa', 'asdasd'),
(17, 'new Idaa', 'sssdJJasd '),
(18, 'Queen', 'katie is not qualified to be a queen, she is much better than that..'),
(19, 'asddd', 'dsda'),
(20, 'Brave fighter', 'always available, fighting for the truth...'),
(21, 'Brave JET', 'always FLYING...');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `sex`, `email`, `created_at`, `edited_at`, `added_by`) VALUES
(11, 'jack', 'kazanjyan', 'male', 'jack@gmail.com', NULL, NULL, NULL),
(12, 'Katie', 'Kazanjyan', 'female', 'katie@gmail.com', NULL, NULL, NULL),
(13, 'Mark', 'dejong', 'male', 'mark@gmail.com', NULL, NULL, NULL),
(14, 'Beth', 'De jong', 'female', 'beth@gmail.com', NULL, NULL, NULL),
(15, 'matthew', 'dejong', 'male', 'matthew@gmail.com', NULL, NULL, NULL),
(16, 'jack', 'kazanjyan', 'male', 'jack@gmail.com', NULL, NULL, NULL),
(17, 'Katie', 'Kazanjyan', 'female', 'katie@gmail.com', NULL, NULL, NULL),
(18, 'Mark', 'dejong', 'male', 'mark@gmail.com', NULL, NULL, NULL),
(19, 'Beth', 'De jong', 'female', 'beth@gmail.com', NULL, NULL, NULL),
(20, 'matthew', 'dejong', 'male', 'matthew@gmail.com', NULL, NULL, NULL),
(23, 'asd', 'ddsd', 'male', 'asdad', '2022-10-08 00:00:00', NULL, NULL),
(25, 'Joel', 'Myer', 'male', '', NULL, NULL, NULL),
(26, 'Peter', 'Simpson', 'male', 'peter@email.com', '2022-10-08 00:00:00', NULL, NULL),
(27, 'katie', 'de-jong', 'female', 'ktdjng@gmail.com', '2022-10-08 16:52:06', NULL, 16),
(28, 'samantha', 'peterson', 'female', 'sam@gmail.com', '2022-10-08 16:52:43', NULL, 16),
(29, 'Tony', 'Kazanjyan', 'male', 'tony@gmail.com', '2022-10-08 17:11:24', NULL, 16),
(30, 'Kamala', 'Harris', 'female', 'kamala@gmail.com', '2022-10-08 17:13:35', NULL, 16),
(31, 'Johny', 'doe', 'male', 'jj@gmail.com', '2022-10-08 17:22:43', NULL, 16),
(32, 'Moulin', 'Smart', 'male', 'lkj@gmail.com', '2022-10-08 17:46:26', NULL, 16),
(33, 'Kaleb', 'Namato', 'male', 'KK@gmail.com', '2022-10-08 17:47:19', NULL, 16),
(34, 'stephen', 'stello', 'male', 'S@gmail.com', '2022-10-08 17:50:58', NULL, 16),
(35, 'sstephen', 'stello', 'male', 'sS@gmail.com', '2022-10-08 17:51:45', NULL, 16),
(36, 'sstephen', 'stello', 'male', 'ssS@gmail.com', '2022-10-08 17:52:21', NULL, 16),
(37, 'pretty', 'Simpson', 'female', 'pella@gmail.com', '2022-10-08 17:56:02', NULL, 16),
(38, 'Jemmy', 'smurf', 'male', 'jem@gmail.com', '2022-10-08 17:57:26', NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `people_groups`
--

CREATE TABLE `people_groups` (
  `group_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people_groups`
--

INSERT INTO `people_groups` (`group_id`, `p_id`) VALUES
(1, 11),
(1, 23),
(1, 14),
(1, 19),
(3, 33),
(3, 28),
(3, 16),
(3, 31),
(4, 29),
(4, 37);

-- --------------------------------------------------------

--
-- Table structure for table `people_languages`
--

CREATE TABLE `people_languages` (
  `p_id` int(11) NOT NULL,
  `lan_id` int(11) NOT NULL,
  `levle` enum('beginner','intermediate','advanced','fluent') NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people_titles`
--

CREATE TABLE `people_titles` (
  `title_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `id` int(11) NOT NULL,
  `number` int(20) NOT NULL,
  `p_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phone_numbers`
--

INSERT INTO `phone_numbers` (`id`, `number`, `p_id`, `description`, `created_at`, `edited_at`) VALUES
(1, 888718827, 11, 'personal', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
(2, 332332332, 11, 'brother', '2022-10-08 19:01:51', '2022-10-08 17:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `p_id1` int(11) NOT NULL,
  `p_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `contenent` varchar(255) DEFAULT 'private',
  `country` varchar(255) DEFAULT 'private',
  `zone` varchar(255) NOT NULL,
  `GMT_difference` int(11) NOT NULL,
  `daylight_saving` tinyint(1) NOT NULL DEFAULT '0',
  `winter` date NOT NULL,
  `summer` date NOT NULL,
  `created_at` date NOT NULL,
  `edited_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `other_pass` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `other_pass`, `created_at`, `edited_at`) VALUES
(16, 'jack', '$2y$10$iaHACDVPkG/z.Db.wSkdiOuZkmetyxsHMB0dbqzJP2sv0Jn21mOAC', '$2y$10$.DJ9VEwltc0Ud5OCql5XjO.SbTBTF/pRs.lxnFlOs8opCxg47L.qi', '2022-10-08 03:46:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `people_groups`
--
ALTER TABLE `people_groups`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `people_languages`
--
ALTER TABLE `people_languages`
  ADD KEY `lan_id` (`lan_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `people_titles`
--
ALTER TABLE `people_titles`
  ADD KEY `p_id` (`p_id`),
  ADD KEY `title_id` (`title_id`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD KEY `p_id1` (`p_id1`),
  ADD KEY `p_id2` (`p_id2`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `people_groups`
--
ALTER TABLE `people_groups`
  ADD CONSTRAINT `people_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `people_groups_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `people_languages`
--
ALTER TABLE `people_languages`
  ADD CONSTRAINT `people_languages_ibfk_1` FOREIGN KEY (`lan_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `people_languages_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`);

--
-- Constraints for table `people_titles`
--
ALTER TABLE `people_titles`
  ADD CONSTRAINT `people_titles_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `people_titles_ibfk_2` FOREIGN KEY (`title_id`) REFERENCES `job_titles` (`id`);

--
-- Constraints for table `relations`
--
ALTER TABLE `relations`
  ADD CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`p_id1`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`p_id2`) REFERENCES `people` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
