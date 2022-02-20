-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Ağu 2021, 16:38:05
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
-- Veritabanı: `db_master`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gonullu_proje`
--

CREATE TABLE `gonullu_proje` (
  `gonulluMail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `projeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gonullu_proje`
--

INSERT INTO `gonullu_proje` (`gonulluMail`, `projeID`) VALUES
('A.Aksoy@hotmail.com', 1),
('A.Oz@hotmail.com', 5),
('B.Ozay@hotmail.com', 4),
('B.Purcu@hotmail.com', 8),
('H.Beydag@hotmail.com', 8),
('H.Sugoturen@hotmail.com', 1),
('K.Uz@hotmail.com', 4),
('M.Kocabas@hotmail.com', 6),
('N.Rusan@hotmail.com', 6),
('S.Candan@hotmail.com', 1),
('S.Candan@hotmail.com', 9),
('S.Kalsın@hotmail.com', 6),
('S.Kalsın@hotmail.com', 9),
('S.Kalsın@hotmail.com', 11),
('S.Remzi@hotmail.com', 7),
('Z.Aydinlioglu@hotmail.com', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sirket`
--

CREATE TABLE `sirket` (
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  `internetSitesi` varchar(580) COLLATE utf8_turkish_ci NOT NULL,
  `sehir` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `yemek` tinyint(1) NOT NULL,
  `egitim` tinyint(1) NOT NULL,
  `servis` tinyint(1) NOT NULL,
  `sigorta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sirket`
--

INSERT INTO `sirket` (`mail`, `isim`, `sifre`, `internetSitesi`, `sehir`, `yemek`, `egitim`, `servis`, `sigorta`) VALUES
('Bundle@hotmail.com', 'Bundle', '22218242', 'https://www.bundle.app/tr', 'İstanbul', 1, 0, 0, 1),
('Buybuddy@hotmail.com', 'BuyBuddy', '13854586', 'https://buybuddy.co/', 'Ankara', 1, 1, 1, 1),
('FazlaGıda@hotmail.com', 'Fazla Gıda', '65057448', 'https://www.fazlagida.com/', 'Ankara', 0, 1, 0, 1),
('GamerArena@hotmail.com', 'Gamer Arena', '49260725', 'https://gamerarena.com/', 'İzmir', 0, 0, 0, 1),
('Kompanion@hotmail.com', 'Kompanion', '53788533', 'https://www.kompanionapp.com/', 'İzmir', 0, 0, 0, 1),
('Kunduz@hotmail.com', 'Kunduz', '87841221', 'https://kunduz.com/tr_tr/', 'İzmir', 1, 1, 0, 1),
('Lifemote@hotmail.com', 'Lifemote', '84146573', 'https://lifemote.com/', 'Ankara', 0, 1, 0, 1),
('Pixery@hotmail.com', 'Pixery', '85305714', 'https://www.pixerylabs.com/', 'İstanbul', 1, 0, 0, 1),
('Pointr@hotmail.com', 'Pointr', '42002491', 'https://www.pointr.tech/', 'İstanbul', 1, 0, 1, 1),
('Prisync@hotmail.com', 'Prisync', '85214321', 'https://prisync.com/', 'İstanbul', 0, 0, 0, 1),
('ProceedLabs@hotmail.com', 'Proceed Labs', '49762152', 'https://proceedlabs.com/', 'İstanbul', 1, 1, 1, 1),
('Shopier@hotmail.com', 'Shopier', '19768685', 'https://www.shopier.com/', 'İstanbul', 0, 1, 0, 1),
('Vivense@hotmail.com', 'Vivense', '79772150', 'https://www.vivense.com/', 'İstanbul', 0, 1, 1, 1),
('Wamo@hotmail.com', 'Wamo', '97178761', 'https://wamo.io/', 'Ankara', 0, 1, 1, 1),
('Zeplin@hotmail.com', 'Zeplin', '60892187', 'https://zeplin.io/about', 'San Francisco', 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sirket_talep`
--

CREATE TABLE `sirket_talep` (
  `talepID` int(11) NOT NULL,
  `sirketMail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `pozisyon` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `maxMaas` int(11) NOT NULL,
  `minTecrube` int(11) NOT NULL,
  `java` tinyint(1) NOT NULL,
  `python` tinyint(1) NOT NULL,
  `js` tinyint(1) NOT NULL,
  `c` tinyint(1) NOT NULL,
  `c_s` tinyint(1) NOT NULL,
  `c_pp` tinyint(1) NOT NULL,
  `ruby` tinyint(1) NOT NULL,
  `swift` tinyint(1) NOT NULL,
  `php` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sirket_talep`
--

INSERT INTO `sirket_talep` (`talepID`, `sirketMail`, `pozisyon`, `maxMaas`, `minTecrube`, `java`, `python`, `js`, `c`, `c_s`, `c_pp`, `ruby`, `swift`, `php`) VALUES
(1, 'Shopier@hotmail.com', 'Frontend Developer', 13000, 3, 0, 0, 1, 0, 0, 0, 0, 0, 1),
(2, 'Shopier@hotmail.com', 'Backend Developer', 13000, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(3, 'Shopier@hotmail.com', 'Full Stack Developer', 5000, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Vivense@hotmail.com', 'Backend Developer', 15000, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(5, 'Vivense@hotmail.com', 'QA/Test Engineer', 5000, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(6, 'Bundle@hotmail.com', 'Android Developer', 10000, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Bundle@hotmail.com', 'IOS Developer', 11000, 4, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(8, 'Pixery@hotmail.com', 'IOS Developer', 8000, 3, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(9, 'GamerArena@hotmail.com', 'QA/Test Engineer', 11000, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(10, 'Buybuddy@hotmail.com', 'IOS Developer', 6000, 4, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(11, 'Kompanion@hotmail.com', 'Full Stack Developer', 12000, 4, 1, 0, 0, 0, 1, 0, 0, 0, 0),
(12, 'Kompanion@hotmail.com', 'QA/Test Engineer', 9000, 4, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(13, 'Kompanion@hotmail.com', 'Android Developer', 9000, 5, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(14, 'Lifemote@hotmail.com', 'DevOps Engineer', 10000, 2, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(15, 'Pointr@hotmail.com', 'Android Developer', 7000, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(16, 'Pointr@hotmail.com', 'QA/Test Engineer', 13000, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'Wamo@hotmail.com', 'Android Developer', 11000, 4, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(18, 'Wamo@hotmail.com', 'QA/Test Engineer', 14000, 4, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(19, 'Prisync@hotmail.com', 'QA/Test Engineer', 7000, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 'FazlaGıda@hotmail.com', 'Backend Developer', 12000, 4, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(21, 'Kunduz@hotmail.com', 'Backend Developer', 9000, 2, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(22, 'Kunduz@hotmail.com', 'QA/Test Engineer', 6000, 3, 0, 1, 0, 1, 0, 0, 0, 0, 0),
(23, 'Kunduz@hotmail.com', 'DevOps Engineer', 11000, 2, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(24, 'Zeplin@hotmail.com', 'Backend Developer', 15000, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(25, 'ProceedLabs@hotmail.com', 'Full Stack Developer', 14000, 4, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 'ProceedLabs@hotmail.com', 'DevOps Engineer', 6000, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stk`
--

CREATE TABLE `stk` (
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  `sehir` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `faaliyetAlani` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `internetSitesi` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stk`
--

INSERT INTO `stk` (`mail`, `isim`, `sifre`, `sehir`, `faaliyetAlani`, `internetSitesi`) VALUES
('bilgi@hayatadestek.org', 'Hayata Destek Derneği', '51074368', 'İstanbul', 'İnsan Hakları', 'https://www.hayatadestek.org/'),
('doga@dogadernegi.org', 'Doğa Derneği', '53606635', 'İzmir', 'Doğa', 'https://www.dogadernegi.org'),
('filmmor@gmail.com', 'Filmmor', '22230063', 'İstanbul', 'Kadın Hakları', 'https://filmmor.org/'),
('info@thkd.org.tr', 'Türkiye Hayvanları Koruma Derneği', '13723563', 'İstanbul', 'Hayvan Hakları', 'https://www.thkd.org.tr/'),
('info@tog.org.tr', 'Toplum Gönüllüleri', '64931146', 'Ankara', 'Eğitim', 'https://www.tog.org.tr/'),
('merhaba@atesbocegi.org.tr', 'Ateş Böceği Derneği', '54083625', 'Denizli', 'Hayvan Hakları', 'https://www.atesbocegi.org.tr/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stk_proje`
--

CREATE TABLE `stk_proje` (
  `projeID` int(11) NOT NULL,
  `stkMail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `pozisyon` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `java` tinyint(1) NOT NULL,
  `python` tinyint(1) NOT NULL,
  `js` tinyint(1) NOT NULL,
  `c` tinyint(1) NOT NULL,
  `c_s` tinyint(1) NOT NULL,
  `c_pp` tinyint(1) NOT NULL,
  `ruby` tinyint(1) NOT NULL,
  `swift` tinyint(1) NOT NULL,
  `php` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stk_proje`
--

INSERT INTO `stk_proje` (`projeID`, `stkMail`, `pozisyon`, `java`, `python`, `js`, `c`, `c_s`, `c_pp`, `ruby`, `swift`, `php`) VALUES
(1, 'info@thkd.org.tr', 'Backend Developer', 0, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 'info@thkd.org.tr', 'Android Developer', 0, 0, 0, 0, 0, 0, 1, 0, 0),
(3, 'merhaba@atesbocegi.org.tr', 'Frontend Developer', 0, 0, 1, 0, 0, 0, 0, 0, 0),
(4, 'merhaba@atesbocegi.org.tr', 'Backend Developer', 0, 1, 0, 0, 0, 0, 0, 0, 0),
(5, 'merhaba@atesbocegi.org.tr', 'IOS Developer', 0, 0, 0, 0, 0, 0, 0, 1, 0),
(6, 'doga@dogadernegi.org', 'DevOps Engineer', 1, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'bilgi@hayatadestek.org', 'QA/Test Engineer', 0, 0, 0, 0, 0, 1, 0, 0, 0),
(8, 'bilgi@hayatadestek.org', 'Backend Developer', 0, 1, 0, 0, 0, 0, 0, 0, 0),
(9, 'filmmor@gmail.com', 'Full Stack Developer', 1, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'info@tog.org.tr', 'Frontend Developer', 0, 0, 0, 1, 1, 0, 0, 0, 0),
(11, 'info@tog.org.tr', 'Full Stack Developer', 1, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilimci`
--

CREATE TABLE `yazilimci` (
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `soyisim` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  `maas` int(11) NOT NULL,
  `sehir` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `dogumTarihi` date NOT NULL,
  `pozisyon` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `tecrube` int(11) NOT NULL,
  `java` tinyint(1) NOT NULL,
  `python` tinyint(1) NOT NULL,
  `js` tinyint(1) NOT NULL,
  `c` tinyint(1) NOT NULL,
  `c_s` tinyint(1) NOT NULL,
  `c_pp` tinyint(1) NOT NULL,
  `ruby` tinyint(1) NOT NULL,
  `swift` tinyint(1) NOT NULL,
  `php` tinyint(1) NOT NULL,
  `yemek` tinyint(1) NOT NULL,
  `egitim` tinyint(1) NOT NULL,
  `servis` tinyint(1) NOT NULL,
  `sigorta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazilimci`
--

INSERT INTO `yazilimci` (`mail`, `isim`, `soyisim`, `sifre`, `maas`, `sehir`, `dogumTarihi`, `pozisyon`, `tecrube`, `java`, `python`, `js`, `c`, `c_s`, `c_pp`, `ruby`, `swift`, `php`, `yemek`, `egitim`, `servis`, `sigorta`) VALUES
('A.Aksoy@hotmail.com', 'Ayşen', 'Aksoy', '11965096', 6000, 'ŞANLIURFA', '1997-10-18', 'IOS Developer', 7, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0),
('A.AvcıOzsoy@hotmail.com', 'Almina', 'Avcı Özsoy', '11398791', 15000, 'AFYONKARAHİSAR', '1989-05-26', 'Android Developer', 9, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1),
('A.Oz@hotmail.com', 'Aysel', 'Öz', '11009265', 12000, 'HATAY', '1974-07-02', 'IOS Developer', 4, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
('A.Sakarya@hotmail.com', 'Ayşe Saliha', 'Sakarya', '11310831', 9000, 'HATAY', '1963-04-25', 'Android Developer', 5, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 1, 0),
('B.Ozay@hotmail.com', 'Berfin Elif', 'Özay', '10935990', 7000, 'KARS', '1982-05-16', 'Android Developer', 7, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
('B.Purcu@hotmail.com', 'Bahar Merve', 'Purçu', '10328669', 6000, 'BALIKESİR', '1986-03-28', 'Android Developer', 4, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
('E.Baldo@hotmail.com', 'Ecren', 'Baldo', '11972422', 6000, 'MARDİN', '1961-10-11', 'Android Developer', 3, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0),
('F.Dundar@hotmail.com', 'Fidan', 'Dündar', '11447971', 7000, 'İSTANBUL', '1994-05-26', 'Full Stack Developer', 6, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
('G.Soker@hotmail.com', 'Gencay', 'Söker', '12053255', 10000, 'MANİSA', '1988-04-22', 'DevOps Engineer', 10, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('H.Beydag@hotmail.com', 'Halime', 'Beydağ', '11915487', 10000, 'AFYONKARAHİSAR', '1963-04-24', 'DevOps Engineer', 2, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0),
('H.Sugoturen@hotmail.com', 'Hasan Gökay', 'Sugötüren', '10575512', 6000, 'MANİSA', '1965-06-01', 'Backend Developer', 5, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1),
('I.Gulcan@hotmail.com', 'Işınbıke', 'Gülcan', '11952173', 5000, 'KIRIKKALE', '1967-11-01', 'Android Developer', 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1),
('İ.Ocar@hotmail.com', 'İsmail Egecan', 'Oçar', '12100514', 8000, 'ADIYAMAN', '1982-10-21', 'QA/Test Engineer', 4, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1),
('İ.Yerliyurt@hotmail.com', 'İlkyaz', 'Yerliyurt', '11680260', 14000, 'BİNGÖL', '1983-09-01', 'Backend Developer', 4, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1),
('K.Uz@hotmail.com', 'Kemal Tolga', 'Uz', '11231443', 10000, 'KAHRAMANMARAŞ', '1978-09-22', 'Full Stack Developer', 3, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
('L.Akkut@hotmail.com', 'Lemis', 'Akküt', '10201451', 6000, 'UŞAK', '1980-08-16', 'Android Developer', 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
('M.Kocabas@hotmail.com', 'Mehmet Han', 'Kocabaş', '12581542', 9000, 'KASTAMONU', '1989-04-17', 'DevOps Engineer', 3, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('M.Ozaydın@hotmail.com', 'Muhammet', 'Özaydın', '10379529', 14000, 'ELAZIĞ', '1993-05-06', 'DevOps Engineer', 9, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 1),
('M.Ozpolat@hotmail.com', 'Merve Nur', 'Özpolat', '10140433', 9000, 'MUŞ', '1982-08-16', 'DevOps Engineer', 4, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1),
('N.Rusan@hotmail.com', 'Nurseli', 'Ruşan', '11447761', 6000, 'ESKİŞEHİR', '1978-11-18', 'IOS Developer', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1),
('N.Saraclar@hotmail.com', 'Nesrin Gökçe', 'Saraçlar', '11855548', 12000, 'KONYA', '1984-05-25', 'DevOps Engineer', 6, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0),
('N.Yalova@hotmail.com', 'Nazım Bircan', 'Yalova', '11965760', 9000, 'BOLU', '1985-03-02', 'DevOps Engineer', 4, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1),
('Ö.Kaska@hotmail.com', 'Örsel', 'Kaşka', '12308849', 6000, 'AĞRI', '1987-01-14', 'Full Stack Developer', 3, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
('S.Candan@hotmail.com', 'Sena Nur', 'Candan', '12288343', 14000, 'KARS', '1985-03-19', 'IOS Developer', 3, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1),
('S.Kalsın@hotmail.com', 'Sezer', 'Kalsın', '12392024', 12000, 'KÜTAHYA', '1987-05-04', 'QA/Test Engineer', 6, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1),
('S.Remzi@hotmail.com', 'Simavi', 'Remzi', '10452156', 6000, 'ESKİŞEHİR', '1999-02-22', 'Full Stack Developer', 9, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1),
('S.Yıldırımer@hotmail.com', 'Selen Elif', 'Yıldırımer', '10268178', 12000, 'ISPARTA', '1966-01-05', 'Frontend Developer', 6, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1),
('Ş.Ozbir@hotmail.com', 'Şelale', 'Özbir', '12110710', 11000, 'AFYONKARAHİSAR', '1971-08-29', 'IOS Developer', 3, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1),
('T.Eryılmaz@hotmail.com', 'Tunca', 'Eryılmaz', '11206651', 10000, 'SAKARYA', '1991-05-28', 'QA/Test Engineer', 3, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1),
('Z.Aydinlioglu@hotmail.com', 'Zeynep Nihan', 'Aydınlıoğlu', '10055429', 6000, 'ELAZIĞ', '1980-09-20', 'Frontend Developer', 8, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilimci_talep`
--

CREATE TABLE `yazilimci_talep` (
  `yazilimciMail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `talepID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazilimci_talep`
--

INSERT INTO `yazilimci_talep` (`yazilimciMail`, `talepID`) VALUES
('A.Aksoy@hotmail.com', 7),
('A.AvcıOzsoy@hotmail.com', 17),
('A.Oz@hotmail.com', 7),
('A.Oz@hotmail.com', 8),
('B.Ozay@hotmail.com', 15),
('B.Purcu@hotmail.com', 13),
('F.Dundar@hotmail.com', 11),
('G.Soker@hotmail.com', 14),
('H.Beydag@hotmail.com', 26),
('H.Sugoturen@hotmail.com', 2),
('H.Sugoturen@hotmail.com', 20),
('İ.Ocar@hotmail.com', 9),
('İ.Ocar@hotmail.com', 16),
('İ.Ocar@hotmail.com', 19),
('İ.Yerliyurt@hotmail.com', 4),
('İ.Yerliyurt@hotmail.com', 20),
('İ.Yerliyurt@hotmail.com', 21),
('İ.Yerliyurt@hotmail.com', 24),
('K.Uz@hotmail.com', 3),
('L.Akkut@hotmail.com', 6),
('M.Kocabas@hotmail.com', 14),
('M.Ozaydın@hotmail.com', 23),
('Ö.Kaska@hotmail.com', 11),
('S.Candan@hotmail.com', 10),
('S.Kalsın@hotmail.com', 9),
('S.Kalsın@hotmail.com', 12),
('S.Remzi@hotmail.com', 3),
('S.Yıldırımer@hotmail.com', 1),
('T.Eryılmaz@hotmail.com', 5),
('T.Eryılmaz@hotmail.com', 9),
('T.Eryılmaz@hotmail.com', 18),
('Z.Aydinlioglu@hotmail.com', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `gonullu_proje`
--
ALTER TABLE `gonullu_proje`
  ADD KEY `gonulluMail` (`gonulluMail`,`projeID`),
  ADD KEY `projeID` (`projeID`);

--
-- Tablo için indeksler `sirket`
--
ALTER TABLE `sirket`
  ADD PRIMARY KEY (`mail`);

--
-- Tablo için indeksler `sirket_talep`
--
ALTER TABLE `sirket_talep`
  ADD PRIMARY KEY (`talepID`),
  ADD KEY `sirketMail` (`sirketMail`);

--
-- Tablo için indeksler `stk`
--
ALTER TABLE `stk`
  ADD PRIMARY KEY (`mail`);

--
-- Tablo için indeksler `stk_proje`
--
ALTER TABLE `stk_proje`
  ADD PRIMARY KEY (`projeID`),
  ADD KEY `stkMail` (`stkMail`);

--
-- Tablo için indeksler `yazilimci`
--
ALTER TABLE `yazilimci`
  ADD PRIMARY KEY (`mail`);

--
-- Tablo için indeksler `yazilimci_talep`
--
ALTER TABLE `yazilimci_talep`
  ADD KEY `yazilimciMail` (`yazilimciMail`,`talepID`),
  ADD KEY `talepID` (`talepID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `sirket_talep`
--
ALTER TABLE `sirket_talep`
  MODIFY `talepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `stk_proje`
--
ALTER TABLE `stk_proje`
  MODIFY `projeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `gonullu_proje`
--
ALTER TABLE `gonullu_proje`
  ADD CONSTRAINT `gonullu_proje_ibfk_1` FOREIGN KEY (`projeID`) REFERENCES `stk_proje` (`projeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gonullu_proje_ibfk_2` FOREIGN KEY (`gonulluMail`) REFERENCES `yazilimci` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sirket_talep`
--
ALTER TABLE `sirket_talep`
  ADD CONSTRAINT `sirket_talep_ibfk_1` FOREIGN KEY (`sirketMail`) REFERENCES `sirket` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `stk_proje`
--
ALTER TABLE `stk_proje`
  ADD CONSTRAINT `stk_proje_ibfk_1` FOREIGN KEY (`stkMail`) REFERENCES `stk` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `yazilimci_talep`
--
ALTER TABLE `yazilimci_talep`
  ADD CONSTRAINT `yazilimci_talep_ibfk_1` FOREIGN KEY (`talepID`) REFERENCES `sirket_talep` (`talepID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `yazilimci_talep_ibfk_2` FOREIGN KEY (`yazilimciMail`) REFERENCES `yazilimci` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
