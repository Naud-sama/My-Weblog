-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 31 déc. 2017 à 17:05
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `starwars`
--

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id_membre` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `date_de_creation` datetime DEFAULT NULL,
  `date_de_modification` datetime DEFAULT NULL,
  `titre` text COLLATE utf8_bin,
  `contenu` text COLLATE utf8_bin,
  `img` varchar(250) COLLATE utf8_bin NOT NULL,
  `tags` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`id_membre`, `id_billet`, `date_de_creation`, `date_de_modification`, `titre`, `contenu`, `img`, `tags`) VALUES
(0, 17, NULL, NULL, 'Bonjour Siths', 'Ceci est du texte. Ceci est du texte. Ceci est du texte. Ceci est du texte. Ceci est du texte. Ceci est du texte. Ceci est du texte. Ceci est du texte. Ceci est du texte. Ceci est du texte. Ceci est du texte. <marquee>', 'latest.png', '#trodark #kyloleplub'),
(0, 24, '2017-12-31 00:52:37', NULL, 'LE TEST', 'ALEDALEDALEDALEDALEDALEDALEDALEDALEDALED', '', ''),
(0, 25, '2017-12-31 01:04:04', NULL, 'La force', 'ALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALEDALED', '', ''),
(0, 27, '2017-12-31 01:21:56', NULL, 'Leia ORGANA', 'La princesse Leia Organa d\'Alderaan, plus simplement appelÃ©e Princesse Leia ou bien de son vrai nom Leia Skywalker, est un personnage de fiction, femme politique sensible Ã  la Force dans l\'univers de Star Wars, nÃ©e en 19 av. BY au Centre mÃ©dical de la RÃ©publique sur Polis Massa. Elle est interprÃ©tÃ©e par Carrie Fisher dans les premiÃ¨re et troisiÃ¨me trilogies de la saga. L\'actrice qui a personnifiÃ© Leia depuis le premier film de la saga en 1977 est morte Ã  60 ans le 27 dÃ©cembre 2016.\r\n\r\nLeia est la fille du lÃ©gendaire Jedi Anakin Skywalker et de la reine PadmÃ© Amidala, sÃ©natrice de Naboo. Elle est Ã©galement la sÅ“ur jumelle du chevalier Jedi Luke Skywalker. Sa mÃ¨re meurt en leur donnant naissance tandis que son pÃ¨re bascule du cÃ´tÃ© obscur de la Force sous le nom de Dark Vador. Leia bÃ©bÃ© est alors cachÃ©e et adoptÃ©e par la reine Breha Antilles Organa et son mari, le sÃ©nateur et prince consort Bail Organa, souverains de la planÃ¨te Alderaan.\r\n\r\nLa nouvelle princesse Leia d\'Alderaan est Ã©lue Ã  l\'Ã¢ge de 18 ans, en 1 avant BY, reprÃ©sentante d\'Alderaan au SÃ©nat impÃ©rial, suivant ainsi la trace de son pÃ¨re adoptif et, sans le savoir, celle de sa mÃ¨re biologique. Tout au moins avant la dissolution du SÃ©nat impÃ©rial ordonnÃ©e par l\'empereur Palpatine, alias Dark Sidious, qui confie la gouvernance des secteurs galactiques aux gouverneurs impÃ©riaux en mandat direct au dÃ©but de l\'Ã©pisode IV, sous le gant de fer de l\'Ã‰toile de la mort pour les maintenir dans la peur. Elle est une figure importante de l\'Alliance rebelle qui dÃ©truit la premiÃ¨re puis la deuxiÃ¨me Ã‰toile de la mort. Elle dÃ©couvre enfin qu\'elle est la sÅ“ur jumelle de Luke Skywalker et vit une histoire d\'amour avec Han Solo. Trente annÃ©es plus tard, elle est la gÃ©nÃ©rale de la RÃ©sistance qui lutte contre le Premier Ordre, et la mÃ¨re de Ben Solo, l\'enfant qu\'elle a eu avec Han Solo et qui a basculÃ© du cÃ´tÃ© obscur de la Force sous le nom de Kylo Ren.\r\n\r\nCe personnage apparaÃ®t bÃ©bÃ© dans l\'Ã©pisode III lors de l\'accouchement oÃ¹ PadmÃ© Amidala rend son dernier souffle. Leia et Luke sont jouÃ©s par le mÃªme nourrisson, qui Ã©tait le fils du monteur, Roger Barton2.', '', ''),
(0, 28, '2017-12-31 01:23:15', NULL, 'Luke Skywalker', 'Luke Skywalker voit le jour sur l\'astÃ©roÃ¯de de Polis Massa, peu de temps aprÃ¨s la crÃ©ation de l\'Empire galactique. Sa mÃ¨re, PadmÃ© Amidala, dÃ©cÃ¨de peu de temps aprÃ¨s avoir choisi son nom et celui de sa sÅ“ur jumelle, Leia Organa. Au mÃªme instant, sur Mustafar, le corps mutilÃ© de son pÃ¨re, Anakin Skywalker est reconstruit mÃ©caniquement sous la supervision de l\'Empereur Palpatine, prenant la forme connue de Dark Vador.\r\n\r\nLuke vit une enfance austÃ¨re sur Tatooine. Son oncle Owen Lars et sa tante Beru Whitesun ne lui rÃ©vÃ¨leront jamais ni l\'existence de sa sÅ“ur ni le passÃ© de son pÃ¨re, prÃ©tendant simplement que ce dernier Ã©tait un Â« pilote de vaisseau transporteur d\'Ã©pices Â». Luke se voit gratifiÃ© des mÃªmes talents que son pÃ¨re : trÃ¨s habile en rÃ©paration de droÃ¯des et en pilotage de vaisseaux, et dotÃ© d\'une trÃ¨s grande prÃ©sence de la force en lui, mÃªme avec une formation tardive. Il partage sa passion avec un ami, Biggs Darklighter, qui dÃ©sire rejoindre l\'Alliance rebelle.\r\n\r\nNe voulant pas que Luke s\'enlise dans les conflits comme son pÃ¨re, Owen et Beru tentent tant bien que mal de contenir ses dÃ©sirs d\'Ã©vasion. Owen voit d\'un mauvais Å“il la relation que Luke entretient avec le Â« vieux Ben Â», dernier lien avec Anakin. Jusqu\'Ã  l\'Ã¢ge de 19 ans, Luke grandit en tant que simple garÃ§on de ferme.', '', ''),
(0, 29, '2017-12-31 01:24:52', NULL, 'Kylo REN', 'Kylo Ren Ã©tait un humain sensible Ã  la Force. Il suivit les enseignements de son oncle, Luke Skywalker, jusqu\'Ã  ce qu\'il dÃ©truise l\'Ordre Jedi que son oncle tentait de rebÃ¢tir. Il naquit nous le nom de Ben Solo sur la planÃ¨te Chandrila au cours de l\'annÃ©e qui suivit la bataille d\'Endor. Il Ã©tait le fils du contrebandier Han Solo et de la princesse Leia Organa. PrÃ¨s de trente ans plus tard, Kylo Ren tua son pÃ¨re sur la Base Starkiller puis son maÃ®tre, Snoke, Ã  bord du Supremacy. ', '', ''),
(0, 30, '2017-12-31 01:32:06', NULL, 'General Hux', '&quot;Quand ce jour sera terminÃ©, les centaines de systÃ¨me restants se soumettront Ã  l\'autoritÃ© du Premier Ordre. Et tous se souviendront de ce jour comme le dernier de la Nouvelle RÃ©publique !&quot; \r\n    â€•GÃ©nÃ©ral Hux aux membres de la base Starkiller avant la destruction du systÃ¨me Hosnian.[src]\r\n\r\nArmitage Hux Ã©tait un humain servant le Premier Ordre en tant que gÃ©nÃ©ral environ trente ans aprÃ¨s la bataille d\'Endor. Jeune officier impitoyable, il avait toute confiance dans ses troupes, ses mÃ©thodes de formation et ses armes. ObÃ©issant au SuprÃªme Leader Snoke, Hux faisait partie des plus hauts membres du Premier Ordre et supervisait le commandement de la super-arme connue sous le nom de la base Starkiller. ', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `id_droit` int(11) NOT NULL,
  `grade` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`id_droit`, `grade`) VALUES
(1, 'admin'),
(2, 'auteur'),
(3, 'membre');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `id_droit` int(11) DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `nom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `date_de_naissance` date NOT NULL,
  `date_inscription` date NOT NULL,
  `pwd` varchar(255) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(25) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `id_droit`, `mail`, `prenom`, `nom`, `date_de_naissance`, `date_inscription`, `pwd`, `pseudo`, `avatar`) VALUES
