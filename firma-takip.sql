-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Ağu 2021, 16:26:09
-- Sunucu sürümü: 10.4.20-MariaDB
-- PHP Sürümü: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `firma-takip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alicilar`
--

CREATE TABLE `alicilar` (
  `AliciId` bigint(20) NOT NULL,
  `FirmaAdi` varchar(200) DEFAULT NULL,
  `YetkiliAdi` varchar(100) DEFAULT NULL,
  `Adres` varchar(200) DEFAULT NULL,
  `Sehir` int(2) DEFAULT NULL,
  `Telefon` varchar(12) DEFAULT NULL,
  `Faks` varchar(12) DEFAULT NULL,
  `CepTelefonu` varchar(11) DEFAULT NULL,
  `Eposta` varchar(100) DEFAULT NULL,
  `vergidairesi` varchar(25) DEFAULT NULL,
  `vergino` varchar(15) DEFAULT NULL,
  `kullanici_sifresi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `alicilar`
--

INSERT INTO `alicilar` (`AliciId`, `FirmaAdi`, `YetkiliAdi`, `Adres`, `Sehir`, `Telefon`, `Faks`, `CepTelefonu`, `Eposta`, `vergidairesi`, `vergino`, `kullanici_sifresi`) VALUES
(1, 'Ömer Koyuncu', 'Ömer Koyuncu', '', 1, NULL, NULL, NULL, 'omer@koyuncu', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logkayit`
--

CREATE TABLE `logkayit` (
  `logId` int(11) NOT NULL,
  `logTur` varchar(30) NOT NULL,
  `logSahip` varchar(200) NOT NULL,
  `logBilgi` text DEFAULT NULL,
  `logTarih` datetime NOT NULL,
  `logIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `logkayit`
--

INSERT INTO `logkayit` (`logId`, `logTur`, `logSahip`, `logBilgi`, `logTarih`, `logIP`) VALUES
(1, 'MÜŞTERİ GİRİŞ', 'omer@koyuncu', 'Müşteri girişi.', '2021-08-12 22:34:20', '::1'),
(2, 'ADMİN GİRİŞ', 'admin', 'Admin girişi.', '2021-08-12 23:03:30', '::1'),
(3, 'ADMİN GİRİŞ', 'admin', 'Admin girişi.', '2021-08-13 16:24:45', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model`
--

CREATE TABLE `model` (
  `model_id` int(50) NOT NULL,
  `urun_kategorisi` varchar(200) NOT NULL,
  `model_adi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE `personel` (
  `personel_id` int(255) NOT NULL,
  `personel_adi` varchar(50) DEFAULT NULL,
  `personel_soyadi` varchar(50) DEFAULT NULL,
  `kullanici_adi` varchar(100) DEFAULT NULL,
  `kullanici_sifresi` varchar(100) DEFAULT NULL,
  `gorevi` varchar(100) DEFAULT NULL,
  `yetki` int(1) DEFAULT 0,
  `mail_adresi` varchar(100) DEFAULT NULL,
  `cep_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`personel_id`, `personel_adi`, `personel_soyadi`, `kullanici_adi`, `kullanici_sifresi`, `gorevi`, `yetki`, `mail_adresi`, `cep_no`) VALUES
(1, 'admin', 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Yönetici', 1, 'admin@firmatakip', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satislar`
--

CREATE TABLE `satislar` (
  `satis_id` int(11) NOT NULL,
  `firma_adi` varchar(200) DEFAULT NULL,
  `sehir` int(11) DEFAULT NULL,
  `model_adi` varchar(200) DEFAULT NULL,
  `urun_serino` varchar(200) DEFAULT NULL,
  `Eposta` varchar(100) DEFAULT NULL,
  `satis_tarihi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yeniserviskayit`
--

CREATE TABLE `yeniserviskayit` (
  `id` int(255) NOT NULL,
  `musteri_adsoyad` varchar(100) DEFAULT NULL,
  `yetkili_adsoyad` varchar(150) DEFAULT NULL,
  `il_adi` int(2) DEFAULT NULL,
  `mail_adresi` varchar(100) DEFAULT NULL,
  `telefon_no` varchar(20) DEFAULT NULL,
  `cep_no` varchar(20) DEFAULT NULL,
  `seri_no` varchar(50) DEFAULT NULL,
  `model_adi` varchar(75) DEFAULT NULL,
  `musteri_beyani` text DEFAULT NULL,
  `aciklama` text DEFAULT NULL,
  `giris_tarihi` date DEFAULT NULL,
  `teslim_tarihi` date DEFAULT NULL,
  `tutar` varchar(20) DEFAULT NULL,
  `durum` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `alicilar`
--
ALTER TABLE `alicilar`
  ADD PRIMARY KEY (`AliciId`);

--
-- Tablo için indeksler `logkayit`
--
ALTER TABLE `logkayit`
  ADD PRIMARY KEY (`logId`);

--
-- Tablo için indeksler `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Tablo için indeksler `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`personel_id`);

--
-- Tablo için indeksler `satislar`
--
ALTER TABLE `satislar`
  ADD PRIMARY KEY (`satis_id`);

--
-- Tablo için indeksler `yeniserviskayit`
--
ALTER TABLE `yeniserviskayit`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `alicilar`
--
ALTER TABLE `alicilar`
  MODIFY `AliciId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `logkayit`
--
ALTER TABLE `logkayit`
  MODIFY `logId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `personel`
--
ALTER TABLE `personel`
  MODIFY `personel_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `satislar`
--
ALTER TABLE `satislar`
  MODIFY `satis_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yeniserviskayit`
--
ALTER TABLE `yeniserviskayit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
