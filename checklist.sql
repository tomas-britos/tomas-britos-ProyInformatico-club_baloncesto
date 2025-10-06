--
-- Base de datos: `checklist_example`
--
CREATE DATABASE `checklist_example`;

USE `checklist_example`;

--
-- Estructura de tabla para la tabla `checklist`
--
CREATE TABLE
  `checklist` (
    `id` int (11) NOT NULL,
    `text` varchar(255) NOT NULL,
    `checked` tinyint (1) NOT NULL DEFAULT 0
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Indices de la tabla `checklist`
--
ALTER TABLE `checklist` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `checklist`
--
ALTER TABLE `checklist` MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;