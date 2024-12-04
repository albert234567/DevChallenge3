-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 18:53:34
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `llista_compra_compartida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `name`, `created_at`, `updated_at`) VALUES
(26, 'Fruita', '2024-11-05 14:52:41', '2024-11-05 14:52:41'),
(27, 'Verdures', '2024-11-05 14:53:07', '2024-11-05 14:53:07'),
(30, 'Llegums', '2024-11-05 17:18:52', '2024-11-05 17:18:52'),
(31, 'Repostería', '2024-11-06 18:56:20', '2024-11-06 18:56:20'),
(32, 'Carn i Peix', '2024-11-07 15:22:08', '2024-11-07 15:22:08'),
(33, 'Cereals', '2024-11-07 15:22:23', '2024-11-07 15:22:23'),
(34, 'Begudes', '2024-11-07 15:22:50', '2024-11-07 15:22:50'),
(35, 'Fruits Secs', '2024-11-07 15:22:57', '2024-11-07 15:22:57'),
(36, 'Condiments i Espècies', '2024-11-07 15:23:05', '2024-11-07 15:23:05'),
(37, 'Productes d\'Higiene Personal', '2024-11-07 15:23:12', '2024-11-07 15:23:12'),
(38, 'Llaunes i Conserves', '2024-11-07 15:23:18', '2024-11-07 15:23:18'),
(39, 'Snacks i Aperitius', '2024-11-07 15:23:27', '2024-11-07 15:23:27'),
(40, 'Productes Congelats', '2024-11-07 15:23:44', '2024-11-07 15:23:44'),
(41, 'Salses i Adobs', '2024-11-07 15:23:50', '2024-11-07 15:23:50'),
(42, 'Cafeteria i Pastisseria', '2024-11-07 15:23:56', '2024-11-07 15:23:56'),
(44, 'Productes de Neteja', '2024-11-07 15:29:18', '2024-11-07 15:29:18'),
(45, 'Pa i Derivats', '2024-11-07 15:31:05', '2024-11-07 15:31:05'),
(46, 'Bases per a Cuinar', '2024-11-07 15:33:30', '2024-11-07 15:33:30'),
(47, 'Postres', '2024-11-07 15:34:32', '2024-11-07 15:34:32'),
(48, 'Làctics', '2024-11-07 15:37:34', '2024-11-07 15:37:34'),
(50, 'Aromatitzants i Productes de Llar', '2024-11-14 17:33:00', '2024-11-14 17:33:00'),
(51, 'Farmàcia', '2024-11-14 17:35:00', '2024-11-14 17:35:00'),
(52, 'Electrodomèstics', '2024-11-14 17:36:00', '2024-11-14 17:36:00'),
(53, 'Per a Mascotes', '2024-11-14 17:37:00', '2024-11-14 17:37:00'),
(54, 'Bellesa i Cosmètica', '2024-11-14 17:38:00', '2024-11-14 17:38:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llistas`
--

CREATE TABLE `llistas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `share_token` varchar(64) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `llistas`
--

INSERT INTO `llistas` (`id`, `name`, `share_token`, `created_at`, `updated_at`) VALUES
(21, 'Mercadona', 'GJT5TNkc3iJadHKFsLqMjjCj9pMVDkgBwoKEFkJ6JwjOBbcRfx71n3LWDHnXujtB', '2024-11-06 17:56:16', '2024-11-18 17:01:33'),
(22, 'Carrefour', 'rXARYxO19gHh2xfL6dZdhSuBiExbA9zKi4DNIkLHZ1fZXfASDgm5SWN8mJGpq0To', '2024-11-06 18:51:20', '2024-11-18 17:00:04'),
(23, 'Esclat', 'ryHnJa7SaRgXyO89otsCPicm9lTofMqfkZqEyZlouR0ZxnrETzaXwTpC6J8uK53R', '2024-11-07 15:12:04', '2024-11-18 16:52:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llista_producte`
--

