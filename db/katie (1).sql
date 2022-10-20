-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 20, 2022 at 07:07 AM
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
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `description`, `count`, `created_at`, `edited_at`) VALUES
(1, 'brave', 'some fighters', NULL, '2022-10-08 22:33:36', '2022-10-08 20:33:21'),
(3, 'gladiators', 'Arena heros', NULL, '2022-10-08 22:33:36', '2022-10-08 20:33:21'),
(4, 'sleeper', 'bed lovers who stay up late and sleep till noon.', NULL, '2022-10-08 22:34:51', '2022-10-08 20:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `p_id`, `img_path`, `comment`, `uploaded_at`) VALUES
(18, 56, '1666201103-56.jpg', '', '2022-10-19 19:38:23'),
(19, 56, '1666204111-56.jpg', '', '2022-10-19 20:28:31'),
(21, 45, '1666210831-45.jpg', '', '2022-10-19 22:20:31'),
(22, 45, '1666210839-45.jpg', '', '2022-10-19 22:20:39'),
(23, 55, '1666246509-55.jpg', 'with', '2022-10-20 08:15:09'),
(24, 55, '1666249335-55.jpg', 'Orlando when will be aged', '2022-10-20 09:02:15');

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

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `description`, `extra`) VALUES
(5, 'Arabic', 'fantastic', 'something about Arabic, it is something.'),
(9, 'English', 'most common language', 'say something'),
(10, 'French', 'description', 'extra personal notes'),
(11, 'Portuguese', 'porto description', 'extra personal data'),
(19, 'Pedoa', 'An invented language that does not exist anywhere', 'maybe I will invent its script :)\r\nNot now.... it will happen later!');

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
  `img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `last_name`, `sex`, `email`, `img`, `created_at`, `edited_at`, `added_by`) VALUES
(42, 'Alfonso', 'Martinho', 'male', 'AM@gmail.com', '', '2022-10-13 20:23:47', '2022-10-19 21:28:49', 16),
(43, 'Bethany', 'Bernando', 'female', 'Bernando@gmail.com', NULL, '2022-10-13 20:24:10', '2022-10-19 18:36:31', 16),
(44, 'Captin', 'Boolean', 'male', 'Salty@gmail.com', NULL, '2022-10-13 20:24:46', '2022-10-14 16:09:09', 16),
(45, 'Ebrahim', 'Salto', 'male', 'e.salto@gmail.com', '1666210839-45.jpg', '2022-10-13 20:25:30', '2022-10-19 22:20:39', 16),
(46, 'Fredrick', 'Labo', 'male', 'labo@gmail.com', NULL, '2022-10-13 20:26:09', NULL, 16),
(47, 'George', 'Creepo', 'male', 'smily_g@gmail.com', NULL, '2022-10-13 20:26:42', NULL, 16),
(48, 'Haroot', 'Bebayan', 'male', 'h.b@gmail.com', NULL, '2022-10-13 20:27:09', '2022-10-19 18:36:43', 16),
(49, 'Israel', 'beni', 'male', 'I.beni@gmail.com', NULL, '2022-10-13 20:27:42', NULL, 16),
(50, 'Jessica', 'Lufy', 'female', 'jessica_L@gmail.com', NULL, '2022-10-13 20:28:13', '2022-10-19 18:36:41', 16),
(51, 'Kathren', 'Sorbonne', 'female', 'kasor@gmail.com', NULL, '2022-10-13 20:29:54', NULL, 16),
(52, 'Linda', 'sweet', 'female', 'lsweet@gmail.com', NULL, '2022-10-13 20:30:13', '2022-10-19 18:36:39', 16),
(53, 'Marcos', 'Pavoto', 'male', 'pavma@gmail.com', NULL, '2022-10-13 20:30:45', NULL, 16),
(54, 'Nona', 'Pretty', 'female', 'sweet_n@gmail.com', NULL, '2022-10-13 20:31:08', NULL, 16),
(55, 'Orlando', 'boxer', 'male', 'ob@gmail.com', '1666249335-55.jpg', '2022-10-13 20:31:29', '2022-10-20 09:02:15', 16),
(56, 'Patricia', 'Mano', 'female', 'mano_p@gmail.com', '1666201103-56.jpg', '2022-10-13 20:32:43', '2022-10-19 21:32:02', 16);

-- --------------------------------------------------------

--
-- Table structure for table `people_groups`
--

CREATE TABLE `people_groups` (
  `group_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people_languages`
--

CREATE TABLE `people_languages` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `lan_id` int(11) NOT NULL,
  `levle` enum('25','50','75','100') NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people_languages`
--

