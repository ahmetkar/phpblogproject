<?php include "set/ayarlar.php";
include "arayuz/sol.php"; 

$arc = $db->query("Select * from arkadaslarim");
foreach($arc as $ar){
?>

	<section class="main clearfix">
		<div class="work">
			<a href="<?php echo $ar["siteurl"]; ?>">
				<img src="img/<?php echo $ar["resim"]; ?>" class="media" alt=""/>
				<div class="caption">
					<div class="work_title">
						<h1><?php echo $ar["isim"]; ?></h1>
					</div>
				</div>
			</a>
		</div>

	<?php } ?>	
	</section><!-- end main -->
	
</body>
</html>