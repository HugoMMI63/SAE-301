-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 déc. 2024 à 00:01
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
(1, 'Delosque', 'Julien', 35, '0674125498', 'Voici Julien, directeur passionné de la Ka’fête ô mômes, amateur de balades poétiques, qu\'il fait souvent au lever ou au coucher du soleil, chaussé de ses chaussettes fantaisistes. Grand fan de kouign-amann et de desserts sucrés, il pourrait organiser un stage sur les plaisirs bretons. En revanche, il déteste les cintres, ennemis des placards, et le sifflement de la cocotte-minute le dimanche matin, qu\'il considère comme une offense à la tranquillité.', 'https://www.zupimages.net/up/24/51/yn1d.png'),
(2, 'Lamour', 'Coralie', 32, '0645369874', 'Voici Coralie, la créative et rêveuse de la Ka’fête ô mômes, passionnée par les images sous toutes leurs formes : photos, films, dessins, qu’elle crée ou admire. L\'odeur de la crème solaire la plonge instantanément en été, et elle trouve une beauté infinie dans les petits riens. Artiste dans l’âme, elle écrit, chante, danse et ne résiste jamais à une bonne playlist. Toutefois, les conflits, les injustices et les papillons de nuit, qu\'elle déteste, lui donnent des frissons. En résumé, Coralie est un rayon de soleil qui illumine tout, sauf quand un papillon de nuit s\'invite.', 'https://www.zupimages.net/up/24/51/tra0.png'),
(3, 'Béland', 'Caroline', 40, '0626541489', 'Voici Caroline, la magicienne culturelle de la Ka’fête ô mômes. Pour la rendre heureuse, il suffit d’un thé chaud, un bon livre et un fauteuil moelleux, avec un plaid en hiver pour la perfection. Attention toutefois, ne la réveillez pas avec une sonnerie stridente et ne lui mentez pas, c’est son allergie personnelle. Entre deux tasses de thé, elle prépare chaque mois une expo surprise, rédige la gazette hebdomadaire adorée de tous, et imagine les sorties culturelles en famille. Bref, Caroline est toujours prête pour la créativité et la culture, tant qu’elle évite la sonnerie du matin.', 'https://www.zupimages.net/up/24/51/ubrm.png'),
(4, 'Desforges', 'Antoine', 20, '0641248756', 'Voici Antoine, l’esprit joueur et épicurien de la Ka’fête ô mômes. Fan de mots, il les manie avec aisance, mais évite les ballons de foot. Il adore courir, surtout si un bon repas l’attend à l’arrivée. Côté cuisine, il goûte à tout, sauf les endives, qu’il considère comme une trahison. Il préfère croiser des araignées dans un poème que dans un coin de pièce. Entre un jeu de société et un plat bien garni, Antoine est toujours prêt à partager un bon moment !', 'https://www.zupimages.net/up/24/51/fktr.png'),
(5, 'Dupont', 'Lucien', 24, '0673465882', 'Voici Lucien, cinéphile éclectique et aventurier urbain, souvent à marcher trop loin et finir avec des douleurs aux pieds. Il apprécie autant les explosions des blockbusters que les films d’auteur profonds. Côté musique, il hésite entre le rap marseillais et les rimes des rappeurs parisiens. Ancien aspirant super-héros, il a échangé sa cape contre des baskets pour explorer le monde, mais son âme de héros reste prête à sauver la journée, ou à trouver un bon film à regarder.', 'https://www.zupimages.net/up/24/51/szi5.png'),
(6, 'Bruty', 'Natalie', 23, '0634276726', 'Voici Natalie, 23 ans, une touche-à-tout à la Ka’fête ô mômes, passionnée par les couchers de soleil, les piles de livres qu’elle promet de lire, et les conversations inattendues. Elle adore les playlists décalées, où un classique de la chanson française rencontre un tube électro improbable. Toutefois, elle n’aime pas les chaussettes dépareillées (bien qu\'elle en porte parfois), déteste les spoilers de séries et trouve le bruit des mouches insupportable. Avec son enthousiasme et sa soif de découvertes, Natalie transforme chaque journée en aventure, même si elle lutte encore contre ses chaussettes !', 'https://www.zupimages.net/up/24/51/kkb2.png');

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
(4, 4),
(5, 5),
(5, 6),
(6, 5),
(6, 6);

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
(1, 'https://www.zupimages.net/up/24/51/od2a.jpg', 'Théâtre d\'improvisation', 'Du 21 au 25 octobre 2024', '09:00:00', '16:00:00', 'Plonge dans l’univers captivant du théâtre improvisé cet automne et libère ta créativité sur scène. Découvre des jeux scéniques drôles, dynamiques et pleins de surprises durant ce stage unique !', 30, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 1),
(2, 'https://www.zupimages.net/up/24/51/4l41.png', 'Street-Art avec les Toki', 'Du 17 au 18 avril 2024', '09:00:00', '17:00:00', 'Rejoins les Toki pour les vacances hautes en couleurs ! Initie-toi au street art et exprime ta créativité sur les grands murs de la Ka’fête lors d’un stage original et dynamique !\n', 50, 'Grande Ka’fête (53 montée de la Grande Côte)', 30, 150, 1),
(3, 'https://www.zupimages.net/up/24/51/zsi6.png', 'Histoires végétales', 'Du 22 au 26 avril 2024', '10:00:00', '18:00:00', 'Pendant les vacances de printemps, embarquez pour un voyage au cœur du monde végétal ! Découvre l’univers fascinant des plantes et crée des histoires uniques autour de la nature !\n', 45, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 2),
(4, 'https://www.zupimages.net/up/24/51/h4zo.png', 'Cuisine', 'Du 8 au 12 juillet 2024', '13:00:00', '18:00:00', 'La Ka’fête ô mômes ouvre ses portes aux gourmands ! Cet été, mets la main à la pâte et explore l’art de la cuisine dans un stage gourmand et plein de saveurs !\n', 25, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 2),
(5, 'https://www.zupimages.net/up/24/51/qwd4.jpg', 'Découverte de la sérigraphie', 'Du 28 au 29 juillet 2025', '13:00:00', '18:00:00', 'Découvre l’art fascinant de la sérigraphie cet automne et crée des œuvres uniques avec tes propres mains ! Laisse libre cours à ton imagination lors de ce stage créatif !\r\n\r\n', 20, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 2),
(6, 'https://www.zupimages.net/up/24/51/ualo.jpg', 'Fabrication d\'un livre', 'Du 1 au 20 février 2025', '14:00:00', '17:30:00', 'Cet hiver, plonge dans l’univers magique du livre artisanal ! Passe de la création des pages à la reliure, apprends toutes les étapes pour fabriquer ton propre ouvrage. En collaboration avec les séniors !\r\n\r\n', 30, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
