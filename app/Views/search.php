<?= $header ?>
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
            <form method="post" enctype="multipart/form-data" id="reserveSubmit" action="<?= site_url('saveReserve') ?>">
                <h1 class="h2 pb-4">Tu Reserva</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <a id='clean' href="#"> Limpiar reserva </a>
                    <label>Reserva a nombre de: </label>
                    <input name='name' id ='name' class="form-control" required/>
                    <li class="pb-3"  id="ReserveDiv">
                    </li>
                </ul>
                <p id="totAdul"> </p>
                <p id="totNum"> </p>
                <input hidden name='total' id ='total' value='0'></input>
                <input hidden name='adult' id ='adult' value='0'></input>
                <input hidden name='entry' id ='entry' value='<?=$entry_date?>'></input>
                <input hidden name='exit' id ='exit' value='<?=$exit_date?>'></input>
                <button class="btn btn-success" id='reserveButton' disabled="true" type="submit"> Reserva </button>
            </form>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <p class="h3 text-dark text-decoration-none mr-3">
                                    Desde <?=$entry_date?> hasta <?=$exit_date?>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                    </div>
                </div>
                <div class="row">
                <?php foreach($available as $room){ ?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0" data-value="<?= $room->room_id ?>">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?= base_url()?>/uploads/<?= $room->room_image ?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <!-- <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <div class="card-body">
                                <h4><?= $room->room_name; ?></h4>
                                <p class="h4 text-decoration-none"><?= $room->room_adult_cpty;?> Personas</p>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <!-- <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li> -->
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <!-- <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li> -->
                                </ul>
                                <p class="text-center mb-0">$<?= $room->room_price; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div> <!-- row -->
            </div> <!-- Internal part end div -->

        </div>
    </div>
    <!-- End Content -->
<?= $footer; ?>

<script>
$(function(){
    $(".product-wap").one("click", function(event) {
    var id = $(this).attr("data-value");
    var total = parseInt($('#total').val());
    var adults = parseInt($('#adult').val());
    $.ajax({  
        url:"<?= site_url('roomVal'); ?>",
        type: 'post',
        dataType:'json',
        data:{value:id},
        success:function(data){
            if(data.success === "success"){
                var rm = data.room;
                var newTotal =total+parseInt(rm.room_price);
                var newAdult = adults+parseInt(rm.room_adult_cpty);
                html=`
                <li>
                `+ rm.room_name +` $` + rm.room_price +`
                <input value='` + rm.room_id + `' class='form-control' name="Bedroom[`+rm.room_name+`]" hidden></input>           
                </li>`;
                $('#ReserveDiv').append(html);
                $('#reserveButton').prop('disabled', false)
                $('#adult').val(newAdult);
                $('#totAdul').text("Capacidad: "+newAdult + " personas");
                $('#total').val(newTotal);
                $('#totNum').text("Total: $"+newTotal);
            }
        }  
    });//end Ajax
    });
    $("#clean").on("click", function(event) {
        location.reload();
    })

    // $("#reserveButton").on("click", function(event) {
    //     $.ajax({  
        // url:"<?//= site_url('saveReserve'); ?>",
    //     type: 'post',
    //     dataType:'json',
    //     data: $("#reserveSubmit").serialize(),
    //     success:function(data){
    //     }
    // });
        
    // })
    
});
</script>