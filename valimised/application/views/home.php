
<div class="container">
    <?php
    if (isset($event) && $event === "logout") {
        echo '<div><alert class="text-center" type="success">Olete edukalt keskkonnast välja loginud.</alert></div>';
    } else if (isset($event) && $event === "logged") {
        echo '<div><alert class="text-center" type="success">Olete edukalt sisse loginud. Teid suunatakse ümber automaatselt.</alert></div>';
    } else if (isset($event) && $event === "fail") {
        echo '<div><alert class="text-center" type="danger">Teid ei õnnestunud portaali sisse logida. Palun proovige uuesti.</alert></div>';
    } else if (isset($event) && $event === "firstlogin") {
        echo '<div><alert class="text-center" type="success">Tere tulemast elektrooniliste valimiste portaali. Enne jätkamist palun valige oma valimispiirkond.</alert></div>';
        //Pakume piirkonna valikut
        echo '<div class="container col-sm-offset-3 col-sm-6">
        <h2>Teie valimispiirkond:</h2>
        <select class="form-control" id="area">
        <option value="" style="display:none;"></option>';
        foreach ($areas as $area):
            echo '<option value='. $area->getId() . '>' . $area->getName() . '</option>';
        endforeach;
        echo '</select>
        <button type="button" onclick="onSubmit()" class="btn btn-lg btn-success pull-right">Kinnitan valiku</button>
        </div>';
        echo '<script> onSubmit = function() { window.location.href = "' . site_url('/logged/redirect/'.$redirectURL) . '?area=" + document.getElementById("area").value; } </script>';
        echo '<div class="clearfix"></div>';
    }
    ?>
    <div class="jumbotron">
        <h2>Tere tulemast Eesti elektroonilise hääletuse keskkonda.</h2>
        <h3>Oma hääle andmiseks palun logige sisse.</h3> 
    </div>
    <div class="row">
        <div class="col-sm-4 hidden-xs hidden-sm hidden-md">
            <div class="list-group">
                <a href="#" class="list-group-item active">Uudised</a>
                <a href="#" class="list-group-item">02.03.2015 - Arendajad peatasid ajutiselt töö, et palgaläbirääkimisi pidada."</a>
                <a href="#" class="list-group-item">15.02.2015 - E-hääletamisteni on jäänud veel ainult 1 nädal, arendajad: "Vast jõuab kah."</a>
                <a href="#" class="list-group-item">14.02.2015 - Lõpuks alustati E-hääletamissüsteemi arendusega!</a>
                <a href="#" class="list-group-item">13.02.2015 - E-hääletamissüsteemi arendust lükati määramata tähtajani edasi.</a>
                <a href="#" class="list-group-item">12.02.2015 - E-hääletamissüsteemi arendusega alustatatakse juba homme!</a>
            </div>
        </div>
        <div class="col-xs-12 col-lg-8">
            <h3>Hääletamine on lihtne</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ante erat, lobortis at nibh sit amet, sagittis elementum nisi. In suscipit ut arcu sed consequat. Aenean finibus porta tempus. Nam bibendum vehicula risus a aliquam. Nam luctus augue in odio imperdiet fermentum. Suspendisse potenti. Quisque maximus sapien in purus consequat, non dictum quam ultricies. Curabitur bibendum mattis augue, eu tincidunt velit mattis eu. Mauris vel vehicula est, ut auctor justo. Mauris in leo rutrum, tempus odio sit amet, placerat nulla. Integer consequat felis interdum tellus euismod sollicitudin. Mauris ipsum ligula, auctor id efficitur eu, pharetra nec turpis. Vestibulum cursus sagittis nibh sed pellentesque. Curabitur imperdiet pretium gravida. Quisque dictum bibendum facilisis. Nulla pretium sem at tincidunt posuere.
            </p>   
        </div>
    </div>
</div>
