SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `penghuni_kostan` (
`id_anak_kost` int(11) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `no_ktp` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

INSERT INTO `penghuni_kostan` (`id_anak_kost`, `nama_lengkap`, `no_ktp`) VALUES
(1, 'Muhammad Alfat', '3321009300498887'),
(2, 'Ardi Maulana', '2727838374746627'),
(6, 'Ahmad Lutfi', '3211887858574844');

CREATE TABLE IF NOT EXISTS `kamar_kost` (
`kode_kamar` int(11) NOT NULL,
  `jenis_kamar` varchar(20) NOT NULL,
  `harga_kamar` int(5) NOT NULL,
  `potongan` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


INSERT INTO `kamar_kost` (`kode_kamar`, `jenis_kamar`, `harga_kamar`, `potongan`) VALUES
(1, 'Kamar Kecil', 900000, 0),
(2, 'Buah Besar', 1500000, 2);


CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_anak_kost` int(11) NOT NULL,
  `kode_kamar` int(11) NOT NULL,
  `jumlah_penghuni` int(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;


INSERT INTO `transaksi` (`id_transaksi`, `id_anak_kost`, `kode_kamar`, `jumlah_penghuni`, `tanggal_transaksi`) VALUES
(1, 1, 1, 1, '2017-12-10'),
(2, 2, 2, 2, '2017-12-10');

ALTER TABLE `penghuni_kostan`
 ADD PRIMARY KEY (`id_anak_kost`);


ALTER TABLE `kamar_kost`
 ADD PRIMARY KEY (`kode_kamar`);


ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`), ADD KEY `id_anak_kost` (`id_anak_kost`), ADD KEY `kode_kamar` (`kode_kamar`);


ALTER TABLE `penghuni_kostan`
MODIFY `id_anak_kost` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;

ALTER TABLE `kamar_kost`
MODIFY `kode_kamar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;

ALTER TABLE `transaksi`
ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_anak_kost`) REFERENCES `penghuni_kostan` (`id_anak_kost`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kode_kamar`) REFERENCES `kamar_kost` (`kode_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

