<?= $header ?>
<div class="col md-12">
    <h2> Bienvenido al administrador de Reservas </h2>
    <p> Aca podras administrar tu sistema de habitaciones y reservas </p>
    <br/>
    <h3>Reservas</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Id de Habitaciones</th>
      <th scope="col">Adultos</th>
      <th scope="col">Entrada</th>
      <th scope="col">Salida</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php
if(count($bookings) != 0){
    $count = 1;
    foreach($bookings as $book){
                ?>
    <tr>
      <th scope="row"><?= $count ?></th>
      <td><?= $book['res_name']; ?></td>
      <td><?= $book['res_rooms']; ?></td>
      <td><?= $book['res_adult']; ?></td>
      <td><?= $book['res_entry']; ?></td>
      <td><?= $book['res_exit']; ?></td>
      <td><?php if ($book['res_approved'] == 1){ ?>
              Aprovado
          <?php }else if($book['res_approved'] == 2){ ?>
              Rechazado
          <?php }else{ ?>   
              <a href="<?= site_url('aprobar/'.$book['res_id']); ?>" class="btn btn-info" type="button">Aprovar</a>    
              <a href="<?= site_url('rechazar/'.$book['res_id']); ?>" class="btn btn-danger" type="button">Rechazar</a>
          <?php } ?>
      </td>
    </tr>
            <?php
            $count++;
    }
}else{ ?>
    <tr>
      <th scope="col">No hay resevas disponibles</th>
    </tr>
<?php } ?>
  </tbody>
</table>
<!-- <h2> Calendario de Reservas </h2>
<div id='calendar'></div>
</div> -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

<?= $footer ?>
