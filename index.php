<?php include "set/ayarlar.php";
include "arayuz/sol.php"; 

?>


	<section class="main clearfix">

<?php
foreach($not as $n){
 ?>	
		<div class="work">
			<a href="not.php?id=<?php echo $n["id"]; ?>">
				<img src="img/<?php echo $n["resimurl"]; ?>" class="media" alt=""/>
				<div class="caption">
					<div class="work_title">
						<h1><?php echo $n["baslik"]; ?></h1>
					</div>
				</div>
			</a>
		</div>

<?php } 


$scek = $db->query("Select * from sitebilgi where id='5' ")->fetch();

if($scek["kurulum"]=="0"){

echo "<meta http-equiv='refresh' content='0;URL=kurulum.php?sq=baslangic'  >";}else {

	
}

?>
		
	</section><!-- end main -->
	
</body>
</html>