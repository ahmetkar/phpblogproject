
<?php 
include "set/func.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kişisel blog teması</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website  template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <script type="text/javascript" src="js/map.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	
	<?php include "arayuz/sol.php";

	 ?>
	
	<section class="main clearfix">

		<section class="top">	
			<div class="wrapper content_header clearfix">
				<div class="work_nav">
							
										
					
				</div><!-- end work_nav -->
				<h1 class="title">Bana ulaşın</h1>
			</div>		
		</section><!-- end top -->

		<section class="wrapper">
			<div class="content">

<?php if($_POST){

$baslik = trim(htmlspecialchars($_POST["baslik"]));
$adsoyad = trim(htmlspecialchars($_POST["adsoyad"]));
$email = trim(htmlspecialchars($_POST["email"]));
$metin = trim(htmlspecialchars($_POST["metin"]));
$tarih = date("d.m.Y");
$ipadres = GetIP();
$tarayici = $_SERVER["HTTP_USER_AGENT"];

if(empty($baslik) && empty($adsoyad)  && empty($email) && empty($metin)){

echo "Boş alan bırakmayın";

}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {

echo "Geçerli bir email giriniz";

}else if(strlen($metin)<=25 ){

echo "Gönderdiğiniz iletişim metni 25 karakterden büyük olmalıdır";

}else if(strlen($metin)>=300){

echo "Gönderdiğiniz iletişim metni 300 karakterden küçük olmalıdır";

}else {


    $ekle = $db->prepare("insert into iletisim set 
    	baslik=?,
    	adsoyad=?,
    	email=?,
    	metin=?,
    	tarih=?,
    	ipadres=?,
    	tarayici=?");

    $complete = $ekle->execute(array($baslik,$adsoyad,$email,$metin,$tarih,$ipadres,$tarayici));

if($complete){


	echo "Mesajınız gönderildi";
	
}else {


	echo "Bağlantıda bir sorun var";
}

}

	}else { ?>


				<form action="" method="post">
<input id="in" type="text" placeholder="Başlık giriniz" name="baslik" /><br>
<input id="in" type="text" placeholder="Ad ve soyadınız" name="adsoyad" /><br>
<input id="in" type="text" placeholder="E-mail adresiniz" name="email" /><br>
<textarea cols="30" rows="10" name="metin" placeholder="Herhangi bir şikayetiniz ve ya isteğinizvarsa buraya girmeyi deneyin.."></textarea><br>
<input type="submit" value="Gönder" /><br>
</form>
<?php } ?>
			</div><!-- end content -->
		</section>
	</section><!-- end main -->
	
</body>

</html>