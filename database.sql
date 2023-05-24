-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 mai 2023 à 22:23
-- Version du serveur : 8.0.32
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voting_lbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `candidate_id` int NOT NULL AUTO_INCREMENT,
  `election_id` int DEFAULT NULL,
  `candidate_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`candidate_id`),
  KEY `election_id` (`election_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `election_id`, `candidate_name`, `photo`) VALUES
(1, 3, 'sami', NULL),
(2, 3, 'sami', NULL),
(3, 3, 'sami', NULL),
(4, 3, 'sami', NULL),
(5, 3, 'sami', NULL),
(6, 3, 'sami', NULL),
(7, 3, 'soufiane', NULL),
(8, 2, 'basma', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `elections`
--

DROP TABLE IF EXISTS `elections`;
CREATE TABLE IF NOT EXISTS `elections` (
  `election_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  PRIMARY KEY (`election_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `elections`
--

INSERT INTO `elections` (`election_id`, `title`, `description`, `startDate`, `endDate`) VALUES
(2, 'election 2', 'description', '2023-05-28', '2023-05-24'),
(3, 'election 3', 'test Election 3', '2023-05-26', '2023-05-23');

-- --------------------------------------------------------

--
-- Structure de la table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `program_id` int NOT NULL AUTO_INCREMENT,
  `candidate_id` int NOT NULL,
  `program_title` varchar(255) NOT NULL,
  `program_description` varchar(255) NOT NULL,
  `program_video` varchar(255) NOT NULL,
  `program_affiche` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`program_id`),
  KEY `candidate_id` (`candidate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `programs`
--

INSERT INTO `programs` (`program_id`, `candidate_id`, `program_title`, `program_description`, `program_video`, `program_affiche`) VALUES
(1, 5, 'ahssan program', 'description hrbana', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'affiche mzyana'),
(3, 7, 'program d cardio hhh', 'description A', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'affiche A'),
(4, 8, 'title basma', 'basma description', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'basma affiche');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password_user`, `is_admin`, `is_verified`, `activation_code`) VALUES
(1, 'sami', 'Sami.AGOURRAM@um6p.ma', '$2y$10$9z8iURv0hcVtaGBkJx0K7O5sXyXbSjkkoZFspntd9oCwlbOvQdN2i', 1, 1, '428b1bba9e9bc911d1899d5442238fe2'),
(2, 'samosh', 'sami@um6p.ma', '$2y$10$YEj08AJKqp9K35UXGKe72OXsCouOhaYIfsanpRduTp5eNM4hkb7Ne', 1, 1, 'f0b73e060035e72c835bf6f06a6e35b3');

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `vote_id` int NOT NULL AUTO_INCREMENT,
  `election_id` int NOT NULL,
  `user_id` int NOT NULL,
  `vote` varchar(255) NOT NULL,
  `vote_timestamp` date NOT NULL,
  PRIMARY KEY (`vote_id`),
  KEY `election_id` (`election_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`vote_id`, `election_id`, `user_id`, `vote`, `vote_timestamp`) VALUES
(1, 3, 2, '5', '2023-05-24'),
(2, 3, 2, '7', '2023-05-25');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`election_id`) REFERENCES `elections` (`election_id`);

--
-- Contraintes pour la table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`);

--
-- Contraintes pour la table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`election_id`) REFERENCES `elections` (`election_id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
