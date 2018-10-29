-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2018 a las 22:08:55
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `register`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edifices`
--

CREATE TABLE `edifices` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameEdifice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addressEdifice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contactEdifice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emailEdifice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `statusEdifice` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_09_01_212603_create_visitors_table', 1),
(3, '2018_09_02_000001_create_edifices_table', 1),
(4, '2018_09_02_000002_create_roles_table', 1),
(5, '2018_09_02_000003_create_users_table', 1),
(6, '2018_09_04_214134_create_places_table', 1),
(7, '2018_09_05_124719_create_place_visitors_table', 1),
(8, '2018_09_05_150008_create_role_users_table', 1),
(9, '2018_09_05_195037_create_edifice_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `numberPlace` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `namePlace` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phonePlace` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ownerPlace` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mailPlace` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `statusPlace` int(11) NOT NULL,
  `edifice_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `place_visitors`
--

CREATE TABLE `place_visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `comments` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `arrivalTime` datetime NOT NULL,
  `departureTime` datetime NOT NULL,
  `visitor_id` int(10) UNSIGNED NOT NULL,
  `place_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameRole` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionRole` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nameRole`, `descriptionRole`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador Master', '2018-10-09 03:00:00', '2018-10-09 03:00:00'),
(2, 'adminEdifice', 'Administrador del Edificio', '2018-10-09 03:00:00', '2018-10-09 03:00:00'),
(3, 'user', 'Recepcionista del Edificio', '2018-10-11 00:11:27', '2018-10-11 00:11:27'),
(4, 'owner', 'Encargado Oficina', '2018-10-11 00:36:49', '2018-10-11 00:36:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `edifice_id` int(10) UNSIGNED DEFAULT NULL,
  `place_id` int(11) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `edifice_id`, `place_id`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Deivy Hernandez', 'dhernandez@sipcom.cl', '$2y$10$49x4ZI.G6OnSA2X8Y3mo3umpMHXfF94uBt24Jy2e7vWnwEq3f5pIK', NULL, NULL, 1, 'IwfaaEogrk723weYyaIgWFl8pbS0JUIuZ4esgvTzMym75rPG81KGYyGzuZky', '2018-10-19 03:00:00', '2018-10-19 03:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameVisitor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surnameVisitor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rutVisitor` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `emailVisitor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phoneVisitor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addressVisitor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `companyVisitor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `edifices`
--
ALTER TABLE `edifices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `places_edifice_id_foreign` (`edifice_id`);

--
-- Indices de la tabla `place_visitors`
--
ALTER TABLE `place_visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_visitors_visitor_id_foreign` (`visitor_id`),
  ADD KEY `place_visitors_place_id_foreign` (`place_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_edifice_id_foreign` (`edifice_id`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_place_id_foreign` (`place_id`) USING BTREE;

--
-- Indices de la tabla `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `edifices`
--
ALTER TABLE `edifices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `place_visitors`
--
ALTER TABLE `place_visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_edifice_id_foreign` FOREIGN KEY (`edifice_id`) REFERENCES `edifices` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `place_visitors`
--
ALTER TABLE `place_visitors`
  ADD CONSTRAINT `place_visitors_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `place_visitors_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_edifice_id_foreign` FOREIGN KEY (`edifice_id`) REFERENCES `edifices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
