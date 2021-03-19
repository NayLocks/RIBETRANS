-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 19 Mars 2021 à 17:59
-- Version du serveur :  10.1.48-MariaDB-0+deb9u1
-- Version de PHP :  7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ribetrans`
--

-- --------------------------------------------------------

--
-- Structure de la table `bodies`
--

CREATE TABLE `bodies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `little_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `bodies`
--

INSERT INTO `bodies` (`id`, `name`, `little_name`) VALUES
(1, 'NON RENSEIGNEE', 'non_renseignee');

-- --------------------------------------------------------

--
-- Structure de la table `body_type`
--

CREATE TABLE `body_type` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `little_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `brands`
--

INSERT INTO `brands` (`id`, `name`, `little_name`) VALUES
(1, 'NON RENSEIGNEE', 'non_renseignee'),
(2, 'PEUGEOT', 'peugeot'),
(3, 'CITROEN', 'citroen');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `little_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `little_name`) VALUES
(1, 'NON RENSEIGNEE', 'non_renseignee'),
(2, 'VEHICULE UTILITAIRE LEGER', 'vehicule_utilitaire_leger'),
(3, 'VEHICULE LEGER', 'vehicule_leger');

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `little_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wording` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_supplement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `is_archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `companies`
--

INSERT INTO `companies` (`id`, `name`, `little_name`, `title`, `director`, `wording`, `siret`, `street`, `street_supplement`, `city`, `postal_code`, `is_archived`) VALUES
(1, 'RIBEGROUPE', 'ribegroupe', 'Mr', 'Jérôme LAVAIRE', 'Président du Directoire', '500 829 379 00014', 'Z.A.C. La Grérie', '', 'Ribécourt-Dreslincourt', 60170, 0);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210319083351', '2021-03-19 09:34:08', 67),
('DoctrineMigrations\\Version20210319090825', '2021-03-19 10:08:38', 275),
('DoctrineMigrations\\Version20210319091617', '2021-03-19 10:16:20', 177),
('DoctrineMigrations\\Version20210319091828', '2021-03-19 10:18:33', 66),
('DoctrineMigrations\\Version20210319092742', '2021-03-19 10:27:52', 384),
('DoctrineMigrations\\Version20210319100405', '2021-03-19 11:04:15', 835),
('DoctrineMigrations\\Version20210319100622', '2021-03-19 11:06:25', 153),
('DoctrineMigrations\\Version20210319100725', '2021-03-19 11:07:27', 144),
('DoctrineMigrations\\Version20210319102521', '2021-03-19 11:25:25', 252),
('DoctrineMigrations\\Version20210319103330', '2021-03-19 11:33:40', 306),
('DoctrineMigrations\\Version20210319104858', '2021-03-19 11:49:11', 110),
('DoctrineMigrations\\Version20210319132259', '2021-03-19 14:23:09', 66),
('DoctrineMigrations\\Version20210319164340', '2021-03-19 17:43:52', 94);

-- --------------------------------------------------------

--
-- Structure de la table `light_vehicles`
--

CREATE TABLE `light_vehicles` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `body_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `number_plate` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `put_circulation` date NOT NULL,
  `entrance_park` date NOT NULL,
  `exit_park` date NOT NULL,
  `km` int(11) NOT NULL,
  `is_archived` tinyint(1) NOT NULL,
  `weight` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empty_weight` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tire_brands_av_id` int(11) DEFAULT NULL,
  `tire_brands_ar_id` int(11) DEFAULT NULL,
  `tire_size_av` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tire_size_ar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `body_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_places` int(11) NOT NULL,
  `energy` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `light_vehicles`
--

INSERT INTO `light_vehicles` (`id`, `company_id`, `body_id`, `brand_id`, `category_id`, `number_plate`, `put_circulation`, `entrance_park`, `exit_park`, `km`, `is_archived`, `weight`, `empty_weight`, `tire_brands_av_id`, `tire_brands_ar_id`, `tire_size_av`, `tire_size_ar`, `kind_id`, `type_id`, `body_type`, `nb_places`, `energy`, `power`) VALUES
(1, 1, 1, 2, 2, 'CZ-257-NL', '2013-10-15', '2018-09-03', '1900-01-01', 0, 0, '1250', '1000', 2, 1, '16/8', '26/8', 2, 2, 'test', 5, 'GO', 6),
(2, 1, 1, 3, 3, 'DJ-791-VT', '2008-01-07', '2021-03-15', '2021-03-31', 12000, 0, '1850', '1318', 1, 1, '', '', 3, 2, 'VF7CH9HZC98262119', 5, 'GO', 6),
(3, 1, 1, 2, 2, 'AB-123-CD', '2013-10-15', '2018-09-03', '1900-01-01', 0, 0, '1250', '1000', 2, 1, '16/8', '26/8', 2, 2, 'test', 5, 'GO', 6);

-- --------------------------------------------------------

--
-- Structure de la table `lvehicles_documents`
--

CREATE TABLE `lvehicles_documents` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `date_created` date NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lvehicles_pictures`
--

