
<?php 
session_start();
include "../../set/ayarlar.php";
if($_SESSION["admin"] && $_SESSION["oturum"]){
include "../ust.php";

$q = $_GET["q"];


$ara = $db->query("Select * from notlar where baslik like '%$q%' ");

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
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
<script type="text/javascript">
$("a#duzenle").click(function(){


var hedef = $("input[type=checkbox]:checked").attr("id");

$("a#duzenle").attr({
"href": "notduzenle.php?id="+hedef+"" 
});



});


$("button#remove").click(function(){

var idal = $("input[type=checkbox]:checked").attr("id");


$.post("notsil.php",{"aid":idal},function(){


alert("Notu başarıyla sildiniz..");

});

});
</script>
<style></style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section style="margin-left:-200px"  class="content-header">
          <h1>
            Notlarda ara
           
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div style="margin-left:-200px"  class="col-md-3">
              <a id="duzenle" class="btn btn-primary btn-block margin-bottom">Seçilen notu Düzenle</a>
              <div class="box box-solid">
              
              </div><!-- /. box -->
             
            </div><!-- /.col -->
            <div class="col-md-9">
              <div id="onaylanan" style="float:left;"  class="box box-primary">
                <div  class="box-header with-border">
                  <h3 class="box-title">Onaylanan Yorumlar</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                    <form action="" method="get">
                      <input type="text" name="q" class="form-control input-sm" placeholder="Yorumlarda ara">
                      <span type="submit" class="glyphicon glyphicon-search form-control-feedback"></span>
                      </form>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                  
                    <div class="btn-group">
                    <form action="" method="post">
                      <button type="submit" id="remove" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
             
                    <a href='index.php'><button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
                    </div><!-- /.btn-group -->
                    
                   </form> <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                     <?php foreach($ara as $ar){ ?>
                        <tr>
                          <td><input name="<?php echo $ar["id"]; ?>" type="checkbox"></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="yorumduzenle.php?id=<?php echo $ar["id"]; ?>"><?php echo $ar["baslik"]; ?></a></td>
                          <td class="mailbox-subject"><?php $ktid = $ar["katagori"];

                          $ktcek = $db->query("Select * from katagori where id='$ktid' ")->fetch();

                          echo $ktcek["katagoriad"]; ?></td>
                          <td class="mailbox-attachment"><?php echo $ar["aciklama"]; ?></td>
                          <td class="mailbox-date"><?php echo $ar["tarih"]; ?></td>
                        </tr>

                       <?php


                        }
if(!@$ar){

                       	echo "Sonuç bulunamadı";
                       }
                       

                        ?>
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <div class="btn-group">
                    <form action="" method="post">
                      <button type="submit" id="remove" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
        
                    <a href='index.php'><button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
                    </div><!-- /.btn-group -->
                    
                   </form> <!-- /.btn-group -->
            
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                </div>
              </div><!-- /. box -->

              <!-- onaylanmayan-->
              
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     

                  

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


?>