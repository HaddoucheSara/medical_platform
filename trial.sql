-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 10 juin 2023 à 00:51
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trial`
--

-- --------------------------------------------------------

--
-- Structure de la table `dossiers_medicaux`
--

CREATE TABLE `dossiers_medicaux` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `poids` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `numero_telephone` varchar(20) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `maladies` varchar(255) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `vaccin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `dossiers_medicaux`
--

INSERT INTO `dossiers_medicaux` (`id`, `nom`, `prenom`, `date_naissance`, `poids`, `taille`, `numero_telephone`, `adresse`, `maladies`, `allergies`, `vaccin`) VALUES
(1, 'Nawal', 'Mlk', '2023-05-04', 60, 168, '0654079646', 'Boulevard mehdaoui', 'autre', 'autre', 'autre'),
(2, 'Last', 'OfLast', '2004-01-10', 54, 170, '0622955160', 'adressetrial', 'autre', 'autre', 'autre'),
(3, 'Nouveau', 'Nom', '2002-07-17', 52, 158, '0654079646', 'klezfzefz', 'autre', 'autre', 'autre'),
(4, 'Malki', '', '1999-01-10', 54, 179, '0654079646', 'aaaaa', 'autre', 'Allergies alimentaires', 'Vaccins a virus inactives'),
(5, 'Malki', '', '2004-01-10', 54, 168, '0654079646', 'aaaaa', 'Asthme', 'Allergies aux piqures ', 'autre'),
(6, 'Malki', 'Nawal', '2004-10-01', 60, 166, '0654079646', 'aaaaa', 'autre', 'autre', 'autre'),
(7, 'Hmamou', 'Soukaina', '2002-08-10', 54, 170, '0654079646', 'klezfzefz', 'autre', 'autre', 'autre'),
(8, 'Haddouche', 'Sara', '2002-11-10', 54, 168, '0654079646', 'klezfzefz', 'autre', 'autre', 'autre'),
(9, 'Haddouche', 'Sara', '2002-10-11', 54, 170, '0654079646', 'klezfzefz', 'autre', 'autre', 'autre'),
(10, 'Haddouche', 'Sara', '2002-11-10', 54, 168, '0654079646', 'klezfzefz', 'maladies cardiaques', 'Allergies aux piqures ', 'autre'),
(11, 'Haddouche', 'Sara', '2002-11-10', 60, 179, '0654079646', 'klezfzefz', 'autre', 'autre', 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `info_rendez`
--

CREATE TABLE `info_rendez` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `datee` varchar(20) NOT NULL,
  `heuree` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `info_rendez`
--

INSERT INTO `info_rendez` (`id`, `nom`, `prenom`, `email`, `telephone`, `datee`, `heuree`) VALUES
(52, 'HMAMOU', 'Soukaina', 'soukainahmamou@gmail.com', '0612345678', '2023-05-05', '12:30'),
(56, 'HADDOUCHE', 'Sara', 'sara@gmail.com', '1234567890', '2023-05-01', '11:00'),
(57, 'TAFELLAHTE', 'Salma', 'salma@gmail.com', '0987654321', '2023-05-05', '17:30'),
(58, 'MALKI', 'Nawal', 'nawal@gmail.com', '0600000000', '2023-05-01', '10:30'),
(59, 'Mlk', 'Nawal', 'malkinawal2004@gmail.com', '0654079646', '2023-05-18', '14:00'),
(60, 'Haddouche', 'Sara', 'Sarahaddouche@gmail.com', '0654079646', '2023-05-12', '08:30'),
(61, 'Amine', 'Mlk', 'aminemlktrial@gmail.com', '0622955160', '2023-05-17', '15:00'),
(62, 'Amine', 'Mlk', 'aminemlktrial@gmail.com', '0622955160', '2023-05-17', '15:00'),
(63, 'Tafelahte ', 'Salma', 'TafelahteSalma@gmail.com', '0611234567', '2023-05-08', '10:30'),
(64, '', '', '', '', '', ''),
(65, 'Saher', 'Wiam', 'SaherWiam@gmail.com', '0610203458', '2023-05-24', '11:00'),
(66, 'Saher', 'Wiam', 'SaherWiam@gmail.com', '0610203458', '2023-05-24', '11:00'),
(67, 'Nouveau', 'Nom', 'NouveauNom@gmail.com', '0654079646', '2023-05-09', '11:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `Nom`, `Prenom`, `Email`, `password`, `created_at`) VALUES
(1, '', '', '', '$2y$10$fyPXekmhIwkbNx/KSpZ06.xjC294XXYg8vo5PtUQvcA5Swhh6wHe2', '2023-05-05 14:06:04'),
(2, '', 'Nawal', '', '$2y$10$pDAjjwKOroTTwXSxqRSIYOPIt3FgvhqVuUpPF6q./JX1DJxcRBaxW', '2023-05-05 14:28:50'),
(3, '', 'Nawal', '', '$2y$10$AqxVMcBlxityU.mNTviivueYUOYvjb97TE.v2NqlNcNQO5yUvzqxu', '2023-05-05 14:32:41'),
(5, '', 'Subur', '', '$2y$10$CkHk/nFLiZChg/oSoB3u.OI/zwVexY2wUCIo6p0X0iasDqgLg34.6', '2023-05-05 14:52:30'),
(6, '', 'malki', '', '$2y$10$eRjwcHBXpocjb.X5aHbIqOEcBfqGzVqeQwbTdJdPpZt2hoxNEyWP2', '2023-05-05 15:07:24'),
(8, '', 'keep', 'nawal_trial@gmail.com', '$2y$10$SFg8vN9fVntss9PDoHYOTujPAYMn8GdFNlFh.zkI9NZtU1PVNxor6', '2023-05-05 16:42:42'),
(10, '', 'Sara', 'Sarahaddouche@gmail.com', '$2y$10$N1C0hFEJ.76m1.oL0I8ygOJ11C5Vrs1AQWk7uu.6XOVddNfexOmz2', '2023-05-05 17:27:21'),
(11, '', 'Amar', 'YoussfiAmar@gmail.com', '$2y$10$yYmjTyG6mxzYntwnbf69teCw3w9ZmN8iABSPBsnIBuDnOmI9XF4cG', '2023-05-05 18:08:56'),
(12, '', 'Maalki', 'AmiineMaalki@gmail.com', '$2y$10$SHfUAwQ34ddzLBsYuZh1WeOCy44sYu6ioY36mjElEi867no4CRrV2', '2023-05-05 19:12:50'),
(13, '', 'Soukaina', 'SoukainaHmamou@gmail.com', '$2y$10$iluh/9OQZJQfLaGTMlMyV.vn3x44wzxnEV7mpcuNTOQE4HDm0Sijq', '2023-05-06 17:13:42'),
(14, '', 'OfLast', 'LastOfLast@gmail.com', '$2y$10$EMoKwWJwfJ4k7V5JszDkWOb5oY0bzQvnFaZZ0T7TVXRF/wUbYsEnK', '2023-05-06 23:45:10'),
(15, '', 'Nom', 'NouveauNom@gmail.com', '$2y$10$mtTQFknHTki1Vs5R5pwtBOolabds5l1E4ifmbniaShkxbh23u59ly', '2023-05-06 23:55:30'),
(17, 'Malki', 'Amar', 'MalkiAmar@gmail.com', '$2y$10$g8P2VkNliTNqNGiv8bLS4.pZeZok8hMx/QAq0NOUe0HxE3tJzrMAy', '2023-05-25 15:11:53');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `Nom_Prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `token` text NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `Nom_Prenom`, `email`, `password`, `ip`, `token`, `date_inscription`) VALUES
(1, 'nawal', 'malki@gmail.com', '$2y$12$8VRekz/5ffBGewE5s1lj6.xdtBnaLqjg2TZpEnQwbC7M78kr74D3G', '127.0.0.1', 'e00e700456471673a0aac1b1a733205d59d1b69947a10e5f447f9c7dd7e9fef5c49ce0a0c1020cc7cb90ef13215b53bb1a1922f55a95ad6a5e3dc96e3a082765', '2023-04-18 10:53:45'),
(2, 'soukaina', 'hmamousoukaina@gmail.com', '$2y$12$CsRJTaVMqc20hOo9fTAOYe0CSMVN2RozvGzeFi3qEPv6HylaCuA2K', '127.0.0.1', '2991621b0ccc85dae4fa2430e4484f1357e42e7a3345fc553363c701870ef74c6f06ec828951f45fb0be6642e81222e8e443ab680b0fc02777c301c9352eb853', '2023-04-18 10:56:34'),
(3, 'haddouche sara', 'sara@gmail.com', '$2y$12$1FufZGirKVIbk5a7l6okDee7IDUBPZ.zKSIfNjsFNK4cx7TNdVvwK', '127.0.0.1', '0e9434a5a76b38eccd2a889efc6f5a8659992e3d60417c47e36c79d27aae942eceb57425b21d3f36d9f428642c3c086950987d60252ed274543e4654f460d1c6', '2023-04-18 11:19:45'),
(4, 'taffelaht salma', 'salma@gmail.com', '$2y$12$In9QnZK51aHXXZUxc0Js0epIzJZWXAAGg5KDOC4qrxtbZhUotoUrC', '127.0.0.1', '070cabeeed2567240e462684109850a731292ba82236f32432bd88cce04cfa004756f94c2955a80296a6628a37d9f81f401bc1102071750b0623a1190a189faf', '2023-04-18 11:31:59'),
(5, 'ahmed jabri', 'ahmedjabri@gmail.com', '$2y$12$XzNjQlASkaRYMDk1hDeNeOg3RSUW6RwW.LxMXb.Zr1bDtxEpfJ8RC', '127.0.0.1', '4a8cd9ed79020b7380c18c6be1e36ed90966e1fef52ddc3d882bf1c09c7b687284694bb1577d975733d7088ce01982cc7dd0425dfff62cd398f2ff2efbeaae19', '2023-04-18 11:44:35'),
(12, 'Soukaina Hmamou', 'soukainahmamou@gmail.com', '$2y$12$i5NP3a./Gqf9AJOPmCwyQuhfk9h79fdNx5vpQNTE/SzjMhNKJFsIK', '::1', '39715323bfe71dcf611bbfde49586e330868519eb22efbac1547c46b294732340d761107f5bc4400aef19d3b1866a89da44af722124b974ac18d3a3982b9e54e', '2023-05-06 23:02:53');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dossiers_medicaux`
--
ALTER TABLE `dossiers_medicaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `info_rendez`
--
ALTER TABLE `info_rendez`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dossiers_medicaux`
--
ALTER TABLE `dossiers_medicaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `info_rendez`
--
ALTER TABLE `info_rendez`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
