-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Maj 2020, 11:46
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `powody`
--

CREATE TABLE `powody` (
  `idP` int(10) NOT NULL,
  `nazwaP` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `powody`
--

INSERT INTO `powody` (`idP`, `nazwaP`) VALUES
(1, 'Lekarz'),
(2, 'Sprawy Prywatne'),
(3, 'Urlop'),
(5, 'przyklad'),
(6, 'domek letniskowy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teams`
--

CREATE TABLE `teams` (
  `idTeam` int(11) NOT NULL,
  `Kierowca` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `idW` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `teams`
--

INSERT INTO `teams` (`idTeam`, `Kierowca`, `idW`) VALUES
(1, 'Maciej_G', 1),
(2, 'Łukasz_Ż', 1),
(45, 'Andrzej_B', 27),
(46, 'Maciej_G', 27),
(67, 'Łukasz_Ż', 38),
(68, 'Andrzej_B', 38),
(73, 'Monika_R', 41),
(74, 'Tomasz_Ł', 41),
(113, 'Monika_R', 61),
(114, 'Maciej_G', 61),
(119, 'Łukasz_Ż', 64),
(120, 'brak', 64),
(121, 'Adam_A', 65),
(122, 'Andrzej_B', 65),
(123, '', 66),
(124, '', 66),
(125, 'Andrzej_B', 67),
(126, 'Tomasz_Ł', 67),
(127, 'Łukasz_Ż', 68),
(128, 'Adam_A', 68),
(129, '', 69),
(130, '', 69),
(131, '', 70),
(132, '', 70),
(133, '', 71),
(134, '', 71);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trasa`
--

CREATE TABLE `trasa` (
  `idT` int(10) NOT NULL,
  `Trasa` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `trasa`
--

INSERT INTO `trasa` (`idT`, `Trasa`) VALUES
(1, 'Łobez-Szczecin'),
(2, 'Szczecin-Łobez'),
(3, 'Szczecin->Poznań'),
(4, 'Poznań->Szczecin'),
(5, 'Szczecin->Hamburg'),
(6, 'Hamburg-Szczecin'),
(8, 'Malbork-Prenzlau-Poznań'),
(9, 'Szczecin-Warszawa'),
(10, 'Warszawa-Szczecin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `updatetable`
--

CREATE TABLE `updatetable` (
  `idUT` int(10) NOT NULL,
  `dataUpdate` datetime NOT NULL,
  `idU` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `updatetable`
--

INSERT INTO `updatetable` (`idUT`, `dataUpdate`, `idU`) VALUES
(1, '2020-05-04 14:34:45', 6),
(6, '2020-05-25 15:11:11', 6),
(7, '2020-05-25 15:13:54', 6),
(8, '2020-05-25 15:13:54', 6),
(9, '2020-05-25 15:13:54', 6),
(10, '2020-05-25 15:13:54', 6),
(11, '2020-05-25 15:13:54', 6),
(12, '2020-05-25 15:13:54', 6),
(13, '2020-05-25 15:16:16', 6),
(14, '2020-05-25 15:18:14', 6),
(15, '2020-05-25 15:21:29', 6),
(16, '2020-05-25 15:38:30', 6),
(17, '2020-05-25 15:40:15', 6),
(18, '2020-05-25 15:43:43', 6),
(19, '2020-05-25 15:44:38', 6),
(20, '2020-05-26 12:06:45', 6),
(21, '2020-05-26 12:06:55', 6),
(22, '2020-05-28 08:28:52', 6),
(23, '2020-05-28 08:43:46', 6),
(24, '2020-05-28 08:45:17', 6),
(25, '2020-05-28 09:13:10', 6),
(26, '2020-05-28 09:13:18', 6),
(27, '2020-05-28 09:13:41', 6),
(28, '2020-05-28 09:13:51', 6),
(29, '2020-05-28 09:13:59', 6),
(30, '2020-05-28 09:14:12', 6),
(31, '2020-05-28 09:14:19', 6),
(32, '2020-05-28 09:14:50', 6),
(33, '2020-05-28 09:14:59', 6),
(34, '2020-05-28 09:15:09', 6),
(35, '2020-05-28 09:15:25', 6),
(36, '2020-05-28 09:15:37', 6),
(37, '2020-05-28 09:30:15', 6),
(38, '2020-05-28 09:30:25', 6),
(39, '2020-05-28 09:30:44', 6),
(40, '2020-05-28 09:30:54', 6),
(41, '2020-05-28 09:31:00', 6),
(42, '2020-05-28 09:31:14', 6),
(43, '2020-05-28 09:31:20', 6),
(44, '2020-05-28 09:31:30', 6),
(45, '2020-05-28 09:32:33', 6),
(46, '2020-05-28 09:34:03', 6),
(47, '2020-05-28 10:20:37', 6),
(48, '2020-05-28 10:26:51', 6),
(49, '2020-05-28 10:27:15', 6),
(50, '2020-05-28 10:34:50', 6),
(51, '2020-05-28 10:35:05', 6),
(52, '2020-05-28 10:37:29', 6),
(53, '2020-05-28 10:37:53', 6),
(54, '2020-05-28 10:45:09', 6),
(55, '2020-05-28 10:51:50', 6),
(56, '2020-05-28 10:52:11', 6),
(57, '2020-05-28 11:04:15', 6),
(58, '2020-05-28 11:04:58', 6),
(59, '2020-05-28 11:09:57', 6),
(60, '2020-05-28 11:10:22', 6),
(61, '2020-05-28 11:12:28', 6),
(62, '2020-05-28 11:27:38', 6),
(63, '2020-05-28 11:38:30', 6),
(64, '2020-05-28 11:40:09', 6),
(65, '2020-05-28 11:41:06', 6),
(66, '2020-05-28 11:42:37', 6),
(67, '2020-05-28 11:42:44', 6),
(68, '2020-05-28 11:43:28', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `idUP` int(2) NOT NULL,
  `nazwaUP` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uprawnienia`
--

INSERT INTO `uprawnienia` (`idUP`, `nazwaUP`) VALUES
(1, 'Administrator'),
(2, 'Kierowca'),
(3, 'Spedytor'),
(4, 'Zablokowany'),
(5, 'Usuniety');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `idU` int(2) NOT NULL,
  `UserName` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `ImieU` varchar(15) COLLATE utf8mb4_polish_ci NOT NULL,
  `NazwiskoU` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `AccountType` int(1) NOT NULL,
  `DataLogowania` datetime NOT NULL,
  `emailU` varchar(40) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`idU`, `UserName`, `Password`, `ImieU`, `NazwiskoU`, `AccountType`, `DataLogowania`, `emailU`) VALUES
(1, 'brak', '123', '', '', 4, '2020-02-05 00:00:00', ''),
(2, 'Monika_R', '202cb962ac59075b964b07152d234b70', '', '', 2, '2020-05-28 08:51:59', ''),
(3, 'Andrzej_B', '827ccb0eea8a706c4c34a16891f84e7b', '', '', 2, '2020-04-28 00:00:00', ''),
(4, 'Mirosław_W', '202cb962ac59075b964b07152d234b70', 'Mirosław', '', 4, '2020-02-03 00:00:00', ''),
(5, 'Tomasz_Ł', '202cb962ac59075b964b07152d234b70', 'Tomasz', '', 3, '2020-05-28 08:51:11', ''),
(6, 'Stefan_S', '202cb962ac59075b964b07152d234b70', 'Stefan', '', 1, '2020-05-28 11:42:46', ''),
(7, 'Maciej_G', '202cb962ac59075b964b07152d234b70', 'Maciek', 'Gudański', 2, '2020-05-28 09:03:28', 'gudan@wp.pl'),
(8, 'Łukasz_Ż', '202cb962ac59075b964b07152d234b70', 'łukasz', '', 4, '2020-03-01 00:00:00', 'a@a.pl'),
(14, 'Adam_A', '202cb962ac59075b964b07152d234b70', 'Adam', '', 2, '2020-05-12 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyjazdy`
--

CREATE TABLE `wyjazdy` (
  `idW` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Godzina` time NOT NULL,
  `Trasa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `wyjazdy`
--

INSERT INTO `wyjazdy` (`idW`, `Data`, `Godzina`, `Trasa`) VALUES
(1, '2020-04-14', '00:00:00', 6),
(27, '0000-00-00', '00:00:00', 5),
(38, '2021-05-11', '00:00:00', 2),
(41, '2019-05-12', '00:00:00', 3),
(61, '2020-05-29', '13:02:00', 10),
(64, '2020-05-05', '13:00:00', 4),
(65, '2020-05-29', '11:25:00', 4),
(66, '0000-00-00', '00:00:00', 0),
(67, '2020-05-30', '14:30:00', 10),
(68, '2020-05-29', '12:50:00', 8),
(69, '0000-00-00', '23:00:00', 0),
(70, '0000-00-00', '00:00:00', 0),
(71, '0000-00-00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `idZ` int(10) NOT NULL,
  `idU` int(2) NOT NULL,
  `idP` int(10) NOT NULL,
  `data` date NOT NULL,
  `Uwagi` text COLLATE utf8mb4_polish_ci NOT NULL,
  `widoczny` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zgloszenia`
--

INSERT INTO `zgloszenia` (`idZ`, `idU`, `idP`, `data`, `Uwagi`, `widoczny`) VALUES
(1, 3, 1, '2020-05-07', '12:30-15:30 potem wolny', 0),
(6, 2, 2, '2020-05-12', '1 dzien', 0),
(7, 2, 3, '2020-05-24', '14 dni', 0),
(9, 8, 1, '2020-05-06', 'rano', 0),
(12, 8, 3, '2020-05-27', 'no bo chce!', 0),
(13, 6, 2, '2020-05-12', 'fsgfdfg', 0),
(14, 8, 3, '2020-05-24', 'no ten yy', 0),
(15, 6, 3, '2020-05-14', 'mogie bom adin', 0),
(16, 6, 3, '2020-05-30', '', 0),
(17, 6, 2, '2020-05-20', '', 1),
(18, 8, 5, '2020-05-08', 'COS', 0),
(19, 6, 2, '2020-05-20', 'No ten tego i tamtego', 0),
(20, 6, 3, '2020-05-15', 'Idę się nawalić', 0),
(21, 7, 2, '2020-05-27', '                        \r\n\r\n', 1),
(22, 2, 1, '2020-05-27', '                        \r\n\r\n', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `powody`
--
ALTER TABLE `powody`
  ADD PRIMARY KEY (`idP`);

--
-- Indeksy dla tabeli `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`idTeam`),
  ADD KEY `idW` (`idW`),
  ADD KEY `Kierowca` (`Kierowca`) USING BTREE;

--
-- Indeksy dla tabeli `trasa`
--
ALTER TABLE `trasa`
  ADD PRIMARY KEY (`idT`);

--
-- Indeksy dla tabeli `updatetable`
--
ALTER TABLE `updatetable`
  ADD PRIMARY KEY (`idUT`),
  ADD KEY `idU` (`idU`) USING BTREE;

--
-- Indeksy dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  ADD PRIMARY KEY (`idUP`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idU`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD KEY `AccountType` (`AccountType`);

--
-- Indeksy dla tabeli `wyjazdy`
--
ALTER TABLE `wyjazdy`
  ADD PRIMARY KEY (`idW`),
  ADD KEY `Trasa` (`Trasa`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`idZ`),
  ADD KEY `idU` (`idU`) USING BTREE,
  ADD KEY `idP` (`idP`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `powody`
--
ALTER TABLE `powody`
  MODIFY `idP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `teams`
--
ALTER TABLE `teams`
  MODIFY `idTeam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT dla tabeli `trasa`
--
ALTER TABLE `trasa`
  MODIFY `idT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `updatetable`
--
ALTER TABLE `updatetable`
  MODIFY `idUT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  MODIFY `idUP` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `idU` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `wyjazdy`
--
ALTER TABLE `wyjazdy`
  MODIFY `idW` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `idZ` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
