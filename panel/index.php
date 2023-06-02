<?php  
session_start();
include "../set/ayarlar.php";
if($_SESSION["admin"] && $_SESSION["oturum"]){
include "ust.php";
?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Hoşgeldiniz
                <small class="pull-right">Tarih : <?php echo date("d.m.Y"); ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <h3>Yeni gelen mesajlar</h3>

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>İD</th>
                    <th>Başlık</th>
                    <th>Tarih</th>
                    <th>Mesaj</th>
                    <th>Email</th>
                    <th>İp adresi</th>
                  </tr>
                </thead>
                <?php 
                 $cek = $db->query("Select * from iletisim order by id desc limit 0,7");
                 $cek2 = $db->query("Select * from yorumlar order by id desc limit 0,7");

                foreach($cek as $c){
                 ?>
                
                <tbody>
                  <tr>
                    <td><?php echo $c["id"]; ?></td>
                    <td><?php echo $c["baslik"];?></td>
                    <td><?php echo $c["tarih"];?></td>
                    <td><?php echo $c["metin"];?></td>
                    <td><?php echo $c["email"]; ?></td>
                    <td><?php echo $c["ipadres"]; ?></td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div><!-- /.col -->
            <div style='margin-right:20px' class="row no-print">
            <div class="col-xs-12">
              
            </div>
          </div><!-- /.row -->

         
          
            </div><!-- /.col -->
            <h3>Son yorumlar</h3>

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>İD</th>
                    <th>Yazıid</th>
                    <th>Tarih</th>
                    <th>Mesaj</th>
                    <th>Email</th>
                    <th>İp adres</th>
                  </tr>
                </thead>
                <?php foreach($cek2 as $d){ ?>
                <tbody>
                  <tr>
                    <td><?php echo $d["id"];?></td>
                    <td><?php echo $d["yaziid"];?></td>
                    <td><?php echo $d["tarih"];?></td>
                    <td><?php echo $d["yorum"];?></td>
                    <td><?php echo $d["email"];?></td>
                    <td><?php echo $d["ipadres"];?></td>
                  </tr>
                 
                </tbody>

              <?php  }?>
              </table>
            </div><!-- /.col -->
            <div style='margin-right:20px' class="row no-print">
            <div class="col-xs-12">
              <a href='../index.php'><button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Siteye git</button></a>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Yenile</button>
            </div>
          </div><!-- /.row -->

         
          
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          
          </div>
        </section>

                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.box -->

            </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <?php include "alt.php"; ?>
  </body>
</html>
<?php }else {
header("Location:girisyap.php");
} ?>