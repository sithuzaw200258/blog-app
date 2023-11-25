-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 04:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `photo` text NOT NULL,
  `link` text NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `owner_name`, `photo`, `link`, `start_date`, `end_date`, `created_at`) VALUES
(1, 'Mg Mg', 'https://channelmyanmar.org/wp-content/uploads/2023/11/jdbYG.gif', 'https://www.jdbyg.com/app?2=&AD=channelM#/register', '2023-11-21', '2024-11-22', '2023-11-22 09:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `user_id`, `ordering`, `created_at`) VALUES
(1, 'Category1', 1, 0, '2023-11-22 08:51:16'),
(2, 'Category2', 1, 0, '2023-11-22 08:52:31'),
(3, 'Category3', 1, 0, '2023-11-22 08:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_publish` enum('0','1') NOT NULL DEFAULT '0',
  `ordering` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `user_id`, `category_id`, `is_publish`, `ordering`, `created_at`) VALUES
(1, 'Post One', '&lt;p&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 1, '0', NULL, '2023-11-22 08:53:40'),
(2, 'Post Two', '&lt;p&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 2, '0', NULL, '2023-11-22 08:54:49'),
(3, 'Post Three', 'The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript. The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript. Updated', 1, 3, '0', NULL, '2023-11-22 09:15:39'),
(4, 'Post 4', '&lt;p&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 1, '0', NULL, '2023-11-23 16:36:28'),
(5, 'Post 5', '&lt;p&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 1, '0', NULL, '2023-11-23 16:40:22'),
(6, 'What is HTMl?', '&lt;p&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It defines the meaning and structure of web content. It is often assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 2, 2, '0', NULL, '2023-11-23 16:44:14'),
(7, 'What is CSS?', '&lt;p&gt;&lt;span style=&quot;background-color: rgba(80, 151, 255, 0.18); color: rgb(4, 12, 40); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;Cascading Style Sheets&lt;/span&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;&amp;nbsp;(CSS) is a style sheet language used for describing the presentation of a document written in a markup language such as HTML or XML (including XML dialects such as SVG, MathML or XHTML).&lt;/span&gt;&lt;span style=&quot;background-color: rgba(80, 151, 255, 0.18); color: rgb(4, 12, 40); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;Cascading Style Sheets&lt;/span&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;&amp;nbsp;(CSS) is a style sheet language used for describing the presentation of a document written in a markup language such as HTML or XML (including XML dialects such as SVG, MathML or XHTML).&lt;/span&gt;&lt;span style=&quot;background-color: rgba(80, 151, 255, 0.18); color: rgb(4, 12, 40); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;Cascading Style Sheets&lt;/span&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;&amp;nbsp;(CSS) is a style sheet language used for describing the presentation of a document written in a markup language such as HTML or XML (including XML dialects such as SVG, MathML or XHTML).&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 2, 3, '0', NULL, '2023-11-23 17:05:19'),
(8, 'What is JavaScrit?', '&lt;p&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;JavaScript (JS) is&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;background-color: rgba(80, 151, 255, 0.18); color: rgb(4, 12, 40); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;a lightweight interpreted (or just-in-time compiled) programming language with first-class functions&lt;/span&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;. While it is most well-known as the scripting language for Web pages, many non-browser environments also use it, such as Node.js, Apache CouchDB and Adobe Acrobat.&lt;/span&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;JavaScript (JS) is&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;background-color: rgba(80, 151, 255, 0.18); color: rgb(4, 12, 40); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;a lightweight interpreted (or just-in-time compiled) programming language with first-class functions&lt;/span&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;. While it is most well-known as the scripting language for Web pages, many non-browser environments also use it, such as Node.js, Apache CouchDB and Adobe Acrobat.&lt;/span&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;JavaScript (JS) is&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;background-color: rgba(80, 151, 255, 0.18); color: rgb(4, 12, 40); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;a lightweight interpreted (or just-in-time compiled) programming language with first-class functions&lt;/span&gt;&lt;span style=&quot;color: rgb(32, 33, 36); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;. While it is most well-known as the scripting language for Web pages, many non-browser environments also use it, such as Node.js, Apache CouchDB and Adobe Acrobat.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 3, 2, '0', NULL, '2023-11-23 17:19:51'),
(11, 'What is PHP?', '&lt;p&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by the PHP Group.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by the PHP Group.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995. The PHP reference implementation is now produced by the PHP Group.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 5, 3, '0', NULL, '2023-11-24 15:07:39'),
(12, 'What is Laravel?', '&lt;p&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;Laravel is a free and open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model&ndash;view&ndash;controller architectural pattern and based on Symfony&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;Laravel is a free and open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model&ndash;view&ndash;controller architectural pattern and based on Symfony&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;Laravel is a free and open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model&ndash;view&ndash;controller architectural pattern and based on Symfony&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 5, 2, '0', NULL, '2023-11-24 15:09:30'),
(13, 'What is Vue.js?', '&lt;p&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;Vue.js is an open-source model&ndash;view&ndash;viewmodel front end JavaScript library for building user interfaces and single-page applications. It was created by Evan You, and is maintained by him and the rest of the active core team members.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;Vue.js is an open-source model&ndash;view&ndash;viewmodel front end JavaScript library for building user interfaces and single-page applications. It was created by Evan You, and is maintained by him and the rest of the active core team members.&lt;/span&gt;&lt;span style=&quot;color: rgb(60, 64, 67); font-family: &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Noto Sans Myanmar UI&amp;quot;, sans-serif; font-size: 14px;&quot;&gt;Vue.js is an open-source model&ndash;view&ndash;viewmodel front end JavaScript library for building user interfaces and single-page applications. It was created by Evan You, and is maintained by him and the rest of the active core team members.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 3, 1, '0', NULL, '2023-11-24 15:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `amount` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender`, `receiver`, `amount`, `description`, `created_at`) VALUES
(1, 1, 2, 10000, 'Hi Gift', '2023-11-24 15:46:02'),
(2, 2, 1, 15000, 'Hi Gift for you', '2023-11-24 15:47:40'),
(3, 1, 3, 4000, 'Hi For New Year Gift', '2023-11-25 05:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('0','1','2') NOT NULL DEFAULT '2',
  `photo` varchar(255) NOT NULL DEFAULT 'default.png',
  `money` bigint(50) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `photo`, `money`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$2Y8HomwizLW56ii.DnoekeA2coo8R.eZvU60fdOU/2AxU9RBvxawu', '0', 'default.png', 30000, '2021-10-14 14:12:09'),
(2, 'Bo Si', 'bosi@gmail.com', '$2y$10$.FVB469c31HDhx.WNlwuZu7/CA0unorkKflGRbRd3BVV8gKUKLb7C', '1', 'default.png', 10000, '2023-11-22 08:33:55'),
(3, 'Mg Mg', 'mgmg@gmail.com', '$2y$10$1SgHF.PLc5wkyjk/oJ138ekUomfkGqF/ERRL3.CdO5I1tc9DWN10q', '2', 'default.png', 4000, '2023-11-23 17:13:18'),
(5, 'Ma Ma', 'mama@gmail.com', '$2y$10$bD2GzfDKLulzZUgRZCoyr.CDdCKuVCVds3wTXdt/4jZ6v6VfOXe/a', '2', 'default.png', 0, '2023-11-24 15:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `viewers`
--

CREATE TABLE `viewers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `device` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewers`
--

INSERT INTO `viewers` (`id`, `user_id`, `post_id`, `device`, `created_at`) VALUES
(1, 2, 3, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-23 16:17:51'),
(2, 2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-23 16:18:01'),
(3, 2, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-23 16:18:05'),
(4, 1, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-23 16:39:45'),
(5, 1, 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-23 16:40:27'),
(6, 0, 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 11:30:21'),
(7, 0, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 11:31:05'),
(8, 0, 10, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 13:34:06'),
(9, 0, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 13:34:36'),
(10, 3, 12, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 15:11:24'),
(11, 3, 11, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 15:11:36'),
(12, 1, 11, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 15:53:14'),
(13, 1, 11, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 15:53:45'),
(14, 1, 13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 15:53:52'),
(15, 1, 7, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '2023-11-24 15:53:58'),
(16, 1, 12, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:33:45'),
(17, 1, 40, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:33:51'),
(18, 1, 40, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:44:28'),
(19, 1, 13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:44:32'),
(20, 1, 40, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:44:39'),
(21, 1, 13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:44:43'),
(22, 1, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:44:48'),
(23, 1, 13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:44:52'),
(24, 1, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:44:57'),
(25, 1, 13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:45:09'),
(26, 1, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:45:13'),
(27, 1, 13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:45:47'),
(28, 1, 40, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:45:53'),
(29, 1, 13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:45:56'),
(30, 1, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:46:00'),
(31, 1, 13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:46:44'),
(32, 1, 13, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:47:14'),
(33, 1, 11, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-25 04:48:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewers`
--
ALTER TABLE `viewers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `viewers`
--
ALTER TABLE `viewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
