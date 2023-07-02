<?= $header ?>
<!-- Section: Design Block -->
<section class=" text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Torremar Login"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">
        <h2>Ingrese sus Datos</h2>
          <form method="POST" action="<?= site_url('access') ?>" enctype="multipart/form-data">
            <!-- Email input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="user">Usuario</label>
              <input type="text" id="user" class="form-control" name='user_username' required/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="passw">Contraseña</label>
              <input type="password" id="passw" class="form-control" name='user_password' required/>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <!-- <div class="col d-flex justify-content-center"> -->
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="" checked />
                  <label class="form-check-label" for="remember"> Recordar </label>
                </div>
              <!-- </div> -->
            </div>

            <!-- Submit button -->
            <button class="btn btn-primary btn-block mb-4" type="submit">Ingresar</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
<?= $footer ?>