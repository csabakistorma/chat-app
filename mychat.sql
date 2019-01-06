-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mychat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `chat`
--

INSERT INTO `chat` (`id`, `users`) VALUES
(1, 'csabakistorma,TesztBandi123'),
(4, 'TesztBandi123,Márti'),
(3, 'TesztBandi123,Niki92'),
(5, 'Niki92,Márti'),
(6, 'Niki92,csabakistorma'),
(7, 'Niki92,lilihorváth'),
(8, 'TesztBandi123,lilihorváth');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chatID` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `messages`
--

INSERT INTO `messages` (`id`, `chatID`, `username`, `text`, `date`) VALUES
(1, 1, 'csabakistorma', 'Ez egy teszt', '2019-01-06 10:08:07'),
(4, 1, 'TesztBandi123', 'szia, hogy vagy?', '2019-01-06 10:13:11'),
(5, 3, 'TesztBandi123', 'Szia Niki', '2019-01-06 10:14:50'),
(6, 3, 'TesztBandi123', 'Teszt', '2019-01-06 10:19:51'),
(7, 3, 'Niki92', 'szia bandi', '2019-01-06 10:21:15'),
(8, 3, 'TesztBandi123', 'Ismét egy teszt', '2019-01-06 10:23:25'),
(9, 3, 'TesztBandi123', 'Ez is egy teszt', '2019-01-06 10:24:38'),
(18, 4, 'TesztBandi123', 'Helló szia', '2019-01-06 11:41:32'),
(19, 4, 'TesztBandi123', 'Itt vagy?', '2019-01-06 11:41:39'),
(20, 5, 'Niki92', 'Hogy vagy?', '2019-01-06 11:41:58'),
(21, 6, 'Niki92', 'Alszol?', '2019-01-06 11:42:04'),
(22, 7, 'Niki92', 'Üdv helló', '2019-01-06 12:21:58'),
(23, 8, 'TesztBandi123', 'Helló', '2019-01-06 15:27:15');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'csabakistorma', 'Kistorma', 'Csaba', 'csabakistorma@gmail.com', '258df161c3f3b81176b634310e401efa'),
(2, 'TesztBandi123', 'Teszt', 'András', 'tesztb@gmail.com', '6795338890fd3dba2740df2898b2319f'),
(3, 'atesz00', 'Nagy', 'Attila', 'atesz00@gmail.com', 'a74a3b4e407a57b5c1f8362387a71e3a'),
(4, 'Pisti11', 'Kovács', 'István', 'istvankovacs@gmail.com', '0997fddee44d27c107aaee72c6227f3c'),
(5, 'Mészi', 'Mészáros', 'Gábor', 'meszi@gmail.com', '52ec0561f5e60f0ca0dc7ad79f662db7'),
(6, 'Niki92', 'Zsoldos', 'Nikolett', 'niki92@gmail.com', '0f368732fa77f6ecde7b0b4917552a66'),
(7, 'jenci', 'Polgár', 'Jenő', 'jenci@gmail.com', '2011049f2e7b435aa207e35ab9da5c49'),
(8, 'Márti', 'Novák', 'Márta', 'marti@gmail.com', 'd52fa279838cebdd422ccb6e1a04dd91'),
(9, 'lilihorváth', 'Horváth', 'Lili', 'lilihorvath@gmail.com', '03518ebf7f68d72b49512d23c4c6dc4b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
