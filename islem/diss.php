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
$islem2 = $db->prepare("insert into notislem set
	yaziid=?,
	diss=?,
	ipadres=?,
	tarayici=?,
	tarih=?");

$diss = $islem2->execute(array($yaziid,"1",$ipadres,$tarayici,$tarih));
}
if($diss){
header("Location:../not.php?id=".$yaziid."");

}else {
include "../arayuz/sol.php";
echo "Sorun oluştu";

}

?>