-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2022 pada 16.07
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookscenter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `Id_anggota` int(20) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `NoTlp` int(20) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`Id_anggota`, `Email`, `Username`, `NoTlp`, `Password`) VALUES
(0, 'kelvn@gmail.com', 'Student', 2147483647, '123'),
(3, 'nanda123@gmail.com', 'Student', 33333311, '1'),
(11, 'alfajar@gmail.com', 'Student', 1234567879, 'fajar'),
(12, 'mizan123@gmail.com', 'Student', 123212333, 'mizan'),
(123, 'kelvingaming@gmail.com', 'Student', 888997766, 'kelvin'),
(1001, 'admin123@gmail.com', 'admin', 812334455, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `Id_buku` int(20) NOT NULL,
  `Judul_buku` varchar(50) DEFAULT NULL,
  `Tahun` varchar(50) DEFAULT NULL,
  `Penerbit` varchar(50) DEFAULT NULL,
  `Jml_tersedia` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`Id_buku`, `Judul_buku`, `Tahun`, `Penerbit`, `Jml_tersedia`) VALUES
(1, 'Pemogramman Sistem Bergerak', '2021', 'Klvnnnn', 22),
(2, 'Mikro Komputer', '1999', 'komputer', 33),
(3, 'Novel Senja', '2022', 'klvn', 9),
(4, 'Interaksi Manusia Komputer', '2022', 'Nanda', 39),
(5, 'Pendidikan Ekonomi', '2022', 'AKG', 12),
(6, 'Matematika Peminatan', '2020', 'dicky', 99),
(7, 'Pendidikan Matematika Peminatan', '2020', 'Asrul', 11),
(8, 'Ekonomi Masyarakat', '2022', 'Ekmas', 9),
(9, 'Sejarah Indo', '2001', 'mus', 12),
(10, 'atomic habit part 2', '1999', 'thehabit', 12),
(11, 'Pergerakan Atom', '2025', 'bagas', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `Id_anggota` int(20) NOT NULL,
  `Id_buku` int(20) NOT NULL,
  `Tgl_pinjam` date DEFAULT NULL,
  `Batas_waktu` date DEFAULT NULL,
  `Tgl_pengembalian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`Id_anggota`, `Id_buku`, `Tgl_pinjam`, `Batas_waktu`, `Tgl_pengembalian`) VALUES
(0, 1, '2022-12-04', '2023-02-02', NULL),
(0, 2, '2022-12-04', '2023-02-02', NULL),
(0, 3, '2022-12-04', '2023-02-02', NULL),
(0, 4, '2022-12-04', '2023-02-02', NULL),
(0, 5, '2022-12-04', '2023-02-02', NULL),
(0, 6, '2022-12-04', '2023-02-02', NULL),
(0, 7, '2022-12-04', '2023-02-02', NULL),
(0, 8, '2022-12-04', '2023-02-02', NULL),
(0, 11, '2022-12-04', '2023-02-02', NULL),
(123, 2, '2022-12-04', '2023-02-02', '2022-12-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `Id_anggota` int(20) NOT NULL,
  `Id_buku` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`Id_anggota`, `Id_buku`) VALUES
(0, 1),
(3, 3),
(12, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

CREATE TABLE `penulis` (
  `Id_buku` int(20) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penulis`
--

INSERT INTO `penulis` (`Id_buku`, `Nama`) VALUES
(1, 'Budi Utomo'),
(2, 'komputerized'),
(3, 'Senja Hujan'),
(4, 'Resmi Darmi'),
(5, 'fe'),
(6, 'Tiar'),
(7, 'Tiar'),
(8, 'Ekmas'),
(9, 'mus'),
(10, 'thehabit'),
(11, 'bagas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi_buku`
--

CREATE TABLE `rekomendasi_buku` (
  `Id_rekomendasi` int(20) NOT NULL,
  `Id_anggota` int(20) DEFAULT NULL,
  `Judul_buku` varchar(50) DEFAULT NULL,
  `Deskripsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekomendasi_buku`
--

INSERT INTO `rekomendasi_buku` (`Id_rekomendasi`, `Id_anggota`, `Judul_buku`, `Deskripsi`) VALUES
(2, 0, 'Future Popes', 'Space OPera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `Id_staff` int(20) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`Id_staff`, `Nama`) VALUES
(1001, 'admingege');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Email` varchar(50) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `NoTlp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Email`, `Nama`, `NoTlp`) VALUES
('admin123@gmail.com', 'admingege', 812334455),
('alfajar@gmail.com', 'RIzki Alfajar', 1234567879),
('kelvingaming@gmail.com', 'Kelvin Aulia Wilson', 888997766),
('kelvn@gmail.com', 'Kelvin Aulia Wilson', 2147483647),
('mizan123@gmail.com', 'hamizan', 123212333),
('nanda123@gmail.com', 'Nanda', 33333311);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`Id_anggota`),
  ADD KEY `Email` (`Email`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`Id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`Id_anggota`,`Id_buku`),
  ADD KEY `Id_buku` (`Id_buku`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`Id_anggota`,`Id_buku`),
  ADD KEY `Id_buku` (`Id_buku`);

--
-- Indeks untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`Id_buku`,`Nama`);

--
-- Indeks untuk tabel `rekomendasi_buku`
--
ALTER TABLE `rekomendasi_buku`
  ADD PRIMARY KEY (`Id_rekomendasi`),
  ADD KEY `Id_anggota` (`Id_anggota`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Id_staff`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `Id_buku` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `rekomendasi_buku`
--
ALTER TABLE `rekomendasi_buku`
  MODIFY `Id_rekomendasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`Id_anggota`) REFERENCES `anggota` (`Id_anggota`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`Id_buku`) REFERENCES `buku` (`Id_buku`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`Id_anggota`) REFERENCES `anggota` (`Id_anggota`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`Id_buku`) REFERENCES `buku` (`Id_buku`);

--
-- Ketidakleluasaan untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD CONSTRAINT `penulis_ibfk_1` FOREIGN KEY (`Id_buku`) REFERENCES `buku` (`Id_buku`);

--
-- Ketidakleluasaan untuk tabel `rekomendasi_buku`
--
ALTER TABLE `rekomendasi_buku`
  ADD CONSTRAINT `rekomendasi_buku_ibfk_1` FOREIGN KEY (`Id_anggota`) REFERENCES `anggota` (`Id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
