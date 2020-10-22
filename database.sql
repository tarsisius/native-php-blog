-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2020 at 01:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `slug`, `created_at`) VALUES
(22, 'asdsa', 'asdsa', '2020-05-01 06:27:31'),
(25, 'coba cek', 'coba-cek', '2020-05-01 06:45:33'),
(26, 'adas', 'adas', '2020-05-03 04:52:32'),
(27, 'asdass', 'asdass', '2020-05-03 04:54:11'),
(31, 'Cek Baru', 'cek-baru', '2020-06-02 00:33:11'),
(33, 'Coba tambah', 'coba-tambah', '2020-06-03 00:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `slug` varchar(125) NOT NULL,
  `thumbnail` varchar(225) NOT NULL,
  `text` text DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_name` varchar(125) NOT NULL,
  `penulis` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_name`, `slug`, `thumbnail`, `text`, `active`, `created_at`, `category_name`, `penulis`) VALUES
(2, 'Coba Judul ', 'coba-judul-', '5 1590799241.png', 'Eiusmod irure in reprehenderit do sit enim ut ex eiusmod ea tempor proident Lorem reprehenderit. Nulla in deserunt laborum in id. Culpa laboris tempor tempor incididunt fugiat tempor ipsum mollit laboris Lorem nisi consequat aliquip. Id labore tempor pariatur consequat consequat. Voluptate veniam esse pariatur nostrud dolor anim non in magna magna enim esse. Occaecat sunt cillum cupidatat voluptate culpa labore aute non veniam fugiat. Sit esse velit fugiat nisi dolore veniam esse nostrud ex.\r\n\r\nUt aliquip eiusmod id labore sint culpa. Ullamco aliquip irure duis pariatur irure veniam consectetur exercitation elit velit. Anim cillum culpa dolor ipsum officia ea culpa. Reprehenderit cupidatat laboris commodo aute in duis magna id qui anim do. Pariatur est id adipisicing anim.', 1, '2020-05-29 00:39:18', 'adas', 'Aryo'),
(3, 'Judul Post Kedua', 'judul-post-kedua', '5 1590799234.png', 'Eiusmod irure in reprehenderit do sit enim ut ex eiusmod ea tempor proident Lorem reprehenderit. Nulla in deserunt laborum in id. Culpa laboris tempor tempor incididunt fugiat tempor ipsum mollit laboris Lorem nisi consequat aliquip. Id labore tempor pariatur consequat consequat. Voluptate veniam esse pariatur nostrud dolor anim non in magna magna enim esse. Occaecat sunt cillum cupidatat voluptate culpa labore aute non veniam fugiat. Sit esse velit fugiat nisi dolore veniam esse nostrud ex.\r\n\r\nUt aliquip eiusmod id labore sint culpa. Ullamco aliquip irure duis pariatur irure veniam consectetur exercitation elit velit. Anim cillum culpa dolor ipsum officia ea culpa. Reprehenderit cupidatat laboris commodo aute in duis magna id qui anim do. Pariatur est id adipisicing anim.', 1, '2020-05-29 00:39:36', 'adas', 'Aryo'),
(4, 'Coba Judul Edited', 'coba-judul-edited', '5 1590799226.png', 'Eiusmod irure in reprehenderit do sit enim ut ex eiusmod ea tempor proident Lorem reprehenderit. Nulla in deserunt laborum in id. Culpa laboris tempor tempor incididunt fugiat tempor ipsum mollit laboris Lorem nisi consequat aliquip. Id labore tempor pariatur consequat consequat. Voluptate veniam esse pariatur nostrud dolor anim non in magna magna enim esse. Occaecat sunt cillum cupidatat voluptate culpa labore aute non veniam fugiat. Sit esse velit fugiat nisi dolore veniam esse nostrud ex.\r\n\r\nUt aliquip eiusmod id labore sint culpa. Ullamco aliquip irure duis pariatur irure veniam consectetur exercitation elit velit. Anim cillum culpa dolor ipsum officia ea culpa. Reprehenderit cupidatat laboris commodo aute in duis magna id qui anim do. Pariatur est id adipisicing anim.', 1, '2020-05-29 00:39:54', 'coba cek', 'Aryo'),
(5, 'Ini Cuma Dummy', 'ini-cuma-dummy', '5 1590799218.png', 'Eiusmod irure in reprehenderit do sit enim ut ex eiusmod ea tempor proident Lorem reprehenderit. Nulla in deserunt laborum in id. Culpa laboris tempor tempor incididunt fugiat tempor ipsum mollit laboris Lorem nisi consequat aliquip. Id labore tempor pariatur consequat consequat. Voluptate veniam esse pariatur nostrud dolor anim non in magna magna enim esse. Occaecat sunt cillum cupidatat voluptate culpa labore aute non veniam fugiat. Sit esse velit fugiat nisi dolore veniam esse nostrud ex.\r\n\r\nUt aliquip eiusmod id labore sint culpa. Ullamco aliquip irure duis pariatur irure veniam consectetur exercitation elit velit. Anim cillum culpa dolor ipsum officia ea culpa. Reprehenderit cupidatat laboris commodo aute in duis magna id qui anim do. Pariatur est id adipisicing anim.', 1, '2020-05-29 00:40:17', 'asdass', 'Aryo'),
(6, 'Siapa Takut Aku Diriku Kah Anwkwk', 'siapa-takut-aku-diriku-kah-anwkwk', '5 1590799914.png', 'Eiusmod irure in reprehenderit do sit enim ut ex eiusmod ea tempor proident Lorem reprehenderit. Nulla in deserunt laborum in id. Culpa laboris tempor tempor incididunt fugiat tempor ipsum mollit laboris Lorem nisi consequat aliquip. Id labore tempor pariatur consequat consequat. Voluptate veniam esse pariatur nostrud dolor anim non in magna magna enim esse. Occaecat sunt cillum cupidatat voluptate culpa labore aute non veniam fugiat. Sit esse velit fugiat nisi dolore veniam esse nostrud ex.\r\n\r\nUt aliquip eiusmod id labore sint culpa. Ullamco aliquip irure duis pariatur irure veniam consectetur exercitation elit velit. Anim cillum culpa dolor ipsum officia ea culpa. Reprehenderit cupidatat laboris commodo aute in duis magna id qui anim do. Pariatur est id adipisicing anim.', 1, '2020-05-29 00:40:45', 'coba cek', 'Aryo'),
(7, 'Ini Coba Pagesss', 'ini-coba-pagesss', '5 1590813589.png', 'Eiusmod irure in reprehenderit do sit enim ut ex eiusmod ea tempor proident Lorem reprehenderit. Nulla in deserunt laborum in id. Culpa laboris tempor tempor incididunt fugiat tempor ipsum mollit laboris Lorem nisi consequat aliquip. Id labore tempor pariatur consequat consequat. Voluptate veniam esse pariatur nostrud dolor anim non in magna magna enim esse. Occaecat sunt cillum cupidatat voluptate culpa labore aute non veniam fugiat. Sit esse velit fugiat nisi dolore veniam esse nostrud ex.\r\n\r\nUt aliquip eiusmod id labore sint culpa. Ullamco aliquip irure duis pariatur irure veniam consectetur exercitation elit velit. Anim cillum culpa dolor ipsum officia ea culpa. Reprehenderit cupidatat laboris commodo aute in duis magna id qui anim do. Pariatur est id adipisicing anim.', 1, '2020-05-30 04:39:49', 'adas', 'Aryo'),
(8, 'Posting Kesekian Kalinya Edits', 'posting-kesekian-kalinya-edits', '5 1591008787.png', 'Eiusmod irure in reprehenderit do sit enim ut ex eiusmod ea tempor proident Lorem reprehenderit. Nulla in deserunt laborum in id. Culpa laboris tempor tempor incididunt fugiat tempor ipsum mollit laboris Lorem nisi consequat aliquip. Id labore tempor pariatur consequat consequat. Voluptate veniam esse pariatur nostrud dolor anim non in magna magna enim esse. Occaecat sunt cillum cupidatat voluptate culpa labore aute non veniam fugiat. Sit esse velit fugiat nisi dolore veniam esse nostrud ex. Ut aliquip eiusmod id labore sint culpa. Ullamco aliquip irure duis pariatur irure veniam consectetur exercitation elit velit. Anim cillum culpa dolor ipsum officia ea culpa. Reprehenderit cupidatat laboris commodo aute in duis magna id qui anim do. Pariatur est id adipisicing anim.', 1, '2020-06-01 10:34:28', 'coba cek', 'Aryo');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `jumbotron` varchar(225) NOT NULL,
  `page` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `jumbotron`, `page`) VALUES
(1, 'Aryo', 'Halo', '6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `role_id` enum('Administrator','Manager') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `active`, `role_id`, `created_at`) VALUES
(1, 'Aryo', 'admin@demo.com', '28f1d3b2dfa8018a9910ae70e2d1005035f3bdb0', 1, 'Administrator', '2017-05-22 19:38:30'),
(2, 'Halim', 'halim@demo.com', '28f1d3b2dfa8018a9910ae70e2d1005035f3bdb0', 1, 'Administrator', '2017-05-22 19:39:13'),
(3, 'Sara', 'sara@demo.com', '28f1d3b2dfa8018a9910ae70e2d1005035f3bdb0', 1, 'Manager', '2017-05-22 19:40:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug_UNIQUE` (`slug`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
