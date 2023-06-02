<?php
include "../set/func.php";
include "../set/ayarlar.php";

$ipadres = GetIP();
$yaziid = $_POST["yaziid"];
$tarayici = $_SERVER["HTTP_USER_AGENT"];


$islem2 = $db->prepare("delete from notislem where
	yaziid=? && 
	diss=? &&
	ipadres=? &&
	tarayici=?");

$vazgec2 = $islem2->execute(array($yaziid,"1",$ipadres,$tarayici));
if($vazgec2){
header("Location:../not.php?id=".$yaziid."");

}else {
include "../arayuz/sol.php";
echo "Sorun oluştu";

}

?>