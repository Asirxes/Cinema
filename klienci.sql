-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Sty 2023, 12:19
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `klienci`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `login` varchar(45) NOT NULL,
  `film` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `ilosc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`login`, `film`, `data`, `ilosc`) VALUES
('admin', 'Bezkresna Pustynia', '2023-01-26', '2'),
('admin', 'Dziewczę z aparatem', '2023-01-26', '5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `login` varchar(45) NOT NULL,
  `haslo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`login`, `haslo`) VALUES
('admin', '$2y$10$W9vbSjsckAHd9C3hEZJa8evScPy4iEh5gqgGKBdeRq2sLA/O5tQ4O'),
('admin1', '$2y$10$ipQw/06sp0ljRFsu2.bGI.eWWim/Xf.tV5E5Ygbk/KHJXUFqpK.Oa'),
('admin15', '$2y$10$WdlIApcZ6dlyTxJSZWyWC..h0gUEepjcCqfYtBY9MLf44RHKzGUxK'),
('admin2', '$2y$10$ln21sCgxeiRb5u0Z96ZlkugJd/lG/lxa7bIjiBW8nklBClYHZghBm'),
('Karol', '$2y$10$gnyf/lPv.1/NcocZa4VN5uRh5X0Hkwe3OOki5SJauv307FqZ1siO2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sesje`
--

CREATE TABLE `sesje` (
  `login` varchar(45) NOT NULL,
  `sesja` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD UNIQUE KEY `login` (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
