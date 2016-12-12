-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2016 at 12:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE `knjiga` (
  `knjigaID` int(11) NOT NULL,
  `knjigaNaziv` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `knjigaIzdanje` int(11) NOT NULL,
  `knjigaTiraz` int(11) NOT NULL,
  `knjigaStanje` int(11) NOT NULL,
  `pisacID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`knjigaID`, `knjigaNaziv`, `knjigaIzdanje`, `knjigaTiraz`, `knjigaStanje`, `pisacID`) VALUES
(1, 'Ex Ponto', 12, 3000, 3, 5),
(2, 'Veštica iz Portobela', 7, 1500, 40, 1),
(4, 'Rat i mir', 13, 4000, 28, 8),
(5, 'Gordost i predrasuda', 16, 1000, 6, 3),
(6, 'Stranac', 7, 6000, 35, 4),
(7, 'Gospođica', 18, 1200, 40, 5),
(8, 'Sto godina samoće', 9, 1000, 29, 9),
(9, 'Tvrđava', 18, 3000, 32, 7),
(10, 'Keri', 19, 2500, 5, 2),
(11, 'Znakovi pored puta', 5, 1000, 10, 5),
(12, 'Zločin i kazna', 17, 2200, 24, 6),
(13, 'Braća Karamazovi', 9, 2000, 17, 6),
(14, 'Derviš i smrt', 13, 3550, 44, 7),
(16, 'Ana Karenjina', 20, 6000, 26, 8),
(17, 'Ljubav u doba kolere', 21, 3200, 11, 9),
(18, 'Idiot', 14, 4500, 7, 6),
(19, 'Preljuba', 8, 5000, 9, 1),
(20, 'Zapisi iz podzemlja', 5, 10000, 4, 6),
(21, 'Travnička hronika', 18, 2800, 8, 5),
(22, 'Mit o Sizifu', 10, 2000, 15, 4),
(23, 'Hronika najavljene smrti', 15, 1000, 20, 9),
(24, 'Tuđa zemlja', 11, 5500, 16, 7),
(25, 'Ostrvo', 6, 6000, 26, 7),
(26, 'Pad', 8, 4000, 8, 4),
(27, 'Prokleta avlija', 20, 5000, 32, 5),
(28, 'Na Drini ćuprija', 25, 5000, 44, 5),
(29, 'Put Alije Đerzeleza', 15, 2500, 36, 5),
(30, 'Most na Žepi', 11, 3000, 28, 5),
(31, 'Jelena žena koje nema', 9, 2000, 14, 5),
(32, 'Ujka Vanja', 17, 2000, 19, 11),
(33, 'Evgenije Onjegin', 20, 3500, 28, 10),
(34, 'Jedanaest minuta', 24, 1000, 11, 1),
(35, 'Razum i osećajnost', 20, 1500, 6, 3),
(36, 'To', 15, 5000, 20, 2),
(37, 'Ruslan i Ljudmila', 13, 5000, 5, 10),
(38, 'Brida', 15, 1100, 9, 1),
(39, 'Pod tuđim uticajem', 10, 1300, 10, 3),
(40, 'Uporište', 12, 2000, 6, 2),
(41, 'Dnevnik jednog čarobnjaka', 9, 1500, 14, 1),
(42, 'Dubrovski', 10, 1500, 16, 10),
(43, 'Božanstvena komedija', 24, 3000, 22, 12),
(44, 'Kapetanova kći', 14, 3000, 6, 10),
(45, 'Tri sestre', 10, 1200, 7, 11),
(46, 'Čistiliste', 10, 2500, 10, 12),
(47, 'Seobe', 16, 5000, 33, 13),
(48, 'Samac', 10, 1000, 12, 14),
(49, 'Eldorado', 11, 2000, 19, 14),
(50, 'Dnevnik o Čarnojeviću', 16, 2000, 21, 13),
(51, 'Ljubav u Toskani', 12, 1100, 13, 13),
(53, 'Lep dan za umiranje', 12, 1200, 23, 14),
(54, 'Hronika izgubljenog grada', 10, 1560, 13, 14),
(55, 'Zli dusi', 19, 1000, 2, 6),
(57, 'Priča brodolomnika', 14, 1700, 6, 9),
(58, 'Alhemičar', 25, 5000, 32, 1),
(59, '', 0, 0, 0, 0),
(60, '', 0, 0, 0, 0),
(61, 'Una', 5, 145, 12, 14);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnika` int(10) NOT NULL,
  `ime` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `status` varchar(25) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `ime`, `prezime`, `email`, `telefon`, `username`, `password`, `status`) VALUES
(1, 'Marija', 'Stamatović', 'marijastamatovic92@gmail.', '0644438509', 'ladyB992', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin'),
(34, 'Jelena', 'Spasic', 'jeca@gmail.com', '0612799940', 'jeca', '81dc9bdb52d04dc20036dbd8313ed055', 'Korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `pisac`
--

CREATE TABLE `pisac` (
  `pisacID` int(11) NOT NULL,
  `pisacIme` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pisacPrezime` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `pisacDrzava` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pisac`
--

INSERT INTO `pisac` (`pisacID`, `pisacIme`, `pisacPrezime`, `pisacDrzava`) VALUES
(1, 'Paulo', 'Koeljo', 'Brazil'),
(2, 'Stiven', 'King', 'SAD'),
(3, 'Džejn', 'Ostin', 'Velika Britanija'),
(4, 'Albert', 'Kami', 'Francuska'),
(5, 'Ivo', 'Andrić', 'Srbija'),
(6, 'Fjodor', 'Dostojevski', 'Rusija'),
(7, 'Meša', 'Selimović', 'Srbija'),
(8, 'Lav', 'Tolstoj', 'Rusija'),
(9, 'Gabrijel', 'Garsija Markes', 'Kolumbija'),
(10, 'Aleksandar', 'Puškin', 'Rusija'),
(11, 'Anton', 'Čehov', 'Rusija'),
(12, 'Dante', 'Aligijeri', 'Italija'),
(13, 'Miloš', 'Crnjanski', 'Srbija'),
(14, 'Momo', 'Kapor', 'Srbija');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `rezervacijaID` int(10) NOT NULL,
  `knjigaID` int(10) NOT NULL,
  `korisnik` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`rezervacijaID`, `knjigaID`, `korisnik`, `datum`) VALUES
(8, 5, 'jeca', '2016-09-11'),
(12, 1, 'jeca', '2016-09-11'),
(15, 2, 'jeca', '2016-09-11'),
(16, 4, 'jeca', '2016-09-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`knjigaID`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnika`);

--
-- Indexes for table `pisac`
--
ALTER TABLE `pisac`
  ADD PRIMARY KEY (`pisacID`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`rezervacijaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `knjiga`
--
ALTER TABLE `knjiga`
  MODIFY `knjigaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnika` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pisac`
--
ALTER TABLE `pisac`
  MODIFY `pisacID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `rezervacijaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
