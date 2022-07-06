-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2022 a las 18:07:56
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `authors`
--

INSERT INTO `authors` (`id`, `name`, `last_name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Boichi', '', 'Artista', NULL, NULL),
(2, 'Riichiro', 'Inagaki', 'Mangaka', NULL, NULL),
(4, 'Gege', 'Akutami', 'Mangaka', NULL, NULL),
(5, 'Yuki', 'Tabata', 'Mangaka', NULL, NULL),
(6, 'Yoshigiro', 'Togashi', 'Mangaka', NULL, NULL),
(7, 'Sui', 'Ishida', 'Mangaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author_manga`
--

CREATE TABLE `author_manga` (
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `manga_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `author_manga`
--

INSERT INTO `author_manga` (`author_id`, `manga_id`) VALUES
(1, 1),
(2, 1),
(4, 2),
(5, 3),
(6, 4),
(7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enum_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genders`
--

INSERT INTO `genders` (`id`, `enum_gender`, `created_at`, `updated_at`) VALUES
(1, 'Shonen', '2022-07-05 19:18:58', '2022-07-05 19:18:58'),
(2, 'Seinen', '2022-07-05 19:27:23', '2022-07-05 19:27:23'),
(3, 'Magia', '2022-07-05 19:27:52', '2022-07-05 19:27:52'),
(4, 'Drama', NULL, NULL),
(5, 'Gore', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gender_manga`
--

CREATE TABLE `gender_manga` (
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `manga_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `gender_manga`
--

INSERT INTO `gender_manga` (`gender_id`, `manga_id`) VALUES
(1, 3),
(3, 3),
(1, 4),
(1, 2),
(3, 2),
(1, 1),
(2, 1),
(4, 2),
(4, 5),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `tome_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mangas`
--

CREATE TABLE `mangas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_portrait` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('broadcast','finished') COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periodicity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mangas`
--

INSERT INTO `mangas` (`id`, `name`, `url_portrait`, `state`, `published_at`, `periodicity`, `synopsis`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Stone', 'https://pack-yak.intomanga.com/thumbnails/manga/Dr-Stone/d9e47ba6-7dfc-401d-a21c-19326c2ea45f', 'finished', '06/03/2017', 'semanal', 'La aventura de ciencia ficción sigue a dos muchachos que luchan por revivir a la humanidad después de que una misteriosa crisis ha dejado a todos en el mundo convertidos en piedra durante varios milenios.', '2022-07-06 00:14:59', '2022-07-06 00:14:59'),
(2, 'Jujutsu Kaisen', 'https://pack-yak.intomanga.com/thumbnails/manga/Jujutsu-Kaisen/d88692a5-c341-47fc-8e39-da11a8fdee82', 'broadcast', '28/04/2017', 'mensual', 'Yuuji Itadori es un estudiante con unas habilidades físicas excepcionales. Todos los días, como rutina, va al hospital a visitar a su abuelo enfermo y decide apuntarse al club de ocultismo de instituto para no dar un palo en el agua... Sin embargo, un buen día el sello del talismán que se hallaba escondido en su instituto se rompe, y comienzan a aparecer unos monstruos. Ante este giro de los acontecimientos, Itadori decide adentrarse en el instituto para salvar a sus compañeros. ¿Qué le deparará el destino?', '2022-07-06 00:15:46', '2022-07-06 00:15:46'),
(3, 'Black Clover', 'https://pack-yak.intomanga.com/thumbnails/manga/Black-Clover/e7f9297e-377a-4c23-b396-ae88600251b1', 'broadcast', '16/02/2015', 'semanal', 'La historia gira entorno a Asta, un chico bullicioso y sin aparente talento mágico y Yuno, su amigo y rival, el cual es un genio en el uso de la magia. Ambos tienen sueños de convertirse en el Rey Mago, para cumplir la promesa hecha por ambos durante su infancia, uno de los dos debe ser el mago más fuerte.', '2022-07-06 00:17:05', '2022-07-06 00:17:05'),
(4, 'Hunter X Hunter', 'https://pack-yak.intomanga.com/thumbnails/manga/Hunter-X-Hunter/e33aa40a-421e-4428-93d8-abbe8a52de3f', 'broadcast', '03/03/1998', 'semanal', 'Los Hunters son personas que se dedican principalmente a rastrear tesoros, descubrir o cazar criaturas mágicas y algunas veces otros hombres. Pero, estas actividades requieren una licencia, y menos de uno entre cien-mil puede pasar el examen de cualificación. Aquellos que logren pasar el duro examen se ganarán el acceso a áreas restringidas y el derecho a llamarse a si mismos Hunters.', '2022-07-06 00:18:36', '2022-07-06 00:18:36'),
(5, 'Tokyo Ghoul: Re', 'https://inmanga.com/thumbnails/manga/Tokyo-Ghoul-Re/49bf941d-060f-4849-a109-9277c010c713', 'finished', '24/10/2014', 'semanal', 'En Tokyo, la tragedia sigue su curso. Los ghouls, seres misteriosos que se alimentan de carne humana, se propagan por sus calles. Mezclándose entre los humanos durante el día, aterrorizándolos al caer la noche.\r\n\r\nEn ese angustioso escenario el CCG, única institución que investiga y resuelve los casos relacionados con ghouls, encomienda una misión especial a Haise Sasaki, un talentoso investigador con un pasado enigmático.\r\n\r\nUna puerta se ha abierto y los misterios tras ella serán revelados, días oscuros comienzan para Haise.', '2022-07-06 00:39:07', '2022-07-06 00:39:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_30_232639_create_database', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tomes`
--

CREATE TABLE `tomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_tome` int(11) NOT NULL,
  `published_at` date NOT NULL,
  `number_pages` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manga_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tomes`
--

INSERT INTO `tomes` (`id`, `number_tome`, `published_at`, `number_pages`, `price`, `created_at`, `updated_at`, `manga_id`) VALUES
(101, 1, '2017-03-06', 48, 9.99, '2022-07-05 20:49:39', '2022-07-05 20:49:39', 1),
(102, 2, '2017-03-06', 25, 9.99, '2022-07-05 20:49:39', '2022-07-05 20:49:39', 1),
(103, 3, '2017-03-13', 23, 9.99, '2022-07-05 20:49:39', '2022-07-05 20:49:39', 1),
(104, 4, '2017-03-20', 19, 9.99, '2022-07-05 20:49:39', '2022-07-05 20:49:39', 1),
(105, 5, '2017-03-27', 19, 9.99, '2022-07-05 20:49:39', '2022-07-05 20:49:39', 1),
(201, 1, '2017-04-28', 54, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 2),
(202, 2, '2017-05-05', 21, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 2),
(203, 3, '2017-05-12', 24, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 2),
(204, 4, '2017-05-19', 21, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 2),
(205, 5, '2017-05-26', 21, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 2),
(301, 1, '2015-02-16', 52, 9.56, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 3),
(302, 2, '2015-02-23', 26, 9.56, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 3),
(303, 3, '2015-03-02', 23, 9.56, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 3),
(304, 4, '2015-03-09', 20, 9.56, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 3),
(305, 5, '2015-03-16', 20, 9.56, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 3),
(401, 1, '1998-03-03', 32, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 4),
(402, 2, '1998-03-10', 24, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 4),
(403, 3, '1998-03-17', 20, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 4),
(404, 4, '1998-03-24', 22, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 4),
(405, 5, '1998-03-31', 20, 9.87, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 4),
(501, 1, '2014-10-24', 44, 9.99, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 5),
(502, 2, '2014-10-31', 23, 9.99, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 5),
(503, 3, '2014-11-07', 22, 9.99, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 5),
(504, 4, '2014-11-14', 19, 9.99, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 5),
(505, 5, '2014-11-21', 16, 9.99, '2022-07-05 20:52:29', '2022-07-05 20:52:29', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `author_manga`
--
ALTER TABLE `author_manga`
  ADD KEY `author_manga_author_id_foreign` (`author_id`),
  ADD KEY `author_manga_manga_id_foreign` (`manga_id`);

--
-- Indices de la tabla `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gender_manga`
--
ALTER TABLE `gender_manga`
  ADD KEY `gender_manga_gender_id_foreign` (`gender_id`),
  ADD KEY `gender_manga_manga_id_foreign` (`manga_id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_bill_id_foreign` (`bill_id`),
  ADD KEY `items_tome_id_foreign` (`tome_id`);

--
-- Indices de la tabla `mangas`
--
ALTER TABLE `mangas`
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
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `tomes`
--
ALTER TABLE `tomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tomes_manga_id_foreign` (`manga_id`);

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
-- AUTO_INCREMENT de la tabla `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mangas`
--
ALTER TABLE `mangas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tomes`
--
ALTER TABLE `tomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `author_manga`
--
ALTER TABLE `author_manga`
  ADD CONSTRAINT `author_manga_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `author_manga_manga_id_foreign` FOREIGN KEY (`manga_id`) REFERENCES `mangas` (`id`);

--
-- Filtros para la tabla `gender_manga`
--
ALTER TABLE `gender_manga`
  ADD CONSTRAINT `gender_manga_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  ADD CONSTRAINT `gender_manga_manga_id_foreign` FOREIGN KEY (`manga_id`) REFERENCES `mangas` (`id`);

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `items_tome_id_foreign` FOREIGN KEY (`tome_id`) REFERENCES `tomes` (`id`);

--
-- Filtros para la tabla `tomes`
--
ALTER TABLE `tomes`
  ADD CONSTRAINT `tomes_manga_id_foreign` FOREIGN KEY (`manga_id`) REFERENCES `mangas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
