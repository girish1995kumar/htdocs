-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2018 at 10:04 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialnetwork1`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) unsigned NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `posted_at` datetime NOT NULL,
  `post_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `posted_at`, `post_id`) VALUES
(1, 'good post', 5, '2018-07-11 02:11:02', 6),
(2, 'very good post', 5, '2018-07-11 02:13:42', 6),
(3, 'nice job shankar', 5, '2018-07-11 02:13:59', 3),
(4, 'good', 5, '2018-07-12 23:37:40', 6);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `follower_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follower_id`) VALUES
(1, 2, 1),
(2, 3, 1),
(6, 2, 0),
(7, 3, 0),
(8, 4, 0),
(9, 1, 5),
(10, 4, 5),
(11, 2, 5),
(15, 1, 0),
(16, 21, 5),
(17, 5, 21),
(18, 5, 22),
(19, 5, 23),
(20, 5, 24);

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE IF NOT EXISTS `login_tokens` (
`id` int(11) unsigned NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `user_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`) VALUES
(55, '54949b919b17c3e9e66dc16f8fa27f5690430d29', 1),
(56, '7922a65cec631f7aff08c0933264b130bb2c95b2', 1),
(77, 'b99d3ca733bdaa83be64fd20fafe74d7078bb92e', 5),
(78, 'b31cfb17e15d3467c8ff2255d9e3378ceebd3682', 5),
(79, '49aa8638bfa8d5cb591955e2d0531591cf87be30', 5),
(80, '27cc2b0d809ee4ae9c4c997624f27cc9e3fdde22', 5),
(81, '4087e0f4158370b6d86a1876cf5346690ebf99e8', 5),
(82, 'd8728d8b0dc976f66ee0f68664e86541cb6b4a34', 5),
(83, '1e968d53cb9bc3add1aedebbd27daad809a83cf9', 5),
(85, '854c0a77b38134e768d5fd3b78062e892fac95fc', 21),
(86, '0cecd2aca55651f8854a3dd90b43107278f9725a', 5),
(87, 'ae437fd50f150b59473da2564e99b0cfeb550a9f', 22),
(88, '88b433c9ffcb546b834b38e5038f9f4a0b874c0c', 5),
(89, '0092c067c521b192f7e743fe34d3bc1f04dfc2fa', 5),
(90, '310f78a66d5efb10d675142d8b9fbfcce34b6b50', 5),
(91, '2408a1f183d0f71e59fddafb10d2078db4755619', 5),
(92, '4a9ad319eeac0c6e7687cb9456a9bf38d363179f', 5),
(93, '26fd8d0c30724e6679b84505eee2e65f8f01a74c', 5),
(94, '74d7c6618640c15d30706e454a5118b76717fe2c', 5),
(95, '1d7233c09451fe33faefff6e5eafc7b9cf248867', 5),
(96, '9c1df989a5c283d66b028d556ee3fc7ae161d60e', 5),
(97, 'db9601b51f13f0d070eb7f97c7e59c80217431d1', 5),
(98, 'c27845d4a42ffb86e5c9980459b1ce49f348795f', 5),
(99, '086c0fb3256fafb62e3ba9d8db7d0793a4aec9ab', 5),
(100, 'ccbcf2045d2007662be1c7b2efe0e299670a6d56', 5);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) unsigned NOT NULL,
  `body` text NOT NULL,
  `sender` int(11) unsigned NOT NULL,
  `receiver` int(11) unsigned NOT NULL,
  `read` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `body`, `sender`, `receiver`, `read`) VALUES
