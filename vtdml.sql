-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 15 sep. 2024 à 13:42
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vtdml`
--

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

CREATE TABLE `characters` (
  `namechar` varchar(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `franchise` varchar(50) NOT NULL,
  `groups` varchar(50) DEFAULT NULL,
  `typechar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `characters`
--

INSERT INTO `characters` (`namechar`, `gender`, `age`, `birthday`, `franchise`, `groups`, `typechar`) VALUES
('Abbey Bominable', 'She', 16, 'December 14th', 'Monster High', NULL, 'Main'),
('Apple White', 'She', 16, 'May 13th', 'Ever After High', 'Royals', 'Main'),
('Ashlynn Ella', 'She', 15, 'October 15th', 'Ever After High', 'Royals/Rebels', 'Main'),
('Briar Beauty', 'She', 16, 'August 9th', 'Ever After High', 'Royals/Rebels', 'Main'),
('Cerise Hood', 'She', 13, 'October 31st', 'Ever After High', 'Rebels', 'Main'),
('Clawdeen Wolf', 'She', 15, 'April 30th', 'Monster High', NULL, 'Main'),
('Cleo de Nile', 'She', 5842, 'Unknown', 'Monster High', NULL, 'Main'),
('Daring Charming', 'He', 16, 'April 2nd', 'Ever After High', 'Royals', 'Main'),
('Deuce Gorgon', 'He', 16, 'March 5th', 'Monster High', NULL, 'Main'),
('Dexterous Charming', 'He', 16, 'February 11th', 'Ever After High', 'Royals', 'Main'),
('Draculaura', 'She', 1599, 'February 14th', 'Monster High', NULL, 'Main'),
('Duchess Swan', 'She', 16, 'April 30th', 'Ever After High', 'Royals', 'Main'),
('Frankie Stein', 'She', 1, 'June 26th', 'Monster High', NULL, 'Main'),
('Ghoulia Yelps', 'She', 16, 'July 25th', 'Monster High', NULL, 'Main'),
('Hunter Huntsman', 'He', 16, 'March 13th', 'Ever After High', 'Rebels', 'Main'),
('Lagoona Blue', 'She', 15, 'June 10th', 'Monster High', NULL, 'Main'),
('Lizie Hearts', 'She', 15, 'January 18th', 'Ever After High', 'Royals', 'Main'),
('Madeline  Hatter', 'She', 15, 'June 8th', 'Ever After High', 'Rebels', 'Main'),
('Poppy O\'Hair', 'She', 15, 'June 19th', 'Ever After High', 'Rebels', 'Main'),
('Raven Queen', 'She', 15, 'November 25th', 'Ever After High', 'Rebels', 'Main');

-- --------------------------------------------------------

--
-- Structure de la table `entertainment`
--

