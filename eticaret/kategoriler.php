<?php



include 'header.php';

                     $sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                     $sorgu=$db->prepare("select * from kategori");
                     $sorgu->execute();
                     $toplam_icerik=$sorgu->rowCount();
                     $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                     // eğer sayfa girilmemişse 1 varsayalım.
                     $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                            // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                     if($sayfa < 1) $sayfa = 1; 
                                   // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                     if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                     $limit = ($sayfa - 1) * $sayfada;



                     //aşağısı bir önceki default kodumuz...
                     if (isset($_GET['sef'])) {


                      $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_seourl=:seourl");
                      $kategorisor->execute(array(
                       'seourl' => $_GET['sef']
                     ));

                      $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

                      $kategori_id=$kategoricek['kategori_id'];


                      $urunsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id order by urun_id DESC limit $limit,$sayfada");
                      $urunsor->execute(array(
                       'kategori_id' => $kategori_id
                     ));

                      $say=$urunsor->rowCount();

                    } else {

                      $urunsor=$db->prepare("SELECT * FROM urun order by urun_id DESC limit $limit,$sayfada");
                      $urunsor->execute();

                    }






                    if ($toplam_icerik==0) {
                      echo "Bu kategoride ürün bulunamadı";
                    }



?>

<head>
	

	<title><?php echo $kategoricek['kategori_ad']; ?>- Halil Şarküteri</title>


</head>





<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bigtitle">Kategoriler</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="clearfix"></div>

	<div class="lines"></div>

</div>



<div class="container">



	<div class="row">

		<div class="col-md-9"><!--Main content-->

			<div class="title-bg">


				<div class="title">Ürünler</div>

				

				

				<div class="title-nav">

					<a href="javascripti:void(0);"><i class="fa fa-th-large"></i>grid</a>

					<a href="javascripti:void(0);"><i class="fa fa-bars"></i>List</a>

				</div>

			</div>

			<div class="row prdct"><!--Products-->


				<?php



				if (isset($_GET['sef'])) {

					$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_seourl=:seourl");

					$kategorisor->execute(array(

						'seourl' => $_GET['sef']

					));

					$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

					$kategori_id=$kategoricek['kategori_id'];







					$urunsayisibul=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id");

					$urunsayisibul->execute(array(

						'kategori_id' => $kategori_id

					));

					$urunsayisi=$urunsayisibul->rowCount();





					$toplam_sayfa = ceil($urunsayisi / $sayfada);

					$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

					if($sayfa < 1) $sayfa = 1;

					if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

					$limit = ($sayfa - 1) * $sayfada;





					$urunsor=$db->prepare("SELECT * FROM urun where kategori_id=:kategori_id order by urun_id DESC limit $limit,$sayfada");

					$urunsor->execute(array(

						'kategori_id' => $kategori_id

					));





					while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {

						$urun_id=$uruncek['urun_id'];
						$urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_sira desc limit 1");
						$urunfotosor->execute(array(
							'urun_id' => $urun_id
						));
						$urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC);

						?>

						<div class="col-md-4">
							<div class="productwrap">
								<div class="pr-img">
									<div class="hot"></div>
									<a href="urun-<?=seo($uruncek['urun_ad']).'-'.$uruncek['urun_id'] ?>"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
									<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $uruncek['urun_fiyat']*1.50 ?>₺</span><?php echo $uruncek['urun_fiyat'] ?>₺</span></div></div>
								</div>
								<span class="smalltitle"><a href="urun-<?=seo($uruncek['urun_ad']).'-'.$uruncek['urun_id'] ?>"><?php echo $uruncek['urun_ad'] ?></a></span>
								<span class="smalldesc">Stok:<?php echo $uruncek['urun_stok'] ?></span>
							</div>
						</div>



					<?php }





					$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:kategori_id");

					$kategorisor->execute(array(

						'kategori_id' => $kategori_id

					));

					$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

					$kategori_ad=$kategoricek['kategori_ad'];





					?>






					<div align="right" class="col-md-12">

						<ul class="pagination">

							<?php

							$s=0;

							while ($s < $toplam_sayfa) {

								$s++; ?>

								<?php

								if ($s==$sayfa) {?>

									<li class="active">

										<a href="kategori-<?=seo($kategori_ad) ?>?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

									</li>

								<?php } else {?>

									<li>

										<a href="kategori-<?=seo($kategori_ad) ?>?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

									</li>



								<?php   }

							}

							?>

						</ul>

					</div>







					<?php



				} else {





					$sorgu=$db->prepare("select * from kategori");

					$sorgu->execute();

					$toplam_icerik=$sorgu->rowCount();

					$toplam_sayfa = ceil($toplam_icerik / $sayfada);

					$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

					if($sayfa < 1) $sayfa = 1;

					if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

					$limit = ($sayfa - 1) * $sayfada;





					$urunsor=$db->prepare("SELECT * FROM urun order by urun_id DESC limit $limit,$sayfada");

					$urunsor->execute();





					while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {


						$urun_id=$uruncek['urun_id'];
						$urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_sira desc limit 1");
						$urunfotosor->execute(array(
							'urun_id' => $urun_id
						));
						$urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC);

						?>

						<div class="col-md-4">
							<div class="productwrap">
								<div class="pr-img">
									<div class="hot"></div>
									<a href="urun-<?=seo($uruncek['urun_ad']).'-'.$uruncek['urun_id'] ?>"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
									<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $uruncek['urun_fiyat']*1.50 ?>₺</span><?php echo $uruncek['urun_fiyat'] ?>₺</span></div></div>
								</div>
								<span class="smalltitle"><a href="urun-<?=seo($uruncek['urun_ad']).'-'.$uruncek['urun_id'] ?>"><?php echo $uruncek['urun_ad'] ?></a></span>
								<span class="smalldesc">Stok:<?php echo $uruncek['urun_stok'] ?></span>
							</div>
						</div>



					<?php } ?>











					<div align="right" class="col-md-12">

						<ul class="pagination">

							<?php

							$s=0;

							while ($s < $toplam_sayfa) {

								$s++; ?>

								<?php

								if ($s==$sayfa) {?>

									<li class="active">

										<a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

									</li>

								<?php } else {?>

									<li>

										<a href="kategoriler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

									</li>



								<?php   }

							}

							?>

						</ul>

					</div>



				<?php } ?>











			</div>

		</div>



		<?php include 'sidebar.php' ?>

	</div>

	<div class="spacer"></div>

</div>

<?php include 'footer.php'; ?>