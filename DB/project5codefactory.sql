-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Dez 2022 um 09:52
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `project5codefactory`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `card_content`
--

CREATE TABLE `card_content` (
  `id` int(11) NOT NULL,
  `card_title` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_pic` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_university` int(11) NOT NULL,
  `fk_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221207093313', '2022-12-07 14:48:34', 73),
('DoctrineMigrations\\Version20221207094921', '2022-12-07 14:48:34', 12),
('DoctrineMigrations\\Version20221207095058', '2022-12-07 14:48:34', 18),
('DoctrineMigrations\\Version20221207095840', '2022-12-07 14:48:34', 14),
('DoctrineMigrations\\Version20221207100034', '2022-12-07 14:48:34', 15),
('DoctrineMigrations\\Version20221207100300', '2022-12-07 14:48:34', 15),
('DoctrineMigrations\\Version20221207134945', '2022-12-07 14:49:56', 71),
('DoctrineMigrations\\Version20221207142002', '2022-12-07 15:20:14', 77);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `fk_student` int(11) NOT NULL,
  `subject` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` int(11) NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `student`
--

CREATE TABLE `student` (
  `fk_user_id` int(11) NOT NULL,
  `first_name` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tut_unit`
--

CREATE TABLE `tut_unit` (
  `id` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `datetime` datetime NOT NULL,
  `fk_student` int(11) NOT NULL,
  `fk_subject` int(11) NOT NULL,
  `fk_university` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `unique_content`
--

CREATE TABLE `unique_content` (
  `first_name` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tut_pic` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg_pic` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `university`
--

CREATE TABLE `university` (
  `id` int(11) NOT NULL,
  `university_name` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(31) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `card_content`
--
ALTER TABLE `card_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_university` (`fk_university`),
  ADD KEY `fk_subject` (`fk_subject`);

--
-- Indizes für die Tabelle `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indizes für die Tabelle `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indizes für die Tabelle `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student` (`fk_student`);

--
-- Indizes für die Tabelle `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`fk_user_id`);

--
-- Indizes für die Tabelle `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tut_unit`
--
ALTER TABLE `tut_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_university` (`fk_university`),
  ADD KEY `fk_subject` (`fk_subject`),
  ADD KEY `fk_student` (`fk_student`);

--
-- Indizes für die Tabelle `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `card_content`
--
ALTER TABLE `card_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tut_unit`
--
ALTER TABLE `tut_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `card_content`
--
ALTER TABLE `card_content`
  ADD CONSTRAINT `card_content_ibfk_1` FOREIGN KEY (`fk_university`) REFERENCES `university` (`id`),
  ADD CONSTRAINT `card_content_ibfk_2` FOREIGN KEY (`fk_subject`) REFERENCES `subject` (`id`);

--
-- Constraints der Tabelle `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`fk_student`) REFERENCES `student` (`fk_user_id`);

--
-- Constraints der Tabelle `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`id`);

--
-- Constraints der Tabelle `tut_unit`
--
ALTER TABLE `tut_unit`
  ADD CONSTRAINT `tut_unit_ibfk_1` FOREIGN KEY (`fk_university`) REFERENCES `university` (`id`),
  ADD CONSTRAINT `tut_unit_ibfk_2` FOREIGN KEY (`fk_subject`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `tut_unit_ibfk_3` FOREIGN KEY (`fk_student`) REFERENCES `student` (`fk_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
