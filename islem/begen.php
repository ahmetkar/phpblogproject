<?php
include "../set/func.php";
include "../set/ayarlar.php";

$tarih = date("d.m.Y");
$ipadres = GetIP();
$yaziid = $_POST["yaziid"];
$tarayici = $_SERVER["HTTP_USER_AGENT"];


if(empty($yaziid)){

echo "Bu işlem gerçekleşemez";

}else {

$islem = $db->prepare("insert into notislem set
	yaziid=?,
	begeni=?,
	ipadres=?,
	tarayici=?,
	tarih=?");

$begen = $islem->execute(array($yaziid,"1",$ipadres,$tarayici,$tarih));
}
if($begen){
header("Location:../not.php?id=".$yaziid."");

}else {
include "../arayuz/sol.php";
echo "Sorun oluştu";

}


?>