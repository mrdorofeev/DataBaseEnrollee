-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 19 2022 г., 08:21
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `enrolleesite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments` (
  `id` int NOT NULL,
  `name_department` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id`, `name_department`) VALUES
(5, 'Факультет искусств'),
(4, 'Факультет прикладной математики — процессов управления'),
(3, 'Факультет социологии'),
(2, 'Филологический факультет'),
(1, 'Экономический факультет');

-- --------------------------------------------------------

--
-- Структура таблицы `enrollees`
--

CREATE TABLE `enrollees` (
  `id` int NOT NULL,
  `admin` tinyint NOT NULL DEFAULT '0',
  `firstName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `enrollees`
--

INSERT INTO `enrollees` (`id`, `admin`, `firstName`, `email`, `password`) VALUES
(15, 1, 'Олег', 'oleg@admin.com', '$2y$10$dPA7brlHlUVoutcLDyMbietrrC2pEIVBqbQ8o4lWj284pkUPAVVwS'),
(20, 0, 'Борис', 'boris@mail.ru', '$2y$10$6mqIC8fIm/E8gMrrUUOY5e8EiMJgVtXWPtFp7kIpNcCA6EulO2IM.'),
(29, 0, 'Василиса', 'vasilisa@mail.ru', '$2y$10$4OoVVnZIBbfRrw56ORGbFOY1fr4MT0aXtayVURtp0zBGxcLyWFOry'),
(30, 0, 'Андрей', 'andrew@mail.ru', '$2y$10$Q66wxF6rgjqWek//gfyDMe7enPc8tpO9ENteA0aCvfKUMTYu6Rwgy'),
(32, 0, 'Олег', 'oleg@mail.ru', '$2y$10$wTtHLBDyByItZ1mV4cKwXO58OpB.QlgJlKPxvjzuo8wJX7RmhB52O');

-- --------------------------------------------------------

--
-- Структура таблицы `enrollee_subject`
--

CREATE TABLE `enrollee_subject` (
  `enrollee_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `result` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `enrollee_subject`
--

INSERT INTO `enrollee_subject` (`enrollee_id`, `subject_id`, `result`) VALUES
(20, 1, 100),
(20, 7, 90),
(20, 12, 70),
(20, 11, 70),
(20, 2, 100),
(20, 6, 100),
(20, 4, 100),
(29, 8, 60),
(29, 4, 80),
(29, 1, 75),
(29, 12, 88),
(29, 2, 77),
(29, 9, 78),
(30, 1, 100),
(30, 8, 80),
(32, 11, 90),
(32, 2, 80),
(32, 1, 80);

-- --------------------------------------------------------

--
-- Структура таблицы `programs`
--

CREATE TABLE `programs` (
  `id` int NOT NULL,
  `name_program` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `department_id` int DEFAULT NULL,
  `student_amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `programs`
--

INSERT INTO `programs` (`id`, `name_program`, `department_id`, `student_amount`) VALUES
(1, 'Большие данные и распределенная цифровая платформа', 4, 40),
(3, 'Прикладная математика, фундаментальная информатика и программирование', 4, 145),
(4, 'Прикладные компьютерные технологии', 4, 10),
(5, 'Программирование и информационные технологии', 4, 25),
(6, 'Прикладная информатика в области искусств и гуманитарных наук', 5, 10),
(7, 'Академическое пение', 5, 2),
(8, 'Графический дизайн', 5, 8),
(9, 'Инструментальное исполнительство на органе, клавесине, карильоне', 5, 5),
(10, 'Реставрация произведений изобразительного и декоративно-прикладного искусства', 5, 10),
(11, 'Социальная работа', 3, 15),
(12, 'Социологические исследования в цифровом обществе', 3, 15),
(13, 'Социология', 3, 35),
(14, 'Ассириология (языки, история и культура Древнего Ближнего Востока)', 2, 63),
(15, 'Классическая филология (древнегреческий и латинский языки; античная литература)', 2, 10),
(16, 'Сравнительно-историческое языкознание (английский язык)', 2, 5),
(17, 'Вьетнамско-кхмерская филология', 2, 63),
(18, 'Бизнес-информатика', 1, 15),
(19, 'Управление персоналом', 1, 10),
(20, 'Экономика', 1, 68),
(21, 'Экономико-математические методы', 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `program_enrollee`
--

CREATE TABLE `program_enrollee` (
  `enrollee_id` int NOT NULL,
  `program_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `program_enrollee`
--

INSERT INTO `program_enrollee` (`enrollee_id`, `program_id`) VALUES
(32, 1),
(20, 3),
(29, 8),
(30, 9),
(20, 12),
(29, 13),
(20, 14),
(29, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `program_subject`
--

CREATE TABLE `program_subject` (
  `program_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL,
  `min_result` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `program_subject`
--

INSERT INTO `program_subject` (`program_id`, `subject_id`, `min_result`) VALUES
(1, 1, 60),
(1, 2, 58),
(1, 11, 59),
(3, 1, 60),
(3, 2, 58),
(3, 11, 59),
(4, 1, 60),
(4, 2, 58),
(4, 11, 59),
(5, 1, 60),
(5, 2, 58),
(5, 11, 59),
(6, 1, 60),
(6, 2, 58),
(6, 11, 59),
(7, 1, 55),
(7, 8, 40),
(8, 1, 55),
(8, 8, 40),
(9, 1, 45),
(9, 8, 40),
(10, 1, 55),
(10, 8, 40),
(11, 1, 70),
(11, 7, 71),
(11, 4, 70),
(12, 1, 70),
(12, 4, 70),
(12, 11, 67),
(13, 1, 66),
(13, 4, 70),
(14, 1, 70),
(14, 7, 71),
(14, 12, 70),
(15, 1, 70),
(15, 8, 73),
(15, 12, 70),
(16, 1, 70),
(16, 12, 70),
(16, 8, 73),
(17, 1, 70),
(17, 12, 70),
(17, 7, 71),
(18, 1, 70),
(18, 11, 70),
(18, 2, 68),
(19, 1, 70),
(19, 4, 70),
(19, 2, 68),
(20, 1, 70),
(20, 9, 76),
(20, 2, 68),
(21, 1, 70),
(21, 9, 76),
(21, 2, 68);

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `name_subject` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `name_subject`) VALUES
(10, 'Биология'),
(9, 'География'),
(12, 'Иностранный язык'),
(11, 'Информатика'),
(7, 'История'),
(8, 'Литература'),
(2, 'Математика'),
(4, 'Обществознание'),
(1, 'Русский язык'),
(5, 'Физика'),
(6, 'Химия');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_department` (`name_department`);

--
-- Индексы таблицы `enrollees`
--
ALTER TABLE `enrollees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `enrollee_subject`
--
ALTER TABLE `enrollee_subject`
  ADD KEY `enrollee_id` (`enrollee_id`),
  ADD KEY `enrollee_subject_ibfk_2` (`subject_id`);

--
-- Индексы таблицы `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_program` (`name_program`),
  ADD KEY `department_id` (`department_id`);

--
-- Индексы таблицы `program_enrollee`
--
ALTER TABLE `program_enrollee`
  ADD PRIMARY KEY (`enrollee_id`,`program_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Индексы таблицы `program_subject`
--
ALTER TABLE `program_subject`
  ADD KEY `program_id` (`program_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_subject` (`name_subject`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `enrollees`
--
ALTER TABLE `enrollees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `enrollee_subject`
--
ALTER TABLE `enrollee_subject`
  ADD CONSTRAINT `enrollee_subject_ibfk_1` FOREIGN KEY (`enrollee_id`) REFERENCES `enrollees` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollee_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `program_enrollee`
--
ALTER TABLE `program_enrollee`
  ADD CONSTRAINT `program_enrollee_ibfk_1` FOREIGN KEY (`enrollee_id`) REFERENCES `enrollees` (`id`),
  ADD CONSTRAINT `program_enrollee_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);

--
-- Ограничения внешнего ключа таблицы `program_subject`
--
ALTER TABLE `program_subject`
  ADD CONSTRAINT `program_subject_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `program_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
