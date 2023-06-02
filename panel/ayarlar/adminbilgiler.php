<!DOCTYPE html>
<html>
  <head>
  
  <meta charset="UTF-8">
<?php
session_start();
  include "../../set/ayarlar.php";
  include "../ust.php";
  if($_SESSION["oturum"]){
 ?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Yönetici bilgileri
            <small>Gözüken yönetici bilgilerini düzenleyin..</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
              <?php 
               $bc = $db->query("Select * from administrator where kimlik='10' ")->fetch(); 
              if($_POST){

                if(!empty($_POST["eskisifre"]) && md5($_POST["eskisifre"])==$bc["sifre"]){
                $adsoyad = $_POST["adsoyad"];
                $kadi = $_POST["kadi"];

                if(!empty($_POST["yenisifre"])){


                $yenisifre = md5($_POST["yenisifre"]);
              }else {

                $yenisifre = md5($_POST["eskisifre"]);

              }


              $geciciad = $_FILES["aresim"]["tmp_name"];
              if(!empty($geciciad)){
              $tamad = rand(0,999999).$_FILES["aresim"]["name"];
              $kaliciyol = "../../img/".$tamad;

              if($_FILES["aresim"]["error"]){

                echo "Hata : ".$_FILES["aresim"]["error"];
              }else {

                if(file_exists($kaliciyol)){


                  echo "Böyle bir profil resmi var";



                }else {

                if(move_uploaded_file($geciciad, $kaliciyol)){

                  echo "Profil resmi yüklendi<br>";

                }else {

                  echo "Dosya yüklenemedi<br>";

                }


                }


              }
}

                $al = $db->prepare("update administrator set 
                  kadi=?,
                  sifre=?,
                  adsoyad=?,
                  resimurl=?

                  where kimlik=?

                  ");

                 $guncel = $al->execute(array($kadi,$yenisifre,$adsoyad,$tamad,"10")); 

                 if($guncel){echo "Güncelleme tamamlandı";}else {echo "Sorun var";}

             }
            }
              ?>
                <div class="box-header">
                <form action="" method="post" enctype="multipart/form-data">
        
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  
                  
                      <span>Ad ve soyad : </span><br>
                    <input class="form-control" type="text" value="<?php echo $bc["adsoyad"]; ?>" name="adsoyad" placeholder="Ad ve soyad"/>
                    <span>Kullanıcı adı : </span><br>
                    <input class="form-control" type="text" name="kadi" value="<?php echo $bc["kadi"]; ?>" placeholder="Arama motorlarında siteyi temsil edecek bir açıklama"/><br>

                      <span>Eski şifre: (*Girmek zorunludur) </span><br>
                    <input class="form-control" type="password" name="eskisifre"  placeholder="Eski şifrenizi girin.."/>

                     <span>Yeni şifre: (+İsteğe bağlıdır) </span><br>
                    <input class="form-control" type="password" name="yenisifre"  placeholder="Yenilemek istiyorsanız yeni şifrenizi girin.."/>

                     <span>Admin resmi: </span><br>
                    <input class="form-control" type="file" name="aresim" value="/prot/img/<?php echo $bc["resimurl"]; ?>" placeholder="Admin profil resmi yükleyin."/>

                    <span>Mevcut admin resmi : </span><br>
                        <img src='/prot/img/<?php echo $bc["resimurl"]; ?>' width='150' height='150'><br><br>

              
                    <input style="float:right;margin:5px" class="btn btn-info btn-sm" type="submit" value="Bilgileri güncelle" />
                     <br>

                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      

      
<?php } 
include "../alt.php";
?>

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
 </body>
</html>