<?= $header ?>
<h2> Crear Habitacion </h2>
<br/>
<div class="row">
    <div class="col md-12">
    <form method="post" action="<?= site_url('saveRoom') ?>" enctype="multipart/form-data">
        <div class="col-md-4">
            <label>Nombre de la Habitacion</label>
            <input class="form-control" type="text" name="room_name" required value="<?=old('room_name')?>">
        </div>
        <div class="col-md-4">
            <label>Capacidad</label>
            <input class="form-control" type="text" name="room_adult_cpty" required value="<?=old('room_adult_cpty')?>">
        </div>
        <div class="col-md-4">
            <label>Precio</label>
            <input class="form-control" type="text" name="room_price" required value="<?=old('room_price')?>">
        </div>
        <div class="col-md-4">
            <label>Imagen de la Habitacion</label>
            <input class="form-control" type="file" name="room_image">
        </div>
        <br/>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </form>
    </div>
</div>
<?= $footer ?>