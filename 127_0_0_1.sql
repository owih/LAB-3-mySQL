-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 19 2021 г., 21:10
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `courses`
--
CREATE DATABASE IF NOT EXISTS `courses` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `courses`;

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `teacher_id` int NOT NULL,
  `type_of_reporting_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `name`, `duration`, `price`, `image`, `teacher_id`, `type_of_reporting_id`) VALUES
(1, 'algorithmization', 7, 10400, 'image/image/algorithm.png', 1, 1),
(2, 'programming', 6, 15000, 'image/image/programming.png', 1, 3),
(3, 'disign', 4, 13200, 'image/image/design.png', 2, 2),
(4, 'database', 5, 14900, 'image/image/data.png', 3, 3),
(5, 'javascript', 12, 7450, 'image/image/javascript.png', 4, 1),
(6, 'PHP', 10, 5320, 'image/image/PHP.png', 5, 2),
(7, 'Python', 8, 6100, 'image/image/Python.png', 6, 2),
(8, 'HTML', 3, 7700, 'image/image/HTML.png', 7, 1),
(9, 'CSS', 3, 6560, 'image/image/CSS.png', 8, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `isPaid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `birthday`, `isPaid`) VALUES
(1, 'Dmitry', 'Golovatenko', '2001-03-12', 1),
(2, 'Kirill', 'Sankov', '2001-05-20', 0),
(3, 'Sarsembaj', 'Iskakov', '2001-06-02', 1),
(4, 'Nikita', 'Hvostikov', '2001-11-24', 0),
(5, 'Sania', 'Hadinova', '2001-12-05', 1),
(6, 'Ylyana', 'Popova', '2001-06-16', 0),
(7, 'Alena', 'Bagachuk', '2001-02-11', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `student_course`
--

CREATE TABLE `student_course` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `student_course`
--

INSERT INTO `student_course` (`id`, `student_id`, `course_id`) VALUES
(1, 3, 1),
(2, 4, 5),
(3, 5, 6),
(4, 1, 4),
(5, 2, 2),
(6, 2, 3),
(7, 6, 7),
(8, 7, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `describtion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `birthday` date NOT NULL,
  `rank_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`id`, `first_name`, `last_name`, `describtion`, `birthday`, `rank_id`) VALUES
(1, 'Mike', 'Vazovsky', 'Добрый и отзывчивый преподаватель', '2001-03-12', 1),
(2, 'Vladimir', 'Putin', 'Преподаватель с самым узнаваемым именем', '2001-01-01', 2),
(3, 'Sara', 'Konor', 'Преподаватель с наивысшим опытом работы', '1973-03-12', 3),
(4, 'Olga', 'Buzova', 'Невероятно талантлива', '1990-11-21', 2),
(5, 'Maksim', 'Galkin', 'Ценитель искусства', '1994-05-15', 1),
(6, 'Ivan', 'Urgant', 'Стремится к знаниям', '1992-04-11', 3),
(7, 'Filip', 'Kirkorov', 'Несколько высших образований', '1981-01-23', 1),
(8, 'Nikolai', 'Baskov', 'Пунктуальный', '1987-06-19', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher_rank`
--

CREATE TABLE `teacher_rank` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `teacher_rank`
--

INSERT INTO `teacher_rank` (`id`, `name`) VALUES
(1, 'doctoral'),
(2, 'docent'),
(3, 'doctoral');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_fk0` (`teacher_id`),
  ADD KEY `courses_fk1` (`type_of_reporting_id`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student-course_fk0` (`student_id`),
  ADD KEY `student-course_fk1` (`course_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_fk0` (`rank_id`);

--
-- Индексы таблицы `teacher_rank`
--
ALTER TABLE `teacher_rank`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `teacher_rank`
--
ALTER TABLE `teacher_rank`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_fk0` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`);

--
-- Ограничения внешнего ключа таблицы `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student-course_fk0` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `student-course_fk1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Ограничения внешнего ключа таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_fk0` FOREIGN KEY (`rank_id`) REFERENCES `teacher_rank` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
