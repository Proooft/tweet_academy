-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 10 juil. 2019 à 07:47
-- Version du serveur :  10.2.22-MariaDB
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tweet_academie`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_com` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `contenu_com` text NOT NULL,
  `date_com` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_personne`
--

CREATE TABLE `fiche_personne` (
  `id_profil` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prénom` text NOT NULL,
  `sexe` text NOT NULL,
  `date_de_naissance` date NOT NULL,
  `pays` text NOT NULL,
  `adresse_mail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `follower`
--

CREATE TABLE `follower` (
  `id_profil` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `following`
--

CREATE TABLE `following` (
  `id_profil` int(11) NOT NULL,
  `id_following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hashtag`
--

CREATE TABLE `hashtag` (
  `id_hash` int(11) NOT NULL,
  `nom_hash` text NOT NULL,
  `id_profil` int(11) NOT NULL,
  `date_publication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_profil` int(11) NOT NULL,
  `password` text NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `historique` text NOT NULL,
  `avatar` blob NOT NULL,
  `phrase_humeur` text NOT NULL,
  `compteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_tweet` int(11) NOT NULL,
  `id_hash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

CREATE TABLE `tweet` (
  `id_tweet` int(11) NOT NULL,
  `tweet_text` text NOT NULL,
  `photo` blob NOT NULL,
  `id_profil` int(11) NOT NULL,
  `date_publication` date NOT NULL,
  `compteur_rt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_profil` (`id_profil`),
  ADD KEY `id_tweet` (`id_tweet`);

--
-- Index pour la table `fiche_personne`
--
ALTER TABLE `fiche_personne`
  ADD KEY `id_profil` (`id_profil`);

--
-- Index pour la table `follower`
--
ALTER TABLE `follower`
  ADD KEY `id_profil` (`id_profil`);

--
-- Index pour la table `following`
--
ALTER TABLE `following`
  ADD KEY `id_profil` (`id_profil`);

--
-- Index pour la table `hashtag`
--
ALTER TABLE `hashtag`
  ADD PRIMARY KEY (`id_hash`),
  ADD KEY `id_profil` (`id_profil`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD KEY `id_profil` (`id_profil`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_tweet`),
  ADD KEY `id_hash` (`id_hash`);

--
-- Index pour la table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id_tweet`),
  ADD KEY `id_profil` (`id_profil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