CREATE TABLE `llista_producte` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `llista_id` bigint(20) UNSIGNED NOT NULL,
  `producte_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `llista_producte`
--

INSERT INTO `llista_producte` (`id`, `llista_id`, `producte_id`, `created_at`, `updated_at`) VALUES
(75, 23, 65, NULL, NULL),
(77, 23, 67, NULL, NULL),
(78, 23, 68, NULL, NULL),
(79, 23, 69, NULL, NULL),
(80, 23, 70, NULL, NULL),
(81, 23, 71, NULL, NULL),
(82, 23, 72, NULL, NULL),
(83, 23, 73, NULL, NULL),
(84, 23, 74, NULL, NULL),
(85, 23, 75, NULL, NULL),
(86, 23, 76, NULL, NULL),
(87, 23, 77, NULL, NULL),
(88, 23, 78, NULL, NULL),
(89, 23, 79, NULL, NULL),
(90, 23, 80, NULL, NULL),
(91, 23, 81, NULL, NULL),
(92, 23, 82, NULL, NULL),
(93, 23, 83, NULL, NULL),
(94, 23, 84, NULL, NULL),
(95, 23, 85, NULL, NULL),
(96, 23, 86, NULL, NULL),
(97, 23, 87, NULL, NULL),
(98, 23, 88, NULL, NULL),
(99, 23, 89, NULL, NULL),
(100, 23, 90, NULL, NULL),
(101, 23, 91, NULL, NULL),
(102, 23, 92, NULL, NULL),
(103, 23, 93, NULL, NULL),
(104, 23, 94, NULL, NULL),
(105, 23, 95, NULL, NULL),
(106, 23, 96, NULL, NULL),
(107, 23, 97, NULL, NULL),
(108, 23, 98, NULL, NULL),
(109, 23, 99, NULL, NULL),
(110, 23, 100, NULL, NULL),
(111, 23, 101, NULL, NULL),
(112, 23, 102, NULL, NULL),
(113, 23, 103, NULL, NULL),
(114, 23, 104, NULL, NULL),
(115, 23, 105, NULL, NULL),
(116, 23, 106, NULL, NULL),
(117, 23, 107, NULL, NULL),
(118, 23, 108, NULL, NULL),
(119, 23, 109, NULL, NULL),
(120, 23, 110, NULL, NULL),
(121, 23, 111, NULL, NULL),
(122, 23, 112, NULL, NULL),
(123, 23, 113, NULL, NULL),
(124, 23, 114, NULL, NULL),
(125, 23, 115, NULL, NULL),
(126, 23, 116, NULL, NULL),
(127, 23, 117, NULL, NULL),
(128, 23, 118, NULL, NULL),
(129, 23, 119, NULL, NULL),
(130, 23, 120, NULL, NULL),
(131, 23, 121, NULL, NULL),
(132, 23, 122, NULL, NULL),
(133, 23, 123, NULL, NULL),
(134, 23, 124, NULL, NULL),
(135, 23, 125, NULL, NULL),
(136, 23, 126, NULL, NULL),
(137, 23, 127, NULL, NULL),
(138, 23, 128, NULL, NULL),
(139, 23, 129, NULL, NULL),
(140, 23, 130, NULL, NULL),
(141, 23, 131, NULL, NULL),
(142, 23, 132, NULL, NULL),
(143, 23, 133, NULL, NULL),
(144, 23, 134, NULL, NULL),
(145, 23, 135, NULL, NULL),
(146, 23, 136, NULL, NULL),
(147, 23, 137, NULL, NULL),
(148, 23, 138, NULL, NULL),
(149, 23, 139, NULL, NULL),
(157, 22, 61, NULL, NULL),
(159, 21, 61, NULL, NULL),
(161, 23, 61, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llista_user`
--

