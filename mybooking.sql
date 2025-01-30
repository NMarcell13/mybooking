-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Jan 30. 10:37
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mybooking`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adminok`
--

CREATE TABLE `adminok` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(255) DEFAULT NULL,
  `jelszo` text DEFAULT NULL,
  `nev` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `adminok`
--

INSERT INTO `adminok` (`id`, `felhasznalonev`, `jelszo`, `nev`) VALUES
(1, 'tamas', '123456789', 'Algács Tamás András'),
(2, 'david', '123456789', 'Nagy Dávid'),
(3, 'marcell', '123456789', 'Nágel Marcell');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adok`
--

CREATE TABLE `adok` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(255) DEFAULT NULL,
  `jelszo` int(11) DEFAULT NULL,
  `vezeteknev` varchar(255) DEFAULT NULL,
  `keresztnev` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telszam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ugyfelek`
--

CREATE TABLE `ugyfelek` (
  `id` int(11) NOT NULL,
  `felhasznalonev` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `jelszo` text DEFAULT NULL,
  `vezeteknev` varchar(255) DEFAULT NULL,
  `keresztnev` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telszam` varchar(255) DEFAULT NULL,
  `szul_ido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `szul_hely` varchar(255) DEFAULT NULL,
  `nem` varchar(255) DEFAULT NULL,
  `lakcim` varchar(255) DEFAULT NULL,
  `tajszam` varchar(255) DEFAULT NULL,
  `a_neve` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `ugyfelek`
--

INSERT INTO `ugyfelek` (`id`, `felhasznalonev`, `jelszo`, `vezeteknev`, `keresztnev`, `email`, `telszam`, `szul_ido`, `szul_hely`, `nem`, `lakcim`, `tajszam`, `a_neve`) VALUES
(2, 'nmarcell', '$2y$10$4Eyaia9KZnQyN8tkg9YNZOb36x4iS6N03mJh9JLyYNn2lWlxMBIWC', 'Nágel', 'Marcell', 'marcika0913@gmail.com', '06301831754', '2005-09-12 22:00:00', 'Mátészalka', 'ferfi', 'Kántorjánosi', '936593272', 'Anyu'),
(3, 'david', '$2y$10$TDAQ5dEngfXGVfgWBijnmOUPxIC5ZLe7oFsRGNrKSQoX7myEdOLaa', 'Nagy', 'David', 'felalla@david.com', '06301537253783', '2005-01-17 23:00:00', 'Mátészalka', 'egyeb', 'Nagyecsed', '346262627', 'Nagyné'),
(10, 'pjanos', '$2y$10$pbKsyYQG.MqcFhKF/rDQEemNZmlxx4G1pqDKrn1JoAMtfFDW5f49q', 'Példa', 'János', 'peldajanos@gmail.com', '06301648635', '1996-10-04 22:00:00', 'Budapest', 'ferfi', 'Budapest XII.kerület', '6423624', 'Példané Erzsébet');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adminok`
--
ALTER TABLE `adminok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `adok`
--
ALTER TABLE `adok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `ugyfelek`
--
ALTER TABLE `ugyfelek`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhasznalonev` (`felhasznalonev`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `adminok`
--
ALTER TABLE `adminok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `ugyfelek`
--
ALTER TABLE `ugyfelek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
