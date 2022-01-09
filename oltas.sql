-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Jan 09. 13:54
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `oltas`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foglalas`
--

CREATE TABLE `foglalas` (
  `id` int(11) NOT NULL,
  `paciensid` int(11) DEFAULT NULL,
  `oltasid` int(11) DEFAULT NULL,
  `idopontid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `foglalas`
--

INSERT INTO `foglalas` (`id`, `paciensid`, `oltasid`, `idopontid`) VALUES
(4, 4, 3, 3),
(5, 5, 2, 1),
(93, 3, 3, 4),
(95, 39, 4, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `idopontok`
--

CREATE TABLE `idopontok` (
  `id` int(11) NOT NULL,
  `idopont` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `idopontok`
--

INSERT INTO `idopontok` (`id`, `idopont`) VALUES
(1, '2022-01-05 08:00:00'),
(2, '2022-01-05 08:30:00'),
(3, '2022-01-05 09:00:00'),
(4, '2022-01-05 09:30:00'),
(5, '2022-01-05 10:00:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oltasok`
--

CREATE TABLE `oltasok` (
  `id` int(11) NOT NULL,
  `oltas_neve` varchar(255) DEFAULT NULL,
  `keszleten_darab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `oltasok`
--

INSERT INTO `oltasok` (`id`, `oltas_neve`, `keszleten_darab`) VALUES
(1, 'Pfizer', 2100),
(2, 'Janssen', 1004),
(3, 'AstraZeneca', 997),
(4, 'Moderna', 994),
(5, 'Sinopharm', 2501),
(6, 'Szputnyik', 1200);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `paciens`
--

CREATE TABLE `paciens` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) DEFAULT NULL,
  `lakcim` varchar(255) DEFAULT NULL,
  `telefonszam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tajszam` varchar(255) DEFAULT NULL,
  `jelszo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `paciens`
--

INSERT INTO `paciens` (`id`, `nev`, `lakcim`, `telefonszam`, `email`, `tajszam`, `jelszo`) VALUES
(3, 'Kovács Albert', '2100 Gödöllő Kiss József utca 8.', '06-70-2346789', 'kova@gmail.com', '045-324-448', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(4, 'Mészáros Gizella', '2115 Kartal Fő utca 23.', '06-20-4677896', 'meszgi@gmail.com', '048-554-331', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(5, 'Vécsei Béla', '1225 Budapest  Vasút utca 11.', '06-30-222-456', 'vecseib@gmail.com', '089-287-345', 'b920b68e218aed8c6cac6ba183816fd660079c2e2ec881a274efed5e771ace54e976c85c9ad5e771e3aa2c593c75b5dd5c607a92b5d36ce4fb64a7c42a2ea4bc'),
(39, 'Kiss Gábor', '1225 Budapest  Vasút utca 11.', '06-70-2346789', 'kissg@gmail.com', '012-123-435', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `foglalas`
--
ALTER TABLE `foglalas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oltasid` (`oltasid`),
  ADD KEY `paciensid` (`paciensid`),
  ADD KEY `idopontid` (`idopontid`);

--
-- A tábla indexei `idopontok`
--
ALTER TABLE `idopontok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `oltasok`
--
ALTER TABLE `oltasok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `paciens`
--
ALTER TABLE `paciens`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `foglalas`
--
ALTER TABLE `foglalas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT a táblához `idopontok`
--
ALTER TABLE `idopontok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `oltasok`
--
ALTER TABLE `oltasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `paciens`
--
ALTER TABLE `paciens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `foglalas`
--
ALTER TABLE `foglalas`
  ADD CONSTRAINT `foglalas_ibfk_1` FOREIGN KEY (`oltasid`) REFERENCES `oltasok` (`id`),
  ADD CONSTRAINT `foglalas_ibfk_2` FOREIGN KEY (`paciensid`) REFERENCES `paciens` (`id`),
  ADD CONSTRAINT `foglalas_ibfk_3` FOREIGN KEY (`idopontid`) REFERENCES `idopontok` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
