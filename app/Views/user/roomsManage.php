<?= $header ?>
<h2> Habitaciones </h2>
<a href="<?= site_url('createRoom') ?>" class="btn btn-success" type="button">Crear una Habitacion</a>
<div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre</th>
      <th scope="col">Capacidad</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php
if(count($bedrooms) != 0){
    $count = 1;
    foreach($bedrooms as $room){
                ?>
    <tr>
            <th scope="row"><?= $count ?></th>
            <th>
                <img class="img-thumbnail" src="<?= base_url()?>/uploads/<?= $room['room_image'] ?>" alt="" width="400">
            </th>
            <td><?= $room['room_name']; ?></td>
            <td><?= $room['room_adult_cpty']; ?></td>
            <td>
                <a href="<?= site_url('deleteRoom/'.$room['room_id']); ?>" class="btn btn-danger" type="button">Eliminar</a>                
            </td>
    <?php
            $count++;
    }
}else{ ?>
  <tr>
      <th scope="col">No hay Habitaciones disponibles</th>
    </tr>
<?php } ?>
  </tbody>
</table>
</div>
<?= $footer ?>