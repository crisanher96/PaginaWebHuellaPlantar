-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2018 a las 15:48:13
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
-- Base de datos: `huella_plantar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_deportivas`
--

CREATE TABLE `categoria_deportivas` (
  `id_cat_dep` int(10) UNSIGNED NOT NULL,
  `nombre_cat_dep` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_deportivas`
--

INSERT INTO `categoria_deportivas` (`id_cat_dep`, `nombre_cat_dep`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Escuela de Formación', 1, '2018-10-15 23:56:54', '2018-10-16 03:14:13'),
(2, 'Deportista Profesional', 1, '2018-10-16 02:09:11', '2018-10-16 02:09:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `id_deporte` int(10) UNSIGNED NOT NULL,
  `nombre_deporte` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`id_deporte`, `nombre_deporte`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Futbol', 1, '2018-10-15 21:58:36', '2018-10-16 03:12:53'),
(2, 'Basketball', 1, '2018-10-15 22:06:50', '2018-10-15 22:06:50'),
(3, 'Voleyball', 1, '2018-10-15 22:06:57', '2018-10-15 22:06:57'),
(4, 'Patinaje', 1, '2018-10-15 22:07:02', '2018-10-16 00:43:55'),
(5, 'Natación', 1, '2018-10-15 22:07:12', '2018-10-15 22:07:12'),
(6, 'Karate', 1, '2018-10-16 18:39:34', '2018-10-16 18:39:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id_diagnostico` int(10) UNSIGNED NOT NULL,
  `id_examen` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `diagnostico` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`id_diagnostico`, `id_examen`, `id_medico`, `diagnostico`, `estado`, `created_at`, `updated_at`) VALUES
