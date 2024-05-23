-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 22 oct. 2023 à 18:25
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae_203_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chapo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `date_derniere_mise_a_jour` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `lien_yt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `auteur_id`, `titre`, `chapo`, `contenu`, `image`, `date_creation`, `date_derniere_mise_a_jour`, `lien_yt`) VALUES
(3, 2, 'L\'IUT de Cergy Pontoise', 'L&rsquo;Institut universitaire de technologie de Cergy-Pontoise (IUT) est une composante de CY Cergy Paris Universit&eacute; dans le Val-d\'Oise.', 'Il propose des formations professionnelles en trois ans accessibles apr&egrave;s le baccalaur&eacute;at, les B.U.T. (bachelor universitaire de technologie) et des formations en un an accessibles apr&egrave;s un bac+2, les licences professionnelles.\r\n\r\nCes formations sont dispens&eacute;es dans les domaines des technologies industrielles et tertiaires (industrie, commerce, services).', 'https://www.directetudiant.com/uploads/userfiles/1/393600_320632594630334_279510485409212_1339398_1079956800_n.jpg', '2022-06-13 07:44:30', '2022-06-13 07:44:30', '');

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lien_twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lien_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `lien_twitter`, `lien_avatar`) VALUES
(1, 'Souidi', 'Ehssan', 'https://twitter.com/UniversiteCergy', 'http://ayoub-jaber.alwaysdata.net/wp-content/uploads/2023/10/Ehssan.png'),
(2, 'Loti', 'Didier', 'https://twitter.com/UniversiteCergy', 'http://ayoub-jaber.alwaysdata.net/wp-content/uploads/2023/10/Didier.png'),
(3, 'Idbouiguiguane', 'Hamza', 'https://twitter.com/UniversiteCergy', 'http://ayoub-jaber.alwaysdata.net/wp-content/uploads/2023/10/Hamza.png'),
(4, 'Jaber', 'Ayoub', 'https://twitter.com/UniversiteCergy', 'http://ayoub-jaber.alwaysdata.net/wp-content/uploads/2023/10/Ayoub.png');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `nom`, `prenom`, `email`, `contenu`, `type`, `date_creation`) VALUES
(52, 'Dupond', 'Charlie', 'charliedupond@gmail.com', 'Bonjour,\r\n\r\npuis-je savoir quelles poursuites d&#039;&eacute;tudes sont possibles apr&egrave;s cette formation ?\r\nMerci d&#039;avance,', 'etudiant', '2022-06-08 08:03:54');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E6660BB6FE6` (`auteur_id`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6660BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
