-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 02:35 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `os`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(2666) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `screening_id` int(11) NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `ticket_no` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `payment_type` enum('credit/Debit card','Mobile Payment','','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1','','') NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'Guest'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `token`, `user_id`, `transaction_id`, `movie_id`, `theater_id`, `screening_id`, `ticket`, `ticket_no`, `price`, `payment_type`, `created_at`, `updated_at`, `status`, `email`, `mobile`, `user_type`) VALUES
(9, 'fmwoI', NULL, 'ch_1As8NGKcCs3qfMMuGQkN6Op5', 4, 24, 13, '1', 'B7', '120', 'credit/Debit card', '2017-08-17 23:10:45', '2017-08-17 23:10:45', '1', 'mahbub.shuvo10@gmail.com', '876', 'Register'),
(10, 'D6Xbv', NULL, 'ch_1AsG5sKcCs3qfMMuWPKBzpYN', 4, 24, 13, '1', 'A1', '120', 'credit/Debit card', '2017-08-18 07:25:18', '2017-08-18 07:25:18', '1', 'mahbub.shuvo10@gmail.com', '01759034666', 'Register'),
(13, 'PPQGT', NULL, 'ch_1AuVBeKcCs3qfMMuRtLHwY8k', 10, 34, 64, '2', 'A5,C6', '240', 'credit/Debit card', '2017-08-24 23:56:34', '2017-08-24 23:56:34', '1', 'mahbub.rahman180@gmail.com', '01759034666', 'Register'),
(14, '98Eaz', NULL, 'ch_1AuVQNKcCs3qfMMuY7IaaLYE', 10, 34, 64, '1', 'B8', '120', 'credit/Debit card', '2017-08-25 00:11:47', '2017-08-25 00:11:47', '1', 'mahbub.rahman180@gmail.com', '01759034666', 'Register');

-- --------------------------------------------------------

--
-- Table structure for table `cinemahall`
--

