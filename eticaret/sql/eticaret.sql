-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 May 2021, 20:52:17
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(10) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_url` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_faks` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twiter` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_instagram` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_bakin` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_url`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_il`, `ayar_ilce`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twiter`, `ayar_youtube`, `ayar_instagram`, `ayar_google`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakin`) VALUES
(0, 'dimg/31287logo.png', 'http://www.joyakedemi.com/', 'Halil Şarküteri |', 'Halil Şarküteri- Peynir - Bal', 'Peynir Bal ', 'Halil', '0850 850 85 00', '0850 850 85 00', '0850 850 85 00', 'mail@mail.com', 'Tokat', 'Merkez', 'Adress Bilgileri Girilmedi Şuanda', 'Mesai Saatleri Belirtilmedi Henüz', 'ayar_maps_api', 'ayar_analystic_apiii', 'ayar_zopim_api', 'www.facebook.com', 'www.twiter.com', 'www.youtube.com', 'www.instagram.com', 'www.google.com', 'mail.alanadiniz.com', 'usersname', 'password', '587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `banka_id` int(11) NOT NULL,
  `banka_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_iban` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_hesapadsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `banka`
--

INSERT INTO `banka` (`banka_id`, `banka_ad`, `banka_iban`, `banka_hesapadsoyad`, `banka_durum`) VALUES
(6, 'Ziraat Bankası', 'TR4676554646765', 'Halil Börekçi', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_video` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_vizyon` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_misyon` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'Halil Şarküteri Hakkımızda', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'CFoRHzbp420', 'Halil Şarküteri İle ilgili Vizyon İçerisi Gelecek', 'Halil Şarküteri İle ilgili Misyonİçerisi Gelecek');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_ust` int(2) NOT NULL,
  `kategori_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_sira` int(2) NOT NULL,
  `kategori_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_ust`, `kategori_seourl`, `kategori_sira`, `kategori_durum`) VALUES
(1, 'Bal', 0, 'bal', 0, '1'),
(2, 'Peynir', 1, 'peynir', 1, '1'),
(3, 'Bakliyat', 0, 'bakliyat', 2, '1'),
(4, 'Temel Gıda', 0, 'temel-gida', 3, '1'),
(5, 'Konserve', 0, 'konserve', 4, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT current_timestamp(),
  `kullanici_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tc` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_unvan` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_resim`, `kullanici_tc`, `kullanici_ad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`) VALUES
(1, '2020-04-12 21:31:41', 'Resim', '2631221', 'Halit', 'halit44e44@gmail.com', '0546297', 'bf562f7f3d0141e5d26fc7c106a248e3', 'Haho', 'Tecde Mahallsi', 'Malatya', 'Yeşilyurt', 'Computer Enginery', '5', 1),
(23, '2021-04-30 22:37:37', '', '', '', 'deneme@deneme.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'Deneme', '', '', '', '', '1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `menu_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(1, '0', 'Hakimizda', '', 'hakkimizda.php', 3, '1', 'hakimizda'),
(3, '0', 'Kategoriler', '', 'kategoriler', 2, '1', 'kategoriler'),
(12, '', 'İletisim', '<p>SUSTeK COMPUTER INC. ve bağlı kuruluşları (buradan itibaren &ldquo;ASUS&rdquo;,&nbsp;&ldquo;biz/bizim/bize/tarafımız&rdquo; olarak anılacaktır) kişisel gizliliğinize saygı g&ouml;stermeye ve onu korumaya kararlıdır. Gizliliğin korunması ve kişisel bilgilerin g&uuml;venliği alanındaki ilgili t&uuml;m mevzuata uymak i&ccedil;in &ccedil;aba g&ouml;steriyoruz. ASUS Gizlilik Koşulları ve kullanmakta olduğunuz hizmetler &ouml;zelinde ek bilgi i&ccedil;eren her t&uuml;rl&uuml; ek şart ve h&uuml;k&uuml;mle birlikte (buradan itibaren &ldquo;Gizlilik Koşulları&rdquo; olarak anılacaktır) ASUS internet siteleri, cihazları, uygulamaları ve hizmetleri &uuml;zerinden gerek internet &uuml;st&uuml;nden gerekse internet bağlantısı olmadan toplanan kişisel bilgilerinizin toplanması, kullanımı ve korunması ile ilgili mahremiyet uygulamalarımızın ve toplanan bilgileri kimlerle paylaşabileceğimiz veya kimlere a&ccedil;ıklayabileceğimizin &ccedil;er&ccedil;evesini &ccedil;izmekteyiz.</p>\r\n\r\n<p>Eğer bir &ccedil;ocuksanız, ASUS &uuml;r&uuml;nlerini ve hizmetlerini, ebeveynleriniz (ya da vasiniz) Gizlilik Koşullarımızı okuyup kabul ettikten ve ASUS&rsquo;a kişisel verilerinizi sağlamayı kabul ettikten sonra kullanmalısınız.</p>\r\n\r\n<p>1.&nbsp;ASUS&rsquo;un topladığı veriler ve ASUS&rsquo;un bu verileri kullanım şekli</p>\r\n\r\n<p>Bu paragraf, ASUS tarafından hangi t&uuml;rdeki verilerinizin toplanabileceğini ve ASUS&rsquo;un bu verileri ASUS &uuml;r&uuml;n ve hizmetleri yoluyla nasıl kullanacağını anlatır.</p>\r\n\r\n<p>ASUS &uuml;r&uuml;n ve hizmetlerini (&ouml;rneğin ASUS bilgisayarları,yazılımları, resm&icirc; web sayfamız ve m&uuml;şteri hizmetleri) kullanmak istediğinizde sizden belirli bilgiler almamız gerekebilir.</p>\r\n\r\n<p>Aşağıdakiler, ASUS&rsquo;un toplayabileceği kişisel verilerin ve ASUS&rsquo;un bu verileri nasıl kullanabileceği konusunda bir genel bakış sunar. Şunu unutmayın ki kişisel verilerinizin sadece belli başlı kısımlarını, kullanmakta olduğunuz ASUS &uuml;r&uuml;n ve hizmetlerini baz alarak belli ama&ccedil;lar i&ccedil;in toplamaktayız. Ayrıca toplanan kişisel verilerin belli kısımlarının, &uuml;r&uuml;n ve hizmetlerin doğasından kaynaklandığını da belirtmek isteriz. Dahası, bazı &uuml;lkelerde &ccedil;ocukların kişisel verilerini yanlışlıkla toplamak ve kullanmaktan ka&ccedil;ınmak i&ccedil;in, ek olarak yaşınızı veya ebeveynlerinizin (ya da vasinizin) iletişim bilgilerini sağlamanız gerekebilir, bu sayede ebeveynlerinizden (ya davasinizden) izin alabiliriz. Buna ek olarak ASUS &uuml;r&uuml;n ve hizmetlerini kullanırken, sizi direkt veya dolaylı olarak tanımlayabilecek aşağıdaki anonim verileri toplayabiliriz.</p>\r\n\r\n<p>ASUS &uuml;r&uuml;n ve hizmetlerini kullanırken, bizim isteğimize dayalı olarak kişisel verilerinizi sağlamak zorunda değilsiniz. Ancak kişisel verilerinizi ASUS&rsquo;a sağlamamayı se&ccedil;erseniz, bahsi ge&ccedil;en ASUS &uuml;r&uuml;n ve servislerini sağlayamayabilir ya da isteklerinize cevap veremeyebiliriz.</p>\r\n\r\n<p>1.1 ASUS&rsquo;un topladığı kişisel veriler</p>\r\n\r\n<p>Kişisel veri, adınız, e-posta adresiniz ve IP adresinizgibi sizi direkt veya dolaylı yoldan tanımlayabilecek herhangi bir veri anlamına gelir. ASUS, ilk verdiğiniz izinle birlikte aşağıdaki kişisel verileri toplayabilir:</p>\r\n\r\n<p>(1)&nbsp;ASUS &Uuml;ye hesabına kayıt olurken sağladığınız, i&ccedil;inde e-posta adresiniz, &uuml;lke/b&ouml;lgeniz ve yaşınız (sadece bazı &uuml;lkelerde istenmektedir) bulunan doğru, şu anki ve tam kayıt verileriniz. Eğer ASUS &Uuml;ye hesabına kayıt olmak i&ccedil;in sosyal medya hesabınızı (&ouml;rnek olarak Facebook veyaGoogle hesabınızı) kullandıysanız, sosyal medya sağlayıcınız (&ouml;rnek olarak Facebook Inc. veya Google Inc.), sosyal medya hesabınızda bulunan kişisel verilerinizi (&ouml;rnek olarak e-posta adresi, isim, rumuz ve doğum tarihi)izninize dayalı olarak paylaşabilir.<br />\r\n<br />\r\nDahası, ASUS &Uuml;ye hesabınıza giriş yaptığınızda, ASUS &Uuml;ye hesabınızı d&uuml;zenlemek i&ccedil;in (&ouml;rnek olarak fotoğrafınız, cinsiyetiniz, adresiniz ve mesleğiniz) ya da ASUS &Uuml;ye hesabınızla ilgili ASUS &uuml;r&uuml;n ve hizmetlerinin keyfini &ccedil;ıkarmak i&ccedil;in(&ouml;rnek olarak ASUS &uuml;r&uuml;n kaydı i&ccedil;in &uuml;r&uuml;n seri numaranız, kişisel verilerinizi barındırabilecek ASUS&rsquo;un forumlarına y&uuml;klenmiş makale veya resimler) ek kişisel verilerinizi sağlayabilirsiniz.</p>\r\n\r\n<p>(2)&nbsp;&Uuml;r&uuml;nlerimizi satın aldığınızda (&ouml;rnek olarak ASUS Store &uuml;zerinden ASUS &uuml;r&uuml;nleri satın aldığınızda) veya paralı hizmetlerimizi kullandığınızda isminiz, posta/kargo/fatura adresiniz (posta kodunuz dahil),iletişim bilgileriniz, e-posta adresiniz, kredi kartı numaranız veya diğer &ouml;deme servisi bilgileriniz. Yukarıdaki kişisel verilere ek olarak &uuml;r&uuml;n verileriniz (&ouml;rnek olarak &uuml;r&uuml;n seri numaranız, IMEI numaranız) de belirli m&uuml;şteri hizmetleri i&ccedil;in (&ouml;rnek olarak &uuml;r&uuml;n tamir hizmeti) toplanabilir.</p>\r\n\r\n<p>(3)&nbsp;Etkinlik veya promosyonlarımıza katıldığınızda isminiz,iletişim bilgileriniz, e-posta adresiniz, cinsiyetiniz, doğum tarihiniz, &uuml;r&uuml;n bilgileriniz (&ouml;rnek olarak &uuml;r&uuml;n seri numarası, IMEI numarası) ve faturanızın bir kopyası (bazı &uuml;lkelerde isminiz, adresiniz ve diğer kişisel verileriniz faturanızda yer alabilir). Kişisel verilerinizden toplananlar, etkinliğe veya promosyona g&ouml;re değişiklik g&ouml;sterebilir. Dahası, eğer etkinlik veya promosyonumuzun kazananı olursanız, ek olarak posta/kargo adresiniz (posta kodunuz dahil) ve vergi bilgilendirmesi i&ccedil;in kişisel verilerinizi (&ouml;rnek olarak ikamet adresiniz, kimlik veya pasaport numaranız veya kopyası) sağlamanız gerekebilir.<br />\r\n<br />\r\nYukarıdaki kişisel verilere ek olarak, para iadesi etkinliğimize katıldığınızda banka hesabı bilgilerinizi de sağlamanız gerekebilir.</p>\r\n\r\n<p>(4)&nbsp;Sağlık ama&ccedil;lı &uuml;r&uuml;n ve hizmetlerimizi kullandığınız zaman; yaşınız, cinsiyetiniz, boyunuz, ağırlığınız, v&uuml;cut sıcaklığınız, kalp atış oranınız, tansiyonunuz, hareketleriniz gibi verilerin yansıra, attığınız adımsayısı, yaktığınız kalori, uyku d&uuml;zeniniz ve g&uuml;nl&uuml;k kayıtlarınız toplanır.</p>\r\n\r\n<p>(5)&nbsp;&Uuml;r&uuml;n seri numarası, IP adresi, MAC adresi, IMEI numarası,Android ID numarası ve diğer benzersiz &uuml;r&uuml;n belirleyiciler de ASUS &uuml;r&uuml;nlerini kullandığınızda toplanabilir.</p>\r\n\r\n<p>(6)&nbsp;GPS sinyali, veri belirleyici yakındaki Kablosuz erişim noktaları ve baz istasyonu, &uuml;lke, şehir, zaman dilimi, enlem, boylam, y&uuml;kseklik ve &uuml;r&uuml;n&uuml;n&uuml;z&uuml;n yer aldığı koordinatlar, &uuml;r&uuml;n&uuml;n&uuml;z&uuml;n hareket hızı, &uuml;r&uuml;n&uuml;n &uuml;z&uuml;zerindeki &uuml;lke ve dil bilgileri gibi ASUS &uuml;r&uuml;n ve hizmetleriyle sağlanmış yerbilgileriniz.</p>\r\n\r\n<p>(7)&nbsp;ASUS&rsquo;la iletişime ge&ccedil;tiğinizde sağlanan sesiniz, videonuz ve iletişim kayıtlarınız (&ouml;rnek olarak ASUS m&uuml;şteri hizmetlerini aramak, ASUS &ccedil;evrimi&ccedil;i m&uuml;şteri hizmet portalını kullanarak ASUS ile sohbet etmek, ASUS resmi web sayfasındaki &ccedil;evrimi&ccedil;i başvuru formunu doldurmak ve ASUS&rsquo;a e-posta g&ouml;ndermek). Bunlara ek olarak ASUS Royal Club yetkili servisleri ve ASUS ofislerinizi ziyaret ettiğinizde, g&uuml;venlik kameraları ile g&ouml;r&uuml;nt&uuml;n&uuml;z&uuml; kaydedebiliriz. Bununla birlikte robotlarla ilgili &uuml;r&uuml;n ve hizmetlerimizi kullanarak, sesli komutlarınızı veya ev ortamınızın g&ouml;r&uuml;nt&uuml;s&uuml;n&uuml; barındıran video kaydınızı toplayabiliriz. Yukarıdaki ses, video ve iletişim kayıtları,kişisel verilerinizi barındırabilir.</p>\r\n\r\n<p>1.2 ASUS Kişisel Verilerinizi Nasıl Kullanır?</p>\r\n\r\n<p>Topladığımız bilgileri aşağıdaki ama&ccedil;larla kullanabiliriz;</p>\r\n\r\n<p>(1)&nbsp;HİZMETİ değerlendirmek ve geliştirmek.</p>\r\n\r\n<p>(2)&nbsp;M&uuml;şterilerden geri bildirim almak ve yeni hizmet ve cihazların geliştirilmesi ve değerlendirilmesi amacıyla kullanıcı deneyimini analiz etmek.</p>\r\n\r\n<p>(3)&nbsp;ASUS &Uuml;ye hesabı kayıt işlemini tamamlamak ve ASUS &Uuml;ye hesabınızla ilişkili ASUS &uuml;r&uuml;n ve hizmetlerini deneyimlemek i&ccedil;in (&ouml;rnek olarak &uuml;r&uuml;n kaydı ve ASUS forumlarının hizmetleri)</p>\r\n\r\n<p>(4)&nbsp;Alım faturası veya alım belgesi vermek amacıyla alımlarlailgili bilgi ve belge sağlamak da d&acirc;hil olmak &uuml;zere tarafınızca yapılan hert&uuml;rl&uuml; talebi karşılamak ve yerine getirmek; yazılım g&uuml;ncellemesi ve teknik bildirimler yapmak.</p>\r\n\r\n<p>(5)&nbsp;ASUS eDMs veya sizi ASUS ile ilgili en son haberler, promosyonlarve yakın tarihli etkinlikler gibi g&uuml;ncel konularda bilgilendirmeye y&ouml;nelik b&uuml;ltenler de d&acirc;hil olmak &uuml;zere kayıt olduğunuz t&uuml;m abonelikleri işleme koyup uygulamak. Dilediğiniz zaman hi&ccedil;bir &uuml;cret &ouml;demeden bu abonelikleri sonlandırabilirsiniz.</p>\r\n\r\n<p>(6)&nbsp;Size şart, koşul ve politikalarımızla ilgilideğişiklikler hakkında &ouml;nemli bilgilendirmeleri iletmek. Taşıdığı &ouml;nemden &ouml;t&uuml;r&uuml;bu t&uuml;r iletişimleri almaktan vazge&ccedil;menize olanak tanınmamaktadır.</p>\r\n\r\n<p>(7)&nbsp;Kimliğinizi doğrulamak, etkinlik veya promosyon giriş ve &ouml;d&uuml;llerini g&ouml;ndermek, etkinlik veya promosyon ile ilgili konularda sizinle iletişime ge&ccedil;mek, para iadesi izni sağlamak, etkinlik ve yarışmalarımıza katıldığınızda ihtiya&ccedil; halinde vergi bilgileri bildirmek, sigorta hizmeti sunmak ve shuttle hizmetleri sunmak ama&ccedil;lı.</p>\r\n\r\n<p>(8)&nbsp;V&uuml;cut verileriniz de dahil olmak &uuml;zere verilerinizikaydetme, analiz etme, değiştirme ve depolama konusunda yardımcı olmak i&ccedil;in,g&uuml;nl&uuml;k aktiviteleriniz ve aktivite sonu&ccedil;larınız yukarıdaki veriler &uuml;zerinden hesaplanmaktadır. Ayrıca bu veriyi aileniz, bakıcılar ve sağlık profesyonelleriyle paylaştığınızda, veriyi d&uuml;zenleme ve erişim konusunda size destek sağlayacağız.</p>\r\n\r\n<p>(9)&nbsp;Size m&uuml;şteri destek hizmetleri sağlamak i&ccedil;in (&ouml;rnek olarak &uuml;r&uuml;n tamir isteklerinizi yerine getirmek ve sorularınıza cevap vermek),m&uuml;şteri hizmetlerimiz ve kullanıcı deneyim analizi i&ccedil;in m&uuml;şteri memnuniyet anketimiz, haklarınızı korumak ve erişim kontrol&uuml; sağlamak i&ccedil;in ASUS&rsquo;la iletişime ge&ccedil;tiğinizde veya ASUS Royal Club tamir istasyonları ve ASUS ofislerini ziyaret ettiğinizde ses, video ve iletişim kayıtlarınızı toplayabiliriz. Buna ek olarak ASUS robotu ile ilgili &uuml;r&uuml;n ve hizmetlerde yardımcı olması i&ccedil;in ses ve video kayıtlarınızı toplayabiliriz.</p>\r\n\r\n<p>(10)&nbsp;Size kişiselleştirilmiş pazarlama hizmetleri,&ouml;rnek olarak ilginizi &ccedil;ekeceğine inandığımız pazarlama iletişimi ve reklamları size sunmak i&ccedil;in &uuml;&ccedil;&uuml;nc&uuml; parti reklam &ccedil;erezleri kullanmak gibi, ASUS &uuml;r&uuml;n ve hizmetlerini kullanımınızı baz alan hizmet &ouml;nerileri sunabiliriz.</p>\r\n', 'iletisim.php', 25, '1', 'iletisim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `sepet_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`sepet_id`, `kullanici_id`, `urun_id`, `urun_adet`) VALUES
(7, 0, 5, 1),
(8, 0, 24, 1),
(9, 22, 23, 1),
(10, 22, 21, 1),
(11, 23, 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `siparis_no` int(11) DEFAULT NULL,
  `kullanici_id` int(11) NOT NULL,
  `siparis_toplam` float(9,2) NOT NULL,
  `siparis_tip` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `siparis_banka` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `siparis_odeme` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_zaman`, `siparis_no`, `kullanici_id`, `siparis_toplam`, `siparis_tip`, `siparis_banka`, `siparis_odeme`) VALUES
(7001, '2020-05-01 22:15:27', NULL, 22, 500.00, 'Banka Havalesi', 'Ziraat Bankası', '0'),
(7002, '2020-05-01 23:19:23', NULL, 22, 60.00, 'Banka Havalesi', 'Garanti BankasıII', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_detay`
--

CREATE TABLE `siparis_detay` (
  `siparisdetay_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_adet` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis_detay`
--

INSERT INTO `siparis_detay` (`siparisdetay_id`, `siparis_id`, `urun_id`, `urun_fiyat`, `urun_adet`) VALUES
(1, 7001, 14, 60.00, 1),
(2, 7001, 15, 60.00, 1),
(3, 7001, 10, 80.00, 1),
(4, 7001, 5, 150.00, 2),
(5, 7002, 14, 60.00, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `slider_resimyol` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_sira`, `slider_link`, `slider_durum`) VALUES
(15, 'Peynir', 'dimg/slider/282972390630636225706.jpg', 1, 'www.google.com', '1'),
(16, 'Süzme Bal', 'dimg/slider/251452262730761245892.png', 2, '', '1'),
(17, 'Kara Kovan Bal', 'dimg/slider/206102164731045254173.png', 3, '', '1'),
(18, 'Toprak Bal', 'dimg/slider/208252486922905238924.png', 4, '', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `urun_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_video` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `urun_keyword` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `urun_onecikar` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kategori_id`, `urun_zaman`, `urun_ad`, `urun_seourl`, `urun_detay`, `urun_fiyat`, `urun_video`, `urun_keyword`, `urun_stok`, `urun_durum`, `urun_onecikar`) VALUES
(3, 1, '2020-04-23 16:53:16', 'Lor Peyniri', 'lor-peyniri', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 25.00, '', 'peynir', 100, '1', '1'),
(26, 1, '2020-06-17 22:48:43', 'Süzme Bal', 'suzme-bal', '<p>Lorem Ipsum, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n', 80.00, '', 'suzmebal', 25, '1', '1'),
(27, 3, '2020-06-17 22:51:49', 'Konserve', 'konserve', '<p>Lorem Ipsum, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n', 75.00, '', 'Konserve', 63, '1', '1'),
(28, 4, '2020-06-17 22:53:57', 'Nohut', 'nohut', '<p>Lorem Ipsum, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n', 100.00, '', 'Toprak Kovan Bal', 20, '1', '1'),
(29, 5, '2020-06-17 22:54:46', 'Konserve', 'konserve', '<p>Lorem Ipsum, dizgi ve baskı end&uuml;strisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak &uuml;zere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri end&uuml;stri standardı sahte metinler olarak kullanılmıştır. Beşy&uuml;z yıl boyunca varlığını s&uuml;rd&uuml;rmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sı&ccedil;ramıştır. 1960&#39;larda Lorem Ipsum pasajları da i&ccedil;eren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s&uuml;r&uuml;mleri i&ccedil;eren masa&uuml;st&uuml; yayıncılık yazılımları ile pop&uuml;ler olmuştur.</p>\r\n', 50.00, '', 'konserve', 360, '1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunfoto`
--

CREATE TABLE `urunfoto` (
  `urunfoto_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urunfoto_resimyol` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urunfoto_sira` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunfoto`
--

INSERT INTO `urunfoto` (`urunfoto_id`, `urun_id`, `urunfoto_resimyol`, `urunfoto_sira`) VALUES
(9, 15, 'dimg/urun/304862292429571285871.jpg', 1),
(10, 15, 'dimg/urun/208622811130500290212.jpg', 2),
(11, 15, 'dimg/urun/206082823821141266523.jpg', 3),
(12, 15, 'dimg/urun/246423175927278224564.jpg', 4),
(17, 21, 'dimg/urun/215332909120920211441.jpg', 0),
(18, 21, 'dimg/urun/235522696626845291952.jpg', 0),
(19, 21, 'dimg/urun/281772193530693250403.jpg', 0),
(20, 21, 'dimg/urun/256542583930810211654.jpg', 0),
(35, 29, 'dimg/urun/209792746527074283062.jpg', 0),
(36, 29, 'dimg/urun/266923068923140306221.jpg', 0),
(37, 29, 'dimg/urun/270002321727640251403.jpg', 0),
(38, 29, 'dimg/urun/288432932926692208714.jpg', 0),
(39, 28, 'dimg/urun/224603138331333219172.jpg', 0),
(40, 28, 'dimg/urun/211992136426167313201.jpg', 0),
(41, 28, 'dimg/urun/209543039927131254973.jpg', 0),
(42, 28, 'dimg/urun/295952233027977246094.jpg', 0),
(43, 27, 'dimg/urun/316642488322097213851.jpg', 0),
(44, 27, 'dimg/urun/310692344226165267202.jpg', 0),
(45, 27, 'dimg/urun/312543052731425299973.jpg', 0),
(46, 27, 'dimg/urun/204322055620616277964.jpg', 0),
(47, 26, 'dimg/urun/255092549725404251682.jpg', 0),
(48, 26, 'dimg/urun/313472039227489276661.jpg', 0),
(49, 26, 'dimg/urun/217952480329286281123.jpg', 0),
(50, 26, 'dimg/urun/266822809022959318044.jpg', 0),
(51, 3, 'dimg/urun/235122996920205236031.jpg', 0),
(52, 3, 'dimg/urun/265272134625120215752.jpg', 0),
(53, 3, 'dimg/urun/253442680630125276403.jpg', 0),
(54, 3, 'dimg/urun/319133061427297288234.jpg', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `yorum_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`banka_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepet_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD PRIMARY KEY (`siparisdetay_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `urunfoto`
--
ALTER TABLE `urunfoto`
  ADD PRIMARY KEY (`urunfoto_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `banka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7003;

--
-- Tablo için AUTO_INCREMENT değeri `siparis_detay`
--
ALTER TABLE `siparis_detay`
  MODIFY `siparisdetay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `urunfoto`
--
ALTER TABLE `urunfoto`
  MODIFY `urunfoto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
