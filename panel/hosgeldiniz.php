<?php
session_start();
if($_SESSION["oturum"] || $_SESSION["admin"]){







}else {

header("Location:../index.php");

}




?>