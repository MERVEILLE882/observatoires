-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 juil. 2024 à 11:40
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
-- Base de données : `observatoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Administrateur'),
(2, 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `message`, `created_at`) VALUES
(1, 'NOUGA ANGE', 'angemfangnia@gmail.com', 'merci pour ce que vous faites pour la promotion de l\'education', '2024-06-08 09:02:37'),
(2, 'marie', 'angenouga9@gmail.com', 'merci encore\r\n', '2024-06-08 09:14:04'),
(3, 'marie', 'mariechepig@gmail.com', 'merci', '2024-06-08 09:15:41'),
(4, 'marie', 'mariechepig@gmail.com', 'nn', '2024-06-08 09:17:15'),
(5, 'marie', 'mariechepig@gmail.com', 'huile', '2024-06-08 09:29:11'),
(6, 'marie', 'mariechepig@gmail.com', 'juile', '2024-06-08 09:33:17'),
(7, 'marie', 'mariechepig@gmail.com', 'bonjour', '2024-06-08 09:48:04'),
(8, 'marie', 'mariechepig@gmail.com', 'merci', '2024-06-08 09:52:34'),
(9, 'marie', 'mariechepig@gmail.com', 'lop', '2024-06-08 09:53:08'),
(10, 'marie', 'mariechepig@gmail.com', 'loo', '2024-06-17 12:15:20'),
(11, 'NOUGA ANGE', 'angemfangnia@gmail.com', 'm,', '2024-06-17 12:15:35'),
(12, 'ange', 'angemfangnia@gmail.com', 'merci', '2024-06-24 17:13:34'),
(13, 'ange', 'angemfangnia@gmail.com', 'kilo', '2024-06-24 17:16:30'),
(14, 'ange', 'angemfangnia@gmail.com', 'lop', '2024-06-24 17:18:05'),
(15, 'ange', 'angemfangnia@gmail.com', 'lop', '2024-06-24 17:19:03'),
(16, 'ange', 'angemfangnia@gmail.com', 'mm', '2024-06-24 17:19:13'),
(17, 'ange', 'angemfangnia@gmail.com', 'lop', '2024-06-24 17:24:05'),
(18, 'ange', 'angemfangnia@gmail.com', 'lop', '2024-06-24 17:25:14'),
(19, 'Ange', 'angemfangnia@gmail.com', 'Merci pour tous', '2024-06-26 11:26:39'),
(20, 'guembou', 'mariechepig@gmail.com', 'merci', '2024-07-05 04:37:02'),
(21, 'Malla', 'anayellemobou@gmail.com', 'J\'aime votre plateforme c\'est vraiment intuitive ????????????', '2024-07-06 13:53:11');

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

CREATE TABLE `continent` (
  `id_continent` int(11) NOT NULL,
  `nom_continent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `continent`
--

INSERT INTO `continent` (`id_continent`, `nom_continent`) VALUES
(1, 'Afrique'),
(2, 'Amérique du Nord'),
(3, 'Amérique du Sud'),
(4, 'Asie'),
(5, 'Europe'),
(6, 'Océanie');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `texte_message` varchar(1000) DEFAULT NULL,
  `date_message` date DEFAULT NULL,
  `heure_message` time NOT NULL,
  `idutil` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `texte_message`, `date_message`, `heure_message`, `idutil`, `parent_id`, `deleted`) VALUES
