-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Jan 27. 23:17
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

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
  `jelszo` int(11) DEFAULT NULL,
  `nev` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `adminok`
--

INSERT INTO `adminok` (`id`, `felhasznalonev`, `jelszo`, `nev`) VALUES
(1, 'tamas', 123456789, 'Algács Tamás András'),
(2, 'david', 123456789, 'Nagy Dávid'),
(3, 'marcell', 123456789, 'Nágel Marcell');

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
  `felhasznalonev` varchar(255) DEFAULT NULL,
  `jelszo` int(11) DEFAULT NULL,
  `vezeteknev` varchar(255) DEFAULT NULL,
  `keresztnev` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telszam` int(11) DEFAULT NULL,
  `szul_ido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `szul_hely` varchar(255) DEFAULT NULL,
  `nem` varchar(255) DEFAULT NULL,
  `lakcim` varchar(255) DEFAULT NULL,
  `tajszam` int(11) DEFAULT NULL,
  `a_neve` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

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
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