(4, 1, 'dark.sidious@empire.net', 'Sidious', 'Dark', '1999-06-17', '0000-00-00', 'aab3238922bcc25a6f606eb525ffdc56', 'XxArnaudxX', ''),
(6, 1, 'dark_vador@empire.com', 'Anakin', 'Skywalker', '8888-11-14', '0000-00-00', 'aab3238922bcc25a6f606eb525ffdc56', 'darkani', ''),
(7, 2, 'obi_one@jedi.com', 'Obi-Wan', 'KENOBI', '1777-07-10', '0000-00-00', 'aab3238922bcc25a6f606eb525ffdc56', 'Obi', ''),
(8, 3, 'dark_kylo@premierordre.net', 'Kylo', 'REN', '1777-05-10', '0000-00-00', 'aab3238922bcc25a6f606eb525ffdc56', 'XxKyloxX', ''),
(11, 3, 'nani@nani.com', 'Djamel', 'Djamel', '1111-04-11', '0000-00-00', 'c20ad4d76fe97759aa27a0c99bff6710', 'Grievous', ''),
(12, 1, 'mace_windu@jedi.com', 'Windu', 'MACE', '7777-07-13', '0000-00-00', 'aab3238922bcc25a6f606eb525ffdc56', 'Windu', ''),
(13, NULL, 'mathieu.kermoal@epitech.eu', 'Mathieu', 'Kermoal', '1995-08-03', '0000-00-00', 'd6b95f7d2439fa3eeb0e8a756b7aaaf3', 'Babaours', ''),
(15, NULL, 'general.grievous@empire.net', 'Grievous', 'Djamel', '1111-11-11', '0000-00-00', '1aabac6d068eef6a7bad3fdf50a05cc8', 'Grievous', ''),
(16, NULL, 'amin@admin.root', 'ADMIN', 'ADMIN', '1111-01-01', '0000-00-00', '63a9f0ea7bb98050796b649e85481845', 'ADMIN', '16.jpg'),
(17, NULL, 'fred@fred.com', 'Fred', 'Fred', '1888-12-14', '0000-00-00', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 'Fred', ''),
(20, NULL, 'LAST@ahah.com', 'LAST', 'LAST', '1444-12-14', '2017-12-31', 'f447f5c03508de4d88e340390ba7c78f', 'LAST', 'default.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id_billet`);

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
  ADD PRIMARY KEY (`id_droit`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id_billet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `id_droit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
