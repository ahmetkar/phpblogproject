<?php
include "set/ayarlar.php";



$info= $db->query("Select * from sitebilgi where id='5' ")->fetch();
$not = $db->query("Select * from notlar");
?>
<head>
<!DOCTYPE html>
<html lang="tr">
	<title><?php echo $info["title"]; ?></title>
	<meta name="author" content="">
	<meta name="description" content="<?php echo $info["siteaciklama"]; ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript">

      $("a").click(function(){

    
       $("a").addClass("selected");

      });


    </script>
</head>
<body>

	<header>
		<div class="logo">
			<a href="index.php"><img src="img/<?php echo $info["logourl"]; ?>" title="Logo" alt="logo"/></a>
		</div><!-- end logo -->

		<div id="menu_icon"></div>
		<nav>
			<ul>
				<li><a href="index.php">Ana sayfa</a></li>
				<li><a  href="hakkimda.php">Hakkımda</a></li>
				<li><a  href="arkadaslarim.php">Arkadaşlarım</a></li>
				<li><a  href="iletisim.php">Bana ulaşın</a></li>
			</ul>
		</nav><!-- end navigation menu -->
		<div class="footer clearfix">
			<ul class="social clearfix">
				<li><a href="http://<?php echo $info["fburl"]; ?>" class="fb" data-title="Facebook"></a></li>
				<li><a href="http://<?php echo $info["googleurl"]; ?>" class="google" data-title="Google +"></a></li>
				<li><a href="http://<?php echo $info["behanceurl"];?>" class="behance" data-title="Behance"></a></li>
				<!--<li><a href="#" class="twitter" data-title="Twitter"></a></li>
				<li><a href="#" class="dribble" data-title="Dribble"></a></li>-->
				<li><a href="#" class="rss" data-title="RSS"></a></li>
			</ul><!-- end social -->

			<div class="rights">
				<p><?php echo $info["copyright"]; ?></p>
			</div><!-- end rights -->
		</div ><!-- end footer -->
	</header><!-- end header -->


	<?php  ?>