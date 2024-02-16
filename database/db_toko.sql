-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 07:46 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `alur_belanja`
--

CREATE TABLE `alur_belanja` (
  `id_belanja` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alur_belanja`
--

INSERT INTO `alur_belanja` (`id_belanja`, `keterangan`, `tanggal`) VALUES
(5, '<p><strong>Alur Belanja :</strong></p>\r\n\r\n<p>___________________________________________________________________________________________________________________</p>\r\n\r\n<p><strong>Cara Pesan</strong></p>\r\n\r\n<p>Pelanggan baru membuat akun pelanggan pada menu Daftar pelanggan. pelanggan yang telah memiliki akun dapat memilih produk yang tersedia dengan jumlah sesuai kebutuhan pelanggan. Pelanggan mengkonfirmasi pesanan di Keranjang Belanja.</p>\r\n\r\n<p>___________________________________________________________________________________________________________________</p>\r\n\r\n<p><strong>Pengantaran Barang</strong></p>\r\n\r\n<p>Barang yang telah dipesan diantar oleh helper E-Commerce Kantor Pulau dengan ongkos antar GRATIS untuk jarak di daerah Kantor Pulau&nbsp; dan ongkos&nbsp; bila di daerah kantor pulau akan disesuaikan dengan jarak jangkauan dari E-Commerce Kantor Pulau.</p>\r\n\r\n<p>___________________________________________________________________________________________________________________</p>\r\n\r\n<p><strong>Cara Pembayaran</strong></p>\r\n\r\n<p>Pembayaran secara COD (cash on delivery / bayar di tempat). Pelanggan membayar sesuai harga pesanan + ongkos antar Apabila pelanggan ingin melakukan pembayaran via transfer dapat menghubungi kami via Whatsapp di nomor 081251205533.</p>\r\n', '2023-11-14 13:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(2) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nasabah` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`, `nasabah`, `user_id`) VALUES
(1, 'BRI', '7062-0102-4449-538', 'Abdul Sidik', 0),
(2, 'BPD KALTENG', '402-020100005-3', 'Abdul Sidik', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cara_belanja`
--

CREATE TABLE `cara_belanja` (
  `id_cara_belanja` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cara_belanja`
--

INSERT INTO `cara_belanja` (`id_cara_belanja`, `keterangan`, `tanggal`) VALUES
(1, '<p>Cara Belanja Di Kantor Pulau</p>\r\n\r\n<p>1. Pilih menu Daftar | Login.</p>\r\n\r\n<p>2. Jika pelanggan belum memiliki account Pelanggan E-Commerce Kantor Pulau, silahkan daftar terlebih dahulu.</p>\r\n\r\n<p>3. Jika telah menjadi Pelanggan E-Commerce Kantor Pulau, silahkan Login dengan username dan password.</p>\r\n\r\n<p>4. Pilih Kategori atau masukkan Pencarian barang yang pelanggan inginkan di E-Commerce Kantor Pulau lalu.</p>\r\n\r\n<p>5. Pastikan jumlah barang yang pelanggan beli dengan menambah ( + ) atau mengurangkan ( - ) jumlah pesanan pelanggan.</p>\r\n\r\n<p>6. Pelanggan dapat mengkonfirmasi pesanan dengan klik TROLI BELANJA Anda.</p>\r\n\r\n<p>7. Pastikan kembali jumlah barang belanja, alamat, serta nomor telepon pelanggan.</p>\r\n\r\n<p>8. Pilih PROSES BELANJA SAYA.</p>\r\n\r\n<p>9. Pelanggan akan diarahkan ke Riwayat Belanja dengan Status Pesanan PROSES Barang siap diantar ke alamat pelanggan</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2023-11-10 13:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(20) NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `size` varchar(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `session` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `tanggal`, `kode`, `nama`, `size`, `color`, `harga`, `qty`, `jumlah`, `session`, `kd_cus`) VALUES
('20240209225331', '2024-02-09 22:55:39', '12', 'Bromelia', '', '', '15000', '7', '105000', '20231121104747', '');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(10) NOT NULL,
  `nama_desa` varchar(30) NOT NULL,
  `biaya_kirim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`, `biaya_kirim`) VALUES
(1, 'Rangda', '6000'),
(2, 'Runtu', '20000'),
(4, 'Umpang', '10000'),
(5, 'Natai Raya', '20000'),
(6, 'Medang Sari', '30000'),
(7, 'Sulung', '4000'),
(8, 'Tanjung Terantang', '45000'),
(9, 'Kumpai Batu Atas', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `content`, `created`) VALUES
(1, '<p>Barang yang kami jual original dan terpercaya. Kantor Pulau, kec. arut sel, kabupaten kotawaringin barat, kalimantan tengah. Kantor Pulau ini merupakan kantor pulau yang sudah berdiri sejak tahun 2000 mulai memproduksi tanaman florikultura sejak tahun 2018 yang menyediakan produk hasil tanaman florikultura pada kantor pulau yang berada di kantor pulau, kec. arut sel, kabupaten kotawaringin barat, kalimantan tengah.</p>\r\n', '2023-11-10 13:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `kode` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`kode`, `nama`, `jenis`, `keterangan`, `gambar`) VALUES
(0, 'Py', 'iklan', 'k', 'gambar_iklan/banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_kon` int(6) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `bayar_via` varchar(20) NOT NULL,
  `biaya_kirim` int(10) NOT NULL,
  `nama_desa` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int(10) NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `status` enum('Bayar','Belum') NOT NULL,
  `id_bank` int(2) NOT NULL,
  `user_id` int(10) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_kon`, `nopo`, `kd_cus`, `bayar_via`, `biaya_kirim`, `nama_desa`, `tanggal`, `jumlah`, `bukti_transfer`, `total`, `status`, `id_bank`, `user_id`, `id`) VALUES
(62, '07022024200956', '20240207200703', 'BRI', 6000, 'Rangda', '2024-02-07 20:09:56', 55000, '../admin/bukti_transfer/bukti pembayaran.jpg', 61000, 'Belum', 0, 0, 0),
(57, '17012024220535', '20231121104747', 'BPD KALTENG', 20000, 'Natai Raya', '2024-01-17 22:05:35', 15000, '../admin/bukti_transfer/bukti pembayaran.jpg', 35000, 'Belum', 0, 0, 0),
(56, '17012024220023', '20231121104747', 'BPD KALTENG', 10000, 'Umpang', '2024-01-17 22:00:23', 199000, '../admin/bukti_transfer/contoh bukti pembayaran.jpg', 209000, 'Belum', 0, 0, 0),
(61, '07022024200827', '20240207200703', 'BRI', 50000, 'Kumpai Batu Atas', '2024-02-07 20:08:27', 60000, '../admin/bukti_transfer/bukti pembayaran.jpg', 110000, 'Belum', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi1`
--

CREATE TABLE `konfirmasi1` (
  `id_kon` int(6) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `bayar_via` varchar(20) NOT NULL,
  `biaya_kirim` int(10) NOT NULL,
  `nama_desa` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int(10) NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `status` enum('Bayar','Belum') NOT NULL,
  `id_bank` int(2) NOT NULL,
  `user_id` int(10) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi1`
--

INSERT INTO `konfirmasi1` (`id_kon`, `nopo`, `kd_cus`, `bayar_via`, `biaya_kirim`, `nama_desa`, `tanggal`, `jumlah`, `bukti_transfer`, `total`, `status`, `id_bank`, `user_id`, `id`) VALUES
(66, '09022024174336', '20231121104747', '0', 0, '', '2024-02-09 17:43:36', 140000, '0', 0, 'Belum', 0, 0, 0),
(64, '09022024111246', '20231121104747', '0', 0, '', '2024-02-09 11:12:46', 200000, '0', 0, 'Belum', 0, 0, 0),
(65, '09022024111524', '20231121104747', '0', 0, '', '2024-02-09 11:15:24', 220000, '0', 0, 'Belum', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kd_cus` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` int(15) DEFAULT NULL,
  `no_ktp` int(20) DEFAULT NULL,
  `e_mail` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kd_cus`, `nama`, `tanggal`, `alamat`, `no_telp`, `no_ktp`, `e_mail`, `username`, `password`, `gambar`) VALUES
('20231121104747', 'sidik', '2023-11-21', 'Jl. A. Yani', 12121212, 0, '081251205533', 'sidik', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '../admin/gambar_customer/sidik.jpg'),
('20240105164941', 'abdul sidik c', '2024-01-05', 'jnjnjnjn', 1212121, 0, 'jnjnjnj', 'ktu', '4fcd7b3f300105afcafb4c9d92058c776366728e', '../admin/gambar_customer/sidik.jpg'),
('20240207200536', 'example', '2024-02-07', 'jnjnjnjn', 1212121, 0, 'jnjnjnj', 'example', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', ''),
('20240207200703', 'example1', '2024-02-07', 'jnjnjnjn', 1212121, 0, 'jnjnjnj', 'user1', '7c222fb2927d828af22f592134e8932480637c0d', ''),
('20240209231040', 'sdsd', '2024-02-09', 'jkjkjcs', 0, 0, 'kjkjs', 'd', '4452d71687b6bc2c9389c3349fdc17fbd73b833b', ''),
('20240209233040', 'sdsd', '2024-02-09', '', 0, 0, '', 's', '4452d71687b6bc2c9389c3349fdc17fbd73b833b', '');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `nopo` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `size` varchar(6) NOT NULL,
  `tanggalkirim` date NOT NULL,
  `tanggalexport` date NOT NULL,
  `status` enum('Proses','Selesai','Terkirim','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`nopo`, `color`, `kd_cus`, `size`, `tanggalkirim`, `tanggalexport`, `status`) VALUES
('17012024220535', '-', '', 'kecil', '2024-01-30', '2024-01-30', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `po_terima`
--

CREATE TABLE `po_terima` (
  `id` int(10) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `kode` int(4) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color` varchar(10) NOT NULL,
  `size` varchar(6) NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_terima`
--

INSERT INTO `po_terima` (`id`, `nopo`, `kd_cus`, `kode`, `tanggal`, `color`, `size`, `qty`, `total`, `user_id`) VALUES
(68, '17012024220535', '20231121104747', 12, '2024-01-17 22:05:33', '-', 'kecil', 1, 15000, 0),
(67, '17012024220023', '20231121104747', 6, '2024-01-17 22:00:17', '-', 'kecil', 2, 209000, 0),
(66, '17012024220023', '20231121104747', 13, '2024-01-17 22:00:18', '-', 'kecil', 2, 209000, 0),
(65, '17012024220023', '20231121104747', 8, '2024-01-17 22:00:19', '-', 'kecil', 2, 209000, 0),
(64, '17012024220023', '20231121104747', 5, '2024-01-17 22:00:21', '-', 'kecil', 3, 209000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `po_terima1`
--

CREATE TABLE `po_terima1` (
  `id` int(10) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `kode` int(4) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color` varchar(10) NOT NULL,
  `size` varchar(6) NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_terima1`
--

INSERT INTO `po_terima1` (`id`, `nopo`, `kd_cus`, `kode`, `tanggal`, `color`, `size`, `qty`, `total`, `user_id`) VALUES
(87, '9022024174336', '20231121104747', 13, '2024-02-09 17:43:30', '', '', 7, 140000, 0),
(78, '18012024133308', '20231121104747', 12, '2024-01-18 13:33:05', '', '', 1, 15000, 0),
(79, '18012024133308', '20231121104747', 11, '2024-01-18 13:32:59', '', '', 1, 40000, 0),
(80, '7022024200827', '20240207200703', 13, '2024-02-07 20:08:06', '', '', 1, 20000, 0),
(81, '7022024200827', '20240207200703', 11, '2024-02-07 20:08:14', '', '', 1, 40000, 0),
(82, '7022024200956', '20240207200703', 12, '2024-02-07 20:09:52', '', '', 1, 15000, 0),
(83, '7022024200956', '20240207200703', 11, '2024-02-07 20:09:46', '', '', 1, 40000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `size` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` int(3) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `gambar` varchar(40) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode`, `nama`, `kd_cus`, `jenis`, `size`, `color`, `harga`, `keterangan`, `stok`, `qty`, `gambar`, `tanggal`) VALUES
(13, 'Adam hawa ', '', 'flori', '', '', 20000, 'merupakan salah satu tumbuhan yang tergolong kedalam tanaman hias varigata. Tanaman varigata adalah segala tanaman yang menampilkan dua warna atau lebih pada daunnya, yang berbeda dengan induknya. Tanaman adam hawa termasuk salah satu tanaman unik yang ternyata bisa menyerap polutan udara.', 150090, '10', 'gambar_produk/Adam hawa.jpg', '2023-11-10'),
(12, 'Bromelia', '', 'flori', '', '', 15000, 'Tanaman bromelia adalah tanaman tropis dengan 1800 spesies yang memberikan sentuhan eksotis pada rumah. Dari sekian banyak spesiesnya, hanya beberapa saja yang dapat dijadikan tanaman hias', 134, '3', 'gambar_produk/Bromelia.jpg', '2023-11-13'),
(11, 'Bunga Kertas', '', 'flori', '', '', 40000, 'Bunga bougenville atau bunga kertas adalah salah satu tanaman yang sering menghiasi halaman rumah. Bunganya yang cantik dan berwarna-warni membuat banyak orang menyukai tanaman yang satu ini.', 91, '', 'gambar_produk/Bunga Kertas.jpg', '2024-01-17'),
(10, 'Agave hijau', '', 'flori', '', '', 20000, 'Agave terkenal sebagai tanaman yang digunakan untuk pemanis alami. Tak hanya sekedar pemanis, agave memiliki manfaat kesehatan seperti berikut: 1. Mengatasi depresi karena mengandung vitamin K dan folat 2. Bagus untuk ibu dan janin berkat vitamin B6 ', 100, '', 'gambar_produk/Agave hijau.jpg', '2024-01-17'),
(9, 'Bambu Hoki Var', '', 'flori', '', '', 10000, 'Bambu hoki juga merupakan tanaman yang mendukung kekayaan dan kelimpahan. Untuk menarik lebih banyak kemakmuran, Moms dapat meletakkan bambu rejeki berbatang 3 atau 9 di sudut kekayaan atau posisi Xun, baik di rumah, kantor, atau kamar tidur.', 97, '', 'gambar_produk/Bambu Hoki Var.jpg', '2024-01-17'),
(8, 'Bougenvile Singapur', '', 'flori', '', '', 30000, 'Bunga Bougenville juga dikenal dengan nama bunga kertas karena kelopaknya yang tipis seperti kertas. Tapi tahukah kamu? Kelopak yang tipis seperti kertas tersebut bukanlah bagian dari bunga Bougenville, melainkan modifikasi dari daunnya.', 95, '', 'gambar_produk/Bougenvile Singapur.jpg', '2024-01-17'),
(7, 'Cendana Bali', '', 'flori', '', '', 12000, 'Apa itu tanaman cendana?\r\nPohon cendana memiliki nama latin Santalum album L. dalam dunia perdagangan dikenal dengan nama sandalwood adalah salah satu tumbuhan asli Indonesia. Pohon cendana ini tumbuh endemik di propinsi Nusa Tenggara Timur dan Kabupaten Malu Tenggara Barat.', 98, '', 'gambar_produk/Cendana Bali.jpg', '2024-01-17'),
(6, 'Cendana India', '', 'flori', '', '', 30000, 'Kayu cendana sering digunakan untuk untuk rempah-rempah, bahan dupa, campuran parfum, aromaterapi, dan warangka keris. Selain itu, kayu cendana juga dimanfaatkan untuk bahan bangunan, mebel atau furniture, kerajinan, karya seni, tasbih dan lain sebagainya.', 97, '', 'gambar_produk/Cendana India.jpg', '2024-01-17'),
(5, 'Amarilis', '', 'flori', '', '', 13000, 'Amarilis merupakan salah satu jenis tanaman berbunga yang berasal dari daerah sub tropik. Tanaman ini dapat ditanam di Indonesia pada daerah bersuhu 18oC sampai 20oC pada malam hari dan 20oC - 25oC pada siang hari. Amarilis merupakan salah satu unsur taman yang menarik.', 94, '', 'gambar_produk/Amarilis.jpg', '2024-01-17'),
(4, '1 set / Garden Tool', '', 'utility', '', '', 22000, '* Barang yg sdh di order tdk dapat DI TUKAR / DIKEMBALIKAN dengan ALASAN apapun \r\n\r\n* Jika ada kekurangan dalam PENGIRIMAN jumlah order,KAMI AKAN KIRIM SISANYA TANPA DIPUNGUT ONGKIR LAGI', 200, '', 'gambar_produk/1 set  Garden Tool.jpg', '2024-01-17'),
(3, 'Sarung Tangan Kebun', '', 'utility', '', '', 16440, 'Sarung Tangan Kebun Karet Cakar Genie Gloves Untuk Berkebun\r\n\r\nBahan karet spandek antislip pada sarung tangan ini juga dapat digunakan untuk bekerja, seperti salah satunya pekerjaan kebun. Sarung tangan ini juga akan membuat tangan Anda tetap kering dan bersih ketika berkebun. Anda juga bisa mengaduk-mengaduk tanah dengan aman.', 120, '', 'gambar_produk/Sarung Tangan Kebun.jpg', '2024-01-17'),
(2, 'Pacul Kebun', '', 'utility', '', '', 59000, 'PACUL TAMAN KEBUN 2IN1 CANGKUL GARPU PERALATAN BERKEBUN GAGANG KAYUPANJANG 39 CMLEBAR 23 CMGAGANG KAYUBAHAN BESI TAHAN KARAT 2 SISI PACUL DAN GARPU', 100, '', 'gambar_produk/Pancul Tanam.jpg', '2024-01-17'),
(1, 'Sprinkler Taman', '', 'utility', '', '', 83900, 'Untuk Anda yang punya taman dirumah Anda, pasti sangat merepotkan untuk menyirami taman Anda agar tetap segar dan subur. Hadirlah perlengkapan set irigasi taman ini sehinga Anda cukup memasangnya ditaman Anda dan taman akan tersiram secara merata dengan mudah dan cepat.', 100, '', 'gambar_produk/Sprinkler Taman.jpg', '2024-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `content`, `created`, `gambar`) VALUES
(0, '<p>Kantor Pulau, kec. arut sel, kabupaten kotawaringin barat, kalimantan tengah. Kantor Pulau ini merupakan kantor pulau yang sudah berdiri sejak tahun 2000 mulai memproduksi tanaman florikultura sejak tahun 2018 yang menyediakan produk hasil tanaman florikultura pada kantor pulau yang berada di kantor pulau, kec. arut sel, kabupaten kotawaringin barat, kalimantan tengah.</p>', '2023-11-10 13:46:37', 'gambar_profil/home.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Abdul Sidik', 'gambar_admin/sidik.jpg'),
(17, 'ktu', '4fcd7b3f300105afcafb4c9d92058c776366728e', 'ktu', 'gambar_admin/sidik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_operasional`
--

CREATE TABLE `waktu_operasional` (
  `id_waktu` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_operasional`
--

INSERT INTO `waktu_operasional` (`id_waktu`, `keterangan`, `tanggal`) VALUES
(1, '<p>Senin s.d. Sabtu : 08.00 s.d. 18:00 WIB Minggu &amp; Hari Libur : 08:00 s.d. 13:00 WIB Pemesanan tanaman florikultura di atas jam 18:00 WIB (Senin-Sabtu) atau di atas jam 13:00 WIB (Minggu dan Hari Libur) diantar pada esok hari. Kami akan menginformasikan kepada pelanggan apabila kantor pulau tidak beroperasional selain daripada waktu yang tertera.</p>\r\n', '2019-07-23 23:53:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alur_belanja`
--
ALTER TABLE `alur_belanja`
  ADD PRIMARY KEY (`id_belanja`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `cara_belanja`
--
ALTER TABLE `cara_belanja`
  ADD PRIMARY KEY (`id_cara_belanja`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `konfirmasi1`
--
ALTER TABLE `konfirmasi1`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kd_cus`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`nopo`);

--
-- Indexes for table `po_terima`
--
ALTER TABLE `po_terima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_terima1`
--
ALTER TABLE `po_terima1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alur_belanja`
--
ALTER TABLE `alur_belanja`
  MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cara_belanja`
--
ALTER TABLE `cara_belanja`
  MODIFY `id_cara_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_kon` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=845;
--
-- AUTO_INCREMENT for table `konfirmasi1`
--
ALTER TABLE `konfirmasi1`
  MODIFY `id_kon` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `po_terima`
--
ALTER TABLE `po_terima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `po_terima1`
--
ALTER TABLE `po_terima1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `waktu_operasional`
--
ALTER TABLE `waktu_operasional`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
