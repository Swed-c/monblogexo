-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 28 oct. 2022 à 12:37
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mister_cocktail2`
--

-- --------------------------------------------------------

--
-- Structure de la table `cocktails`
--

CREATE TABLE `cocktails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_family` int(11) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cocktails`
--

INSERT INTO `cocktails` (`id`, `name`, `id_family`, `description`, `image`, `price`, `year`, `active`) VALUES
(1, 'Aperol Spritz', 1, 'Le Spritz est un cocktail datant du siècle dernier. Il aurait été inventé par des soldats autrichiens qui trouvaient le vin italien trop chargé en alcool.<br><br>L’auriez-vous deviné ?', 'aperol-spritz.jpg', 9.75, 1938, 1),
(2, 'Mojito', 2, 'La création du Mojito remonte au XVIe siècle lorsque Francis Draque, le célèbre corsaire anglais, avait pour habitude de célébrer ses pillages en sirotant à La Havane, du tafia (l’ancêtre du rhum), aromatisé de quelques feuilles de menthe et de citron.', 'mojito.jpg', 10, 1583, 1),
(3, 'Piña Colada', 2, 'Le cocktail Piña Colada puise ses origines à Puerto Rico où il a été inventé par un barman de l’hôtel Caribe Hilton en 1954. Décrétée 30 ans plus tard boisson nationale, cet élixir doux et fruité concentre dans le verre toutes les saveurs ensoleillées des Caraïbes.', 'pina-colada.jpg', 8.85, 1954, 1),
(4, 'Punch Planteur ', 2, 'Historiquement, le punch date du XVIe siècle. Il aurait été créé par des marins britanniques en mélangeant du Tafia (un genre de rhum brut) qui était embarqué sur les navires, avec d’autres ingrédients.', 'punch.jpg', 9.99, 1532, 1),
(5, 'Punch Exotique', 2, 'Historiquement, le punch date du XVIe siècle. Il aurait été créé par des marins britanniques en mélangeant du Tafia (un genre de rhum brut) qui était embarqué sur les navires, avec d’autres ingrédients.', 'punch-exotique.jpg', 10.55, 1532, 1),
(6, 'Soupe de Champagne', 3, 'À l’origine, c’était Pierre «Dom» Pérignon (1635-1713) qui dirigeait un monastère à Reims et qui a marqué l’histoire du champagne tout en contribuant beaucoup à sa renommée.', 'soupe-champagne.jpg', 12.36, 1622, 1),
(16, 'Tropical2', 2, 'Lorem ipsum 3', 'cocktail-tropical-kamasutra.jpg', 19.99, 1750, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cocktails_ingredients`
--

CREATE TABLE `cocktails_ingredients` (
  `id_cocktail` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cocktails_ingredients`
--

INSERT INTO `cocktails_ingredients` (`id_cocktail`, `id_ingredient`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(1, 3),
(4, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(1, 5),
(1, 6),
(2, 6),
(3, 6),
(2, 7),
(3, 7),
(3, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12);

-- --------------------------------------------------------

--
-- Structure de la table `families`
--

CREATE TABLE `families` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `families`
--

INSERT INTO `families` (`id`, `name`) VALUES
(1, 'Aperol'),
(2, 'Rhum'),
(3, 'Champagne'),
(4, 'Whisky'),
(7, 'Tequila'),
(8, 'Vodka'),
(9, 'Vin'),
(10, 'Bière');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`) VALUES
(1, 'Menthe'),
(2, 'Rhum'),
(3, 'Citron vert'),
(4, 'Sucre de canne'),
(5, 'Eau gazeuse'),
(6, 'Glaçons'),
(7, 'Lait de coco'),
(8, 'Jus d\'ananas'),
(9, 'Jus de mangue'),
(10, 'Jus d\'orange'),
(11, 'Jus de goyave'),
(12, 'Cannelle'),
(14, 'Gingembre');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cocktails`
--
ALTER TABLE `cocktails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_family` (`id_family`);

--
-- Index pour la table `cocktails_ingredients`
--
ALTER TABLE `cocktails_ingredients`
  ADD PRIMARY KEY (`id_cocktail`,`id_ingredient`),
  ADD KEY `id_cocktail` (`id_cocktail`,`id_ingredient`),
  ADD KEY `id_ingredient` (`id_ingredient`);

--
-- Index pour la table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cocktails`
--
ALTER TABLE `cocktails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `families`
--
ALTER TABLE `families`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cocktails`
--
ALTER TABLE `cocktails`
  ADD CONSTRAINT `cocktails_ibfk_1` FOREIGN KEY (`id_family`) REFERENCES `families` (`id`);

--
-- Contraintes pour la table `cocktails_ingredients`
--
ALTER TABLE `cocktails_ingredients`
  ADD CONSTRAINT `cocktails_ingredients_ibfk_1` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cocktails_ingredients_ibfk_2` FOREIGN KEY (`id_cocktail`) REFERENCES `cocktails` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
