-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 juin 2021 à 13:14
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `animalerie`
--

CREATE DATABASE IF NOT EXISTS animalerie;
USE animalerie;

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

DROP TABLE IF EXISTS `animaux`;
CREATE TABLE IF NOT EXISTS `animaux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `espece` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL,
  `age` int UNSIGNED NOT NULL,
  `poids` double UNSIGNED NOT NULL,
  `taille` double UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `adopted` tinyint(1) NOT NULL DEFAULT '0',
  `adoptionDate` timestamp NULL DEFAULT NULL,
  `sexe` tinyint(1) NOT NULL,
  `sterile` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `nom`, `espece`, `race`, `age`, `poids`, `taille`, `image`, `description`, `couleur`, `adopted`, `adoptionDate`, `sexe`, `sterile`) VALUES
(1, 'Cookie', 'Chiens', 'Welsh Corgi Pembroke', 23, 10, 28, 'https://media.os.fressnapf.com/cms/2020/07/ratgeber_hund_rasse_portraits_welsh-corgi-pembroke_1200x527.jpg', 'Cookie aime la nature.', 'Roux et blanc.', 0, NULL, 1, 0),
(2, 'Edgard', 'Oiseaux', 'Youyou du sénégal', 20, 120, 30, 'https://www.woopets.fr/assets/races/000/420/big-portrait/youyou-du-senegal.jpg', 'Edgard aime s\'amuser.', 'Gris, vert et jaune.', 0, NULL, 0, 0),
(4, 'Felix', 'Chats', 'Sphynx', 35, 35.3, 40.5, 'https://jardinage.lemonde.fr/images/dossiers/2017-07/sphynx-1-131510.jpg', 'Felix est peureux.', 'Rose et gris', 0, NULL, 0, 0),
(5, 'Jane', 'Poissons', 'Scalaire', 53, 10, 20, 'https://lemagdesanimaux.ouest-france.fr/images/dossiers/2019-08/scalaire-2-093615.jpg', 'Jane aime nager.', 'blanc, jaune et noire.', 0, NULL, 1, 0),
(6, 'Coco', 'Oiseaux', 'Youyou du sénégal', 36, 36.2, 30, 'https://i.pinimg.com/236x/97/d9/b7/97d9b712d741439524357f2504d8333a--colorful-birds-exotic-birds.jpg', 'Coco aime manger des graines.', 'Gris, jaune, vert.', 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id`, `pseudo`, `titre`, `date`, `message`) VALUES
(1, 'admin', 'Test.', '2021-06-29 14:43:54', 'Test du blog avec un message.'),
(2, 'bob', 'Un message de bob!', '2021-06-29 14:43:54', 'Bonjour! Je suis bob un utilisateur régulier.');

-- --------------------------------------------------------

--
-- Structure de la table `dons`
--

DROP TABLE IF EXISTS `dons`;
CREATE TABLE IF NOT EXISTS `dons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `montant` float UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

--
-- Déchargement des données de la table `dons`
--

INSERT INTO `dons` (`id`, `pseudo`, `montant`, `date`) VALUES
(1, 'bob', 10.5, '2021-06-29 13:04:00'),
(2, 'bob', 5, '2021-06-29 13:04:37'),
(3, 'admin', 16.3, '2021-06-29 13:05:46');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cible` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `type`, `cible`, `description`, `image`, `prix`) VALUES
(1, 'Edgard cooper', 'Alimentation', 'Chiens', 'Croquettes pour chien à l\'Agneau - 100% Viande.', 'https://static.kleps.com/3561-thickbox_default/croquettes-agneau-adulte.jpg', 10.5),
(2, 'Os pour chien en caoutchouc SPOT®', 'Jouet', 'Chiens', 'Spécialement conçu pour les chiens qui aiment jouer dur, ce jouet flottant est fait de caoutchouc ultra résistant, pratiquement indestructible.', 'https://cdn.shopify.com/s/files/1/2018/3907/products/Jouet_chien_garantie_1_800x.jpg?v=1499041989', 15.95),
(3, 'Nature Mix Mélange de graines', 'Alimentation', 'Oiseaux', 'Mélange de graine', 'https://www.cdiscount.com/pdt2/3/8/3/1/700x700/auc3281011002383/rw/nature-mix-melange-de-graines-pour-oiseau-de-la.jpg', 18.21),
(4, 'Jouet laser interactif pour chat', 'Jouet', 'Chats', 'Le jouet laser interactif pour chat (Bolt Frolicat) PetSafeest est un jouet qui vous promet des heures d\'amusement, à vous et à votre chat.', 'https://ezoo-shop.com/wp-content/uploads/2019/05/pty17-14245-Jouet-laser-interactif-pour-chat-Bolt-Frolicat-PetSafe-4.jpg', 49),
(5, 'Jouet pour oiseau avec pièces de bois et cordes', 'Jouet', 'Oiseaux', 'Jouet en bois avec cordes.', 'https://static.zoomalia.com/prod_img/22194/lm_129d1f491a404d6854880943e5c3cd9ca251403170608.jpg', 5.99);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mail`, `password`, `admin`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', 1),
(2, 'bob', 'bob@mail.com', '1234', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
