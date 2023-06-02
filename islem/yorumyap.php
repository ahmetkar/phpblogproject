<?php
include "../set/func.php";
include "../set/ayarlar.php";

$tarih = date("d.m.Y");
$ipadres = GetIP();
$yaziid = $_POST["yaziid"];
$yorum = trim(htmlspecialchars($_POST["yorum"]));
$adsoyad = trim(htmlspecialchars($_POST["adsoyad"]));
$email = trim(htmlspecialchars($_POST["email"]));
if(!empty($_POST["admin"])){
$allq = $_POST["admin"];}
$tarayici = $_SERVER["HTTP_USER_AGENT"];

$yuzunluk = strlen($yorum);

if(empty($yorum) && empty($email) && empty($adsoyad) && empty($yaziid)){

echo "Boş alanları doldurun";

}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

echo "Lütfen geçerli bir e-posta adresi giriniz";

}else if($yuzunluk<=10){

echo "Yorum 10 karakterden uzun olmalıdır.";

}else if($yuzunluk>=300){

echo "Yorum 300 karakterden küçük olmalıdır";

}else {


$islem3 = $db->prepare("insert into yorumlar set
	yaziid=?,
	yorum=?,
	ipadres=?,
	tarayici=?,
	tarih=?,
	email=?,
	adsoyad=?,
	admin=?
	");

$yorumyap = $islem3->execute(array($yaziid,$yorum,$ipadres,$tarayici,$tarih,$email,$adsoyad,$allq));
}
if($yorumyap){
header("Location:../not.php?id=".$yaziid."");

}else {
include "arayuz/sol.php";
echo "Sorun oluştu";

}

?>