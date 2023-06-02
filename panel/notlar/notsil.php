<?php

include "../../set/ayarlar.php";

session_start();

if($_SESSION["oturum"]){

$alid = $_POST["aid"];

$sec = $db->prepare("Delete from notlar where id=?");
$delete = $sec->execute(array($alid));

if($delete){echo "silindi";}else {echo "silinemedi";}

}else {

header("Location:index.php");

}



?>