INSERT INTO `people_languages` (`id`, `p_id`, `lan_id`, `levle`, `comment`) VALUES
(69, 50, 9, '75', ''),
(70, 46, 9, '25', ''),
(85, 45, 11, '100', 'lorem a;lskjd apwoj mvn ,xmnvc\r\nlaskdj alksdj pawojd lakjf sd'),
(86, 46, 10, '75', 'well, speaking has a shy personality, and can be relyed on!'),
(87, 55, 11, '50', 'nice accent, Brazilian.'),
(88, 55, 9, '50', 'facing some difficulties to express, but understandable language.'),
(90, 43, 11, '75', ''),
(92, 56, 11, '75', ''),
(93, 53, 10, '75', ''),
(95, 56, 10, '100', 'asd'),
(98, 44, 5, '50', ''),
(99, 44, 11, '75', ''),
(100, 44, 10, '100', 'aasd'),
(101, 56, 19, '25', ''),
(102, 56, 19, '25', ''),
(103, 56, 19, '25', ''),
(104, 56, 19, '25', ''),
(105, 51, 10, '25', ''),
(106, 51, 10, '25', ''),
(107, 46, 11, '25', ''),
(108, 46, 11, '25', ''),
(109, 46, 10, '25', ''),
(110, 49, 10, '25', '765'),
(111, 45, 11, '50', 'ddsadsad'),
(112, 45, 5, '25', 'ssad'),
(115, 48, 10, '50', 'nice');

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
  `number` bigint(20) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phone_numbers`
--

INSERT INTO `phone_numbers` (`id`, `number`, `p_id`, `description`, `created_at`, `edited_at`) VALUES
(1, 888718827131, NULL, 'removed', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
(2, 332332332, NULL, 'brother', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
(3, 99009900990099, NULL, 'test test test', '2022-10-08 19:01:51', '2022-10-08 17:01:23'),
(24, 99009900990099, NULL, 'asdasdada', '2022-10-11 09:16:28', NULL),
(25, 123111, NULL, '2321312', '2022-10-11 09:46:30', NULL),
(42, 123456789, 55, 'personal', '2022-10-13 20:33:17', NULL),
(44, 32456788913, 56, 'mother', '2022-10-13 20:33:55', NULL),
(45, 99929991, 56, 'personal 2', '2022-10-13 21:31:33', NULL),
(46, 771223123, 49, 'General', '2022-10-13 21:31:50', NULL),
(48, 4432512345, 49, 'General', '2022-10-13 21:32:16', NULL),
(49, 12312341255213, 53, 'private / emergency', '2022-10-13 21:32:40', NULL),
(52, 12313323, 43, 'Please verify the description, it should not contain special characters.', '2022-10-15 17:47:43', NULL),
(53, 33213333, 52, 'ads', '2022-10-18 23:57:21', NULL),
(54, 998808880, 51, 'privet', '2022-10-18 23:58:14', NULL),
(55, 21020203, 46, 'test test test', '2022-10-18 23:59:17', NULL),
(56, 2223332222, 54, 'General', '2022-10-19 00:00:19', NULL),
(57, 13213123123, 45, 'General', '2022-10-19 21:35:09', NULL),
(58, 1233333, 45, 'asd', '2022-10-19 21:36:02', NULL),
(59, 990123, 55, 'net', '2022-10-19 21:37:43', NULL);

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
  ADD KEY `comments_ibfk_1` (`p_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

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
  ADD KEY `people_ibfk_1` (`added_by`);

--
-- Indexes for table `people_groups`
--
ALTER TABLE `people_groups`
  ADD KEY `p_id` (`p_id`),
  ADD KEY `people_groups_ibfk_1` (`group_id`);

--
-- Indexes for table `people_languages`
--
ALTER TABLE `people_languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id index` (`id`),
  ADD KEY `people_languages_ibfk_1` (`lan_id`),
  ADD KEY `people_languages_ibfk_2` (`p_id`);

--
-- Indexes for table `people_titles`
--
ALTER TABLE `people_titles`
  ADD KEY `cascade` (`p_id`),
  ADD KEY `title_id` (`title_id`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_numbers_ibfk_1` (`p_id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD KEY `relations_ibfk_1` (`p_id1`),
  ADD KEY `relations_ibfk_2` (`p_id2`);

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
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `people_languages`
--
ALTER TABLE `people_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imgs`
--
ALTER TABLE `imgs`
  ADD CONSTRAINT `imgs_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `people_groups`
--
ALTER TABLE `people_groups`
  ADD CONSTRAINT `people_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `people_groups_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `people_languages`
--
ALTER TABLE `people_languages`
  ADD CONSTRAINT `people_languages_ibfk_1` FOREIGN KEY (`lan_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `people_languages_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `people_titles`
--
ALTER TABLE `people_titles`
  ADD CONSTRAINT `cascade` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `people_titles_ibfk_1` FOREIGN KEY (`title_id`) REFERENCES `job_titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relations`
--
ALTER TABLE `relations`
  ADD CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`p_id1`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`p_id2`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
