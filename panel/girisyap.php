<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin paneline giriş yapın</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index.php"><b>Magnetik</b>Kişisel blog</a>
      </div><!-- /.login-logo -->

<?php 
session_start();
if(@$_SESSION["admin"]){

echo "<meta http-equiv='refresh' content='0;URL=index.php'> ";

}else {


if($_POST){
include "../set/ayarlar.php";
$kadi = $_POST["kadi"];
$sifre = md5($_POST["sifre"]);

if(empty($kadi) && empty($sifre)){

echo "Boş yer bırakmayın";

}else {

$dogrula = $db->query("Select * from administrator where kadi='$kadi' && sifre='$sifre' ")->fetch();

if($dogrula){
session_start();
$_SESSION["oturum"]=true;
$_SESSION["kadi"]=$dogrula["kadi"];
$_SESSION["adsoyad"]=$dogrula["adsoyad"];
$_SESSION["resim"]= $dogrula["resimurl"];
if($dogrula["kimlik"]==10){
$_SESSION["admin"]=true;
header("Location:index.php");
}



}else {

echo "Kullanıcı adını veya şifreyi kontrol edin";

}


}


}else {
?>

      <div class="login-box-body">
        <p class="login-box-msg">Kullanıcı adı ve şifreyi gir giriş yap</p>
          <form action="" method="post">
          <div class="form-group has-feedback">
            <input name="kadi" type="text" class="form-control" placeholder="Kullanıcı adı">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="sifre" type="password" class="form-control" placeholder="Şifre">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input value="Giriş yap" type="submit" class="btn btn-primary btn-block btn-flat">
            </form>
            </div><!-- /.col -->
          </div>
    <?php } } ?>

        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
