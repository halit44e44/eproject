<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Şifre Güncelle</div>
							<p >Şifrenizi Aşşağıdaki Adımlardan Değiştirebilirsiniz...</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifre Güncelleme</div>
				</div>

				<?php 

				if ($_GET['durum']=="eskisifrehata") {?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> Eski şifreniz hatalı...
					</div>
					
				<?php } elseif ($_GET['durum']=="sifreleruyusmuyor") {?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> Girdiğiniz şifreler uyuşmuyor...
					</div>
					
				<?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
					</div>
					
				<?php } elseif ($_GET['durum']=="sifredegisti") {?>

					<div class="alert alert-success">
						<strong>Tebrikler!</strong> Şifreniz başarı ile değişti...
					</div>
					
				<?php }
				?>


				

				<div class="form-group bod">
					<div class="col-sm-12">
						<input type="password" class="form-control" required="" placeholder="Eski Şifrenizi Giriniz" name="kullanici_eskipassword">
					</div>
				</div>

				<div class="form-group bod">
					<div class="col-sm-6">
						<input type="password" class="form-control" required="" placeholder="Yeni Şifrenizi Giriniz" name="kullanici_passwordone">
					</div>
				
					<div class="col-sm-6">
						<input type="password" class="form-control" required="" placeholder="Yeni Şifrenizi Tekrar Giriniz" name="kullanici_passwordtwo">
					</div>
				</div>



				
				


				
				<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">



				<center><button type="submit" name="kullanicisifreguncelle" class="btn btn-default btn-red">Şifremi Değiştir</button></center>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz?</div>
				</div>


				<center><a href="sifre-guncelle.php"><img width="400" src="https://www.ersag.web.tr/wp-content/uploads/2019/04/ersag-uye-numarami-%C5%9Fifremi-unuttum-728x410.jpg"></a></center>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>