CREATE TABLE `llista_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `llista_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_10_29_152515_create_categorias_table', 1),
(10, '2024_10_29_152515_create_llistas_table', 1),
(11, '2024_10_29_161934_create_llista_user_table', 2),
(12, '2024_10_29_181937_add_llista_id_to_productes_table', 3),
(13, '2024_11_05_155821_create_llista_producte_table', 4),
(15, '2024_11_11_175114_add_quantitat_to_productes_table', 5),
(16, '2024_11_18_170057_add_share_token_to_llistas_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productes`
--

CREATE TABLE `productes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `completat` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `llista_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantitat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`id`, `nom`, `categoria_id`, `completat`, `created_at`, `updated_at`, `llista_id`, `quantitat`) VALUES
(61, 'Meló', 26, 0, '2024-11-11 17:24:49', '2024-11-19 15:59:30', NULL, 17),
(65, 'Llentilles', 30, 0, '2024-11-11 17:27:00', '2024-11-19 16:51:25', NULL, 4),
(67, 'Pollastre', 32, 0, '2024-11-11 17:29:00', '2024-11-19 15:59:30', NULL, 4),
(68, 'Ous', 32, 0, '2024-11-11 17:29:45', '2024-11-19 15:59:30', NULL, 12),
(69, 'Iogurt', 48, 0, '2024-11-11 17:30:15', '2024-11-19 15:59:30', NULL, 8),
(70, 'Llet', 48, 0, '2024-11-11 17:31:00', '2024-11-19 15:59:30', NULL, 3),
(71, 'Pasta', 33, 0, '2024-11-11 17:32:30', '2024-11-19 15:59:30', NULL, 2),
(72, 'Arròs', 33, 0, '2024-11-11 17:33:15', '2024-11-19 15:59:30', NULL, 6),
(73, 'Pa', 45, 0, '2024-11-11 17:34:00', '2024-11-19 15:59:30', NULL, 1),
(74, 'Oli d\'oliva', 41, 0, '2024-11-11 17:35:00', '2024-11-19 15:59:30', NULL, 1),
(75, 'Mantega', 41, 0, '2024-11-11 17:36:30', '2024-11-19 15:59:30', NULL, 2),
(76, 'Ketchup', 41, 0, '2024-11-11 17:37:15', '2024-11-19 15:59:30', NULL, 1),
(77, 'Salsa de soja', 41, 0, '2024-11-11 17:38:00', '2024-11-19 15:59:30', NULL, 1),
(78, 'Xocolata', 47, 0, '2024-11-11 17:39:30', '2024-11-19 15:59:30', NULL, 5),
(79, 'Caramels', 47, 0, '2024-11-11 17:40:00', '2024-11-19 15:59:30', NULL, 2),
(80, 'Aigua', 34, 0, '2024-11-11 17:41:00', '2024-11-19 15:59:30', NULL, 4),
(81, 'Coca-Cola', 34, 0, '2024-11-11 17:42:00', '2024-11-19 15:59:30', NULL, 6),
(82, 'Taronja', 26, 0, '2024-11-11 17:43:00', '2024-11-19 15:59:30', NULL, 8),
(83, 'Pera', 26, 0, '2024-11-11 17:44:00', '2024-11-19 15:59:30', NULL, 10),
(84, 'Carbassó', 27, 0, '2024-11-11 17:45:00', '2024-11-19 15:59:30', NULL, 4),
(85, 'Cebes', 27, 0, '2024-11-11 17:46:00', '2024-11-19 15:59:30', NULL, 3),
(86, 'Xampinyons', 27, 0, '2024-11-11 17:47:00', '2024-11-19 15:59:30', NULL, 5),
(87, 'Alvocat', 26, 0, '2024-11-11 17:48:00', '2024-11-19 15:59:30', NULL, 2),
(88, 'Cigrons', 30, 0, '2024-11-11 17:49:00', '2024-11-19 15:59:30', NULL, 6),
(89, 'Fesols', 30, 0, '2024-11-11 17:50:00', '2024-11-19 15:59:30', NULL, 3),
(90, 'Pernil dolç', 32, 0, '2024-11-11 17:52:00', '2024-11-19 15:59:30', NULL, 2),
(91, 'Bacallà', 32, 0, '2024-11-11 17:53:00', '2024-11-19 15:59:30', NULL, 3),
(92, 'Filets de pollastre', 32, 0, '2024-11-11 17:54:00', '2024-11-19 15:59:30', NULL, 6),
(93, 'Cereals de jeure', 33, 0, '2024-11-11 17:55:00', '2024-11-19 15:59:30', NULL, 7),
(94, 'Avena', 33, 0, '2024-11-11 17:56:00', '2024-11-19 15:59:30', NULL, 5),
(95, 'Coca Cola Zero', 34, 0, '2024-11-11 17:57:00', '2024-11-19 15:59:30', NULL, 2),
(96, 'Suc de taronja', 34, 0, '2024-11-11 17:58:00', '2024-11-19 15:59:30', NULL, 3),
(97, 'Suc de poma', 34, 0, '2024-11-11 17:59:00', '2024-11-19 15:59:30', NULL, 4),
(98, 'Nous', 35, 0, '2024-11-11 18:01:00', '2024-11-19 15:59:30', NULL, 3),
(99, 'Pistatxos', 35, 0, '2024-11-11 18:02:00', '2024-11-19 15:59:30', NULL, 4),
(100, 'Peix en conserva', 38, 0, '2024-11-11 18:03:00', '2024-11-19 15:59:30', NULL, 6),
(101, 'Poma', 26, 0, '2024-11-14 17:00:00', '2024-11-19 15:59:30', NULL, 1),
(102, 'Gel de dutxa', 37, 0, '2024-11-11 18:04:00', '2024-11-19 15:59:30', NULL, 2),
(103, 'Pasta de dents', 37, 0, '2024-11-11 18:06:00', '2024-11-19 15:59:30', NULL, 2),
(104, 'Desodorant', 37, 0, '2024-11-11 18:07:00', '2024-11-19 15:59:30', NULL, 1),
(105, 'Xampú', 37, 0, '2024-11-11 18:08:00', '2024-11-19 15:59:30', NULL, 1),
(106, 'Esponja de bany', 37, 0, '2024-11-11 18:09:00', '2024-11-19 15:59:30', NULL, 2),
(107, 'Detergent líquid', 44, 0, '2024-11-11 18:10:00', '2024-11-19 15:59:30', NULL, 2),
(108, 'Amoníac', 44, 0, '2024-11-11 18:11:00', '2024-11-19 15:59:30', NULL, 1),
(109, 'Salses per amanides', 41, 0, '2024-11-11 18:13:00', '2024-11-19 15:59:30', NULL, 3),
(110, 'Vinagre balsàmic', 41, 0, '2024-11-11 18:14:00', '2024-11-19 15:59:30', NULL, 2),
(111, 'Salsa pesto', 41, 0, '2024-11-11 18:15:00', '2024-11-19 15:59:30', NULL, 1),
(112, 'Maionesa', 41, 0, '2024-11-11 18:16:00', '2024-11-19 15:59:30', NULL, 2),
(113, 'Salsa barbacoa', 41, 0, '2024-11-11 18:17:00', '2024-11-19 15:59:30', NULL, 1),
(114, 'Crema hidratant', 37, 0, '2024-11-11 18:18:00', '2024-11-19 15:59:30', NULL, 1),
(115, 'Raspall de dents', 37, 0, '2024-11-11 18:19:00', '2024-11-19 15:59:30', NULL, 2),
(116, 'Mocadors', 44, 0, '2024-11-11 18:21:00', '2024-11-19 15:59:30', NULL, 4),
(117, 'Ultima junior', 53, 0, '2024-11-14 17:05:22', '2024-11-19 15:59:30', NULL, 3),
(118, 'Ambientador', 52, 0, '2024-11-14 17:45:00', '2024-11-19 15:59:30', NULL, 3),
(119, 'Espelma aromàtica', 52, 0, '2024-11-14 17:46:00', '2024-11-19 15:59:30', NULL, 2),
(120, 'Vitamina C', 54, 0, '2024-11-14 17:49:00', '2024-11-19 15:59:30', NULL, 1),
(121, 'Fisiocrem', 51, 0, '2024-11-14 17:50:00', '2024-11-19 15:59:30', NULL, 2),
(122, 'Lavadora', 52, 0, '2024-11-14 17:51:00', '2024-11-19 15:59:30', NULL, 1),
(123, 'Cafetera', 52, 0, '2024-11-14 17:52:00', '2024-11-19 15:59:30', NULL, 1),
(124, 'Crema hidratant facial', 54, 0, '2024-11-14 17:55:00', '2024-11-19 15:59:30', NULL, 1),
(125, 'Bròquil', 27, 0, '2024-11-14 18:41:00', '2024-11-19 15:59:30', NULL, 1),
(126, 'Cereals de blat', 33, 0, '2024-11-14 18:45:00', '2024-11-19 15:59:30', NULL, 1),
(127, 'Nous', 35, 0, '2024-11-14 18:47:00', '2024-11-19 15:59:30', NULL, 1),
(128, 'Curri en pols', 36, 0, '2024-11-14 18:48:00', '2024-11-19 15:59:30', NULL, 1),
(129, 'Tonyina en conserva', 38, 0, '2024-11-14 18:50:00', '2024-11-19 15:59:30', NULL, 3),
(130, 'Patates fregides', 39, 0, '2024-11-14 18:51:00', '2024-11-19 15:59:30', NULL, 1),
(131, 'Pizzes congelades', 40, 0, '2024-11-14 18:52:00', '2024-11-19 15:59:30', NULL, 2),
(132, 'Salsa de soja', 41, 0, '2024-11-14 18:53:00', '2024-11-19 15:59:30', NULL, 1),
(133, 'Cafè mòlt', 42, 0, '2024-11-14 18:54:00', '2024-11-19 15:59:30', NULL, 1),
(134, 'Pa de motlle', 45, 0, '2024-11-14 18:56:00', '2024-11-19 15:59:30', NULL, 2),
(135, 'Sopa instantània', 46, 0, '2024-11-14 18:57:00', '2024-11-19 15:59:30', NULL, 1),
(136, 'Llet desnatada', 48, 0, '2024-11-14 18:59:00', '2024-11-19 15:59:30', NULL, 1),
(137, 'Ambientador en sprai', 50, 0, '2024-11-14 19:00:00', '2024-11-19 15:59:30', NULL, 1),
(138, 'Ibuprofè', 51, 0, '2024-11-14 19:01:00', '2024-11-19 15:59:30', NULL, 1),
(139, 'Torradora', 52, 0, '2024-11-14 19:02:00', '2024-11-19 15:59:30', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `llistas`
--
ALTER TABLE `llistas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `llistas_share_token_unique` (`share_token`);

--
-- Indices de la tabla `llista_producte`
--
ALTER TABLE `llista_producte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `llista_producte_llista_id_foreign` (`llista_id`),
  ADD KEY `llista_producte_producte_id_foreign` (`producte_id`);

--
-- Indices de la tabla `llista_user`
--
ALTER TABLE `llista_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `llista_user_llista_id_foreign` (`llista_id`),
  ADD KEY `llista_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productes_llista_id_foreign` (`llista_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `llistas`
--
ALTER TABLE `llistas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `llista_producte`
--
ALTER TABLE `llista_producte`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT de la tabla `llista_user`
--
ALTER TABLE `llista_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productes`
--
ALTER TABLE `productes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `llista_producte`
--
ALTER TABLE `llista_producte`
  ADD CONSTRAINT `llista_producte_llista_id_foreign` FOREIGN KEY (`llista_id`) REFERENCES `llistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `llista_producte_producte_id_foreign` FOREIGN KEY (`producte_id`) REFERENCES `productes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `llista_user`
--
ALTER TABLE `llista_user`
  ADD CONSTRAINT `llista_user_llista_id_foreign` FOREIGN KEY (`llista_id`) REFERENCES `llistas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `llista_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productes`
--
ALTER TABLE `productes`
  ADD CONSTRAINT `productes_llista_id_foreign` FOREIGN KEY (`llista_id`) REFERENCES `llistas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
