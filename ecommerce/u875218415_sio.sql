
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 02 Novembre 2015 à 18:46
-- Version du serveur: 10.0.20-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u875218415_sio`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Iphone 6 Plus', 749),
(2, 'Samsung S6', 669),
(3, 'Sony Xperia', 263),
(4, 'Acer Jade S', 229);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL,
  `reset_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `remember_token` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `remember_token`) VALUES
(8, 'freshloic', 'freshloic@hotmail.fr', '$2y$10$8cfyA08hWeTtwFh75xTCFe9krGfVYDn4wlatR0sTueRimAiFxnPOO', NULL, '2015-10-31 22:11:33', NULL, NULL, 'Avqgu5EIUkQlmJLX37YyzGr2TqQFTKYXR9MQcR6FNuTzw7WCcO4aaxDQCFQ4PLv4FCV7u3pY8c0He0WQKfcz3GC2dwARTJniEagQ49yHgFpxIdhP0mv7eQFDHOBNXxQ46a2AUQqLbmjtnn27MSCjbnQX1VijhMLJNEnCJmymSioJz2GtGop2RZJMfuQ97myVPabuS2BcWzlvHeQU5apfngAOsHWtltiheo6WxBkle0DtjGnQwVmfaEJOeZ'),
(9, 'nouveau', 'test@test.fr', '$2y$10$8cfyA08hWeTtwFh75xTCFe9krGfVYDn4wlatR0sTueRimAiFxnPOO', 'zO25mbDnpGoMPm1rPCI5bDCalY75qqmwtgiRzPSswwz1icUPz0gkpULu0L1I', NULL, NULL, NULL, ''),
(10, 'Wartest', 'afk@afk.fr', '$2y$10$8cfyA08hWeTtwFh75xTCFe9krGfVYDn4wlatR0sTueRimAiFxnPOO', 'PbaKvYPxE1W7HF3DuyqnD4xSfEHCLYIVVUz4i4NwRiavhb5Te5JOAa8jxVLT', NULL, NULL, NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
