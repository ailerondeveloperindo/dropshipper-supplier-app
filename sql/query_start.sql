CREATE DATABASE fppwl;
USE fppwl;
CREATE TABLE `admin` (`username` varchar(64), `password` char(32));

CREATE TABLE `detail_barang` (
    `id_barang` int PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    `Nama_Barang` varchar(64), 
    `stok` int, 
    `Harga_Barang` decimal, 
    `imagelink` text
);

CREATE TABLE `kategori_barang` (
    `id_kategori` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `Nama_Kategori` varchar(64)
);

CREATE TABLE `profil_kurir` (
    `id_kurir` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `Nama_Kurir` varchar(64)
);

CREATE TABLE `pengiriman` (
    `No_Resi` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `tanggal_kirim` DATE,
    `status` varchar(12),
    `no_pesanan` int,
    `id_penjual` int,
    `id_kurir` int,
    FOREIGN KEY (no_pesanan) REFERENCES pesanan(no_pesanan),
    FOREIGN KEY (id_penjual) REFERENCES profil_penjual(Id_Penjual),
    FOREIGN KEY (id_kurir) REFERENCES profil_kurir(id_kurir)
);

CREATE TABLE `profil_penjual` (
    `Id_Penjual` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `Nama_Penjual` varchar(64),
    `password` char(32),
    `username` varchar(64),
    `imagelink` text,
    `nomor_kartu` varchar(32),
    `tanggal_habis` DATE,
    `alamat` varchar(64)
);

CREATE TABLE `profil_supplier`(
    `id_supplier` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `nama_supplier` varchar(64),
    `password` char(32),
    `username` varchar(64)
)

CREATE TABLE `pesanan` (
    `no_pesanan` int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `nama_cust` varchar(64),
    `alamat_cust` varchar(64),
    `total` int,
    `terbayar` int,
    `tanggal_pesanan` DATE,
    `jumlah` int,
    `id_penjual` int,
    `id_barang` int,
    `id_supplier` int,
    `id_kurir` int,
    FOREIGN KEY (id_penjual) REFERENCES profil_penjual(Id_Penjual),
    FOREIGN KEY (id_barang) REFERENCES detail_barang(id_barang),
    FOREIGN KEY (id_supplier) REFERENCES profil_supplier(id_supplier),
    FOREIGN KEY (id_kurir) REFERENCES profil_kurir(id_kurir)

);
