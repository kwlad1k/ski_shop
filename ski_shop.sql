-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 15 2022 г., 09:43
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ski_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about_brend`
--

CREATE TABLE `about_brend` (
  `id` int(255) NOT NULL,
  `about` text NOT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `about_brend`
--

INSERT INTO `about_brend` (`id`, `about`, `history`) VALUES
(1, 'Fischer - австрийский бренд, специализирующийся на производстве высокотехнологичного спортивного инвентаря – горных и беговых лыж, ботинок, креплений, палок, чехлов, рюкзаков и аксессуаров.', 'История компании началась в далёком 1924-м году. Во времена, когда женщины спортсменки носили элегантные юбки, не закрывающие щиколотки, а мужчины кроме спортивных курток надевали галстуки. Изобретательность и дух первопроходца заставили основателя компании Йозефа Фишера старшего (Josef Fischer Senior) запустить свой собственный бизнес. Он обосновался в городе Риде, Австрия. Первые два года под брендом «Fischer» выпускались сани и ручные тележки. На следующий год к перечню выпускаемой продукции добавляются лыжи. К 1934-му году компания значительно расширяет своё лыжное производство. На пути к становлению лыжной фабрики горные лыжи Fischer начинают производиться в несколько этапов. Штат сотрудников на тот момент составлял 30 человек. Продажи растут. В одних только Соединённых Штатах было продано 2000 пар лыж Fischer ручной работы.');

-- --------------------------------------------------------

--
-- Структура таблицы `shops`
--

CREATE TABLE `shops` (
  `id` int(255) NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `shops`
--

INSERT INTO `shops` (`id`, `address`, `tel`) VALUES
(1, 'Россия, Спб, пр. Невский 1', '+7-812-955-6756'),
(2, 'Россия, Москва, Красная пл. 1', '+7-095-567-12-23');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about_brend`
--
ALTER TABLE `about_brend`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about_brend`
--
ALTER TABLE `about_brend`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
