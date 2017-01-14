-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 11:25 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healty_life`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Vjezbanje'),
(2, 'Ishrana');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `comment`) VALUES
(4, 'samra', 'samra@gmial.com', 'komentar 5643'),
(5, 'meho', 'mehmed@gmial.com', 'koment 3'),
(27, 'razija', 'rdulovic1@gmial.com', 'testiram'),
(29, 'anoniman', 'neko@neko.com', 'neki komentar'),
(30, 'test', 'test@email.com', 'test'),
(31, 'indira', 'indira@gmial.com', 'komentar 1'),
(32, 'ahmed', 'ahmed@gmail.com', 'moj najnoviji komentar'),
(33, 'kako', 'kako@kako.com', 'kako'),
(34, '', 'omeni@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `text`, `image`) VALUES
(2, 1, 'test', 'Da li ste znali da je dovoljno sedam minuta aktivnosti, da biste osetili ogroman osecaj srece?<br><br>\n		\n	    Dokaz za to imam ja, kao i svi oni koji su to probali, ali sada je to i naucno objasnjeno. \n		HIIT, ili High Intesity Interval Training, iliti, trening visokog intenziteta u kojem se smenjuje\n		veliki napor s trenucima odmora, za samo sedam minuta moze da vas “digne iz mrtvih” i popravi vam raspolozenje za cijli dan.<br><br>\n\n        Fizicka aktivnost je odlicna protiv depresije, takodje.<br><br>\n\n        Naucnici koji su ispitivali ovaj fenomen, podijelili su depresivne ispitanike u tri grupe: prva, koja je lijecena od depresije samo\n		lijekovima, drugu, koja je lijecena samo fizickom aktivnoscu i, treca, u kojoj su ljudi kombinovali lijekove sa fizickom aktivnoscu.\n		Nakon sest mjeseci rezultat je bio gotovo identican za sve tri grupe – izlijecili su depresiju.<br><br>\n\n		Međutim, ponovna provera stanja ispitanika nakon šest meseci pokazala je zapanjujuće rezultate. Oni koji su uzimali lekove, čak\n		njih 36% imalo je ponovo iste simptome. Ispitanici koji su kombinovali lekove s vežbama, u 31% slučajeva vratili su se na staro.\n		Ali, hej, oni koji su samo vežbali protiv depresije, bili su ponovo depresivni u samo 9% slučajeva nakon šest meseci!<br><br>\n\n		Nije li to superiška?', '212.png'),
(17, 1, 'test111 dodala', 'qqq jos', 'TestSlika.jpg'),
(22, 2, 'nesto moje editujem sada novo', 'nesto moje edit sada novo 12', 'TestSlika.jpg'),
(24, 1, 'novi', 'nesto', 'TestSlika.jpg'),
(25, 2, 'opet dodaj', 'nesto', 'TestSlika.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, 'rdulovic1@gmial.com'),
(2, 'indira@gmial.com'),
(3, 'Belma@gmail.com'),
(4, 'kako@k.com'),
(5, 'nesko@gmial.com'),
(6, 'ajisa@hotmail.com'),
(7, 'mer@gmail.com'),
(8, 'Selma@gmail.com'),
(9, 'ramiza@gmail.com'),
(10, 'test@email.com'),
(11, 'kako@kako.com'),
(12, 'vjezbanje@gmail.com'),
(13, 'jos@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
