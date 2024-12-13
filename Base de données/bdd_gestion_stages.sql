-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 déc. 2024 à 10:16
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_gestion_stages`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `login` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`login`, `mdp`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `animateur`
--

CREATE TABLE `animateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `animateur`
--

INSERT INTO `animateur` (`id`, `nom`, `prenom`, `age`, `telephone`, `description`, `photo`) VALUES
(1, 'Bourassa', 'Julien', 35, '0674125498', 'Il aime se promener au bord ou sur l’eau au lever du jour ou à la tombée de nuit, les chaussettes fantaisistes, le kouign-amann et tout ce qui est gras et sucré en général. Il n’aime pas le sifflement de la cocotte-minute le dimanche matin, les cintres, les gens qui veulent imposer leur unique vision du monde.', 'https://www.kafeteomomes.fr/uploads/2023/09/Julien-1-525x560.jpg'),
(2, 'Lamour', 'Mathina', 25, '0645369874', 'Elle aime le Japon, tous les chiens (sauf les lévriers), voyager, faire le tour des friperies, passer des heures sur un grand puzzle, boire du thé, le caramel beurre salé et la cannelle. Elle déteste devoir faire un choix sans avoir réfléchi à toutes les possibilités, le moment des au revoir et les fruits de mer.', 'https://www.kafeteomomes.fr/uploads/2023/09/Mathina-525x560.jpg'),
(3, 'Béland', 'Caroline', 40, '0626541489', 'Ce qu’elle aime : 1 thé + 1 livre + 1 fauteuil… Ce qu’elle déteste : le mensonge et la sonnerie du réveil. C’est elle qui vous concocte une nouvelle expo chaque mois et la fameuse gazette hebdomadaire. Les sorties familiales au théâtre et les partenariats culturels, c’est son idée aussi !', 'https://www.kafeteomomes.fr/uploads/2023/09/Caroline-525x560.jpg'),
(4, 'Desforges', 'Aurélien', 30, '0641248756', 'Il aime la musique du monde et ses percussions, observer la nature surtout sous l’eau. Nager, danser, faire du vélo… Il n’aime pas conduire en ville, l’odeur des scooters et voir des déchets dans les espaces verts.', 'https://www.kafeteomomes.fr/uploads/2023/09/Aur%C3%A9lien-525x560.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `anime`
--

CREATE TABLE `anime` (
  `id_animateur` int(11) NOT NULL,
  `id_stage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `anime`
--

INSERT INTO `anime` (`id_animateur`, `id_stage`) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 3),
(3, 1),
(3, 3),
(3, 4),
(4, 2),
(4, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `intitule` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `intitule`) VALUES
(1, 'De 7 à 11 ans'),
(2, 'De 3 à 9 ans');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `nom_prenom_RL` text NOT NULL,
  `pb_medicaux` text DEFAULT NULL,
  `prescriptions` text DEFAULT NULL,
  `etat_paiement` tinyint(1) NOT NULL,
  `id_stage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `nom`, `prenom`, `age`, `email`, `telephone`, `nom_prenom_RL`, `pb_medicaux`, `prescriptions`, `etat_paiement`, `id_stage`) VALUES
(1, 'Dubois', 'Camille', 8, 'pierre.dubois@gmail.com', '0647598712', 'Pierre Dubois', NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `id` int(11) NOT NULL,
  `miniature` text NOT NULL,
  `titre` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `horaire_debut` time NOT NULL,
  `horaire_fin` time NOT NULL,
  `description` text NOT NULL,
  `nb_places` int(11) NOT NULL,
  `lieu` text NOT NULL,
  `tarif_min` int(11) NOT NULL,
  `tarif_max` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`id`, `miniature`, `titre`, `date`, `horaire_debut`, `horaire_fin`, `description`, `nb_places`, `lieu`, `tarif_min`, `tarif_max`, `id_categorie`) VALUES
(1, 'https://www.kafeteomomes.fr/uploads/2021/01/radio2-690x506.jpg', 'Théâtre d\'improvisation', 'Du 21 au 25 octobre 2024', '09:00:00', '16:00:00', 'Vos enfants ont envie de découvrir le théâtre, jouer la comédie, passer un moment de découverte et de convivialité pendant les vacances ? Mathina, animatrice intergénérationnelle et Marine, comédienne, leur proposent de s’initier aux bases du théâtre d’improvisation avec des jeux collectifs, des improvisations et des exercices sur la scène, qui permettront aux enfants et aux seniors de partager leur imaginaire.', 30, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 1),
(2, 'https://www.kafeteomomes.fr/uploads/2023/02/WhatsApp-Image-2022-11-03-at-10.59.16-690x506.jpeg', 'Street-Art avec les Toki', 'Du 17 au 18 avril 2024', '09:00:00', '17:00:00', 'Fan de street-art ? Envie d’en savoir plus sur cet univers ? Pendant 2 jours, les Toki sont dans la place à la Ka’fête ô mômes ! Venez découvrir leur univers, très identifiable. Deux jours pour créer ensemble de nouveaux personnages les plus drôles possible, pour ensuite les peindre ensemble en grand sur les murs de la Ka’fête !', 50, 'Grande Ka’fête (53 montée de la Grande Côte)', 30, 150, 1),
(3, 'https://www.kafeteomomes.fr/uploads/2024/05/P1130209-690x506.jpg', 'Histoires végétales', 'Du 22 au 26 avril 2024', '10:00:00', '18:00:00', 'Et si l’élaboration d’une histoire devenait l’occasion de redécouvrir la nature et de se promener dans les parcs. Accompagnés de spécialistes, enfants et seniors vont apprendre à reconnaitre les végétaux et récolter feuilles et fleurs qui serviront à colorer leur conte. Ils créeront l’histoire sous forme de Kamishibai, imaginerons les illustrations, décoreront les illustrations avec les végétaux récoltés, s’entraineront à conter l’histoire et enfin présenter leur réalisation lors d’un spectacle.', 45, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 2),
(4, 'https://www.kafeteomomes.fr/uploads/2022/11/WhatsApp-Image-2022-11-04-at-10.34.24-690x506.jpeg', 'Cuisine', 'Du 8 au 12 juillet 2024', '13:00:00', '18:00:00', 'AVIS AUX GOURMANDES ET GOURMANDS ! La Ka’fête ô mômes organise un stage où enfants et seniors vont pouvoir se mettre dans la peau de chefs étoilés et cuisiner de bons petits plats ! Partage de vos recettes préférées, visite du marché, de la ferme, ou d’artisans du quartier et préparation de repas et goûters avec nos chefs cuisiniers sont au programme. De quoi s’occuper les mains, satisfaire sa curiosité, et se régaler !', 25, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `animateur`
--
ALTER TABLE `animateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id_animateur`,`id_stage`),
  ADD KEY `anime_ibfk_2` (`id_stage`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stage` (`id_stage`) USING BTREE;

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animateur`
--
ALTER TABLE `animateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `anime`
--
ALTER TABLE `anime`
  ADD CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`id_animateur`) REFERENCES `animateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anime_ibfk_2` FOREIGN KEY (`id_stage`) REFERENCES `stage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_stage`) REFERENCES `stage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
