-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 jan. 2025 à 14:00
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `theops`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `lesson_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `comment` varchar(200) COLLATE latin1_general_cs NOT NULL,
  KEY `lesson_id` (`lesson_id`),
  KEY `exercise_id` (`exercise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `activities`
--

INSERT INTO `activities` (`lesson_id`, `exercise_id`, `comment`) VALUES
(1, 1, ''),
(1, 2, '');

-- --------------------------------------------------------

--
-- Structure de la table `exercises`
--

DROP TABLE IF EXISTS `exercises`;
CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exercise_name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `types_of_exercise_id` int(11) NOT NULL,
  `description` varchar(500) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  KEY `types_of_exercise_id` (`types_of_exercise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `exercises`
--

INSERT INTO `exercises` (`id`, `exercise_name`, `types_of_exercise_id`, `description`) VALUES
(1, 'Araignée', 1, 'Explications : \r\n_ On met les doigts 1 à 4 sur la corde 6 et sur les cases de 1 à 4 puis on descends sur la corde 5, l\'auriculaire et les doigts suivants un à un sans décoller les autres de la corde précédente'),
(2, 'Escalier', 1, 'Explications : \n_ On fait toutes les cases de 1 à 4 et toutes les cordes de 6 à 1. \n_ Puis on décale d\' une case et on recommence jusqu\' à la fin du manche.'),
(5, 'Impro 1', 2, 'blabla');

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workplace` int(11) NOT NULL,
  `lesson_date` date NOT NULL,
  `teacher` int(11) NOT NULL,
  `comment` int(11) DEFAULT NULL,
  `student` int(11) NOT NULL,
  `lesson_type` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  KEY `id` (`id`),
  KEY `workplace` (`workplace`),
  KEY `teacher` (`teacher`),
  KEY `student` (`student`),
  KEY `lesson-type` (`lesson_type`),
  KEY `duration` (`duration`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `lessons`
--

INSERT INTO `lessons` (`id`, `workplace`, `lesson_date`, `teacher`, `comment`, `student`, `lesson_type`, `duration`) VALUES
(1, 2, '2024-11-27', 1, NULL, 3, 1, 1),
(2, 2, '2024-11-28', 1, NULL, 4, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lesson_durations`
--

DROP TABLE IF EXISTS `lesson_durations`;
CREATE TABLE IF NOT EXISTS `lesson_durations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duration` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `lesson_durations`
--

INSERT INTO `lesson_durations` (`id`, `duration`) VALUES
(1, '01:00:00'),
(2, '00:45:00'),
(3, '00:30:00'),
(5, '01:30:00'),
(6, '02:00:00'),
(7, '00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `lesson_types`
--

DROP TABLE IF EXISTS `lesson_types`;
CREATE TABLE IF NOT EXISTS `lesson_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `lesson_types`
--

INSERT INTO `lesson_types` (`id`, `type`) VALUES
(1, 'Guitare'),
(2, 'Chant'),
(3, 'Piano'),
(4, 'Ecriture musicale'),
(5, 'Guitare et chant'),
(6, 'Inconnu');

-- --------------------------------------------------------

--
-- Structure de la table `payment_types`
--

DROP TABLE IF EXISTS `payment_types`;
CREATE TABLE IF NOT EXISTS `payment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `payment_types`
--

INSERT INTO `payment_types` (`id`, `type`) VALUES
(1, 'PayPal'),
(2, 'Lydia'),
(3, 'Espèces'),
(4, 'Virement'),
(5, 'Carte Cadeau eBuyClub (Carrefour)');

-- --------------------------------------------------------

--
-- Structure de la table `types_of_exercise`
--

DROP TABLE IF EXISTS `types_of_exercise`;
CREATE TABLE IF NOT EXISTS `types_of_exercise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `types_of_exercise`
--

INSERT INTO `types_of_exercise` (`id`, `type`) VALUES
(1, 'Echauffement'),
(2, 'Improvisation');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `givenname` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `surname` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `title_id` int(10) NOT NULL,
  `type_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `birthday` date DEFAULT NULL,
  `pseudo` varchar(50) COLLATE latin1_general_cs DEFAULT NULL,
  `avatar` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `password` varchar(200) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title_id` (`title_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `givenname`, `surname`, `title_id`, `type_id`, `email`, `birthday`, `pseudo`, `avatar`, `password`) VALUES
(1, 'Daphné', 'Dauvillier', 1, 2, 'daphne.dauvillier@gmail.com', NULL, NULL, 'img/daphne.jpg', '$6$IkoyjzLxvBadgfDs$0TYv94QYHMwOzb/f6gC1J1AuaRNNVgr732rajwr/LQIYlmcxRSybXvm8c2vLm6804cqmegrmTx4J/TEgA8TDM1'),
(2, 'Arnaud', 'Delaunay', 2, 2, 'arnaud.yamaha.music@free.fr', NULL, NULL, 'img/avatar.png', '$6$e89CfN60/HwJKgT1$tiRS6Vtun5q2QtMNHVh6T3bzLI2FmL9ozy6NJMtLxuoDhfpI5LJrPnxMW.J3X5iW.JIunjfRGCbY.KZ4AmUsy.'),
(3, 'Théo', 'Fleury', 2, 1, 'theo.fleury0175@gmail.com', '1995-02-25', 'Horslan', 'img/avatar.png', '$2y$10$7BtK42PgEvZ/N/yJixJPbel1a6XqYCvsnz0P9Klr9apOIRJvu1XhK'),
(4, 'Marie', 'Fleury', 1, 1, 'marie.fleury0175@gmail.com', '2001-01-29', 'Minifleury', 'img/avatar_women.png', '$2y$10$7BtK42PgEvZ/N/yJixJPbel1a6XqYCvsnz0P9Klr9apOIRJvu1XhK');

-- --------------------------------------------------------

--
-- Structure de la table `user_titles`
--

DROP TABLE IF EXISTS `user_titles`;
CREATE TABLE IF NOT EXISTS `user_titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `abbreviation` varchar(10) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `user_titles`
--

INSERT INTO `user_titles` (`id`, `title`, `abbreviation`) VALUES
(1, 'Madame', 'Mme'),
(2, 'Monsieur', 'M'),
(3, 'Docteur', 'Dr');

-- --------------------------------------------------------

--
-- Structure de la table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `user_types`
--

INSERT INTO `user_types` (`id`, `type`) VALUES
(1, 'student'),
(2, 'teacher');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_improvisations`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `v_improvisations`;
CREATE TABLE IF NOT EXISTS `v_improvisations` (
`exercise_name` varchar(50)
,`description` varchar(500)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_lessons`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `v_lessons`;
CREATE TABLE IF NOT EXISTS `v_lessons` (
`id` int(11)
,`lesson_date` date
,`workplace_name` varchar(50)
,`teacher_givenname` varchar(50)
,`teacher_surname` varchar(50)
,`teacher_title_abbreviation` varchar(10)
,`student_givenname` varchar(50)
,`student_surname` varchar(50)
,`student_title_abbreviation` varchar(10)
,`lesson_type` varchar(50)
,`duration` time
,`comment` int(11)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_students`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `v_students`;
CREATE TABLE IF NOT EXISTS `v_students` (
`user_id` int(11)
,`givenname` varchar(50)
,`surname` varchar(50)
,`title_abbreviation` varchar(10)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_teachers`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `v_teachers`;
CREATE TABLE IF NOT EXISTS `v_teachers` (
`user_id` int(11)
,`givenname` varchar(50)
,`surname` varchar(50)
,`title_abbreviation` varchar(10)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_warmsup`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `v_warmsup`;
CREATE TABLE IF NOT EXISTS `v_warmsup` (
`exercise_name` varchar(50)
,`description` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure de la table `workplaces`
--

DROP TABLE IF EXISTS `workplaces`;
CREATE TABLE IF NOT EXISTS `workplaces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `default_w` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Déchargement des données de la table `workplaces`
--

INSERT INTO `workplaces` (`id`, `type`, `default_w`) VALUES
(1, 'Domicile', 0),
(2, 'Chez le professeur', 1),
(3, 'Visioconférence', 0),
(4, 'Inconnu', 0);

-- --------------------------------------------------------

--
-- Structure de la vue `v_improvisations`
--
DROP TABLE IF EXISTS `v_improvisations`;

DROP VIEW IF EXISTS `v_improvisations`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_improvisations`  AS SELECT `exercises`.`exercise_name` AS `exercise_name`, `exercises`.`description` AS `description` FROM `exercises` WHERE (`exercises`.`types_of_exercise_id` = 2) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_lessons`
--
DROP TABLE IF EXISTS `v_lessons`;

DROP VIEW IF EXISTS `v_lessons`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lessons`  AS SELECT `lessons`.`id` AS `id`, `lessons`.`lesson_date` AS `lesson_date`, `workplaces`.`type` AS `workplace_name`, `v_teachers`.`givenname` AS `teacher_givenname`, `v_teachers`.`surname` AS `teacher_surname`, `v_teachers`.`title_abbreviation` AS `teacher_title_abbreviation`, `v_students`.`givenname` AS `student_givenname`, `v_students`.`surname` AS `student_surname`, `v_students`.`title_abbreviation` AS `student_title_abbreviation`, `lesson_types`.`type` AS `lesson_type`, `lesson_durations`.`duration` AS `duration`, `lessons`.`comment` AS `comment` FROM (((((`lessons` join `workplaces` on((`lessons`.`workplace` = `workplaces`.`id`))) join `v_teachers` on((`lessons`.`teacher` = `v_teachers`.`user_id`))) join `v_students` on((`lessons`.`student` = `v_students`.`user_id`))) join `lesson_types` on((`lessons`.`lesson_type` = `lesson_types`.`id`))) join `lesson_durations` on((`lessons`.`duration` = `lesson_durations`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_students`
--
DROP TABLE IF EXISTS `v_students`;

DROP VIEW IF EXISTS `v_students`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_students`  AS SELECT `users`.`id` AS `user_id`, `users`.`givenname` AS `givenname`, `users`.`surname` AS `surname`, `user_titles`.`abbreviation` AS `title_abbreviation` FROM (`users` join `user_titles` on((`users`.`title_id` = `user_titles`.`id`))) WHERE (`users`.`type_id` = 1) ORDER BY `users`.`givenname` ASC ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_teachers`
--
DROP TABLE IF EXISTS `v_teachers`;

DROP VIEW IF EXISTS `v_teachers`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_teachers`  AS SELECT `users`.`id` AS `user_id`, `users`.`givenname` AS `givenname`, `users`.`surname` AS `surname`, `user_titles`.`abbreviation` AS `title_abbreviation` FROM (`users` join `user_titles` on((`users`.`title_id` = `user_titles`.`id`))) WHERE (`users`.`type_id` = 2) ORDER BY `users`.`givenname` ASC ;

-- --------------------------------------------------------

--
-- Structure de la vue `v_warmsup`
--
DROP TABLE IF EXISTS `v_warmsup`;

DROP VIEW IF EXISTS `v_warmsup`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_warmsup`  AS SELECT `exercises`.`exercise_name` AS `exercise_name`, `exercises`.`description` AS `description` FROM `exercises` WHERE (`exercises`.`types_of_exercise_id` = 1) ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`),
  ADD CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`);

--
-- Contraintes pour la table `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_ibfk_1` FOREIGN KEY (`types_of_exercise_id`) REFERENCES `types_of_exercise` (`id`);

--
-- Contraintes pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`workplace`) REFERENCES `workplaces` (`id`),
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`duration`) REFERENCES `lesson_durations` (`id`),
  ADD CONSTRAINT `lessons_ibfk_3` FOREIGN KEY (`lesson_type`) REFERENCES `lesson_types` (`id`),
  ADD CONSTRAINT `lessons_ibfk_4` FOREIGN KEY (`teacher`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lessons_ibfk_5` FOREIGN KEY (`student`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`title_id`) REFERENCES `user_titles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
