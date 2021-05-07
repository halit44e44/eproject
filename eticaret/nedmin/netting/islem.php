<?php 
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';




if (isset($_POST['kullanicikaydet'])) {

	//htmlspecialchars => Kodunun çalışma mantığı Kullanıcı kayıt ederken Zararlı Yazılımların yazılmasını engelliyor
	// html cinsinden yazmasına izin vermiyor
	//strip_tags => buda aynısı gibi iş görür buda html taglarını siler kayıt yaparken...

	
	echo $kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); echo "<br>";
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";

	echo $kullanici_passwordone=$_POST['kullanici_passwordone']; echo "<br>";
	echo $kullanici_passwordtwo=$_POST['kullanici_passwordtwo']; echo "<br>";


	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if (strlen($kullanici_passwordone)>=6) {

// Başlangıç

			$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
			));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();



			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;
				$kullanici_durum=1;


			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki,
					kullanici_durum=:kullanici_durum
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki,
					'kullanici_durum' => $kullanici_durum
				));

				if ($insert) {


					header("Location:../../index.php?durum=loginbasarili");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../register.php?durum=basarisiz");
				}

			} else {

				header("Location:../../register.php?durum=mukerrerkayit");



			}




		// Bitiş



		} else {


			header("Location:../../register.php?durum=eksiksifre");


		}



	} else {



		header("Location:../../register.php?durum=farklisifre");
	}
	


}


















/*

SLİDER SİL VE SLİDER DÜZENLE İŞLEMLERİ TAMAMLANMADI ONLARI GÖZDEN GEÇEİRMEM LAZIM HATALAR VAR

*/

// Slider Düzenleme Başla


if (isset($_POST['sliderduzenle'])) {

	
	if($_FILES['slider_resimyol']["size"] > 0)  { 


		$uploads_dir = '../../dimg/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol	
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum'],
			'resimyol' => $refimgyol,
		));
		

		$slider_id=$_POST['slider_id'];

		if ($update) {

			$resimsilunlink=$_POST['slider_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}



	} else {

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum		
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum']
		));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}
	}

}


// Slider Düzenleme Bitiş



// SLİDER İŞLEMİ SİLİYOR FAKAT slider KLASÖRÜNDEKİ RESMİ SİLMİYOR....

if ($_GET['slidersil']=="ok") {
	
	$sil=$db->prepare("DELETE FROM slider where slider_id=:slider_id");
	$kontrol=$sil->execute(array(
		'slider_id'=> $_GET['slider_id']
	));

	if ($kontrol) {
		
		$resimsilunlink=$_GET['slider_resimyol'];
		unlink("../../$resimsilunlink");

		header("Location:../production/slider.php?sil=ok");
		
	}
	else{
		header("Location:../production/slider.php?sil=no");
	}


}



if (isset($_POST['sliderkaydet'])) {
	

	$uploads_dir = '../../dimg/slider';

	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];

	//Resim İsminin Benzersiz Olması...
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");



	$kaydet=$db->prepare("INSERT INTO slider SET

		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol
		");

	$insert=$kaydet->execute(array(

		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol

	));


	if ($insert) {
		
		Header("Location:../production/slider.php?durum=ok");
	}
	else
		Header("Location:../production/slider.php?durum=no");


}





