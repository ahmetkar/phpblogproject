-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Ağu 2015, 20:05:09
-- Sunucu sürümü: 5.6.25
-- PHP Sürümü: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yeni`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `kimlik` int(11) NOT NULL,
  `kadi` varchar(80) NOT NULL,
  `sifre` varchar(80) NOT NULL,
  `adsoyad` varchar(90) NOT NULL,
  `resimurl` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `administrator`
--

INSERT INTO `administrator` (`kimlik`, `kadi`, `sifre`, `adsoyad`, `resimurl`) VALUES
(10, 'yonetici', 'dfb2b1f0a793c3ec95c47bbc5521a99e', 'Ad ve soyad girilmedi', '876678none.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arkadaslarim`
--

CREATE TABLE IF NOT EXISTS `arkadaslarim` (
  `id` int(11) NOT NULL,
  `isim` varchar(120) NOT NULL,
  `siteurl` varchar(160) NOT NULL,
  `resim` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `arkadaslarim`
--

INSERT INTO `arkadaslarim` (`id`, `isim`, `siteurl`, `resim`) VALUES
(1, 'Ahmet kar', 'http://www.eamm.esy.es', 'work5.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimda`
--

CREATE TABLE IF NOT EXISTS `hakkimda` (
  `id` int(11) NOT NULL,
  `baslik` varchar(180) NOT NULL,
  `metin` text NOT NULL,
  `ustresim` varchar(180) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `hakkimda`
--

INSERT INTO `hakkimda` (`id`, `baslik`, `metin`, `ustresim`) VALUES
(1, 'Hakkımda bilgi', '<p>Hakkımda metni budur burayı admin panelinden d&uuml;zenleyebilirsiniz...&nbsp;Curabitur dapibus pretium leo, at laoreet magna ullamcorper ac. Integer quam nulla, fringilla ac imperdiet at, consequat vel leo. Quisque non semper justo, eu aliquam velit. Pellentesque rhoncus, quam ac fringilla euismod, ligula diam congue orci, id cursus dui velit quis ligula. Nulla nec pellentesque tempus, ipsum arcu aliquam tortor. vel tempus libero diam vel arcu. Etiam id tincidunt tortor. Nam auctor consequat quam, vel mattis dui laoreet a. Nunc condimentum iaculis tortor, id eleifend nulla mattis lobortis. Pellentesque semper blandit odio, id tempor lorem imperdiet eu. Ut sagittis sagittis consectetur ,Maecenas eget risus eros. Nunc venenatis ante a rutrum cursus. Quisque non semper justo Commodo at blandit vitae, placerat in sem. Morbi ornare nec felis in euismod. Suspendisse vulputate orci ultrices enim facilisis, vel lobortis magna rhoncus. Integer mattis at elit vitae adipiscing. Cras imperdiet cursus nunc quis ullamcorper. vel tempus libero diam vel arcu. Etiam id tincidunt tortor. Nam auctor consequat quam, vel mattis dui laoreet a. Nunc condimentum iaculis tortor, id eleifend nulla mattis lobortis. Pellentesque semper blandit odio, id tempor lorem imperdiet eu. Ut sagittis sagittis consectetur ,Maecenas eget risus eros. Nunc venenatis ante a rutrum cursus. Commodo at blandit vitae, placerat in sem. Morbi ornare nec felis in euismod. Suspendisse vulputate orci ultrices enim facilisis, vel lobortis magna rhoncus. Integer mattis at elit vitae adipiscing. Cras imperdiet cursus nunc quis ullamcorper.</p>\r\n', '29357910work6.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE IF NOT EXISTS `iletisim` (
  `id` int(11) NOT NULL,
  `baslik` varchar(120) NOT NULL,
  `adsoyad` varchar(80) NOT NULL,
  `email` varchar(90) NOT NULL,
  `metin` text NOT NULL,
  `tarih` varchar(190) NOT NULL,
  `ipadres` varchar(100) NOT NULL,
  `tarayici` varchar(350) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `baslik`, `adsoyad`, `email`, `metin`, `tarih`, `ipadres`, `tarayici`) VALUES
(1, 'Herhangi bir konu', 'ahmet kar', 'mg_ahmet@hotmail.com', 'Yeni bir mesaj gönderdim işte bende sende bunu cevapla !', '15.08.2015', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36'),
(2, 'Son deme', 'Ali arıkan', 'mg_ali@gmail.com', 'Yeni bir mesaj olsun buda işte sanaa', '15.08.2015', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `katagori`
--

CREATE TABLE IF NOT EXISTS `katagori` (
  `id` int(11) NOT NULL,
  `katagoriad` varchar(100) NOT NULL,
  `aciklama` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `katagori`
--

INSERT INTO `katagori` (`id`, `katagoriad`, `aciklama`) VALUES
(1, 'Genel', 'Genel katagori'),
(2, 'Gündem', 'Gündem katagorisi'),
(3, 'Şahsiyetler', 'şahsiyetler,insanlar,kişilikler,magnetic');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notislem`
--

CREATE TABLE IF NOT EXISTS `notislem` (
  `id` int(11) NOT NULL,
  `yaziid` int(11) NOT NULL,
  `begeni` int(11) NOT NULL DEFAULT '0',
  `diss` int(11) NOT NULL DEFAULT '0',
  `ipadres` varchar(180) NOT NULL,
  `tarih` varchar(180) NOT NULL,
  `tarayici` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notlar`
--

CREATE TABLE IF NOT EXISTS `notlar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(150) NOT NULL,
  `metin` text NOT NULL,
  `tarih` varchar(170) NOT NULL,
  `etiketler` varchar(250) NOT NULL,
  `aciklama` varchar(350) NOT NULL,
  `yazarid` int(11) NOT NULL,
  `resimurl` varchar(150) NOT NULL,
  `katagori` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `notlar`
--

INSERT INTO `notlar` (`id`, `baslik`, `metin`, `tarih`, `etiketler`, `aciklama`, `yazarid`, `resimurl`, `katagori`) VALUES
(1, 'Merhaba dünya', '<p>Lorem Ipsum, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.Yaygın inancın tersine, Lorem Ipsum rastgele s&ouml;zc&uuml;klerden oluşmaz. K&ouml;kleri M.&Ouml;. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir ge&ccedil;mişi vardır. Virginia&#39;daki Hampden-Sydney College&#39;dan Latince profes&ouml;r&uuml; Richard McClintock, bir Lorem Ipsum pasajında ge&ccedil;en ve anlaşılması en g&uuml;&ccedil; s&ouml;zc&uuml;klerden biri olan &#39;consectetur&#39; s&ouml;zc&uuml;ğ&uuml;n&uuml;n klasik edebiyattaki &ouml;rneklerini incelediğinde kesin bir kaynağa ulaşmıştır. Lorm Ipsum, &Ccedil;i&ccedil;ero tarafından M.&Ouml;. 45 tarihinde kaleme alınan &quot;de Finibus Bonorum et Malorum&quot; (İyi ve K&ouml;t&uuml;n&uuml;n U&ccedil; Sınırları) eserinin 1.10.32 ve 1.10.33 sayılı b&ouml;l&uuml;mlerinden gelmektedir. Bu kitap, ahlak kuramı &uuml;zerine bir tezdir ve R&ouml;nesans d&ouml;neminde &ccedil;ok pop&uuml;ler olmuştur. Lorem Ipsum pasajının ilk satırı olan &quot;Lorem ipsum dolor sit amet&quot; 1.10.32 sayılı b&ouml;l&uuml;mdeki bir satırdan gelmektedir. 1500&#39;lerden beri kullanılmakta olan standard Lorem Ipsum metinleri ilgilenenler i&ccedil;in yeniden &uuml;retilmiştir. &Ccedil;i&ccedil;ero tarafından yazılan 1.10.32 ve 1.10.33 b&ouml;l&uuml;mleri de 1914 H. Rackham &ccedil;evirisinden alınan İngilizce s&uuml;r&uuml;mleri eşliğinde &ouml;zg&uuml;n bi&ccedil;iminden yeniden &uuml;retilmiştir.</p>\r\n\r\n<p><img alt="" src="http://i1.wp.com/anarschi.com/dosyalar/at-the-beach-hd-wallpaper-1440x900.jpeg" style="height:188px; width:300px" /></p>\r\n', '15.08.2015', 'yazi,yeni,deneme,merhaba dünya', 'Deneme,yazi,deneme,keywords', 1, '8785095work1.jpg', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sitebilgi`
--

CREATE TABLE IF NOT EXISTS `sitebilgi` (
  `id` int(11) NOT NULL,
  `sitebaslik` varchar(120) NOT NULL,
  `fburl` varchar(300) NOT NULL,
  `behanceurl` varchar(300) NOT NULL,
  `logourl` varchar(230) NOT NULL,
  `siteaciklama` varchar(400) NOT NULL,
  `etiketler` varchar(500) NOT NULL,
  `title` varchar(150) NOT NULL,
  `googleurl` varchar(150) NOT NULL,
  `copyright` varchar(300) NOT NULL,
  `dizin` varchar(80) DEFAULT NULL,
  `kurulum` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `sitebilgi`
--

INSERT INTO `sitebilgi` (`id`, `sitebaslik`, `fburl`, `behanceurl`, `logourl`, `siteaciklama`, `etiketler`, `title`, `googleurl`, `copyright`, `dizin`, `kurulum`) VALUES
(5, 'Magnetik kişisel blog scripti', 'www.facebook.com', 'www.behance.com', 'logo.png', 'Magnetik scripti kişsel blog scriptidir.Panele siteniz.com/panelden ulaşabilirsiniz.', 'magnetik,scripti,buraya,etiket,giriniz', 'Magnetik kişisel blog scripti', 'www.google.com', 'Bu bir eamm yapımıdır. |Back-end kodlama : Ahmet kar | Lütfen bu telif hakkını silmeyiniz..', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE IF NOT EXISTS `yorumlar` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `yorum` varchar(500) NOT NULL,
  `yaziid` int(11) NOT NULL,
  `ipadres` varchar(160) NOT NULL,
  `tarayici` varchar(240) NOT NULL,
  `tarih` varchar(280) NOT NULL,
  `onay` int(11) NOT NULL DEFAULT '0',
  `admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `adsoyad`, `email`, `yorum`, `yaziid`, `ipadres`, `tarayici`, `tarih`, `onay`, `admin`) VALUES
(2, 'Mehmet öz', 'mg_ali@gmail.com.tr', 'Merhaba arkadaşlar buda ikinci yorum', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', '16.08.2015', 0, ''),
(3, '', 'yeni@gmail.com', 'Merhaba ben admin buda yeni bir yorum', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', '16.08.2015', 1, 'yestoall');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`kimlik`);

--
-- Tablo için indeksler `arkadaslarim`
--
ALTER TABLE `arkadaslarim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimda`
--
ALTER TABLE `hakkimda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `katagori`
--
ALTER TABLE `katagori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notislem`
--
ALTER TABLE `notislem`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notlar`
--
ALTER TABLE `notlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sitebilgi`
--
ALTER TABLE `sitebilgi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arkadaslarim`
--
ALTER TABLE `arkadaslarim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `hakkimda`
--
ALTER TABLE `hakkimda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `katagori`
--
ALTER TABLE `katagori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `notislem`
--
ALTER TABLE `notislem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `notlar`
--
ALTER TABLE `notlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `sitebilgi`
--
ALTER TABLE `sitebilgi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