CREATE TABLE `lvehicles_pictures` (
  `id` int(11) NOT NULL,
  `light_vehicle_id` int(11) DEFAULT NULL,
  `date_created` date NOT NULL,
  `nb_picture` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `lvehicles_pictures`
--

INSERT INTO `lvehicles_pictures` (`id`, `light_vehicle_id`, `date_created`, `nb_picture`, `path`) VALUES
(1, 1, '2021-03-08', 1, '1.jpg'),
(2, 1, '2021-03-17', 2, '2.png'),
(3, 1, '2021-03-17', 3, '3.jpg'),
(4, 1, '2021-03-17', 4, '4.png'),
(6, 2, '2021-03-09', 1, '1.jpg'),
(7, 2, '2021-03-09', 2, '1.jpg'),
(8, 2, '2021-03-09', 3, '1.jpg'),
(9, 2, '2021-03-09', 4, '1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `lvehicles_rentals`
--

CREATE TABLE `lvehicles_rentals` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_rental` date NOT NULL,
  `end_rental` date NOT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `lvehicles_rentals`
--

INSERT INTO `lvehicles_rentals` (`id`, `vehicle_id`, `company_id`, `driver`, `start_rental`, `end_rental`, `price`, `status`) VALUES
(1, 1, 1, 'Jonathan DELANNOY', '2018-09-03', '2020-08-31', '78.34', 0),
(2, 1, 1, 'Jonathan DELANNOY', '2020-09-01', '2021-09-10', '78.34', 1),
(4, 3, 1, 'James TEST', '2018-01-01', '2021-09-01', '45', 1);

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `little_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wording` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_supplement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `settings`
--

INSERT INTO `settings` (`id`, `name`, `little_name`, `title`, `director`, `wording`, `siret`, `street`, `street_supplement`, `city`, `postal_code`) VALUES
(1, 'RIBETRANS S.A.S', 'ribetrans_s.a.s', 'Mr', 'Alexandre BRAY', 'Responsable d\'exploitation', '380 180 141 00018', 'Z.A.C. La Grérie', '', 'Ribécourt-Dreslincourt', 60170);

-- --------------------------------------------------------

--
-- Structure de la table `tire_brands`
--

CREATE TABLE `tire_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `little_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `tire_brands`
--

INSERT INTO `tire_brands` (`id`, `name`, `little_name`) VALUES
(1, 'NON RENSEIGNEE', 'non_renseignee'),
(2, 'MICHELIN', 'michelin');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `roles`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'administrateur', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$eW1UR0c5MHVSQkRQZUNPeg$uf3I+tEaIYKv2ajLjX5peGmBhPVkVPbaKF/4EF/msPc', 'Administrateur', 'Administrateur', 'administrateur@ribegroupe.com');

-- --------------------------------------------------------

--
-- Structure de la table `vehicles_kind`
--

CREATE TABLE `vehicles_kind` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `little_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `vehicles_kind`
--

INSERT INTO `vehicles_kind` (`id`, `name`, `little_name`) VALUES
(1, 'NON RENSEIGNE', 'non_renseignee'),
(2, 'VP', 'vp'),
(3, 'VLU', 'vlu');

-- --------------------------------------------------------

--
-- Structure de la table `vehicles_type`
--

CREATE TABLE `vehicles_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `little_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `vehicles_type`
--

INSERT INTO `vehicles_type` (`id`, `name`, `little_name`) VALUES
(1, 'NON RENSEIGNE', 'non_renseigne'),
(2, '5008', '5008'),
(3, 'PICASSO', 'picasso');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bodies`
--
ALTER TABLE `bodies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `body_type`
--
ALTER TABLE `body_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `light_vehicles`
--
ALTER TABLE `light_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_608D5859979B1AD6` (`company_id`),
  ADD KEY `IDX_608D58599B621D84` (`body_id`),
  ADD KEY `IDX_608D585944F5D008` (`brand_id`),
  ADD KEY `IDX_608D585912469DE2` (`category_id`),
  ADD KEY `IDX_608D58597D6BBCF2` (`tire_brands_av_id`),
  ADD KEY `IDX_608D5859F2092BA5` (`tire_brands_ar_id`),
  ADD KEY `IDX_608D585930602CA9` (`kind_id`),
  ADD KEY `IDX_608D5859C54C8C93` (`type_id`);

--
-- Index pour la table `lvehicles_documents`
--
ALTER TABLE `lvehicles_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D06ECD61545317D1` (`vehicle_id`);

--
-- Index pour la table `lvehicles_pictures`
--
ALTER TABLE `lvehicles_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_56A4430680A78782` (`light_vehicle_id`);

--
-- Index pour la table `lvehicles_rentals`
--
ALTER TABLE `lvehicles_rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3B9AC1A1545317D1` (`vehicle_id`),
  ADD KEY `IDX_3B9AC1A1979B1AD6` (`company_id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tire_brands`
--
ALTER TABLE `tire_brands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`);

--
-- Index pour la table `vehicles_kind`
--
ALTER TABLE `vehicles_kind`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicles_type`
--
ALTER TABLE `vehicles_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bodies`
--
ALTER TABLE `bodies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `body_type`
--
ALTER TABLE `body_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `light_vehicles`
--
ALTER TABLE `light_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `lvehicles_documents`
--
ALTER TABLE `lvehicles_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `lvehicles_pictures`
--
ALTER TABLE `lvehicles_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `lvehicles_rentals`
--
ALTER TABLE `lvehicles_rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tire_brands`
--
ALTER TABLE `tire_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `vehicles_kind`
--
ALTER TABLE `vehicles_kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `vehicles_type`
--
ALTER TABLE `vehicles_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `light_vehicles`
--
ALTER TABLE `light_vehicles`
  ADD CONSTRAINT `FK_608D585912469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_608D585930602CA9` FOREIGN KEY (`kind_id`) REFERENCES `vehicles_kind` (`id`),
  ADD CONSTRAINT `FK_608D585944F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `FK_608D58597D6BBCF2` FOREIGN KEY (`tire_brands_av_id`) REFERENCES `tire_brands` (`id`),
  ADD CONSTRAINT `FK_608D5859979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `FK_608D58599B621D84` FOREIGN KEY (`body_id`) REFERENCES `bodies` (`id`),
  ADD CONSTRAINT `FK_608D5859C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `vehicles_type` (`id`),
  ADD CONSTRAINT `FK_608D5859F2092BA5` FOREIGN KEY (`tire_brands_ar_id`) REFERENCES `tire_brands` (`id`);

--
-- Contraintes pour la table `lvehicles_documents`
--
ALTER TABLE `lvehicles_documents`
  ADD CONSTRAINT `FK_D06ECD61545317D1` FOREIGN KEY (`vehicle_id`) REFERENCES `light_vehicles` (`id`);

--
-- Contraintes pour la table `lvehicles_pictures`
--
ALTER TABLE `lvehicles_pictures`
  ADD CONSTRAINT `FK_56A4430680A78782` FOREIGN KEY (`light_vehicle_id`) REFERENCES `light_vehicles` (`id`);

--
-- Contraintes pour la table `lvehicles_rentals`
--
ALTER TABLE `lvehicles_rentals`
  ADD CONSTRAINT `FK_3B9AC1A1545317D1` FOREIGN KEY (`vehicle_id`) REFERENCES `light_vehicles` (`id`),
  ADD CONSTRAINT `FK_3B9AC1A1979B1AD6` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
