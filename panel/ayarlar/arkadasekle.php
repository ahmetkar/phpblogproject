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
           Arkadaşlar
            <small>Arkadaşlarınızı görüntüleyin ve düzenleyin...</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">

            <div class="col-md-12">
              <div class="box box-info">
              <?php 
            
              if($_POST){

                $arkadasad = $_POST["arkadasad"];
                $resimurl = $_POST["arkadasresimurl"];
                $siteurl = $_POST["siteurl"];

                if(!empty($arkadasad) && !empty($resimurl) && !empty($siteurl)){

                $ekle = $db->prepare("insert into arkadaslar set
                  isim=?,
                  siteurl=?,
                  resim=?");

                $tamamla = $ekle->execute(array($arkadasad,$siteurl,$resim));

                if($tamamla){

                  echo "Arkadaşı başarıyla eklediniz.";
                }else {

                  echo "Bir sorun oluştu daha sonra tekrar deneyin";
                }



}
            }
              ?>

                <div class="box-header">
                <a href='arkadasduzenle.php'>
                <input style="float:right;margin-left:
                3px" class="btn btn-info btn-sm" type="button" value="Geri dön" /></a>
                <form action="" method="post">
        
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  
                 
                      <span>Arkadaş isim :</span><br>
                    <input class="form-control" type="text" placeholder="Arkadaşınızın adı :"  name="arkadasad" placeholder="İsim girin"/>
              
                    <span>Arkadaş  resim url :</span><br>
                    <input class="form-control" type="text" placeholder="Arkadaşınızın resmi :"  name="arkadasresimurl" placeholder="Katagori adı girin"/>
                    
                     <span>Arkadaş  site url :</span><br>
                    <input class="form-control" type="text" placeholder="Arkadaşınızın sitesi :" name="siteurl" placeholder="Katagori adı girin"/>

                  
                  
                   
                    <input style="float:right;margin:5px" class="btn btn-info btn-sm" type="submit" value="Arkadaş ekle" />
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