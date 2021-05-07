<?php 
// Gerekli Yerleri Düzenlenmesi Lazım dbname Ve Veritabanı Giriş Şifresinin Düzenlenmesi Gerekiyor
try{

	$db=new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8",'root','');
	//echo "Veri Tabanı Bağlantın Başarılır";
	//Bu Kod Kontrol Amaçlıdır Bağlantı Gerçekleştirildimi Diye kontrol Ediyorum Sadece...

}
catch(PDOExpception $e)
{
	echo $e->getMessage();
}

 ?>