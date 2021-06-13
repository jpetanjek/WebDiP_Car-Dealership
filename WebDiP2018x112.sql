-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2019 at 10:22 PM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 7.2.17-1+0~20190412070953.20+jessie~1.gbp23a36d

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDiP2018x112`
--

-- --------------------------------------------------------

--
-- Table structure for table `autokuca`
--

CREATE TABLE `autokuca` (
  `id_autokuca` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `informacije` text,
  `logo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autokuca`
--

INSERT INTO `autokuca` (`id_autokuca`, `naziv`, `informacije`, `logo`) VALUES
(1, 'Alfa Romeo', 'Alfa Romeo Automobiles S.p.A. je talijanski proizvođač automobila. Tvrtku je osnovao Francuz Alexandre Darracq pod nazivom A.L.F.A., 24. lipnja 1910. godine u Milanu, Italiji. Alfa Romeo je poznata po svojim športskim automobilima, te je uključena u automobilske utrke od 1911. godine.', '5a3aaaa172d919.37901496151379420947043490.png'),
(2, 'Aston Martin', 'Aston Martin Lagonda Limited je britanski proizvođač luksuznih športskih automobila i grand tourera. Aston Martin su 1913. godine osnovali Lionel Martin i Robert Bamford u Londonu, Ujedinjenom Kraljevstvu.', 'kisspng-aston-martin-car-ford-motor-company-ford-mustang-h-james-bond-5ad1cae5dc1861.2542857515236984059015.png'),
(3, 'Audi', 'Audi je njemački proizvođač automobila sa sjedištem u Ingolstadtu. Od 1964., Audi je marka unutar Volkswagen grupe. Automobili proizvođača Audi se proizvode u Ingolstadtu, Neckarsulmu, Győru, Bratislavi, Sao José dos Pinhais i u Changchunu.', 'kisspng-audi-rs-6-car-logo-audi-a4-audi-5acae0c45633b7.3686513315232452523531.png'),
(4, 'BMW', 'Bayerische Motoren Werke AG njemački je proizvođač automobila, motorkotača i bicikala sa sjedištem u Münchenu.', '4.png'),
(5, 'Fiat', 'Fiat je brand koji obuhvaća više industrijskih društava proizašlih iz dioničkog društva Fabbrica Italiana Automobili Torino, osnovanoga 11. srpnja 1899. godine u Torinu u Italiji. Fiat SpA je sada najjača talijanska privatna financijska i industrijska grupa.', 'kisspng-fiat-automobiles-fiat-dobl-logo-fiat-professiona-testy-ut-fiat-professional-autournl-5b7f9262283110.4807855215350872021646.png'),
(6, 'Mazda', 'Otkrijte izbor elegantnih i sportskih automobila marke Mazda, konfigurirajte svoj automobil snova marke Mazda.', 'kisspng-jaguar-cars-mazda-logo-mazda-5ad6dda2513d72.4137927415240308823328.png'),
(7, 'Nissan', 'Nissan Motor Company, Ltd., poznatiji kao Nissan je japanski multinacionalni proizvođač automobila. Nissan Motor Company prije je bio član Nissan grupacije, ali je postao samostalan nakon rekonstrukcije u vrijeme kada je predsjednik kompanije postao Carlos Ghosn. Izgovaranje imena Nissan je različito ovisno o tržištu.', 'kisspng-logo-nissan-car-brand-emblem-nissan-maxima-workshop-service-amp-repair-manual-5b63b1ee9a0da2.455268291533260270631.png'),
(8, 'Subaru', 'Pronađite avanturu u svakom trenutku Saznajte više Forester Stvoren za istraživanja. Predodređen za putovanja.', 'kisspng-subaru-xv-logo-subaru-brz-subaru-forester-win-een-week-subaru-forester-met-een-adria-caravan-5b6efec7dacc65.6161914915340008398962.png'),
(9, 'Suzuki', 'Suzuki je japanska multinacionalna tvrtka koja se bavi proizvodnjom vozila, vanbrodskih motora, invalidskih kolica i cijelog niza malih motora.', 'kisspng-suzuki-swift-car-motorcycle-honda-logo-5aed8aec862307.1563075015255170365494.png'),
(10, 'Toyota', 'Od gradskih automobila do SUV-ova, od hibrida do komercijalnih vozila, ovdje ćete naći Toyotu za sebe.', 'kisspng-toyota-land-cruiser-prado-car-toyota-camry-solara-toyota-logo-5b2c8d321d23b2.0523068315296463861194.png');

-- --------------------------------------------------------

--
-- Table structure for table `dnevnik_rada`
--

CREATE TABLE `dnevnik_rada` (
  `korisnik_id_korisnik` int(11) NOT NULL,
  `vrsta_aktivnosti_id_vrsta_aktivnosti` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dnevnik_rada`