CREATE TABLE `entertainment` (
  `nameentertainmenent` varchar(50) NOT NULL,
  `typeentertainement` varchar(50) NOT NULL,
  `franchise` varchar(50) NOT NULL,
  `duration` time DEFAULT NULL,
  `nbpages` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `entertainment`
--

INSERT INTO `entertainment` (`nameentertainmenent`, `typeentertainement`, `franchise`, `duration`, `nbpages`, `date`, `author`) VALUES
('A Wonderlandiful World', 'Book', 'Ever After High', NULL, 336, '2014-08-26', 'Shanon Hale'),
('Back and Deader Than Ever', 'Book', 'Monster High', NULL, 232, '2012-05-01', 'Lisi Harrison'),
('Clawdeen Wolf and the Freaky-Fabulous Fashion Show', 'Book', 'Monster High', NULL, 160, '2016-05-03', 'Nessi Monstrata'),
('Cleo and the Creeperific Mummy Makeover', 'Book', 'Monster High', NULL, 160, '2016-08-02', 'Nessi Monstrata'),
('Draculaura and the New Stepmomster', 'Book', 'Monster High', NULL, 160, '2015-08-04', 'Nessi Monstrata'),
('Ever After High : A True Hearts Day', 'Movie', 'Ever After High', '00:23:00', NULL, '2014-02-09', 'Mattel'),
('Ever After High : Dragon Games', 'Movie', 'Ever After High', '01:36:00', NULL, '2016-01-29', 'Netflix'),
('Ever After High : Epic Winter', 'Movie', 'Ever After High', '01:40:00', NULL, '2016-08-04', 'Netflix'),
('Ever After High : Legacy Day : A Tale of Two Tales', 'Movie', 'Ever After High', '00:23:00', NULL, '2013-11-26', 'Mattel'),
('Ever After High : Spring Unsprung', 'Movie', 'Ever After High', '00:46:00', NULL, '2015-02-06', 'Mattel'),
('Ever After High : The Series', 'WebSeries', 'Ever Atfer High', '24:10:30', NULL, '2013-06-18', 'Mattel'),
('Ever After High : Thronecoming', 'Movie', 'Ever After High', '00:46:00', NULL, '2014-11-02', 'Mattel'),
('Ever After High : Way Too Wonderland', 'Movie', 'Ever After High', '01:30:00', NULL, '2015-08-14', 'Netflix'),
('Frankie Stein and the New Ghoul at School', 'Book', 'Monster High', NULL, 160, '2015-11-03', 'Nessi Monstrata'),
('Goulfriends \'til the End', 'Book', 'Monster High', NULL, 256, '2014-04-08', 'Gitty Daneshvari'),
('Goulfriends Forever', 'Book', 'Monster High', NULL, 272, '2012-09-05', 'Gitty Daneshvari'),
('Goulfriends Just Want to Have Fun', 'Book', 'Monster High', NULL, 272, '2013-04-02', 'Gitty Daneshvari'),
('Lagoona Blue and the Big Sea Scarecation', 'Book', 'Monster High', NULL, 160, '2016-02-02', 'Nessi Monstrata'),
('Monster High', 'Book', 'Monster High', NULL, 255, '2010-09-01', 'Lisi Harrison'),
('Monster High : Escape from Skull Shores', 'Movie', 'Monster High', '00:45:00', NULL, '2012-02-16', 'Mattel'),
('Monster High : Freaky Fusion', 'Movie', 'Monster High', '01:13:00', NULL, '2014-09-06', 'Mattel'),
('Monster High : Friday Night Frights', 'Movie', 'Monster High', '00:46:00', NULL, '2013-01-21', 'Mattel'),
('Monster High : Fright On!', 'Movie', 'Monster High', '00:46:00', NULL, '2010-10-31', 'Mattel'),
('Monster High : Frights, Camera, Action!', 'Movie', 'Monster High', '01:12:00', NULL, '2014-03-25', 'Mattel'),
('Monster High : Ghouls Rule', 'Movie', 'Monster High', '01:10:00', NULL, '2012-09-09', 'Mattel'),
('Monster High : Great Scarrier Reef', 'Movie', 'Monster High', '01:09:00', NULL, '2016-02-12', 'Mattel'),
('Monster High : Haunted', 'Movie', 'Monster High', '01:15:00', NULL, '2015-03-24', 'Mattel'),
('Monster High : New Ghoul at School', 'Movie', 'Monster High', '00:23:00', NULL, '2010-10-31', 'Mattel'),
('Monster High : Scaris City of Frights', 'Movie', 'Monster High', '01:01:00', NULL, '2013-03-03', 'Mattel'),
('Monster High : The Series', 'WebSeries', 'Monster High', '09:48:00', NULL, '2010-05-05', 'Mattel'),
('Monster High : Why Do Ghouls Fall In Love?', 'Movie', 'Monster High', '00:45:00', NULL, '2012-02-12', 'Mattel'),
('Monster High :13 Wishes', 'Movie', 'Monster High', '01:13:00', NULL, '2013-09-08', 'Mattel'),
('Monster High :Boo York, Boo York', 'Movie', 'Monster High', '01:12:00', NULL, '2015-09-19', 'Mattel'),
('Once Upon a Time; A Story Collection', 'Book', 'Ever After High', NULL, 241, '2014-10-21', 'Shanon Hale'),
('The Ghoul Next Door', 'Book', 'Monster High', NULL, 241, '2011-01-01', 'Lisi Harrison'),
('The Storybook of Legends', 'Book', 'Ever After High', NULL, 305, '2013-10-08', 'Shanon Hale'),
('The Unfairest of Them All', 'Book', 'Ever After High', NULL, 326, '2014-03-25', 'Shanon Hale'),
('Where There\'s a Wolf, There\'s a Way', 'Book', 'Monster High', NULL, 256, '2011-09-20', 'Lisi Harrison'),
('Who\'s That Ghoulfriend?', 'Book', 'Monster High', NULL, 240, '2013-09-10', 'Gitty Daneshvari');

-- --------------------------------------------------------

--
-- Structure de la table `familiar`
--

CREATE TABLE `familiar` (
  `namefamiliar` varchar(50) NOT NULL,
  `typefamiliar` varchar(50) NOT NULL,
  `namechar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `familiar`
--

INSERT INTO `familiar` (`namefamiliar`, `typefamiliar`, `namechar`) VALUES
(' Hissette', 'Snake', 'Cleo de Nile'),
('Baby Woolly Mammoth', 'Shiver', 'Abbey Bominable'),
('Carmine', 'Direwolf', 'Cerise Hood'),
('Count Fabulous', 'BFF (Bat Friend Forever)', 'Draculaura'),
('Divacorn', 'Unicorn', 'Briar Beauty'),
('Female Kitten', 'Crescent', 'Clawdeen Wolf'),
('Gala', 'Snow Fox', 'Apple White'),
('Mr.Cottonhorn', 'Jackalope', 'Dexterous Charming'),
('Neptuna', 'Piranha', 'Lagoona Blue'),
('P-Hawk', 'Peacock', 'Daring Charming'),
('Perseus', 'Two-tailed rat', 'Deuce Gorgon'),
('Pesky', 'Squirrel', 'Hunter Huntsman'),
('Pirouette', 'Swan', 'Duchess Swan'),
('Prince', 'Puppy', 'Raven Queen'),
('Sandella', 'Phoenix', 'Ashlynn Ella'),
('Sir Hoots A Lot', 'Baby blue howl', 'Ghoulia Yelps'),
('Watzit', 'Frankenmonster', 'Frankie Stein');

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `namechar` varchar(50) NOT NULL,
  `namefriend` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`namechar`, `namefriend`) VALUES
('Abbey Bominable', 'Frankie Stein, Lagoona Blue'),
('Clawdeen Wolf', 'Frankie Stein, Draculaura, Ghoulia Yelps, Deuce Gorgon'),
('Deuce Gorgon', 'Heath Burns, Clawd Wolf'),
('Draculaura', 'Frankie Stein, Clawdeen Wolf'),
('Frankie Stein', 'Draculaura, Clawdeen Wolf, Lagoona Blue, Abbey Bominable, Cleo de Nile, Deuce Gorgon, Jackson Jekyll, Holt Hyde'),
('Ghoulia Yelps', 'Cleo de Nile'),
('Apple White', 'Briar Beauty, Ashlynn Ella'),
('Briar Beauty', 'Apple White, Raven Queen, Ashlynn Ella, Madeline Hatter'),
('Ashlynn Ella', 'Hunter Huntsman');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `image`, `image_text`) VALUES
(11, 'wp1875700.png', 'EAH : The Beginning'),
(13, 'Monster-high.png', 'MH : The Beginning'),
(15, 'wolf-zimmermann-6sf5rf8QYFE-unsplash.jpg', 'VTDML : The Beginning'),
(23, 'davide-carpani-nRGiAlIjfgA-unsplash.jpg', 'GTK : Get To Know'),
(30, 'Appleofficial.jpg', 'Apple White'),
(31, 'Briar_beauty.jpg', 'Briar Beauty'),
(32, '215px-Ashlynn_Ella_no._2.webp.png', 'Ashlynn Ella'),
(33, 'image_2023-05-02_010529744.png', 'Cerise Hood'),
(34, 'image_2023-05-02_010557408.png', 'Dexterous Charming'),
(35, 'image_2023-05-02_010612128.png', 'Daring Charming'),
(36, 'image_2023-05-02_010628878.png', 'Hunter Huntsman'),
(37, 'image_2023-05-02_010647699.png', 'Duchess Swan'),
(38, 'image_2023-05-02_010704371.png', 'Raven Queen'),
(39, 'image_2023-05-02_010723695.png', 'Lizie Hearts'),
(40, 'image_2023-05-02_010751079.png', 'Madeline  Hatter'),
(41, 'image_2023-05-02_010805600.png', 'Poppy O\'Hair'),
(42, 'image_2023-05-02_010920888.png', 'Abbey Bominable'),
(43, 'image_2023-05-02_010933876.png', 'Clawdeen Wolf'),
(44, 'image_2023-05-02_011001214.png', 'Deuce Gorgon'),
(45, 'image_2023-05-02_011024954.png', 'Draculaura'),
(46, 'image_2023-05-02_011044378.png', 'Frankie Stein'),
(47, 'image_2023-05-02_011114600.png', 'Ghoulia Yelps'),
(48, 'image_2023-05-02_011140333.png', 'Lagoona Blue'),
(49, 'image_2023-05-02_011158165.png', 'Cleo de Nile'),
(50, 'image_2023-05-02_015622704.png', 'A Wonderlandiful World'),
(51, 'image_2023-05-02_015823338.png', 'Ever After High : A True Hearts Day'),
(52, 'image_2023-05-02_015912789.png', 'Ever After High : Dragon Games'),
(54, 'image_2023-05-02_015937759.png', 'Ever After High : Epic Winter'),
(55, 'image_2023-05-02_020010939.png', 'Ever After High : Legacy Day : A Tale of Two Tales'),
(56, 'image_2023-05-02_020204322.png', 'Ever After High : Spring Unsprung'),
(57, 'image_2023-05-02_020231634.png', 'Ever After High : Thronecoming'),
(58, 'image_2023-05-02_020252522.png', 'Ever After High : Way Too Wonderland'),
(59, 'image_2023-05-02_020322548.png', 'Once Upon a Time; A Story Collection'),
(60, 'image_2023-05-02_020450331.png', 'The Unfairest of Them All'),
(61, 'image_2023-05-02_020532131.png', 'Ever After High : Epic Winter'),
(62, '18053786.jpg', 'The Storybook of Legends'),
(63, 'image_2023-05-02_020938693.png', 'Ever After High : The Series'),
(64, 'image_2023-05-02_021005003.png', 'Back and Deader Than Ever'),
(65, 'image_2023-05-02_021034049.png', 'Clawdeen Wolf and the Freaky-Fabulous Fashion Show'),
(66, 'image_2023-05-02_021056008.png', 'Cleo and the Creeperific Mummy Makeover'),
(67, 'image_2023-05-02_021120468.png', 'Draculaura and the New Stepmomster'),
(68, 'image_2023-05-02_021144119.png', 'Frankie Stein and the New Ghoul at School'),
(69, 'image_2023-05-02_021206854.png', 'Goulfriends \'til the End'),
(70, 'image_2023-05-02_021235604.png', 'Goulfriends Forever'),
(71, 'image_2023-05-02_021301341.png', 'Goulfriends Just Want to Have Fun'),
(72, 'image_2023-05-02_021324441.png', 'Who\'s That Ghoulfriend?'),
(73, 'image_2023-05-02_021427216.png', 'Lagoona Blue and the Big Sea Scarecation'),
(74, 'image_2023-05-02_021446630.png', 'Monster High'),
(75, 'image_2023-05-02_021521587.png', 'The Ghoul Next Door'),
(76, 'image_2023-05-02_021533655.png', 'Where There\'s a Wolf, There\'s a Way'),
(77, 'image_2023-05-02_021558393.png', 'Monster High :13 Wishes'),
(78, 'image_2023-05-02_021612264.png', 'Monster High : Why Do Ghouls Fall In Love?'),
(79, 'image_2023-05-02_021643230.png', 'Monster High : The Series'),
(80, 'image_2023-05-02_021657546.png', 'Monster High : Scaris City of Frights'),
(81, 'image_2023-05-02_021720796.png', 'Monster High : New Ghoul at School'),
(82, 'image_2023-05-02_021747539.png', 'Monster High : Escape from Skull Shores'),
(83, 'image_2023-05-02_021803922.png', 'Monster High : Freaky Fusion'),
(84, 'image_2023-05-02_021820100.png', 'Monster High : Friday Night Frights'),
(85, 'image_2023-05-02_021836359.png', 'Monster High : Fright On!'),
(86, 'image_2023-05-02_021855994.png', 'Monster High : Haunted'),
(87, 'image_2023-05-02_021918617.png', 'Monster High : Ghouls Rule'),
(88, 'image_2023-05-02_021932270.png', 'Monster High :Boo York, Boo York'),
(89, 'image_2023-05-02_021943828.png', 'Monster High : Great Scarrier Reef'),
(90, 'image_2023-05-02_021955802.png', 'Monster High : Frights, Camera, Action!'),
(91, 'yahya-gopalani-0w18RZrfkpY-unsplash.jpg', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `body`, `featured`, `published`, `created_at`, `image`) VALUES
(1, 4, 'VTDML : The Beginning', 'vtdml-the-beginning', 'VTDML also known as Vanessa\'s Trip Down Memory Lane is an entertainment wiki blog where different authors interacts.\r\n\r\nThe main reason of its existence is to put into light the forgotten franchise of our childhood like \"Monster High\", \"Ever After High\", etc.', 1, 1, '2023-04-29 20:24:43', ''),
(5, 4, 'MH : The Beginning', 'mh-the-beginning', 'Monster High is an American multimedia-supported fashion doll franchise created by toy designer Garret Sand from Mattel that was launched in 2010.\r\n\r\nIts story revolves around the terrific teenage descendants of the world\'s most famous monsters from mosnter movies, sci-fi horrir, thriller action, folklore mmyths and popular culture, as they brave the trials and tribulations of a mixed-creature high school in a world that\'s barely ready for that.\r\n\r\nThough the fashion dolls were the main focus of the franchise, a 2D-animated web series and more then 15 animated TV specials/films were released to accompany them, as well as videos games, a series of young adult novels and other forms of merchandise.\r\n\r\n The franchise quickly became very popular among children and was extremely successful in terms of earnings for Mattel; it was worth $1 billion in its 3rd year of existence with more than $500 million in sales annually, and was the second best-selling doll brand in North America.\r\n\r\nTwo spin-off toy lines were launched as companions to Monster High: Ever After High in July 2013 based on fairy tales and fables and Enchantimals in 2017 featuring human-animal hybrids. \r\n\r\nHowever, sales declined in 2016, prompting Mattel to reboot the franchise with a revamped aesthetic and a new fictional universe. The reboot was a commercial failure, eventually leading to the discontinuation of the franchise in 2018.', 0, 1, '2023-04-30 12:02:41', ''),
(8, 4, 'EAH : The Beginning', 'eah-the-beginning', 'Ever After High is an American multimedia-supported doll franchise from Mattel that was launched in 2013.\r\n\r\nIts story revolves around the enchanting teenage descendants of the world\'s most celebrated fairytale characters as they confront the destiny set forth by their story at high school and either embrace it or reject it.\r\nAware that the fate of their entire world depends on their choices, enemies are easily made, but new friends to be made are always nearby.', 0, 1, '2023-04-30 17:54:52', ''),
(19, 4, 'GTK : Get To Know', 'gtk-get-to-know', 'Get To Know (GTK) is a new series on this blog where I introduce you some of the most popular characters from the existing franchise.', 0, 1, '2023-05-01 20:57:24', ''),
(23, 4, 'test', 'test', 'test', 0, 0, '2023-05-02 00:20:25', '');

-- --------------------------------------------------------

--
-- Structure de la table `post_topic`
--

CREATE TABLE `post_topic` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `post_topic`
--

INSERT INTO `post_topic` (`id`, `topic_id`, `post_id`) VALUES
(16, 1, 5),
(17, 2, 8),
(18, 3, 1),
(19, 3, 0),
(20, 3, 0),
(21, 3, 0),
(22, 1, 0),
(23, 1, 17),
(24, 1, 18),
(25, 3, 19),
(26, 1, 20),
(27, 1, 21),
(28, 1, 22),
(29, 6, 23);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`) VALUES
(1, 'Monster High', 'monster-high'),
(2, 'Ever After High', 'ever-after-high'),
(3, 'VTDML', 'vtdml'),
(6, 'test', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `admin`, `password`) VALUES
(4, 'vr0umvr0um', 'V', 'vr0umvr0umV', 'vr0umvr0um.v@gmail.com', 1, '$2y$10$NxyfIE.bxjnbZ7rTS.7d9eUP2wezbWQkMJKVWQ4rsAN5swvz14VXq'),
(5, 'John', 'Doe', 'JD', 'john.doe@gmail.com', 0, '$2y$10$OyNZZfrfszmb.75SZWssj.bFU0sqqoesfio7IafbuIzpZCxR95Sfa'),
(6, 'test', 'test', 'testEdit', 'test@gmail.com', 1, '$2y$10$Zg..YVyIKKNfYoYNDe0i/O16jwlWXwrmdPLg4UqFqJFaRzjDe.CYa');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`namechar`);

--
-- Index pour la table `entertainment`
--
ALTER TABLE `entertainment`
  ADD PRIMARY KEY (`nameentertainmenent`);

--
-- Index pour la table `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`namefamiliar`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `post_topic`
--
ALTER TABLE `post_topic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `post_topic`
--
ALTER TABLE `post_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
