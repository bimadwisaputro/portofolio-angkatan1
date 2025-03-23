-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 04:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portofolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `tags` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `subtitle`, `description`, `writer`, `foto`, `tags`, `status`, `created_id`, `created_date`) VALUES
(2, 'Why Lead Generation is Key for Business Growth', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">It is a long established fact a reader be distracted</h2>\r\n<p><strong>Cara membuat link pada gambar yang bisa di klik di posting blog</strong><br><br>Didalam membuat link atau tautan pada gambar yang bisa di klik di posting blog, dan hal-hal yang perlu di siapkan adalah sebagai berikut:</p>\r\n<ol>\r\n<li>Menyiapkan kode gambar yang akan diberi link yang bisa di klik</li>\r\n<li>Menyiapkan URL artikel yang akan ditautkan</li>\r\n<li>Membuat link pada gambar yang bisa di klik dengan kode HTML</li>\r\n</ol>\r\n<p>Selanjutnya mari kita bahas satu persatu tentang langkah-langkah membuat link yang bisa di klik pada media gambar.<br><br><strong># 1. Menyiapkan kode gambar yang akan diberi link yang bisa di klik</strong> <br><br>Untuk mendapatkan kode atau script gambar, pertama silahkan unggah gambar lewat komputer maupun Hp Anda ke posting artikel, kemudian simpan dulu di draf, nanti kode gambar akan muncul dikotak draf, kira-kira secara default kode atau alamat gambarnya akan terlihat seperti contoh dibawah:<br>&nbsp;<br>Kode yang berwarna hijau adalah script atau kode gambar, cirinya diawali dengan kode <span style=\"color: green;\">&lt;img </span> dan diakhiri dengan kode&nbsp; <br>.Ambil kode gambarnya kemudian simpan dulu kode gambar di posting draf menjadi seperti contoh dibawah ini:<br>&nbsp;<br><strong># 2. Selanjutnya menyiapkan URL artikel yang akan ditautkan</strong> <br><br>Untuk mendapatkan URL artikel yang akan dibuat tautan kita ambil saja dari URL artikel yang ada di blog. Caranya, buka atau klik judul artikel yang akan ditautkan di blog Anda, terserah mau pilih yang mana, kemudian ambil URL atau link artikel tersebut yang berada di halaman paling atas di blog Anda.<br><br><br>Selanjutnya ambil dan copy link URL artikelnya, kemudian paste-kan tepat diatas kode gambar yang tadi ada di posting draf yang akan dibuat link tautan pada gambar, kira-kira contoh URL artikel akan terlihat seperti ini:<br><br>http://carasakrayblog.blogspot.com/2017/05/bagaimana-cara-membuat-link-yang-bisa-diklik-di-posting-blog.html<br><strong># 3. Cara membuat link atau tautan pada gambar yang bisa di klik dengan kode HTML</strong><br><br>Selanjutnya untuk membuat link tautan pada gambar yang bisa di klik, tambahkan sedikit kode HTML pada gambar dan URL artikel yang tadi disimpan di posting draf, lihat contoh penerapan kodenya di bawah ini:<br><br><span style=\"color: #ff0000;\">&nbsp;</span><br>Ada 3 kode HTML yang berwarna merah yang letaknya terpisah, kode itulah yang perlu ditambahkan ke URL Artikel dan script gambar yang akan di buat link tautan yang bisa di klik. <br>Dan tulisan berwarna hijau adalah tempat kode gambar yang letaknya disitu agar bisa di klik dan mengarah ke halaman artikel yang tadi Anda ambil link-nya.<br><br>Jika link tautan gambar dibuat dengan benar di posting artikel, maka hasilnya akan mengarah ke halaman lain sesuai dengan yang Anda mau.<br><br><br>Nah, panduan cara membuat link pada gambar yang bisa di klik diatas caranya sangat gampang, Anda tinggal praktik sekarang juga biar cepat bisa membuat link pada gambar yang bisa di klik.<br><br>Baca juga: <a href=\"http://carasakrayblog.blogspot.com/2017/05/bagaimana-cara-membuat-link-yang-bisa-diklik-di-posting-blog.html\"> Cara membuat link pada teks atau tulisan yang bisa di klik</a><br><br>Sampai disini cara membuat link tautan pada gambar yang bisa di klik telah selesai. Selanjutnya gunakan cara di atas untuk membuat link tautan antar halaman di blog, baik melalui link tautan pada teks maupun tautan gambar. <br><br>Cara membuat link tautan antar halaman diatas bisa juga diterapkan untuk membuat link tautan yang bisa di klik di halaman blog lainnya, seperti di navigasi, footter dan sidebar.</p>\r\n<p>&nbsp;</p>', 'Bima', '../uploads/blogs-foto/806711520_1.jpg', 'Tech,Information,Web,Design', 1, 1, '2025-03-23 12:48:16'),
(3, 'Why Lead Generation is Key for Business Growth', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">It is a long established fact a reader be distracted</h2>\r\n<p><strong>Cara membuat link pada gambar yang bisa di klik di posting blog</strong><br><br>Didalam membuat link atau tautan pada gambar yang bisa di klik di posting blog, dan hal-hal yang perlu di siapkan adalah sebagai berikut:</p>\r\n<ol>\r\n<li>Menyiapkan kode gambar yang akan diberi link yang bisa di klik</li>\r\n<li>Menyiapkan URL artikel yang akan ditautkan</li>\r\n<li>Membuat link pada gambar yang bisa di klik dengan kode HTML</li>\r\n</ol>\r\n<p>Selanjutnya mari kita bahas satu persatu tentang langkah-langkah membuat link yang bisa di klik pada media gambar.<br><br><strong># 1. Menyiapkan kode gambar yang akan diberi link yang bisa di klik</strong> <br><br>Untuk mendapatkan kode atau script gambar, pertama silahkan unggah gambar lewat komputer maupun Hp Anda ke posting artikel, kemudian simpan dulu di draf, nanti kode gambar akan muncul dikotak draf, kira-kira secara default kode atau alamat gambarnya akan terlihat seperti contoh dibawah:<br>&nbsp;<br>Kode yang berwarna hijau adalah script atau kode gambar, cirinya diawali dengan kode <span style=\"color: green;\">&lt;img </span> dan diakhiri dengan kode&nbsp; <br>.Ambil kode gambarnya kemudian simpan dulu kode gambar di posting draf menjadi seperti contoh dibawah ini:<br>&nbsp;<br><strong># 2. Selanjutnya menyiapkan URL artikel yang akan ditautkan</strong> <br><br>Untuk mendapatkan URL artikel yang akan dibuat tautan kita ambil saja dari URL artikel yang ada di blog. Caranya, buka atau klik judul artikel yang akan ditautkan di blog Anda, terserah mau pilih yang mana, kemudian ambil URL atau link artikel tersebut yang berada di halaman paling atas di blog Anda.<br><br><br>Selanjutnya ambil dan copy link URL artikelnya, kemudian paste-kan tepat diatas kode gambar yang tadi ada di posting draf yang akan dibuat link tautan pada gambar, kira-kira contoh URL artikel akan terlihat seperti ini:<br><br>http://carasakrayblog.blogspot.com/2017/05/bagaimana-cara-membuat-link-yang-bisa-diklik-di-posting-blog.html<br><strong># 3. Cara membuat link atau tautan pada gambar yang bisa di klik dengan kode HTML</strong><br><br>Selanjutnya untuk membuat link tautan pada gambar yang bisa di klik, tambahkan sedikit kode HTML pada gambar dan URL artikel yang tadi disimpan di posting draf, lihat contoh penerapan kodenya di bawah ini:<br><br><span style=\"color: #ff0000;\">&nbsp;</span><br>Ada 3 kode HTML yang berwarna merah yang letaknya terpisah, kode itulah yang perlu ditambahkan ke URL Artikel dan script gambar yang akan di buat link tautan yang bisa di klik. <br>Dan tulisan berwarna hijau adalah tempat kode gambar yang letaknya disitu agar bisa di klik dan mengarah ke halaman artikel yang tadi Anda ambil link-nya.<br><br>Jika link tautan gambar dibuat dengan benar di posting artikel, maka hasilnya akan mengarah ke halaman lain sesuai dengan yang Anda mau.<br><br><br>Nah, panduan cara membuat link pada gambar yang bisa di klik diatas caranya sangat gampang, Anda tinggal praktik sekarang juga biar cepat bisa membuat link pada gambar yang bisa di klik.<br><br>Baca juga: <a href=\"http://carasakrayblog.blogspot.com/2017/05/bagaimana-cara-membuat-link-yang-bisa-diklik-di-posting-blog.html\"> Cara membuat link pada teks atau tulisan yang bisa di klik</a><br><br>Sampai disini cara membuat link tautan pada gambar yang bisa di klik telah selesai. Selanjutnya gunakan cara di atas untuk membuat link tautan antar halaman di blog, baik melalui link tautan pada teks maupun tautan gambar. <br><br>Cara membuat link tautan antar halaman diatas bisa juga diterapkan untuk membuat link tautan yang bisa di klik di halaman blog lainnya, seperti di navigasi, footter dan sidebar.</p>\r\n<p>&nbsp;</p>', 'Admin', '../uploads/blogs-foto/1614712093_1.jpg', 'Tech,Busines,Laptop', 1, 1, '2025-03-23 12:49:58'),
(4, 'Why Lead Generation is Key for Business Growth', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '<h2 class=\"mb-3\">It is a long established fact a reader be distracted</h2>\r\n<p><strong>Cara membuat link pada gambar yang bisa di klik di posting blog</strong><br><br>Didalam membuat link atau tautan pada gambar yang bisa di klik di posting blog, dan hal-hal yang perlu di siapkan adalah sebagai berikut:</p>\r\n<ol>\r\n<li>Menyiapkan kode gambar yang akan diberi link yang bisa di klik</li>\r\n<li>Menyiapkan URL artikel yang akan ditautkan</li>\r\n<li>Membuat link pada gambar yang bisa di klik dengan kode HTML</li>\r\n</ol>\r\n<p>Selanjutnya mari kita bahas satu persatu tentang langkah-langkah membuat link yang bisa di klik pada media gambar.<br><br><strong># 1. Menyiapkan kode gambar yang akan diberi link yang bisa di klik</strong> <br><br>Untuk mendapatkan kode atau script gambar, pertama silahkan unggah gambar lewat komputer maupun Hp Anda ke posting artikel, kemudian simpan dulu di draf, nanti kode gambar akan muncul dikotak draf, kira-kira secara default kode atau alamat gambarnya akan terlihat seperti contoh dibawah:<br>&nbsp;<br>Kode yang berwarna hijau adalah script atau kode gambar, cirinya diawali dengan kode <span style=\"color: green;\">&lt;img </span> dan diakhiri dengan kode&nbsp; <br>.Ambil kode gambarnya kemudian simpan dulu kode gambar di posting draf menjadi seperti contoh dibawah ini:<br>&nbsp;<br><strong># 2. Selanjutnya menyiapkan URL artikel yang akan ditautkan</strong> <br><br>Untuk mendapatkan URL artikel yang akan dibuat tautan kita ambil saja dari URL artikel yang ada di blog. Caranya, buka atau klik judul artikel yang akan ditautkan di blog Anda, terserah mau pilih yang mana, kemudian ambil URL atau link artikel tersebut yang berada di halaman paling atas di blog Anda.<br><br><br>Selanjutnya ambil dan copy link URL artikelnya, kemudian paste-kan tepat diatas kode gambar yang tadi ada di posting draf yang akan dibuat link tautan pada gambar, kira-kira contoh URL artikel akan terlihat seperti ini:<br><br>http://carasakrayblog.blogspot.com/2017/05/bagaimana-cara-membuat-link-yang-bisa-diklik-di-posting-blog.html<br><strong># 3. Cara membuat link atau tautan pada gambar yang bisa di klik dengan kode HTML</strong><br><br>Selanjutnya untuk membuat link tautan pada gambar yang bisa di klik, tambahkan sedikit kode HTML pada gambar dan URL artikel yang tadi disimpan di posting draf, lihat contoh penerapan kodenya di bawah ini:<br><br><span style=\"color: #ff0000;\">&nbsp;</span><br>Ada 3 kode HTML yang berwarna merah yang letaknya terpisah, kode itulah yang perlu ditambahkan ke URL Artikel dan script gambar yang akan di buat link tautan yang bisa di klik. <br>Dan tulisan berwarna hijau adalah tempat kode gambar yang letaknya disitu agar bisa di klik dan mengarah ke halaman artikel yang tadi Anda ambil link-nya.<br><br>Jika link tautan gambar dibuat dengan benar di posting artikel, maka hasilnya akan mengarah ke halaman lain sesuai dengan yang Anda mau.<br><br><br>Nah, panduan cara membuat link pada gambar yang bisa di klik diatas caranya sangat gampang, Anda tinggal praktik sekarang juga biar cepat bisa membuat link pada gambar yang bisa di klik.<br><br>Baca juga: <a href=\"http://carasakrayblog.blogspot.com/2017/05/bagaimana-cara-membuat-link-yang-bisa-diklik-di-posting-blog.html\"> Cara membuat link pada teks atau tulisan yang bisa di klik</a><br><br>Sampai disini cara membuat link tautan pada gambar yang bisa di klik telah selesai. Selanjutnya gunakan cara di atas untuk membuat link tautan antar halaman di blog, baik melalui link tautan pada teks maupun tautan gambar. <br><br>Cara membuat link tautan antar halaman diatas bisa juga diterapkan untuk membuat link tautan yang bisa di klik di halaman blog lainnya, seperti di navigasi, footter dan sidebar.</p>\r\n<p>&nbsp;</p>', 'Dora', '../uploads/blogs-foto/1795192223_1.jpg', 'mobile,tech,aplication,web', 1, 1, '2025-03-23 12:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_categories`
--

CREATE TABLE `blogs_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `blogs_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs_categories`
--

INSERT INTO `blogs_categories` (`id`, `categories_id`, `blogs_id`, `status`, `created_date`) VALUES
(12, 2, 4, 1, '2025-03-23 13:28:22'),
(13, 3, 4, 1, '2025-03-23 13:28:22'),
(14, 4, 4, 1, '2025-03-23 13:28:22'),
(15, 5, 4, 1, '2025-03-23 13:28:22'),
(16, 4, 3, 1, '2025-03-23 13:28:33'),
(17, 5, 3, 1, '2025-03-23 13:28:33'),
(18, 6, 3, 1, '2025-03-23 13:28:33'),
(19, 7, 3, 1, '2025-03-23 13:28:33'),
(20, 1, 2, 1, '2025-03-23 13:28:43'),
(21, 2, 2, 1, '2025-03-23 13:28:43'),
(22, 4, 2, 1, '2025-03-23 13:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_id`, `created_date`) VALUES
(1, 'Html', 1, 1, '2025-03-23 12:43:13'),
(2, 'Javascript', 1, 1, '2025-03-23 12:43:38'),
(3, 'Laravel', 1, 1, '2025-03-23 12:43:49'),
(4, 'React', 1, 1, '2025-03-23 12:43:59'),
(5, 'Flutter', 1, 1, '2025-03-23 12:44:09'),
(6, 'SQL', 1, 1, '2025-03-23 12:44:19'),
(7, 'Python', 1, 1, '2025-03-23 12:44:30'),
(8, 'CSS', 1, 1, '2025-03-23 12:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `blogs_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blogs_id`, `status`, `name`, `message`, `created_date`) VALUES
(2, 2, 0, 'Bima', 'Test Comments.... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?', '2025-03-23 14:41:40'),
(3, 2, 0, 'Noah', 'Okee Test', '2025-03-23 14:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_id`, `created_date`) VALUES
(1, 'Bima', 'bimadwisaputro@gmail.com', 'Testting Subject', 'SEO—short for search engine optimization—is about helping search engines understand your content, and helping users find your site and make a decision about whether they should visit your site through a search engine.', 0, 0, '2025-03-23 13:02:48'),
(2, 'Bima', 'bimadwisaputro@gmail.com', 'Testing Subject', 'SEO—short for search engine optimization—is about helping search engines understand your content, and helping users find your site and make a decision about whether they should visit your site through a search engine.', 0, 0, '2025-03-23 13:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `categories`, `name`, `foto`, `status`, `created_id`, `created_date`) VALUES
(1, 'Web Design', 'Branding &amp; Illustration Design', '../uploads/projects-foto/2057863370_1.jpg', 1, 1, '2025-03-23 12:27:24'),
(2, 'Web Design', 'Branding &amp; Illustration Design', '../uploads/projects-foto/785647920_1.jpg', 1, 1, '2025-03-23 12:27:43'),
(3, 'Web Design', 'Branding & Illustration Design', '../uploads/projects-foto/397009917_1.jpg', 1, 1, '2025-03-23 12:28:10'),
(4, 'Web Design', 'Branding & Illustration Design', '../uploads/projects-foto/145032998_1.jpg', 1, 1, '2025-03-23 12:28:32'),
(5, 'Web Design', 'Branding &amp; Illustration Design', '../uploads/projects-foto/1212717220_1.jpg', 1, 1, '2025-03-23 12:29:05'),
(6, 'Web Design', 'Branding &amp; Illustration Design', '../uploads/projects-foto/499758117_1.jpg', 1, 1, '2025-03-23 12:29:23'),
(7, 'Web Design', 'Branding &amp; Illustration Design', '../uploads/projects-foto/1054312834_1.jpg', 1, 1, '2025-03-23 12:29:45'),
(8, 'Web Design', 'Branding &amp; Illustration Design', '../uploads/projects-foto/666629407_1.jpg', 1, 1, '2025-03-23 12:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `from_year` int(11) NOT NULL,
  `to_year` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `foto` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `foto`, `status`, `created_id`, `created_date`) VALUES
(1, 'Web Development', 'Develop Web for Company and your Product.', '', 1, 1, '2025-03-23 12:12:52'),
(2, 'Web Design', 'We design web with better user experience.', '', 1, 1, '2025-03-23 12:13:55'),
(3, 'Web Application', 'Make your sistem Web Aplication more fast and easy to use.', '', 1, 1, '2025-03-23 12:15:01'),
(4, 'Banner Design', 'Make a modern Banner Design for you.', '', 1, 1, '2025-03-23 12:15:17'),
(5, 'Branding', 'Help you branding your product and company.', '', 1, 1, '2025-03-23 12:15:29'),
(6, 'Icon Design', 'Design Icons fresh for yours.', '', 1, 1, '2025-03-23 12:15:44'),
(7, 'Graphic Design', 'Make Graphic Design for your better view.', '', 1, 1, '2025-03-23 12:15:57'),
(8, 'SEO', 'Make Search Engine Optimization for better result.', '', 1, 1, '2025-03-23 12:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website_name` varchar(255) NOT NULL,
  `website_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `website_name`, `website_address`, `phone_number`, `email`, `birthday`, `address`, `logo`, `zipcode`, `about`, `status`, `created_id`, `created_date`) VALUES
(1, 'Bima Dwi Saputro', 'Portofolio Bima', 'http://localhost/portofolio/', '081299357498', 'bimadwisaputro@gmail.com', '1989-07-23', 'Jl Cipinang Galur no 6', '../uploads/settings-foto/1.png', '126371', 'Hi how are you, I am a bachelor\'s degree graduate majoring in information systems. I have experience in the field of web developer. I have started it since 2012 until now.', 1, 1, '2025-03-23 11:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `percentage`, `status`, `created_id`, `created_date`) VALUES
(1, 'HTML', 99, 1, 1, '2025-03-23 11:32:19'),
(2, 'Laravel PHP', 90, 1, 1, '2025-03-23 11:32:38'),
(3, 'SQL', 99, 1, 1, '2025-03-23 11:32:53'),
(4, 'CSS', 99, 1, 1, '2025-03-23 11:33:04'),
(5, 'Javascript', 99, 1, 1, '2025-03-23 11:33:17'),
(6, 'React', 80, 1, 1, '2025-03-23 11:33:33'),
(7, 'Python', 90, 1, 1, '2025-03-23 11:33:45'),
(8, 'C++', 90, 1, 1, '2025-03-23 11:35:00'),
(9, 'Flutter', 90, 1, 1, '2025-03-23 11:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `slidings`
--

CREATE TABLE `slidings` (
  `id` int(11) NOT NULL,
  `subheading` text NOT NULL,
  `heading1` text NOT NULL,
  `heading2` text NOT NULL,
  `foto` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slidings`
--

INSERT INTO `slidings` (`id`, `subheading`, `heading1`, `heading2`, `foto`, `status`, `created_id`, `created_date`) VALUES
(1, 'Hello!', 'I\'m <span>Bima Dwi Saputro ', ' I\'m a ', '../uploads/slidings-foto/1491188417_1.png', 1, 1, '2025-03-23 11:05:05'),
(2, 'We Design & Build Brands', 'Hi, This is my <span>favorite</span> work.', 'Hi, I am a', '../uploads/slidings-foto/248397194_1.png', 1, 1, '2025-03-23 11:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `photoprofile` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level_id`, `email`, `password`, `username`, `fullname`, `photoprofile`, `status`, `created_id`, `created_date`) VALUES
(1, 1, 'Admin@gmail.com', 'f9277477fc6238b01456aa4084edb202', 'Administrator', 'Administrator', '', 1, 1, '2025-03-23 10:07:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_categories`
--
ALTER TABLE `blogs_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slidings`
--
ALTER TABLE `slidings`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs_categories`
--
ALTER TABLE `blogs_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slidings`
--
ALTER TABLE `slidings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