(5, 16, 3, 'este es el segundo examen', 1, '2018-10-28 09:22:31', '2018-10-28 09:22:31'),
(6, 17, 3, 'bsk bsj hola este es el examen de Neil', 1, '2018-10-30 04:24:26', '2018-10-30 04:24:26'),
(8, 16, 3, 'Este es un nuevo diagnostico para el examen.', 1, '2018-11-05 18:56:46', '2018-11-05 18:56:46'),
(10, 15, 3, 'Se le asigno un diagnostico al examen.', 1, '2018-11-05 19:52:27', '2018-11-05 19:52:27'),
(11, 15, 3, 'hjghjgjgj', 1, '2018-11-10 20:17:22', '2018-11-10 20:17:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_examens`
--

CREATE TABLE `estado_examens` (
  `id_est_examen` int(10) UNSIGNED NOT NULL,
  `nombre_estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_estado` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_examens`
--

INSERT INTO `estado_examens` (`id_est_examen`, `nombre_estado`, `descripcion_estado`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Examen Actual', 'Ultimo examen activo', 1, '2018-10-20 15:00:00', '2018-10-20 15:00:00'),
(2, 'Examen Historico', 'Examenes Historicos ', 1, '2018-10-20 15:02:00', '2018-10-20 15:02:00'),
(3, 'En Proceso', 'Examen en proceso tomado por un auxiliar.', 1, '2018-10-20 15:04:00', '2018-10-20 15:04:00'),
(4, 'Inactivo', 'Examen inactivo.', 1, '2018-10-20 15:06:00', '2018-10-20 15:06:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examens`
--

CREATE TABLE `examens` (
  `id_examen` int(10) UNSIGNED NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_enc_exa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `indice_izq` int(11) NOT NULL,
  `indice_der` int(11) NOT NULL,
  `clasi_izq` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clasi_der` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_original` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_izq` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_der` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vx_izq` double(8,2) NOT NULL,
  `vy_izq` double(8,2) NOT NULL,
  `vx_der` double(8,2) NOT NULL,
  `vy_der` double(8,2) NOT NULL,
  `estado_exa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `examens`
--

INSERT INTO `examens` (`id_examen`, `id_paciente`, `id_enc_exa`, `fecha`, `indice_izq`, `indice_der`, `clasi_izq`, `clasi_der`, `imagen_original`, `imagen_izq`, `imagen_der`, `vx_izq`, `vy_izq`, `vx_der`, `vy_der`, `estado_exa`, `created_at`, `updated_at`) VALUES
(15, 3, 3, '2018-10-28', 49, 44, 'Normal', 'Normal', '3ORI20181028042135.jpg', '3IZQ20181028042135.jpg', '3DER20181028042135.jpg', 224.00, 115.00, 220.00, 124.00, 1, '2018-10-28 09:21:35', '2018-11-05 19:52:27'),
(16, 3, 3, '2018-10-28', 49, 44, 'Normal', 'Normal', '3ORI20181028042231.jpg', '3IZQ20181028042231.jpg', '3DER20181028042231.jpg', 224.00, 115.00, 220.00, 124.00, 2, '2018-10-28 09:22:31', '2018-11-05 19:52:27'),
(17, 5, 3, '2018-10-29', 62, 66, 'Cavo', 'Cavo', '5ORI20181029232426.jpg', '5IZQ20181029232426.jpg', '5DER20181029232426.jpg', 226.00, 86.00, 211.00, 72.00, 1, '2018-10-30 04:24:26', '2018-10-30 04:24:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_11_111743_create_usuarios_table', 1),
(4, '2018_10_13_213746_create_rols_table', 2),
(5, '2018_10_15_130942_create_rols_table', 3),
(6, '2018_10_15_143140_create_usuarios_table', 4),
(7, '2018_10_15_164122_create_deportes_table', 5),
(8, '2018_10_15_171916_create_profesions_table', 6),
(9, '2018_10_15_174000_create_profesions_table', 7),
(13, '2018_10_15_182721_create_categoria_deportivas_table', 8),
(14, '2018_10_20_143754_create_estado_examens_table', 9),
(15, '2018_10_20_150008_create_examens_table', 10),
(16, '2018_10_27_105034_create_diagnosticos_table', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesions`
--

CREATE TABLE `profesions` (
  `id_profesion` int(10) UNSIGNED NOT NULL,
  `nombre_profesion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesions`
--

INSERT INTO `profesions` (`id_profesion`, `nombre_profesion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Estudiante (Primaria)', 1, '2018-10-15 22:41:13', '2018-10-16 03:13:20'),
(2, 'Estudiante (Secundaria)', 1, '2018-10-16 02:47:07', '2018-10-16 02:47:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id_rol` int(10) UNSIGNED NOT NULL,
  `nombre_rol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_rol` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id_rol`, `nombre_rol`, `descripcion_rol`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Usuario con acceso total al sistema.', 1, '2018-10-15 22:08:01', '2018-10-16 03:15:04'),
(2, 'Medico', 'Usuario encargado de la toma de exámenes, generación de diagnósticos e informes.', 1, '2018-10-15 22:08:34', '2018-10-15 22:08:34'),
(3, 'Auxiliar', 'Auxiliar del medico encargado de la captura de exámenes.', 1, '2018-10-15 22:08:56', '2018-10-15 22:08:56'),
(4, 'Paciente', 'Usuario general del sistema.', 1, '2018-10-15 22:09:27', '2018-10-15 22:09:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `num_iden` bigint(20) NOT NULL,
  `nombres` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fech_nacimiento` date NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_deporte` int(11) NOT NULL,
  `id_cat_dep` int(11) NOT NULL,
  `id_profesion` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `estatura` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enfermedades` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergias` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `num_iden`, `nombres`, `apellidos`, `email`, `password`, `telefono`, `direccion`, `fech_nacimiento`, `id_rol`, `id_deporte`, `id_cat_dep`, `id_profesion`, `peso`, `estatura`, `enfermedades`, `alergias`, `created_at`, `updated_at`) VALUES
(3, 1070617826, 'Cristian Andres', 'Hernandez Garcia', 'cristianhegarcia@gmail.com', '$2y$10$Q6vo5tozy9kDVo9k/y8S2ufWbdKc6/BmJ7Uz/jZ9DHOcfA7kab5gi', '3143133225', 'Manzana L Casa 9 Barrio Cambulos', '1996-01-07', 2, 1, 1, 2, 80, '171', 'Gripe', 'NINGUNA', '2018-10-15 21:19:25', '2018-10-16 18:40:58'),
(4, 1069, 'Neil', 'Cubillo', 'neilcc20@gmail.com', '$2y$10$aZ5wIMGXcvyXx03aO0bJo.f16rxzfBrfQ9At1NuP.siL5NHhXMM3q', '41421', 'hhgsdgfsjd', '1998-07-01', 4, 5, 1, 1, 78, '174', 'jshsaj', 'jasjhasjd', '2018-10-16 21:22:39', '2018-10-16 21:22:39'),
(5, 1071550664, 'Neil', 'Cubillos', 'neilcc20@gmail.com', '$2y$10$Q6vo5tozy9kDVo9k/y8S2ufWbdKc6/BmJ7Uz/jZ9DHOcfA7kab5gi', '3132919488', 'Arbelaez', '1997-02-20', 4, 5, 1, 2, 65, '174', 'Ninguna', 'Ninguna', '2018-10-29 22:19:26', '2018-10-29 22:19:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_deportivas`
--
ALTER TABLE `categoria_deportivas`
  ADD PRIMARY KEY (`id_cat_dep`);

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`id_deporte`);

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id_diagnostico`);

--
-- Indices de la tabla `estado_examens`
--
ALTER TABLE `estado_examens`
  ADD PRIMARY KEY (`id_est_examen`);

--
-- Indices de la tabla `examens`
--
ALTER TABLE `examens`
  ADD PRIMARY KEY (`id_examen`);

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
-- Indices de la tabla `profesions`
--
ALTER TABLE `profesions`
  ADD PRIMARY KEY (`id_profesion`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuarios_num_iden_unique` (`num_iden`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_deportivas`
--
ALTER TABLE `categoria_deportivas`
  MODIFY `id_cat_dep` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `id_deporte` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id_diagnostico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estado_examens`
--
ALTER TABLE `estado_examens`
  MODIFY `id_est_examen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `examens`
--
ALTER TABLE `examens`
  MODIFY `id_examen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `profesions`
--
ALTER TABLE `profesions`
  MODIFY `id_profesion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id_rol` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