(1, 'hi ram', 1, 2, 1),
(2, 'hi shyam', 1, 3, 0),
(3, 'hi shankar', 2, 1, 1),
(4, 'hi shankar', 3, 1, 0),
(5, 'hi shyam', 1, 3, 0),
(6, 'hi shankar1 welcome to the new social network', 1, 5, 1),
(7, 'hi ram', 5, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
`id` int(11) unsigned NOT NULL,
  `type` int(11) unsigned NOT NULL,
  `receiver` int(10) unsigned NOT NULL,
  `sender` int(11) unsigned NOT NULL,
  `extra` text
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `receiver`, `sender`, `extra`) VALUES
(1, 1, 1, 1, ' { "postbody": "fisrt post with #shankar @shankar" } '),
(2, 1, 1, 1, ' { "postbody": "@shankar I think It''s working #working" } '),
(3, 1, 5, 5, ' { "postbody": "@shankar1 how r u? #shankar1" } '),
(4, 1, 5, 5, ' { "postbody": "I m good @shankar1 #shankar1" } '),
(5, 2, 2, 1, ''),
(6, 2, 1, 5, ''),
(7, 2, 2, 1, ''),
(8, 2, 1, 5, ''),
(9, 2, 1, 5, ''),
(10, 2, 1, 5, ''),
(11, 2, 1, 5, ''),
(12, 2, 1, 5, ''),
(13, 2, 1, 5, ''),
(14, 2, 1, 5, ''),
(15, 2, 1, 5, ''),
(16, 2, 1, 5, ''),
(17, 2, 2, 1, ''),
(18, 2, 2, 1, ''),
(19, 2, 2, 1, ''),
(20, 2, 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `password_tokens`
--

CREATE TABLE IF NOT EXISTS `password_tokens` (
`id` int(11) unsigned NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `user_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_tokens`
--

INSERT INTO `password_tokens` (`id`, `token`, `user_id`) VALUES
(9, '193d5a8a6d5f6a343c461cf8786007376122414b', 5),
(10, 'db4278487f21ef29dabb9263c1c5c1c9e1b2f131', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) unsigned NOT NULL,
  `body` varchar(160) NOT NULL DEFAULT '',
  `posted_at` datetime NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `likes` int(11) unsigned NOT NULL,
  `postimg` varchar(255) DEFAULT NULL,
  `topics` varchar(400) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `posted_at`, `user_id`, `likes`, `postimg`, `topics`) VALUES
(1, 'this is shankar''s first post', '2018-07-09 00:01:55', 1, 1, '', ''),
(2, 'this is shankar''s first image post @shankar', '2018-07-09 00:04:09', 1, 1, '', ''),
(3, 'fisrt post with #shankar @shankar', '2018-07-09 00:33:33', 1, 1, '', 'shankar,'),
(5, '@shankar I think It''s working #working', '2018-07-09 00:39:31', 1, 3, '', 'working,'),
(6, 'hi new follower post', '2018-07-10 02:16:43', 2, 1, '', ''),
(7, 'hi there how are you', '2018-07-11 01:09:45', 5, 2, '', ''),
(8, 'Panda', '2018-07-11 01:10:04', 5, 7, 'https://i.imgur.com/8vKpFeo.jpg', ''),
(9, '@shankar1 how r u? #shankar1', '2018-07-11 01:41:35', 5, 9, '', 'shankar1,'),
(10, 'I m good @shankar1 #shankar1', '2018-07-11 01:43:14', 5, 27, '', 'shankar1,'),
(11, 'my first image #post', '2018-07-14 14:00:42', 2, 0, 'https://i.imgur.com/5qR6dhj.jpg', ''),
(12, 'nomoke', '2018-07-24 01:07:05', 1, 2, 'https://i.imgur.com/nvcwkle.png', ''),
(13, 'koala', '2018-07-24 01:08:17', 1, 1, 'https://i.imgur.com/yhdpBIp.jpg', ''),
(14, 'hi there', '2018-07-29 19:10:29', 5, 12, 'https://i.imgur.com/nlTVl8e.jpg', ''),
(15, 'bad job', '2018-08-08 14:06:52', 1, 3, 'https://i.imgur.com/ZehJ3rp.jpg', ''),
(16, 'hi there this is my new post', '2018-08-13 17:31:23', 5, 0, 'https://i.imgur.com/P4mbLPl.png', ''),
(17, 'hi there this is completly new page', '2018-08-13 20:48:48', 5, 0, 'https://i.imgur.com/0WVb7JT.png', ''),
(18, 'hi there this is completly new page', '2018-08-13 20:49:15', 5, 0, 'https://i.imgur.com/8nFFtnK.png', ''),
(19, 'ghijkcd ', '2018-08-24 01:01:59', 5, 0, 'https://i.imgur.com/bvsWuj7.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE IF NOT EXISTS `post_likes` (
`id` int(11) unsigned NOT NULL,
  `post_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_id`, `user_id`) VALUES
(3, 6, 1),
(8, 3, 5),
(11, 2, 5),
(12, 1, 5),
(13, 5, 5),
(28, 12, 1),
(34, 13, 5),
(36, 10, 5),
(38, 8, 5),
(40, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` text,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `profileimg` varchar(255) DEFAULT NULL,
  `closed` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `verified`, `profileimg`, `closed`) VALUES
(1, 'shankar', '$2y$10$4MJDHNtj1S.Hb3N0CchGhuEwKAdSuAX8gr2GrHfJ05tuT5dEOv9h.', 'shankargnduasr@gmail.com', 0, 'https://i.imgur.com/EJSSDt5.png', 'no'),
(2, 'ram', '$2y$10$lSa9Tnx7GKNn3bVDDZJutOfR47BG1WDRz20doiOMFCDKYTdWSipiG', 'ramram@gmail.com', 0, '', 'no'),
(3, 'shyam', '$2y$10$i6J0hT4AYQv7C8rO9PyjOOrOvo1jv3FgzgHGAoUI8MXVyL6JP.zF6', 'shyam@gmail.com', 0, '', 'no'),
(4, 'ramu', '$2y$10$35yRiULz9yhY4xBnLkGhN.s01lHA7DclZbXwAya8y/ZPDtKSmc9mK', 'ramu@gmail.com', 0, '', 'no'),
(5, 'shankar1', '$2y$10$qVW3KlH3YtBoWIXsiWl8zuTp.a/dLJcJKVr2gMotUYRwPLUqGtmpK', 'shankar1@gmail.com', 0, 'https://i.imgur.com/MhWduhb.png', 'no'),
(6, 'shankar2', '$2y$10$r13iPYQRK/Kz7iJ1smggXea/b61oEIXrMqR9g6.wWQkE/PL0ISR7e', 'shankar2@gmail.com', 0, '', 'no'),
(7, 'shankar101', '$2y$10$3rppP/KKbtW1FLxeT0BkgehWEjZUwxVDMPRXb8apYyUBjoBj6/9Sq', 'shankar101@gmail.com', 0, '', 'no'),
(8, 'shankar102', '$2y$10$JZR609k84ej.n71mq/dQW.aXf1cRxJgLKUCB9pPyxzGIKIPG9Wajq', 'shankar102@gmail.com', 0, '', 'no'),
(9, 'shankar103', '$2y$10$LvR5KkS6D.n.JM3E6LMxT.qWr7vgwnAWpEgHlKzFmSaxoNF9VeE9S', 'shankar103@gmail.com', 0, '', 'no'),
(10, 'shankar104', '$2y$10$UCb2cmhmZXms8I1ANPS6b.wd2X1gg2qnjDqxRJY1218VOp/QJJyzW', 'shankar104@gmail.com', 0, '', 'no'),
(11, 'shankar105', '$2y$10$9do2WW6HPUfS8y9KZK6egOW3Qtfax4MUJ8qFe8TV5UdBTxLn5s4t6', 'shankar105@gmail.com', 0, '', 'no'),
(12, 'shankar106', '$2y$10$rOFc6HE38l2kKF8bBPAVuOGfDxkMBbgWTZUTFZIZUCdnxf47qEejq', 'shankar106@gmail.com', 0, '', 'no'),
(13, 'shankar6', '$2y$10$MevhnEmTfVBKHl11cVkQzulGEKHJdcSQFy7GhxjmI3yOBaqr4RTze', 'shankar6@gmail.com', 0, '', ''),
(14, 'shankar7', '$2y$10$c8ctc/AynClvi/WmjfspUOOhYefMd4uEoJjaJE4gG0G7BZu3JTho.', 'shankar7@gmail.com', 0, '', ''),
(15, 'shankar8', '$2y$10$hzp2b2dLxrBcN69c4w9MUul7UarTw2m5e3opqiLiVX4YSgJVrAjZ.', 'shankar8@gmail.com', 0, '', ''),
(16, 'shankar10', '$2y$10$0dZOvBJxWJ8Q52XgQjFr5unFYerSQOJWbsPUOEQz5V5Wi24qhBHw6', 'shankar10@gmail.com', 0, '', ''),
(17, 'watch', '$2y$10$l14ckx8/mFQWzxj2FJ90GOBzrax6/Gyt7dWyMTa5YFPN4ypXkM4Va', 'watch@gmail.com', 0, '', ''),
(18, 'watch2', '$2y$10$P.K6E/YzmrddMglWNAl0yuA5xEax7SfXwhapt.kT1O5sg6DjV3Wly', 'watch2@gmail.com', 0, '', ''),
(19, 'kumar', '$2y$10$Tin11OP.P3wrF1ZUSu/AZuT2cSnxp7DfOfdpz9s9bOhHD66d4pPxC', 'kumar@gmail.com', 0, '', ''),
(20, 'kumar1', '$2y$10$FltmC5zKEd05y18za86vreELGYBRiLvXdYlh5eH5Ulpilgqcs4kgG', 'kumar1@gmail.com', 0, '', ''),
(21, 'kumar2', '$2y$10$sGVd4bXe.IXhhx92EyoWW.XMlm0Ozi2k0Gws9vSt7Fw6JhROB3yOK', 'kumar2@gmail.com', 0, '', ''),
(22, 'kumar3', '$2y$10$ahbCqTBS5dPydewwc6l3s.li77WmChSlGsQ/fv28UGy8XqBG7Cylu', 'kumar3@gmail.com', 0, '', ''),
(23, 'kumar4', '$2y$10$VEsRdk4EUkxtxxLPcFCqnOBkWXTrIt6C7ojj6XM19o5KeCH1pE9wa', 'kumar4@gmail.com', 0, '', ''),
(24, 'kumar5', '$2y$10$4v0UMsgqvAZD6VWxTY6vhOMguO44lfrG8zCUcvZ5CcBk0WIr69us.', 'kumar5@gmail.com', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `token` (`token`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_tokens`
--
ALTER TABLE `password_tokens`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `post_id` (`post_id`);

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
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `password_tokens`
--
ALTER TABLE `password_tokens`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `login_tokens`
--
ALTER TABLE `login_tokens`
ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
ADD CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
