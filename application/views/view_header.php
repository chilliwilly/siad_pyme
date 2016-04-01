<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Operaciones - Claro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()?>dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/Tablas.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
    
    <script src="<?php echo base_url()?>plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <script src="<?php echo base_url()?>js/jquery.ajaxfileupload.js"></script>
  </head>
  <!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
  <body class="hold-transition skin-red layout-boxed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Claro</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIAD PYME</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Minimizar Menu</span>
          </a>

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url();?>img/Claro.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo 'Conectado como: '.$this->session->userdata('USRNAME'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url();?>img/Claro.png" class="img-circle" alt="User Image">
                    <p>
                      <?php 
                        echo $this->session->userdata('NOMBRE').' '.$this->session->userdata('APELLIDOS');                                       
                      ?>
                      <small><?php echo $this->session->userdata('ALIADONOMBRE'); ?></small>
                      <small><?php echo 'Rol: '.$this->session->userdata('USRROLNOM'); ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-6 text-center">
                      <a href="#">Contraseña</a>
                    </div>
                    <div class="col-xs-6 text-center">
                      <a href="#">Cuenta</a>
                    </div>
                    <!--<div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>-->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url();?>login/CerrarSesion" class="btn btn-default btn-flat">Cerrar Sesion</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>            
            <?php 
              $contador  = 0;
              $LineaTemp = 0;
              $IdMenu    = 0;
              session_start();
              $ArrayMenu = $_SESSION['Menu'];              

              foreach ($ArrayMenu as $key => $value) {
              # code...
                $linea    = $value->menu_grupo;
                $url      = $value->menu_url;
                $IdMenu   = $value->menu_id;
                $cierre   = $value->menu_cierre;

                if($linea==0){
                  $LineaTemp = $value->menu_id;
                  //echo '<li>';
                  echo '<li class="treeview"><a href="'.base_url().$url.'"><i class="fa fa-book"></i><span>'.$value->menu_nombre.'</span><i class="fa fa-angle-right pull-right"></i></a>';//</li>';
                  //echo '<div>';
                  //echo '</li>';
                  echo '<ul class="treeview-menu">';
                  foreach ($ArrayMenu as $key => $valued) {
                    # code...
                    if($valued->menu_grupo == $LineaTemp && $this->session->userdata('TIPOUSUARIO') == 3 && $valued->menu_id == 3){
                      //MUESTRA EL SUBMENU ORDENES PARA EL ALIADO
                      echo '<li><a href="'.base_url().$valued->menu_url.'/aliado"><i class="fa fa-book"></i>'.$valued->menu_nombre.'<i class="fa fa-angle-right pull-right"></i></a></li>';
                    }elseif ($valued->menu_grupo == $LineaTemp && $valued->menu_id != 3) {
                      # code...
                      //MUESTRA EL RESTO DE SUBMENU PARA <>Admin EXCLUYENDO LISTAR ORDENES
                      echo '<li><a href="'.base_url().$valued->menu_url.'"><i class="fa fa-book"></i>'.$valued->menu_nombre.'<i class="fa fa-angle-right pull-right"></i></a></li>';
                    }elseif ($valued->menu_grupo == $LineaTemp && $this->session->userdata('TIPOUSUARIO') != 3) {
                      # code...
                      //MUESTRA SUBMENU PARA ADMIN
                      echo '<li><a href="'.base_url().$valued->menu_url.'"><i class="fa fa-book"></i>'.$valued->menu_nombre.'<i class="fa fa-angle-right pull-right"></i></a></li>';
                    }
                  }             
                }

                // if($linea == $LineaTemp){
                //   echo '<li><a href="'.base_url().$url.'"><i class="fa fa-book"></i>'.$value->menu_nombre.'<i class="fa fa-angle-right pull-right"></i></a></li>';
                // }

                if($linea == 0){//($cierre == 1){//($url == "usuarios" or $url == "ventas" or $url == "ordencompra" or $url == "reportes"){
                  echo '</ul>';
                  echo '</li>'; 
                }
              }
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <!--<h1>
      Inicio
      <small>Blank example to the boxed layout</small>
    </h1>-->
  </section>   