-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 jan. 2019 à 12:34
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aerongoa`
--

-- --------------------------------------------------------

--
-- Structure de la table `aerogeest_user`
--

DROP TABLE IF EXISTS `aerogeest_user`;
CREATE TABLE IF NOT EXISTS `aerogeest_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3E8BA25392FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_3E8BA253A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_3E8BA253C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `aerogeest_user`
--

INSERT INTO `aerogeest_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'admin@aadmin.com', 'admin@aadmin.com', 1, 'pdIrGNQmRe9hUE6LAwxPTiUE7DpduX2.xEgrfLzKjeY', '6AWS5HCkI5U4ICD55/3w5oRV3RCPHWzK20tnvIAHI8o+rfbbMraqbo/y+tkY/CAdyBj+Oys+HcPQyhCpAuO9ug==', '2019-01-16 11:33:47', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_avion`
--

DROP TABLE IF EXISTS `aerogest_avion`;
CREATE TABLE IF NOT EXISTS `aerogest_avion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compagnie_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modele` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbrPlaces` smallint(6) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isVisible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DF686AEE52FBE437` (`compagnie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `aerogest_avion`
--

INSERT INTO `aerogest_avion` (`id`, `compagnie_id`, `code`, `libelle`, `modele`, `nbrPlaces`, `createdAt`, `updatedAt`, `etat`, `statut`, `isVisible`) VALUES
(1, 1, 'code', 'libellé', 'américain', 200, '2019-01-16 10:45:10', '2019-01-16 10:45:10', 'Neuf', 'Disponible', 1);

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_compagnie`
--

DROP TABLE IF EXISTS `aerogest_compagnie`;
CREATE TABLE IF NOT EXISTS `aerogest_compagnie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `isVisible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `aerogest_compagnie`
--

INSERT INTO `aerogest_compagnie` (`id`, `code`, `libelle`, `type`, `description`, `ville`, `statut`, `createdAt`, `updatedAt`, `isVisible`) VALUES
(1, 'code', 'CAMAIRCO', 'International', 'Je m\'en fou', 'Bafoussam', 'Disponible', '2014-01-01 00:00:00', '2014-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_paquet`
--

DROP TABLE IF EXISTS `aerogest_paquet`;
CREATE TABLE IF NOT EXISTS `aerogest_paquet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vol_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `poids` double NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BFA5E70C9F2BFB7A` (`vol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_paquet_bagage`
--

DROP TABLE IF EXISTS `aerogest_paquet_bagage`;
CREATE TABLE IF NOT EXISTS `aerogest_paquet_bagage` (
  `id` int(11) NOT NULL,
  `passager_id` int(11) NOT NULL,
  `nature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privateNote` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6028BFF271A51189` (`passager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_paquet_colis`
--

DROP TABLE IF EXISTS `aerogest_paquet_colis`;
CREATE TABLE IF NOT EXISTS `aerogest_paquet_colis` (
  `id` int(11) NOT NULL,
  `expediteur_id` int(11) NOT NULL,
  `destinataire_id` int(11) NOT NULL,
  `villeExpedition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `villeDestination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fraisEnvoi` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_94B2B8CB10335F61` (`expediteur_id`),
  KEY `IDX_94B2B8CBA4F84F6E` (`destinataire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_passager`
--

DROP TABLE IF EXISTS `aerogest_passager`;
CREATE TABLE IF NOT EXISTS `aerogest_passager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vol_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2609C4AA9F2BFB7A` (`vol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_passager_client`
--

DROP TABLE IF EXISTS `aerogest_passager_client`;
CREATE TABLE IF NOT EXISTS `aerogest_passager_client` (
  `id` int(11) NOT NULL,
  `bagages_id` int(11) NOT NULL,
  `passport` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billetAvion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DF9CA1C72EC613A0` (`bagages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_passager_personnel`
--

DROP TABLE IF EXISTS `aerogest_passager_personnel`;
CREATE TABLE IF NOT EXISTS `aerogest_passager_personnel` (
  `id` int(11) NOT NULL,
  `compagnie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3538D1252FBE437` (`compagnie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_site`
--

DROP TABLE IF EXISTS `aerogest_site`;
CREATE TABLE IF NOT EXISTS `aerogest_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `aerogest_site`
--

INSERT INTO `aerogest_site` (`id`, `code`, `ville`, `statut`, `createdAt`, `updatedAt`, `description`, `type`) VALUES
(1, 'DEST0012890', 'Bafoussam', 'Disponible', '2014-01-01 00:00:00', '2014-01-01 00:00:00', 'La Blague', 'destination');

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_site_destination`
--

DROP TABLE IF EXISTS `aerogest_site_destination`;
CREATE TABLE IF NOT EXISTS `aerogest_site_destination` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `aerogest_site_destination`
--

INSERT INTO `aerogest_site_destination` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_site_escale`
--

DROP TABLE IF EXISTS `aerogest_site_escale`;
CREATE TABLE IF NOT EXISTS `aerogest_site_escale` (
  `id` int(11) NOT NULL,
  `vol_id` int(11) NOT NULL,
  `dateEscale` datetime NOT NULL,
  `motif` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateDepart` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A670E54B9F2BFB7A` (`vol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_tier`
--

DROP TABLE IF EXISTS `aerogest_tier`;
CREATE TABLE IF NOT EXISTS `aerogest_tier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_tier_destinataire`
--

DROP TABLE IF EXISTS `aerogest_tier_destinataire`;
CREATE TABLE IF NOT EXISTS `aerogest_tier_destinataire` (
  `id` int(11) NOT NULL,
  `dateRetrait` datetime NOT NULL,
  `validerReciever` tinyint(1) NOT NULL,
  `passwordRetrait` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_tier_expediteur`
--

DROP TABLE IF EXISTS `aerogest_tier_expediteur`;
CREATE TABLE IF NOT EXISTS `aerogest_tier_expediteur` (
  `id` int(11) NOT NULL,
  `nationalite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `validerEnvoi` tinyint(1) NOT NULL,
  `passwordSender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aerogest_vol`
--

DROP TABLE IF EXISTS `aerogest_vol`;
CREATE TABLE IF NOT EXISTS `aerogest_vol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_id` int(11) NOT NULL,
  `avion_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7FF0652F816C6140` (`destination_id`),
  KEY `IDX_7FF0652F80BBB841` (`avion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `aerogest_avion`
--
ALTER TABLE `aerogest_avion`
  ADD CONSTRAINT `FK_DF686AEE52FBE437` FOREIGN KEY (`compagnie_id`) REFERENCES `aerogest_compagnie` (`id`);

--
-- Contraintes pour la table `aerogest_paquet`
--
ALTER TABLE `aerogest_paquet`
  ADD CONSTRAINT `FK_BFA5E70C9F2BFB7A` FOREIGN KEY (`vol_id`) REFERENCES `aerogest_vol` (`id`);

--
-- Contraintes pour la table `aerogest_paquet_bagage`
--
ALTER TABLE `aerogest_paquet_bagage`
  ADD CONSTRAINT `FK_6028BFF271A51189` FOREIGN KEY (`passager_id`) REFERENCES `aerogest_passager_client` (`id`),
  ADD CONSTRAINT `FK_6028BFF2BF396750` FOREIGN KEY (`id`) REFERENCES `aerogest_paquet` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aerogest_paquet_colis`
--
ALTER TABLE `aerogest_paquet_colis`
  ADD CONSTRAINT `FK_94B2B8CB10335F61` FOREIGN KEY (`expediteur_id`) REFERENCES `aerogest_tier_destinataire` (`id`),
  ADD CONSTRAINT `FK_94B2B8CBA4F84F6E` FOREIGN KEY (`destinataire_id`) REFERENCES `aerogest_tier_expediteur` (`id`),
  ADD CONSTRAINT `FK_94B2B8CBBF396750` FOREIGN KEY (`id`) REFERENCES `aerogest_paquet` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aerogest_passager`
--
ALTER TABLE `aerogest_passager`
  ADD CONSTRAINT `FK_2609C4AA9F2BFB7A` FOREIGN KEY (`vol_id`) REFERENCES `aerogest_vol` (`id`);

--
-- Contraintes pour la table `aerogest_passager_client`
--
ALTER TABLE `aerogest_passager_client`
  ADD CONSTRAINT `FK_DF9CA1C72EC613A0` FOREIGN KEY (`bagages_id`) REFERENCES `aerogest_paquet_bagage` (`id`),
  ADD CONSTRAINT `FK_DF9CA1C7BF396750` FOREIGN KEY (`id`) REFERENCES `aerogest_passager` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aerogest_passager_personnel`
--
ALTER TABLE `aerogest_passager_personnel`
  ADD CONSTRAINT `FK_3538D1252FBE437` FOREIGN KEY (`compagnie_id`) REFERENCES `aerogest_compagnie` (`id`),
  ADD CONSTRAINT `FK_3538D12BF396750` FOREIGN KEY (`id`) REFERENCES `aerogest_passager` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aerogest_site_destination`
--
ALTER TABLE `aerogest_site_destination`
  ADD CONSTRAINT `FK_A03072EBBF396750` FOREIGN KEY (`id`) REFERENCES `aerogest_site` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aerogest_site_escale`
--
ALTER TABLE `aerogest_site_escale`
  ADD CONSTRAINT `FK_A670E54B9F2BFB7A` FOREIGN KEY (`vol_id`) REFERENCES `aerogest_vol` (`id`),
  ADD CONSTRAINT `FK_A670E54BBF396750` FOREIGN KEY (`id`) REFERENCES `aerogest_site` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aerogest_tier_destinataire`
--
ALTER TABLE `aerogest_tier_destinataire`
  ADD CONSTRAINT `FK_2198D698BF396750` FOREIGN KEY (`id`) REFERENCES `aerogest_tier` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aerogest_tier_expediteur`
--
ALTER TABLE `aerogest_tier_expediteur`
  ADD CONSTRAINT `FK_B36D59BFBF396750` FOREIGN KEY (`id`) REFERENCES `aerogest_tier` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aerogest_vol`
--
ALTER TABLE `aerogest_vol`
  ADD CONSTRAINT `FK_7FF0652F80BBB841` FOREIGN KEY (`avion_id`) REFERENCES `aerogest_avion` (`id`),
  ADD CONSTRAINT `FK_7FF0652F816C6140` FOREIGN KEY (`destination_id`) REFERENCES `aerogest_site_destination` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
