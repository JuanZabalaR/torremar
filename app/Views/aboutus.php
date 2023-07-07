<?= $header ?>
    <section class="bg py-5" style="background-color: #191970 !important;">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>Acerca de Nosotros</h1>
                    <p>
                    Torremar, ven y disfruta en nuestro rinconcito de paz.<br/>
                    Posada torremar tiene como misión prestar un servicio de hospedaje que llegue a los corazones de los clientes por la calidez que será la atención, la comodidad de sus instalaciones, belleza y armonía de sus espacios cuidadosamente diseñados para hacer sentir al huésped seguro y relajado.<br/>
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="<?=base_url('img/logoTorremar.jpg')?>" alt="About Hero" width="400">
                </div>
            </div>
        </div>
    </section>
    <br/>
<div class="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15704.541179504888!2d-64.4527055!3d10.2506705!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2d79b19d87a40f%3A0x66414bbca43db2dc!2sPosada%20Torremar!5e0!3m2!1ses!2sve!4v1688692444827!5m2!1ses!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<?= $footer ?>
<style>
    .google-map {
     padding-bottom: 50%;
     position: relative;
     right:-120px;
}

.google-map iframe {
     height: 80%;
     width: 80%;
     left: 0;
     top: 0;
     position: absolute;
}
</style>