-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 déc. 2024 à 08:38
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
(1, 'Delosque', 'Julien', 35, '0674125498', 'Voici Julien, directeur enthousiaste (et légèrement gourmand) de la Ka’fête ô mômes. Amoureux des balades poétiques, on peut le croiser au lever du jour ou à la tombée de la nuit, contemplant l’eau d’un air songeur, probablement avec des chaussettes fantaisistes aux pieds, oui, celles avec des licornes ou des avocats dansants, c’est son truc. Grand adepte du kouign-amann et de tout ce qui est gras et sucré, il pourrait sans doute organiser un stage intitulé “Les desserts bretons, un art de vivre”.\nCôté détestations ? Julien mène une guerre froide contre les cintres, ce fléau silencieux des placards, et le sifflement strident de la cocotte-minute le dimanche matin, qui, selon lui, est une offense à la tranquillité.\n', 'https://www.kafeteomomes.fr/uploads/2023/09/Julien-1-525x560.jpg'),
(2, 'Lamour', 'Coralie', 28, '0645369874', 'Voici Coralie, la créative et rêveuse de la Ka’fête ô mômes. Elle vit pour les images, sous toutes leurs formes : photos, films, dessins… qu’elle admire ou crée avec passion. L’odeur de la crème solaire la transporte instantanément en été, et elle trouve une beauté infinie dans les petits riens du quotidien. Coralie, c’est aussi une âme d’artiste qui écrit des histoires, chante, danse, et ne résiste jamais à une bonne playlist !\nMais attention, tout n’est pas rose : les conflits et les injustices lui donnent des frissons (et pas des bons). Quant aux papillons de nuit, ils sont ses ennemis jurés, juste après les dents qui bougent et l’anis, qu’elle bannirait volontiers de la planète. En résumé, Coralie est un rayon de soleil (avec une pointe de crème solaire) qui illumine tout ce qu’elle touche… sauf si un papillon de nuit s’en mêle !\n', 'https://www.kafeteomomes.fr/uploads/2023/09/Mathina-525x560.jpg'),
(3, 'Béland', 'Caroline', 40, '0626541489', 'Voici Caroline, la magicienne culturelle de la Ka’fête ô mômes. Si vous cherchez à la rendre heureuse, c’est simple : un thé bien chaud, un bon livre et un fauteuil moelleux suffisent à combler son cœur. Ajoutez un plaid si c’est l’hiver, et vous avez atteint la perfection.\nMais attention, ne tentez pas de la réveiller avec une sonnerie stridente ou, pire encore, de lui mentir c’est son allergie personnelle. Entre deux tasses de thé, Caroline est celle qui prépare chaque mois une nouvelle expo surprenante et rédige la fameuse gazette hebdomadaire, que tout le monde adore lire. Les sorties familiales au théâtre ? Les partenariats culturels ? Oui, c’est aussi son idée ! Bref, quand il s’agit de créativité et de culture, Caroline est toujours sur le pont (tant qu’elle peut éviter la sonnerie du matin).\n', 'https://www.kafeteomomes.fr/uploads/2023/09/Caroline-525x560.jpg'),
(4, 'Desforges', 'Antoine', 20, '0641248756', 'Voici Antoine, l’esprit joueur et l’estomac bien affûté de la Ka’fête ô mômes. Fanatique des mots sous toutes leurs formes, il jongle avec eux comme d’autres jonglent avec des ballons (mais attention, pas de ballon de foot, merci bien). Par contre, courir, ça, il adore surtout s’il y a un bon repas qui l’attend à l’arrivée.\nCôté cuisine, il est prêt à tout goûter… sauf les endives, qu’il considère comme une trahison végétale. Quant aux araignées, disons qu’il préfère les croiser dans un poème plutôt que dans un coin de pièce. Entre un jeu de société et une assiette bien garnie, Antoine est toujours partant pour partager un bon moment !\n', 'https://www.kafeteomomes.fr/uploads/2023/09/Aur%C3%A9lien-525x560.jpg'),
(5, 'Dupont', 'Lucien', 24, '0673465882', 'Voici Lucien, un cinéphile éclectique et un aventurier urbain à ses heures perdues (souvent en train de marcher trop loin et de finir avec un bon mal aux pieds). Il est autant fasciné par les explosions des blockbusters qui ne se prennent pas au sérieux que par les subtilités des films d’auteur qui font cogiter. Côté musique, il hésite entre les mélodies accrocheuses du rap marseillais et les rimes affûtées des rappeurs parisiens.\r\nLucien, c’est aussi celui qui, pendant longtemps, a nourri secrètement l’ambition de devenir super-héros avant de se résigner à l’idée que ce n’était pas une carrière très stable (vers ses 23 ans, à peu près). Depuis, il a troqué la cape contre des baskets pour explorer le monde… mais son âme de héros est toujours là, prête à sauver la journée, ou au moins à trouver un bon film à regarder !\r\n', 'https://www.kafeteomomes.fr/uploads/2024/11/Lucien-525x560.jpg'),
(6, 'Bruty', 'Natalie', 23, '0634276726', 'Voici Natalie, 23 ans, un esprit curieux et une vraie touche-à-tout à la Ka’fête ô mômes. Elle adore les couleurs éclatantes des couchers de soleil, les piles de livres qui s’entassent joyeusement sur son bureau (qu’elle promet toujours de lire « bientôt »), et les frissons de l’inattendu, comme se perdre dans une conversation passionnée ou dans les rues d’un endroit inconnu. Natali, c’est aussi une grande fan des playlists un peu décalées, où un classique de la chanson française côtoie un tube électro improbable.\nMais elle a aussi ses petites aversions : les chaussettes dépareillées l’agacent (même si elle finit souvent par en porter), les spoilers de séries lui donnent envie de fuir, et le bruit des mouches l’exaspère. Avec son enthousiasme contagieux et sa soif de découvertes, Natali transforme chaque journée en aventure même si elle n’a pas encore réussi à dompter ses chaussettes !\n', 'https://www.kafeteomomes.fr/uploads/2023/09/Am%C3%A9lie-525x560.jpg');

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
(1, 'https://www.kafeteomomes.fr/uploads/2021/01/radio2-690x506.jpg', 'Théâtre d\'improvisation', 'Du 21 au 25 octobre 2024', '09:00:00', '16:00:00', 'Plonge dans l’univers captivant du théâtre improvisé cet automne et libère ta créativité sur scène. Découvre des jeux scéniques drôles, dynamiques et pleins de surprises durant ce stage unique !', 30, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 1),
(2, 'https://www.kafeteomomes.fr/uploads/2023/02/WhatsApp-Image-2022-11-03-at-10.59.16-690x506.jpeg', 'Street-Art avec les Toki', 'Du 17 au 18 avril 2024', '09:00:00', '17:00:00', 'Rejoins les Toki pour les vacances hautes en couleurs ! Initie-toi au street art et exprime ta créativité sur les grands murs de la Ka’fête lors d’un stage original et dynamique !\n', 50, 'Grande Ka’fête (53 montée de la Grande Côte)', 30, 150, 1),
(3, 'https://www.kafeteomomes.fr/uploads/2024/05/P1130209-690x506.jpg', 'Histoires végétales', 'Du 22 au 26 avril 2024', '10:00:00', '18:00:00', 'Pendant les vacances de printemps, embarquez pour un voyage au cœur du monde végétal ! Découvre l’univers fascinant des plantes et crée des histoires uniques autour de la nature !\n', 45, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 2),
(4, 'https://www.kafeteomomes.fr/uploads/2022/11/WhatsApp-Image-2022-11-04-at-10.34.24-690x506.jpeg', 'Cuisine', 'Du 8 au 12 juillet 2024', '13:00:00', '18:00:00', 'La Ka’fête ô mômes ouvre ses portes aux gourmands ! Cet été, mets la main à la pâte et explore l’art de la cuisine dans un stage gourmand et plein de saveurs !\n', 25, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 2),
(5, 'https://www.kafeteomomes.fr/uploads/2022/11/WhatsApp-Image-2022-11-04-at-10.34.24-690x506.jpeg', 'Découverte de la sérigraphie', 'Du 28 au 29 juillet 2025', '13:00:00', '18:00:00', 'Découvre l’art fascinant de la sérigraphie cet automne et crée des œuvres uniques avec tes propres mains ! Laisse libre cours à ton imagination lors de ce stage créatif !\r\n\r\n', 20, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 2),
(6, 'https://www.kafeteomomes.fr/uploads/2022/11/WhatsApp-Image-2022-11-04-at-10.34.24-690x506.jpeg', 'Fabrication d\'un livre', 'Du 1 au 20 février 2025', '14:00:00', '17:30:00', 'Cet hiver, plonge dans l’univers magique du livre artisanal ! Passe de la création des pages à la reliure, apprends toutes les étapes pour fabriquer ton propre ouvrage. En collaboration avec les séniors !\r\n\r\n', 30, 'Grande Ka’fête (53 montée de la Grande Côte)', 50, 250, 1);

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