(78, '???????????????????? tu as volé mon identité pourquoi Salo toi aussi ', '2024-07-08', '17:11:28', 16, 77, 0),
(79, 'bonjour', '2024-07-08', '18:08:28', 16, NULL, 1),
(80, 'ange', '2024-07-08', '18:10:29', 16, NULL, 1),
(81, 'allao', '2024-07-08', '18:10:39', 16, 80, 0),
(82, 'allo', '2024-07-08', '18:12:14', 16, NULL, 1),
(83, 'bye', '2024-07-08', '18:12:45', 4, 82, 0),
(84, 'lo', '2024-07-08', '18:20:12', 1, NULL, 0),
(85, 'allo', '2024-07-08', '18:24:52', 1, NULL, 0),
(86, 'merci', '2024-07-08', '18:25:21', 4, NULL, 0),
(87, 'Bye bye', '2024-07-08', '18:25:45', 16, NULL, 0),
(88, 'Toi là vraiment ', '2024-07-08', '18:30:57', 16, 87, 0),
(89, 'Ok', '2024-07-08', '19:28:48', 16, 88, 1),
(90, 'Tes pieds bombés ', '2024-07-08', '19:29:03', 16, 89, 0),
(91, 'merci', '2024-07-09', '15:06:10', 1, NULL, 0),
(92, 'hello', '2024-07-09', '15:09:00', 1, NULL, 0),
(93, 'ok', '2024-07-09', '16:05:24', 4, 86, 0),
(94, 'lope', '2024-07-09', '18:06:52', 4, NULL, 0),
(95, 'hello', '2024-07-09', '18:10:41', 18, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `organisationetatique`
--

CREATE TABLE `organisationetatique` (
  `id_organisation` int(11) NOT NULL,
  `nom_organisation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `organisationetatique`
--

INSERT INTO `organisationetatique` (`id_organisation`, `nom_organisation`) VALUES
(1, 'CEEAC'),
(2, 'CEDEAO'),
(3, 'MAGHREB'),
(4, 'Union Européenne'),
(5, 'Union Africaine');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(11) NOT NULL,
  `nom_pays` varchar(255) NOT NULL,
  `id_continent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `nom_pays`, `id_continent`) VALUES
(1, 'Cameroun', 1),
(2, 'Nigeria', 1),
(3, 'Algérie', 1),
(4, 'Togo', 1),
(5, 'Niger', 1),
(6, 'Namibie', 1),
(7, 'Maroc', 1),
(8, 'États-Unis', 2),
(9, 'Canada', 2),
(10, 'Australie', 5),
(11, 'Chine', 4),
(12, 'Japon', 4),
(13, 'Inde', 4),
(14, 'Brésil', 3),
(15, 'Russie', 5),
(16, 'South africa', 1);

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `idP` int(11) NOT NULL,
  `titreP` varchar(400) DEFAULT NULL,
  `dateP` datetime DEFAULT NULL,
  `document` varchar(250) DEFAULT NULL,
  `contenuP` varchar(2000) DEFAULT NULL,
  `auteurP` varchar(30) DEFAULT NULL,
  `idU_Utilisateur` int(11) DEFAULT NULL,
  `type_document` varchar(50) DEFAULT NULL,
  `image_descriptive` varchar(400) DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `id_pays` int(11) DEFAULT NULL,
  `id_organisation` int(11) DEFAULT NULL,
  `id_continent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`idP`, `titreP`, `dateP`, `document`, `contenuP`, `auteurP`, `idU_Utilisateur`, `type_document`, `image_descriptive`, `valide`, `id_pays`, `id_organisation`, `id_continent`) VALUES
(109, 'Arrêté du 15 mars 2024 modifiant l\'arrêté du 21 octobre 2015', '2024-07-05 03:13:44', '../documents/Arrêté du 15 mars 2024 modifiant l\'arrêté du 21 octobre 2015.pdf', 'Article 1 :\r\nL\'arrêté du 21 octobre 2015 est modifié comme suit :\r\n\r\nArticle 2 :\r\nDans l\'article 3, le deuxième alinéa est remplacé par les dispositions suivantes :\r\n\"Les conditions d\'application de cet arrêté sont précisées par des directives complémentaires établies par le ministère compétent.\"\r\n\r\nArticle 3 :\r\nL\'article 5 est complété par un nouvel alinéa rédigé comme suit :\r\n\"Un rapport annuel sur la mise en œuvre des dispositions de cet arrêté sera présenté au conseil des ministres.\"\r\n\r\nArticle 4 :\r\nDans l\'article 7, les mots \"à compter de la publication du présent arrêté\" sont remplacés par \"à compter du 1er janvier 2025\".\r\n\r\nArticle 5 :\r\nLe présent arrêté sera publié au Journal officiel de la République et entrera en vigueur le lendemain de sa publication.', 'Anayelle', 1, 'arrete', '../documents/Arrêté du 15 mars 2024 modifiant l\'arrêté du 21 octobre 2015.PNG', 1, 1, 1, 1),
(111, 'Arrêté du 22 janvier 2024 modifiant l\'arrêté du 21 novembre 2018', '2024-07-05 03:40:14', '../documents/Arrêté du 22 janvier 2024 modifiant l\'arrêté du 21 novembre 2018.pdf', 'L\'arrêté du 22 janvier 2024, qui modifie celui du 21 novembre 2018, apporte des ajustements significatifs aux dispositions antérieures concernant [précisez le sujet ou le domaine concerné]. Ces modifications visent à améliorer [mentionnez les objectifs principaux de la modification, comme la sécurité, l\'efficacité, la conformité aux nouvelles normes, etc.]. En révisant les articles pertinents, cet arrêté cherche à répondre aux besoins actuels et aux évolutions récentes dans [domaine spécifique]. Les ajustements introduits reflètent une volonté de [mentionnez les motivations sous-jacentes, telles que l\'harmonisation, l\'optimisation des processus, la prise en compte de nouvelles technologies, etc.], tout en assurant la continuité et la cohérence avec les objectifs initiaux établis en 2018.', 'ange', 1, 'arrete', '../documents/Arrêté du 22 janvier 2024 modifiant l’arrêté du 21 novembre 2018.PNG', 1, 1, 1, 1),
(112, 'Bulletin officiel n° 27 du 4 Juillet 2024', '2024-07-05 03:43:03', '../documents/Bulletin officiel n° 27 du 4 Juillet 2024.pdf', 'Commission d\'enrichissement de la langue française\r\nVocabulaire de la santé et de la médecine (liste de termes, expressions et définitions\r\nadoptés)\r\nNOR : CTNR2415496K\r\nListe - JO du 19-6-2024\r\nMinistère de la Culture\r\nI. Termes et définitions\r\nbesoin impérieux\r\nDomaine : Santé et médecine.\r\nDéfinition : Besoin pressant de consommer une substance dont on est dépendant.\r\nÉquivalent étranger : craving.\r\ndéconditionnement émotionnel par les mouvements oculaires\r\nAbréviation : Demo.\r\nDomaine : Santé et médecine/Psychothérapie.\r\nDéfinition : Psychothérapie utilisant les mouvements des yeux comme stimulation sensorielle pour obtenir la disparition de\r\ntout ou partie des symptômes d’un patient liés à des évènements traumatiques de son passé.\r\nÉquivalent étranger : eye movement desensitization and reprocessing (EMDR).\r\nespace de confiance\r\nDomaine : Sciences humaines-Santé et médecine.\r\nDéfinition : Lieu dans lequel des personnes qui se sentent vulnérables, marginalisées, ou qui sont victimes d’agressions, sont\r\naccueillies, protégées, et peuvent s’exprimer sans crainte.\r\nÉquivalent étranger : safe place, safe space.\r\névaluation immunologique\r\nDomaine : Santé et médecine.\r\nDéfinition : Procédure de mise au point d’un vaccin qui est fondée sur l’évaluation de la production d’anticorps.\r\nÉquivalent étranger : immunobridging.\r\nnanoanticorps, n.m.\r\nDomaine : Santé et médecine-Biologie.\r\nDéfinition : Fragment d’anticorps obtenu par génie génétique, qui est capable de reconnaître spécifiquement un antigène.\r\nNote :\r\n1. Les nanoanticorps sont plus faciles à produire que les anticorps naturels.\r\n2. Certains nanoanticorps sont des médicaments.\r\n3. On trouve aussi le terme « nanocorps ».\r\nÉquivalent étranger : nanobody, single-domain antibody (SdAb).\r\nprospective sanitaire\r\nForme développée : surveillance prospective sanitaire.\r\nDomaine : Santé et médecine.\r\nDéfinition : Système qui est mis en place par une organisation appartenant au domaine de la santé pour repérer des\r\névènements', 'ange', 1, 'rapport', '../documents/Bulletin officiel n° 27 du 4 Juillet 2024.PNG', 1, 1, 1, 1),
(113, 'Bulletin officiel n° 23 du 6 juin 2024', '2024-07-05 03:46:27', '../documents/Bulletin officiel n° 23 du 6 juin 2024.pdf', 'Commission d’enrichissement de la langue française\r\nVocabulaire de l’environnement\r\nNOR : CTNR2412078K\r\nListe - JO du 5-5-2024\r\nMinistère de la Culture\r\nI. Termes et définitions\r\nappui aux énergies intermittentes\r\nDomaine : Énergie/Environnement.\r\nDéfinition : Recours à des sources de production d’électricité modulables pour pallier l’intermittence des énergies\r\nrenouvelables.\r\nNote : Les sources de production modulables sont principalement des centrales à énergie fossile, des centrales nucléaires et\r\ndes barrages hydroélectriques.\r\nÉquivalent étranger : back-up.\r\nconnectivité écologique\r\nDomaine : Environnement/Biologie.\r\nDéfinition : Propriété des écosystèmes d’un territoire donné d’être reliés entre eux de sorte que soient assurés le\r\ndéplacement des espèces qui y vivent et le brassage génétique nécessaires à la préservation de la biodiversité.\r\nNote : Si la connectivité écologique est insuffisante, la restauration ou la création de corridors biologiques peut la restituer.\r\nVoir aussi : biodiversité, corridor biologique, écosystème.\r\nÉquivalent étranger : ecological connectivity.\r\ndescente d’eaux de surface\r\nDomaine : Environnement/Sciences de la Terre/Océanographie.\r\nDéfinition : Phénomène qui se caractérise par un courant descendant d’eaux marines dû à l’action des vents ainsi qu’à des\r\ndifférences de masse volumique entre ces eaux et les eaux profondes, résultant elles-mêmes de différences de température\r\net de salinité.\r\nNote : La descente d’eaux de surface peut provoquer des modifications de la distribution de la flore et de la faune marines.\r\nVoir aussi : remontée d’eaux profondes.\r\nÉquivalent étranger : downwelling.\r\nemballement thermique\r\nDomaine : Environnement/Météorologie.\r\nDéfinition : Phénomène météorologique temporaire qui consiste en une hausse brutale de la température accompagnée de\r\nsoudaines et violentes rafales de vent et d’une baisse marquée de l’humidité.\r\nNote : L’emballement thermique, qui ne dure que quelques heures, ne doit pas être conf', 'Ange', 15, 'rapport', '../documents/Bulletin officiel n° 23 du 6 juin 2024.PNG', 1, 1, 1, 1),
(114, 'Bulletin officiel n° 9 du 29 février 2024', '2024-07-05 05:38:10', '../documents/Bulletin officiel n° 9 du 29 février 2024.pdf', 'Le \"Bulletin officiel n° 9 du 29 février 2024\" est un exemple de document administratif qui relève généralement de la catégorie des publications officielles. Ces documents sont publiés régulièrement par les administrations publiques pour diffuser des informations légales, réglementaires, administratives, ou encore des décisions officielles. Ils peuvent contenir des annonces, des décrets, des circulaires, des arrêtés, des avis, des lois, des règlements, et d\'autres types de textes à caractère officiel.', 'ange', 15, 'regulation', '../documents/Bulletin officiel n° 9 du 29 février 2024.PNG', 1, 1, 1, 1),
(119, 'Arrêté n° 2024', '2024-07-05 19:12:56', '../documents/Arrêté n° 2024.pdf', 'Arrêté n° 2024_ \r\nMesures de police administrative générale pour répondre aux troubles à \r\nl’ordre public de l’éducation publique\r\nLe Maire de Pantin, \r\nVu la Déclaration universelle des droits de l’Homme de 1948, et notamment son article 26 \r\nqui énonce que toute personne a droit à l’éducation,\r\nVu la Convention internationale relative aux droits de l’enfant de 1989, et notamment ses \r\narticles 28 et 29 qui garantissent l’accès à l’enseignement secondaire et supérieur basé sur le \r\nmérite,\r\nVu la Convention sur l’élimination de toutes les formes de discrimination à l’égard des \r\nfemmes de 1979, et notamment son article 10 qui garantit le droit à l’éducation pour les \r\nfemmes \r\nsur la base de l’égalité avec les hommes,\r\nVu la Convention relative aux droits des personnes handicapées de 2006, et notamment \r\nson article 24 qui garantit le droit à l’éducation inclusive pour les personnes handicapées,\r\nVu le Code général des collectivités territoriales et notamment son article L. 2212-2,\r\nVu l’arrêté du 15 mars 2024 modifiant l’arrêté du 19 mai 2015 relatif à l’organisation des \r\nenseignements dans les classes de collège,\r\nVu l’arrêt du Conseil d’État du 27 octobre 1995, Commune de Morsang-sur-Orge,\r\nConsidérant que dans l’arrêt suscité, la plus haute juridiction de l’ordre administratif a \r\nconsacré « le respect de la dignité de la personne humaine » comme « une des composantes \r\nde l’ordre public »,\r\nConsidérant la crise structurelle que vit l’Éducation nationale depuis plusieurs décennies \r\nen France, \r\nConsidérant notamment l’absence chronique et durable de moyens humains et de moyens \r\nmatériels dans l’enseignement primaire et l’enseignement secondaire, \r\nConsidérant que ce désengagement massif et prolongé de l’État via, notamment, \r\nles différentes mesures d’austérité mises en place, impacte gravement les possibilités \r\nd’émancipation et l’avenir des jeunes générations,\r\nConsidérant que comme le rappelle régulièrement l’Organisation des Nations unies pour \r\nl’éduca', 'ange', 15, 'arrete', '../documents/Arrêté n° 2024.PNG', 1, 1, 1, 1),
(120, 'decret_18_mars_2014', '2024-07-05 23:12:45', '../documents/decret_18_mars_2014.pdf', 'Texte adressé aux recteurs et rectrices d’académie ; aux vice-recteurs et à la vice-rectrice de Wallis-et-Futuna ; aux directeurs académiques\r\net directrices académiques des services de l’éducation nationale ; aux déléguées régionales académiques et délégués régionaux\r\nacadémiques de la formation professionnelle initiale et continue ; aux inspecteurs et inspectrices d’académie-inspecteurs et inspectrices\r\npédagogiques régionaux ; aux inspecteurs et inspectrices de l’éducation nationale ; aux cheffes et chefs d’établissement ; aux formateurs et\r\nformatrices académiques, aux professeures et professeurs\r\nDepuis 2017, l’engagement de tous et l’action pédagogique continue ont permis de faire progresser les élèves. Aux\r\névaluations Pisa de 2022, qui testent les élèves âgés de 15 ans, les élèves dits « à l’heure » en seconde générale et\r\ntechnologique obtiennent des résultats parmi les meilleurs des pays de l’OCDE. Cependant, le nombre d’élèves en réussite\r\ndiminue et les élèves en difficulté sont encore trop nombreux. Les 10 % des élèves français les plus faibles, issus très\r\nmajoritairement de milieux défavorisés, obtiennent un score inférieur aux élèves des autres pays dans la même situation.\r\nCette situation se traduit, de fait, par l’installation durable de la difficulté scolaire, conduisant la majorité des élèves en\r\ngrande difficulté à l’entrée en sixième à le rester jusqu’à l’entrée au lycée.\r\nCes constats, corroborés par les évaluations nationales à l’école primaire et au collège et les résultats aux épreuves\r\nterminales du diplôme national du brevet, confirment la nécessité de mieux faire réussir les collégiens, des plus fragiles aux\r\nplus avancés, en leur offrant des modalités d’enseignement plus adaptées à leurs besoins.\r\nÀ cet effet, un enseignement organisé en groupes de besoins est instauré en français et en mathématiques pour les classes\r\nde sixième et de cinquième à la rentrée 2024 et à compter de la rentrée scolaire 2025 pour les classes de quatrième et d', 'Ange', 15, 'decret', '../documents/decret_18_mars_2014.PNG', 1, 1, 1, 1),
(130, 'manuel scolaire au cameroun', '2024-07-08 15:40:25', '../documents/manuel scolaire au cameroun.pdf', '1. Préalables terminologiques, cadre réglementaire et questions de\r\ncontenus\r\nIl importe, avant de rentrer dans le vif du sujet, de définir un certain nombre de \r\ntermes, de dresser le cadre réglementaire relativement à la question des contenus de \r\nmanière à bien saisir les enjeux de la problématique ici abordée. Sur le plan de la \r\nterminologie, il s’agira tour à tour des termes contenu, manuel et compétence. \r\nSelon Legendre, en didactique générale, le contenu désigne un « ensemble de \r\nconnaissances et des habiletés composant un objet d’apprentissage » (1988 : 120). En \r\ndidactique spécifique, « ce qui est appelé contenu dans un objectif d’apprentissage, c’est \r\nun élément ou encore un sous-élément de connaissance qui est objet d’étude pour un \r\ngroupe donné d’élèves » (Idem). Ce contenu est décrit dans un programme que le manuel \r\nse charge de matérialiser. \r\nPour Memaï et Rouag (2017), « Le manuel scolaire est un élément central dans \r\nla pratique pédagogique, il est reconnu comme l’un des facteurs les plus efficaces pour \r\naméliorer la qualité de l’enseignement, particulièrement dans les Etats où le système \r\néducatif manque de moyens ». Legendre le définit comme « tout ouvrage imprimé, \r\ndestiné à l’élève, auquel peuvent se rattacher certains documents audio-visuels et \r\nd’autres moyens pédagogiques, et traitant de l’ensemble ou des éléments importants \r\nd’un programme d’études pour une ou plusieurs années » (1988 : 356). \r\nOutil pédagogique fondamental, le manuel n’est pas un simple support de \r\ntransmission des connaissances. Son pouvoir va bien plus loin dans la mesure où par son \r\ncontenu il participe non seulement à l’instruction mais également à l’éducation « par la \r\ntransmission, de manière plus ou moins explicite, de modèles de comportement sociaux, \r\nde normes et de valeurs. » (Unesco, 2008, 14).', 'Anayelle', 16, 'rapport', '../documents/manuel scolaire au cameroun.PNG', 1, 1, 1, 1),
(134, 'Appel doffre N° 003 du 18 janvier 2024', '2024-07-09 14:34:43', '../documents/Appel doffre N° 003 du 18 janvier 2024.pdf', 'L\'appel d\'offre N° 003 du 18 janvier 2024 concerne [insérer ici le contenu spécifique de l\'appel d\'offre, tel que les détails du projet, les conditions d\'éligibilité, les dates limites, etc.].\r\n\r\n', 'Ange', 4, 'rapport', '../documents/Appel doffre N° 003 du 18 janvier 2024.PNG', 1, 1, 1, 1),
(135, 'apport de la recherche janvier 2024', '2024-07-09 14:36:39', '../documents/apport de la recherche janvier 2024.pdf', 'Ce document, réalisé par la Direction du numérique pour l’éducation/ \r\nministère de l’Éducation nationale et de la Jeunesse, propose un état des lieux \r\n(janvier 2024) sur les apports de la recherche et les lignes directrices \r\ndes institutions internationales sur l’intelligence artificielle (IA) et l’éducation : \r\ndiversité des définitions et des approches, enjeux pour les politiques \r\npubliques, enjeux éthiques, domaines d’application, pistes de travail pour \r\nformer et enseigner, perspectives avec le tournant actuel des systèmes \r\nd’IA générative et des grands modèles de langage', 'Ange', 4, 'rapport', '../documents/apport de la recherche janvier 2024.PNG', 1, 1, 1, 1),
(136, '114_Francais_GG1_AFRICA_PPOH', '2024-07-09 14:38:15', '../documents/114_Francais_GG1_AFRICA_PPOH.pdf', 'Concours genre 2024 Contribution GIZ PPOH CAMEROUN\r\n1) Promotion de l’égalité genre \r\nL’égalité des sexes est considérée dans le renforcement de capacités des acteurs des zones \r\nrurales à travers l’ensemble des interventions du PPOH dans le secteur du domaine du One \r\nhealth\r\nObjectif : \r\nLes interventions du programme PPOH contribue à l’égalité du genre en particulier à travers \r\nle renforcement de capacités des femmes qui sont en général en minorité par rapport à la \r\ngente masculine, dans le domaine de l’éducation et de la prise de décision au niveau local de \r\nla région de l’Adamaoua.\r\nL’objectif principal de la célébration de la journée mondiale de la femme rurale dans la région \r\nde l’Adamaoua à travers l’accompagnement du programme PPOH a été de sensibiliser sur \r\nl’importance de leur rôle et former les femmes rurales sur la sécurité sanitaire des aliments en \r\nparticulier le lait et ses produits dérivés\r\n Résultats : \r\nLes résultats obtenus lors de cette activité sont les suivants: \r\n• Les capacités des actrices sur les bonnes pratiques d’hygiène du lait et des produits \r\ndérivés sont renforcées ;\r\n• Les techniques de traite, de manutention, de transformation et du conditionnement du \r\nlait sont améliorées ;\r\n• Les causeries éducatives sur les maladies zoonotiques en lien avec le lait ont été \r\nconduites.\r\n• Les kits d’hygiène achetés par le programme PPOH ont été distribués aux femmes \r\nrurales pour les accompagnés de manière pratique dans leur activités.', 'Ange', 4, 'rapport', '../documents/114_Francais_GG1_AFRICA_PPOH.PNG', 1, 1, 1, 1),
(137, 'Calendrier_CDP-cameroun-29 mars au 28 juin 2024', '2024-07-09 14:40:21', '../documents/Calendrier_CDP-cameroun-29 mars au 28 juin 2024.pdf', 'Le calendrier \"CDP-Cameroun-29 mars au 28 juin 2024\" indique les dates et périodes spécifiques pour un projet, événement, ou processus impliquant le Cameroun, probablement nommé CDP.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Ange', 4, 'rapport', '../documents/Calendrier_CDP-cameroun-29 mars au 28 juin 2024.PNG', 1, 1, 1, 1),
(138, 'ToR_Consultation de recherche au Cameroun (Grant-in-Aid)_IICBA', '2024-07-09 14:41:54', '../documents/ToR_Consultation de recherche au Cameroun (Grant-in-Aid)_IICBA.pdf', 'L\'Institut international de l\'UNESCO pour le renforcement des capacités en Afrique (IICBA) est \r\nun institut de catégorie I de l\'UNESCO et est basé à Addis-Abeba, en Éthiopie. L\'Institut \r\ntravaille à la réalisation des objectifs et des cibles des Objectifs de développement durable\r\n2030 en soutenant les États membres dans leurs politiques de formation des enseignants, le \r\ndéveloppement professionnel des enseignants et la capacité des institutions éducatives. \r\nL\'UNESCO-IICBA s\'est activement engagé dans des interventions de renforcement des \r\ncapacités dans les domaines de la recherche et des connaissances, de la politique et du \r\nplaidoyer, et du renforcement des capacités. L\'amélioration de l\'apprentissage essentiel des \r\nélèves, en particulier des filles, grâce à l\'autonomisation des enseignants, est l\'un des \r\nprincipaux sous-domaines d\'intervention.\r\nL\'Afrique subsaharienne est confrontée à de multiples défis caractérisés par un faible niveau \r\nd\'éducation et des taux élevés d\'enfants non scolarisés, particulièrement prononcés chez les \r\nfilles. Le rôle des enseignants est essentiel pour relever ces défis éducatifs, mais les \r\ninterventions sont souvent axées sur le maintien des filles à l\'école, plutôt que sur \r\nl\'amélioration de l\'apprentissage dans l\'éducation de base et la lutte contre l\'inégalité entre les \r\nsexes à l\'école. En fait, la région est confrontée à une grave pénurie d\'enseignants qualifiés. \r\nDans ce contexte, l\'IICBA de l\'UNESCO lance un projet ciblant six pays d\'Afrique occidentale et \r\ncentrale (Burkina Faso, Cameroun, Tchad, Mali, Mauritanie et Nigeria) afin d\'accélérer les \r\nefforts visant à atteindre les objectifs éducatifs en mettant l\'accent sur l\'égalité des sexes et \r\ndes environnements d\'apprentissage sûrs, en soutenant les institutions de formation des \r\nenseignants dans les pays.', 'Ange', 4, 'rapport', '../documents/ToR_Consultation de recherche au Cameroun (Grant-in-Aid)_IICBA.PNG', 1, 1, 1, 1),
(139, 'loi_orientation_education_ALGERIE_FR', '2024-07-09 14:48:46', '../documents/loi_orientation_education_ALGERIE_FR.pdf', 'Le Président de la République,\r\nVu la Constitution, notamment ses articles 53, 65, 119, 120 (alinéas 1 et 2), 122-16, et 126 ;\r\nVu l’ordonnance n° 66-156 du 8 juin 1966, modifiée et completée, portant code pénal ;\r\nVu l’ordonnance n° 75-58 du 26 septembre 1975, modifiée et completée, portant code civil ;\r\nVu l’ordonnance n° 76-35 du 16 avril 1976, modifiée et completée, portant organisation de \r\nl’éducation et de la formation ;\r\nVu la loi n° 85-05 du 16 février 1985, modifiée et complétée, relative à la protection et à la \r\npromotion de la santé ;\r\nVu la loi n° 90-08 du 7 avril 1990, complétée, relative à la commune ;\r\nVu la loi n° 90-09 du 7 avril 1990, complétée, relative à la wilaya ;\r\nVu la loi n° 90-21 du 15 août 1990 relative à la comptabilité publique ;\r\nVu la loi n° 91-05 du 16 janvier 1991, modifiée et complétée, portant généralisation de \r\nl’utilisation de la langue arabe, notamment son article 15 ;\r\nVu l’ordonnance n° 95-20 du 17 juillet 1995 relative à la Cour des comptes ;\r\nVu l’ordonnance n° 95-24 du 25 septembre 1995 relative à la protection du patrimoine public \r\net à la sécurité des personnes qui lui sont liées ;\r\nVu la loi n° 99-05 du 18 Dhou El Hidja 1419 correspondant au 4 avril 1999, modifiée, portant \r\nloi d’orientation sur l’enseignement supérieur ;\r\nVu la loi n° 02-09 du 25 Safar 1423 correspondant au 8 mai 2002 relative à la protection et à \r\nla promotion des personnes handicapées ;\r\nVu la loi n° 04-10 du 27 Joumada Ethania 1425 correspondant au 14 août 2004 relative à \r\nl’éducation physique et sportive ;\r\nVu l’ordonnance n° 05-07 du 18 Rajab 1426 correspondant au 23 août 2005 fixant les règles \r\ngénérales régissant l’enseignement dans les établissements privés d’éducation et \r\nd’enseignement ;', 'Anayelle', 1, 'loi', '../documents/loi_orientation_education_ALGERIE_FR.png', 1, 3, 3, 0),
(140, 'loi_n99-05_du_18_Dhou_el_hidja_orientation_enseignement_sup_ALGERIE_FR', '2024-07-09 14:50:22', '../documents/loi_n99-05_du_18_Dhou_el_hidja_orientation_enseignement_sup_ALGERIE_FR.pdf', 'loi_n99-05_du_18_Dhou_el_hidja_orientation_enseignement_sup_ALGERIE_FR', 'Anayelle', 1, 'loi', '../documents/loi_n99-05_du_18_Dhou_el_hidja_orientation_enseignement_sup_ALGERIE_FR.png', 1, 3, 3, 0),
(141, 'legislation_scolaire_algérie', '2024-07-09 14:51:50', '../documents/legislation_scolaire_algérie.pdf', 'PREAMBULE \r\nL’Algérie a, d’une manière constante depuis l’indépendance, placé l’éducation de ses enfants au centre de ses préoccupations et a \r\nconsacré une part importante de ses moyens et de sa richesse nationale au développement du secteur de l’éducation nationale considéré \r\ncomme prioritaire.\r\nAinsi, après plus de quarante ans d’efforts, à la fois intenses et soutenus, consentis par la collectivité nationale, l’école algérienne peut se \r\nprévaloir aujourd’hui d’acquis réels qui traduisent les progrès spectaculaires enregistrés dans le domaine de l’éducation.\r\nEn effet, l’Algérie a, non seulement rattrapé ses retards historiques en \r\nmatière de scolarisation hérités de la colonisation, mais elle a également pu faire face à la forte demande d’éducation qui s’est exprimée \r\ndepuis l’indépendance. \r\nEn effet, les effectifs globaux des élèves ont été multipliés par 10 depuis 1962 pour atteindre 7.700.000 élèves, ce qui signifie que le quart \r\nde la population algérienne actuelle est à l’école. L’évolution du taux \r\nde scolarisation de la tranche d’âge des six ans, qui est actuellement \r\nde 97% (alors qu’il n’était que de 43,5% en 1965), est un indice révélateur des résultats obtenus en matière de scolarisation, surtout si \r\nl’on considère, d’une part, que cette évolution a été accompagnée par \r\nun allongement de la durée de la scolarité obligatoire de 6 à 9 ans et, \r\nd’autre part, que durant la même période, le taux de croissance de la \r\npopulation algérienne dépassait les 3,2%. ', 'Ange', 1, 'article', '../documents/legislation_scolaire_algérie.png', 1, 3, 3, 0),
(142, 'Education_algeria_FR', '2024-07-09 14:52:54', '../documents/Education_algeria_FR.pdf', 'Un effort considérable est consenti pour le développement de l’éducation en Algérie, \r\nce secteur est une priorité nationale. C’est un domaine hautement stratégique qui contribue \r\nfortement à définir des valeurs telles que l’identité, la personnalité, l’unité nationale, la \r\ndiversité culturelle, les modèles de développement et l’accès à l’universalité. C’est aussi un \r\nvecteur de liberté et d’épanouissement de la ressource humaine. Pour ces raisons, le système \r\néducatif national focalise les attentes et concentre les espoirs de chacun. Par sa capacité \r\nd’orienter vers un choix de société, il suscite des intérêts fondamentaux. Tout ouverture, tout \r\nchangement doit se faire dans le respect des valeurs et des constantes nationales. \r\nLe droit à l’éducation consacré par la constitution de notre pays, matérialisé par \r\nl’accès démocratique, gratuit et obligatoire à l’instruction pour tous les enfants, par la \r\nnationalisation des contenus d’enseignement, par l’algérianisation de l’encadrement à tous les \r\nniveaux, ainsi que par l’extension continue des capacités d’accueil sont autant de réalisations \r\nà mettre à l’actif de l’Ecole Algérienne. Ce choix souverain couplé à l’évolution de la \r\ndémographie scolaire a permis au système éducatif de faire face à la forte demande \r\nd’éducation exprimée depuis l’indépendance. \r\n \r\nTout au long du processus de transformation qu’a connu et vécu notre société, le \r\nsystème éducatif s’est progressivement mis en place et s’est développé. Mais les efforts \r\nimportants consentis dans un contexte marqué, à la fois, par une explosion démographique et \r\nle choix d’un projet éducatif d’essence démocratique donc une éducation de masse, ne \r\npouvaient pas ne pas entraîner des insuffisances et des dysfonctionnements qui affectent la \r\nqualité des prestations fournies. \r\nAujourd’hui, dans la phase de mutation que nous traversons, le système éducatif est \r\ninterpellé pour améliorer ses performances et répondre aux attentes légitimes et aux b', 'Ange', 1, 'article', '../documents/Education_algeria_FR.png', 1, 3, 3, 0),
(143, 'cooperation_bilateraux_education_ALGERIE_FR', '2024-07-09 14:54:07', '../documents/cooperation_bilateraux_education_ALGERIE_FR.pdf', 'La coopération est l’un des objectifs du programme de développement reconnus par \r\nl’Algérie, afin d’appuyer et compléter les efforts déployés pour garantir la convergence des \r\npolitiques et d’expertises dans différents domaines relevant de sa compétence à l’échelle \r\ninternationale. \r\nLa coopération scientifique et technologique est l’un des créneaux s’inscrivant dans la \r\ndynamique des projets d’intérêt national qui regroupe les organismes de recherche, et les\r\nétablissements d’enseignement supérieurs, adopté par l’Algérie depuis l’indépendance ; elle \r\na pour objet la définition et la mise en œuvre d’une stratégie scientifique commune de \r\ncoopération pour développer la recherche scientifique , la formation diplômante, et \r\nl’innovation technologique. \r\nToutefois, ces dernières années ont vu une importante évolution dans ce domaine. De \r\nnouveaux accords sont établis, avec des textes juridiques adaptés, pour tenir compte des \r\ncomportements liés à la coopération.\r\nCes textes, très nombreux, ne sont actuellement pas regroupés dans un support unique et \r\nsont par conséquent difficiles à la fois à trouver, mais aussi à consulter. \r\nA cet effet, l’élaboration d’un recueil de textes regroupant les différents accords et \r\nconventions de coopération internationaux signés par l’Algérie pour la période (1962 -2016) \r\ndans le secteur de l’enseignement supérieur et la recherche, servira comme outil d’aide, \r\npratique et concret, et devrait faciliter l’accès à l\'ensemble de ces documents, pour en \r\nrendre la recherche et la consultation plus aisées.\r\n', 'Anayelle', 1, 'article', '../documents/cooperation_bilateraux_education_ALGERIE_FR.png', 1, 3, 3, 0),
(144, 'Algeria_Full-report_Fr', '2024-07-09 15:45:38', '../documents/Algeria_Full-report_Fr.pdf', 'Le droit à l’éducation est un droit pour lequel l’Algérie a déployé beaucoup d’efforts au \r\nfil des années. Le budget de l’éducation a été multiplié par dix depuis 1990 permettant \r\nune éducation gratuite à plus de 8 millions d’élèves répartis à travers prés de 23 000 \r\nétablissements scolaires pour les cycles primaire et moyen.\r\nAinsi, le taux net de scolarisation des enfants âgés de 6 ans a dépassé 98% (9 points de \r\nplus qu’en 1990), une parfaite parité de participation garçon-fille pour la tranche d’âge \r\nde 6à 16 ans et une proportion toujours croissante d’une classe d’âge qui atteint\r\nle baccalauréat puis les études supérieures.\r\nNéanmoins et malgré ces importants acquis, des défis restent à relever notamment \r\nceux liés à la violence en milieu scolaire ou encore à la déperdition scolaire. Cette \r\ndernière est devenue inquiétante à la lumière d’une tendance, en apparence croissante, \r\nliée à l’abandon de l’école par les enfants avant d’atteindre l’âge de 16 ans et plus\r\nparticulièrement les garçons.\r\nC’est dans cette optique que l’Algérie a pris part à l’initiative régionale développée par \r\nl’UNICEF afin d’identifier les profils des enfants déscolarisés en Algérie.\r\nS’appuyant sur une approche systémique et exhaustive, le présent rapport,\r\nfournit des estimations de l’ampleur du phénomène de déperdition scolaire tout en \r\nidentifiant les obstacles et goulots d’étranglement à la scolarisation. Il propose,\r\nen outre, des pistes et solutions pour l’insertion ou la réinsertion des enfants\r\ndéscolarisés dans le système éducatif.\r\nLe document présente d’importantes informations qui serviront de base de données \r\npour assurer l’équité et améliorer l’efficacité et l’efficience du système éducatif algérien \r\net permettre à chaque enfant d’acquérir une éducation de base et de qualité.\r\nLes conclusions du présent rapport nous interpellent quant à la nécessité de\r\ncoordonner nos actions et de mutualiser nos moyens pour réduire sensiblement\r\nl’ampleur du phénomène de dépe', 'Ange', 1, 'article', '../documents/Algeria_Full-report_Fr.png', 1, 3, 3, 1),
(145, '87-_Le_système_LMD_en_Algérie_fr', '2024-07-09 15:46:45', '../documents/87-_Le_système_LMD_en_Algérie_fr.pdf', 'Deux grandes réformes, depuis l’indépendance, ont marqué l’évolution de\r\nl’Université algérienne : celle de 1971 et celle de 2003.\r\nLa réforme de 1971 avait pour finalité de former le maximum de cadres «\r\nimmédiatement opérationnels, au moindre coût et répondre aux besoins exprimés »\r\npar le secteur utilisateur. Pour cela, .une refonte de l’enseignement et des diplômes\r\net une reconversion des enseignants ont été nécessaires, en prenant en compte les\r\nprofils de formation déterminés en accord avec le secteur utilisateur. La mise en\r\nplace de cette réforme a permis un accès plus grand à l’enseignement supérieur et\r\ndes réponses plus pertinentes aux besoins de la société. Depuis lors, un certain\r\nnombre de réaménagements ont amené l’université jusqu’en 2004 à des changements\r\nprovoqués par des transformations radicales du point de vue socio-économique,\r\nnotamment le passage d’une économie administrée à une économie de marché.\r\nDepuis cette date, dans le souci de s’inscrire dans les tendances générées par la\r\nmondialisation, une volonté d’harmonisation, telle qu’exprimée à Bologne avec les\r\nobjectifs affirmés « de création d’un marché commun de diplômes pour faciliter la\r\nmobilité des étudiants ainsi que la création d’un marché commun du travail, pour\r\nfaciliter la mobilité des diplômés avec la notion d’employabilité », ce qui impliquait\r\nla nécessaire pertinence des formations par rapport au marché de l’emploi. La mise\r\nen œuvre du schéma de la réforme dite LMD, impose son inscription dans un contexte\r\néconomique et social qui précise la nature des diplômes dans le cadre d’une carte\r\nuniversitaire des offres de formation. Or, entrée comme par effraction, mais présentée\r\ncomme une nécessité, la réforme des enseignements supérieurs dite réforme LMD,\r\nnavigue à vue et l’incertitude accompagne la mise en place du processus.', 'Anayelle', 1, 'article', '../documents/87-_Le_système_LMD_en_Algérie_fr.png', 1, 3, 3, 1),
(146, 'loi_relative_a_la_liberte_de_l_enseignement_superieur_ALGERIE_FR', '2024-07-09 15:48:12', '../documents/loi_relative_a_la_liberte_de_l_enseignement_superieur_ALGERIE_FR.pdf', 'DES COURS ET DES ETABLISSEMENTS LIBRES D\'ENSEIGNEMENT SUPERIEUR. \r\nArticle 1. — L\'enseignement supérieur est libre. \r\nArt. 2. — Tout Français âgé de vingt-cinq ans, n\'ayant encouru aucune des incapacités \r\nprévues par l\'article 8 de la présente loi, les associations formées légalement dans un \r\ndessein d\'enseignement supérieur, pourront ouvrir librement des cours et des établissements \r\nd\'enseignement supérieur aux seules conditions prescrites par les articles suivants. \r\nToutefois, pour l\'enseignement de la médecine et de la pharmacie, il faudra justifier, en outre, \r\ndes conditions requises pour l\'exercice des professions de médecin ou de pharmacien. \r\nLes cours isolés dont la publicité ne sera pas restreinte aux auditeurs régulièrement \r\ninscrits resteront soumis aux prescriptions des lois sur les réunions publiques. \r\nUn règlement d\'administration publique déterminera les formes et les délais des \r\ninscriptions exigées par le paragraphe précédent. \r\nArt. 3. — L\'ouverture de chaque cours devra être précédée d\'une déclaration signée par \r\nl\'auteur de ce cours. \r\nCette déclaration indiquera les noms, qualités et domicile du déclarant, le local où seront \r\nfaits les cours et l\'objet ou les divers objets de l\'enseignement qui y sera donné. \r\nElle sera remise au recteur dans les départements où est établi le chef-lieu de l\'académie, \r\net à l\'inspecteur d\'académie dans les autres départements. Il en sera donné immédiatement \r\nrécépissé. \r\nL\'ouverture du cours ne pourra avoir lieu que dix jours francs après la délivrance du \r\nrécépissé. \r\nToute modification aux points qui auront fait l\'objet de la déclaration primitive devra être \r\nportée à la connaissance des autorités désignées dans le paragraphe précédent. Il ne pourra \r\nêtre donné suite aux modifications projetées que cinq jours après la délivrance du \r\nrécépissé', 'Ange', 1, 'loi', '../documents/loi_relative_a_la_liberte_de_l_enseignement_superieur_ALGERIE_FR.png', 1, 3, 3, 0),
(147, 'principes_objectifs_education_Algeria_FR', '2024-07-09 15:49:43', '../documents/principes_objectifs_education_Algeria_FR.pdf', 'principes_objectifs_education_Algeria_FR', 'Ange', 1, 'article', '../documents/principes_objectifs_education_Algeria_FR.png', 1, 3, 3, 1),
(148, 'Système_éducatif_en_Algérie', '2024-07-09 15:50:55', '../documents/Système_éducatif_en_Algérie.pdf', 'Le système éducatif algérienassure la prise en charge de l\'instruction des\r\nAlgériens. Il est piloté par le Ministère de l\'Éducation nationale. La\r\nConstitution algérienne garantit le droit à l’enseignement pour tous .\r\nL’évolution du système éducatif algérien est passée par trois périodes\r\ndepuis 1962 : une politique de récupération du système colonial puis des\r\nréformes pour affirmer l’indépendance et confirmer le pouvoir national et\r\nenfin une politique de gestion des flux.\r\nEn Algérie, la première année de scolarité est la première année de\r\nprimaire et la septième année de secondaire. Avant 2008, l\'enseignement\r\nse composait de six années de primaire. L\'école est obligatoire à partir de\r\nsix ans. Avant six ans, les enfants peuvent être pris en charge par le\r\nsecteur pré-scolaire (crèches).\r\n', 'Ange', 1, 'article', '../documents/Système_éducatif_en_Algérie.png', 1, 3, 3, 1),
(149, 'Further education and training colleges act of 2006_South Africa_ANG', '2024-07-09 16:00:22', '../documents/Further education and training colleges act of 2006_South Africa_ANG.pdf', 'DEFINITIONS, PURPOSE AND APPLICATION OF ACT\r\n1. Definitions\r\nIn this Act, unless the context indicates otherwise -\r\n“academic board” means the body contemplated in section 11;\r\n“applicant” means a person who makes an application \r\ncontemplated in section 29;\r\n“auditor” means a person registered in terms of the Auditing \r\nProfession Act, 2005 (Act No. 26 of 2005);\r\n“Basic Conditions of Employment Act” means the Basic \r\nConditions of Employment Act, 1997 (Act No. 75 of 1997);\r\n“college” means a public or private further education and \r\ntraining institution that is established, declared or registered \r\nunder this Act, but does not include -\r\n(a) a school offering further education and training programmes \r\nunder the South African Schools Act; or\r\n(b) a college under the authority of a government department \r\nother than the Department;\r\n[Para. (b) substituted by s. 9 of Act 25/2010]\r\n“college statute” means policy, code of conduct and any other \r\nrules developed by a council in accordance with this Act;\r\n“council” means the governing structure of a public college;', 'Ange', 1, 'étude', '../documents/Further education and training colleges act of 2006_South Africa_ANG.png', 1, 16, 5, 1),
(150, 'education laws amendment act of 2007_South Africa_ANG', '2024-07-09 16:03:44', '../documents/education laws amendment act of 2007_South Africa_ANG.pdf', 'Amendment of section 11 of Act 27 of 1996\r\nAmendment of section 1 of Act 84 of 1996 as amended by \r\nsection 1 of Act 100 of 1997, section 6 of Act 48 of 1999, \r\nsection 1 of Act 50 of 2002 and section 1 of Act 24 of 2005\r\n3. Section 11 of the National Education Policy Act, 1996, is hereby \r\namended by-\r\n(a) the substitution for subsection (1) of the following \r\nsubsection:\r\n\"(1) The Minister may by regulation establish a body to be \r\nknown as the National Education and Training Council (NETC) \r\nand other bodies to advise him or her on any matter \r\ncontemplated in section 3 or any matter identified by the \r\nMinister.\"; and\r\n(b) the substitution for subsection (2) of the following \r\nsubsection:\r\n\"(2) The composition, qualifications for membership, duties, \r\npowers and functions of a body established in terms of \r\nsubsection (1), and the term of office of its members, shall \r\nbe as prescribed by regulation[: Provided that the bodies \r\nreferred to in section 5(l)(c), shall be invited to nominate \r\nrepresentatives to any such consultative body within their \r\nrespective spheres of interest].\"', 'Ange', 1, 'loi', '../documents/education laws amendment act of 2007_South Africa_ANG.png', 1, 16, 5, 1),
(153, 'education dans les pays defavorises', '2024-07-10 16:52:08', '../documents/1.pdf', 'm  ;po', 'Ange', 1, 'communique', '../documents/1.PNG', 1, 1, 1, 1),
(154, 'education dans les pays defavorises', '2024-07-15 15:00:51', '../documents/2.pdf', 'education', 'marie', 4, 'arrete', '../documents/2.PNG', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `subscribed_at`) VALUES
(1, 'angemfangnia@gmail.com', '2024-06-05 12:17:46'),
(2, 'angenouga9@gmail.com', '2024-06-05 12:17:55'),
(3, 'mariechepig@gmail.com', '2024-06-05 12:49:51'),
(4, 'anayellemobou@gmail.com', '2024-06-05 12:50:02'),
(5, 'richenellembadzo@gmail.com', '2024-06-05 12:50:27'),
(6, 'angenouga9@gmail.com', '2024-06-05 13:02:38'),
(7, 'yurikout@gmail.com', '2024-06-24 13:25:48'),
(8, 'frankyamombo01@gmail.com', '2024-07-09 16:12:24');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idU` int(11) NOT NULL,
  `nomU` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `id_Categorie` smallint(5) UNSIGNED NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idU`, `nomU`, `email`, `password`, `dateNaissance`, `id_Categorie`, `reset_token`, `reset_token_expiration`) VALUES
(1, 'nouga', 'angenouga9@gmail.com', '$2y$10$J9bMeCufsk6rqA074DLim.vuWqZXDChS2ao77spFAgeIdYMJ/m6ai', '1990-05-15', 1, '13c8a92372bd7b2cb714f466923c95e807934b6c2de44d5e576f3bc915dcb914', '2024-06-29 00:06:55'),
(4, 'ange', 'angemfangnia@gmail.com', '$2y$10$QtfNiO4Ff29jbp3deioCjOtc7eGPtcPKTgCtmnD5zDPzsVu4j4mCq', '2024-03-28', 2, 'f7a46917e5e23c507a5a5915ff6c28a275cac37e7fd34d434fc037e64cb41692', '2024-07-02 19:21:01'),
(15, 'djeff', 'djeff@gmail.com', '$2y$10$PK1cWF9qWqKNWmSQr.hCUegXmZ5qvG2RvngZy0nuA2XNyLR17Hzli', '2024-07-07', 2, '6f9063b6ca62956659150591cb80ae9b9085e0cf70ae6b836209cb662a347b7a', '2024-07-05 01:10:53'),
(16, 'Anayelle', 'anayellemobou@gmail.com', '$2y$10$L1ROY7TyCRZTmj7GLub49uPXrrbWAnzAnzL.9.ezTkbbeG2p21AI.', '2024-07-20', 1, NULL, '2024-07-08 16:09:11'),
(17, 'marie', 'mariechepig@gmail.com', '$2y$10$NfQHEow75D4FX0E8OtP13uwQC99ySN0dQSJsHdYf1H8dcmxp2VmQy', '2010-03-19', 2, NULL, '2024-07-08 14:54:17'),
(18, 'franky', 'frankyamombo01@gmail.com', '$2y$10$9jxT9apT/b3P6p8ZVHCv2.u8NAx3Pfwoh92LHIZrD2KuSdTjuvk5u', '2007-03-14', 1, NULL, '2024-07-09 16:18:05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`id_continent`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `FK_Utilisateur_id_util` (`idutil`);

--
-- Index pour la table `organisationetatique`
--
ALTER TABLE `organisationetatique`
  ADD PRIMARY KEY (`id_organisation`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`),
  ADD KEY `id_continent` (`id_continent`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `idU_Utilisateur` (`idU_Utilisateur`),
  ADD KEY `idx_titreP` (`titreP`),
  ADD KEY `FK_Publication_id_pays` (`id_pays`),
  ADD KEY `FK_Publication_id_organisation` (`id_organisation`);

--
-- Index pour la table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idU`),
  ADD KEY `FK_Utilisateur_id_Categorie` (`id_Categorie`),
  ADD KEY `idx_nomU` (`nomU`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `continent`
--
ALTER TABLE `continent`
  MODIFY `id_continent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `organisationetatique`
--
ALTER TABLE `organisationetatique`
  MODIFY `id_organisation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT pour la table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_Utilisateur_id_util` FOREIGN KEY (`idutil`) REFERENCES `utilisateur` (`idU`);

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`id_continent`) REFERENCES `continent` (`id_continent`);

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `FK_Publication_id_organisation` FOREIGN KEY (`id_organisation`) REFERENCES `organisationetatique` (`id_organisation`),
  ADD CONSTRAINT `FK_Publication_id_pays` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`),
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`idU_Utilisateur`) REFERENCES `utilisateur` (`idU`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_Utilisateur_id_Categorie` FOREIGN KEY (`id_Categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
