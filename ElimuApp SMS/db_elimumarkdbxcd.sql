-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2016 at 02:57 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_elimu`
--
CREATE DATABASE `db_elimu` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_elimu`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl__01foreign__keys`
--

CREATE TABLE IF NOT EXISTS `tbl__01foreign__keys` (
  `fk_id` int(11) NOT NULL AUTO_INCREMENT,
  `foreign__key` text NOT NULL,
  `table__index` int(11) NOT NULL,
  `output__field__range` int(11) NOT NULL,
  PRIMARY KEY (`fk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl__01foreign__keys`
--

INSERT INTO `tbl__01foreign__keys` (`fk_id`, `foreign__key`, `table__index`, `output__field__range`) VALUES
(1, 'type__de__gestion_id', 9, 1),
(2, 'qualification__grade_id', 19, 1),
(3, 'section_id', 11, 1),
(4, 'enseignant_id ', 12, 1),
(5, 'option_id', 20, 2),
(6, 'classe_id', 15, 1),
(7, 'frais__scolaires_id', 14, 1),
(8, 'type__de__compte_id', 25, 1),
(9, 'compte_id', 26, 2),
(10, 'categorie_id', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl__02utilisateurs`
--

CREATE TABLE IF NOT EXISTS `tbl__02utilisateurs` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `compte__d666utilisateur` text NOT NULL,
  `mot__de__passe` text NOT NULL,
  `designation` text NOT NULL,
  `nom` text NOT NULL,
  `post__nom` text NOT NULL,
  `genre` text NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl__02utilisateurs`
--

INSERT INTO `tbl__02utilisateurs` (`user_id`, `compte__d666utilisateur`, `mot__de__passe`, `designation`, `nom`, `post__nom`, `genre`, `photo`) VALUES
(3, 'joyce', 'mulegwa', 'reception', 'joyce', 'mulegwa', 'Feminin', '<img src="#_srcdata_buddle/4732_File_profile-pic.jpg" width="#_width" height="#_height">'),
(4, 'directeur', 'directeur', 'directeur', 'Francois', 'mwamba', 'Masculin', '<img src="#_srcdata_buddle/3960_File_profile-pic.jpg" width="#_width" height="#_height">'),
(5, 'financier', 'financier', 'financier', 'Elie', 'Yaffa', 'Masculin', ''),
(6, 'admin', 'joyce12345', 'admin', 'Demo', 'Demo', '', ''),
(7, 'ADAM', 'MATERDEI', 'directeur', 'ADAM WALIUZI ', 'KABALA', 'Masculin', ''),
(8, 'BIENFAIT', 'MATERDEI', 'financier', 'BIENFAIT', 'MUYANDA KASAMURA', 'Masculin', ''),
(9, 'MOISE', 'MATERDEI', 'financier', 'MOISE ', 'SAIDI', 'Masculin', ''),
(10, 'EMMANUEL', 'MATERDEI', 'reception', 'EMMANUEL', 'BYAMUNGU BASHIBENGE', 'Masculin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__03configuration`
--

CREATE TABLE IF NOT EXISTS `tbl__03configuration` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation` text NOT NULL,
  `email` text NOT NULL,
  `telephone` text NOT NULL,
  `adresse` text NOT NULL,
  `other__information` text NOT NULL,
  `application__name` text NOT NULL,
  `software__company` text NOT NULL,
  `application__detail` text NOT NULL,
  `width__logo` int(11) NOT NULL,
  `height__size__logo` int(11) NOT NULL,
  `logo` text NOT NULL,
  `allowed__data__per__page` int(11) NOT NULL,
  `pagination__length` int(11) NOT NULL,
  `footer__page` text NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl__03configuration`
--

INSERT INTO `tbl__03configuration` (`config_id`, `organisation`, `email`, `telephone`, `adresse`, `other__information`, `application__name`, `software__company`, `application__detail`, `width__logo`, `height__size__logo`, `logo`, `allowed__data__per__page`, `pagination__length`, `footer__page`) VALUES
(2, 'Job Advertiser', 'info@odhasbl.org', '000000000000000000', 'Goma', 'Others...', 'Elimu App', 'Sowebgra', 'This Application is all about managing Job Advertiser', 200, 150, '<img src="#_srcdata_buddle/2449_File_3096_File_toingarschool_logo.png" width="#_width" height="#_height">', 10, 5, 'Copyright Job Advertiser');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__04customize__tabform`
--

CREATE TABLE IF NOT EXISTS `tbl__04customize__tabform` (
  `tabform_id` int(11) NOT NULL AUTO_INCREMENT,
  `tabname` text NOT NULL,
  `table__index` int(11) NOT NULL,
  `table__fields` text NOT NULL,
  `from__range__field` int(11) NOT NULL,
  `to__range__field` int(11) NOT NULL,
  PRIMARY KEY (`tabform_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__04customize__tabform`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__05table__fields`
--

