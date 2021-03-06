<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanji</title>
    <script src="https://www.gstatic.com/firebasejs/ui/6.0.0/firebase-ui-auth.js"></script>
    <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/6.0.0/firebase-ui-auth.css" />

    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-------------------Navigation------------------->

  <nav class="nav">
    <div class="nav-menu flex-row">
        <div class="nav-brand">
            <a href="#" class="text-gray">Tanji</a>
        </div>
        <div class="toggle-collapse">
            <div class="toggle-icons">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <div>
            <ul class="nav-items">
                <li class="nav-link">
                    <a href="about.html">About Us</a>
                </li>
                <li class="nav-link">
                    <a href="how-tanji-works.html">How Tanji works</a>
                </li> 
                <li class="nav-link">
                    <a href="cities.html">Cities</a>
                </li>   
            </ul>
        </div>
        <div>
            <ul id="nav-user" class="nav-user">
                    <li class="nav-link">
                        <a href="">Welcome,
                            <?php
                                $username = $_GET["username"];
                                echo '
                                <span id="result">'.$username.'</span>
                                ';
                            ?>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="index.php"><i class="fas fa-user"></i>&nbsp; Logout</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>

<!-------------------Navigation------------------->
  <main>
    <section class="main-grid-2">
        <div class="grid-col-2 bordered">
            <div  id="toggle-orders-show" class="form select-collector" style="margin-top: 5vh;">
                <h2 id = "place"> 
                    <script>
                        var place = localStorage.getItem("place");
                        document.getElementById("place").innerHTML = "Request from " + place;
                    </script>
                </h2> <br>
                <div id="orderLayout" class="form blue-background" style="margin-top: 0%; height: 60vh;">
                    <div class="list-container">
                        <ul>
                            <?php
                            require_once("dbConn.php");
                            $getCollectorsQuery = "SELECT * FROM `collectors`";
                            $getCollectorsFx = mysqli_query($connect, $getCollectorsQuery);
                            while ($result = mysqli_fetch_array($getCollectorsFx)) {
                                $id = $result["ID"];
                                $name = $result["Name"];
                                $tagline = $result["Tagline"];
                                $ppKilometer = $result["Price Per Kilometer"];
                                echo '
                                <li>
                                    <a href="#toggle-orders-collapse?collector='.$name.'" onclick="orderLayout(2)">
                                        <div class="grid-3">
                                            <div class="grid-3-col-1">
                                                <i class="fas fa-truck"></i>
                                            </div>
                                            <div class="grid-3-col-2">
                                                <h3 id="garbage-collectors">'.$name.'</h3>
                                                <p>'.$tagline.'</p>
                                                <p>In 6min.</p>
                                                <p>02:23pm</p>
                                            </div>
                                            <div class="grid-3-col-3">
                                                <h3 id="price">KES '.$ppKilometer.'</h3>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                ';
                            }
                                
                            ?>
                        </ul>
                    </div>
                    <div class="payment-method">
                        <label for="payment-method">Payment Method: </label>
                        <select>
                            <option value="Cash">Cash</option>
                            <option value="Card">Visa/ MasterCard</option>
                            <option value="M-Pesa">M-Pesa</option>
                        </select>
                    </div>
                </div>        
            </div>
            <!--Collapsed layout-->
            <div id="toggle-orders-collapse" class="form select-collector" style="margin-top: 5vh;">
                <h2>Requesting for your collector</h2> <br>
                <div class="form blue-background" style="margin-top: 0%; height: 60vh;">
                    <div class="list-container" style="background: white;">
                        <div class="main-grid-2">
                            <div class="grid-col-2">
                                <i class="far fa-credit-card"></i>
                            </div>
                            <div class="grid-col-1 flex-row">
                                <h3 id="price-to-set">
                                    <?php
                                        echo $ppKilometer;
                                    ?>
                                </h3>
                                <p style="margin: .3rem;">Cash</p>
                            </div>
                        </div>
                        <div style="padding: 1rem 0;" class="main-grid-2">
                            <div class="grid-col-2">
                                <i class="fas fa-map-marker"></i>
                            </div>
                            <div class="grid-col-1">
                                <h3 id = "destination">
                                    <script>
                                        var destination = localStorage.getItem("place");
                                        document.getElementById("destination").innerHTML = destination;
                                    </script>
                                </h3>
                            </div>
                        </div>
                        <div class="main-grid-2">
                            <div class="grid-col-2">
                                <i class="far fa-credit-card"></i>
                            </div>
                            <div class="grid-col-1">
                                <h3 id="name">
                                    <?php $getName = $_GET["collector"];
                                    echo $getName;
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post">
                        <input name = "confirm" class="btn btn-primary" onclick="waitingLayout()" type="submit" value="Confirm">
                    </form>
                    <?php
                        require "dbConn.php";
                        if (isset($_POST["confirm"])) {
                            $insertQuery = "INSERT INTO `orders`(`ID`, `Date`, `User`, `Collector`, `Payment Amount`, `Payment Method`) VALUES(NULL, CURRENT_TIMESTAMP, '$username', '$name', '$ppKilometer', 'Cash')";
                            $insertQueryFX = mysqli_query($connect, $insertQuery);
                            if ($insertQueryFX) {
                                echo '
                                <script>
                                    alert("Successfully Ordered Collection");
                                </script>
                                ';
                            } else {
                                $error = mysqli_error($connect);
                                echo '
                                <script>
                                    alert("Failed to order. " '.$error.');
                                </script>
                                ';
                            }
                        }
                    ?>
                    <input onclick="restoreLayout()" class="btn btn-primary" type="button" value="Cancel Trip Request">
                </div>
            </div>
            <!--  x  Collapsed layout  x  -->
            <div id="toggle-wait-collapse" class="form select-collector" style="margin-top: 5vh;">
                <h2>Your collector is 9 minutes <br> away from your pick up <br> point</h2> <br>
                <div id="orderLayout" class="form blue-background" style="margin-top: 0%; height: 60vh;">
                    <div id="toggle-orders-show" class="list-container" style="background: white;">
                        <div class="main-grid-2">
                            <div class="grid-col-2">
                                <i style="margin-top: 1rem;" class="far fa-user"></i>
                            </div>
                            <div class="grid-col-1 flex-row">
                                <p style="margin: .3rem;">KCZ 321A</p>
                                <p style="margin: .3rem;">Green Mercedez Benz Truck</p>
                                <p style="margin: .3rem;">Samuel Shikhayanga</p>
                            </div>
                        </div>
                    </div>
                    <input onclick="cancelWait()" class="btn btn-primary" type="button" value="Cancel Trip Request">
                </div>
            </div>
          </div>
      <div class="grid-col-1">
        <div id="map"></div>
      </div>
    </section>
  </main>