--

INSERT INTO `dnevnik_rada` (`korisnik_id_korisnik`, `vrsta_aktivnosti_id_vrsta_aktivnosti`, `datum`, `opis`) VALUES
(1, 1, '2019-04-11 00:00:00', 'Registracija'),
(1, 2, '2019-04-11 00:00:00', 'Stvorena baza'),
(2, 1, '2019-04-11 00:00:00', 'Registracija'),
(2, 3, '2019-04-12 00:00:00', 'Klik na poveznicu Profil'),
(2, 3, '2019-04-12 00:00:01', 'Klik na poveznicu Profil'),
(3, 3, '2019-04-11 00:00:00', 'Klik na poveznicu Index'),
(4, 2, '2019-04-11 00:00:00', 'Klik na poveznicu Index'),
(4, 3, '2019-04-12 00:00:00', 'Klik na poveznicu Autokuće'),
(7, 1, '2019-04-11 00:00:00', 'Klik na poveznicu Index'),
(10, 3, '2019-04-12 00:00:01', 'Klik na poveznicu Lokacije');

-- --------------------------------------------------------

--
-- Table structure for table `kofiguracija`
--

CREATE TABLE `kofiguracija` (
  `ID` int(11) NOT NULL,
  `Sati_za_aktivaciju` int(11) NOT NULL,
  `Broj_prijava` int(11) NOT NULL,
  `Broj_elemenata` int(11) NOT NULL,
  `Minuta_sesije` int(11) NOT NULL,
  `Minuta_cookie` int(11) NOT NULL,
  `Pomak_vremena_minute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kofiguracija`
--

INSERT INTO `kofiguracija` (`ID`, `Sati_za_aktivaciju`, `Broj_prijava`, `Broj_elemenata`, `Minuta_sesije`, `Minuta_cookie`, `Pomak_vremena_minute`) VALUES
(1, 5, 11, 5, 111, 111, 11);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(11) NOT NULL,
  `uloga_id_uloga` int(11) NOT NULL,
  `autokuca_id_autokuca` int(11) DEFAULT NULL,
  `ime` varchar(45) DEFAULT NULL,
  `prezime` varchar(45) DEFAULT NULL,
  `korisnicko_ime` varchar(45) DEFAULT NULL,
  `lozinka` text,
  `lozinka_hash` text,
  `email` text,
  `datum_vrijeme_uvjet` datetime DEFAULT NULL,
  `prihvatio_uvjete` tinyint(1) DEFAULT NULL,
  `datum_registracije` datetime DEFAULT NULL,
  `aktiviran` tinyint(1) DEFAULT NULL,
  `blokiran` tinyint(1) DEFAULT '0',
  `broj_promasenih_prijava` int(11) DEFAULT '0',
  `aktivacijski_kod` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `uloga_id_uloga`, `autokuca_id_autokuca`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `lozinka_hash`, `email`, `datum_vrijeme_uvjet`, `prihvatio_uvjete`, `datum_registracije`, `aktiviran`, `blokiran`, `broj_promasenih_prijava`, `aktivacijski_kod`) VALUES
