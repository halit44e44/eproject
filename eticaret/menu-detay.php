<?php 

include 'header.php';


//Belirli Veriyi VeritabanınDAN SEÇME işlemi Yaptım...

$menusor=$db->prepare("SELECT * FROM menu where menu_seourl=:sef");
$menusor->execute(array(
	'sef'=> $_GET['sef']
));

$menucek=$menusor->fetch(PDO::FETCH_ASSOC);

?>


<div class="container">
	
	<div class="row">
		<div class="col-md-9"><!--Main content-->

			<div class="title-bg">
				<div class="title"><?php echo $menucek['menu_ad'] ?></div>
			</div>

			



			
			<div class="page-content">
				<p>
					<?php  echo $menucek['menu_detay']; ?>

				</p>

			</div>

			
		</div>


		<!-- slide bar buraya Gelecek....-->
		<?php 
		include 'sidebar.php';

		?>
		

	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php' ?>