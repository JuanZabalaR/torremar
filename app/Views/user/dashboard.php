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
      <th scope="col">Cant. de Habitaciones</th>
      <th scope="col">Adultos</th>
      <th scope="col">Niños</th>
      <th scope="col">Entrada</th>
      <th scope="col">Salida</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
if(count($bookings) != 0){
    $count = 1;
    foreach($bookings as $book){
                ?>
            <th scope="row"><?= $count ?></th>
            <td><?= $book['res_name']; ?></td>
            <td><?= $book['res_rooms']; ?></td>
            <td><?= $book['res_adult']; ?></td>
            <td><?= $book['res_kids']; ?></td>
            <td><?= $book['res_entry']; ?></td>
            <td><?= $book['res_exit']; ?></td>
            <td><?php if ($book['res_approved'] === 1){ ?>
                    Aprovado
                <?php }else if($book['res_approved'] === 2){ ?>
                    Rechazado
                <?php }else{ ?>   
                    <a href="<?= base_url('aprobar/'.$book['res_id']); ?>" class="btn btn-info" type="button">Aprovar</a>    
                    <a href="<?= base_url('rechazar/'.$book['res_id']); ?>" class="btn btn-danger" type="button">Rechazar</a>
                <?php } ?>
            </td>
            <?php
            $count++;
    }
}else{ ?>
      <th scope="col">No hay resevas disponibles</th>
    </tr>
<?php } ?>
  </tbody>
</table>
<h2> Calendario de Reservas </h2>
<div id='calendar'></div>
</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          lang:'es',
        });
        calendar.render();
      });

      $('#calendar').fullCalendar({
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb']
});

    </script>
<?= $footer ?>
