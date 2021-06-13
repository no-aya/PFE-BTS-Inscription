-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2021 at 08:42 PM
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
(1, 'Jane Doe', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 0);

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
(1, '2021-06-12', 'technique', 19.36, 2021, 1);

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
('MCW', 1, 4, NULL);

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
(3, 'Fin cand', '2021-06-24');

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
(3, 'recu', 'png', 'to be determinated...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `emailID` int(11) NOT NULL COMMENT 'Identifiant de l''email',
  `dateEnvoi` date NOT NULL COMMENT 'Date d''envoi de l''email',
  `description` int(11) NOT NULL COMMENT 'Description de l''objet de l''email'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Liste des emails envoyés';

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
('G132856989', 'ee9094616', 'Rabi', 'Samad', b'1', 'Marrakech', 'Résidence Hivernage Garden, Rue Camille Cabana, Hivernage', 'rabisamad@gmail.com', 1, 'MCW', 1);

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
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `candidature`
--
ALTER TABLE `candidature`
  MODIFY `candidatureID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la candidature', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dateimportante`
--
ALTER TABLE `dateimportante`
  MODIFY `dateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `documentID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du document', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `emailID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de l''email';

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
