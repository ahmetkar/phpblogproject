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
            Notu düzenle
            <small>Seçili olan notu düzenliyorsunuz..</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
              <?php 
              $id = $db->quote(@$_GET["id"]);
              $nck = $db->query("Select * from notlar where id=$id ")->fetch();

              if($_POST){

              $metin = $_POST["editor1"];

              $baslik = htmlspecialchars($_POST["baslik"]);

              $etiketler = htmlspecialchars($_POST["etiketler"]);

              $katagori = $_POST["katagori"];
              $geciciad = $_FILES["resim"]["tmp_name"];
              if(!empty($geciciad)){
              $tamad = rand(0,9999999).$_FILES["resim"]["name"];
              $kaliciyol = "../../img/".$tamad;

              if($_FILES["resim"]["error"]){

                echo "Hata : ".$_FILES["resim"]["error"];
              }else {

               if(file_exists($kaliciyol)){

                echo "Böyle bir dosya var.";
               }else {

                if(move_uploaded_file($geciciad, $kaliciyol)){
                  echo "Resim başaryıla yüklendi";
                  
                }else {

                  echo "Dosya yüklenemedi<br>";
                }


               }

              }
}
              $ek = $db->prepare("update notlar set
                baslik=?,
                metin=?,
                etiketler=?,
                resimurl=?,
                katagori=?
                where id=?");

              $yid = $_GET["id"];

              $duzenle = $ek->execute(array($baslik,$metin,$etiketler,$tamad,$katagori,$yid));
              if($duzenle){

                echo "Başarıyla düzenlendi";
              }else {

                echo "Bir sorun var";
              }



            }
              ?>
                <div class="box-header">
                <form action="" method="post" enctype="multipart/form-data">
                <span>Başlık : </span><br>
                  <h3 class="box-title"><input style="width:800px" class="form-control" type="text" name="baslik" placeholder="Başlık girin." value="<?php echo $nck["baslik"]; ?>" /> <small><?php echo $nck["tarih"]; ?></small></h3><br>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  
                    <textarea cols="50" rows="30" id="editor1" name="editor1">
                                            <?php echo $nck["metin"]; ?>
                    </textarea>
                    <br>
                    <span>Etiketler : </span><br>
                    <input class="form-control" type="text" name="etiketler" placeholder="Etiketleri girin" value="<?php echo $nck["etiketler"]; ?>" />
                   
                   <br> <span><b>Mevcut katagori :</b> <?php 

                    $ktid = $nck["katagori"];

                    $cek = $db->query("Select * from katagori where id='$ktid' ")->fetch();

                    echo $cek["katagoriad"];

                     ?> </span><br>
                      <span>Katagori seçin : </span><br>
                    <select name="katagori">
                    <?php 
                    $kcek = $db->query("Select * from katagori");
                    foreach($kcek as $kt){
                    ?>
                     <option value="<?php echo $kt["id"]; ?>" name="<?php echo $kt["katagoriad"]; ?>"><?php echo $kt["katagoriad"]; ?></option> 
                     <?php } ?>
                    </select> <br>
                    Mevcut resim  : <br>
                    <img src='../../img/<?php echo $nck["resimurl"]; ?>' alt='temsiledenresim' width="150" height="150" /><br>
                    Yazıyı temsil edecek resmi yükleyin  :   
                    <input value="<?php echo $nck["resimurl"]; ?>" accept="image/*" type="file" class="form-control" name="resim" /><br>

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