CREATE TABLE `cinemahall` (
  `id` int(10) UNSIGNED NOT NULL,
  `hname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(2555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cinemahall`
--

INSERT INTO `cinemahall` (`id`, `hname`, `location`, `city`, `phone`, `latitude`, `longitude`, `about`, `created_at`, `updated_at`) VALUES
(2, 'Nandita Cinema Hall', 'Taltola Rd, Sylhet, Bangladesh', 'Sylhet', '01757343437', '24.89078688', '91.86401188', 'Good', '2017-08-04 06:03:28', '2017-08-12 02:02:48'),
(3, 'BGB Auditorium', 'Sylhet - Sunamganj Hwy, Sylhet, Bangladesh', 'Sylhet', '324325342543643', '24.9099725', '91.8408322', 'BGB Auditorium Akhalia Sylhet is on Facebook. To connect with BGB Auditorium Akhalia Sylhet, j', '2017-08-04 06:24:46', '2017-08-04 06:24:46'),
(4, 'Chondrima Cinema Hall', 'Sreepur, Savar, Nabinagar - Chandra Road, Baipayl ', 'Sylhet', '35345435634', '', '', 'Chondrima Cinema Hall is working in Movie theaters activities.', '2017-08-04 06:27:58', '2017-08-19 08:37:23'),
(5, 'Chitrali Cinema Hall', 'BIDC Rd, Khulna, Bangladesh', 'Khulna', '+880 1711-117723', '', '', 'It''s a popular Cinema Hall in khalispur and a old one too.', '2017-08-04 06:29:09', '2017-08-04 06:29:09'),
(6, 'Zia Hall', 'Townhouse complex in Khulna, Bangladesh', 'Khulna', '+880 1911-145400', '', '', 'A well known auditorium hall in Khulna city.', '2017-08-04 06:30:00', '2017-08-04 06:30:00'),
(7, 'Theatre Institute Chattagram', ' 110 J C Guha Rd, Chittagong 4000, Bangladesh', 'Chittagong', '+880 1848-372528', '', '', 'Theater Institute Chattagram, is a cultural convention centre located at K. C. Dey Road, in Chittagong, Bangladesh.', '2017-08-04 06:31:02', '2017-08-04 06:31:02'),
(8, 'Baitul Izzat Cinema Hall', 'Chittagong - Bandarban Hwy, Bangladesh', 'Chittagong', '534534534534', '', '', 'Chittagong - Bandarban Hwy, Bangladeshi', '2017-08-04 06:31:47', '2017-08-04 06:31:47'),
(9, 'Upohar Cinema Hall', 'Rajshahi, Bangladesh', 'Rajshahi', '4234', '24.3731233', '88.6008329', 'csccsc', '2017-08-18 23:07:32', '2017-08-18 23:07:32'),
(10, 'Barnali Cinema Hall', 'Jiaganj, Azimganj, Baharampur', 'Rajshahi', '57', '23.0283647', '89.4013048', 'csc', '2017-08-18 23:11:40', '2017-08-18 23:11:40'),
(11, 'Bani Cinema Hall', 'R 604, Pabna, Bangladesh', 'Rajshahi', '56', '24.0052383', '89.2345244', 'csc', '2017-08-18 23:13:12', '2017-08-18 23:13:12'),
(12, 'Madhumita Cinema Hall', '158/160, Dhaka 1000, Bangladesh', 'Dhaka', ' +880 2-9554386', '23.7228571', '90.4217728', 'Oldest cinema hall of bangladesh. Still it is good enough.', '2017-08-19 06:55:52', '2017-08-19 06:55:52'),
(13, 'star cineplex', 'Level 8, Bashundhara City 13/3 Ka, Panthapath, Tejgaon, Dhaka 1205', 'Dhaka', '01755665544', '23.7515367', '90.3903539', 'STAR CINEPLEX : Show Motion Limited, incorporated in 19th December 2002, pioneered the modern Multiplex Movie Theater industry with STAR Cineplex brand in Bangladesh.\r\n\r\nThe First Multiplex Cinema Theatre in Bangladesh STAR CINEPLEX : Show Motion Limited, incorporated in 19th December 2002, pioneered the modern Multiplex Movie Theater industry with STAR Cineplex brand in Bangladesh.', '2017-08-19 07:01:02', '2017-08-19 07:01:02'),
(14, 'Blockbuster Cinemas', 'Jamuna Future Park, Ka-244, Pragati Ave, Dhaka 1229, Bangladesh', 'Dhaka', '+880 1913-399015', '23.8140528', '90.4235121', 'Blockbuster Cinemas want to redefine the movie viewing experience to the movie fraternity of Bangladesh and want your input to give you the Best Movie Experience in Bangladesh. Call us or send us an Email, and tell us what you think about Blockbuster and don''t forget to visit our Facebook page and follow us on Twitter to stay updated about our new Releases and Exciting Contests.', '2017-08-19 07:06:28', '2017-08-19 07:06:28'),
(15, 'Almas Cinema Hall', 'chatteswari Road 1216 Chittagong', 'Chittagong', '01681-828202', '22.3497605', '91.8257765', 'The Most Famous Theatre (Cinema) in chittagong. Once it was only the show place in the city (during Pakistan period. )Established in 1967.', '2017-08-19 08:41:11', '2017-08-19 08:41:11'),
(16, 'Socity Cinema Hall', 'K.D. Ghos Rd, Khulna 9100, Bangladesh', 'Khulna', 'Not Available', '22.81707', '89.565694', 'The first community cenrte established in 1896and then the Natto Niketan', '2017-08-19 08:44:20', '2017-08-19 08:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(2550) NOT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 'cscsc', 'mahbub.rahman180@gmail.com', 'cscsc', '1', '2017-08-18 06:48:09', '2017-08-18 06:48:09'),
(3, 'cscc', 'mahbub.rahman183@gmail.com', 'cscsc', '1', '2017-08-18 06:53:01', '2017-08-18 06:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_08_03_160140_create_movies_table', 1),
(2, '2017_08_03_171257_create_mov_table', 2),
(3, '2017_08_03_161206_create_cinemaHall_table', 3),
(4, '2014_10_12_100000_create_password_resets_table', 4),
(5, '2016_09_12_99999_create_visitlogs_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relaseDate` date NOT NULL,
  `imdbRating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster` blob,
  `cast` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicDirector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutMovie` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `language`, `country`, `genres`, `relaseDate`, `imdbRating`, `poster`, `cast`, `director`, `musicDirector`, `trailer`, `aboutMovie`, `created_at`, `updated_at`) VALUES
(4, 'Nabab', 'Bengali', 'Indo-Bangladesh', 'Crime Action Thriller ', '2017-06-26', '8.4', 0x55706c6f61645c4e616261622e6a7067, 'Shakib Khan, Subhasree Ganguly, Amit Hasan', 'Joydip Mukherjee', 'Savvy Gupta, Akassh', 'https://www.youtube.com/v/W9BUCL4g1e0', 'An intelligence agent from Bangladesh tasked with a secret operation in West Bengal, India.\r\n', '2017-08-04 04:46:29', '2017-08-04 04:46:29'),
(6, 'Voyangkor Sundor', 'Bengali', 'Indo-Bangladesh', 'Drama', '2017-08-04', '5', 0x55706c6f61645c6d617872657364656661756c742e6a7067, ' Ashna Habib Bhabna, Parambrata Chatterjee, Faruk Ahmed', 'Animesh Aich', 'Emon Shaha', 'https://www.youtube.com/v/R4fTrlaO_bM', 'cscsc', '2017-08-18 23:32:27', '2017-08-18 23:32:37'),
(7, 'Dunkirk', 'English', 'American', 'Action, Drama, History ', '2017-08-06', '8.4', 0x55706c6f61645c6d617872657364656661756c742d322e6a7067, 'Fionn Whitehead, Damien Bonnard, Aneurin Barnard ', 'Christopher Nolan', 'Hans Zimmer', 'https://www.youtube.com/v/F-eMt3SrfFU', 'Allied soldiers from Belgium, the British Empire and France are surrounded by the German army and evacuated during a fierce battle in World War II.', '2017-08-18 23:37:50', '2017-08-18 23:38:07'),
(8, 'Spider-Man: Homecoming', 'English', 'American', 'Action, Adventure, Sci-Fi', '2017-07-30', '7.4', 0x55706c6f61645c646f776e6c6f61642e6a7067, 'Tom Holland, Robert Downey Jr., Marisa Tomei', 'Jon Watts', 'Michael Giacchino', 'https://www.youtube.com/v/xrzXIaTt99U', 'Peter Parker, with the help of his mentor Tony Stark, tries to balance his life as an ordinary high school student in New York City while fighting crime as his superhero alter ego Spider-Man when a new threat emerges.', '2017-08-18 23:44:32', '2017-08-18 23:44:32'),
(9, 'Rajneeti', 'Bengali', 'Bangladesh', 'Drama', '2017-08-02', '6', 0x55706c6f61645c646f776e6c6f6164202831292e6a7067, 'Apu Biswas, Anisur Rahman Milon', 'Bulbul Biswas', 'Subro dev', 'https://www.youtube.com/v/0j63zqxnboM', 'Rajneeti is Bangla Movie, The Movie Produced By Arrow Motion. Banglai Super Hero Shakib Khan Leading This Movie. Production of Arrow Motion Arts &amp; made by Ashfaque Ahmed. Story, playscript and Directed by bulbul Biswas. leading Shakib Khan, Apu Biswas , Anisur Rahman Milon etc. The music of the film has been directed by Fuad Al Muqtadir, Habib Wahid, Pritom Hasan and Shaan Shaikh.', '2017-08-14 23:55:36', '2017-08-18 23:55:36'),
(10, 'Premi O Premi ', 'Bengali', 'Bangladesh', 'Comedy, Romance', '2017-08-15', '7.1', 0x55706c6f61645c4d563542596a59784e575135596a67744e6a4d304d6930304d574e6b4c574a6b5a6a49744d544a6a4f44686d4d3255344e7a4979586b4579586b467163476465515856794e4449334e6a63784d4441402e5f56315f2e6a7067, 'Arifin Shuvo, Nusraat Faria Mazhar, Prabir Mitra', 'Jakir Hossain Raju', 'Emon Shaha', 'https://www.youtube.com/v/1dB-PuCKp94', 'The film is inspired from Hollywood movie Leap Year. It has a unique story for Bangladeshi film industry. It is also the biggest worldwide release for a Bangladeshi movie.', '2017-08-24 23:41:36', '2017-08-24 23:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mahbub.shuvo10@gmail.com', 'c4e1cc11fa531176f0b7ff40d2a268cc08976c1f15bde3697a940494f30899a2', '2017-08-10 21:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `cinemahall_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`id`, `movie_id`, `movie_name`, `cinemahall_id`, `theater_id`, `date`, `time`, `created_at`, `updated_at`) VALUES
(16, 8, 'Spider-Man: Homecoming', 14, 30, '2017-08-25', '6.30 PM', '2017-08-19 07:31:58', '2017-08-24 23:26:41'),
(17, 6, 'Voyangkor Sundor', 14, 30, '2017-08-26', '12:30 PM', '2017-08-19 07:32:13', '2017-08-24 23:26:49'),
(18, 10, 'Premi O Premi', 14, 30, '2017-08-26', '3:00 PM', '2017-08-19 07:33:03', '2017-08-24 23:27:03'),
(19, 4, 'Nabab', 3, 32, '2017-08-25', '6.30 PM', '2017-08-19 07:36:14', '2017-08-24 23:25:13'),
(20, 4, 'Nabab', 3, 32, '2017-08-26', '11.30 AM', '2017-08-19 07:36:41', '2017-08-24 23:25:24'),
(21, 3, 'Nabab', 3, 32, '2017-08-26', '3:00 PM', '2017-08-19 07:37:16', '2017-08-24 23:25:30'),
(22, 4, 'Nabab', 3, 32, '2017-08-26', '6.30 PM', '2017-08-19 07:37:37', '2017-08-24 23:25:37'),
(23, 4, 'Nabab', 3, 32, '2017-08-27', '11.30 AM', '2017-08-19 07:37:52', '2017-08-24 23:25:45'),
(24, 4, 'Nabab', 3, 32, '2017-08-27', '3:00 PM', '2017-08-19 07:38:09', '2017-08-24 23:25:50'),
(25, 4, 'Nabab', 3, 32, '2017-08-28', '10.00 AM', '2017-08-19 07:38:19', '2017-08-24 23:26:02'),
(26, 4, 'Nabab', 3, 32, '2017-08-28', '3:00 PM', '2017-08-19 07:38:38', '2017-08-24 23:26:08'),
(27, 6, 'Voyangkor Sundor', 2, 24, '2017-08-25', '6.00 PM', '2017-08-19 07:39:16', '2017-08-24 23:23:39'),
(28, 6, 'Voyangkor Sundor', 2, 24, '2017-08-26', '11.30 AM', '2017-08-19 07:39:34', '2017-08-24 23:24:11'),
(29, 6, 'Voyangkor Sundor', 2, 24, '2017-08-26', '3:00 PM', '2017-08-19 07:40:19', '2017-08-24 23:24:17'),
(30, 6, 'Voyangkor Sundor', 2, 24, '2017-08-26', '6.00 PM', '2017-08-19 07:40:42', '2017-08-24 23:24:29'),
(31, 6, 'Voyangkor Sundor', 2, 24, '2017-08-27', '11.30 AM', '2017-08-19 07:40:58', '2017-08-24 23:24:36'),
(32, 6, 'Voyangkor Sundor', 2, 24, '2017-08-27', '3:00 PM', '2017-08-19 07:41:29', '2017-08-24 23:24:42'),
(33, 6, 'Voyangkor Sundor', 2, 24, '2017-08-27', '11.30 AM', '2017-08-19 07:41:41', '2017-08-24 23:24:48'),
(34, 6, 'Voyangkor Sundor', 2, 24, '2017-08-27', '6.30 PM', '2017-08-19 07:41:54', '2017-08-24 23:24:53'),
(35, 7, 'Dunkirk', 13, 27, '2017-08-25', '6.30 PM', '2017-08-19 07:45:36', '2017-08-24 23:27:57'),
(36, 7, 'Dunkirk', 13, 27, '2017-08-26', '1.00 PM', '2017-08-19 07:45:50', '2017-08-24 23:28:04'),
(37, 7, 'Dunkirk', 13, 27, '2017-08-26', '6.30 PM', '2017-08-19 07:46:04', '2017-08-24 23:28:08'),
(38, 7, 'Dunkirk', 13, 27, '2017-08-27', '12:00 PM', '2017-08-19 07:46:17', '2017-08-24 23:28:13'),
(39, 7, 'Dunkirk', 13, 27, '2017-08-27', '3:00 PM', '2017-08-19 07:46:30', '2017-08-24 23:28:18'),
(40, 7, 'Dunkirk', 13, 27, '2017-08-28', '11.30 AM', '2017-08-19 07:46:45', '2017-08-24 23:28:21'),
(41, 6, 'Voyangkor Sundor', 13, 28, '2017-08-25', '6.30 PM', '2017-08-19 07:49:11', '2017-08-24 23:28:36'),
(42, 6, 'Voyangkor Sundor', 13, 28, '2017-08-26', '1.00 PM', '2017-08-19 07:49:52', '2017-08-24 23:28:40'),
(43, 6, 'Voyangkor Sundor', 13, 28, '2017-08-26', '6.30 PM', '2017-08-19 07:50:08', '2017-08-24 23:28:44'),
(44, 8, 'Voyangkor Sundor', 13, 28, '2017-08-27', '3:00 PM', '2017-08-19 07:50:26', '2017-08-24 23:28:48'),
(45, 8, 'Voyangkor Sundor', 13, 28, '2017-08-27', '6.30 PM', '2017-08-19 07:50:39', '2017-08-24 23:28:52'),
(46, 9, 'Rajneeti', 5, 33, '2017-08-25', '6.30 PM', '2017-08-19 07:53:02', '2017-08-24 23:30:32'),
(47, 9, 'Rajneeti', 5, 33, '2017-08-26', '11.30 AM', '2017-08-19 07:53:15', '2017-08-24 23:30:37'),
(48, 9, 'Rajneeti', 5, 33, '2017-08-26', '3:00 PM', '2017-08-19 07:53:24', '2017-08-24 23:30:44'),
(49, 9, 'Rajneeti', 5, 33, '2017-08-26', '6.30 PM', '2017-08-19 07:53:40', '2017-08-24 23:30:51'),
(50, 9, 'Rajneeti', 5, 33, '2017-08-27', '3:00 PM', '2017-08-19 07:53:58', '2017-08-24 23:30:55'),
(51, 9, 'Rajneeti', 5, 33, '2017-08-27', '6.30 PM', '2017-08-19 07:54:10', '2017-08-24 23:31:00'),
(52, 6, 'Voyangkor Sundor', 14, 31, '2017-08-25', '6.30 PM', '2017-08-19 07:58:06', '2017-08-24 23:27:23'),
(53, 6, 'Voyangkor Sundor', 14, 31, '2017-08-26', '11.30 AM', '2017-08-19 08:01:07', '2017-08-24 23:27:31'),
(54, 6, 'Voyangkor Sundor', 14, 31, '2017-08-26', '3:00 PM', '2017-08-19 08:01:19', '2017-08-24 23:27:36'),
(55, 9, 'Rajneeti', 8, 25, '2017-08-25', '6.30 PM', '2017-08-19 08:03:19', '2017-08-24 23:31:20'),
(56, 9, 'Rajneeti', 8, 25, '2017-08-26', '11.30 AM', '2017-08-19 08:03:32', '2017-08-24 23:31:24'),
(57, 9, 'Rajneeti', 8, 25, '2017-08-26', '3:00 PM', '2017-08-19 08:03:41', '2017-08-24 23:31:28'),
(58, 6, 'Rajneeti', 8, 25, '2017-08-26', '6.30 PM', '2017-08-19 08:03:53', '2017-08-24 23:31:32'),
(59, 6, 'Rajneeti', 8, 25, '2017-08-27', '11.30 AM', '2017-08-19 08:04:05', '2017-08-24 23:31:41'),
(60, 6, 'Rajneeti', 8, 25, '2017-08-27', '3:00 PM', '2017-08-19 08:04:22', '2017-08-24 23:31:49'),
(61, 6, 'Voyangkor Sundor', 8, 25, '2017-08-28', '6.30 PM', '2017-08-19 08:04:36', '2017-08-24 23:32:20'),
(62, 6, 'Voyangkor Sundor', 8, 25, '2017-08-29', '11.30 AM', '2017-08-19 08:04:48', '2017-08-24 23:32:18'),
(63, 6, 'Voyangkor Sundor', 8, 25, '2017-08-29', '3:00 PM', '2017-08-19 08:04:59', '2017-08-24 23:32:31'),
(64, 10, 'Premi O Premi ', 9, 34, '2017-08-25', '6.30 PM', '2017-08-24 23:51:03', '2017-08-24 23:51:03'),
(65, 10, 'Premi O Premi ', 9, 34, '2017-08-26', '11.30 AM', '2017-08-24 23:51:16', '2017-08-24 23:51:16'),
(66, 10, 'Premi O Premi ', 9, 34, '2017-08-26', '3:00 PM', '2017-08-24 23:51:27', '2017-08-24 23:51:27'),
(67, 10, 'Premi O Premi ', 9, 34, '2017-08-26', '6.00 PM', '2017-08-24 23:51:41', '2017-08-24 23:51:41'),
(68, 10, 'Premi O Premi ', 9, 34, '2017-08-27', '3:00 PM', '2017-08-24 23:51:58', '2017-08-24 23:51:58'),
(69, 10, 'Premi O Premi ', 9, 34, '2017-08-27', '6.30 PM', '2017-08-24 23:52:11', '2017-08-24 23:52:11'),
(70, 10, 'Premi O Premi ', 12, 35, '2017-08-25', '6.00 PM', '2017-08-24 23:53:59', '2017-08-24 23:53:59'),
(71, 10, 'Premi O Premi ', 12, 35, '2017-08-26', '11.30 AM', '2017-08-24 23:54:09', '2017-08-24 23:54:09'),
(72, 10, 'Premi O Premi ', 12, 35, '2017-08-26', '3:00 PM', '2017-08-24 23:54:20', '2017-08-24 23:54:20'),
(73, 10, 'Premi O Premi ', 12, 35, '2017-08-26', '6.00 PM', '2017-08-24 23:54:35', '2017-08-24 23:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `id` int(11) NOT NULL,
  `row` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `status` enum('0','1','','') DEFAULT '0',
  `theater_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `seatdistributon_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`id`, `row`, `number`, `status`, `theater_id`, `type`, `seatdistributon_id`, `created_at`, `updated_at`) VALUES
(1, 'A', 11, '0', 24, 'AC', 1, '2017-08-13 15:24:51', '2017-08-18 01:57:39'),
(2, 'B', 8, '0', 24, 'AC', 1, '2017-08-13 15:26:03', '2017-08-13 15:26:03'),
(3, 'C', 10, '0', 24, 'AC', 1, '2017-08-13 15:26:03', '2017-08-13 15:26:03'),
(4, 'E', 9, '0', 24, 'DC', 2, '2017-08-13 15:26:48', '2017-08-13 09:33:54'),
(5, 'F', 5, '0', 24, 'DC', 2, '2017-08-13 15:26:48', '2017-08-13 09:33:41'),
(6, 'A', 10, '0', 30, 'E-FRONT', 3, '2017-08-19 07:30:18', '2017-08-19 07:30:18'),
(7, 'B', 7, '0', 30, 'E-FRONT', 3, '2017-08-19 07:30:29', '2017-08-19 07:30:29'),
(8, 'C', 12, '0', 30, 'E-FRONT', 3, '2017-08-19 07:30:37', '2017-08-19 07:30:37'),
(9, 'D', 10, '0', 30, 'E-REAR', 4, '2017-08-19 07:31:02', '2017-08-19 07:31:02'),
(10, 'E', 9, '0', 30, 'E-REAR', 4, '2017-08-19 07:31:12', '2017-08-19 07:31:12'),
(11, 'F', 12, '0', 30, 'E-REAR', 4, '2017-08-19 07:31:22', '2017-08-19 07:31:22'),
(12, 'A', 10, '0', 32, 'First Class', 5, '2017-08-19 07:35:13', '2017-08-19 07:35:13'),
(13, 'B', 12, '0', 32, 'First Class', 5, '2017-08-19 07:35:19', '2017-08-19 07:35:19'),
(14, 'C', 14, '0', 32, 'First Class', 5, '2017-08-19 07:35:26', '2017-08-19 07:35:26'),
(15, 'D', 10, '0', 32, 'Second Class', 6, '2017-08-19 07:35:38', '2017-08-19 07:35:38'),
(16, 'E', 9, '0', 32, 'Second Class', 6, '2017-08-19 07:35:48', '2017-08-19 07:35:48'),
(17, 'A', 13, '0', 27, 'First Class', 7, '2017-08-19 07:44:21', '2017-08-19 07:44:21'),
(18, 'B', 10, '0', 27, 'First Class', 7, '2017-08-19 07:44:27', '2017-08-19 07:44:27'),
(19, 'C', 11, '0', 27, 'First Class', 7, '2017-08-19 07:44:34', '2017-08-19 07:44:34'),
(20, 'D', 10, '0', 27, 'Second Class', 8, '2017-08-19 07:44:46', '2017-08-19 07:44:46'),
(21, 'E', 11, '0', 27, 'Second Class', 8, '2017-08-19 07:44:54', '2017-08-19 07:45:10'),
(22, 'F', 8, '0', 27, 'Second Class', 8, '2017-08-19 07:45:04', '2017-08-19 07:45:04'),
(23, 'A', 10, '0', 28, 'Premium', 9, '2017-08-19 07:48:16', '2017-08-19 07:48:16'),
(24, 'B', 12, '0', 28, 'Premium', 9, '2017-08-19 07:48:22', '2017-08-19 07:48:22'),
(25, 'C', 10, '0', 28, 'Premium', 9, '2017-08-19 07:48:28', '2017-08-19 07:48:28'),
(26, 'D', 12, '0', 28, 'Regular', 10, '2017-08-19 07:48:38', '2017-08-19 07:48:38'),
(27, 'E', 8, '0', 28, 'Regular', 10, '2017-08-19 07:48:44', '2017-08-19 07:48:44'),
(28, 'F', 10, '0', 28, 'Regular', 10, '2017-08-19 07:48:49', '2017-08-19 07:48:49'),
(29, 'A', 10, '0', 33, 'First Class', 13, '2017-08-19 07:51:57', '2017-08-19 07:51:57'),
(30, 'B', 8, '0', 33, 'First Class', 13, '2017-08-19 07:52:03', '2017-08-19 07:52:03'),
(31, 'C', 6, '0', 33, 'First Class', 13, '2017-08-19 07:52:09', '2017-08-19 07:52:09'),
(32, 'D', 10, '0', 33, 'Second Class', 14, '2017-08-19 07:52:24', '2017-08-19 07:52:24'),
(33, 'E', 9, '0', 33, 'Second Class', 14, '2017-08-19 07:52:32', '2017-08-19 07:52:32'),
(34, 'F', 8, '0', 33, 'Second Class', 14, '2017-08-19 07:52:40', '2017-08-19 07:52:40'),
(35, 'A', 10, '0', 31, 'First Class', 15, '2017-08-19 07:57:13', '2017-08-19 07:57:13'),
(36, 'B', 12, '0', 31, 'First Class', 15, '2017-08-19 07:57:20', '2017-08-19 07:57:20'),
(37, 'C', 8, '0', 31, 'First Class', 15, '2017-08-19 07:57:25', '2017-08-19 07:57:25'),
(38, 'D', 12, '0', 31, 'Second Class', 16, '2017-08-19 07:57:38', '2017-08-19 07:57:38'),
(39, 'E', 10, '0', 31, 'Second Class', 16, '2017-08-19 07:57:46', '2017-08-19 07:57:46'),
(40, 'A', 10, '0', 25, 'AC', 17, '2017-08-19 08:02:09', '2017-08-19 08:02:09'),
(41, 'B', 10, '0', 25, 'AC', 17, '2017-08-19 08:02:14', '2017-08-19 08:02:14'),
(42, 'C', 8, '0', 25, 'AC', 17, '2017-08-19 08:02:21', '2017-08-19 08:02:21'),
(43, 'D', 7, '0', 25, 'DC', 18, '2017-08-19 08:02:32', '2017-08-19 08:02:53'),
(44, 'E', 8, '0', 25, 'DC', 18, '2017-08-19 08:02:39', '2017-08-19 08:02:57'),
(45, 'F', 8, '0', 25, 'DC', 18, '2017-08-19 08:02:45', '2017-08-19 08:02:45'),
(46, 'A', 10, '0', 34, 'First Class', 19, '2017-08-24 23:49:53', '2017-08-24 23:49:53'),
(47, 'B', 12, '0', 34, 'First Class', 19, '2017-08-24 23:50:02', '2017-08-24 23:50:02'),
(48, 'C', 7, '0', 34, 'First Class', 19, '2017-08-24 23:50:11', '2017-08-24 23:50:11'),
(49, 'D', 10, '0', 34, 'Second Class', 20, '2017-08-24 23:50:29', '2017-08-24 23:50:29'),
(50, 'E', 12, '0', 34, 'Second Class', 20, '2017-08-24 23:50:36', '2017-08-24 23:50:36'),
(51, 'F', 10, '0', 34, 'Second Class', 20, '2017-08-24 23:50:42', '2017-08-24 23:50:42'),
(52, 'A', 10, '0', 35, 'AC', 21, '2017-08-24 23:52:38', '2017-08-24 23:52:38'),
(53, 'B', 8, '0', 35, 'AC', 21, '2017-08-24 23:52:45', '2017-08-24 23:52:45'),
(54, 'C', 10, '0', 35, 'AC', 21, '2017-08-24 23:52:51', '2017-08-24 23:52:51'),
(55, 'D', 10, '0', 35, 'DC', 22, '2017-08-24 23:53:01', '2017-08-24 23:53:28'),
(56, 'E', 8, '0', 35, 'DC', 22, '2017-08-24 23:53:08', '2017-08-24 23:53:32'),
(57, 'F', 12, '0', 35, 'DC', 22, '2017-08-24 23:53:19', '2017-08-24 23:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `seatdistribution`
--

CREATE TABLE `seatdistribution` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seatdistribution`
--

INSERT INTO `seatdistribution` (`id`, `type`, `price`, `theater_id`, `created_at`, `updated_at`) VALUES
(1, 'AC', '160', 24, '2017-08-07 09:07:51', '2017-08-13 08:14:27'),
(2, 'DC', '120', 24, '2017-08-07 03:22:19', '2017-08-07 03:22:19'),
(3, 'E-FRONT', '300', 30, '2017-08-19 07:29:50', '2017-08-19 07:29:50'),
(4, 'E-REAR', '350', 30, '2017-08-19 07:30:04', '2017-08-19 07:30:04'),
(5, 'First Class', '120', 32, '2017-08-19 07:34:48', '2017-08-19 07:34:48'),
(6, 'Second Class', '100', 32, '2017-08-19 07:34:59', '2017-08-19 07:34:59'),
(7, 'First Class', '300', 27, '2017-08-19 07:42:33', '2017-08-19 07:42:33'),
(8, 'Second Class', '250', 27, '2017-08-19 07:43:12', '2017-08-19 07:43:12'),
(9, 'Premium', '350', 28, '2017-08-19 07:43:33', '2017-08-19 07:43:33'),
(10, 'Regular', '300', 28, '2017-08-19 07:43:46', '2017-08-19 07:43:46'),
(11, 'First Class', '400', 29, '2017-08-19 07:43:57', '2017-08-19 07:43:57'),
(12, 'Second Class', '350', 29, '2017-08-19 07:44:06', '2017-08-19 07:44:06'),
(13, 'First Class', '100', 33, '2017-08-19 07:51:41', '2017-08-19 07:51:41'),
(14, 'Second Class', '70', 33, '2017-08-19 07:51:48', '2017-08-19 07:51:48'),
(15, 'First Class', '350', 31, '2017-08-19 07:56:02', '2017-08-19 07:56:22'),
(16, 'Second Class', '300', 31, '2017-08-19 07:56:15', '2017-08-19 07:56:15'),
(17, 'AC', '120', 25, '2017-08-19 08:01:53', '2017-08-19 08:01:53'),
(18, 'DC', '100', 25, '2017-08-19 08:02:01', '2017-08-19 08:02:01'),
(19, 'First Class', '100', 34, '2017-08-24 23:49:26', '2017-08-24 23:49:26'),
(20, 'Second Class', '70', 34, '2017-08-24 23:49:34', '2017-08-24 23:49:42'),
(21, 'AC', '100', 35, '2017-08-24 23:52:22', '2017-08-24 23:52:22'),
(22, 'DC', '80', 35, '2017-08-24 23:52:29', '2017-08-24 23:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `active` enum('0','1','','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `image`, `active`) VALUES
(8, 0x736c6964655c32303730383039315f313635303631393732313633383236355f353131303933353331323831333733393736345f6e2e6a7067, '1'),
(10, 0x736c6964655c32303739393932385f313636333735333331363938313538315f323435353135373834343834363730363231395f6e2e6a7067, '0'),
(13, 0x736c6964655c32303939333933365f313637303733393831393631363236345f383137303330363837313939323437393131305f6e2e6a7067, '0');

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `total_seat` varchar(255) NOT NULL,
  `cinemahall_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`id`, `tname`, `total_seat`, `cinemahall_id`, `created_at`, `updated_at`) VALUES
(24, 'Auditorium', '100', 2, '2017-08-04 06:32:35', '2017-08-13 06:29:35'),
(25, 'Audi', '150', 8, '2017-08-04 06:48:48', '2017-08-04 06:48:48'),
(26, 'Audi', '100', 6, '2017-08-04 16:01:08', '2017-08-04 16:01:08'),
(27, 'Hall 1', '100', 13, '2017-08-19 07:15:36', '2017-08-19 07:15:36'),
(28, 'Hall 2', '150', 13, '2017-08-19 07:15:49', '2017-08-19 07:15:49'),
(30, 'Hall: Thrill', '50', 14, '2017-08-19 07:20:57', '2017-08-19 07:26:40'),
(31, 'Hall: Iris', '100', 14, '2017-08-19 07:21:06', '2017-08-19 07:26:52'),
(32, 'Hall', '100', 3, '2017-08-19 07:34:27', '2017-08-19 07:34:27'),
(33, 'Audi', '100', 5, '2017-08-19 07:51:27', '2017-08-19 07:51:27'),
(34, 'Audi', '100', 9, '2017-08-24 23:48:49', '2017-08-24 23:48:49'),
(35, 'auditorium', '100', 12, '2017-08-24 23:49:02', '2017-08-24 23:49:02'),
(36, 'Audi', '100', 6, '2017-08-24 23:49:10', '2017-08-24 23:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `theater_id` int(11) NOT NULL,
  `screening_id` int(11) NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `ticket_no` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upcomingmovies`
--

CREATE TABLE `upcomingmovies` (
  `movie_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `genres` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `relaseDate` date NOT NULL,
  `poster` blob,
  `cast` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicDirector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutMovie` varchar(2555) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upcomingmovies`
--

INSERT INTO `upcomingmovies` (`movie_name`, `language`, `country`, `genres`, `relaseDate`, `poster`, `cast`, `director`, `musicDirector`, `trailer`, `aboutMovie`, `created_at`, `updated_at`, `id`) VALUES
('Dhaka Attack', 'Bengli', 'Bangladesh', 'Thriller Drama', '2017-09-19', 0x55706c6f61645c696d616765732e6a7067, 'Arifin Shuvoo, Mahiya Mahi , ABM Sumon ', 'Dipankar Dipon', 'Adit, Arindam Chatterjee, DJ Rahat', 'https://www.youtube.com/v/YrH-GqUEJk', 'Dhaka Attack is a Bangladeshi thriller drama film produced by Three Wheelers Films and Splash Multimedia Limited.[2] It features Arifin Shuvoo, Mahiya Mahi and ABM Sumon in lead roles. It is directed by Dipankar Sengupta and written by Sunny Sanwar. The film will be distributed by Three Wheelers Films, Splash Multimedia and Q-Plex Communications.', '2017-08-19 08:09:16', '2017-08-19 08:09:16', 6),
('Doob: No Bed Of Roses', 'Bengli', 'Indo-Bangladesh', 'Drama', '2017-10-02', 0x55706c6f61645c446f6f62284e6f5f6261645f6f665f726f736573295f66696c6d5f706f737465722e6a7067, 'Irrfan Khan, Nusrat Imrose Tisha, Rokeya Prachy and Parno Mittra', 'Mostofa Sarwar Farooki', 'Mostofa Sarwar Farooki', 'Not Available', 'Doob: No Bed Of Roses is a 2017 India-Bangladesh co-production drama film written and directed by Mostofa Sarwar Farooki. It was produced by Himanshu Dhanuka, Abdul Aziz and Irrfan Khan under the banner of Eskay Movies and Jaaz Multimedia along with Irrfan Khan Films.[3] It stars Irrfan Khan, Nusrat Imrose Tisha, Rokeya Prachy and Parno Mittra. The story builds up around the members of two families discovering the finer fabric of love when the headman of a family dies. The theme of the film is that death doesn''t always take things away, sometimes it gives back', '2017-08-19 08:13:46', '2017-08-19 08:13:46', 7),
('Mental -It Can Be Your Love Story', 'Bengli', 'Bangladesh', 'Action, Drama', '2017-09-05', 0x55706c6f61645c6d656e74616c2d6a7567616e746f725f31363730395f313436363331323430332e6a7067, 'Shakib Khan, Nusrat Imroz Tisha', 'Shamim Ahmed Roni', 'Shamim Ahmed Roni', 'Not Available', 'Mental -It Can Be Your Love Story is an upcoming Bengali movie. The movie is directed by Shamim Ahmed Roni and will feature Shakib Khan, Nusrat Imroz Tisha and Sabrina Porshi as lead characters. Other popular actors who have been roped in for Mental -It Can Be Your Love Story are Achol, Misha Sawdagar, Amir Siraji, Shiba Sanu, Shimul Khan, Don and Parvez Chowdhury.', '2017-08-19 08:17:37', '2017-08-19 08:17:37', 8),
('Renegades', 'English', 'American', 'Action War', '2017-09-19', 0x55706c6f61645c52656e6567616465735f28323031375f66696c6d292e6a7067, 'Sullivan Stapleton, J. K. Simmons and Charlie Bewley', 'Steven Quale', 'Eric Serra', 'https://www.youtube.com/v/Bl8INGEnrbQ', 'Renegades is an upcoming action war film directed by Steven Quale and written by Luc Besson and Richard Wenk. The film stars Sullivan Stapleton, J. K. Simmons and Charlie Bewley. The film''s release date is to be determined by STX Entertainment.', '2017-08-19 08:21:36', '2017-08-19 08:21:36', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` enum('Email','Socialmedia','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Email',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `name`, `method`, `email`, `mobile`, `password`, `email_token`, `verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(36, 0, 'Mahbub', 'Socialmedia', 'mahbub.shuvo10@gmail.com', NULL, '$2y$10$U9Bn28lOYwJ57uK05E0HquVJ1MsWH4SjsGNOMB4FORH63X8HwomLi', NULL, 1, '84JszxMfnEC9rPSALb98HNNacHbLjBn6JkU40zg09FOoi93ckDAJ1EsNVZ7q', '2017-08-18 06:07:31', '2017-08-18 08:04:53'),
(37, 1, 'mahbub', 'Email', 'mahbub.rahman180@gmail.com', '01759034666', '$2y$10$HT7yT.owyhO6aJKkQo5YwOnzyUvCfSi2nQdtjolTIBD776swXR72W', NULL, 1, 'eFJVYg28NU0jLCpVHyodVKThRk2ho4hZONf12x6DI5VokmHcf24zwev82AAX', '2017-08-18 06:20:27', '2017-08-19 08:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `visitlogs`
--

CREATE TABLE `visitlogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `browser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_zone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitlogs`
--

INSERT INTO `visitlogs` (`id`, `ip`, `browser`, `os`, `user_id`, `user_name`, `country_code`, `country_name`, `region_name`, `city`, `zip_code`, `time_zone`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(3, '127.0.0.1', 'Chrome (61.0.3163.100)', 'Windows', '0', 'Guest', '', '', '', '', '', '', '0', '0', '2017-07-15 07:19:58', '2017-10-09 20:31:33'),
(4, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-29 16:24:28', NULL),
(5, '127.0.0.2', 'Chrome (59.0.3071.115) 	', 'Linux', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-29 17:35:00', NULL),
(6, '127.0.0.1', 'Chrome (60.0.3112.101)', 'Windows', '0', 'Guest', '', '', '', '', '', '', '0', '0', '2017-07-30 01:19:58', '2017-08-14 22:29:12'),
(7, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-31 10:24:28', NULL),
(8, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 10:24:28', NULL),
(9, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 10:24:28', NULL),
(10, '127.0.0.2', 'Chrome (59.0.3071.115) 	', 'Linux', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-02 11:35:00', NULL),
(11, '127.0.0.1', 'Chrome (60.0.3112.101)', 'Windows', '0', 'Guest', '', '', '', '', '', '', '0', '0', '2017-08-02 01:19:58', '2017-08-14 22:29:12'),
(12, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-03 10:24:28', NULL),
(13, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(14, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-04 10:24:28', NULL),
(15, '127.0.0.2', 'Chrome (59.0.3071.115) 	', 'Linux', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-04 11:35:00', NULL),
(16, '127.0.0.1', 'Chrome (60.0.3112.101)', 'Windows', '0', 'Guest', '', '', '', '', '', '', '0', '0', '2017-07-29 01:19:58', '2017-08-14 22:29:12'),
(17, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(28, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(29, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(30, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(31, '127.0.0.2', 'Chrome (59.0.3071.115) 	', 'Linux', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-04 11:35:00', NULL),
(32, '127.0.0.1', 'Chrome (60.0.3112.101)', 'Windows', '0', 'Guest', '', '', '', '', '', '', '0', '0', '2017-07-29 01:19:58', '2017-08-14 22:29:12'),
(33, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(34, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(35, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(36, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(37, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(38, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-28 10:24:28', NULL),
(39, '127.0.0.2', 'Chrome (59.0.3071.115) 	', 'Linux', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-04 11:35:00', NULL),
(40, '127.0.0.1', 'Chrome (59.0.3071.115) 	', 'MAC', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01 10:24:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `cinemahall`
--
ALTER TABLE `cinemahall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seatdistribution`
--
ALTER TABLE `seatdistribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcomingmovies`
--
ALTER TABLE `upcomingmovies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitlogs`
--
ALTER TABLE `visitlogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cinemahall`
--
ALTER TABLE `cinemahall`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `seatdistribution`
--
ALTER TABLE `seatdistribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `theater`
--
ALTER TABLE `theater`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upcomingmovies`
--
ALTER TABLE `upcomingmovies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `visitlogs`
--
ALTER TABLE `visitlogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