CREATE TABLE IF NOT EXISTS `tbl__05table__fields` (
  `table__field_id` int(11) NOT NULL AUTO_INCREMENT,
  `table__index` int(11) NOT NULL,
  `fld__range__regard__interface__form` int(11) NOT NULL,
  `input__object_id` int(11) NOT NULL,
  `ajax__division__id` text NOT NULL,
  PRIMARY KEY (`table__field_id`),
  KEY `input__object_id` (`input__object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__05table__fields`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__06input__objects`
--

CREATE TABLE IF NOT EXISTS `tbl__06input__objects` (
  `input__object_id` int(11) NOT NULL AUTO_INCREMENT,
  `input__object` text NOT NULL,
  PRIMARY KEY (`input__object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl__06input__objects`
--

INSERT INTO `tbl__06input__objects` (`input__object_id`, `input__object`) VALUES
(1, 'Textbox'),
(2, 'Textarea'),
(3, 'Integer & Decimal'),
(4, 'Gender'),
(5, 'Read Foreign Key'),
(6, 'Calendar'),
(7, 'Dropdown list'),
(8, 'Dropdown List Group'),
(9, 'Yes or not'),
(10, 'Void__Value'),
(11, 'admin designation'),
(12, 'UserID'),
(13, 'output2'),
(14, 'output3'),
(15, '15'),
(16, '16'),
(17, 'Upload File'),
(18, '18'),
(19, 'empty__value__ajax__division'),
(20, '20'),
(21, 'calendar_default'),
(22, 'classe_name'),
(23, 'readonly_calendar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__07dropdownlist`
--

CREATE TABLE IF NOT EXISTS `tbl__07dropdownlist` (
  `dropdownlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `table__field_id` int(11) NOT NULL,
  `foreign__table__index` int(11) NOT NULL,
  `primary__key` int(11) NOT NULL,
  `output__range__field__array__index` int(11) NOT NULL,
  `onchange` int(11) NOT NULL,
  `deactivate__search` int(11) NOT NULL,
  `width` text NOT NULL,
  `return__ajax__function` text NOT NULL,
  PRIMARY KEY (`dropdownlist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__07dropdownlist`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__08dropdownlist__group`
--

CREATE TABLE IF NOT EXISTS `tbl__08dropdownlist__group` (
  `dropdownlistgroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `table__field_id` int(11) NOT NULL,
  `table__group__string` text NOT NULL,
  `table__option__string` text NOT NULL,
  `output__group__index` int(11) NOT NULL,
  `output__option__index` int(11) NOT NULL,
  `ref__fld__string__pkgrouptbl` text NOT NULL,
  PRIMARY KEY (`dropdownlistgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__08dropdownlist__group`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__09type__de__gestion`
--

CREATE TABLE IF NOT EXISTS `tbl__09type__de__gestion` (
  `type__de__gestion_id` int(11) NOT NULL AUTO_INCREMENT,
  `type__de__gestion` text NOT NULL,
  PRIMARY KEY (`type__de__gestion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl__09type__de__gestion`
--

INSERT INTO `tbl__09type__de__gestion` (`type__de__gestion_id`, `type__de__gestion`) VALUES
(1, 'Ecole Conventionnee'),
(2, 'Ecole non conventionee ou ecole privee agreee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__10institution`
--

CREATE TABLE IF NOT EXISTS `tbl__10institution` (
  `institution_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom__de__l666ecole` text NOT NULL,
  `type__de__gestion_id` int(11) NOT NULL,
  `annee__de__creation` text NOT NULL,
  `code__ecole` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `site__web` text NOT NULL,
  `adresse` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`institution_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl__10institution`
--

INSERT INTO `tbl__10institution` (`institution_id`, `nom__de__l666ecole`, `type__de__gestion_id`, `annee__de__creation`, `code__ecole`, `telephone`, `email`, `site__web`, `adresse`, `logo`) VALUES
(1, 'EP Katoyi', 1, '08/23/2016', '458-UTL', '0788702656', 'sowebgra@gmail.com', 'www.sowebgra@gmail.com', 'Goma', '<img src="#_srcdata_buddle/2346_File_IMG_20160616_124534.jpg" width="#_width" height="#_height">');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__11section`
--

CREATE TABLE IF NOT EXISTS `tbl__11section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section` text NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl__11section`
--

INSERT INTO `tbl__11section` (`section_id`, `section`) VALUES
(1, 'Maternelle.'),
(2, 'Primaire'),
(3, 'universitaire');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__12enseignants`
--

CREATE TABLE IF NOT EXISTS `tbl__12enseignants` (
  `enseignant_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom__complet` text NOT NULL,
  `genre` text NOT NULL,
  `qualification__grade_id` text NOT NULL,
  `matricule` text NOT NULL,
  `salaire` text NOT NULL,
  PRIMARY KEY (`enseignant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl__12enseignants`
--

INSERT INTO `tbl__12enseignants` (`enseignant_id`, `nom__complet`, `genre`, `qualification__grade_id`, `matricule`, `salaire`) VALUES
(3, 'Francois Mwamba', 'Masculin', '1', '455689', '200 USD'),
(4, 'Mutiri Wabashara', 'Masculin', '1', '8536952', '300 USD'),
(5, 'KATUNGU MWERU EUPHRASIE', 'Feminin', '', '', ''),
(6, 'NAMAPENDANO BUHENDWA JEANNE', 'Feminin', '', '', ''),
(7, 'MANI ZABAYO BABOMPORINEZA CLAUDINE', 'Feminin', '', '', ''),
(8, 'MAOMBI MARUGIJE JUSTINE', 'Feminin', '', '', ''),
(9, 'BIENDA KILOLO IRENE', 'Feminin', '', '', ''),
(10, 'KAMENYEZI NYABIENDA AIMERANCE', 'Feminin', '', '', ''),
(11, 'BAHATI NDUHE AGRIPPINE', 'Feminin', '', '', ''),
(12, 'KIMIA NAMULEMBA EUGENIE', 'Feminin', '', '', ''),
(13, 'SAFARI MUSEME BRUNO', 'Masculin', '', '', ''),
(14, 'NTIBAKUNZE RUNGEND BAUDOUINE', 'Feminin', '', '', ''),
(15, 'SAFARI CIBUYE GUILLAUME', 'Feminin', '', '', ''),
(16, 'MUSABIMA NDIMUBANZI MOISE', 'Masculin', '', '', ''),
(17, 'MINANI MAGEZA ANTOINNE', 'Masculin', '', '', ''),
(18, 'BEMBELEZA BISIMWA BERNADINNE', 'Feminin', '', '', ''),
(19, 'CHIRHUZA MAHESHE ADRIEN', 'Masculin', '', '', ''),
(20, 'KALIZA BABONE FLORENTINNE', 'Feminin', '', '', ''),
(21, 'BNGAMWABO MAOMBI ANNUARITE', 'Feminin', '', '', ''),
(22, 'HABAMUNGU KANYENZI JUSTIN', 'Masculin', '', '', ''),
(23, 'OKELO SUMBUKO DEOGRATIAS', 'Masculin', '', '', ''),
(24, 'KITUMAINI MAHAZI JULIEN', 'Masculin', '', '', ''),
(25, 'TSHIBALONZA ASSUMANI GISELE', 'Feminin', '', '', ''),
(26, 'NGANGO APENDEKI GRACE', 'Feminin', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__13cours`
--

CREATE TABLE IF NOT EXISTS `tbl__13cours` (
  `cours_id` int(11) NOT NULL AUTO_INCREMENT,
  `titre__du__cours` text NOT NULL,
  `section_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `enseignant_id` int(11) NOT NULL,
  `max__periode` text NOT NULL,
  `max__examen` text NOT NULL,
  `max__trimestre` text NOT NULL,
  `max__semestre` text NOT NULL,
  `max__general` text NOT NULL,
  PRIMARY KEY (`cours_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `tbl__13cours`
--

INSERT INTO `tbl__13cours` (`cours_id`, `titre__du__cours`, `section_id`, `option_id`, `classe_id`, `enseignant_id`, `max__periode`, `max__examen`, `max__trimestre`, `max__semestre`, `max__general`) VALUES
(1, 'Francais', 1, 3, 12, 6, '300', '700', '150', '1', '8000'),
(2, 'Mathematic', 1, 3, 12, 6, '80', '400', '2500', '300', '7859'),
(3, 'Religion ou Morale', 2, 6, 8, 4, '10', '40', '40', '', '120'),
(4, 'Education Civique', 2, 6, 8, 4, '10', '40', '40', '', '120'),
(5, 'Elocution + Vocabulaire', 2, 6, 8, 4, '10', '40', '40', '', '120'),
(6, 'Grammaire - Conjugaison', 2, 6, 8, 4, '10', '40', '40', '', '120'),
(7, 'Lecture', 2, 6, 8, 4, '10', '40', '40', '', '120'),
(8, 'orthographe', 2, 6, 8, 4, '10', '40', '40', '', '120'),
(9, 'Recitation', 2, 6, 8, 4, '10', '40', '40', '', '120'),
(10, 'Redaction + Phraseologie', 2, 6, 8, 4, '2010', '80', '80', '', '240'),
(11, 'Activites d''arts plastiques', 1, 3, 10, 5, '', '', '8', '', '24'),
(12, 'Activites de comportement', 1, 3, 10, 5, '', '', '8', '', '24'),
(13, 'Activites musicales', 1, 3, 10, 5, '', '', '8', '', '24'),
(14, 'Activites physiques', 1, 3, 10, 5, '', '', '8', '', '24'),
(15, 'Activites de schemas corporels', 1, 3, 10, 5, '', '', '8', '', '24'),
(16, 'Activites sensorielles', 1, 3, 10, 5, '', '', '8', '', '24'),
(17, 'Activites de structuration spatiale', 1, 3, 10, 5, '', '', '8', '', '24'),
(18, 'Activites de vie pratique ', 1, 3, 10, 5, '', '', '8', '', '24'),
(19, 'Activites exploratrices', 1, 3, 10, 5, '', '', '12', '', '36'),
(20, 'Activites de langage', 1, 3, 10, 5, '', '', '12', '', '36'),
(21, 'Activites mathematiques ', 1, 3, 10, 5, '', '', '12', '', '36'),
(22, 'Activites libres', 1, 3, 10, 5, '', '', '20', '', '60'),
(23, 'RELIGION', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(24, 'EDUC. CIV. &amp; MORALE', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(25, 'EDUC. A LA VIE', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(26, 'LANGUES NATIN.', 2, 6, 9, 24, '', '', '', '', ''),
(27, 'GRAM. CONJ. ANALYSE', 2, 6, 9, 24, '7', '14', '28', '', '84'),
(28, 'ELOC. VOC. RECIT.', 2, 6, 9, 24, '6', '12', '24', '', '72'),
(29, 'REDAC. ORTHOG.', 2, 6, 9, 24, '4', '8', '16', '', '48'),
(30, 'LECTURE', 2, 6, 9, 24, '3', '6', '12', '', '36'),
(31, 'FR. GRAM. CONJ.ANAL', 2, 6, 9, 24, '20', '40', '80', '', '240'),
(32, 'FR. ELOC. VOC. RECIT', 2, 6, 9, 24, '25', '50', '100', '', '300'),
(33, 'FR. REDAC. ORTHOGR.', 2, 6, 9, 24, '15', '30', '60', '', '180'),
(34, 'FR. LECTURE', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(35, 'NUM. OPERATIONS', 2, 6, 9, 24, '20', '40', '80', '', '240'),
(36, 'GRAND. F.GEOMETR.', 2, 6, 9, 24, '30', '60', '120', '', '360'),
(37, 'PROBLEMES', 2, 6, 9, 24, '20', '40', '80', '', '240'),
(38, 'ED. SANTE &amp; ENV', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(39, 'HISTOIRE', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(40, 'GEOGRAPHIE', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(41, 'SCIENCES NATUREL.', 2, 6, 9, 24, '20', '40', '80', '', '240'),
(42, 'INFORMATIQUE', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(43, 'DESSIN', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(44, 'CALLIGRAPHIE', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(45, 'CHANT/MUSIQUE', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(46, 'ED. PHYS &amp; SPORTS', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(47, 'TRAVAIL MANUELLE', 2, 6, 9, 24, '10', '20', '40', '', '120'),
(48, 'RELIGION', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(49, 'EDUC. CIV &amp; MORAL', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(50, 'EDUC. A LA VIE', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(51, 'LANGUES NATIONALES', 2, 5, 0, 22, '', '', '', '', ''),
(52, 'GRAM. CONJ. ANALYSE', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(53, 'ELOC. VOC. RECITATION', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(54, 'REDAC. ORTHOGRAPHE', 2, 5, 0, 22, '05', '10', '20', '', '60'),
(55, 'LECTURE', 2, 5, 0, 22, '05', '10', '20', '', '60'),
(56, 'FR. GRAM. CONJ. ANALYSE', 2, 5, 0, 22, '20', '40', '80', '', '240'),
(57, 'FR. ELOC. VOC. RECITATION', 2, 5, 0, 22, '25', '50', '100', '', '300'),
(58, 'FR. REDAC. ORTHOGRAPHE', 2, 5, 0, 22, '15', '30', '60', '', '180'),
(59, 'FR. LECTURE', 2, 0, 0, 22, '10', '20', '40', '', '120'),
(60, 'NUM. OPERATIONS', 2, 5, 0, 22, '20', '40', '80', '', '240'),
(61, 'GRAND. F.GEOMETR', 2, 5, 0, 22, '20', '40', '80', '', '240'),
(62, 'PROBLEMES', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(63, 'ED. SANTE &amp; ENV', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(64, 'HISTOIRE', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(65, 'GEOGRAPHIE', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(66, 'SCIENCES NATURELLES', 2, 5, 0, 22, '20', '40', '80', '', '240'),
(67, 'INFORMATIQUE (1)', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(68, 'DESSIN', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(69, 'CALLIGRAPHIE', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(70, 'CHANT/MUSIQUE', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(71, 'ED. PHYS. &amp; SPORTS', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(72, 'TRAVAIL MANUEL', 2, 5, 0, 22, '10', '20', '40', '', '120'),
(73, 'RELIGION', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(74, 'ED. CIV &amp; MORALE', 2, 4, 7, 17, '10', '10', '20', '', '120'),
(75, 'EDUC. A LA VIE', 0, 0, 0, 0, '10', '20', '40', '', '120'),
(76, 'ELOC. RECITQTION', 2, 4, 7, 17, '25', '50', '100', '', '300'),
(77, 'ORTHOG. CONJUG', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(78, 'LECTURE', 2, 4, 7, 17, '15', '30', '60', '', '180'),
(79, 'FR. ELOC. RECITATION', 2, 4, 7, 17, '20', '40', '80', '', '240'),
(80, 'FR. LECTURE', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(81, 'FR. CONJUGAISON', 2, 4, 7, 17, '5', '10', '20', '', '60'),
(82, 'FR. ORTHOGRAPHE', 2, 4, 7, 17, '5', '10', '20', '', '60'),
(83, 'NUMER. OPERATIONS', 2, 4, 7, 17, '20', '40', '80', '', '240'),
(84, 'GRANDEURS', 2, 4, 7, 17, '10', '20', '40', '', '60'),
(85, 'FORMES GEOMETRIQUES', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(86, 'PROBLEMES', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(87, 'ED. SANTE ENV', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(88, 'ETUDE DU MILIEU', 2, 4, 7, 17, '50', '100', '200', '', '600'),
(89, 'INFORMATIQUE (1)', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(90, 'DESSIN', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(91, 'CALLIGRAPHIE', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(92, 'CHANT/MUSIQUE', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(93, 'ED. PHYS. &amp; SPORTS', 2, 4, 7, 17, '10', '20', '40', '', '120'),
(94, 'TRAVAIL MANUEL', 2, 4, 7, 17, '10', '20', '40', '', '120');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__14frais__scolaires`
--

CREATE TABLE IF NOT EXISTS `tbl__14frais__scolaires` (
  `frais__scolaires_id` int(11) NOT NULL AUTO_INCREMENT,
  `type__de__compte_id` int(11) NOT NULL,
  `compte_id` int(11) NOT NULL,
  `nom__du__frais` text NOT NULL,
  `montant` text NOT NULL,
  PRIMARY KEY (`frais__scolaires_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl__14frais__scolaires`
--

INSERT INTO `tbl__14frais__scolaires` (`frais__scolaires_id`, `type__de__compte_id`, `compte_id`, `nom__du__frais`, `montant`) VALUES
(1, 4, 0, 'FRAIS INSCRIPTION', '20'),
(2, 4, 0, 'FRAIS  1er trimestre', '90'),
(3, 4, 0, 'MINERVAL', '1'),
(5, 4, 1, 'Sonas', '1'),
(6, 4, 1, 'FRAIS  2ieme TRIMESTRE', '90'),
(7, 4, 1, 'FRAIS  3ieme TRIMESTRE', '90'),
(8, 4, 1, 'TRANSPORT CENTRE VILLE-MATER DEI', '20'),
(9, 4, 2, 'TRANSPORT ULPGL-MATER DEI', '18'),
(10, 4, 1, 'TRANSPORT NDOSHO-MATER DEI', '15'),
(11, 4, 1, 'TENAFEP', '15'),
(12, 4, 1, 'ETUDES FIANLISTES', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__15classe`
--

CREATE TABLE IF NOT EXISTS `tbl__15classe` (
  `classe_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom__de__la__classe` text NOT NULL,
  `section_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `enseignant_id` text NOT NULL,
  `frais__scolaires_id` text NOT NULL,
  `void__default` text NOT NULL,
  PRIMARY KEY (`classe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl__15classe`
--

INSERT INTO `tbl__15classe` (`classe_id`, `nom__de__la__classe`, `section_id`, `option_id`, `enseignant_id`, `frais__scolaires_id`, `void__default`) VALUES
(10, '1a', 1, 3, '5,7', '1,2,5,6,7,8,9,10', ''),
(11, '', 1, 0, '24', '1,2,3,5,6,7,8,9,10', ''),
(12, '2a', 1, 3, '6,8', '', ''),
(13, '2b', 1, 3, '9,10', '', ''),
(14, '', 1, 0, '11,12', '1,2,4', ''),
(15, '3b', 1, 3, '25,26', '', ''),
(16, '1a', 2, 4, '13,14', '', ''),
(18, '1b', 2, 4, '15,16', '', ''),
(19, '2a', 2, 4, '17,18', '', ''),
(20, '2b', 2, 4, '18,19', '', ''),
(21, '3a', 2, 0, '20', '1,2,3,5,6,7,8,9,10', ''),
(22, '3b', 2, 5, '21', '', ''),
(23, '4a', 2, 5, '22', '', ''),
(24, '4b', 2, 5, '', '', ''),
(25, '5', 2, 6, '23', '', ''),
(26, '6', 2, 6, '24', '', ''),
(27, '3a', 1, 3, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__16conduite`
--

CREATE TABLE IF NOT EXISTS `tbl__16conduite` (
  `conduite_id` int(11) NOT NULL AUTO_INCREMENT,
  `conduite` text NOT NULL,
  PRIMARY KEY (`conduite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl__16conduite`
--

INSERT INTO `tbl__16conduite` (`conduite_id`, `conduite`) VALUES
(1, 'ELITE'),
(2, 'EXCELLENT'),
(3, 'TRES BONNE'),
(4, 'BONNE'),
(5, 'ASSEZ BONNE'),
(6, 'MEDIOCRE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__17inscription__des__eleves`
--

CREATE TABLE IF NOT EXISTS `tbl__17inscription__des__eleves` (
  `inscription__des__eleves_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom__complet` text NOT NULL,
  `lieu__de__naissance` text NOT NULL,
  `date__de__naissance` text NOT NULL,
  `genre` text NOT NULL,
  `ecole__de__provenance` text NOT NULL,
  `classe__de__provenance` text NOT NULL,
  `point__obtenus` text NOT NULL,
  `conduite__obtnue` text NOT NULL,
  `adresse` text NOT NULL,
  `personne__responsable` text NOT NULL,
  `section_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `numero__matricule` text NOT NULL,
  `photo` text NOT NULL,
  `telephone__personne__de__reference` text NOT NULL,
  `moyen__de__locomotion` text NOT NULL,
  PRIMARY KEY (`inscription__des__eleves_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=665 ;

--
-- Dumping data for table `tbl__17inscription__des__eleves`
--

INSERT INTO `tbl__17inscription__des__eleves` (`inscription__des__eleves_id`, `nom__complet`, `lieu__de__naissance`, `date__de__naissance`, `genre`, `ecole__de__provenance`, `classe__de__provenance`, `point__obtenus`, `conduite__obtnue`, `adresse`, `personne__responsable`, `section_id`, `option_id`, `classe_id`, `numero__matricule`, `photo`, `telephone__personne__de__reference`, `moyen__de__locomotion`) VALUES
(9, 'BAHATI  KANANE  BRAYANE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000276/1aM/2015-2016', '<img src="#_srcdata_buddle/3845_File_14627746_1271715846204475_196324097_n.jpg" width="#_width" height="#_height">', '0977660514', 'Vehicule'),
(10, 'MBONYURUGO  GATASHA  GEORGES', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000002/1aM/2015-2016', '', '', ''),
(11, 'MAOWA   LUCIE  EMMANUELLA', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000003/1aM/2015-2016', '', '', ''),
(12, 'FAYDA  WASINGYA  MWINJA GRABRIELLA', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000004/1aM/2015-2016', '', '', ''),
(13, 'FAYDA  LYANZO  KINJA GAELLA', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000005/1aM/2015-2016', '', '', ''),
(14, 'MUKULUTAGHE MASOKA  BENEDICTE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000006/1aM/2015-2016', '', '', ''),
(15, 'MUSEMAKWELI  HABINEZA  PARFAIT', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000007/1aM/2015-2016', '', '', ''),
(16, 'MUYISA  KAMATE  GAETHAN', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000008/1aM/2015-2016', '', '', ''),
(17, 'KABILA  DJUBA   RAWLINGS', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 10, '000276/1aM/2015-2016', '', '', ''),
(18, 'SHEKINAH    BATSOTSI', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000010/1aM/2015-2016', '', '', ''),
(19, 'UWITONZE  HARERIMANA  DANIELLE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000011/1aM/2015-2016', '', '', ''),
(20, 'USHINDI  BYEMBA  SEGOLENE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000012/1aM/2015-2016', '', '', ''),
(21, 'BUUMA   BANDU   GRANEL', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000013/1aM/2015-2016', '', '', ''),
(22, 'BYAMUNGU  WETEWABO  CHERUBIN', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000014/1aM/2015-2016', '', '', ''),
(23, 'IRENGE   OMBENI   FRANK', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000015/1aM/2015-2016', '', '', ''),
(24, 'MUGISHA  RUKIRANDE  GUERSHOME', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000016/1aM/2015-2016', '', '', ''),
(25, 'WABO   MUYISA   ESTHER', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000017/1aM/2015-2016', '', '', ''),
(26, 'MUVUYA  NGUNUNU KIRIANE THERESE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000018/1aM/2015-2016', '', '', ''),
(27, 'KAMBERE  KOMBI  URIEL', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000019/1aM/2015-2016', '', '', ''),
(28, 'KITUMAINI   AHADI   MARIE ANGE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000020/1aM/2015-2016', '', '', ''),
(29, 'NDAHIRWA MUGARULA  HOLY', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000021/1aM/2015-2016', '', '', ''),
(30, 'NZANZU   MWENGE   ANAEL', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000022/1aM/2015-2016', '', '', ''),
(31, 'KAKULE  MAKUTA  DANIEL', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000023/1aM/2015-2016', '', '', ''),
(32, 'MUGOLI  LIPANDASI   NICOLE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000024/1aM/2015-2016', '', '', ''),
(33, 'NZANZU   LOBWE  MERDIE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000025/1aM/2015-2016', '', '', ''),
(34, 'NDABAHWEJE  BUSIMBA  SERAPHINE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000026/1aM/2015-2016', '', '', ''),
(35, 'PEACENT   NDAYAMBAJE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000027/1aM/2015-2016', '', '', ''),
(36, 'SORAYA   KASOLENE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000028/1aM/2015-2016', '', '', ''),
(37, 'KINJA  MUNYWANO   CHRISTIANA', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000029/1aM/2015-2016', '', '', ''),
(38, 'RONNIE   WANGUWABO', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000030/1aM/2015-2016', '', '', ''),
(39, 'AXEL - RYAN  MUHANANO', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000031/1aM/2015-2016', '', '', ''),
(40, 'AMANI   BIFUMBU   MICHAEL', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000032/1aM/2015-2016', '', '', ''),
(41, 'ANDEMA  BARHAKENGERA  ALFRED', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000033/1aM/2015-2016', '', '', ''),
(42, 'KAVUGHO  MUSAVULI  KETHIA', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000034/1aM/2015-2016', '', '', ''),
(43, 'NSHOKANO  ZAWADI   RAOUL', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000035/1aM/2015-2016', '', '', ''),
(44, 'MUFARIJI    KUBUYA    DIEU MERCI', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000036/1aM/2015-2016', '', '', ''),
(45, 'REHEMA  WAKITOKO   PRISCA', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000037/1aM/2015-2016', '', '', ''),
(46, 'WENDY  CHIRIMWAMI    NORBIN', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000038/1aM/2015-2016', '', '', ''),
(47, 'AMANI   OBEDI   JAPHET', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000039/1aM/2015-2016', '', '', ''),
(48, 'MULIRO MUYISA MIGEUL', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000040/1aM/2015-2016', '', '', ''),
(49, 'ESTHER KATUNGU MALIRO', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000041/1aM/2015-2016', '', '', ''),
(50, 'IRAGI MUSHENGEZI JAPHET', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000042/1aM/2015-2016', '', '', ''),
(51, 'MICHEL AKILI TSONGO', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000043/1aM/2015-2016', '', '', ''),
(52, 'MICHELLINE AKILI TSONGO', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000044/1aM/2015-2016', '', '', ''),
(53, 'EUPHRASIE SITWAMINYA', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000045/1aM/2015-2016', '', '', ''),
(54, 'MUGOLI NYORHA GABRIELLA', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000046/1aM/2015-2016', '', '', ''),
(55, 'CALEB KANZE LEBON', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000047/1aM/2015-2016', '', '', ''),
(56, 'AWEZAYE KITOKO KALONDA', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000048/1aM/2015-2016', '', '', ''),
(57, 'MARIE ANGELE LOMBE', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000049/1aM/2015-2016', '', '', ''),
(58, 'RAPHAEL SYALIKO', '', '', '', '', '', '', '', '', '', 1, 3, 10, '000050/1aM/2015-2016', '', '', ''),
(59, 'RHEMA ZANGIO WANJ', '', '', '', '', '', '', '', '', '', 1, 3, 11, '000051/1bM/2015-2016', '', '', ''),
(60, 'MUNIHIRE KIBANJA RACHEL', '', '', '', '', '', '', '', '', '', 1, 3, 11, '000052/1bM/2015-2016', '', '', ''),
(61, 'KATAVALI MOISE', '', '', '', '', '', '', '', '', '', 1, 3, 11, '000053/1bM/2015-2016', '', '', ''),
(62, 'FURAHA MBIKA CHRISTELLE', '', '', '', '', '', '', '', '', '', 1, 3, 11, '000054/1bM/2015-2016', '', '', ''),
(63, 'ASOBOLA KIYIKI CHRISTOPHERE', '', '', '', '', '', '', '', '', '', 1, 3, 11, '000055/1bM/2015-2016', '', '', ''),
(64, ' BILUGE HABAMUNGU ARIANE', '', '', '', '', '', '', '', '', '', 1, 3, 11, '000056/1bM/2015-2016', '', '', ''),
(65, 'RUDAHIGWA     KOKO   BINJA  RUTA', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000057/2aM/2015-2016', '', '', ''),
(66, 'SEBAGENZI   BARAKA    ELDINE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000058/2aM/2015-2016', '', '', ''),
(67, 'SHEMA    NDAGANO    AUGUSTIN', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000059/2aM/2015-2016', '', '', ''),
(68, 'KAVIRA  KAWITEVALI    JOSEPHINE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000060/2aM/2015-2016', '', '', ''),
(69, 'KASEREKA   DORAH  MARIE-HELENE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000061/2aM/2015-2016', '', '', ''),
(70, 'KAMBALE  MUPOPOLO   JOSEPH', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000062/2aM/2015-2016', '', '', ''),
(71, 'MFURA    SAMVURA   CLEMENT', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000063/2aM/2015-2016', '', '', ''),
(72, 'GEDEON   NYALUNDJA   AGANZE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000064/2aM/2015-2016', '', '', ''),
(73, 'SHANNAH  SHABIR   KISITU', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000065/2aM/2015-2016', '', '', ''),
(74, 'AKEZA  MATUNGO   JUDITH', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000066/2aM/2015-2016', '', '', ''),
(75, 'MWELWA   MANIWA   DAN  ETHAN', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000067/2aM/2015-2016', '', '', ''),
(76, 'PALUKU    KABUYA    LANDRY', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000068/2aM/2015-2016', '', '', ''),
(77, 'MANCIE KATSURUZI', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000069/2aM/2015-2016', '', '', ''),
(78, 'MUHINDO MANZEKELE AUGUSTIN', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000070/2aM/2015-2016', '', '', ''),
(79, 'HAHADI BYABULIRE SBNAR', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000071/2aM/2015-2016', '', '', ''),
(80, 'AKONKWA  CIRHUZA  ARLENE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000072/2aM/2015-2016', '', '', ''),
(81, 'INEZA   TABARO  TYCHIQUE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000073/2aM/2015-2016', '', '', ''),
(82, 'MAPENDO  MUKENGERE  EMERAUDE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000074/2aM/2015-2016', '', '', ''),
(83, 'KARAFULI   MWANGU   WILSON', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000075/2aM/2015-2016', '', '', ''),
(84, 'NAMEGABE   RUTALE   EPHRAIM', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000076/2aM/2015-2016', '', '', ''),
(85, 'NGASSA ABOIBUNE  AARON', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000077/2aM/2015-2016', '', '', ''),
(86, 'SEBISAHO  MUNGU AKONKWA J-PHILIPPE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000078/2aM/2015-2016', '', '', ''),
(87, 'BAHII     MITUTSO      GUELORD', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000079/2aM/2015-2016', '', '', ''),
(88, 'JORDY    VIHUNDIRA  PASCAL', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000080/2aM/2015-2016', '', '', ''),
(89, 'MARIDADI    LWANZO    MURIELLE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000081/2aM/2015-2016', '', '', ''),
(90, 'GLODY        KASANZU', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000082/2aM/2015-2016', '', '', ''),
(91, 'LUANDA    TSUBA    OWEN', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000083/2aM/2015-2016', '', '', ''),
(92, 'MUSHINGI   KANEGA   CLOVIS', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000084/2aM/2015-2016', '', '', ''),
(93, 'KAVIRA    KAWITE     ANNE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000085/2aM/2015-2016', '', '', ''),
(94, 'UWINEEZA NGABO GHISLAINE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000086/2aM/2015-2016', '', '', ''),
(95, 'RUMORI NTIBENDA MARTIN', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000087/2aM/2015-2016', '', '', ''),
(96, 'SHALOOM BISHENGE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000088/2aM/2015-2016', '', '', ''),
(97, 'MUGOLI LUBULA CLEMENCE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000089/2aM/2015-2016', '', '', ''),
(98, 'LWANZO  KIVUTALIKIRWA MARIE ANGE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000090/2aM/2015-2016', '', '', ''),
(99, 'PALUKU   KITSONGO  LEONARD', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000091/2aM/2015-2016', '', '', ''),
(100, 'BEMA  DJUFITE  GAUTHIER', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000092/2aM/2015-2016', '', '', ''),
(101, 'NGANUA  RADJABU  SAMUEL', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000093/2aM/2015-2016', '', '', ''),
(102, 'NYOTA  MUHIMA  JOLIESSE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000094/2aM/2015-2016', '', '', ''),
(103, 'NZANZU  MUNGUMWA  LANDRY', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000095/2aM/2015-2016', '', '', ''),
(104, 'NOELLA  MAHAMBA LAURE STELLA', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000096/2aM/2015-2016', '', '', ''),
(105, 'EMMANUELLA  MAHAMBA LAURE ESTHER', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000097/2aM/2015-2016', '', '', ''),
(106, 'USHINDI  BARIZABO  SHELDON', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000098/2aM/2015-2016', '', '', ''),
(107, 'ANNETTE  MAPATI', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000099/2aM/2015-2016', '', '', ''),
(108, 'DANIEL    KIBUKILA', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000100/2aM/2015-2016', '', '', ''),
(109, 'MUZURI   RUKIKO  GRAZIELLA', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000101/2aM/2015-2016', '', '', ''),
(110, 'NTWALI   MUSHANGANYA  DAVID', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000102/2aM/2015-2016', '', '', ''),
(111, 'LWANZO  MUHINDO  DANIEL', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000103/2aM/2015-2016', '', '', ''),
(112, 'CIRHUZA  MADJAGI  VAINQUEUR', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000104/2aM/2015-2016', '', '', ''),
(113, 'ETHAN   NDEKO    MITIMA', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000105/2aM/2015-2016', '', '', ''),
(114, 'MACARA MATABARO MARIE FRANCOIS', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000106/2aM/2015-2016', '', '', ''),
(115, 'MWENGE BILOKO LUCIE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000107/2aM/2015-2016', '', '', ''),
(116, 'MASIKA MAYANI FORTUNE', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000108/2aM/2015-2016', '', '', ''),
(117, 'BIKABE BYAKE GABRIELLA', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000109/2aM/2015-2016', '', '', ''),
(118, 'AUDREY NYEMBAZI SAKINAH', '', '', '', '', '', '', '', '', '', 1, 3, 12, '000110/2aM/2015-2016', '', '', ''),
(119, 'MULEKI MUKENGELA PROVIDENCE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000111/2bM/2015-2016', '', '', ''),
(120, 'SANVURA NEEMA MARIE THERESE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000112/2bM/2015-2016', '', '', ''),
(121, 'LUTONDE BYEMBA SARITE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000113/2bM/2015-2016', '', '', ''),
(122, 'LUMOO NDAMWENGE NAOMI', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000114/2bM/2015-2016', '', '', ''),
(123, 'WEMA MUKENGERE ARTHURE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000115/2bM/2015-2016', '', '', ''),
(124, 'KAMBALE  MBULAMATARI BENJ', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000116/2bM/2015-2016', '', '', ''),
(125, 'ALEKI LUTONDE LUCIEE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000117/2bM/2015-2016', '', '', ''),
(126, 'EKA ZAWADI CAROLINE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000118/2bM/2015-2016', '', '', ''),
(127, 'MUGISHA RWAGA BENEDICT', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000119/2bM/2015-2016', '', '', ''),
(128, 'NZANZU MUHESI EBENEZER', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000120/2bM/2015-2016', '', '', ''),
(129, 'MUGISHO   KIRIZA  JOSUE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000121/2bM/2015-2016', '', '', ''),
(130, 'VICTORE MAYAYA M''BO  VICTOR', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000122/2bM/2015-2016', '', '', ''),
(131, 'WONDER  MAYAYA M''YA WONDER', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000123/2bM/2015-2016', '', '', ''),
(132, 'MUTOMBO  TSHIBANGU  MANASSE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000124/2bM/2015-2016', '', '', ''),
(133, 'KASOKI   FURAHA   DIANE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000125/2bM/2015-2016', '', '', ''),
(134, 'NIKUZE      NKURUNZIZA  SANDRINE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000126/2bM/2015-2016', '', '', ''),
(135, 'MUGHOLE  SIVYASOMANA  LYSA', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000127/2bM/2015-2016', '', '', ''),
(136, 'KWATEMO     WINER', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000128/2bM/2015-2016', '', '', ''),
(137, 'SELEMANI  FARAHANI  EMMANUEL', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000129/2bM/2015-2016', '', '', ''),
(138, 'FURAHA   WETEWABO  LYDIA', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000130/2bM/2015-2016', '', '', ''),
(139, 'IRAGI  BAGULA   ARMEL', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000131/2bM/2015-2016', '', '', ''),
(140, 'MWENZA   MULENDA  GERTRUDE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000132/2bM/2015-2016', '', '', ''),
(141, 'OLAME    NALAPIRE   ARIANE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000133/2bM/2015-2016', '', '', ''),
(142, 'MANGAZA   MWESHI   ANA&Atilde;S', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000134/2bM/2015-2016', '', '', ''),
(143, 'BUSOKA  MWESHI   URIEL', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000135/2bM/2015-2016', '', '', ''),
(144, 'ORLAIL DE JESUS BAVUKA JOSUE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000136/2bM/2015-2016', '', '', ''),
(145, 'NGUNUNU MUVUYA KIEFER VALZON', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000137/2bM/2015-2016', '', '', ''),
(146, 'KWINJA    NZEY    ORIANE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000138/2bM/2015-2016', '', '', ''),
(147, 'SENZIRA  UWIMANA  PAOLA', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000139/2bM/2015-2016', '', '', ''),
(148, 'AKILIMALI   MAGEZA   EXAUCE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000140/2bM/2015-2016', '', '', ''),
(149, 'SALAMA     BERTHE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000141/2bM/2015-2016', '', '', ''),
(150, 'AMANI   MIBUMBO   PROSPER', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000142/2bM/2015-2016', '', '', ''),
(151, 'AGANZE    SADIKI   GISCARD', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000143/2bM/2015-2016', '', '', ''),
(152, 'BINJA   KAZUNGU   GRACE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000144/2bM/2015-2016', '', '', ''),
(153, 'MUSAVULI  KILUHUKIRO  GRACE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000145/2bM/2015-2016', '', '', ''),
(154, 'ENGUDIACE    RUZUBA   ERASTE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000146/2bM/2015-2016', '', '', ''),
(155, 'MIGISHA   NYANDWI   DANIEL', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000147/2bM/2015-2016', '', '', ''),
(156, 'KAKULE   BAKWANAMAHA  PASCAL', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000148/2bM/2015-2016', '', '', ''),
(157, 'EUPHREM     NKURUNZIZA', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000149/2bM/2015-2016', '', '', ''),
(158, 'JESSY    NGUVURADI  ', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000150/2bM/2015-2016', '', '', ''),
(159, 'IRANGA   BAGUMA   WINER', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000151/2bM/2015-2016', '', '', ''),
(160, 'KAVIRA   MUYISA  DIVINE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000152/2bM/2015-2016', '', '', ''),
(161, 'ISHIMWE   BATEYE   HELENE', '', '', '', '', '', '', '', '', '', 1, 3, 13, '000153/2bM/2015-2016', '', '', ''),
(163, 'HAZINA   HATEGEKA    ESTHER', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 13, '000154/2bM/2015-2016', '', '', ''),
(164, 'KUBUYA    KIBIRA    JEREMIE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 13, '000155/2bM/2015-2016', '', '', ''),
(165, 'AHANA   MUSEME   BRUNELLE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 13, '000156/2bM/2015-2016', '', '', ''),
(166, 'KOKO  BARHAKENGERA   ALBIN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 13, '000157/2bM/2015-2016', '', '', ''),
(167, 'KABADJI   ASITU     PRISCA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 13, '000158/2bM/2015-2016', '', '', ''),
(168, 'BITEGETSIMANA  UWIMANA  JOSEPH', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 13, '000159/2bM/2015-2016', '', '', ''),
(169, 'GLODIE  KASANZU ', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 13, '000160/2bM/2015-2016', '', '', ''),
(170, 'KANUMA BAHAYA ELIEZER', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 13, '000161/2bM/2015-2016', '', '', ''),
(171, 'ANDY MUNEPO SHEMULINDA', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 13, '000162/2bM/2015-2016', '', '', ''),
(172, 'AKONKWA MURHULA CHRISTIAN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 13, '000163/2bM/2015-2016', '', '', ''),
(173, 'NTUMBA TSIBANGU OLIVIER', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000164/3aM/2015-2016', '', '', ''),
(174, 'KAHINDULE MAHAMBA KERENE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000165/3aM/2015-2016', '', '', ''),
(175, 'WASINGYA KAMATE GABRIELLA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000166/3aM/2015-2016', '', '', ''),
(176, 'KAOMBA LUGALI JONATHAN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000167/3aM/2015-2016', '', '', ''),
(177, 'MICHELANGE KIBUKILA IKUNJI', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000168/3aM/2015-2016', '', '', ''),
(178, 'KAVIRA MASOMEKO DIVINE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000169/3aM/2015-2016', '', '', ''),
(179, 'KAMBALE MWANZIRE URBAIN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000170/3aM/2015-2016', '', '', ''),
(180, 'OLIMWINA MULWAHALE NATHA', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000171/3aM/2015-2016', '', '', ''),
(181, 'ETHAN SITWAMINYA RAPHAEL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000172/3aM/2015-2016', '', '', ''),
(182, 'NDABITA MUTUZO INES', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000173/3aM/2015-2016', '', '', ''),
(183, 'MULINDA MPENDWA ILLIANE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000174/3aM/2015-2016', '', '', ''),
(184, 'OBUBU MBOM GAUTIER', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000175/3aM/2015-2016', '', '', ''),
(185, 'LUKOO MULUME FRANCOIS XAV', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000176/3aM/2015-2016', '', '', ''),
(186, 'ELIMU BAYAVUGE IGOR', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000177/3aM/2015-2016', '', '', ''),
(187, 'MUYISA MUHINDO MEDI', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000178/3aM/2015-2016', '', '', ''),
(188, 'MERVEILLE MWENGE GAELLE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000179/3aM/2015-2016', '', '', ''),
(189, 'MUSAVULI LETAKAMBA', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000180/3aM/2015-2016', '', '', ''),
(190, 'MUSIMWA MWETE ROMY', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000181/3aM/2015-2016', '', '', ''),
(191, 'ISEEVUNGIA BIGHANZIRE IVAN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000182/3aM/2015-2016', '', '', ''),
(192, 'MUTAWA MWEMEZI ELIE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000183/3aM/2015-2016', '', '', ''),
(193, 'WABO MUGHOLE GRADEL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000184/3aM/2015-2016', '', '', ''),
(194, 'DHALILI BIRINDWA ADELE THERES', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000185/3aM/2015-2016', '', '', ''),
(195, 'NKUSU AKILIMALI SIMON PIERRE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000186/3aM/2015-2016', '', '', ''),
(196, 'FURAHA KITUMAINI GABRIELLA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000187/3aM/2015-2016', '', '', ''),
(197, 'MAPENZI MBIKA JUDITH', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000188/3aM/2015-2016', '', '', ''),
(198, 'NABINTU  LUKUBUSI   ZITA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000189/3aM/2015-2016', '', '', ''),
(199, 'CHIZUNGU   BYEBI    ZOE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000190/3aM/2015-2016', '', '', ''),
(200, 'NYOTA  KIBENGO   KERENE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000191/3aM/2015-2016', '', '', ''),
(201, 'MUGISHO    NZEY    MARDOCHE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000192/3aM/2015-2016', '', '', ''),
(202, 'MABENESHI   MUGENI   JULIANA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000193/3aM/2015-2016', '', '', ''),
(203, 'N''SULI    BAHARA    BERYL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000194/3aM/2015-2016', '', '', ''),
(204, 'JOB      MUNYWENE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000195/3aM/2015-2016', '', '', ''),
(205, 'EMMANUELLA  BIZA   BOSS', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000196/3aM/2015-2016', '', '', ''),
(206, 'KABADJI    KIDAMA   EPIPHANY', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000197/3aM/2015-2016', '', '', ''),
(207, 'NGUMBI   BAROAMI   DIEUDONNE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000198/3aM/2015-2016', '', '', ''),
(208, 'AKEZA   MPAKANIYE   DAVID', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000199/3aM/2015-2016', '', '', ''),
(209, 'NGOYI BARAKA JEMIMA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000200/3aM/2015-2016', '', '', ''),
(210, 'IKUZWE NCUTI YVES', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000201/3aM/2015-2016', '', '', ''),
(211, 'KIMAKINDA KIMANKINDA EXAUC', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000202/3aM/2015-2016', '', '', ''),
(212, 'AKSANTI BISESO  GRADI', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000203/3aM/2015-2016', '', '', ''),
(213, 'ISSE SEKERA ELIM', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000204/3aM/2015-2016', '', '', ''),
(214, 'BINJA NDINDA AGATHE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000205/3aM/2015-2016', '', '', ''),
(215, 'BAHARANI IMANI BELIEVE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000206/3aM/2015-2016', '', '', ''),
(216, 'LUTAICHIRWA MUHIMA RYANCE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000207/3aM/2015-2016', '', '', ''),
(217, 'KAMBALE NGALYAVUSA GABRIEL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000208/3aM/2015-2016', '', '', ''),
(218, 'NAWEZA  KAKUJA  KERENE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000209/3aM/2015-2016', '', '', ''),
(219, 'KIMANKINDA KIMANKINDA EXAUCE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000210/3aM/2015-2016', '', '', ''),
(220, 'JUUDI    SOKI   DIVINE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000211/3aM/2015-2016', '', '', ''),
(221, 'BINJA  BANYANGA  PLAMEDI', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000212/3aM/2015-2016', '', '', ''),
(222, 'BENI    KABIONA  NYANGA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000213/3aM/2015-2016', '', '', ''),
(223, 'JEAN MARIE LIMBE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000214/3aM/2015-2016', '', '', ''),
(224, 'ZANGIO KAYAND DAN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000215/3aM/2015-2016', '', '', ''),
(225, 'BAHATI MATEMBERA GHISLAIN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000216/3aM/2015-2016', '', '', ''),
(226, 'LUCIEE TSIRIRE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 27, '000217/3aM/2015-2016', '', '', ''),
(227, 'ARIEL DJALI IRANZI', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000218/3aM/2015-2016', '', '', ''),
(228, 'JUSTICE NYEMBAZI JEAN LUC', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 27, '000219/3aM/2015-2016', '', '', ''),
(229, 'ADROPIA   MBALI     AUBIN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000220/3bM/2015-2016', '', '', ''),
(230, 'BAKUNGU   KITOKO    PATRICK', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000221/3bM/2015-2016', '', '', ''),
(231, 'KAHAMBU  MUPOPOLO   LANDRINE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000222/3bM/2015-2016', '', '', ''),
(232, 'UMUHOZA   OBEDI    HENRIETTE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000223/3bM/2015-2016', '', '', ''),
(233, 'PLCKY   SMAT     BANABEKA', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000224/3bM/2015-2016', '', '', ''),
(234, 'MULUZIKAZI    AKIBA    JOYCE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000225/3bM/2015-2016', '', '', ''),
(235, 'ACHIL KAMBALE KIOMA', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000226/3bM/2015-2016', '', '', ''),
(236, 'IRATUZI NIYOSENGA EMILIE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000227/3bM/2015-2016', '', '', ''),
(237, 'NGALO   BALEMBA   NEVILLE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000228/3bM/2015-2016', '', '', ''),
(238, 'NABINTU  KABENE  NERIANA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000229/3bM/2015-2016', '', '', ''),
(239, 'MUGENI   MASERELI   GLORIA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000230/3bM/2015-2016', '', '', ''),
(240, 'HERMAN BORMANN MITIMA OTHNIEL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000231/3bM/2015-2016', '', '', ''),
(241, 'MULINDA  SEMIVUMBI    BRUNO', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000232/3bM/2015-2016', '', '', ''),
(242, 'TSHALI  KYABONGA  TRESOR', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000233/3bM/2015-2016', '', '', ''),
(243, 'KUBUYA   NGULU   ZOE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000234/3bM/2015-2016', '', '', ''),
(244, 'WANNY   BAZUNGU   ROSETTE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000235/3bM/2015-2016', '', '', ''),
(245, 'MUSHAGALUSA  SIMBA  JOS', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000236/3bM/2015-2016', '', '', ''),
(246, 'KABALA  MIKALANO  MARIE-ANGE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000237/3bM/2015-2016', '', '', ''),
(247, 'BUSIME  MUNYWANO  DON PASCAL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000238/3bM/2015-2016', '', '', ''),
(248, 'FINEY      KAMATHE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000239/3bM/2015-2016', '', '', ''),
(249, 'KAVIRA   MUSAVULI   KERENE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000240/3bM/2015-2016', '', '', ''),
(250, 'TULIBAUMA NDOOLE  GRATIEN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000241/3bM/2015-2016', '', '', ''),
(251, 'LYNDA   MUGARA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000242/3bM/2015-2016', '', '', ''),
(252, 'MALALA  MBITSEMUNDA  SAMANTHA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000243/3bM/2015-2016', '', '', ''),
(253, 'MUMBERE  MUHINGI    JAPHET', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000244/3bM/2015-2016', '', '', ''),
(254, 'MUJINGA   KALONJI    BENITE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000245/3bM/2015-2016', '', '', ''),
(255, 'KARUMBA  NAMULISA  ANGELIQUE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000246/3bM/2015-2016', '', '', ''),
(256, 'NTAWABO    GRACIA   MYRIAM', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000247/3bM/2015-2016', '', '', ''),
(257, 'BWINJA  NSHOKANO   GLODY', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000248/3bM/2015-2016', '', '', ''),
(258, 'N''SIMIRE    ZABIKA   JOSLINE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000249/3bM/2015-2016', '', '', ''),
(259, 'AMBOMA   ANETTE  MARIE IMMACULEE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000250/3bM/2015-2016', '', '', ''),
(260, 'ZIMPEREZE    KALEMBE   DARSIN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000251/3bM/2015-2016', '', '', ''),
(261, 'LUMOO   MUSHAKULI   CHRISTINE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000252/3bM/2015-2016', '', '', ''),
(262, 'BINJA  MUNYIRAGI   EMILIE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000253/3bM/2015-2016', '', '', ''),
(263, 'AMANDA  NYALUNDJA    ANSIMA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000254/3bM/2015-2016', '', '', ''),
(264, 'CHEKANABO   NDUME   KENAYAH', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000255/3bM/2015-2016', '', '', ''),
(265, 'SAMVURA  ZABANDORA   ALICE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000256/3bM/2015-2016', '', '', ''),
(266, 'WANNY   CHIRIMWAMI  BERLYCIA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000257/3bM/2015-2016', '', '', ''),
(267, 'MALKIYA    LWANZO    URSULE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000258/3bM/2015-2016', '', '', ''),
(268, 'MICHO   NDAGANO    RAPHAELLA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000259/3bM/2015-2016', '', '', ''),
(269, 'LUTONDE  SUKALI    ANA&Iuml;S', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000260/3bM/2015-2016', '', '', ''),
(270, 'KAPITA  MULUMBA  GAETAN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000261/3bM/2015-2016', '', '', ''),
(271, 'AMANI    MWEMEZI    KETHIA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000262/3bM/2015-2016', '', '', ''),
(272, 'MWINJA  KANEGA   CLOTILD', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000263/3bM/2015-2016', '', '', ''),
(273, 'KITENGI  MWANAWAVENE   FELIX', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000264/3bM/2015-2016', '', '', ''),
(274, 'CUBAHIRO    RUYENZI   ISRAEL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000265/3bM/2015-2016', '', '', ''),
(275, 'ASIFIWE MUKENGERWA JESSICA', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000266/3bM/2015-2016', '', '', ''),
(276, 'TEGAMENE FARADJA RAPHAEL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000267/3bM/2015-2016', '', '', ''),
(277, 'MURHULA LUBULA ISRAEL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000268/3bM/2015-2016', '', '', ''),
(278, 'MUNGANGA KASEREKA CHERUBIN', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000269/3bM/2015-2016', '', '', ''),
(279, 'BARAKA MUNDEKE AURELIE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000270/3bM/2015-2016', '', '', ''),
(280, 'EKA ZAWADI CAROLINE', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000271/3bM/2015-2016', '', '', ''),
(281, 'POYO CHAKUPEWA QUEEN', '', '', 'Feminin', '', '', '', '', '', '', 1, 3, 15, '000272/3bM/2015-2016', '', '', ''),
(282, 'MANFA NEEMA SITHRI', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000273/3bM/2015-2016', '', '', ''),
(283, 'TOUS SAINT BAHATI MAFARA', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000274/3bM/2015-2016', '', '', ''),
(284, 'NIMINZUNDU KWETHO THEODORE', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000275/3bM/2015-2016', '', '', ''),
(285, 'TUMUSIME NDOOLE EMMANUEL', '', '', 'Masculin', '', '', '', '', '', '', 1, 3, 15, '000276/3bM/2015-2016', '', '', ''),
(286, 'AKONKWA BAVUGA AARON', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000001/1aP/2015-2016', '', '', ''),
(287, 'ALIANCE  NDAYALBAJE  GAKURU', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000002/1aP/2015-2016', '', '', ''),
(288, 'ALICE  NDAYAMBAJE  GATO', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000003/1aP/2015-2016', '', '', ''),
(289, 'ALIMBA   SAFARI   CLAUDETTE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000004/1aP/2015-2016', '', '', ''),
(290, 'AMBIKA MANEGABE NGOA NGAJ', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000005/1aP/2015-2016', '', '', ''),
(291, 'ARLETTE  NDAYAMBAJE  CIZA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000006/1aP/2015-2016', '', '', ''),
(292, 'AWEZAYE MAGEZA GAELLE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000007/1aP/2015-2016', '', '', ''),
(293, 'BAHERENI MUHINDO RICHARD', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000008/1aP/2015-2016', '', '', ''),
(294, 'BAHIGA NABINTU LISA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000009/1aP/2015-2016', '', '', ''),
(295, 'BALIHAMWABO KIRIZA  DEBORAH', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000010/1aP/2015-2016', '', '', ''),
(296, 'BATUNDI  KATEMBESI  DIEME', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000011/1aP/2015-2016', '', '', ''),
(297, 'BENEDICT AMANI', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000012/1aP/2015-2016', '', '', ''),
(298, 'BIDII   TUMUSABIRE   AMOS', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000013/1aP/2015-2016', '', '', ''),
(299, 'BONVA NSIMIRE EMMANUELLA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000014/1aP/2015-2016', '', '', ''),
(300, 'BUTU SHELWANDA ELIEZER', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000015/1aP/2015-2016', '', '', ''),
(301, 'DAVID  MURULA   BADERHA', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000016/1aP/2015-2016', '', '', ''),
(302, 'FADHILI    MIBUMBO  GLORIEUSE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000017/1aP/2015-2016', '', '', ''),
(303, 'FURAHA MAGAYANE ARIANA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000018/1aP/2015-2016', '', '', ''),
(304, 'JOSUE   MUNYWENE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000019/1aP/2015-2016', '', '', ''),
(305, 'KAMBERE BWENGE AIME JOSEPH', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000020/1aP/2015-2016', '', '', ''),
(306, 'KELY MATEBE KANYENGETE CHEM', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000021/1aP/2015-2016', '', '', ''),
(307, 'KERENE KATARAKA MARIE ', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000022/1aP/2015-2016', '', '', ''),
(308, 'KETHIA NDIMANYA ', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000023/1aP/2015-2016', '', '', ''),
(309, 'LINDA KAMBAMBA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000024/1aP/2015-2016', '', '', ''),
(310, 'LUANDA NDAMWENGE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000025/1aP/2015-2016', '', '', ''),
(311, 'MAOTELA    BAROAMI  MOISE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000026/1aP/2015-2016', '', '', ''),
(312, 'MARIE FELICITE SOKONI KETHIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000027/1aP/2015-2016', '', '', ''),
(313, 'MASIKA  SIYAVIRWA   KERENE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000028/1aP/2015-2016', '', '', ''),
(314, 'MAYALA NSIMIRE  JOCKEBED', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000029/1aP/2015-2016', '', '', ''),
(315, 'MINANI  BIERAGI    JOSUE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000030/1aP/2015-2016', '', '', ''),
(316, 'MIRINDI AGANZE APHET', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000031/1aP/2015-2016', '', '', ''),
(317, 'MUGOLI   KAJABIKA   JUDITH', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000032/1aP/2015-2016', '', '', ''),
(318, 'MUGOLI BADIBANGA VICTOIRE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000033/1aP/2015-2016', '', '', ''),
(319, 'MUSEMAKWEELI MUGIRANEZA PROMESSE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000034/1aP/2015-2016', '', '', ''),
(320, 'MUSHAGALUSA  KAYIRARA  APOLINAIRE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000035/1aP/2015-2016', '', '', ''),
(321, 'MUVUYA NGUNUNU', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000036/1aP/2015-2016', '', '', ''),
(322, 'MWELWA KUMINGI CHRISTINA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000037/1aP/2015-2016', '', '', ''),
(323, 'NABAKAZI MUSANGANYA', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000038/1aP/2015-2016', '', '', ''),
(324, 'NAWEZA KAZUNGU JOYCE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000039/1aP/2015-2016', '', '', ''),
(325, 'NDABITA ISHEMA TOUS SAINT', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000040/1aP/2015-2016', '', '', ''),
(326, 'NDUVAGO ILERE HUGUES', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000041/1aP/2015-2016', '', '', ''),
(327, 'NZANZU  SIVUTALIKIRWA  MICHAEL', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000042/1aP/2015-2016', '', '', ''),
(328, 'REBECCA LUBUA SUN', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000043/1aP/2015-2016', '', '', ''),
(329, 'SAMUELLA  HIRWA   BOSS', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 16, '000044/1aP/2015-2016', '', '', ''),
(330, 'SEDRIC      NDABEREYE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000045/1aP/2015-2016', '', '', ''),
(331, 'TUZA HATEGEKA BECKER', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000046/1aP/2015-2016', '', '', ''),
(332, 'WANDIMOYI BYEMBA AARON', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 16, '000047/1aP/2015-2016', '', '', ''),
(333, 'ASANTE    KITUMAINI  LAETTITIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000048/1bP/2015-2016', '', '', ''),
(334, 'ASIFIWE MUKUBITO ESPOIRE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000049/1bP/2015-2016', '', '', ''),
(335, 'BAHATI BANTUZEKO', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000050/1bP/2015-2016', '', '', ''),
(336, 'BALEKE   NSHOKANO    AUGUSTIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000051/1bP/2015-2016', '', '', ''),
(337, 'BENE  SAMBA   MARIANA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000052/1bP/2015-2016', '', '', ''),
(338, 'BIRUKE  LIMBA   HYACINTHE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000053/1bP/2015-2016', '', '', ''),
(339, 'BIZI    RWAJE   GLORY', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000054/1bP/2015-2016', '', '', ''),
(340, 'BONVA MUNGUANKONKWA  MARTINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000055/1bP/2015-2016', '', '', ''),
(341, 'BUUMA  TSUBA   ORACLE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000056/1bP/2015-2016', '', '', ''),
(342, 'CHRISTIANA   BAENI', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000057/1bP/2015-2016', '', '', ''),
(343, 'CUBAKA   BAZUNGU  RAPHAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000058/1bP/2015-2016', '', '', ''),
(344, 'CYNTHIA     KAMATHE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000059/1bP/2015-2016', '', '', ''),
(345, 'EXAUCE   KIKUNI    MICHEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000060/1bP/2015-2016', '', '', ''),
(346, 'FARADJA   BARIZABO   MICHAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000061/1bP/2015-2016', '', '', ''),
(347, 'FURAHA   BAHIMUZI   MARGUERITE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000062/1bP/2015-2016', '', '', ''),
(348, 'GEORGETTE  LUGABA  ANGELLA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000063/1bP/2015-2016', '', '', ''),
(349, 'GUSHAZO   KALEMBE   DAVID', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000064/1bP/2015-2016', '', '', ''),
(350, 'HEKIMA   HATEGEKA  BENEDICTE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000065/1bP/2015-2016', '', '', ''),
(351, 'KABALA NTAMBWE ', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000066/1bP/2015-2016', '', '', ''),
(352, 'KAHINDO   MUPOPOLO    SARAH', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000067/1bP/2015-2016', '', '', ''),
(353, 'KAHINDO ZABONA USTINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000068/1bP/2015-2016', '', '', ''),
(354, 'KAMBALE   MBOKANI   EXAUCE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000069/1bP/2015-2016', '', '', ''),
(355, 'KAMUHA MWIRA DESPAIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000070/1bP/2015-2016', '', '', ''),
(356, 'KARAFULI  SIVA  WINER', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000071/1bP/2015-2016', '', '', ''),
(357, 'LINDA MAHENGA MUGOLI', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000072/1bP/2015-2016', '', '', ''),
(358, 'MALAIKA  BIFUMBU   CLOE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000073/1bP/2015-2016', '', '', ''),
(359, 'MAPATI  NGISSE   ARIEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000074/1bP/2015-2016', '', '', ''),
(360, 'MARIE PERPETUE SOKONI', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000075/1bP/2015-2016', '', '', ''),
(361, 'MARIE-NOELLA  SAMVURA  HEUREUSE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000076/1bP/2015-2016', '', '', ''),
(362, 'MASIKA  MUYISA   DAVINA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000077/1bP/2015-2016', '', '', ''),
(363, 'MBUYI   KALONJI    DIVINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000078/1bP/2015-2016', '', '', ''),
(364, 'MICHEELINE FAILA MANDUFU', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000079/1bP/2015-2016', '', '', ''),
(365, 'MUKISA   MUHIRWA   EXAUCE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000080/1bP/2015-2016', '', '', ''),
(366, 'MUNDEKE    SUKALI     ANDY', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000081/1bP/2015-2016', '', '', ''),
(367, 'MUNEZERO    MATUNGO     YVES', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000082/1bP/2015-2016', '', '', ''),
(368, 'MUYISA     LWANZO     URIEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000083/1bP/2015-2016', '', '', ''),
(369, 'MWANZE     YUNI    BARACKIEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000084/1bP/2015-2016', '', '', ''),
(370, 'NABINTU   MADJAGI   CELESTINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000085/1bP/2015-2016', '', '', ''),
(371, 'NATHAN  NYALUNDJA     ANDEMA', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000086/1bP/2015-2016', '', '', ''),
(372, 'NGASSA  ADUBO  JUVENAL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000087/1bP/2015-2016', '', '', ''),
(373, 'NSHOBOLE NYORHA KERENE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000088/1bP/2015-2016', '', '', ''),
(374, 'NSIMIRE  MUKENGERE  EREKA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000089/1bP/2015-2016', '', '', ''),
(375, 'NYAMANDIBWA LWANGILA  EXAUCE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000090/1bP/2015-2016', '', '', ''),
(376, 'NZIAVAKE   KAYIHEMBAKO   SONIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000091/1bP/2015-2016', '', '', ''),
(377, 'SEBISAHO   MAENDELEO    GEDEON', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000092/1bP/2015-2016', '', '', ''),
(378, 'SHUKURU  MPAKANIYE   DANY', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 18, '000093/1bP/2015-2016', '', '', ''),
(379, 'UWERA   NGABO    JUSTINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000094/1bP/2015-2016', '', '', ''),
(380, 'WERAGI    NZEY   PLAMEDI', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 18, '000095/1bP/2015-2016', '', '', ''),
(381, 'AGANZE MAHAZI JULIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000096/2aP/2015-2016', '', '', ''),
(382, 'AMISI KASHEKE CRYSTAL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000097/2aP/2015-2016', '', '', ''),
(383, 'ANDRE KAMBALALA', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000098/2aP/2015-2016', '', '', ''),
(384, 'ASIMWE MULLWAHALE ELIEZER', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000099/2aP/2015-2016', '', '', ''),
(385, 'BADIKA    NKWEY', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000100/2aP/2015-2016', '', '', ''),
(386, 'BASHENGEZI NGUFU SCOFIELD', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000101/2aP/2015-2016', '', '', ''),
(387, 'BWENGE MALIRO', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000102/2aP/2015-2016', '', '', ''),
(388, 'DANIELLA KATAVALI ', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000103/2aP/2015-2016', '', '', ''),
(389, 'ELIE MATEBE DUCASTRAU', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000104/2aP/2015-2016', '', '', ''),
(390, 'HABAMUNGU NABAMI URSULE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000105/2aP/2015-2016', '', '', ''),
(391, 'HEKIMA    CALEB', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000106/2aP/2015-2016', '', '', ''),
(392, 'HESHIMA SANGANYA ACHILE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000107/2aP/2015-2016', '', '', ''),
(393, 'KAMBALE SELENGE PONTIEN ', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000108/2aP/2015-2016', '', '', ''),
(394, 'KIBUYA  MUNIHIRE   YVES', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000109/2aP/2015-2016', '', '', ''),
(395, 'LINDA BAGUMA EXODYS', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000110/2aP/2015-2016', '', '', ''),
(396, 'MAILAKA MUHIMA DIANCE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000111/2aP/2015-2016', '', '', ''),
(397, 'MASIKA KITAUSA JEMIMA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000112/2aP/2015-2016', '', '', ''),
(398, 'MASIKA MASOAMEKO PROVIDENCE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000113/2aP/2015-2016', '', '', ''),
(399, 'MEMA HABAMUNGU HARMONIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000114/2aP/2015-2016', '', '', ''),
(400, 'MUGARUKA BAYUBASIRE FLORIAN', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000115/2aP/2015-2016', '', '', ''),
(401, 'MUHINDO BIGHANZIRE IRENEEE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000116/2aP/2015-2016', '', '', ''),
(402, 'MUHINDO MWALITSA AFREDO', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000117/2aP/2015-2016', '', '', ''),
(403, 'MUKANIRE MUGOLI ALEXANDRA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000118/2aP/2015-2016', '', '', ''),
(404, 'MUMBERE MWANZIRE PIERRE V', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000119/2aP/2015-2016', '', '', ''),
(405, 'MUSHALUSA BAGUMA DONACIE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000120/2aP/2015-2016', '', '', ''),
(406, 'MWINJA KAMBALALA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000121/2aP/2015-2016', '', '', ''),
(407, 'NEEMA   BIKUBA  WIVINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000122/2aP/2015-2016', '', '', ''),
(408, 'NEEMA MUNDEKE GAELLE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000123/2aP/2015-2016', '', '', ''),
(409, 'NKIKO TABARO JEAN JOHNNY', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000124/2aP/2015-2016', '', '', ''),
(410, 'OTONO MPENDWA LYSE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000125/2aP/2015-2016', '', '', ''),
(411, 'SENZIRA NKURUNZIZA JEAN JAC', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000126/2aP/2015-2016', '', '', ''),
(412, 'SOFIA MBULAMATARI KERENE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000127/2aP/2015-2016', '', '', ''),
(413, 'TAI    BALEMBA    JOSEPH    ', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 19, '000128/2aP/2015-2016', '', '', ''),
(414, 'VAGHHENI NZIWA THERESE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000129/2aP/2015-2016', '', '', ''),
(415, 'WABIWA NTUMBA GLORIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000130/2aP/2015-2016', '', '', ''),
(416, 'WIZEYE FURAHA BARBARA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 19, '000131/2aP/2015-2016', '', '', ''),
(417, 'ADROPIA   KAZIENE    JOCELINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000132/2bP/2015-2016', '', '', ''),
(418, 'ALSACE   RUZUBA   PRINCE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000133/2bP/2015-2016', '', '', ''),
(419, 'AMBOMA  LISANGA  EBBER', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000134/2bP/2015-2016', '', '', ''),
(420, 'ASHIMWE   NDINDAYINO    BENOIT', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000135/2bP/2015-2016', '', '', ''),
(421, 'ASIA    MUDOSA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000136/2bP/2015-2016', '', '', ''),
(422, 'ASIFIWE   DJUFITE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000137/2bP/2015-2016', '', '', ''),
(423, 'BARAKA MUKENGERWA GHISLAIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000138/2bP/2015-2016', '', '', '');
INSERT INTO `tbl__17inscription__des__eleves` (`inscription__des__eleves_id`, `nom__complet`, `lieu__de__naissance`, `date__de__naissance`, `genre`, `ecole__de__provenance`, `classe__de__provenance`, `point__obtenus`, `conduite__obtnue`, `adresse`, `personne__responsable`, `section_id`, `option_id`, `classe_id`, `numero__matricule`, `photo`, `telephone__personne__de__reference`, `moyen__de__locomotion`) VALUES
(424, 'BARBARA IRUNDU MIRADI', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000139/2bP/2015-2016', '', '', ''),
(425, 'BUHORO   ZABIKA    JULIENNE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000140/2bP/2015-2016', '', '', ''),
(426, 'GRACE    MOSALA    RADJABU', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000141/2bP/2015-2016', '', '', ''),
(427, 'JOHAN   KAYIHEMBAKO  JOHAN', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000142/2bP/2015-2016', '', '', ''),
(428, 'KAHINDO   MUSAVULI  CECILE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000143/2bP/2015-2016', '', '', ''),
(429, 'KARAKUBWA LUBULA ANICET', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000144/2bP/2015-2016', '', '', ''),
(430, 'KARUMBA  NSHOBOLE  CELESTINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000145/2bP/2015-2016', '', '', ''),
(431, 'KEZA  NDAGANO  MARIE-CLEMENTINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000146/2bP/2015-2016', '', '', ''),
(432, 'KIROKIRO MUHIMA PATRICE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000147/2bP/2015-2016', '', '', ''),
(433, 'MBAKANIAKI  KASOLENE  SONIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000148/2bP/2015-2016', '', '', ''),
(434, 'MIHIO   MUSHAKULI   CHRIS-PAIX', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000149/2bP/2015-2016', '', '', ''),
(435, 'MIKA   MATHE   PROPHETE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000150/2bP/2015-2016', '', '', ''),
(436, 'MILAY    CHANGWI   CONSOLATRICE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000151/2bP/2015-2016', '', '', ''),
(437, 'MIRINDI   RUTALE   ELIEZER', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000152/2bP/2015-2016', '', '', ''),
(438, 'MITHO    MULENDA   GERVIANE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000153/2bP/2015-2016', '', '', ''),
(439, 'MUGHOLE    VAHAMWITI', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000154/2bP/2015-2016', '', '', ''),
(440, 'MUHAMBIKWA SHEMATSI VIVIANE', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000155/2bP/2015-2016', '', '', ''),
(441, 'MUKANIRE   MUGOLI   ALEXANDRA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000156/2bP/2015-2016', '', '', ''),
(442, 'MUMBERE  KABUYAYA   FREDY', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000157/2bP/2015-2016', '', '', ''),
(443, 'MUSHANGANYA  SIMBA  JETHRO', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000158/2bP/2015-2016', '', '', ''),
(444, 'MUYISA    YUNI   MICKELANGE', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000159/2bP/2015-2016', '', '', ''),
(445, 'MWALI   MASERELI    GRACIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000160/2bP/2015-2016', '', '', ''),
(446, 'MWANAMUMBA  ONOSENGA JOEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000161/2bP/2015-2016', '', '', ''),
(447, 'N''KAMIA   SANGARA   ASHLEY', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000162/2bP/2015-2016', '', '', ''),
(448, 'NTAWABO  SULTANI    DANIEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000163/2bP/2015-2016', '', '', ''),
(449, 'PROMESSE   BANABEKA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000164/2bP/2015-2016', '', '', ''),
(450, 'SALAMA   NGULU  NOAH', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000165/2bP/2015-2016', '', '', ''),
(451, 'SALAMA SHAMAVU XAVERINA', '', '', 'Feminin', '', '', '', '', '', '', 2, 4, 20, '000166/2bP/2015-2016', '', '', ''),
(452, 'SALUMU KABEMBA CHRISALEM', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000167/2bP/2015-2016', '', '', ''),
(453, 'ZANGIO KAMBWEL SHIMON', '', '', 'Masculin', '', '', '', '', '', '', 2, 4, 20, '000168/2bP/2015-2016', '', '', ''),
(454, 'AARON TSIRIRE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000001/3aP/2015-2016', '', '', ''),
(455, 'AGANZE BAGUMA DON BENI', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000002/3aP/2015-2016', '', '', ''),
(456, 'AGANZE KASAMURA LAURENCE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000003/3aP/2015-2016', '', '', ''),
(457, 'AMANI  VANZIRWE   INSE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000004/3aP/2015-2016', '', '', ''),
(458, 'AMANI MWEMEZI', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000005/3aP/2015-2016', '', '', ''),
(459, 'AMANI NAMUNINGA URBAIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000006/3aP/2015-2016', '', '', ''),
(460, 'ASINA NTUMBA MIRIAM', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000007/3aP/2015-2016', '', '', ''),
(461, 'BAHATI    KABENE  TRESOR', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000008/3aP/2015-2016', '', '', ''),
(462, 'BAHERENIE KASOKI RUFFINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000009/3aP/2015-2016', '', '', ''),
(463, 'BAUMA NDOOLE EMMANUELLA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000010/3aP/2015-2016', '', '', ''),
(464, 'BITWEMOA KIBANJA RAPHAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000011/3aP/2015-2016', '', '', ''),
(465, 'CHRISTALINE NDAYE GIFT', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000012/3aP/2015-2016', '', '', ''),
(466, 'CIZUNGU BARAC''K KEITH', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000013/3aP/2015-2016', '', '', ''),
(467, 'ELIMU SANGANYA YVES', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000014/3aP/2015-2016', '', '', ''),
(468, 'FAES MWENGENINDI JOSPIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000015/3aP/2015-2016', '', '', ''),
(469, 'FARADA RADABU MAMY', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000016/3aP/2015-2016', '', '', ''),
(470, 'IDOMONANO ATIBAGEU', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000017/3aP/2015-2016', '', '', ''),
(471, 'KAB KWETHO SYLVIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000018/3aP/2015-2016', '', '', ''),
(472, 'KETHIA KATARAKA YAYA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000019/3aP/2015-2016', '', '', ''),
(473, 'KIBUKILA MALIMINGI BRIGHT', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000020/3aP/2015-2016', '', '', ''),
(474, 'KITUMAINI SAFARI RAPHAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000021/3aP/2015-2016', '', '', ''),
(475, 'KWATEMO LIONGALA', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000022/3aP/2015-2016', '', '', ''),
(476, 'LINDA BAHIMUZI LEATITIS', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000023/3aP/2015-2016', '', '', ''),
(477, 'LUBUTO NDAMWENGE COLETTE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000024/3aP/2015-2016', '', '', ''),
(478, 'MASHIMANGO LIMBE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000025/3aP/2015-2016', '', '', ''),
(479, 'MASIKA AKILI TSONGO BERTE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000026/3aP/2015-2016', '', '', ''),
(480, 'MAYALA NGAMABA JOTHAM', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000027/3aP/2015-2016', '', '', ''),
(481, 'MUKANIRE MUGISHO JEAN MICHEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000028/3aP/2015-2016', '', '', ''),
(482, 'MULWANA BISESO WITNESS', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000029/3aP/2015-2016', '', '', ''),
(483, 'MUNGOMBA NZIWA ESTELLE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000030/3aP/2015-2016', '', '', ''),
(484, 'MURONGANYI NYANGUBA ALFRE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000031/3aP/2015-2016', '', '', ''),
(485, 'NDUNGO WAHALI MOZART', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000032/3aP/2015-2016', '', '', ''),
(486, 'NEEMA   MWIRA  ROSALIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000033/3aP/2015-2016', '', '', ''),
(487, 'NGISE MWANA ELIORE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000034/3aP/2015-2016', '', '', ''),
(488, 'NSIMIRE RUBONEKA IMMACULEE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000035/3aP/2015-2016', '', '', ''),
(489, 'NZIAVAKE SHEMULINDA KERENE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000036/3aP/2015-2016', '', '', ''),
(490, 'NZIWA KYAVIRO TRUDON', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000037/3aP/2015-2016', '', '', ''),
(491, 'OLAME MANEGABE BENEDICT', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000038/3aP/2015-2016', '', '', ''),
(492, 'SEMBAITO MASANGA', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000039/3aP/2015-2016', '', '', ''),
(493, 'AARON   AMULI   ANDRE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000040/3aP/2015-2016', '', '', ''),
(494, 'ADA      FAZILA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000041/3aP/2015-2016', '', '', ''),
(495, 'ASIFIWE     RWAJE   CATHERINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000042/3aP/2015-2016', '', '', ''),
(496, 'BABIKIRE SHEMULINDA KETHIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000043/3aP/2015-2016', '', '', ''),
(497, 'BAGUMA ZABONA JOSPAIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000044/3aP/2015-2016', '', '', ''),
(498, 'BIRUKE   NTWALI  MARC-ANTOINE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 21, '000045/3aP/2015-2016', '', '', ''),
(499, 'BONEZA NTIBENDA AUDACE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 21, '000046/3aP/2015-2016', '', '', ''),
(500, 'BWENGE  BOLINGO   TUVIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000047/3bP/2015-2016', '', '', ''),
(501, 'FAZILI   HATEGEKA   LAETITIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000048/3bP/2015-2016', '', '', ''),
(502, 'GANZA   KAPALATA   CALEB', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000049/3bP/2015-2016', '', '', ''),
(503, 'GWARHAZO   KALEMBE   DANIEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000050/3bP/2015-2016', '', '', ''),
(504, 'HUGUE   KABIONA  NYANGA', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000051/3bP/2015-2016', '', '', ''),
(505, 'IRAGI NYORHA GAELLE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000052/3bP/2015-2016', '', '', ''),
(506, 'IZI      SAMVURA   INNOCENT', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000053/3bP/2015-2016', '', '', ''),
(507, 'JONATHAN  HAKIZIMANA   ZIGAMA', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000054/3bP/2015-2016', '', '', ''),
(508, 'JOYCE SAA SITA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000055/3bP/2015-2016', '', '', ''),
(509, 'KABEYA DAVID KANGUDIA', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000056/3bP/2015-2016', '', '', ''),
(510, 'KAHINDO KANYAMWAMI PLAMEDI', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000057/3bP/2015-2016', '', '', ''),
(511, 'KAHINDO KATSUVA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000058/3bP/2015-2016', '', '', ''),
(512, 'KATEMBWE ONOSENGA GABIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000059/3bP/2015-2016', '', '', ''),
(513, 'LANDRY  KAPITA  GERMAIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000060/3bP/2015-2016', '', '', ''),
(514, 'MIKANIRE  MUGISHO  JEAN - MICHEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000061/3bP/2015-2016', '', '', ''),
(515, 'MIMO   SUKALI     LO&Iuml;C', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000062/3bP/2015-2016', '', '', ''),
(516, 'MINANI   ITUKA      DEBORAH', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000063/3bP/2015-2016', '', '', ''),
(517, 'MUGISHO  LUBULA NICOLAS', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000064/3bP/2015-2016', '', '', ''),
(518, 'MUNGUAKONKWA MATEMBERAJOACHIM', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000065/3bP/2015-2016', '', '', ''),
(519, 'MUTAWA   MWEMEZI    ELIE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000066/3bP/2015-2016', '', '', ''),
(520, 'MWAZANI WALIUZI ESPEDI', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000067/3bP/2015-2016', '', '', ''),
(521, 'NABINTU   KAKUJA   KETHIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000068/3bP/2015-2016', '', '', ''),
(522, 'NZANZU    MUSAVULI  ANACLET', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000069/3bP/2015-2016', '', '', ''),
(523, 'OLANGA   SAFARI   BENIT', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000070/3bP/2015-2016', '', '', ''),
(524, 'SEBISAHO   MALI YETU   JESSICA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000071/3bP/2015-2016', '', '', ''),
(525, 'SENGI KAMANZI CHADRACK', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000072/3bP/2015-2016', '', '', ''),
(526, 'SHUKURU AMULI JEAN JACQUES', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000073/3bP/2015-2016', '', '', ''),
(527, 'SOKI MANZEKELE JOSLYNE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000074/3bP/2015-2016', '', '', ''),
(528, 'TUMUSABIRE   BORA   ABONDANCE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000075/3bP/2015-2016', '', '', ''),
(529, 'TUMUSABIRE NGYMWE   ESTHER', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000076/3bP/2015-2016', '', '', ''),
(530, 'UWERA  NDABEREYE   DORCAS', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000077/3bP/2015-2016', '', '', ''),
(531, 'WELI  BWENGE   LUCIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000078/3bP/2015-2016', '', '', ''),
(532, 'WILONJA MUKALANGWA JONATHAN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000079/3bP/2015-2016', '', '', ''),
(533, 'AKONKWA MAGEZA MARIE REINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 23, '000080/4aP/2015-2016', '', '', ''),
(534, 'ALAME MUSANGANYA', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000081/4aP/2015-2016', '', '', ''),
(535, 'BAVUKA AMANI ORLEAN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000082/4aP/2015-2016', '', '', ''),
(536, 'BILUGE BADIBANGA PLAMEDI', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 22, '000083/3bP/2015-2016', '', '', ''),
(537, 'CHAMAGAGEE DJUFITE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000084/4aP/2015-2016', '', '', ''),
(538, 'CHRISTIANA NDAYE LOVELY', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 23, '000085/4aP/2015-2016', '', '', ''),
(539, 'CIZUNGU N''ZIGIRE EMMANUELLA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 23, '000086/4aP/2015-2016', '', '', ''),
(540, 'ELISHA BUZIRO', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000087/4aP/2015-2016', '', '', ''),
(541, 'ESTHER MAP&Euml;NDO', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 23, '000088/4aP/2015-2016', '', '', ''),
(542, 'HABAMUNGU MWEMA ELIE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000089/4aP/2015-2016', '', '', ''),
(543, 'IMOA NYANGUBA ANGELE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 23, '000090/4aP/2015-2016', '', '', ''),
(544, 'IRAGI KARUNGU GRADIS MATHIAS', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000091/4aP/2015-2016', '', '', ''),
(545, 'IRAKIZA NTWARI MAGNIFICAT', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000092/4aP/2015-2016', '', '', ''),
(546, 'KASEREKA MAKUTA GRADI', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000093/4aP/2015-2016', '', '', ''),
(547, 'KATEMPA MPENDA EDNA', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000094/4aP/2015-2016', '', '', ''),
(548, 'KITUMAINI MUPENZI MICHAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000095/4aP/2015-2016', '', '', ''),
(549, 'KIZANYE MALIRO', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000096/4aP/2015-2016', '', '', ''),
(550, 'MASOA NABANTU ANGES PRUD', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 23, '000097/4aP/2015-2016', '', '', ''),
(551, 'MUCYO   HAKIZA   DELPHIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000098/4aP/2015-2016', '', '', ''),
(552, 'MUHINDO MBULAMATARI JIBRIL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000099/4aP/2015-2016', '', '', ''),
(553, 'MUMBERE KATSUVA MICHAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000100/4aP/2015-2016', '', '', ''),
(554, 'MUSEMA KWELI PREMISSE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 23, '000101/4aP/2015-2016', '', '', ''),
(555, 'NDUVAMVAGO NEZA INGRID', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000102/4aP/2015-2016', '', '', ''),
(556, 'NGUFU BILUGE MICHELINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 23, '000103/4aP/2015-2016', '', '', ''),
(557, 'NKIKO NDIZEYE JOICE CHRISTELLE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 23, '000104/4aP/2015-2016', '', '', ''),
(558, 'NSHOBOLE RUBONEKA MYRIAM', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000105/4aP/2015-2016', '', '', ''),
(559, 'NZANZU  KAKULE  HUGUES', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000106/4aP/2015-2016', '', '', ''),
(560, 'NZANZU MATHE PRINCE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 22, '000107/3bP/2015-2016', '', '', ''),
(561, 'OLINDE BAGUMA LORAIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000108/4aP/2015-2016', '', '', ''),
(562, 'SIMWERAYI MUHIMA LYNCE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000109/4aP/2015-2016', '', '', ''),
(563, 'SYONGO MBAFUMOJA', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000110/4aP/2015-2016', '', '', ''),
(564, 'ZIBANGU LIMBA DANIEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 23, '000111/4aP/2015-2016', '', '', ''),
(565, 'AMANI KISSU ISAAC', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000112/4bP/2015-2016', '', '', ''),
(566, 'AMBOMA  EBONJA   EXAUCE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000113/4bP/2015-2016', '', '', ''),
(567, 'ASANTE MUKUBITO GLOIRE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000114/4bP/2015-2016', '', '', ''),
(568, 'BAJOJE EULALIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000115/4bP/2015-2016', '', '', ''),
(569, 'BARAKA   KUBUYA   ARSENE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000116/4bP/2015-2016', '', '', ''),
(570, 'BATUMIKE  BIKUBA  RODRIGUE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000117/4bP/2015-2016', '', '', ''),
(571, 'BENEDI      FADHILI', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000118/4bP/2015-2016', '', '', ''),
(572, 'BUKA   SAMBA   MARTINI', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000119/4bP/2015-2016', '', '', ''),
(573, 'BYABENE   RUTALE   ESTHER', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000120/4bP/2015-2016', '', '', ''),
(574, 'BYABUZE MIRINDI VICTOR', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000121/4bP/2015-2016', '', '', ''),
(575, 'GISUBIZO  MUNYAZIKWIYE  JOYEUSE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000122/4bP/2015-2016', '', '', ''),
(576, 'HOSANNA    BAYINGANA  INNOCENT', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000123/4bP/2015-2016', '', '', ''),
(577, 'ILUNGA  MULENDA   VOCTOR', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000124/4bP/2015-2016', '', '', ''),
(578, 'JOADDAN  SHIMWA  BOSS', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000125/4bP/2015-2016', '', '', ''),
(579, 'KABEYA NGINDU ISRAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000126/4bP/2015-2016', '', '', ''),
(580, 'KAMBERE   MBOKANI   ENOCK', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000127/4bP/2015-2016', '', '', ''),
(581, 'KAMUHAA MWIRA SANDRINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000128/4bP/2015-2016', '', '', ''),
(582, 'KAMWIRA  MWANAWAVENE  PAX', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000129/4bP/2015-2016', '', '', ''),
(583, 'KASOKI   MWASIMUKE   LYDIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000130/4bP/2015-2016', '', '', ''),
(584, 'KASONGO ONOSENGA JERRY', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000131/4bP/2015-2016', '', '', ''),
(585, 'KWITONDA NTIBENDA ODILE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000132/4bP/2015-2016', '', '', ''),
(586, 'LIONNEL   MWAMBUTSA  IRENGE', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000133/4bP/2015-2016', '', '', ''),
(587, 'MAPENDO   RWAJE     ANICET', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000134/4bP/2015-2016', '', '', ''),
(588, 'MEMA   MATUNGO   DENISE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000135/4bP/2015-2016', '', '', ''),
(589, 'MUCHO   MASERELI   NORVAIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000136/4bP/2015-2016', '', '', ''),
(590, 'MUGARUKA  MURHULA  PASCAL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000137/4bP/2015-2016', '', '', ''),
(591, 'MWANGAZA  ZABIKA  AUDRY', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000138/4bP/2015-2016', '', '', ''),
(592, 'MWIZA HATEGEKA ARIANE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000139/4bP/2015-2016', '', '', ''),
(593, 'NDAWU   NGULU    RUBEN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000140/4bP/2015-2016', '', '', ''),
(594, 'NTAWABO   MALKIA    GLORIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000141/4bP/2015-2016', '', '', ''),
(595, 'NZANZU    MUPOPOLO    RUBEN', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000142/4bP/2015-2016', '', '', ''),
(596, 'SEFU   KIMBWENDE   RAPHAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 5, 24, '000143/4bP/2015-2016', '', '', ''),
(597, 'USHINDI MUNDEKE JOYCE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000144/4bP/2015-2016', '', '', ''),
(598, 'AGANZE BAHATI SIMEON', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000001/5P/2015-2016', '', '', ''),
(599, 'AMINA MAGEZA HENRIETTE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000002/5P/2015-2016', '', '', ''),
(600, 'ASHUZA LUBULA ROLAND', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000003/5P/2015-2016', '', '', ''),
(601, 'AURELIEN NDIMANYA', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000004/5P/2015-2016', '', '', ''),
(602, 'AYAGIRWE BAGUMA CARMELLE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000005/5P/2015-2016', '', '', ''),
(603, 'BALUME MUSANGANYA FIDEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000006/5P/2015-2016', '', '', ''),
(604, 'BUTSIHIRE  KASALI    INGRED', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000007/5P/2015-2016', '', '', ''),
(605, 'BUUMA MUHIMA PATRICE', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000008/5P/2015-2016', '', '', ''),
(606, 'DIVINE SAASITA', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000009/5P/2015-2016', '', '', ''),
(607, 'DUTETE  NDINDAYINO  MARIE- MICHELLE', '', '', 'Feminin', '', '', '', '', '', '', 2, 5, 24, '000145/4bP/2015-2016', '', '', ''),
(608, 'ELISHA  RUBAMBURA GLOIRE', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000010/5P/2015-2016', '', '', ''),
(609, 'ESTHER WAHALI TABAHOLLA', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000011/5P/2015-2016', '', '', ''),
(610, 'FURAHA   TSUBA   OLGA', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000012/5P/2015-2016', '', '', ''),
(611, 'ISHARA    AMATA    NATACHA', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000013/5P/2015-2016', '', '', ''),
(612, 'KABEYA TSHITA BLESSIONG', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000014/5P/2015-2016', '', '', ''),
(613, 'KADUNDU KARUNGU GAETAN', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000015/5P/2015-2016', '', '', ''),
(614, 'KAHINDO SELENGE MIRABELLE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000016/5P/2015-2016', '', '', ''),
(615, 'KAKONGA  TAWA   JULIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000017/5P/2015-2016', '', '', ''),
(616, 'KAKULE KATAVALI JUNIOR', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000018/5P/2015-2016', '', '', ''),
(617, 'KAMATHOGA  KASOLENE   KENNY', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000019/5P/2015-2016', '', '', ''),
(618, 'KANAIA MPENDWA LAURE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000020/5P/2015-2016', '', '', ''),
(619, 'KAVIRA KULE OLIVE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000021/5P/2015-2016', '', '', ''),
(620, 'KIKUNI   MATISHO   JEMIMA', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000022/5P/2015-2016', '', '', ''),
(621, 'LINDISHA  BWENGE  JOACHIM', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000023/5P/2015-2016', '', '', ''),
(622, 'LIONNEL      MUNYAZIKWIYE', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000024/5P/2015-2016', '', '', ''),
(623, 'LUGENDO  MIKALANO  RAPHAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000025/5P/2015-2016', '', '', ''),
(624, 'LUNGERE NONDA DOMINIQUE LIONEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000026/5P/2015-2016', '', '', ''),
(625, 'MAHEMU TSUBA OLIVIER', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000027/5P/2015-2016', '', '', ''),
(626, 'MVULA HATEGE TRESOR', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000028/5P/2015-2016', '', '', ''),
(627, 'MWENELWATA   SUKALI    YANNICK', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000029/5P/2015-2016', '', '', ''),
(628, 'NGASA  USHINDI  CORNEIL', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000030/5P/2015-2016', '', '', ''),
(629, 'NGULI KAMBALALA', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000031/5P/2015-2016', '', '', ''),
(630, 'NUKO   KAPALATA   EVELYNE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000032/5P/2015-2016', '', '', ''),
(631, 'PLAMEDI    FADHILI   CHRIS', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000033/5P/2015-2016', '', '', ''),
(632, 'SAMVURA   UMUBYEYI    CYTHIA', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000034/5P/2015-2016', '', '', ''),
(633, 'TATIANA    BASEME', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000035/5P/2015-2016', '', '', ''),
(634, 'TUMUSABIRE   BUNTU   PRECIEUSE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000036/5P/2015-2016', '', '', ''),
(635, 'WEZA      BALEMBA     PRINCE', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 25, '000037/5P/2015-2016', '', '', ''),
(636, 'ZIYISHIRE  KALEMBE  DANIELLA', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 25, '000038/5P/2015-2016', '', '', ''),
(637, 'ARHIELLE  LUGABA   ANA&Iuml;S', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000039/6P/2015-2016', '', '', ''),
(638, 'ATOUT   AJILI   MELISSE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000040/6P/2015-2016', '', '', ''),
(639, 'BAHATI BYABUZE MARIE MICHELE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000041/6P/2015-2016', '', '', ''),
(640, 'CHANGWI  BWENGE   FABRICE', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000042/6P/2015-2016', '', '', ''),
(641, 'DIGRAND    MAYELE', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000043/6P/2015-2016', '', '', ''),
(642, 'ESEKA ONOSENGA SORAYA', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000044/6P/2015-2016', '', '', ''),
(643, 'EZDRAS BUZIRO', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000045/6P/2015-2016', '', '', ''),
(644, 'FURAHA FAIDA GERTURDE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000046/6P/2015-2016', '', '', ''),
(645, 'GIFT DUFITE JIDITE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000047/6P/2015-2016', '', '', ''),
(646, 'KAHINDA MAKUTA JAEL', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000048/6P/2015-2016', '', '', ''),
(647, 'KAVIRA MUSANGANIA SYONGO', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000049/6P/2015-2016', '', '', ''),
(648, 'KWATEMO MOSUSU', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000050/6P/2015-2016', '', '', ''),
(649, 'LIPO LITANDA SALVA', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000051/6P/2015-2016', '', '', ''),
(650, 'MBUTO LWANGILA JOSAPHAT', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000052/6P/2015-2016', '', '', ''),
(651, 'MUGARUKA  KULIMUSHI  DAVID', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000053/6P/2015-2016', '', '', ''),
(652, 'MUGARUKA  NTWALI   NATHAN', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000054/6P/2015-2016', '', '', ''),
(653, 'MUHINDO  KATEMBESI  JACQUES', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000055/6P/2015-2016', '', '', ''),
(654, 'MUHINDO KAMUHA PRINCE', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000056/6P/2015-2016', '', '', ''),
(655, 'MUKULUMANYA LWAMIANGO', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000057/6P/2015-2016', '', '', ''),
(656, 'MULINDWA  MUSHAKULI  CHRISTIAN', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000058/6P/2015-2016', '', '', ''),
(657, 'MUTOKA MALIRO', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000059/6P/2015-2016', '', '', ''),
(658, 'MUYISA VANZIRWE EMMANUELLA', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000060/6P/2015-2016', '', '', ''),
(659, 'NEZA NTIBENDA VALERIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000061/6P/2015-2016', '', '', ''),
(660, 'NKIKO MUGISHA DIVINE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000062/6P/2015-2016', '', '', ''),
(661, 'NTWARI NGARUYE JUSTIN', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000063/6P/2015-2016', '', '', ''),
(662, 'SHEKINAH   BAYINGANA  ELIZABETH', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000064/6P/2015-2016', '', '', ''),
(663, 'SYONGO MBAFUMOJA', '', '', 'Masculin', '', '', '', '', '', '', 2, 6, 26, '000065/6P/2015-2016', '', '', ''),
(664, 'TSENGE SIVIHOLYA ANASTASIE', '', '', 'Feminin', '', '', '', '', '', '', 2, 6, 26, '000066/6P/2015-2016', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__18gestion__des__cotes`
--

CREATE TABLE IF NOT EXISTS `tbl__18gestion__des__cotes` (
  `gestion__des__cotes_id` int(11) NOT NULL AUTO_INCREMENT,
  `cours_id` int(11) NOT NULL,
  `enseignant_id` int(11) NOT NULL,
  `periode_id` int(11) NOT NULL,
  `inscription__des__eleves_id` int(11) NOT NULL,
  `point__obtenus` text NOT NULL,
  `conduite_id` int(11) NOT NULL,
  PRIMARY KEY (`gestion__des__cotes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__18gestion__des__cotes`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__19qualification__grade`
--

CREATE TABLE IF NOT EXISTS `tbl__19qualification__grade` (
  `qualification__grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `qualification__grade` text NOT NULL,
  PRIMARY KEY (`qualification__grade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl__19qualification__grade`
--

INSERT INTO `tbl__19qualification__grade` (`qualification__grade_id`, `qualification__grade`) VALUES
(1, 'D6'),
(2, 'Gradue(e)'),
(3, 'Licencie(e)'),
(4, 'Master'),
(5, 'Docteur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__20option`
--

CREATE TABLE IF NOT EXISTS `tbl__20option` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `option__degre` text NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl__20option`
--

INSERT INTO `tbl__20option` (`option_id`, `section_id`, `option__degre`) VALUES
(3, 1, 'maternelle'),
(4, 2, 'elementaire.'),
(5, 2, 'moyen'),
(6, 2, 'Terminale'),
(7, 19, 'Mecanique'),
(8, 19, 'pedagogique'),
(9, 20, 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__21extra__utilisateur`
--

CREATE TABLE IF NOT EXISTS `tbl__21extra__utilisateur` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `compte__d666utilisateur` text NOT NULL,
  `mot__de__passe` text NOT NULL,
  `designation` text NOT NULL,
  `enseignant_id` int(11) NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl__21extra__utilisateur`
--

INSERT INTO `tbl__21extra__utilisateur` (`user_id`, `compte__d666utilisateur`, `mot__de__passe`, `designation`, `enseignant_id`, `photo`) VALUES
(1, 'sowebgra@gmail.com', 'ghislai.1', 'enseignant', 2, '<img src="#_srcdata_buddle/4944_File_IMG_20160616_085856.jpg" width="#_width" height="#_height">'),
(2, 'kakuleclaude@gmail.com', 'booba12', 'enseignant', 1, '<img src="#_srcdata_buddle/2916_File_IMG_20160608_135937_885.jpg" width="#_width" height="#_height">'),
(4, 'mutir@gmail.com', 'ghislain12345', 'enseignant', 4, '<img src="#_srcdata_buddle/7833_File_FB_IMG_1464307176294.jpg" width="#_width" height="#_height">'),
(5, 'MWERU@MATERDEI123.COM', 'MATERDEI123', 'enseignant', 5, ''),
(6, 'JEANNE@MATERDEI123.COM', 'MATERDEI123', 'enseignant', 6, ''),
(7, '', '', '', 0, ''),
(8, 'safro@gmail.com', 'swingdekiss1', 'enseignant', 13, '<img src="#_srcdata_buddle/5234_File_profile-pic.jpg" width="#_width" height="#_height">');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__22frais__scolaire`
--

CREATE TABLE IF NOT EXISTS `tbl__22frais__scolaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__22frais__scolaire`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__23caisse`
--

CREATE TABLE IF NOT EXISTS `tbl__23caisse` (
  `caisse_id` int(11) NOT NULL AUTO_INCREMENT,
  `caisse` text NOT NULL,
  PRIMARY KEY (`caisse_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl__23caisse`
--

INSERT INTO `tbl__23caisse` (`caisse_id`, `caisse`) VALUES
(1, 'Caisse Principale'),
(2, 'CAISSE PRODUITS'),
(3, 'CAISSE CHARGES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__24banque`
--

CREATE TABLE IF NOT EXISTS `tbl__24banque` (
  `banque_id` int(11) NOT NULL AUTO_INCREMENT,
  `banque` text NOT NULL,
  PRIMARY KEY (`banque_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl__24banque`
--

INSERT INTO `tbl__24banque` (`banque_id`, `banque`) VALUES
(1, 'AFRILAND FIRST BANK CDF'),
(2, 'PROCREDIT '),
(3, 'AFRILAND FIRST BANK USD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__25type__de__compte`
--

CREATE TABLE IF NOT EXISTS `tbl__25type__de__compte` (
  `type__de__compte_id` int(11) NOT NULL AUTO_INCREMENT,
  `type__de__compte` text NOT NULL,
  PRIMARY KEY (`type__de__compte_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl__25type__de__compte`
--

INSERT INTO `tbl__25type__de__compte` (`type__de__compte_id`, `type__de__compte`) VALUES
(3, 'Charge'),
(4, 'Produit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__26compte`
--

CREATE TABLE IF NOT EXISTS `tbl__26compte` (
  `compte_id` int(11) NOT NULL AUTO_INCREMENT,
  `type__de__compte_id` int(11) NOT NULL,
  `compte` text NOT NULL,
  PRIMARY KEY (`compte_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl__26compte`
--

INSERT INTO `tbl__26compte` (`compte_id`, `type__de__compte_id`, `compte`) VALUES
(1, 4, 'Frais scolaire'),
(2, 4, 'Subvention'),
(3, 3, 'Salaire');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__27payer__les__frais`
--

CREATE TABLE IF NOT EXISTS `tbl__27payer__les__frais` (
  `payer__les__frais_id` int(11) NOT NULL AUTO_INCREMENT,
  `inscription__des__eleves_id` int(11) NOT NULL,
  `frais__scolaires_id` int(11) NOT NULL,
  `montant` text NOT NULL,
  `motif` longtext NOT NULL,
  `treasure_bank` int(11) NOT NULL,
  `treasure_bank_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant_dispatch` text NOT NULL,
  `recus` text NOT NULL,
  PRIMARY KEY (`payer__les__frais_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl__27payer__les__frais`
--

INSERT INTO `tbl__27payer__les__frais` (`payer__les__frais_id`, `inscription__des__eleves_id`, `frais__scolaires_id`, `montant`, `motif`, `treasure_bank`, `treasure_bank_id`, `date`, `montant_dispatch`, `recus`) VALUES
(1, 7, 1, '5', 'Frais scolaire', 1, 1, '2016-08-29', '25', '0000001'),
(2, 7, 2, '15', 'Frais scolaire', 1, 1, '2016-08-29', '25', '0000001'),
(3, 7, 3, '2', 'Frais scolaire', 1, 1, '2016-08-29', '25', '0000001'),
(4, 7, 4, '3', 'Frais scolaire', 1, 1, '2016-08-29', '25', '0000001'),
(5, 7, 1, '0', 'Achat bombe', 2, 1, '2016-08-29', '14', '0000002'),
(6, 7, 2, '0', 'Achat bombe', 2, 1, '2016-08-29', '14', '0000002'),
(7, 7, 3, '0', 'Achat bombe', 2, 1, '2016-08-29', '14', '0000002'),
(8, 7, 4, '7', 'Achat bombe', 2, 1, '2016-08-29', '14', '0000002'),
(9, 5, 1, '5', 'Frais scolaires students', 2, 1, '2016-08-29', '40', '0000003'),
(10, 5, 2, '15', 'Frais scolaires students', 2, 1, '2016-08-29', '40', '0000003'),
(11, 5, 3, '2', 'Frais scolaires students', 2, 1, '2016-08-29', '40', '0000003'),
(12, 5, 4, '10', 'Frais scolaires students', 2, 1, '2016-08-29', '40', '0000003'),
(13, 1, 1, '5', 'L''enfant vient de payer avec succes', 1, 1, '2016-09-27', '250', '0000004'),
(14, 1, 2, '15', 'L''enfant vient de payer avec succes', 1, 1, '2016-09-27', '250', '0000004'),
(15, 1, 4, '10', 'L''enfant vient de payer avec succes', 1, 1, '2016-09-27', '250', '0000004'),
(16, 1, 5, '1', 'L''enfant vient de payer avec succes', 1, 1, '2016-09-27', '250', '0000004'),
(17, 2, 1, '5', 'Pay', 1, 1, '2016-09-27', '35', '0000005'),
(18, 2, 2, '15', 'Pay', 1, 1, '2016-09-27', '35', '0000005'),
(19, 2, 4, '10', 'Pay', 1, 1, '2016-09-27', '35', '0000005'),
(20, 2, 5, '1', 'Pay', 1, 1, '2016-09-27', '35', '0000005'),
(21, 3, 1, '5', 'Paiement', 1, 1, '2016-09-27', '50', '0000006'),
(22, 3, 2, '15', 'Paiement', 1, 1, '2016-09-27', '50', '0000006'),
(23, 3, 4, '10', 'Paiement', 1, 1, '2016-09-27', '50', '0000006'),
(24, 3, 5, '1', 'Paiement', 1, 1, '2016-09-27', '50', '0000006'),
(25, 8, 1, '5', 'Paiement', 1, 1, '2016-09-28', '7', '0000007'),
(26, 8, 2, '2', 'Paiement', 1, 1, '2016-09-28', '7', '0000007'),
(27, 488, 8, '20', 'PAIEMENTS FRIS SCOLAIRES 1ER TRIMESTRE', 2, 3, '2016-10-13', '90', '0000008');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__28recus`
--

CREATE TABLE IF NOT EXISTS `tbl__28recus` (
  `recus_id` int(11) NOT NULL AUTO_INCREMENT,
  `inscription__des__eleves_id` int(11) NOT NULL,
  `recus` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`recus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl__28recus`
--

INSERT INTO `tbl__28recus` (`recus_id`, `inscription__des__eleves_id`, `recus`, `date`) VALUES
(1, 7, '0000001', '2016-08-29'),
(2, 7, '0000002', '2016-08-29'),
(3, 5, '0000003', '2016-08-29'),
(4, 1, '0000004', '2016-09-27'),
(5, 2, '0000005', '2016-09-27'),
(6, 3, '0000006', '2016-09-27'),
(7, 8, '0000007', '2016-09-28'),
(8, 488, '0000008', '2016-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__29sortie`
--

CREATE TABLE IF NOT EXISTS `tbl__29sortie` (
  `sortie_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom__du__beneficiaire` text NOT NULL,
  `montant` text NOT NULL,
  `motif` text NOT NULL,
  `date` date NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `caisse__ou__banque_id` int(11) NOT NULL,
  `type__de__compte_id` int(11) NOT NULL,
  `compte_id` int(11) NOT NULL,
  PRIMARY KEY (`sortie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl__29sortie`
--

INSERT INTO `tbl__29sortie` (`sortie_id`, `nom__du__beneficiaire`, `montant`, `motif`, `date`, `categorie_id`, `caisse__ou__banque_id`, `type__de__compte_id`, `compte_id`) VALUES
(1, 'Patrice Aganze', '1500', 'Achat Faraja', '2016-08-29', 0, 0, 0, 0),
(2, 'Joyce mulegwa', '300', 'achat...', '2016-09-28', 1, 1, 4, 1),
(3, 'STATION SEULE LA FOI', '1500', 'CONSOMMATION CARBURANT SEP2016', '2016-10-13', 2, 3, 3, 3),
(9, 'Brams', '20', 'sdsdsd', '2016-10-21', 1, 1, 3, 3),
(10, 'Ali 92i', '24', 'Achat Tshirt', '2016-10-21', 2, 1, 3, 3),
(11, 'Mira', '11', 'Paiement', '2016-10-21', 1, 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl__30categorie`
--

CREATE TABLE IF NOT EXISTS `tbl__30categorie` (
  `categorie_id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` text NOT NULL,
  PRIMARY KEY (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl__30categorie`
--

INSERT INTO `tbl__30categorie` (`categorie_id`, `categorie`) VALUES
(1, 'Caisse'),
(2, 'Banque');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__31perception__des__frais`
--

CREATE TABLE IF NOT EXISTS `tbl__31perception__des__frais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__31perception__des__frais`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__32solvabilite`
--

CREATE TABLE IF NOT EXISTS `tbl__32solvabilite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__32solvabilite`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__33entree`
--

CREATE TABLE IF NOT EXISTS `tbl__33entree` (
  `entree_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom__de__la__personne__qui__remet` text NOT NULL,
  `montant` text NOT NULL,
  `motif` text NOT NULL,
  `date` date NOT NULL,
  `categorie_id` text NOT NULL,
  `caisse__ou__banque_id` int(11) NOT NULL,
  `type__de__compte_id` int(11) NOT NULL,
  `compte_id` int(11) NOT NULL,
  PRIMARY KEY (`entree_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl__33entree`
--

INSERT INTO `tbl__33entree` (`entree_id`, `nom__de__la__personne__qui__remet`, `montant`, `motif`, `date`, `categorie_id`, `caisse__ou__banque_id`, `type__de__compte_id`, `compte_id`) VALUES
(1, 'Patrice Aganze', '300', 'Achat velo', '2016-10-20', '1', 1, 3, 3),
(2, 'Tsongo', '800', 'Achat velo', '2016-10-20', '1', 1, 3, 3),
(3, 'Emmanuel Bisimwa', '700', 'Achat computer', '2016-10-20', '1', 1, 3, 3),
(4, 'Thimothe Aganze', '500', 'Achat telephone', '2016-10-20', '1', 2, 4, 1),
(5, 'Patient', '350', 'Achat machine', '2016-10-20', '1', 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl__34journal__caisse__ou__banque`
--

CREATE TABLE IF NOT EXISTS `tbl__34journal__caisse__ou__banque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__34journal__caisse__ou__banque`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__35transfert`
--

CREATE TABLE IF NOT EXISTS `tbl__35transfert` (
  `transfert_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`transfert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__35transfert`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__36liste__eleve`
--

CREATE TABLE IF NOT EXISTS `tbl__36liste__eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__36liste__eleve`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__37point_eleve`
--

CREATE TABLE IF NOT EXISTS `tbl__37point_eleve` (
  `point_eleve_id` int(11) NOT NULL AUTO_INCREMENT,
  `inscription__des__eleves_id` int(11) NOT NULL,
  `affectation_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL,
  `mark` text NOT NULL,
  PRIMARY KEY (`point_eleve_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `tbl__37point_eleve`
--

INSERT INTO `tbl__37point_eleve` (`point_eleve_id`, `inscription__des__eleves_id`, `affectation_id`, `order_id`, `cours_id`, `mark`) VALUES
(1, 17, 3, 3, 5, '4'),
(2, 40, 3, 3, 5, '5'),
(3, 47, 3, 3, 5, '6'),
(4, 41, 3, 3, 5, '4'),
(5, 56, 3, 3, 5, '3'),
(6, 17, 3, 1, 6, '1'),
(7, 40, 3, 1, 6, '7'),
(8, 47, 3, 1, 6, '5'),
(9, 41, 3, 1, 6, '6'),
(10, 56, 3, 1, 6, '7'),
(11, 39, 3, 1, 6, '6'),
(12, 17, 3, 2, 6, '2'),
(13, 40, 3, 2, 6, '3'),
(14, 47, 3, 2, 6, '3'),
(15, 41, 3, 2, 6, '5'),
(16, 56, 3, 2, 6, '7'),
(17, 290, 1, 1, 17, '8'),
(18, 289, 1, 1, 17, '5'),
(19, 288, 1, 1, 17, '7'),
(20, 287, 1, 1, 17, '4'),
(21, 286, 1, 1, 17, '4'),
(22, 290, 1, 1, 18, '6'),
(23, 289, 1, 1, 18, '10'),
(24, 288, 1, 1, 18, '8'),
(25, 287, 1, 1, 18, '4'),
(26, 286, 1, 1, 18, '3'),
(27, 286, 1, 1, 19, '5'),
(28, 287, 1, 1, 19, '7'),
(29, 288, 1, 1, 19, '8'),
(30, 289, 1, 1, 19, '9'),
(31, 290, 1, 1, 19, '1'),
(32, 286, 1, 1, 21, '2'),
(33, 287, 1, 1, 21, '3'),
(34, 288, 1, 1, 21, '8'),
(35, 289, 1, 1, 21, '10'),
(36, 290, 1, 1, 21, '17'),
(37, 290, 1, 1, 22, '10'),
(38, 289, 1, 1, 22, '8'),
(39, 288, 1, 1, 22, '7'),
(40, 287, 1, 1, 22, '9'),
(41, 286, 1, 1, 22, '6'),
(42, 286, 1, 1, 23, '2'),
(43, 287, 1, 1, 23, '4'),
(44, 288, 1, 1, 23, '11'),
(45, 289, 1, 1, 23, '5'),
(46, 290, 1, 1, 23, '10'),
(47, 290, 1, 2, 17, '4'),
(48, 289, 1, 2, 17, '7'),
(49, 288, 1, 2, 17, '8'),
(50, 287, 1, 2, 17, '9'),
(51, 286, 1, 2, 17, '3'),
(52, 290, 1, 2, 18, '10'),
(53, 289, 1, 2, 18, '9'),
(54, 288, 1, 2, 18, '8'),
(55, 287, 1, 2, 18, '6'),
(56, 286, 1, 2, 18, '3'),
(57, 286, 1, 2, 19, '4'),
(58, 287, 1, 2, 19, '6'),
(59, 288, 1, 2, 19, '6'),
(60, 289, 1, 2, 19, '7'),
(61, 290, 1, 2, 19, '8'),
(62, 290, 2, 1, 17, '17'),
(63, 289, 2, 1, 17, '15'),
(64, 288, 2, 1, 17, '18'),
(65, 287, 2, 1, 17, '14'),
(66, 286, 2, 1, 17, '12'),
(67, 286, 2, 1, 18, '14'),
(68, 287, 2, 1, 18, '12'),
(69, 288, 2, 1, 18, '15'),
(70, 289, 2, 1, 18, '16'),
(71, 290, 2, 1, 18, '19'),
(72, 286, 2, 1, 19, '13'),
(73, 287, 2, 1, 19, '15'),
(74, 288, 2, 1, 19, '14'),
(75, 289, 2, 1, 19, '11'),
(76, 290, 2, 1, 19, '18'),
(77, 290, 1, 3, 19, '7'),
(78, 289, 1, 3, 19, '8'),
(79, 288, 1, 3, 19, '9'),
(80, 287, 1, 3, 19, '3'),
(81, 286, 1, 3, 19, '4'),
(82, 286, 1, 3, 17, '3'),
(83, 287, 1, 3, 17, '8'),
(84, 288, 1, 3, 17, '10'),
(85, 289, 1, 3, 17, '7'),
(86, 290, 1, 3, 17, '5'),
(87, 290, 1, 3, 18, '9'),
(88, 289, 1, 3, 18, '8'),
(89, 288, 1, 3, 18, '7'),
(90, 287, 1, 3, 18, '4'),
(91, 286, 1, 3, 18, '5'),
(92, 290, 1, 4, 17, '5'),
(93, 289, 1, 4, 17, '8'),
(94, 288, 1, 4, 17, '6'),
(95, 287, 1, 4, 17, '10'),
(96, 286, 1, 4, 17, '9'),
(97, 290, 1, 4, 18, '8'),
(98, 289, 1, 4, 18, '7'),
(99, 288, 1, 4, 18, '9'),
(100, 287, 1, 4, 18, '9'),
(101, 286, 1, 4, 18, '10'),
(102, 290, 1, 4, 19, '5'),
(103, 289, 1, 4, 19, '10'),
(104, 288, 1, 4, 19, '9'),
(105, 287, 1, 4, 19, '8'),
(106, 286, 1, 4, 19, '7'),
(107, 286, 2, 2, 17, '16'),
(108, 287, 2, 2, 17, '7'),
(109, 288, 2, 2, 17, '10'),
(110, 289, 2, 2, 17, '13'),
(111, 290, 2, 2, 17, '14'),
(112, 291, 2, 2, 17, '16'),
(113, 286, 2, 2, 18, '11'),
(114, 287, 2, 2, 18, '13'),
(115, 288, 2, 2, 18, '14'),
(116, 289, 2, 2, 18, '15'),
(117, 290, 2, 2, 18, '16'),
(118, 286, 2, 2, 19, '11'),
(119, 287, 2, 2, 19, '17'),
(120, 288, 2, 2, 19, '18'),
(121, 289, 2, 2, 19, '17'),
(122, 290, 2, 2, 19, '17'),
(123, 286, 2, 2, 21, '40'),
(124, 287, 2, 2, 21, '39'),
(125, 288, 2, 2, 21, '37'),
(126, 289, 2, 2, 21, '34'),
(127, 290, 2, 2, 21, '48'),
(128, 286, 1, 5, 17, '7'),
(129, 286, 1, 6, 17, '8'),
(130, 286, 2, 3, 17, '17'),
(131, 291, 1, 1, 17, '6'),
(132, 293, 1, 1, 17, '7'),
(133, 17, 3, 1, 5, '6'),
(134, 40, 3, 1, 5, '6'),
(135, 47, 3, 1, 5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__38bulletins`
--

CREATE TABLE IF NOT EXISTS `tbl__38bulletins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__38bulletins`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__39multiple__encodage__cours`
--

CREATE TABLE IF NOT EXISTS `tbl__39multiple__encodage__cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__39multiple__encodage__cours`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__40configuration__de__cours`
--

CREATE TABLE IF NOT EXISTS `tbl__40configuration__de__cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl__40configuration__de__cours`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl__41periodicite`
--

CREATE TABLE IF NOT EXISTS `tbl__41periodicite` (
  `periodecite_id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` text NOT NULL,
  `periode` text NOT NULL,
  `trimestre` text NOT NULL,
  `exam` text NOT NULL,
  PRIMARY KEY (`periodecite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl__41periodicite`
--

INSERT INTO `tbl__41periodicite` (`periodecite_id`, `option_id`, `periode`, `trimestre`, `exam`) VALUES
(1, '3', '6', '3', '3'),
(2, '7', '6', '3', '0'),
(3, '4', '6', '3', '3'),
(4, '5', '6', '0', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__42activites`
--

CREATE TABLE IF NOT EXISTS `tbl__42activites` (
  `activite_id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `activite` text NOT NULL,
  PRIMARY KEY (`activite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl__42activites`
--

INSERT INTO `tbl__42activites` (`activite_id`, `option_id`, `activite`) VALUES
(2, 3, 'Groupe I'),
(3, 3, 'Groupe II'),
(4, 4, 'Step 1'),
(5, 3, 'Groupe II'),
(6, 4, 'Activites instrumentales'),
(7, 4, 'Francais'),
(8, 4, 'Mathematiques'),
(9, 4, 'Activites d''eveil scientifique'),
(10, 4, 'Activites d''eveil esthetique'),
(11, 5, 'Instrumentales');

-- --------------------------------------------------------

--
-- Table structure for table `tbl__43branches`
--

CREATE TABLE IF NOT EXISTS `tbl__43branches` (
  `branche_id` int(11) NOT NULL AUTO_INCREMENT,
  `activite_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `branche` text NOT NULL,
  `max__periode` text NOT NULL,
  `max__trimestre` text NOT NULL,
  `max__exam` text NOT NULL,
  PRIMARY KEY (`branche_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbl__43branches`
--

INSERT INTO `tbl__43branches` (`branche_id`, `activite_id`, `option_id`, `branche`, `max__periode`, `max__trimestre`, `max__exam`) VALUES
(5, 2, 3, 'Activites d''art plastique', '2', '8', '4'),
(6, 2, 3, 'Activites de comportement', '0', '8', '0'),
(7, 2, 3, 'Activites musicales', '0', '8', '0'),
(8, 2, 3, 'Activites physques', '0', '8', '0'),
(9, 2, 3, 'Activites de schemas corporels', '0', '8', '0'),
(10, 2, 3, 'Activites sensorielles', '0', '8', '0'),
(11, 2, 3, 'Activite de structuration spatiale', '0', '8', '0'),
(12, 2, 3, 'Activites de vie pratique', '0', '8', '0'),
(13, 3, 3, 'Activites exploratrice', '0', '8', '0'),
(14, 3, 3, 'Activites de langage', '0', '8', '0'),
(15, 3, 3, 'Activites mathematiques', '0', '8', '0'),
(16, 5, 3, 'Activites libres', '0', '20', '0'),
(17, 4, 4, 'Religion', '10', '40', '20'),
(18, 4, 4, 'Education civique et morale', '10', '40', '20'),
(19, 4, 4, 'Education a la vie', '10', '40', '20'),
(20, 6, 4, 'Langue nationales', '0', '0', '0'),
(21, 6, 4, 'Eloc Recitation', '25', '100', '50'),
(22, 6, 4, 'ortho Conjug', '10', '40', '20'),
(23, 6, 4, 'lecture', '15', '60', '30'),
(24, 7, 4, 'Eloc Recitation', '20', '80', '40'),
(25, 7, 4, 'Lecture', '10', '40', '20'),
(26, 7, 4, 'Conjugaison', '5', '20', '10'),
(27, 7, 4, 'Orthographe', '5', '20', '10'),
(28, 8, 4, 'Numer Operation', '20', '80', '40'),
(29, 8, 4, 'Grandeurs', '10', '40', '20'),
(30, 8, 4, 'Formes geometriques', '10', '40', '20'),
(31, 8, 4, 'Problemes', '10', '40', '20'),
(32, 9, 4, 'Ed Sante Env', '10', '40', '20'),
(33, 9, 4, 'Etude du milieu', '50', '200', '100'),
(34, 9, 4, 'Informatique', '10', '40', '20'),
(35, 10, 4, 'Dessin', '10', '40', '20'),
(36, 10, 4, 'Calligraphie', '10', '40', '20'),
(37, 10, 4, 'Chant/Musique', '10', '40', '20'),
(38, 10, 4, 'Ed.Phys  Sport', '10', '40', '20'),
(39, 10, 4, 'Travail manuel', '10', '40', '20');
