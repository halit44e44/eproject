<?
include '../../nedmin/netting/baglan.php';
require("class.phpmailer.php");

if ($_POST['toplam']!=$_POST['islem']) {
	
	echo "bot kontrolü";
	exit;
} {



	//Mysql den mail bilgilerimizi çekiyoruz.
	$ayarsor=$db->prepare("select * from ayar where ayar_id=?");
	$ayarsor->execute(array(0));
	$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


	$mail = new PHPMailer();
	$mail->IsSMTP();  
	$mail->CharSet="SET NAMES UTF8";                               // Türkçe Karaktere uygunmu 
	$mail->Host     = $ayarcek['ayar_smtphost']; // SMTP servers HOST KISMI
	$mail->SMTPAuth = true;     // turn on SMTP authentication GÜVENLİ GÖNDERİM YAPILSINMI EVET
	$mail->Username = $ayarcek['ayar_smtpuser'];  // SMTP username
	$mail->Password = $ayarcek['ayar_smtppassword'];// SMTP password
	$mail->Port     = $ayarcek['ayar_smtpport'];
	$mail->From     = $ayarcek['ayar_smtpuser']; // smtp kullanýcý adýnýz ile ayný olmalý
	$mail->Fromname = "JoyAkademi Test Mail";
	//Çoklu mail için bu satırı çoğal
	$mail->AddAddress("doganlarbal.cf","Form Mail");
	

	$mail->Subject  =  $_POST['adsoyad'];
	$mail->Body     =  implode("    ",$_POST);

if(!$mail->Send())
{
	echo "Mesaj Gönderilemedi <p>";
	echo "Mailer Error: " . $mail->ErrorInfo;
	exit;
}

echo "Mesaj Gönderildi";
exit;
}

?>
<!--<meta http-equiv="refresh" content="0;URL=../iletisim.php?durum=ok">-->