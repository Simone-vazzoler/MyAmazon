-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 23, 2022 alle 22:47
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazondb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `Codice` int(1) NOT NULL,
  `Quantita` int(11) NOT NULL,
  `Autore` varchar(32) NOT NULL,
  `Prezzo` decimal(10,0) NOT NULL,
  `Titolo` varchar(64) NOT NULL,
  `Immagine` varchar(32) NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `Descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`Codice`, `Quantita`, `Autore`, `Prezzo`, `Titolo`, `Immagine`, `ID_Categoria`, `Descrizione`) VALUES
(1, 2, 'Intel', '335', 'Intel Core i7-11700K processore ', 'intel_core_i7.jpg', 1, ''),
(2, 2, 'Corsair', '188', 'Corsair Crystal 570X Case da Gaming', 'corsair_crystal.jpg', 1, ''),
(3, 2, 'Apple', '1199', 'MacBook Pro 13\" Display, i5', 'product-1.jpg', 7, 'ufhsufhuf'),
(4, 1, 'Bose', '79', 'Bose - SoundLink Bluetooth Speaker', 'product-2.jpg', 7, ''),
(5, 2, 'Apple', '899', 'Apple - 11 Inch iPad Pro  with Wi-Fi 256GB', 'product-3.jpg', 7, ''),
(7, 2, 'Samsung', '899', 'Samsung - 55\" Class  LED 2160p Smart', 'product-5.jpg', 7, ''),
(8, 2, 'Beats', '280', 'Beats by Dr. Dre Wireless  Headphones', 'product-10.jpg', 8, ''),
(9, 1, 'Google', '188', 'Google - Pixel 3 XL  128GB', 'product-4.jpg', 7, 'blabla'),
(10, 1, 'Gucci', '50', 'T-Shirt Gucci', 'gucci.jpg', 2, 'hfdffhwefhwe');

-- --------------------------------------------------------

--
-- Struttura della tabella `carrelli`
--

CREATE TABLE `carrelli` (
  `ID` int(11) NOT NULL,
  `ID_utente` int(11) DEFAULT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `carrelli`
--

INSERT INTO `carrelli` (`ID`, `ID_utente`, `Data`) VALUES
(37, NULL, '0000-00-00'),
(38, NULL, '0000-00-00'),
(39, NULL, '0000-00-00'),
(40, NULL, '0000-00-00'),
(41, NULL, '0000-00-00'),
(42, NULL, '0000-00-00'),
(43, NULL, '0000-00-00'),
(44, 1, '0000-00-00'),
(45, 1, '0000-00-00'),
(46, 1, '0000-00-00'),
(47, NULL, '0000-00-00'),
(48, NULL, '0000-00-00'),
(50, NULL, '0000-00-00'),
(57, 1, '0000-00-00'),
(58, NULL, '0000-00-00'),
(59, 1, '0000-00-00'),
(60, 1, '0000-00-00'),
(61, 1, '0000-00-00'),
(62, NULL, '0000-00-00'),
(63, NULL, '0000-00-00'),
(64, 1, '0000-00-00'),
(65, 1, '0000-00-00'),
(66, 1, '0000-00-00'),
(67, 1, '0000-00-00'),
(68, NULL, '0000-00-00'),
(69, 1, '0000-00-00'),
(70, 1, '0000-00-00'),
(71, 1, '0000-00-00'),
(72, 1, '0000-00-00'),
(73, 1, '0000-00-00'),
(74, 1, '0000-00-00'),
(75, 1, '0000-00-00'),
(76, NULL, '0000-00-00'),
(77, NULL, '0000-00-00'),
(78, NULL, '0000-00-00'),
(79, 1, '0000-00-00'),
(80, 1, '0000-00-00'),
(81, 1, '0000-00-00'),
(82, 1, '0000-00-00'),
(83, NULL, '0000-00-00'),
(84, NULL, '0000-00-00'),
(85, 2, '0000-00-00'),
(86, 2, '0000-00-00'),
(87, 2, '0000-00-00'),
(88, 2, '0000-00-00'),
(89, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `Codice` int(11) NOT NULL,
  `Tipo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`Codice`, `Tipo`) VALUES
