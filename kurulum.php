<!DOCTYPE html>
<html>
  <head>
  
  <meta charset="UTF-8">
<?php
  include "set/ayarlar.php";
 ?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="panel/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="panel/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="panel/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="panel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 
      
<?php

$sayfa = @$_GET["sq"];


switch($sayfa){

case "baslangic";
?>
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Kurulum
            <small>Kurulmun ilk adımını gerçekleştiriyorsunuz.</small>
            <small>Temel bilgilerinizi bu adımda girin.</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
              <?php 
               $bc = $db->query("Select * from sitebilgi where id='5' ")->fetch(); 
              if($_POST){

                $sitebaslik = $_POST["sitebaslik"];
                $aciklama = $_POST["aciklama"];
                $etiket = $_POST["etiket"];
                $title = $_POST["title"];
                $fb= $_POST["fb"];
                $google = $_POST["google"];
                $bh = $_POST["bh"];
                $copyright = $_POST["footercop"];


                $geciciad = $_FILES["slogo"]["tmp_name"];
               
                if(!empty($geciciad)){
                $kaliciad = rand(0,99999999).$_FILES["slogo"]["name"];
                $kaliciyol = "../../img/".$kaliciad;

                if($_FILES["slogo"]["error"]){

                  echo "Hata : ".$_FILES["slogo"]["error"]."<br>
                  ";
                 if($_FILES["slogo"]["error"]==4){
                  echo "Resim yüklemediniz<br>";
                 } 
                }else {

                  if(file_exists($kaliciyol)){
                    echo "Böyle bir dosya var";

                  }else {

                  if(move_uploaded_file($geciciad, $kaliciyol)){

                    echo "Logo başarıyla yüklendi<br>";

                  }else {

                    echo "Yüklenirken sorun oluştu";
                  } 


                  }


                }
}else {

  $kaliciad = $bc["logourl"];

  
}

            
                $gunc = $db->prepare("update sitebilgi set
                  sitebaslik=?,
                  fburl=?,
                  behanceurl=?,
                  logourl=?,
                  siteaciklama=?,
                  etiketler=?,
                  title=?,
                  googleurl=?,
                  copyright=?

                  where id=?");

                $guncelle = $gunc->execute(array($sitebaslik,$fb,$bh,$kaliciad,$aciklama,$etiket,$title,$google,$copyright,"5"));


                $dizin = $_POST["dizin"];

                $yeni = $db->prepare("update sitebilgi set
                  dizin=?,

                  where id=?");

                $guncel = $yeni->execute(array($dizin,"5"));


                if($guncelle){

                  echo "Site bilgileri başarıyla güncellendi";
                  echo "<meta http-equiv='refresh' content='0;URL=kurulum.php?sq=adim2'> ";
                }else {

                  echo "Bilgiler eklenirken bir sorun oluştu";

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
                  
                  
                      <span>Site başlığı : </span><br>
                    <input class="form-control" type="text" value="<?php echo $bc["sitebaslik"]; ?>" name="sitebaslik" placeholder="Katagori adı girin"/>
              
                    <span>Site Açıklama(meta keywords) : </span><br>
                    <input class="form-control" type="text" name="aciklama" value="<?php echo $bc["siteaciklama"]; ?>" placeholder="Arama motorlarında siteyi temsil edecek bir açıklama"/><br>

                      <span>Etiketler: </span><br>
                    <input class="form-control" type="text" name="etiket"  value="<?php echo $bc["etiketler"]; ?>"placeholder="site için etiketleri girin.."/>

                     <span>Site başlığı(title): </span><br>
                    <input class="form-control" type="text" name="title" value="<?php echo $bc["title"]; ?>" placeholder="Tarayıcıların tanıyacağı başlık"/>

                     <span>Site logosu(162x22 boyutunda olmasına dikkat edin): </span><br>
                    <input class="form-control" type="file" name="slogo" value="/prot/img/<?php echo $bc["logourl"]; ?>" placeholder="Site logosu yükleyin"/>

                    <span>Mevcut site logosu : </span><br>
                        <img src='/prot/img/<?php echo $bc["logourl"]; ?>' width='162' height='22'><br><br>

                     <span>Facebook: </span><br> 
                    <input class="form-control" type="text" name="fb" value="<?php echo $bc["fburl"]; ?>" placeholder="Facebook adresiniz"/>

                     <span>Google : </span><br>
                    <input class="form-control" type="text" name="google" value="<?php echo $bc["googleurl"]; ?>" placeholder="Google url"/>

                     <span>Behance : </span><br>
                    <input class="form-control" type="text" name="bh" value="<?php echo $bc["behanceurl"]; ?>" placeholder="behance url"/><br>

                        <span>Copyright yazısı: </span><br>
                    <input class="form-control" type="text" name="footercop" value="<?php echo $bc["copyright"]; ?>" placeholder="Copyright yazısı"/>

                     <span>Dizininiz (Eğer site dosyalarını site içinde başka bir dosyaya attıysanız o dosyanın ismini alta yazın): </span><br>
                    <input class="form-control" type="text" name="dizin" placeholder="Dosyaları attığınız dosya ismi"/>
                    <br>
                    <span>Eğer direk siteye attıysanız dizini boş geçiniz</span><br>
                    <input style="float:right;margin:5px" class="btn btn-info btn-sm" type="submit" value="Bilgileri güncelle" />
                     <br>

                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
<?php 
break;
case "adim2";
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Kurulum
            <small>Kurulmun ikinci adımını gerçekleştiriyorsunuz.</small>
            <small>Yöneticilik bilgilerinizi bu adımda girin..</small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
              <?php 
              if($_POST){

                $adsoyad = $_POST["adsoyad"];
                $kadi = $_POST["kadi"];

                
                $yenisifre = md5($_POST["yenisifre"]);
              


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

                $admn = $db->prepare("update administrator set 
                  kadi=?,
                  sifre=?,
                  adsoyad=?,
                  resimurl=?

                  where kimlik=?

                  ");

                 $degistirs = $admn->execute(array($kadi,$yenisifre,$adsoyad,$tamad,"10")); 

                 if($degistirs){

             $xx = $db->prepare("update sitebilgi set
              kurulum=?
  where id=?
");

   $degis = $xx->execute(array("1","5"));

if($degis){

header("Location:index.php");

}else {

echo "Kurulum başarlı siteye girin ve kurulum.php yi silin";
}

             }else {echo "Sorun var";}

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
                  
                  <?php  ?>
                      <span>Ad ve soyad (*Zorunludur): </span><br>
                    <input class="form-control" type="text"  name="adsoyad" placeholder="Ad ve soyad"/>
                    <span>İstediğiniz panel Kullanıcı adı(*Zorunludur) : </span><br>
                    <input class="form-control" type="text" name="kadi"  placeholder="Kullanıcı adınız"/><br>
                     <span>İstediğiniz panel şifresi: (*Zorunludur) </span><br>
                    <input class="form-control" type="password" name="yenisifre"  placeholder="Şifrenizi girin.."/>

                     <span>Admin resmi(+isteğe bağlı): </span><br>
                    <input class="form-control" type="file" name="aresim"  placeholder="Admin profil resmi yükleyin."/>
              
                    <input style="float:right;margin:5px" class="btn btn-info btn-sm" type="submit" value="Tamamla ve devam et" />
                     <br>

                  </form>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
<?php 
break;
} ?>

    <!-- jQuery 2.1.4 -->
    <script src="panel/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="panel/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="panel/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="panel/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="panel/dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="panel/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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