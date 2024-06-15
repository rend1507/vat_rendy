-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2024 at 03:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vat`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuel_consumptions`
--

CREATE TABLE `fuel_consumptions` (
  `id` int(5) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-06-14-000001', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1718335406, 1),
(2, '2024-06-14-000002', 'App\\Database\\Migrations\\CreateVehiclesTable', 'default', 'App', 1718335406, 1),
(3, '2024-06-14-000003', 'App\\Database\\Migrations\\CreateReservationsTable', 'default', 'App', 1718335406, 1),
(4, '2024-06-14-000004', 'App\\Database\\Migrations\\CreateApprovalsTable', 'default', 'App', 1718335406, 1),
(5, '2024-06-14-000005', 'App\\Database\\Migrations\\CreateServicesTable', 'default', 'App', 1718335406, 1),
(6, '2024-06-14-000006', 'App\\Database\\Migrations\\CreateFuelConsumptionsTable', 'default', 'App', 1718335406, 1),
(7, '2024-06-14-061758', 'App\\Database\\Migrations\\CreateReservationApproversTable', 'default', 'App', 1718345930, 2),
(8, '2024-06-14-135147', 'App\\Database\\Migrations\\CreateUsageHistory', 'default', 'App', 1718375841, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(5) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `driver` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `vehicle_id`, `user_id`, `driver`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Badumts', 'approved', '2024-06-15 00:51:25', NULL),
(4, 1, 1, 'Tet', 'approved', '2024-06-15 01:13:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_approvers`
--

CREATE TABLE `reservation_approvers` (
  `id` int(5) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservation_approvers`
--

INSERT INTO `reservation_approvers` (`id`, `reservation_id`, `approver_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'rejected', NULL, NULL),
(2, 1, 4, 'approved', NULL, NULL),
(7, 4, 3, 'approved', NULL, NULL),
(8, 4, 4, 'approved', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(5) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usage_history`
--

CREATE TABLE `usage_history` (
  `id` int(5) UNSIGNED NOT NULL,
  `vehicle_id` int(5) UNSIGNED NOT NULL,
  `distance` float NOT NULL,
  `usage_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','approver') NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'Bagas', '$2y$10$0rIA7bXXSPCzVnmcuTCIPuddqOsm8OId56IBpTWRZREY6mUOqXXMC', 'admin', NULL, NULL),
(2, 'admin2', 'Bayu', '$2y$10$AVJx286oWqjUKkonM7lwRuIOQE8AL9D2p1TuKB0jy3EZ.HcUwaGMi', 'admin', NULL, NULL),
(3, 'approver1', 'Nadia', '$2y$10$wcuGwU1mXS4.0THdrDXlS.pfPKYjNbucP1Uf9B.4JzEtsC.Ietj.y', 'approver', NULL, NULL),
(4, 'approver2', 'Nana', '$2y$10$us9w6lcOnk210vB/O/VGHOuEjhG.ykfxXmeeZQZaXNYaZD1ulnhOC', 'approver', NULL, NULL),
(5, 'approver3', 'Nur', '$2y$10$ZyvPohL4Z.R/L8vrmBZ79eT7Mtk6O0nxAKS/rz5e3q/HonTBQl0Ru', 'approver', NULL, NULL),
(6, 'approver4', 'Nessie', '$2y$10$sVL0DHHMJyCDxK788otZ2O3KaAQUYI0OWK35svKPMdKJsHlC/adH6', 'approver', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `type` enum('person','goods') NOT NULL DEFAULT 'person',
  `owned` enum('company','rental') NOT NULL DEFAULT 'company',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `type`, `owned`, `created_at`, `updated_at`) VALUES
(1, 'Dump Truck Cat', 'goods', 'rental', '2024-06-14 11:17:37', NULL),
(2, 'Scraper Cat', 'goods', 'company', '2024-06-14 11:17:37', NULL),
(3, 'Bucket Wheel Excavator Cat', 'goods', 'company', '2024-06-14 11:17:37', NULL),
(4, 'Large Dozer Nomatsu', 'goods', 'rental', '2024-06-14 11:17:37', NULL),
(5, 'Manhauler Amman', 'person', 'company', '2024-06-14 11:17:37', NULL),
(6, 'Manhauler Bus Delima Jaya', 'person', 'rental', '2024-06-14 11:17:37', NULL),
(9, 'Hino Dutro', 'person', 'company', '2024-06-14 06:43:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fuel_consumptions`
--
ALTER TABLE `fuel_consumptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuel_consumptions_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `reservation_approvers`
--
ALTER TABLE `reservation_approvers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_approvers_reservation_id_foreign` (`reservation_id`),
  ADD KEY `reservation_approvers_approver_id_foreign` (`approver_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `usage_history`
--
ALTER TABLE `usage_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usage_history_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuel_consumptions`
--
ALTER TABLE `fuel_consumptions`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation_approvers`
--
ALTER TABLE `reservation_approvers`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usage_history`
--
ALTER TABLE `usage_history`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuel_consumptions`
--
ALTER TABLE `fuel_consumptions`
  ADD CONSTRAINT `fuel_consumptions_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_approvers`
--
ALTER TABLE `reservation_approvers`
  ADD CONSTRAINT `reservation_approvers_approver_id_foreign` FOREIGN KEY (`approver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_approvers_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usage_history`
--
ALTER TABLE `usage_history`
  ADD CONSTRAINT `usage_history_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