if (isset($_POST['logoduzenle'])) {

	//Burada yüklenilen resme biz kendimiz yeni bir isim atıyoruz ayrıyeten bu bir güvenlik önlemi olarak kabnul 
	//edilebilir Sızmak isterlerse bir dosya yolladıklarında dosyanın ismi farklı geleceği için o dosyayı açamazlar.


	//Burada dosyamızın Boyutunu belirliyoruz en fazla ne kadar olacağını belirliyoruz..
	
	if ($_FILES['ayar_logo']['size']>10485760) {
		echo "BU DOSYA BOYUTU ÇOK YÜKSEK";

		Header("Location:../production/genel-ayar.php?durum=Dosyabüyük");


	}

	// DOSYA UZANTISINA GÖRE DEĞİŞİKLİK YAPILABİLİR VEYA YAPILAMAZ

	$izinli_uzantilar=array('png','jpg');

	$ext=strtolower(substr($_FILES['ayar_logo']['name'],strpos($_FILES['ayar_logo']['name'],'.')+1));

	if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu Uzantı Kabul edilmiyor.";
		Header("Location:../production/genel-ayar.php?durum=uzantiyanlis");
		exit;
	}


	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['ayar_logo']['tmp_name'];
	@$name = $_FILES['ayar_logo']['name'];

	$benzersizsayi4 = rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	$duzenle =$db->prepare("UPDATE ayar SET 

		ayar_logo=:logo
		WHERE ayar_id=0
		");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));


	if ($update) {
		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		header("Location:../production/genel-ayar.php?durum=ok");
	}
	else
		header("Location:../production/genel-ayar.php?durum=no");


}

if (isset($_POST['admingiris'])) {

//md5 Algoritması Şifleri değiştirir.... veri tabanına giderken şifreler farklı gider güvenlik amaçlı...


	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);
	

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5

	));

	
	echo $say=$kullanicisor->rowCount();
	

	if ($say==1) {

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?durum=no");
		exit;
	}

	


}


if (isset($_POST['sifremiunuttum'])) {

	$sifremiunuttum=1;

	if ($sifremiunuttum==1) {
		header("Location:../../sifre-guncelle.php?durum=sifremiunuttum");
	}
}


if (isset($_POST['kullanicigiris'])) {


	
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_password=md5($_POST['kullanici_password']); 



	$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
	));


	$say=$kullanicisor->rowCount();



	if ($say==1) {

		echo $_SESSION['userkullanici_mail']=$kullanici_mail;

		header("Location:../../");
		exit;
		




	} else {


		header("Location:../../?durum=basarisizgiris");

	}


}





