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
            Hakkımda metnini düzenle
            <small>Hakkımda sayfasını düzenliyorsunuz...</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
              <?php 
              
              $cek = $db->query("Select * from hakkimda where id='1' ")->fetch();

                if($_POST){

              $baslik = $_POST["baslik"];
              $metin = $_POST["editor1"];


              $geciciad = $_FILES["resim"]["tmp_name"];
              if(!empty($geciciad)){
              $tamad = rand(0,99999999).$_FILES["resim"]["name"];
              $tamyol = "../../img/".$tamad;

              if($_FILES["resim"]["error"]){

              echo "Hata : ".$_FILES["resim"]["error"]."<br>";

              }else {

              if(file_exists($tamyol)){
                echo "böyle bir dosya var";
              }else {


              if(move_uploaded_file($geciciad, $tamyol)){

                echo "Resim başarıyla yüklendi<br>";

              }else {echo "Resim yüklenemedi<br>";} 


              }

              }

}



              $hk = $db->prepare("update hakkimda set
                baslik=?,
                metin=?,
                ustresim=?

                where id=?
                ");

              $gunc = $hk->execute(array($baslik,$metin,$tamad,"1"));

              if($gunc){

                echo "Güncelleme tamamlandı";
              }else {echo "Bir sorun oluştu";}

            }
              ?>
                <div class="box-header">
                <form action="" method="post" enctype="multipart/form-data">
                <span>Başlık : </span><br>
                  <h3 class="box-title"><input style="width:800px" class="form-control" type="text" name="baslik" placeholder="Başlık girin." value="<?php echo $cek["baslik"]; ?>" /> </h3><br>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  
                    <textarea cols="50" rows="30" id="editor1" name="editor1">
                                            <?php echo $cek["metin"]; ?>
                    </textarea><br>
                  
                    Mevcut resim  : <br>
                    <img src='../../img/<?php echo $cek["ustresim"]; ?>' alt='temsiledenresim' width="650" height="250" /><br>
                    Yazıyı temsil edecek resmi yükleyin  :   
                    <input value="<?php echo $nck["ustresim"]; ?>" accept="image/*" type="file" class="form-control" name="resim" /><br>

                    <input style="float:right;margin:5px" class="btn btn-info btn-sm" type="submit" value="Düzenle" />
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