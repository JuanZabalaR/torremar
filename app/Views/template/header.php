<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torremar</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=base_url('css/site.css')?>">
  </head>
<body>
<?php if(!isset($user)){ ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Torremar Hospedaje</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="<?= base_url(); ?>">Inicio</a>
      <a class="nav-item nav-link" href="<?= site_url('aboutus'); ?>">Acerca de Nosotros</a>
      <a class="nav-item nav-link" href="<?= site_url('contact'); ?>">Contacto</a>
      <a class="nav-item nav-link" href="<?= site_url('login'); ?>">Login</a>
    </div>
  </div>
</nav>
<?php } else { ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Posada Torremar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= site_url('dashboard') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= site_url('roomsManage') ?>">Habitaciones</a>
        </li>
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <span class="navbar-text">
          Bienvenido <b> <?= $user['user_username']; ?></b>
        </span>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Salir</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php } ?>
    <div class="container principal">
<br/>
<br/>
<br/>
<div class = "container">
<?php if(session('msg')){ ?>
    <div class="alert alert-danger" role="alert">
        <?= session('msg');?>
    </div>
<?php } ?>




