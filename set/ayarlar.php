<html>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/HTML; charset=ISO-8859-9" />
</html>
<?php

try {
	
	$baglanti = "mysql:host=host;dbname=vtadi;charset=utf8;";
	
	$db =new PDO($baglanti,"kullaniciadi","sifre");
	$db->query("SET CHARACTER SET ISO-8859-9");

	
}catch(PDOException $e){
	
	print $e->getMessage();
	
	
}



?>