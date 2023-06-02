<?php  
session_start();
include "../../set/ayarlar.php";
if($_SESSION["admin"] && $_SESSION["oturum"]){
include "../ust.php";
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        
 <div class="content-wrapper">
 <?php

$id = $db->quote(@$_GET["id"]);



  ?>
        <!-- Content Header (Page header) -->
        <section style="margin-left:-200px" class="content-header">
          <h1>
            Düzenle
            <small>13 new messages</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mailbox</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div style="margin-left:-200px" class="col-md-3">
              <a href="index.php" class="btn btn-primary btn-block margin-bottom">Yorumlara geri dön</a>
             
              
            </div><!-- /.col -->
            <div class="col-md-9">
            
              <div class="box box-primary">
                <div class="box-header with-border">
              
                  <h3 class="box-title">Yorumu düzenle</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php 

            $ycek = $db->query("Select * from yorumlar where id=$id ")->fetch();

 if(empty($_GET["id"])){

echo "Herhangi bir yorum seçmediniz";

echo "<meta http-equiv='refresh' content='1;URL=index.php'>";

}
            
            if($_POST){

            $adsoyad = $_POST["adsoyad"];
            $email = $_POST["email"];
            $yorum = trim($_POST["yorum"]);
            $onay = $_POST["onayk"];
            $yid = @$_GET["id"];
             
            if(empty($adsoyad) && empty($email) && empty($yorum)){

              echo "boş yer bırakmayın";
            }else {

              $gunc = $db->prepare("update yorumlar set
                adsoyad=?,
                email=?,
                yorum=?,
                onay=?
                
                where id=?

                ");
              $ygunc = $gunc->execute(array($adsoyad,$email,$yorum,$onay,$yid));

              if($ygunc){
                echo "Başarıyla güncellendi";
                echo '<a href="yorumduzenle.php?id='.$_GET["id"].'"><button class="btn btn-default"><i class="fa fa-pencil"></i> Geri dön</button></a>';

              }else {

                echo "Bağlantıda sorun var.. Not : veritabanı hatası";
              }


            }

            }else {

            ?>
                <form action="" method="post">
                  <div class="form-group">
                    <input name="adsoyad" class="form-control" value="<?php echo $ycek["adsoyad"]; ?>">
                  </div>
                  <div class="form-group">
                    <input name="email" class="form-control" value="<?php echo $ycek["email"]; ?>">
                  </div>
                  <div class="form-group">
                    <textarea name="yorum"  style="height:150px"  id="compose-textarea"class="form-control" >
                     <?php echo $ycek["yorum"]; ?>
                    </textarea>
                 
                  </div>
                  <div class="form-group">
                   <select name="onayk">
                   <option name="onayla" value="1">Onayla</option>
                   <option name="onaylama" value="0">Onayı kaldır</option>
                   </select> 
                  </div>  
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-default"><i class="fa fa-pencil"></i> Düzenle</button>
                 </form>
                 <?php } ?>
                  </div>
                
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
   
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <?php include "../alt.php"; ?>
  </body>
</html>
<?php }else {
header("Location:girisyap.php");
} ?>