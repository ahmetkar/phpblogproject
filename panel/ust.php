<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

      <?php

      $c = $db->query("Select * from sitebilgi where id='5' ")->fetch();

      if($c["dizin"]=="0"){

       $dizin="http://".$_SERVER['SERVER_NAME'];

      }else {

     $dizin = "http://".$_SERVER['SERVER_NAME']."/".$c["dizin"];}

       ?>
        <!-- Logo -->
        <a href="<?php echo $dizin; ?>panel/index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>MG</b>M</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Magnetic</b>Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $dizin; ?>/img/<?php echo $_SESSION["resim"]; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION["adsoyad"]; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $dizin; ?>/img/<?php echo $_SESSION["resim"]; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION["kadi"]; ?>
                      <small><?php echo date("d.m.Y"); ?></small>
                    </p>
                  </li>
              
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo $dizin; ?>/panel/cikisyap.php" class="btn btn-default btn-flat">Çıkış yap</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $dizin; ?>/img/<?php echo $_SESSION["resim"]; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION["adsoyad"]; ?></p>
              <?php if($_SESSION["admin"]){ ?>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              <?php } ?>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Notlarınızda arayın..">
              <span class="input-group-btn">
                <button type="submit" name="ara" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Seçenekler</li>
            <li class="active treeview">
              <a href="<?php echo $dizin; ?>/panel/index.php">
                <i class="fa fa-dashboard"></i> <span>Ana sayfa</span> </i>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo $dizin; ?>/panel/notlar/index.php">
                <i class="fa fa-files-o"></i>
                <span>Notlar</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo $dizin; ?>/panel/notlar/notekle.php">
                <i class="fa fa-files-o"></i>
                <span>Not ekle</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo $dizin; ?>/panel/yorumlar/index.php">
                <i class="fa fa-pie-chart"></i>
                <span>Yorumlar</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo $dizin; ?>/panel/ayarlar/temelbilgiler.php">
                <i class="fa fa-edit"></i> <span>Bilgileri düzenle</span>
              </a> </li>
              <li class="treeview">
              <a href="<?php echo $dizin; ?>/panel/ayarlar/adminbilgiler.php">
                <i class="fa fa-edit"></i> <span>Admin bilgileri</span>
              </a> </li>
              <li class="treeview">
              <a href="<?php echo $dizin; ?>/panel/ayarlar/arkadasduzenle.php">
                <i class="fa fa-edit"></i> <span>Arkadaşları düzenle</span>
              </a> </li>
              <li class="treeview">
              <a href="<?php echo $dizin; ?>/panel/ayarlar/hakkimizdasayfasi.php">
                <i class="fa fa-edit"></i> <span>Hakkımızda sayfası</span>
              </a> </li>
    
            
        </section>
        <!-- /.sidebar -->
      </aside>