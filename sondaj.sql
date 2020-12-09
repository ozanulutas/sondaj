-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 Ara 2020, 10:39:22
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sondaj`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `metin` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `baslik`, `metin`) VALUES
(1, 'Kızılkaya Sondaj', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam cum suscipit modi tenetur recusandae explicabo sed, illum omnis dolore facere consectetur cumque optio iusto veritatis ad perspiciatis beatae? \r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, officiis ratione tempora labore porro laboriosam, unde ad aut corrupti doloremque doloribus accusantium saepe soluta nulla quasi recusandae eaque pariatur! Veritatis.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmet`
--

CREATE TABLE `hizmet` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `aciklama` varchar(1000) NOT NULL,
  `metin` varchar(5000) NOT NULL,
  `resim` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `hizmet`
--

INSERT INTO `hizmet` (`id`, `baslik`, `aciklama`, `metin`, `resim`) VALUES
(12, 'Su Arama', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati qui sit expedita cumque ipsa nam ...', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati qui sit expedita cumque ipsa nam, dolore tempore ut iure culpa pariatur facilis earum neque autem delectus saepe minima! Est, commodi!\r\n', '1.jpg'),
(13, 'Sondaj', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto asperiores debitis...', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto asperiores debitis earum quia quam dolore corporis, nam maiores nostrum velit saepe magnam, id, sequi sed? Consectetur unde labore dolor amet.\r\n', '2.jpg'),
(14, 'Araç Hizmetleri', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis dignissimos molestiae aut...', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis dignissimos molestiae aut? Reprehenderit quaerat eos accusantium minus, fuga quibusdam labore ullam corrupti porro magni est rerum, culpa, nulla repellendus provident?\r\n', '3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kullanici_adi`, `email`, `sifre`) VALUES
(1, 'asd', 'asd', '$2y$10$UgW2r2UxOi9Y8kKDr4NC6uqhYwtFzgCheCy6dNU7F8bdZqZuhTzZC');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfa_aciklama`
--

CREATE TABLE `sayfa_aciklama` (
  `id` int(11) NOT NULL,
  `sayfa` varchar(20) DEFAULT NULL,
  `aciklama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sayfa_aciklama`
--

INSERT INTO `sayfa_aciklama` (`id`, `sayfa`, `aciklama`) VALUES
(1, 'Ana Sayfa', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor ipsa voluptate voluptas voluptatem est quo, modi quis nihil eius consequuntur veritatis temporibus illum maxime blanditiis, iusto quidem cumque dicta dolore.\r\n'),
(2, 'Hakkımızda', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam, at quidem ex doloribus reiciendis rerum corporis nemo sit fugit dignissimos ea quo. Ipsa ducimus qui fugiat rem animi aspernatur nihil!\r\n'),
(3, 'Hizmetler', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit officia veniam nobis tempore sit numquam optio nesciunt quos possimus, perferendis voluptates animi laboriosam eius iure vel quas natus debitis aliquam!\r\n\r\n'),
(4, 'İletişim', 'Lorem ipsum dolos autem perspiciatis ab ducimus aliquid asperiores quidem fuga quae modi, earum porro accusamus optio corrupti fugit.\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `resim`) VALUES
(8, '4.jpg'),
(9, '2_1.jpg'),
(10, '3_1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `adres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `baslik`, `email`, `telefon`, `adres`) VALUES
(1, 'Kızılkaya Sondajcı', 'kizilkaya@kizilkaya.com', '0 555 444 33 22', 'Ortaköy Merkez Mah, \r\nAdakale Sk. No:13, \r\n34570 Silivri/İstanbul');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmet`
--
ALTER TABLE `hizmet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sayfa_aciklama`
--
ALTER TABLE `sayfa_aciklama`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hizmet`
--
ALTER TABLE `hizmet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sayfa_aciklama`
--
ALTER TABLE `sayfa_aciklama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