(1, 1, NULL, 'Josip', 'Petanjek', 'jpetanjek2', 'h2KJtZiWSm', 'c199a19daa5cd306a06b62479488bd5fe69ea325', 'jpetanjek2@foi.hr', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 3, ''),
(2, 2, 1, 'Miro', 'Petanjek', 'mpetanjek', 'RQtksrch74', '$2y$10$t2FON52Kv.CuNN9jHWEwvu0w1gjwK1tvf5S4DNpeu0Opat.RYBQwK', 'mpetanjek@foi.hr', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 3, ''),
(3, 2, 2, 'Gordan', 'Petanjek', 'gpetanjek', 'xEaw3TGvCp', '$2y$10$hCtU3Uj3a2P.7zFoIvWSjOPnopp2FCsbPZnY2GQ2F8oqt9.Vr73dO', 'gpetanjek@foi.hr', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 0, ''),
(4, 2, 3, 'Miro', 'Manestar', 'mmanestar', 'HnfEywl46p', '9ef7ec5bae1cab3f081cdcded2897c484d2d489a', 'mmanestar@foi.hr', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 2, ''),
(5, 2, 4, 'Gordan', 'Manestar', 'gmanestar', 'DbkAI0Nhyf', '599468132aaf556e156e72995ae038e532561188', 'gmanestark@foi.hr', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 2, ''),
(6, 2, 1, 'Ana', 'Petanjek', 'apetanjek', '1234', '$2y$10$n5Dy8Wy2B22PwoO8rXqLROVG6Ieuwo8boP/SkWwlG3516YBHMynvG', 'apetanjek@gmail.com', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 0, ''),
(7, 3, NULL, 'Goran', 'Pintar', 'gpintar', '1234', '$2y$10$n5Dy8Wy2B22PwoO8rXqLROVG6Ieuwo8boP/SkWwlG3516YBHMynvG', 'gpintar@gmail.com', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 0, ''),
(8, 3, NULL, 'Sabina', 'Pintar', 'spintar', '1234', '$2y$10$n5Dy8Wy2B22PwoO8rXqLROVG6Ieuwo8boP/SkWwlG3516YBHMynvG', 'spintar@gmail.com', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 3, ''),
(9, 3, NULL, 'Ana', 'Pintar', 'apintar', '1234', '$2y$10$n5Dy8Wy2B22PwoO8rXqLROVG6Ieuwo8boP/SkWwlG3516YBHMynvG', 'apintar@gmail.com', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 0, ''),
(10, 3, NULL, 'Tomislav', 'Pintar', 'tpintar', '1234', '$2y$10$n5Dy8Wy2B22PwoO8rXqLROVG6Ieuwo8boP/SkWwlG3516YBHMynvG', 'tpintar@gmail.com', '2019-04-11 00:00:00', 1, '2019-04-11 00:00:00', 1, 0, 0, ''),
(14, 1, NULL, 'test1', 'test2', 'test3', '1234', '$2y$10$n5Dy8Wy2B22PwoO8rXqLROVG6Ieuwo8boP/SkWwlG3516YBHMynvG', 'test6', '2019-04-11 00:00:00', 1, NULL, NULL, 0, NULL, 'test7'),
(16, 2, 4, 'Test', 'Testic', 'testonja', '1234', '$2y$10$n5Dy8Wy2B22PwoO8rXqLROVG6Ieuwo8boP/SkWwlG3516YBHMynvG', 'testici@foi.hr', '2019-05-24 22:40:10', 1, NULL, 1, 0, 0, 'oqng7FPOWB'),
(17, 3, NULL, 'Josip', 'Petanjek', 'jpetanjek', '6x0XWiQVkM', '2c3baaa630d2cf71e4798dd328877678c27ec90e', 'jpetanjek3@foi.hr', '2019-05-25 13:36:29', 1, '2019-05-25 15:48:12', 1, 0, 0, 'JZNG0DCs9F'),
(18, 4, NULL, 'Test', 'Test', 'test1234', '1234125r12ff12f12', '2a97953fea3485ab9e4d010cef0d6cb2d05e14f7', 'afwwf@ffac.com', '2019-06-01 17:54:39', 1, NULL, 1, 0, 1, 'OXGTDg9ePB'),
(19, 3, NULL, 'Josip', 'Petanjek', 'jpetanjek4', 'qOM0N62Jta', 'ab223ecd0d87b5a41b24c745d01ce9b2e7946f35', 'jpetanjek@foi.hr', '2019-06-04 17:23:35', 1, '2019-06-04 17:23:53', 1, 0, 0, '41o5uWdveV');

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

