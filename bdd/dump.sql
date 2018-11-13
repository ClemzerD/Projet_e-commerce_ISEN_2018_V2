-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 09 nov. 2018 à 15:57
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dump`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `nom` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantité` double DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`),
  KEY `IDX_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `nom`, `type`, `quantité`, `image`, `status`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(2, 1, '', 'CART', 149.52, '', 'CART', 1, 2, '2018-10-12 14:07:07', '2018-10-12 14:07:07'),
(3, 1, '', 'ORDER', 100, '', 'BILLED', 3, 4, '2018-10-12 14:07:07', '2018-10-12 14:07:07');

-- --------------------------------------------------------

--
-- Structure de la table `order_addresses`
--

DROP TABLE IF EXISTS `order_addresses`;
CREATE TABLE IF NOT EXISTS `order_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-12 14:07:06', '2018-10-12 14:07:06'),
(3, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2018-10-12 14:07:07', '2018-10-12 14:07:07'),
(4, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-12 14:07:07', '2018-10-12 14:07:07'),
(5, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2018-10-12 14:07:07', '2018-10-12 14:07:07');

-- --------------------------------------------------------

--
-- Structure de la table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(3) UNSIGNED NOT NULL,
  `unit_price` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_order_product` (`order_id`),
  KEY `IDX_product_order` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 2, 50, '2018-10-12 14:07:07', '2018-10-12 14:07:07'),
(11, 1, 19, 1, 35, '2018-11-09 14:30:17', '2018-11-09 14:30:17');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int(10) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `prix` double DEFAULT NULL,
  `taille` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantite` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_product_range` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `type`, `nom`, `description`, `prix`, `taille`, `image`, `quantite`) VALUES
(1, 3, 'Rituel T-Shirt Noir', 'T-Shirt Noir de très bonne qualité', 20, NULL, 'image\\tshirtnoirmc.jpg\r\n', 5),
(2, 3, 'Rituel T-Shirt Noir manche longue', 'T-shirt noir mais avec des manches longues', 20, '', 'image\\tshirtnoirml.jpg\r\n', 5),
(9, 3, 'Rituel T-Shirt Blanc', 'T-Shirt Blanc de très bonne qualité', 20, NULL, 'image\\tshirtblancmc.jpg', 5),
(10, 3, 'Rituel T-Shirt Blanc manche longue', 'Ca c est toujours un T-shirt noir mais sauf qu il est blanc et avec des manches longues', 20, NULL, 'image\\tshirtblancml.jpg', 5),
(16, 2, 'Rituel Pull Noir', 'Pull de couleur noir où il est ecrit rituel dessus', 35, NULL, 'image\\pullnoirmc.jpg\r\n', 5),
(18, 2, 'Rituel Pull Noir manches longues', 'Pull de couleur noir où il est ecrit rituel dessus et surtout il a le bras long ', 35, NULL, 'image\\pullnoirml.jpg\r\n', 5),
(19, 2, 'Rituel Pull Blanc', 'Pull de couleur blanc', 35, NULL, 'image\\pullblancmc.jpg\r\n', 5),
(20, 2, 'Rituel Pull Noir manches longues', 'Pull de couleur blanche avec les manches moyennes ++', 35, NULL, 'image\\pullblancml.jpg\r\n', 5),
(21, 1, 'Rituel Sweat Noir', 'Sweat de couleur noir comme le pull mais avec une capuche', 40, NULL, 'image\\sweatnoirmc.jpg\r\n\r\n', 5),
(22, 1, 'Rituel Sweat Blanc', 'Sweat de couleur blanc comme le tshirt mais en plus chaud et avec une capuche', 40, NULL, 'image\\sweatblancmc.jpg\r\n\r\n', 5),
(23, 1, 'Rituel Sweat Noir manches longues', 'Sweat de couleur blanc comme le sweat de couleur noir avec les manches courtes', 40, NULL, 'image\\sweatnoirml.jpg\r\n\r\n', 5),
(24, 1, 'Rituel Sweat Blanc manches longues', 'Sweat de couleur blanc mais avec des manches super mega longues', 40, NULL, 'image\\sweatblancml.jpg\r\n\r\n', 5);

-- --------------------------------------------------------

--
-- Structure de la table `ranges`
--

DROP TABLE IF EXISTS `ranges`;
CREATE TABLE IF NOT EXISTS `ranges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_range_parent` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ranges`
--

INSERT INTO `ranges` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Main range', NULL, '2018-10-12 14:07:06', '2018-10-12 14:07:06'),
(3, 'Second range', 1, '2018-10-12 14:07:06', '2018-10-12 14:07:06'),
(4, 'Third range', 1, '2018-10-12 14:07:06', '2018-10-12 14:07:06');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', 'fred.eric@example.com', 'password', 1, 2, '2018-10-12 14:07:06', '2018-10-12 14:07:06'),
(3, 'Frederic', 'frederic@example.com', 'password', 3, 4, '2018-10-12 14:07:06', '2018-10-12 14:07:06'),
(4, 'AZER', 'AZER1234', '1234', NULL, NULL, '2018-10-26 13:50:16', '2018-10-26 13:50:16'),
(5, 'AZER', 'AZER1234', '1234', NULL, NULL, '2018-10-26 13:52:06', '2018-10-26 13:52:06'),
(6, '', '', '', NULL, NULL, '2018-10-26 13:56:38', '2018-10-26 13:56:38'),
(7, '', '', '', NULL, NULL, '2018-10-26 13:57:29', '2018-10-26 13:57:29'),
(8, 'AZE', 'AZE123', '123', NULL, NULL, '2018-10-26 13:57:48', '2018-10-26 13:57:48'),
(9, 'AZE', 'AZE123', '123', NULL, NULL, '2018-10-26 13:58:34', '2018-10-26 13:58:34'),
(10, 'AZE', 'AZE123', '123', NULL, NULL, '2018-10-26 13:58:47', '2018-10-26 13:58:47'),
(11, 'AZE', 'AZE123', '123', NULL, NULL, '2018-10-26 13:59:14', '2018-10-26 13:59:14'),
(12, 'AZER', 'AZA', '1234', NULL, NULL, '2018-10-26 14:19:41', '2018-10-26 14:19:41');

-- --------------------------------------------------------

--
-- Structure de la table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-12 14:07:06', '2018-10-12 14:07:06'),
(3, 'Eric Fred', '12 route Pleine', 'chez mon oncle', '59000', 'Lille', 'FRANCE', '2018-10-12 14:07:06', '2018-10-12 14:07:06'),
(4, 'Frederic', '239 rue de Douai', NULL, '59000', 'Lille', 'FRANCE', '2018-10-12 14:07:06', '2018-10-12 14:07:06'),
(5, 'Epicfred', '3 sans idée', 'oui oui', '59000', 'Lille', 'FRANCE', '2018-10-12 14:07:06', '2018-10-12 14:07:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
