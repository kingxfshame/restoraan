-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 21 2019 г., 12:35
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `restoraan`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kokkad`
--

CREATE TABLE `kokkad` (
  `id` int(11) NOT NULL,
  `pilt` text NOT NULL,
  `nimi` text NOT NULL,
  `kes_on` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `kokkad`
--

INSERT INTO `kokkad` (`id`, `pilt`, `nimi`, `kes_on`) VALUES
(1, 'chef-4.jpg', 'John Smooth', 'Kokk'),
(2, 'chef-2.jpg', 'Rebeca Welson', 'PeaKokk'),
(3, 'chef-3.jpg', 'Kharl Branyt', 'Kokk'),
(4, 'chef-1.jpg', 'Luke Simon', 'Kokk');

-- --------------------------------------------------------

--
-- Структура таблицы `menuu`
--

CREATE TABLE `menuu` (
  `id` int(11) NOT NULL,
  `nimi` text NOT NULL,
  `maksab` int(11) NOT NULL,
  `sisaldus` text NOT NULL,
  `kategooria` text NOT NULL,
  `pilt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `menuu`
--

INSERT INTO `menuu` (`id`, `nimi`, `maksab`, `sisaldus`, `kategooria`, `pilt`) VALUES
(1, 'Krõbe lillkapsas parmesani ja dipiga', 15, 'Lillkapsas, Parmesan, Riivsai, Sool', 'Eelroad', 'lillkapsas.jpg'),
(2, 'Krõbedad quesadillad suitsusingiga', 13, 'Tortilla, Juust, Ananass, Lehtsalat', 'Eelroad', 'quesadillad.jpg'),
(3, 'Soolane jõulukringel juustudipiga', 18, 'Juust, Rosmariin, Pohlad, Või', 'Eelroad', 'joulukringel.jpg'),
(4, 'Vürtsikad kanatiivad ja jõululik dipikaste', 11, 'Pohlad, Pohlamoos, Pipar, Hapukoor', 'Eelroad', 'dipikaste.jpg'),
(5, 'Värske pasta rukolapestoga', 15, 'Rukolat, Parmesan, Oliiviõli, Sool', 'Pearoad', 'pasta.jpg'),
(6, 'Mõnusalt kleepuvad seened vürtsikas kastmes', 11, 'Paprika, Seened, Porrut, Tšillikaste', 'Pearoad', 'seened.jpg'),
(7, 'Pannkoogitäidis suitsulõhega', 9, 'Jogurt, Lõhe, Toorjuust, Murulauk', 'Pearoad', 'pankook.jpg'),
(8, 'Läätse-kinoakotletid mõnusa salatiga', 8, 'Kinoad, Karrit, Paprikapulbrik, Kookosõli', 'Pearoad', 'kinoakotletid.jpg'),
(9, 'Veriapelsini-šokolaadi toorkook', 10, 'Päevalilleseemned,  Datled,  Mustad ploomid,  India pähklid', 'Magustoit', 'toorkook.jpg'),
(10, 'Proteiinimuffinid vaarikatega', 6, 'Õunakaste,  Vaarikad,  Kookosõli,  Pekaanipähklid', 'Magustoit', 'proteiinimuffin.jpg'),
(11, 'Suvised maasikakoogikesed (toorvegan)', 11, 'Mandlid,  Mustad ploomid,  India pähklid,  Maasikad', 'Magustoit', 'maasikakook.jpg'),
(12, 'Rabarberi-pistaatsiatort', 12, 'Pistaatsiapähklid,  Pistaatsiakreem,  Rabarber,  Või', 'Magustoit', 'rabarber.jpg'),
(13, 'Eesti Meri', 10, 'Likööri, Õlu, Vaarikad, Greibimahla', 'Joogid', 'jook1.jpg'),
(14, 'Crafted Basil', 9, 'Gin, Rabarberisiirupit, Laimisektorit, Basiilikulehte ', 'Joogid', 'jook2.jpg'),
(15, 'Bluest Berry Dream', 9, 'Mustikalikööri, Gin, Sidrunimahla, Suhkrusiirupit', 'Joogid', 'jook3.jpg'),
(16, 'Negroni Fiore', 14, 'Gin, Martini, Jää, Apelsinikoor', 'Joogid', 'jook4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `reserveerimine`
--

CREATE TABLE `reserveerimine` (
  `id` int(11) NOT NULL,
  `nimi` varchar(50) CHARACTER SET utf8 NOT NULL,
  `epost` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `kuupaev` varchar(50) NOT NULL,
  `aeg` varchar(50) NOT NULL,
  `inimesed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `reserveerimine`
--

INSERT INTO `reserveerimine` (`id`, `nimi`, `epost`, `telefon`, `kuupaev`, `aeg`, `inimesed`) VALUES
(17, 'Artur', 'artur.kexpa£gmail.com', '+37556265', '5/22/2019', '9:30', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `reserveerimine_aeg`
--

CREATE TABLE `reserveerimine_aeg` (
  `id` int(11) NOT NULL,
  `aeg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `reserveerimine_aeg`
--

INSERT INTO `reserveerimine_aeg` (`id`, `aeg`) VALUES
(1, '9:30'),
(2, '10:00'),
(3, '10:30'),
(4, '11:00'),
(5, '11:30'),
(6, '12:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kokkad`
--
ALTER TABLE `kokkad`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menuu`
--
ALTER TABLE `menuu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reserveerimine`
--
ALTER TABLE `reserveerimine`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reserveerimine_aeg`
--
ALTER TABLE `reserveerimine_aeg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kokkad`
--
ALTER TABLE `kokkad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `menuu`
--
ALTER TABLE `menuu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `reserveerimine`
--
ALTER TABLE `reserveerimine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `reserveerimine_aeg`
--
ALTER TABLE `reserveerimine_aeg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