CREATE TABLE `lokacija` (
  `id_lokacija` int(11) NOT NULL,
  `autokuca_id_autokuca` int(11) NOT NULL,
  `lokacija_naziv` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `lokacija_slika` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`id_lokacija`, `autokuca_id_autokuca`, `lokacija_naziv`, `adresa`, `lokacija_slika`) VALUES
(1, 4, 'Zagreb BMW', 'Ul. Frana Folnegovića 12, 10000, Zagreb', '1.png'),
(2, 4, 'Varaždin BMW', 'J. Merlića 9, 42 000 Varaždin', 'test.jpg'),
(3, 4, 'Split BMW', 'Zagorski put 35, 21000, Split', 'test.jpg'),
(4, 3, 'Zagreb Audi', 'Ksavera Šandora Đalskog 31, 10000, Zagreb', 'Unos slike'),
(5, 3, 'Varaždin Audi', 'J. Merlića 5, 42 000 Varaždin', 'Unos slike'),
(6, 3, 'Split Audi', 'Zagorski put 33, 21000, Split', 'Unos slike'),
(7, 5, 'Zagreb Fiat', 'Vladislava Brajkovića 22, 10000, Zagreb', 'Unos slike'),
(8, 5, 'Varaždin Fiat', 'J. Merlića 33, 42 000 Varaždin', 'Unos slike'),
(9, 5, 'Split Fiat', 'Kijevska ul. 26, 21000, Split', 'Unos slike'),
(10, 10, 'Split Toyota', 'Mosećka ul. 47, 21000, Split', 'Unos slike');

-- --------------------------------------------------------

--
-- Table structure for table `radnje`
--

