<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torremar</title>

    <link rel="stylesheet" href="<?=base_url('css/site.css')?>"> 
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url('img/logoTorremar.jpg')?>">
    <link rel="stylesheet" href="<?=base_url('css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/templatemo.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/custom.css')?>">
    <script src="<?=base_url('js/jquery-1.11.0.min.js')?>"></script>
    <script src="<?=base_url('js/jquery-migrate-1.2.1.min.js')?>"></script>
    <script src="<?=base_url('js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('js/templatemo.js')?>"></script>
    <script src="<?=base_url('js/custom.js')?>"></script>

    <!-- Load fonts style after rendering the layout styles -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap"> -->
    <link rel="stylesheet" href="<?=base_url('/css/fontawesome.min.css')?>">
  </head>
<body>
<?php if(!isset($user)){ ?>
<nav class="navbar navbar-expand-lg navbar-light shadow">
      <div class="container d-flex justify-content-between align-items-center">
          <img src="<?= base_url()?>/img/logoTorremar.jpg" alt="" width="120">

          <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
              <div class="flex-fill">
                  <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                      <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= base_url(); ?>">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= site_url('aboutus'); ?>">Acerca de Nosotros</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= site_url('contact'); ?>">Contacto</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-item nav-link" href="<?= site_url('login'); ?>">Login</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </nav>
    <!-- Close Header -->

<?php } else { ?>
<nav class="navbar navbar-expand-lg navbar-light shadow">
      <div class="container d-flex justify-content-between align-items-center">
          <img src="<?= base_url()?>/img/logoTorremar.jpg" alt="" width="120">

          <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
              <div class="flex-fill">
                  <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('dashboard') ?>">Reservas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= site_url('roomsManage') ?>">Habitaciones</a>
                      </li>
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="right:-350px; position:relative;">
                        <span class="navbar-text">
                          Bienvenido <b> <?= $user['user_username']; ?></b>
                        </span>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url('logout') ?>">Salir</a>
                        </li>
                      </ul>
                  </ul>
              </div>
          </div>
      </div>
  </nav>
  <div class="container">
<?php } ?>
<br/>

<?php if(session('status') && session('status')==="success"){ ?>
    <div class="alert alert-success" role="alert">
        <?= session('msg');?>
    </div>
<?php }else if(session('status')==="error"){ ?>
  <div class="alert alert-danger" role="alert">
        <?= session('msg');?>
    </div>
    <?php } ?>





