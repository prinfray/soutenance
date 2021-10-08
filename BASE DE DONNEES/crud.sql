-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 oct. 2021 à 11:31
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE `eleves` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`nom`, `prenom`, `email`, `id`) VALUES
('RINFRAY', 'Paul', 'paul.rinfray@gmail.com', 2),
('KISSING', 'Loic', 'loic.kissing@gmail.com', 3),
('TORTELLI', 'Sacha', 'sacha.tortelli@gmail.com', 4),
('PROCACCI', 'Adrien', 'adrien.procacci@gmail.com', 5);

-- --------------------------------------------------------

--
-- Structure de la table `eleve_matiere`
--

CREATE TABLE `eleve_matiere` (
  `id_eleve` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `eleve_matiere`
--

INSERT INTO `eleve_matiere` (`id_eleve`, `id_matiere`, `id`) VALUES
(2, 1, 1),
(5, 2, 2),
(3, 1, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `nom` varchar(255) NOT NULL,
  `catégorie` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`nom`, `catégorie`, `id`) VALUES
('francais', 'communication', 1),
('maths', 'logique', 2);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `note` varchar(255) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `eleve` varchar(255) NOT NULL,
  `prof_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`note`, `matiere`, `eleve`, `prof_id`, `id`) VALUES
('B', 'maths', 'RINFRAY Paul', 1, 9),
('A', 'maths', 'RINFRAY Paul', 1, 11),
('A', 'maths', 'KISSING Loic', 1, 12);

-- --------------------------------------------------------

--
-- Structure de la table `profs`
--

CREATE TABLE `profs` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profs`
--

INSERT INTO `profs` (`nom`, `prenom`, `email`, `mdp`, `id`) VALUES
('BROUSSET', 'remy', 'remy.brousset@gmail.com', 'rems2rems', 1),
('SALABERRIA', 'Xavier', 'xavier.salaberria@gmail.com', 'xSalaberria', 2);

-- --------------------------------------------------------

--
-- Structure de la table `prof_matiere`
--

CREATE TABLE `prof_matiere` (
  `id_matiere` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prof_matiere`
--

INSERT INTO `prof_matiere` (`id_matiere`, `id_prof`, `id`) VALUES
(1, 2, 1),
(2, 2, 2),
(2, 1, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `eleve_matiere`
--
ALTER TABLE `eleve_matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matiere` (`id_matiere`),
  ADD KEY `eleve.eleve` (`id_eleve`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prof` (`prof_id`);

--
-- Index pour la table `profs`
--
ALTER TABLE `profs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prof_matiere`
--
ALTER TABLE `prof_matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matiere.matiere` (`id_matiere`),
  ADD KEY `prof.prof` (`id_prof`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eleves`
--
ALTER TABLE `eleves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `eleve_matiere`
--
ALTER TABLE `eleve_matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `profs`
--
ALTER TABLE `profs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `prof_matiere`
--
ALTER TABLE `prof_matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eleve_matiere`
--
ALTER TABLE `eleve_matiere`
  ADD CONSTRAINT `eleve.eleve` FOREIGN KEY (`id_eleve`) REFERENCES `eleves` (`id`),
  ADD CONSTRAINT `matiere` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `prof` FOREIGN KEY (`prof_id`) REFERENCES `profs` (`id`);

--
-- Contraintes pour la table `prof_matiere`
--
ALTER TABLE `prof_matiere`
  ADD CONSTRAINT `matiere.matiere` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id`),
  ADD CONSTRAINT `prof.prof` FOREIGN KEY (`id_prof`) REFERENCES `profs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