CREATE TABLE `radnje` (
  `id_radnje` int(11) NOT NULL,
  `opis` text NOT NULL,
  `cijena` int(11) DEFAULT NULL,
  `trajanje` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `radnje`
--

INSERT INTO `radnje` (`id_radnje`, `opis`, `cijena`, `trajanje`) VALUES
(1, 'Limarija', 400, '06:00:00'),
(2, 'Promjena guma', 200, '03:00:00'),
(3, 'Promjena ulja', 200, '01:00:00'),
(4, 'Provjera senzora', 100, '00:20:00'),
(5, 'Vanjsko čišćenje', 50, '00:20:00'),
(6, 'Unutarnje čišćenje', 100, '02:00:00'),
(7, 'Zamjena felgi', 50, '00:30:00'),
(8, 'Promjena kočnice', 600, '02:00:00'),
(9, 'Promjena motora', 10000, '12:00:00'),
(10, 'Promjena retrovizora', 150, '00:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `radnje_na_zahtjevu`
--

CREATE TABLE `radnje_na_zahtjevu` (
  `radnje_id_radnje` int(11) NOT NULL,
  `zahtjev_servis_id_zahtjev_servis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `radnje_na_zahtjevu`
--

INSERT INTO `radnje_na_zahtjevu` (`radnje_id_radnje`, `zahtjev_servis_id_zahtjev_servis`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(1, 46),
(1, 48),
(1, 50),
(1, 53),
(1, 71),
(1, 73),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 48),
(2, 50),
(3, 2),
(3, 3),
(3, 46),
(3, 71),
(4, 1),
(4, 2),
(4, 3),
(4, 71),
(5, 1),
(5, 45),
(5, 46),
(5, 50),
(6, 1),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(7, 45),
(7, 46),
(7, 50),
(8, 2),
(8, 3),
(8, 50),
(9, 50),
(10, 2),
(10, 3),
(10, 46);

-- --------------------------------------------------------

--
-- Table structure for table `termin`
--

CREATE TABLE `termin` (
  `id_termin` int(11) NOT NULL,
  `lokacija_id_lokacija` int(11) NOT NULL,
  `datum_pocetak` time NOT NULL,
  `datum_kraj` time NOT NULL,
  `termin_naziv` varchar(45) NOT NULL,
  `broj_mjesta` int(11) NOT NULL,
  `broj_slobodnih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `termin`
--

INSERT INTO `termin` (`id_termin`, `lokacija_id_lokacija`, `datum_pocetak`, `datum_kraj`, `termin_naziv`, `broj_mjesta`, `broj_slobodnih`) VALUES
(1, 1, '00:00:00', '08:00:00', 'Noćna smjena', 8, 12),
(2, 1, '08:00:00', '16:00:00', 'Jutarnja smjena', 24, 24),
(3, 1, '16:00:00', '00:00:00', 'Popodnevna smjena', 16, 15),
(5, 2, '00:00:00', '08:00:00', 'Noćna smjena', 8, 9),
(6, 3, '08:00:00', '16:00:00', 'Jutarnja smjena', 24, 24),
(7, 4, '16:00:00', '00:00:00', 'Popodnevna smjena', 16, 16),
(8, 5, '08:00:00', '16:00:00', 'Jutarnja smjena', 24, 24),
(9, 6, '16:00:00', '00:00:00', 'Popodnevna smjena', 16, 16),
(10, 7, '00:00:00', '08:00:00', 'Noćna smjena', 8, 10),
(11, 8, '08:00:00', '16:00:00', 'Jutarnja smjena', 24, 24),
(12, 9, '16:00:00', '00:00:00', 'Popodnevna smjena', 16, 16),
(15, 3, '02:02:00', '22:02:00', 'Probna', 22, 22),
(16, 3, '01:00:00', '03:00:00', 'Proba', 22, 22),
(17, 2, '02:02:00', '03:33:00', 'Proba3', 22, 22),
(18, 1, '00:03:00', '00:14:00', 'Testni termin', 22, 22);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `naziv`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Registrirani korisnik'),
(4, 'Neregistrirani korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_aktivnosti`
--

CREATE TABLE `vrsta_aktivnosti` (
  `id_vrsta_aktivnosti` int(11) NOT NULL,
  `naziv` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrsta_aktivnosti`
--

INSERT INTO `vrsta_aktivnosti` (`id_vrsta_aktivnosti`, `naziv`) VALUES
(1, 'Prijava ili registracija'),
(2, 'Rad s bazom'),
(3, 'Ostale radnje');

-- --------------------------------------------------------

--
-- Table structure for table `zahtjev_premjestanje`
--

CREATE TABLE `zahtjev_premjestanje` (
  `id_termin_novi` int(11) DEFAULT NULL,
  `id_lokacija_nova` int(11) DEFAULT NULL,
  `zahtjev_servis_id_zahtjev_servis` int(11) NOT NULL,
  `datum_novi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zahtjev_premjestanje`
--

INSERT INTO `zahtjev_premjestanje` (`id_termin_novi`, `id_lokacija_nova`, `zahtjev_servis_id_zahtjev_servis`, `datum_novi`) VALUES
(10, 7, 7, '0000-00-00'),
(7, 4, 11, '0000-00-00'),
(10, 7, 12, '0000-00-00'),
(10, 7, 13, '0000-00-00'),
(12, 9, 15, '0000-00-00'),
(11, 8, 16, '0000-00-00'),
(1, 1, 54, '2019-06-29'),
(1, 1, 70, '2019-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `zahtjev_servis`
--

CREATE TABLE `zahtjev_servis` (
  `id_zahtjev_servis` int(11) NOT NULL,
  `korisnik_id_korisnik` int(11) NOT NULL,
  `termin_lokacija_id_lokacija` int(11) NOT NULL,
  `termin_id_termin1` int(11) NOT NULL,
  `zahtjev_servis_opis` varchar(45) NOT NULL,
  `zahtjev_servis_naziv` varchar(45) NOT NULL,
  `zahtjev_servis_slika` varchar(45) DEFAULT NULL,
  `prihvacen` tinyint(1) DEFAULT NULL,
  `dosao` tinyint(1) DEFAULT NULL,
  `zavrsen` tinyint(1) DEFAULT '0',
  `premjesten` tinyint(1) DEFAULT '0',
  `zahtjev_servis_datum` datetime NOT NULL,
  `zahtjev_servis_datum_zatrazen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zahtjev_servis`
--

INSERT INTO `zahtjev_servis` (`id_zahtjev_servis`, `korisnik_id_korisnik`, `termin_lokacija_id_lokacija`, `termin_id_termin1`, `zahtjev_servis_opis`, `zahtjev_servis_naziv`, `zahtjev_servis_slika`, `prihvacen`, `dosao`, `zavrsen`, `premjesten`, `zahtjev_servis_datum`, `zahtjev_servis_datum_zatrazen`) VALUES
(1, 2, 1, 1, 'Iskrivljen klip motora', 'Audi A3', 'slika.jpg', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(2, 3, 1, 1, 'Potreban novi motor', 'Audi A4', 'slika.jpg', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(3, 3, 1, 2, 'Potrebna zamjena ogledala', 'BMW B1', 'slika.jpg', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(4, 4, 2, 5, 'Prazna guma', 'Audi A3', 'slika.jpg', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(5, 5, 2, 5, 'Iskrivljen branik', 'Audi A4', 'slika.jpg', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(6, 6, 2, 5, 'Potrebna zamjena ulja', 'BMW B1', 'slika.jpg', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(7, 3, 4, 7, 'Potreban novi motor', 'BMW B1', 'slika.jpg', 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00'),
(8, 4, 5, 8, 'Pukla guma', 'Audi A3', 'slika.jpg', 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00'),
(9, 10, 1, 1, 'Iskrivljen branik', 'Audi A4', 'slika.jpg', 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00'),
(10, 4, 7, 10, 'Potrebna zamjena ulja', 'BMW B1', 'slika.jpg', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(11, 8, 4, 7, 'Potreban nova osovina', 'BMW B1', 'slika.jpg', 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00'),
(12, 10, 5, 8, 'Uništena hauba', 'Audi A3', 'slika.jpg', 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00'),
(13, 9, 9, 12, 'Auto se ne može upaliti', 'Audi A4', 'slika.jpg', 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00'),
(14, 2, 7, 10, 'Ne radi grijanje', 'BMW B1', 'slika.jpg', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(15, 8, 9, 12, 'Pokvarena ploča s instrumentima', 'Audi A4', 'slika.jpg', 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00'),
(16, 5, 7, 10, 'Ne radi klima', 'BMW B1', 'slika.jpg', 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00'),
(45, 16, 1, 1, '3345', '1', '1', 1, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00'),
(46, 16, 1, 1, '222', '222', '222', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(48, 16, 1, 1, '1111', 'rrrr', '1', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(50, 16, 1, 2, '456', '123', '28580455_10216097930148942_2011715285_o.jpg', 1, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00'),
(53, 16, 1, 2, 'rr11r1r', '1111rr1r1', '28547728_10216097930508951_2094093480_o.jpg', 1, 1, 1, NULL, '0000-00-00 00:00:00', '0000-00-00'),
(54, 16, 1, 1, '12345', '456', '28504168_10216097930388948_1327658242_o.jpg', 1, 0, NULL, 1, '0000-00-00 00:00:00', '0000-00-00'),
(55, 16, 1, 1, '12345', '456', '28504168_10216097930388948_1327658242_o.jpg', 1, 0, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00'),
(70, 4, 1, 1, 'test', 'test', '28504070_10216097930668955_1295934011_o.jpg', 1, 0, 0, 0, '2019-06-02 14:30:56', '2019-06-02'),
(71, 5, 1, 1, 'test', 'test', 'test.jpg', 1, 1, 1, 0, '2019-06-04 16:57:36', '2019-06-07'),
(72, 19, 1, 1, 'Test', 'Test', 'test.jpg', NULL, NULL, 0, 0, '2019-06-04 17:44:41', '2019-06-05'),
(73, 5, 1, 3, 'Vjezba 18 00', 'Vjezba 18 00', 'test.jpg', 1, 1, 1, 0, '2019-06-04 17:59:39', '2019-06-05'),
(74, 5, 3, 15, 'test 1922', 'Test 1922', 'test.jpg', 0, NULL, 0, 0, '2019-06-04 19:22:21', '2019-06-05'),
(75, 5, 1, 1, '1937', 'Test 1937', 'test.jpg', 1, 0, 0, 1, '2019-06-04 19:37:47', '2019-06-07'),
(76, 5, 1, 18, 'test 1950', 'test 1950', 'test.jpg', 1, 0, 0, 1, '2019-06-04 19:50:34', '2019-06-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autokuca`
--
ALTER TABLE `autokuca`
  ADD PRIMARY KEY (`id_autokuca`);

--
-- Indexes for table `dnevnik_rada`
--
ALTER TABLE `dnevnik_rada`
  ADD PRIMARY KEY (`korisnik_id_korisnik`,`vrsta_aktivnosti_id_vrsta_aktivnosti`,`datum`),
  ADD KEY `fk_dnevnik_rada_korisnik1_idx` (`korisnik_id_korisnik`),
  ADD KEY `fk_dnevnik_rada_logiranje_vrsta_aktivnosti1_idx` (`vrsta_aktivnosti_id_vrsta_aktivnosti`);

--
-- Indexes for table `kofiguracija`
--
ALTER TABLE `kofiguracija`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD KEY `fk_korisnik_uloga_idx` (`uloga_id_uloga`),
  ADD KEY `fk_korisnik_autokuca1_idx` (`autokuca_id_autokuca`);

--
-- Indexes for table `lokacija`
--
ALTER TABLE `lokacija`
  ADD PRIMARY KEY (`id_lokacija`),
  ADD KEY `fk_lokacija_autokuca1_idx` (`autokuca_id_autokuca`);

--
-- Indexes for table `radnje`
--
ALTER TABLE `radnje`
  ADD PRIMARY KEY (`id_radnje`);

--
-- Indexes for table `radnje_na_zahtjevu`
--
ALTER TABLE `radnje_na_zahtjevu`
  ADD PRIMARY KEY (`radnje_id_radnje`,`zahtjev_servis_id_zahtjev_servis`),
  ADD KEY `fk_radnje_has_zahtjev_servis_radnje1_idx` (`radnje_id_radnje`),
  ADD KEY `fk_radnje_na_zahtjevu_zahtjev_servis1_idx` (`zahtjev_servis_id_zahtjev_servis`);

--
-- Indexes for table `termin`
--
ALTER TABLE `termin`
  ADD PRIMARY KEY (`id_termin`,`lokacija_id_lokacija`),
  ADD KEY `fk_termin_lokacija1_idx` (`lokacija_id_lokacija`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- Indexes for table `vrsta_aktivnosti`
--
ALTER TABLE `vrsta_aktivnosti`
  ADD PRIMARY KEY (`id_vrsta_aktivnosti`);

--
-- Indexes for table `zahtjev_premjestanje`
--
ALTER TABLE `zahtjev_premjestanje`
  ADD PRIMARY KEY (`zahtjev_servis_id_zahtjev_servis`),
  ADD KEY `fk_zahtjev_premjestanje_termin1_idx` (`id_termin_novi`),
  ADD KEY `fk_zahtjev_premjestanje_lokacija1_idx` (`id_lokacija_nova`);

--
-- Indexes for table `zahtjev_servis`
--
ALTER TABLE `zahtjev_servis`
  ADD PRIMARY KEY (`id_zahtjev_servis`),
  ADD KEY `fk_zahtjev_za_servis_korisnik1_idx` (`korisnik_id_korisnik`),
  ADD KEY `fk_zahtjev_servis_termin1_idx` (`termin_id_termin1`,`termin_lokacija_id_lokacija`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autokuca`
--
ALTER TABLE `autokuca`
  MODIFY `id_autokuca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kofiguracija`
--
ALTER TABLE `kofiguracija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `lokacija`
--
ALTER TABLE `lokacija`
  MODIFY `id_lokacija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `radnje`
--
ALTER TABLE `radnje`
  MODIFY `id_radnje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `termin`
--
ALTER TABLE `termin`
  MODIFY `id_termin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vrsta_aktivnosti`
--
ALTER TABLE `vrsta_aktivnosti`
  MODIFY `id_vrsta_aktivnosti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `zahtjev_servis`
--
ALTER TABLE `zahtjev_servis`
  MODIFY `id_zahtjev_servis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dnevnik_rada`
--
ALTER TABLE `dnevnik_rada`
  ADD CONSTRAINT `fk_dnevnik_rada_korisnik1` FOREIGN KEY (`korisnik_id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dnevnik_rada_logiranje_vrsta_aktivnosti1` FOREIGN KEY (`vrsta_aktivnosti_id_vrsta_aktivnosti`) REFERENCES `vrsta_aktivnosti` (`id_vrsta_aktivnosti`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_autokuca1` FOREIGN KEY (`autokuca_id_autokuca`) REFERENCES `autokuca` (`id_autokuca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnik_uloga` FOREIGN KEY (`uloga_id_uloga`) REFERENCES `uloga` (`id_uloga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lokacija`
--
ALTER TABLE `lokacija`
  ADD CONSTRAINT `fk_lokacija_autokuca1` FOREIGN KEY (`autokuca_id_autokuca`) REFERENCES `autokuca` (`id_autokuca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `radnje_na_zahtjevu`
--
ALTER TABLE `radnje_na_zahtjevu`
  ADD CONSTRAINT `fk_radnje_has_zahtjev_servis_radnje1` FOREIGN KEY (`radnje_id_radnje`) REFERENCES `radnje` (`id_radnje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_radnje_na_zahtjevu_zahtjev_servis1` FOREIGN KEY (`zahtjev_servis_id_zahtjev_servis`) REFERENCES `zahtjev_servis` (`id_zahtjev_servis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `termin`
--
ALTER TABLE `termin`
  ADD CONSTRAINT `fk_termin_lokacija1` FOREIGN KEY (`lokacija_id_lokacija`) REFERENCES `lokacija` (`id_lokacija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zahtjev_premjestanje`
--
ALTER TABLE `zahtjev_premjestanje`
  ADD CONSTRAINT `fk_zahtjev_premjestanje_lokacija1` FOREIGN KEY (`id_lokacija_nova`) REFERENCES `lokacija` (`id_lokacija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zahtjev_premjestanje_termin1` FOREIGN KEY (`id_termin_novi`) REFERENCES `termin` (`id_termin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zahtjev_premjestanje_zahtjev_servis1` FOREIGN KEY (`zahtjev_servis_id_zahtjev_servis`) REFERENCES `zahtjev_servis` (`id_zahtjev_servis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zahtjev_servis`
--
ALTER TABLE `zahtjev_servis`
  ADD CONSTRAINT `fk_zahtjev_servis_termin1` FOREIGN KEY (`termin_id_termin1`,`termin_lokacija_id_lokacija`) REFERENCES `termin` (`id_termin`, `lokacija_id_lokacija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zahtjev_za_servis_korisnik1` FOREIGN KEY (`korisnik_id_korisnik`) REFERENCES `korisnik` (`id_korisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
