-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2021 at 06:20 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bts_inscription_2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `abscence`
--

CREATE TABLE `abscence` (
  `absenceID` int(11) NOT NULL,
  `nomProf` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `matiere` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dateDep` date NOT NULL,
  `dateRet` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abscence`
--

INSERT INTO `abscence` (`absenceID`, `nomProf`, `matiere`, `dateDep`, `dateRet`) VALUES
(1, 'Said Fadil', 'Anglais', '2021-06-27', '2021-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `adminID` int(11) NOT NULL,
  `nomComplet` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `motDePasse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`adminID`, `nomComplet`, `email`, `motDePasse`, `roleID`) VALUES
(1, 'Aya Ait', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 0),
(15, 'Halima Ben', 'aitaya1989@gmail.com', '9b7336d7f59c9c1a8bb124e782f8f3d6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `articleID` int(11) NOT NULL,
  `date` date NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `categorie` int(11) NOT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`articleID`, `date`, `titre`, `contenu`, `image`, `categorie`, `adminID`) VALUES
(3, '2021-06-02', 'ACTIVITÉS SPORTIVES', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '../../images/EE (1).png', 1, 1),
(4, '2021-06-11', 'JOURNÉE PORTES OUVERTES 2020-2021', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '../../images/EE (2).png', 1, 1),
(5, '2021-06-13', 'Les classes BTS suspendus le 15/11/2020', 'La direction de l’établissement vous informe que les classes BTS seront suspendus <span class=\"news-text-imp\">du 15/11/2020 au 20/11/2020</span> en raison des examens finals des classes de 2èmes années baccalauréat toutes les branches. ', NULL, 2, 1),
(6, '2021-06-13', 'Ouverture des inscriptions au club sportif du BTS', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus veritatis vel possimus nulla et tempore culpa voluptatem consequuntur quis! Tempora inventore, nostrum rem quae libero quisquam est sapiente animi quod!', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `candidature`
--

CREATE TABLE `candidature` (
  `candidatureID` int(11) NOT NULL COMMENT 'Identifiant de la candidature',
  `date` date NOT NULL COMMENT 'Date de création de la candidature',
  `typeBac` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Bac scientifique, technique ou économie',
  `moyenneBac` double NOT NULL COMMENT 'Moyenne du bac',
  `anneeObtention` year(4) NOT NULL COMMENT 'Année d''obtention du bac',
  `situationCandidature` tinyint(1) DEFAULT NULL COMMENT 'Acceptée, rejetée ou pas encore traitée (NULL)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Les candidatures déposées';

--
-- Dumping data for table `candidature`
--

INSERT INTO `candidature` (`candidatureID`, `date`, `typeBac`, `moyenneBac`, `anneeObtention`, `situationCandidature`) VALUES
(1, '2021-06-12', 'technique', 19.36, 2021, 1),
(2, '2021-06-28', 'technique', 16, 2018, 0),
(3, '2021-06-29', 'technique', 16.35, 2018, 1),
(4, '2021-06-29', 'scientifique', 15.36, 2019, NULL),
(5, '2021-06-29', 'economique', 17.99, 2020, NULL),
(6, '2021-06-29', 'technique', 16.15, 2019, NULL),
(7, '2021-06-29', 'technique', 14.89, 2020, NULL),
(8, '2021-06-29', 'scientifique', 18.33, 2019, NULL),
(9, '2021-06-29', 'technique', 16.78, 2019, NULL),
(10, '2021-06-29', 'economique', 18.99, 2020, NULL),
(11, '2021-06-29', 'economique', 16.36, 2019, NULL),
(12, '2021-06-29', 'scientifique', 13.65, 2021, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `choix`
--

CREATE TABLE `choix` (
  `filiereID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `candidatureID` int(11) NOT NULL,
  `priorite` int(11) NOT NULL COMMENT 'Ordre de priorité des choix',
  `retenu` binary(1) DEFAULT NULL COMMENT 'Choix obtenu ou pas, NULL : pas encore traité'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Choix des filières par priorité pour candidature';

--
-- Dumping data for table `choix`
--

INSERT INTO `choix` (`filiereID`, `candidatureID`, `priorite`, `retenu`) VALUES
('MCW', 1, 1, NULL),
('MCW', 1, 2, NULL),
('MCW', 1, 3, NULL),
('MCW', 1, 4, NULL),
('MCW', 3, 1, NULL),
('MCW', 3, 2, NULL),
('MCW', 3, 3, NULL),
('MCW', 3, 4, NULL),
('MCW', 4, 1, NULL),
('PROD', 4, 2, NULL),
('MCW', 4, 3, NULL),
('PROD', 4, 4, NULL),
('MCW', 5, 1, NULL),
('PROD', 5, 2, NULL),
('SE', 5, 3, NULL),
('CG', 5, 4, NULL),
('SE', 6, 1, NULL),
('PROD', 6, 2, NULL),
('MCW', 6, 3, NULL),
('MCW', 6, 4, NULL),
('MCW', 7, 1, NULL),
('PROD', 7, 2, NULL),
('SE', 7, 3, NULL),
('MCW', 7, 4, NULL),
('CG', 8, 1, NULL),
('MCW', 8, 2, NULL),
('MCW', 8, 3, NULL),
('CG', 8, 4, NULL),
('MCW', 9, 1, NULL),
('PROD', 9, 2, NULL),
('SE', 9, 3, NULL),
('MCW', 9, 4, NULL),
('CG', 10, 1, NULL),
('MCW', 10, 2, NULL),
('PROD', 10, 3, NULL),
('CG', 10, 4, NULL),
('CG', 11, 1, NULL),
('MCW', 11, 2, NULL),
('PROD', 11, 3, NULL),
('SE', 11, 4, NULL),
('PROD', 12, 1, NULL),
('MCW', 12, 2, NULL),
('SE', 12, 3, NULL),
('CG', 12, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dateimportante`
--

CREATE TABLE `dateimportante` (
  `dateID` int(11) NOT NULL,
  `Label` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dateimportante`
--

INSERT INTO `dateimportante` (`dateID`, `Label`, `date`) VALUES
(1, 'Fin des candidatures', '2021-06-30'),
(3, 'Fin cand', '2021-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `documentID` int(11) NOT NULL COMMENT 'Identifiant du document',
  `label` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Objet du document',
  `type` varchar(11) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Extension ou type',
  `lien` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Lien vers le document',
  `candidatureID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Documents additionels aux candidatures';

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`documentID`, `label`, `type`, `lien`, `candidatureID`) VALUES
(1, 'image', 'png', 'to be determinated...', 1),
(2, 'bac', 'png', 'to be determinated...', 1),
(3, 'recu', 'png', 'to be determinated...', 1),
(4, 'image', 'img', 'gdfhbgfdg', 1),
(5, 'image', 'png', '../../uploads/3-image.png', 3),
(6, 'bac', 'png', '../../uploads/3-bac.png', 3),
(7, 'recu', 'png', '../../uploads/3-recu.png', 3),
(8, 'image', 'jpg', '../../uploads/4-image.jpg', 4),
(9, 'bac', 'png', '../../uploads/4-bac.png', 4),
(10, 'recu', 'png', '../../uploads/4-recu.png', 4),
(11, 'image', 'jpg', '../../uploads/5-image.jpg', 5),
(12, 'bac', 'png', '../../uploads/5-bac.png', 5),
(13, 'recu', 'png', '../../uploads/5-recu.png', 5),
(14, 'image', 'jpg', '../../uploads/6-image.jpg', 6),
(15, 'bac', 'png', '../../uploads/6-bac.png', 6),
(16, 'recu', 'png', '../../uploads/6-recu.png', 6),
(17, 'image', 'jpg', '../../uploads/7-image.jpg', 7),
(18, 'bac', 'png', '../../uploads/7-bac.png', 7),
(19, 'recu', 'png', '../../uploads/7-recu.png', 7),
(20, 'image', 'jpg', '../../uploads/8-image.jpg', 8),
(21, 'bac', 'png', '../../uploads/8-bac.png', 8),
(22, 'recu', 'png', '../../uploads/8-recu.png', 8),
(23, 'image', 'jpg', '../../uploads/9-image.jpg', 9),
(24, 'bac', 'png', '../../uploads/9-bac.png', 9),
(25, 'recu', 'png', '../../uploads/9-recu.png', 9),
(26, 'image', 'jpg', '../../uploads/10-image.jpg', 10),
(27, 'bac', 'png', '../../uploads/10-bac.png', 10),
(28, 'recu', 'png', '../../uploads/10-recu.png', 10),
(29, 'image', 'jpg', '../../uploads/11-image.jpg', 11),
(30, 'bac', 'png', '../../uploads/11-bac.png', 11),
(31, 'recu', 'png', '../../uploads/11-recu.png', 11),
(32, 'image', 'jpg', '../../uploads/12-image.jpg', 12),
(33, 'bac', 'png', '../../uploads/12-bac.png', 12),
(34, 'recu', 'png', '../../uploads/12-recu.png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `emailID` int(11) NOT NULL COMMENT 'Identifiant de l''email',
  `dateEnvoi` date NOT NULL COMMENT 'Date d''envoi de l''email',
  `objet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Description de l''objet de l''email',
  `contenu` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Liste des emails envoyés';

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`emailID`, `dateEnvoi`, `objet`, `contenu`) VALUES
(1, '2021-06-29', 'Hello', 'hithere'),
(2, '2021-06-29', 'Hello', 'Hi tehre');

-- --------------------------------------------------------

--
-- Table structure for table `emailing`
--

CREATE TABLE `emailing` (
  `emailID` int(11) NOT NULL,
  `visiteurID` int(11) NOT NULL,
  `codeMassar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Le service emailing du centre BTS';

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `codeMassar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Code Massar de l''étudiant',
  `cine` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Carte d''identité nationale',
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nom de l''étudiant',
  `prenom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Prénom de l''étudiant',
  `sexe` bit(1) NOT NULL COMMENT 'Masculin/Féminin',
  `ville` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Ville de naissance',
  `adresse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Adresse d''habitation',
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Email de l''étudiant',
  `numInscription` int(11) DEFAULT NULL COMMENT 'Assigné si l''étudiant et accepté, NULL sinon',
  `filiereID` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `candidatureID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Détail Informations de l''étudiant';

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`codeMassar`, `cine`, `nom`, `prenom`, `sexe`, `ville`, `adresse`, `email`, `numInscription`, `filiereID`, `candidatureID`) VALUES
('D132291844', 'ee721561', 'ELABDELLAOUI ', 'HANANE', b'1', 'RABAT', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'hanaeFK_12@gmail.com', NULL, NULL, 11),
('D132747411', 'EE1654984', 'EL MOUSAAIF ', 'MOHAMED', b'0', 'TANGER', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'MOMOMED12@gmail.com', NULL, NULL, 10),
('D133544984', 'ee7491235', 'AZEDINE ', 'MAJDA', b'1', 'RABAT', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'azadana@gmail.com', NULL, NULL, 6),
('D134708595', 'ee784563', 'AIT MY HACHEM', 'KHADIJA', b'1', 'CASABLANCA', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'khadijasia@gmail.com', NULL, NULL, 5),
('D135708038', 'ee909215', 'BALHOUSS', 'SOUAAD', b'1', 'FES', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'as0ra1@gmail.com', NULL, NULL, 7),
('D138792089', 'EE908492', 'AIT BOUKDIR', 'MOHSSINE', b'0', 'Marrakech', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'MOHSSINE@gmail.com', NULL, NULL, 4),
('G132856900', 'ee9094616', 'Ait', 'aya', b'1', 'Marrakech', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'ayabug89@gmail.com', NULL, NULL, 2),
('G132856901', 'ee9094616', 'Ait', 'aya', b'0', 'Marrakech', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'ayabug89@gmail.com', 2, 'MCW', 3),
('G132856989', 'ee9094616', 'Rabi', 'Samad', b'1', 'Marrakech', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'rabisamad@gmail.com', 1, 'MCW', 1),
('J137321744', 'ee457634', 'BOUHADIOUI ', 'ASMAE', b'1', 'AGADIR', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'asmaetjoli@gmail.com', NULL, NULL, 9),
('K135525659', 'ee9094616', 'ELFAROKI', 'MARWANE', b'0', 'Marrakech', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'alimarwan@gmail.com', NULL, NULL, 12),
('N130171326', 'ee781296', 'BENHAMMOU', 'ISSAM', b'0', 'Marrakech', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'Issam_beldi@gmail.com', NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `filiere`
--

CREATE TABLE `filiere` (
  `filiereID` varchar(10) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Identifiant de la filière',
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Nom de la filière',
  `nombreDePlaces` int(11) NOT NULL COMMENT 'Nombre de places'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Les filières disponible au centre BTS';

--
-- Dumping data for table `filiere`
--

INSERT INTO `filiere` (`filiereID`, `label`, `nombreDePlaces`) VALUES
('CG', 'Comptabilité et Gestion', 30),
('MCW', 'Multimédia et Conception Web', 30),
('PROD', 'Productique', 30),
('SE', 'Systèmes électroniques', 30);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `Label` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `Label`) VALUES
(0, 'Administrateur Suprême'),
(1, 'Administrateur'),
(2, 'Rédacteur');

-- --------------------------------------------------------

--
-- Table structure for table `visiteur`
--

CREATE TABLE `visiteur` (
  `visiteurID` int(11) NOT NULL COMMENT 'Identifiant du visiteur souscrit',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Email du visiteur souscrit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Les visiteurs souscrits au service emailing';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abscence`
--
ALTER TABLE `abscence`
  ADD PRIMARY KEY (`absenceID`);

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `role` (`roleID`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`candidatureID`);

--
-- Indexes for table `choix`
--
ALTER TABLE `choix`
  ADD KEY `filiereID` (`filiereID`),
  ADD KEY `candidatureID` (`candidatureID`);

--
-- Indexes for table `dateimportante`
--
ALTER TABLE `dateimportante`
  ADD PRIMARY KEY (`dateID`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`documentID`),
  ADD KEY `candidatureID` (`candidatureID`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`emailID`);

--
-- Indexes for table `emailing`
--
ALTER TABLE `emailing`
  ADD KEY `codeMassar` (`codeMassar`),
  ADD KEY `emailing_ibfk_1` (`emailID`),
  ADD KEY `visiteurID` (`visiteurID`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`codeMassar`),
  ADD KEY `candidatureID` (`candidatureID`),
  ADD KEY `filiereID` (`filiereID`);

--
-- Indexes for table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`filiereID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`visiteurID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abscence`
--
ALTER TABLE `abscence`
  MODIFY `absenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `candidatureID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la candidature', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dateimportante`
--
ALTER TABLE `dateimportante`
  MODIFY `dateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `documentID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du document', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `emailID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de l''email', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `visiteurID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du visiteur souscrit', AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administration`
--
ALTER TABLE `administration`
  ADD CONSTRAINT `administration_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `role` (`roleID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `administration` (`adminID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `choix`
--
ALTER TABLE `choix`
  ADD CONSTRAINT `choix_ibfk_2` FOREIGN KEY (`filiereID`) REFERENCES `filiere` (`filiereID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `choix_ibfk_3` FOREIGN KEY (`candidatureID`) REFERENCES `candidature` (`candidatureID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`candidatureID`) REFERENCES `candidature` (`candidatureID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `emailing`
--
ALTER TABLE `emailing`
  ADD CONSTRAINT `emailing_ibfk_1` FOREIGN KEY (`emailID`) REFERENCES `email` (`emailID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `emailing_ibfk_2` FOREIGN KEY (`codeMassar`) REFERENCES `etudiant` (`codeMassar`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `emailing_ibfk_3` FOREIGN KEY (`visiteurID`) REFERENCES `visiteur` (`visiteurID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`candidatureID`) REFERENCES `candidature` (`candidatureID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`filiereID`) REFERENCES `filiere` (`filiereID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
