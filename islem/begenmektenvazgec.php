<?php
include "../set/func.php";
include "../set/ayarlar.php";

$ipadres = GetIP();
$yaziid = $_POST["yaziid"];
$tarayici = $_SERVER["HTTP_USER_AGENT"];

$islem = $db->prepare("delete from notislem where
	yaziid=? && 
	begeni=? && 
	ipadres=? && 
	tarayici=?");

$vazgec = $islem->execute(array($yaziid,"1",$ipadres,$tarayici));

if($vazgec){
header("Location:../not.php?id=".$yaziid."");

}else {
include "../arayuz/sol.php";
echo "Sorun oluştu";

}


?>