if (isset($_POST['genelayarkaydet'])) {
	

//Tablo Güncelleme İşlemi Kodları...

	$ayarkaydet=$db->prepare("UPDATE ayar SET

		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet -> execute(array(

		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
	));


	if ($update) {
		header("Location:../production/genel-ayar.php?durum=ok");
	}
	else
		header("Location:../production/genel-ayar.php?durum=no");


}


if (isset($_POST['iletisimayarkaydet'])) {
	

//Tablo Güncelleme İşlemi Kodları...

	$ayarkaydet=$db->prepare("UPDATE ayar SET

		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_il=:ayar_il,
		ayar_ilce=:ayar_ilce,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=0");

	$update=$ayarkaydet -> execute(array(

		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_faks' => $_POST['ayar_faks'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_adres' => $_POST['ayar_adres'],
		'ayar_mesai' => $_POST['ayar_mesai']

	));


	if ($update) {
		header("Location:../production/iletisim-ayarlar.php?durum=ok");
	}
	else
		header("Location:../production/iletisim-ayarlar.php?durum=no");


}




if (isset($_POST['apiayarkaydet'])) {
	

//Tablo Güncelleme İşlemi Kodları...

	$ayarkaydet=$db->prepare("UPDATE ayar SET

		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update=$ayarkaydet -> execute(array(

		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim' => $_POST['ayar_zopim']
	));


	if ($update) {
		header("Location:../production/api-ayarlar.php?durum=ok");
	}
	else
		header("Location:../production/api-ayarlar.php?durum=no");


}





if (isset($_POST['sosyalayarkaydet'])) {
	

//Tablo Güncelleme İşlemi Kodları...

	$ayarkaydet=$db->prepare("UPDATE ayar SET

		ayar_facebook=:ayar_facebook,
		ayar_twiter=:ayar_twiter,
		ayar_youtube=:ayar_youtube,
		ayar_instagram=:ayar_instagram,
		ayar_google=:ayar_google
		WHERE ayar_id=0");

	$update=$ayarkaydet -> execute(array(

		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_twiter' => $_POST['ayar_twiter'],
		'ayar_youtube' => $_POST['ayar_youtube'],
		'ayar_instagram' => $_POST['ayar_instagram'],
		'ayar_google' => $_POST['ayar_google']

	));


	if ($update) {
		header("Location:../production/sosyal-ayarlar.php?durum=ok");
	}
	else
		header("Location:../production/sosyal-ayarlar.php?durum=no");


}




if (isset($_POST['mailayarkaydet'])) {
	

//Tablo Güncelleme İşlemi Kodları...

	$ayarkaydet=$db->prepare("UPDATE ayar SET

		ayar_smtphost=:ayar_smtphost,
		ayar_smtpuser=:ayar_smtpuser,
		ayar_smtppassword=:ayar_smtppassword,
		ayar_smtpport=:ayar_smtpport
		WHERE ayar_id=0");

	$update=$ayarkaydet -> execute(array(

		'ayar_smtphost' => $_POST['ayar_smtphost'],
		'ayar_smtpuser' => $_POST['ayar_smtpuser'],
		'ayar_smtppassword' => $_POST['ayar_smtppassword'],
		'ayar_smtpport' => $_POST['ayar_smtpport']
	));


	if ($update) {
		header("Location:../production/mail-ayarlar.php?durum=ok");
	}
	else
		header("Location:../production/mail-ayarlar.php?durum=no");


}



if (isset($_POST['hakkimizdakaydet'])) {
	

//Tablo Güncelleme İşlemi Kodları...

	/*

	COPY PASTE İŞLEMLERİNDE TABLO VE İŞARETLİ SATIRLARIN DEĞİŞTİNDEN EMİN OL HATA ALIRSAM İSİMLERİ KONTROL ET...

	*/

	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET

		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");

	$update=$ayarkaydet -> execute(array(

		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
	));


	if ($update) {
		header("Location:../production/hakkimizda.php?durum=ok");
	}
	else
		header("Location:../production/hakkimizda.php?durum=no");


}




if (isset($_POST['kullaniciduzenle'])) {
	

//Tablo Güncelleme İşlemi Kodları...

	$ayarkaydet=$db->prepare("UPDATE kullanici SET

		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum,
		kullanici_password=:kullanici_password
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet -> execute(array(

		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum'],
		'kullanici_password' => $_POST['kullanici_password']
	));


	if ($update) {
		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
	}
	else
		header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");


}


if ($_GET['kullanicisil']=="ok") {
	
	$sil=$db->prepare("DELETE FROM kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['kullanici_id']
	));

	if ($kontrol) {

		header("Location:../production/kullanici.php?sil=ok");
		
	}
	else{
		header("Location:../production/kullanici.php?sil=no");
	}


}


if (isset($_POST['menuduzenle'])) {

	$menu_id=$_POST['menu_id'];
	$menu_seourl=seo($_POST['menu_ad']);
	

//Tablo Güncelleme İşlemi Kodları...

	$ayarkaydet=$db->prepare("UPDATE menu SET

		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum

		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet -> execute(array(

		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
	));


	if ($update) {
		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");
	}
	else
		header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");


}


if ($_GET['menusil']=="ok") {
	
	$sil=$db->prepare("DELETE FROM menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['menu_id']
	));

	if ($kontrol) {

		header("Location:../production/menu.php?sil=ok");
		
	}
	else{
		header("Location:../production/menu.php?sil=no");
	}


}



if (isset($_POST['menukaydet'])) {

	$menu_seourl=seo($_POST['menu_ad']);
	

//Tablo Güncelleme İşlemi Kodları...

	$ayarekle=$db->prepare("INSERT INTO menu SET

		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$insert=$ayarekle -> execute(array(

		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
	));


	if ($insert) {
		header("Location:../production/menu.php?durum=ok");
	}
	else
		header("Location:../production/menu.php?durum=no");


}






if (isset($_POST['userkullaniciduzenle'])) {
	

//Tablo Güncelleme İşlemi Kodları...

	$ayarkaydet=$db->prepare("UPDATE kullanici SET

		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum,
		kullanici_gsm=:kullanici_gsm,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_unvan=:kullanici_unvan,
		kullanici_adres=:kullanici_adres
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet -> execute(array(

		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum'],
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_il' => $_POST['kullanici_il'],
		'kullanici_ilce' => $_POST['kullanici_ilce'],
		'kullanici_unvan' => $_POST['kullanici_unvan'],
		'kullanici_adres' => $_POST['kullanici_adres']
	));


	if ($update) {
		header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=ok");
	}
	else
		header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=no");


}





if (isset($_POST['kategoriduzenle'])) {
	

	$kategori_id=$_POST['kategori_id'];
	$kategori_seourl=seo($_POST['kategori_ad']);


	$ayarkaydet=$db->prepare("UPDATE kategori SET

		
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,
		kategori_seourl=:seourl,
		kategori_sira=:sira
		
		WHERE kategori_id={$_POST['kategori_id']}");

	$update=$ayarkaydet -> execute(array(

		
		'ad' => $_POST['kategori_ad'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']
		
	));


	if ($update) {
		header("Location:../production/kategori.php?kategori_id=$kategori_id&durum=ok");
	}
	else
		header("Location:../production/kategori.php?kategori_id=$kategori_id&durum=no");


}


if (isset($_POST['kategoriekle'])) {
	

	$kategori_seourl=seo($_POST['kategori_ad']);


	$ayarkaydet=$db->prepare("INSERT INTO kategori SET

		
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,
		kategori_seourl=:seourl,
		kategori_sira=:sira
		
		");

	$insert=$ayarkaydet -> execute(array(

		
		'ad' => $_POST['kategori_ad'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']
		
	));


	if ($insert) {
		header("Location:../production/kategori.php?durum=ok");
	}
	else
		header("Location:../production/kategori.php?durum=no");


}


if ($_GET['kategorisil']=="ok") {
	
	$sil=$db->prepare("DELETE FROM kategori where kategori_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['kategori_id']
	));

	if ($kontrol) {

		header("Location:../production/kategori.php?sil=ok");
		
	}
	else{
		header("Location:../production/kategori.php?sil=no");
	}


}


if ($_GET['yorumsil']=="ok") {
	
	$sil=$db->prepare("DELETE FROM yorumlar where yorum_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['yorum_id']
	));

	if ($kontrol) {

		header("Location:../production/yorum.php?sil=ok");
		
	}
	else{
		header("Location:../production/yorum.php?sil=no");
	}


}


if ($_GET['urunsil']=="ok") {
	
	$sil=$db->prepare("DELETE FROM urun where urun_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['urun_id']
	));

	if ($kontrol) {

		header("Location:../production/urun.php?sil=ok");
		
	}
	else{
		header("Location:../production/urun.php?sil=no");
	}


}



if (isset($_POST['urunekle'])) {
	

	$urun_seourl=seo($_POST['urun_ad']);
	$ayarkaydet=$db->prepare("INSERT INTO urun SET

		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,
		urun_seourl=:urun_seourl

		");

	$insert=$ayarkaydet->execute(array(

		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
		'urun_keyword' => $_POST['urun_keyword'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'urun_seourl' => $urun_seourl
		
	));


	if ($insert) {
		header("Location:../production/urun.php?durum=ok");
	}
	else
		header("Location:../production/urun.php?durum=no");


}


if (isset($_POST['urunduzenle'])) {
	
	$urun_id=$_POST['urun_id'];
	$urun_seourl=seo($_POST['urun_ad']);


	$ayarkaydet=$db->prepare("UPDATE urun SET

		kategori_id=:kategori_id,
		urun_ad=:ad,
		urun_detay=:detay,
		urun_fiyat=:fiyat,
		urun_video=:video,
		urun_onecikar=:onecikar,
		urun_keyword=:keyword,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,
		urun_seourl=:seourl
		WHERE urun_id={$_POST['urun_id']}");
	



	$update=$ayarkaydet -> execute(array(

		'kategori_id' => $_POST['kategori_id'],
		'ad' => $_POST['urun_ad'],
		'detay' => $_POST['urun_detay'],
		'fiyat' => $_POST['urun_fiyat'],
		'video' => $_POST['urun_video'],
		'onecikar' => $_POST['urun_onecikar'],
		'keyword' => $_POST['urun_keyword'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'seourl' => $urun_seourl
		
	));


	if ($update) {
		header("Location:../production/urun.php?urun_id=$urun_id&durum=ok");
	}
	else
		header("Location:../production/urun.php?urun_id=$urun_id&durum=no");

}




if (isset($_POST['yorumkaydet'])) {


	$gelen_url=$_POST['gelen_url'];

	$ayarekle=$db->prepare("INSERT INTO yorumlar SET

		yorum_ad=:yorum_ad,
		yorum_detay=:yorum_detay,
		kullanici_id=:kullanici_id,
		urun_id=:urun_id
		");

	$insert=$ayarekle -> execute(array(

		'yorum_ad' => $_POST['yorum_ad'],
		'yorum_detay' => $_POST['yorum_detay'],
		'kullanici_id' => $_POST['kullanici_id'],
		'urun_id' => $_POST['urun_id']
	));


	if ($insert) {
		header("Location:$gelen_url?durum=ok");
	}
	else
		header("Location:$gelen_url?durum=no");


}


if (isset($_POST['sepetekle'])) {


	$ayarekle=$db->prepare("INSERT INTO sepet SET

		urun_adet=:urun_adet,
		kullanici_id=:kullanici_id,
		urun_id=:urun_id
		");

	$insert=$ayarekle -> execute(array(

		'urun_adet' => $_POST['urun_adet'],
		'kullanici_id' => $_POST['kullanici_id'],
		'urun_id' => $_POST['urun_id']
	));


	if ($insert) {
		header("Location:../../sepet.php?durum=ok");
	}
	else
		header("Location:../../sepet.php?durum=no");


}



if (isset($_POST['bankaekle'])) {

	$kaydet=$db->prepare("INSERT INTO banka SET
		banka_ad=:ad,
		banka_durum=:banka_durum,	
		banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_iban=:banka_iban
		");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['banka_ad'],
		'banka_durum' => $_POST['banka_durum'],
		'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
		'banka_iban' => $_POST['banka_iban']		
	));

	if ($insert) {

		Header("Location:../production/banka.php?durum=ok");

	} else {

		Header("Location:../production/banka.php?durum=no");
	}

}




if (isset($_POST['bankaduzenle'])) {
	

	$banka_id=$_POST['banka_id'];


	$ayarkaydet=$db->prepare("UPDATE banka SET

		
		banka_ad=:ad,
		banka_durum=:banka_durum,
		banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_iban=:banka_iban
		
		WHERE banka_id={$_POST['banka_id']}");

	$update=$ayarkaydet -> execute(array(

		
		'ad' => $_POST['banka_ad'],
		'banka_durum' => $_POST['banka_durum'],
		'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
		'banka_iban' => $_POST['banka_iban']
		
	));


	if ($update) {
		header("Location:../production/banka.php?banka_id=$banka_id&durum=ok");
	}
	else
		header("Location:../production/banka.php?banka_id=$banka_id&durum=no");


}




if ($_GET['bankasil']=="ok") {
	
	$sil=$db->prepare("DELETE FROM banka where banka_id=:id");
	$kontrol=$sil->execute(array(
		'id'=> $_GET['banka_id']
	));

	if ($kontrol) {

		header("Location:../production/banka.php?sil=ok");
		
	}
	else{
		header("Location:../production/banka.php?sil=no");
	}


}




if (isset($_POST['kullanicisifreguncelle'])) {

	echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); echo "<br>";
	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("select * from kullanici where kullanici_password=:password");
	$kullanicisor->execute(array(
		'password' => $kullanici_password
	));

			//dönen satır sayısını belirtir
	$say=$kullanicisor->rowCount();



	if ($say==0) {

		header("Location:../../sifre-guncelle?durum=eskisifrehata");



	} else {



	//eski şifre doğruysa başla


		if ($kullanici_passwordone==$kullanici_passwordtwo) {


			if (strlen($kullanici_passwordone)>=6) {


				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

				$kullanicikaydet=$db->prepare("UPDATE kullanici SET
					kullanici_password=:kullanici_password
					WHERE kullanici_id={$_POST['kullanici_id']}");

				
				$insert=$kullanicikaydet->execute(array(
					'kullanici_password' => $password
				));

				if ($insert) {


					header("Location:../../sifre-guncelle.php?durum=sifredegisti");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../sifre-guncelle.php?durum=no");
				}





		// Bitiş



			} else {


				header("Location:../../sifre-guncelle.php?durum=eksiksifre");


			}



		} else {

			header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");

			exit;


		}


	}

	exit;

	if ($update) {

		header("Location:../../sifre-guncelle?durum=ok");

	} else {

		header("Location:../../sifre-guncelle?durum=no");
	}

}



//Sipariş İşlemleri

if (isset($_POST['bankasiparisekle'])) {


	$siparis_tip="Banka Havalesi";


	$kaydet=$db->prepare("INSERT INTO siparis SET
		kullanici_id=:kullanici_id,
		siparis_tip=:siparis_tip,	
		siparis_banka=:siparis_banka,
		siparis_toplam=:siparis_toplam
		");
	$insert=$kaydet->execute(array(
		'kullanici_id' => $_POST['kullanici_id'],
		'siparis_tip' => $siparis_tip,
		'siparis_banka' => $_POST['siparis_banka'],
		'siparis_toplam' => $_POST['siparis_toplam']		
	));

	if ($insert) {

		//Sipariş başarılı kaydedilirse...

		echo $siparis_id = $db->lastInsertId();

		echo "<hr>";


		$kullanici_id=$_POST['kullanici_id'];
		$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
		$sepetsor->execute(array(
			'id' => $kullanici_id
		));

		while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

			$urun_id=$sepetcek['urun_id']; 
			$urun_adet=$sepetcek['urun_adet'];

			$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
			$urunsor->execute(array(
				'id' => $urun_id
			));

			$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
			
			echo $urun_fiyat=$uruncek['urun_fiyat'];


			
			$kaydet=$db->prepare("INSERT INTO siparis_detay SET
				
				siparis_id=:siparis_id,
				urun_id=:urun_id,	
				urun_fiyat=:urun_fiyat,
				urun_adet=:urun_adet
				");
			$insert=$kaydet->execute(array(
				'siparis_id' => $siparis_id,
				'urun_id' => $urun_id,
				'urun_fiyat' => $urun_fiyat,
				'urun_adet' => $urun_adet

			));


		}

		if ($insert) {

			

			//Sipariş detay kayıtta başarıysa sepeti boşalt

			$sil=$db->prepare("DELETE from sepet where kullanici_id=:kullanici_id");
			$kontrol=$sil->execute(array(
				'kullanici_id' => $kullanici_id
			));

			
			Header("Location:../../siparislerim?durum=ok");
			exit;


		}

		




	} else {

		echo "başarısız";

		//Header("Location:../production/siparis.php?durum=no");
	}



}


if(isset($_POST['urunfotosil'])) {

	$urun_id=$_POST['urun_id'];

	echo $checklist = $_POST['urunfotosec'];

	foreach ($checklist as $list) {

		$sil=$db->prepare("DELETE FROM urunfoto where urunfoto_id=:urunfoto_id");
		$kontrol=$sil->execute(array(
			'urunfoto_id'=> $list
		));

	}

	if ($kontrol) {

		$resimsilunlink=$_POST['urunfoto_resimyol'];
		unlink("../../$resimsilunlink");


		header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=ok");
		
	}
	else{
		header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=no");
	}


}








?>