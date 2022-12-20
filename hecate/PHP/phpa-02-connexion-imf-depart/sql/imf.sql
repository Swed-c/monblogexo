-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 août 2022 à 11:58
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
-- Base de données : `imf`
--
CREATE DATABASE IF NOT EXISTS `imf` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `imf`;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `actor-firstname` varchar(255) NOT NULL,
  `actor-lastname` varchar(255) NOT NULL,
  `actor-birthdate` date NOT NULL,
  `photo-filename` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `firstname`, `lastname`, `actor-firstname`, `actor-lastname`, `actor-birthdate`, `photo-filename`, `description`) VALUES
(1, 'rollin@imf.com', 'rollinHandR0cks', 'Rollin', 'Hand', 'Martin', 'Landau', '1928-06-20', 'martin-landau.jpg', 'C\'est un spécialiste de la scène, qui a été acteur, magicien et maquilleur. Il met tous ces talents au service de l\'équipe. Comme Cinnamon, il quitte IMF en 1969 à propos de problèmes de salaire.'),
(2, 'willy@imf.com', 'WillyTheBodybuilder#1', 'Willy', 'Armitage', 'Peter', 'Lupus', '1932-06-17', 'peter-lupus.jpg', 'William « Willy » Armitage est un agent IMF. Il est en quelque sorte « les muscles » de l\'équipe.'),
(3, 'thegreatparis@imf.com', '$2y$10$WuiHKUqaQ3swHhc4xeZccudnLLRy5zuqm2TOTQdwO.VPuDNCz/WOC', 'Paris', 'The Great', 'Leonard', 'Nimoy', '1931-03-26', 'leonard-nimoy.jpg', 'Paris est un ancien magicien qui se faisait appeler The Great Paris. Il remplace Rollin Hand au sein de l\'équipe. Comme lui, Paris est capable de se déguiser et d\'imiter des hommes d’ethnies différentes.'),
(4, 'm.phelps@imf.com', '$2y$10$rz.DHlCV1bE9HasewHjwmeuTyOZTe8kv9bc1W2e40cpWjydZMGhai', 'Jim', 'Phelps', 'Peter', 'Graves', '1926-03-18', 'peter-graves.jpg', 'Phelps est le directeur de l\'équipe Impossible Missions Force (en), après le départ de Dan Briggs. Il participe souvent aux missions en y jouant plusieurs rôles variés. Une vingtaine d\'années plus tard, il reprend du service après la mort de son successeur Tom Copperfield1.'),
(5, 'barney@imf.com', '$2y$10$nfLBxKew1wcPLJz3QBZTi.v.pFri5Dk0ftNR9A9k7Tt.G8243XHsu', 'Barney', 'Collier', 'Greg', 'Morris', '1933-09-27', 'greg-morris.jpg', 'Barnard « Barney » Collier est un agent, spécialiste en électronique et contrefaçons. Il est très habile pour construire toutes sortes de structures. C\'est un vétéran de l\'US Navy, notamment de la sixième flotte des États-Unis. Dans son dossier IMF, il est mentionné qu\'il possède sa propre société d\'électronique.'),
(6, 'cinnamon@imf.com', '$2y$10$jug3NfnJjWJjzYKMnJaRjeEgqPf1xJ5Ei09sYNy5lgtnVFMOa03PW', 'Cinnamon', 'Carter', 'Barbara', 'Bain', '1931-09-13', 'barbara-bain.jpg', 'Cinnamon est un agent de l\'IMF, qui joue souvent la « femme fatale » ou la « fille en détresse » dans les différentes missions de l\'équipe. C\'est une ancienne mannequin qui a fait la couverture de plusieurs magazines. Elle souffre de claustrophobie, ce qui la handicape pour certaines missions.'),
(7, 'doug@imf.com', '$2y$10$Wv5km3AxIFGphm6nM9/vyeqpBeTWJZsu3ejT1ouDLSsHXzZ3uFxzC', 'Doug', 'Robert', 'Sam', 'Elliott', '1944-08-09', 'sam-elliott.jpg', NULL),
(8, 'dana@imf.com', '$2y$10$PsrsO0jnStQRrcfkODoQx.5Dj4bqc3OnCeC/Kzm.LGu7GGm5pXK4i', 'Dana', 'Lambert', 'Lesley', 'Warren', '1946-08-16', 'lesley-warren.jpg', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