(1, 'Computer&Laptop'),
(2, 'Abbigliamento'),
(3, 'Videogiochi'),
(4, 'Arredamento'),
(5, 'Cancelleria'),
(6, 'Bellezza'),
(7, 'Nuovi arrivi'),
(8, 'Consigliati');

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE `commenti` (
  `ID` int(11) NOT NULL,
  `Recensione` varchar(32) NOT NULL,
  `Testo` varchar(256) NOT NULL,
  `Stelline` int(11) NOT NULL,
  `ID_Articolo` int(11) NOT NULL,
  `ID_Utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `commenti`
--

INSERT INTO `commenti` (`ID`, `Recensione`, `Testo`, `Stelline`, `ID_Articolo`, `ID_Utente`) VALUES
(1, 'Ottimo', 'Ottimo prodotto', 5, 3, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `contiene`
--

CREATE TABLE `contiene` (
  `ID_Articolo` int(11) NOT NULL,
  `ID_Carrello` int(11) NOT NULL,
  `Quantita` varchar(228) NOT NULL,
  `Totale` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `contiene`
--

INSERT INTO `contiene` (`ID_Articolo`, `ID_Carrello`, `Quantita`, `Totale`) VALUES
(3, 39, '2', '2398'),
(1, 39, '1', '335'),
(3, 40, '2', '2398'),
(3, 42, '2', '2398'),
(1, 43, '1', '335'),
(1, 44, '1', '335'),
(3, 45, '2', '2398'),
(1, 46, '1', '335'),
(10, 64, '', '0'),
(10, 65, '1', '50'),
(3, 66, '2', '2398'),
(3, 67, '2', '2398'),
(3, 69, '2', '2398'),
(3, 70, '2', '2398'),
(3, 71, '2', '2398'),
(3, 72, '2', '2398'),
(3, 73, '2', '2398'),
(3, 74, '2', '2398'),
(3, 75, '2', '2398'),
(3, 85, '2', '2398'),
(3, 86, '2', '2398'),
(4, 86, '1', '79'),
(5, 86, '1', '899'),
(10, 86, '1', '50'),
(3, 87, '1', '1199'),
(4, 87, '1', '79'),
(3, 88, '1', '1199'),
(4, 88, '1', '79');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `ID` int(1) NOT NULL,
  `Data` date NOT NULL,
  `Totale` varchar(228) NOT NULL,
  `Ora` time NOT NULL,
  `ID_Carrello` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`ID`, `Data`, `Totale`, `Ora`, `ID_Carrello`) VALUES
(3, '0000-00-00', '1,199.00', '00:00:00', 75),
(4, '0000-00-00', '1,199.00', '00:00:00', 85),
(5, '0000-00-00', '3,426.00', '00:00:00', 86),
(6, '0000-00-00', '3,426.00', '00:00:00', 86),
(7, '0000-00-00', '1,278.00', '00:00:00', 87),
(8, '0000-00-00', '1,278.00', '00:00:00', 87),
(9, '0000-00-00', '1,278.00', '00:00:00', 88),
(10, '0000-00-00', '1,278.00', '00:00:00', 88);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Nome` varchar(32) NOT NULL,
  `Cognome` varchar(32) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(228) NOT NULL,
  `Telefono` varchar(228) NOT NULL,
  `Indirizzo` varchar(228) NOT NULL,
  `NumeroCivico` int(2) NOT NULL,
  `Citta` varchar(228) NOT NULL,
  `Stato` varchar(228) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID`, `Username`, `Nome`, `Cognome`, `Admin`, `Password`, `Email`, `Telefono`, `Indirizzo`, `NumeroCivico`, `Citta`, `Stato`) VALUES
(1, 'pippo', 'pippino', 'giostra', 1, '6e6bc4e49dd477ebc98ef4046c067b5f', 'pippinogiostra@gmail.com', '1234567896', 'Via ciccioni ', 17, 'Porkinton', 'Porkintonlandia'),
(2, 'pluto', '', '', 0, '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', 0, '', '');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`Codice`),
  ADD KEY `ID_Categoria` (`ID_Categoria`);

--
-- Indici per le tabelle `carrelli`
--
ALTER TABLE `carrelli`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_utente` (`ID_utente`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Codice`);

--
-- Indici per le tabelle `commenti`
--
ALTER TABLE `commenti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Articolo` (`ID_Articolo`),
  ADD KEY `ID_Utente` (`ID_Utente`);

--
-- Indici per le tabelle `contiene`
--
ALTER TABLE `contiene`
  ADD KEY `ID_Articolo` (`ID_Articolo`),
  ADD KEY `ID_Carrello` (`ID_Carrello`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Carrello` (`ID_Carrello`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articoli`
--
ALTER TABLE `articoli`
  MODIFY `Codice` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `commenti`
--
ALTER TABLE `commenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articoli`
--
ALTER TABLE `articoli`
  ADD CONSTRAINT `articoli_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorie` (`Codice`);

--
-- Limiti per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  ADD CONSTRAINT `carrelli_ibfk_1` FOREIGN KEY (`ID_utente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `commenti`
--
ALTER TABLE `commenti`
  ADD CONSTRAINT `commenti_ibfk_1` FOREIGN KEY (`ID_Articolo`) REFERENCES `articoli` (`Codice`),
  ADD CONSTRAINT `commenti_ibfk_2` FOREIGN KEY (`ID_Utente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`ID_Articolo`) REFERENCES `articoli` (`Codice`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`ID_Carrello`) REFERENCES `carrelli` (`ID`);

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`ID_Carrello`) REFERENCES `carrelli` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
