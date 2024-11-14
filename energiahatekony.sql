-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Nov 14. 11:53
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
-- Adatbázis: `energiahatekony`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `energiafogyasztas`
--

CREATE TABLE `energiafogyasztas` (
  `fogyasztas_id` int(11) NOT NULL,
  `orszag_id` int(11) DEFAULT NULL,
  `ev` int(11) DEFAULT NULL,
  `fogyasztas_mwh` decimal(10,2) DEFAULT NULL,
  `nepesseg` int(11) DEFAULT NULL,
  `egy_fore_juto_fogyasztas` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `energiafogyasztas`
--

INSERT INTO `energiafogyasztas` (`fogyasztas_id`, `orszag_id`, `ev`, `fogyasztas_mwh`, `nepesseg`, `egy_fore_juto_fogyasztas`) VALUES
(1, 1, 2022, 9500000.00, 10000000, 950.00),
(2, 2, 2022, 50000000.00, 83000000, 600.00),
(3, 3, 2022, 1500000.00, 1300000000, 1.15),
(4, 4, 2022, 60000000.00, 1400000000, 42.86),
(5, 5, 2022, 1200000.00, 59000000, 20.34);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `energiaforrasok`
--

CREATE TABLE `energiaforrasok` (
  `energiaforras_id` int(11) NOT NULL,
  `tipus` varchar(255) NOT NULL,
  `leiras` text DEFAULT NULL,
  `kornyezeti_hatas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `energiaforrasok`
--

INSERT INTO `energiaforrasok` (`energiaforras_id`, `tipus`, `leiras`, `kornyezeti_hatas`) VALUES
(1, 'Szélenergia', 'A szélenergiát a szél mozgásának kinetikus energiája segítségével alakítjuk át elektromos energiává.', 'Alacsony környezeti hatás, de területigényes.'),
(2, 'Napenergia', 'A napenergia a nap sugárzásából nyert energia, amelyet napkollektorok vagy napelemek segítségével alakítanak át.', 'Nagy területet igényel, de nem károsítja a környezetet.'),
(3, 'Vízerőmű', 'A víz mozgási energiáját alakítja át elektromos energiává.', 'Magas környezeti hatás, mivel vízfolyások áramlását befolyásolja.'),
(4, 'Geotermikus energia', 'A föld mélyéből származó hőenergia, amelyet fúrásokkal hoznak felszínre.', 'Környezetkímélő, de területi korlátokkal rendelkezik.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `energiahatekonysag`
--

CREATE TABLE `energiahatekonysag` (
  `hatekonysag_id` int(11) NOT NULL,
  `orszag_id` int(11) DEFAULT NULL,
  `ev` int(11) DEFAULT NULL,
  `hatekonysag_eredmeny` decimal(5,2) DEFAULT NULL,
  `energia_megtakaritas_mwh` decimal(10,2) DEFAULT NULL,
  `emiszios_csokkenes_kgco2` decimal(10,2) DEFAULT NULL,
  `beruhazas_kolteseg` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `energiahatekonysag`
--

INSERT INTO `energiahatekonysag` (`hatekonysag_id`, `orszag_id`, `ev`, `hatekonysag_eredmeny`, `energia_megtakaritas_mwh`, `emiszios_csokkenes_kgco2`, `beruhazas_kolteseg`) VALUES
(1, 1, 2022, 8.50, 800000.00, 350000.00, 50000000.00),
(2, 2, 2022, 9.20, 4000000.00, 1800000.00, 300000000.00),
(3, 3, 2022, 7.00, 100000.00, 50000.00, 20000000.00),
(4, 4, 2022, 9.50, 5000000.00, 2200000.00, 600000000.00),
(5, 5, 2022, 8.00, 250000.00, 100000.00, 10000000.00);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megujuloenergia`
--

CREATE TABLE `megujuloenergia` (
  `energia_id` int(11) NOT NULL,
  `orszag_id` int(11) DEFAULT NULL,
  `ev` int(11) DEFAULT NULL,
  `megujulo_fogyasztas_mwh` decimal(10,2) DEFAULT NULL,
  `energiaforras_id` int(11) DEFAULT NULL,
  `arany` decimal(5,2) DEFAULT NULL,
  `forraskategoria` varchar(255) DEFAULT NULL,
  `epites_koltseg` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `megujuloenergia`
--

INSERT INTO `megujuloenergia` (`energia_id`, `orszag_id`, `ev`, `megujulo_fogyasztas_mwh`, `energiaforras_id`, `arany`, `forraskategoria`, `epites_koltseg`) VALUES
(1, 1, 2022, 2000000.00, 2, 21.05, 'Napenergia', 1500000000.00),
(2, 2, 2022, 15000000.00, 1, 30.00, 'Szélenergia', 1200000000.00),
(3, 3, 2022, 300000.00, 4, 0.10, 'Geotermikus energia', 80000000.00),
(4, 4, 2022, 20000000.00, 3, 33.33, 'Vízerőmű', 4000000000.00),
(5, 5, 2022, 1000000.00, 2, 10.00, 'Napenergia', 50000000.00);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orszagok`
--

CREATE TABLE `orszagok` (
  `orszag_id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `gdp` decimal(15,2) DEFAULT NULL,
  `terulet_km2` decimal(10,2) DEFAULT NULL,
  `fejlettsegi_szint` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `orszagok`
--

INSERT INTO `orszagok` (`orszag_id`, `nev`, `gdp`, `terulet_km2`, `fejlettsegi_szint`) VALUES
(1, 'Magyarország', 155.43, 93030.00, 'Fejlett'),
(2, 'Németország', 4200.00, 357022.00, 'Fejlett'),
(3, 'Indiai', 2710.00, 3287263.00, 'Fejlődő'),
(4, 'Kína', 13320.00, 9596961.00, 'Fejlett'),
(5, 'Dél-Afrika', 400.00, 1219090.00, 'Fejlődő');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `energiafogyasztas`
--
ALTER TABLE `energiafogyasztas`
  ADD PRIMARY KEY (`fogyasztas_id`),
  ADD KEY `orszag_id` (`orszag_id`);

--
-- A tábla indexei `energiaforrasok`
--
ALTER TABLE `energiaforrasok`
  ADD PRIMARY KEY (`energiaforras_id`);

--
-- A tábla indexei `energiahatekonysag`
--
ALTER TABLE `energiahatekonysag`
  ADD PRIMARY KEY (`hatekonysag_id`),
  ADD KEY `orszag_id` (`orszag_id`);

--
-- A tábla indexei `megujuloenergia`
--
ALTER TABLE `megujuloenergia`
  ADD PRIMARY KEY (`energia_id`),
  ADD KEY `orszag_id` (`orszag_id`),
  ADD KEY `energiaforras_id` (`energiaforras_id`);

--
-- A tábla indexei `orszagok`
--
ALTER TABLE `orszagok`
  ADD PRIMARY KEY (`orszag_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `energiafogyasztas`
--
ALTER TABLE `energiafogyasztas`
  MODIFY `fogyasztas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `energiaforrasok`
--
ALTER TABLE `energiaforrasok`
  MODIFY `energiaforras_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `energiahatekonysag`
--
ALTER TABLE `energiahatekonysag`
  MODIFY `hatekonysag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `megujuloenergia`
--
ALTER TABLE `megujuloenergia`
  MODIFY `energia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `orszagok`
--
ALTER TABLE `orszagok`
  MODIFY `orszag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `energiafogyasztas`
--
ALTER TABLE `energiafogyasztas`
  ADD CONSTRAINT `energiafogyasztas_ibfk_1` FOREIGN KEY (`orszag_id`) REFERENCES `orszagok` (`orszag_id`);

--
-- Megkötések a táblához `energiahatekonysag`
--
ALTER TABLE `energiahatekonysag`
  ADD CONSTRAINT `energiahatekonysag_ibfk_1` FOREIGN KEY (`orszag_id`) REFERENCES `orszagok` (`orszag_id`);

--
-- Megkötések a táblához `megujuloenergia`
--
ALTER TABLE `megujuloenergia`
  ADD CONSTRAINT `megujuloenergia_ibfk_1` FOREIGN KEY (`orszag_id`) REFERENCES `orszagok` (`orszag_id`),
  ADD CONSTRAINT `megujuloenergia_ibfk_2` FOREIGN KEY (`energiaforras_id`) REFERENCES `energiaforrasok` (`energiaforras_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
