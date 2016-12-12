<?php
require "php/config.php";
require "korisnik/template/header.php";
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANEoZ8RYqsd3TLyJX6CS1hcADO4wewpAg&sensor=true"></script>
<script>
    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(44.7981873,20.4689813),
            zoom: 13,
            zoomControl: true,
            zoomControlOptions: { position: google.maps.ControlPosition.TOP_RIGHT }

        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
        var url = "http://localhost/domaci3JS/lokacije.json";
        var myloc = new Array();
        $.getJSON(url, function(lokacije) {
            $.each (lokacije.marker,function(i, marker){
                kreirajMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(marker.latitude,marker.longitude),
                    map: map,
                    icon: 'img/owl.png',
                    title: marker.naziv
                });
            })
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

  <body id="main_body">
    <div class="container">
      <div class="row">
        <div class="row_header">
          <h1>Dobrodošli u BookCorner!</h1>
          <br> <br> <br>
        </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <div class="post">
                                      <div id="map-canvas"></div>

                        </div>
                        <br><br><br>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align:center;">
                  <br>
                    <h2>Adresa / telefon</h2>
                                  <br>
                          <h5>BookCorner1</h5>
                          <div class="sidebar_text2">
                          Kneza Miloša 43 <br>
                          011/2777-776
                          </div>
                          <hr>

                          <h5>BookCorner2</h5>
                          <div class="sidebar_text2">
                          Bulevar Kralja Aleksandra 53 <br>
                          011/2365-545
                          </div>
                          <hr>

                          <h5>BookCorner3</h5>
                          <div class="sidebar_text2">
                          Bulevar Oslobođenja 219 <br>
                          011/5479-221
                          </div>
                          <hr>

                          <h5>BookCorner4</h5>
                          <div class="sidebar_text2">
                          Gospodara Vučića 78 <br>
                          011/5215-252
                          </div>
                          <hr>

                          <h5>BookCorner5</h5>
                          <div class="sidebar_text2">
                          Bulevar Mihajla Pupina 17<br>
                          011/5568-554
                          </div>
                          <hr>
                  </div>
      </div>
    </div>
  </body>

<?php

require 'korisnik/template/footer.php'; ?>
