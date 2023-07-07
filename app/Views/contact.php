<?= $header ?>
<div class="container">
    <div class="col-md-12">
        <h2> Contacto </h2>
        <p> Haznos llegar tu mensaje </p>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="col-md-4">
                <label>Nombre </label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="col-md-4">
                <label>Correo </label>
                <input class="form-control" type="email" name="email">
            </div>
            <div class="col-md-6">
                <label>Mensaje </label>
                <textarea rows="5" cols="80" id="message"></textarea>
            </div>
        <a name="submit" id="" class="btn btn-primary" href="#" role="button">Enviar</a>
        </form>
    </div>    
</div>
<?= $footer ?>