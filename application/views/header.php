<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bibli Social</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/dellano/includes/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/dellano/includes/plugins/font-awesome-4.5.0/css/font-awesome.min.css">
  <!-- Ionicons 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dellano/includes/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dellano/includes/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="/dellano/includes/dist/css/demo.css">
  <!-- iCheck -->
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/dellano/includes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="/dellano/includes/plugins/nvd3/build/nv.d3.css">
  <link rel="stylesheet" href="/dellano/includes/plugins/rakingsttar/css/rating.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/dellano/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Bibli</b>Social</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Bibli</b>Social</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Menu</span>
      </a>

      <div class="navbar-custom-menu">
        
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
          <p style="height: '260px'"></p>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('Nome'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>

      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <li class="treeview">
          <a href="#">
            <a href="/dellano/cadastrar/perfil"><i class="fa fa-user"></i>Perfil</a></i>
          </a>
        </li>
        <li><a href="/dellano/noticias/"><i class="fa fa-newspaper-o"></i>Notícias</a></li>
        <li><a href="/dellano/livro/meusLivros"><i class="fa fa-book"></i>Livros que estou Lendo</a></li>
        <li><a href="/dellano/livro/livrosLidos"><i class="fa fa-book"></i>Livros Lido</a></li>
        <li><a href="/dellano/livro/livrosParaLer"><i class="fa fa-book"></i>Livros Para Ler</a></li>
        <li><a href="/dellano/charts/emprestimoMes"><i class="fa fa-pie-chart"></i>Emprestimos por Mês</a></li>
        <li><a href="/dellano/charts/generos"><i class="fa fa-pie-chart"></i>Gêneros mais Solicitados</a></li>
        <li><a href="/dellano/charts/livros"><i class="fa fa-pie-chart"></i>Livros mais Solicitados</a></li>
        <li><a href="/dellano/charts/editoras"><i class="fa fa-pie-chart"></i>Editoras mais Solicitadas</a></li>
        <li><a href="/dellano/evento"><i class="glyphicon glyphicon-sunglasses"></i>Eventos</a></li>
        <li><a href="/dellano/login/logout"><i class="fa fa-sign-out"></i>Sair</a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>