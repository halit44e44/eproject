<?php 

include 'header.php';


$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
$urunsor->execute(array(
	'urun_id'=> $_GET['urun_id']
));
$say=$urunsor->rowCount();
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

if ($urunsor->rowCount()==0) {
	header("Location:index.php?durum=urunyok");
	exit;
}

?>

<head>
	<title><?php echo $uruncek['urun_ad']; ?>- Halil Şarküteri</title>

</head>

<?php 
if ($_GET['durum']=="ok") {?>	
	<script type="text/javascript">
		alert("Yorum Başarı İle Eklendi");

	</script>
<?php } ?>

?>

<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title"><?php echo $uruncek['urun_ad'] ?></div>
			</div>
			<div class="row">
				<div class="col-md-6">

					<?php
					$urun_id=$uruncek['urun_id'];
					$urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_sira desc limit 1");
					$urunfotosor->execute(array(
						'urun_id' => $urun_id
					));
					$urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC);

					?>


					<div class="dt-img">
						<div class="detpricetag"><div class="inner"><?php echo $uruncek['urun_fiyat'] ?>₺</div></div>
						<a class="fancybox" href="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
					</div>


					<?php
					$urun_id=$uruncek['urun_id'];
					$urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_sira desc limit 1,3");
					$urunfotosor->execute(array(
						'urun_id' => $urun_id
					));


					while($urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC)) {?>




						<div class="thumb-img">
							<a class="fancybox" href="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
						</div>


					<?php } ?>
					
				</div>
				<div class="col-md-6 det-desc">
					<div class="productdata">
						<div class="infospan">Ürün Kodu <span><?php echo $uruncek['urun_id'] ?></span></div>
						<div class="infospan">Ürün Fiyatı <span><?php echo $uruncek['urun_fiyat'] ?>₺</span></div>
						<div class="infospan">Üretici Firma <span>Şarküteri</span></div>

						<div class="clearfix"></div>
						<hr>

						<form action="nedmin/netting/islem.php" method="POST">

							<div class="form-group">
								<label for="qty" class="col-sm-2 control-label">Adet</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" value="1" name="urun_adet">
								</div>

								<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>" >

								<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">

								
								<div class="col-sm-4">

									<?php if (isset($_SESSION['userkullanici_mail'])) { ?>
										
										<button type="submit" name="sepetekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></button>

									<?php }  else {?>

										<button type="submit" name="sepetekle" disabled="" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></button>

									<?php } ?>



								</div>

								<div class="clearfix"></div>
								
							</div>

						</form>


						<hr>

						<div class="sharing">

							<div class="avatock"><span>

								<?php 

								if ($uruncek['urun_stok']>=1) {
									echo "Ürün Adeti: ".$uruncek['urun_stok'];
								}
								else
								{
									echo "Ürün Mevcut Değil.";
								}

								?>

							</span></div>
						</div>

					</div>
				</div>
			</div>

			<div class="tab-review">
				<ul id="myTab" class="nav nav-tabs shop-tab">
					<li <?php 

					if (empty($_GET['durum'])) {?>
						class="active"						
					<?php } ?>
					><a href="#desc" data-toggle="tab">Açıklama</a></li>
					<li 
					<?php 

					if (isset($_GET['durum'])) {?>
						class="active"						
					<?php } ?>

					<?php 
						
					$kullanici_id=$kullanicicek['kullanici_id'];
					$urun_id=$uruncek['urun_id'];

					$yorumsor=$db->prepare("SELECT * FROM yorumlar where urun_id=:urun_id");
					$yorumsor->execute(array(
						'urun_id'=> $urun_id
					));


					?>



					><a href="#rev" data-toggle="tab">Yorumlar (<?php echo $say=$yorumsor->rowCount(); ?>)</a></li>
				</ul>
				<div id="myTabContent" class="tab-content shop-tab-ct">
					<div class="tab-pane fade <?php if($_GET['durum']!="ok"){ ?>
						active in
						<?php } ?>" id="desc">
						<p>
							<?php echo $uruncek['urun_detay'] ?>
						</p>
					</div>
					<div class="tab-pane fade <?php 

					if ($_GET['durum']=="ok") {?>
						active in					
						<?php } ?>" id="rev">
						<!-- YORUM ALANI -->

						<?php 



						while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) {

							$ykullanici_id=$yorumcek['kullanici_id'];

							$ykullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
							$ykullanicisor->execute(array(
								'id'=> $ykullanici_id
							));

							$ykullanicicek=$ykullanicisor->fetch(PDO::FETCH_ASSOC);
							?>


							<p class="dash">
								<span><?php echo $ykullanicicek['kullanici_adsoyad'] ?></span> 
								<?php echo $yorumcek['yorum_zaman'] ?><br><br>
								<?php echo $yorumcek['yorum_detay'] ?>
							</p>
							<!-- YORUM ALANI -->

						<?php } ?>

						<h4>Yorum Yazın</h4>

						<?php 

						if (isset($_SESSION['userkullanici_mail'])) { ?>

							<form action="nedmin/netting/islem.php" method="POST" role="form">
								<div class="form-group">
									<input name="yorum_ad" type="text" placeholder="Lütfen yorum başlığı giriniz"  class="form-control" id="name">
								</div>
								<div class="form-group">
									<textarea rows="5" cols="10" name="yorum_detay" class="form-control" id="text" placeholder="Yorumunuzu yazınız... "></textarea>
								</div>

								<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>" >

								<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">

								<input type="hidden" name="gelen_url" value="<?php echo "http://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'].""; ?>">



								<button type="submit" name="yorumkaydet" class="btn btn-default btn-red btn-sm">Gönder</button>
							</form>



						<?php } else{

							echo "Yorum Yazabilmeniz İçin Giriş Yapmalısınız....";

						}?>






					</div>
				</div>
			</div>

			<div id="title-bg">
				<div class="title">Benzer Ürünler </div>
			</div>
			<div class="row prdct"><!--Products-->


				<?php 
				$kategori_id=$uruncek['kategori_id'];

				$urunaltsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id order by rand() limit 3");
				$urunaltsor->execute(array(
					'kategori_id' => $kategori_id
				));

				while($urunaltcek=$urunaltsor->fetch(PDO::FETCH_ASSOC)) {
					?>

					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="urun-<?=seo($urunaltcek['urun_ad']).'-'.$urunaltcek['urun_id'] ?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $urunaltcek['urun_fiyat']*1.50 ?>₺</span><?php echo $urunaltcek['urun_fiyat'] ?>₺</span></div></div>
							</div>
							<span class="smalltitle"><a href="urun-<?=seo($urunaltcek['urun_ad']).'-'.$urunaltcek['urun_id'] ?>"><?php echo $urunaltcek['urun_ad'] ?></a></span>
							<span class="smalldesc">Stok:<?php echo $urunaltcek['urun_stok'] ?></span>
						</div>
					</div>
				<?php } ?>

			</div><!--Products-->
			<div class="spacer"></div>
		</div><!--Main content-->
		<?php 
		include 'sidebar.php';
		?>
	</div>
</div>

<?php 
include 'footer.php';
?>