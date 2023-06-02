<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website  template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>

<?php
include "set/ayarlar.php";
include "arayuz/sol.php";

$hc = $db->query("Select * from hakkimda where id='1' ")->fetch();


 ?>

	<section class="main clearfix">

		<section class="top">	
		<img src="img/<?php echo $hc["ustresim"]; ?>" id="arkaplan">
			<div class="wrapper content_header clearfix">
				<div class="work_nav">
							
										
					
				</div><!-- end work_nav -->
				<h1 class="title"><?php echo $hc["baslik"]; ?></h1>
			</div>		
		</section><!-- end top -->

		<section class="wrapper">
			<div class="content">
				<p><?php echo $hc["metin"]; ?></p>
			</div><!-- end content -->
		</section>
	</section><!-- end main -->
	
</body>
</html>