</body>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1orobUaNa2Wd6gWbtpMeKPDurY4GFu3o&callback=initMap&libraries=places"></script>
<script>
    function orderLayout(name) {
        var price = document.getElementById("price").value;
        document.getElementById("toggle-orders-show").style.display = "none";
        document.getElementById("toggle-orders-collapse").style.display = "block";
        var collector = document.getElementById("garbage-collectors").value;
        document.getElementById("name").innerHTML = name;
        localStorage.setItem("collector", collector);
    }

    function restoreLayout() {
        document.getElementById("toggle-orders-collapse").style.display = "none";
        document.getElementById("toggle-orders-show").style.display = "block";
        alert("The request has been cancelled successfully");
    }

    function waitingLayout() {
        document.getElementById("toggle-orders-collapse").style.display = "none";
        document.getElementById("toggle-wait-collapse").style.display = "block";
    }

    function cancelWait() {
        document.getElementById("toggle-wait-collapse").style.display = "none";
        document.getElementById("toggle-orders-show").style.display = "block";
        alert("The request has been cancelled successfully");
    }
</script>
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById("map"), {
            center: {lat: -0.4306906, lng: 36.9495283}, zoom: 13
        });
        var input = document.getElementById("pickupLocation");
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var autoComplete = new google.maps.places.Autocomplete(input);
        autoComplete.bindTo('bounds', map);
        var marker = new google.maps.Marker({
            map: map, 
            anchorPoint: new google.maps.Point(0, -29)
        });

        autoComplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autoComplete.getPlace();
            if (!place.geometry) {
                window.alert('Place has no geometry');
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            marker.setIcon(({
                url: place.icon, 
                size: new google.maps.size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);
            //for (var i = 0; i < place.address_components.length; i++) {
            //    if (place.address_components[i].types[0] == 'postal_code') {
            //        document.getElementById('').innerHTML = place.address_components[i].long_name;
            //    }
           // }
        });
    }
</script>
  <script src="js/jquery3.6.0.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</html>