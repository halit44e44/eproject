<?php 
include 'header.php';

if (isset($_POST['arama'])){

	$aranan=$_POST['aranan'];
	$urunsor=$db->prepare("SELECT * FROM urun where urun_ad LIKE ?");
	$urunsor->execute(array("%$aranan%"));
	$say=$urunsor->rowCount();
}
else {

	header("Location:index.php?durum=bos");
}

?>

<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bread"><a href="#">Ana Sayfa</a> &rsaquo; Kategori</div>
							<div class="bigtitle">Kategoriler</div>
						</div>
						<div class="col-md-3 col-md-offset-5">
							<button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9"><!--Main content-->
			<div class="title-bg">
				<div class="title">Ürünler -</div>
				<div class="title-nav">
					
					<a href="javascripti:void(0)"><i class="fa fa-th-large"></i>grid</a>
					<a href="javascripti:void(0)"><i class="fa fa-bars"></i>List</a>
					
				</div>
			</div>
			<div class="row prdct"><!--Products-->

				<?php 

				if ($say==0) {
					echo "ÜRÜN BULUNAMADI...";
				} ?>


				<?php 
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
				<!-- BU ALAN HOT YAZMAK YERİNE NEW YAZDIRIR -->

				<!-- RESİM EKLEME YERİNE VERİ TABANINDAN VİDEO ALANINI RESİM DİYE KULLANIP SORGUYU ONA GÖRE YAPACAYIZ.. 
				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<div class="new"></div>
							<a href="product.htm"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $uruncek['urun_fiyat']*1.50 ?>₺</span><?php echo $uruncek['urun_fiyat'] ?>₺</span></div></div>
						</div>
						<span class="smalltitle"><a href="product.htm"><?php echo $uruncek['urun_ad'] ?></a></span>
						<span class="smalldesc">Stok:<?php echo $uruncek['urun_stok'] ?></span>
					</div>
				</div>
			-->

		</div><!--Products-->
			<!-- pagination
			<ul class="pagination shop-pag"> 
				<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
			</ul>
		-->

	</div>
	<?php include 'sidebar.php'; ?>
</div>
<div class="spacer"></div>
</div>

<?php 
include 'footer.php';
?>