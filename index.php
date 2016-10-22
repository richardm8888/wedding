<?php
    if ( isset($_POST['rsvp']) ) {
        if ( $_POST['name'] && $_POST['num_guests'] ) {

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            include('/includes/message_template.php');

            mail('richy8888@hotmail.com,jo_the_mongoose@hotmail.com', 'Wedding RSVP', $message, $headers);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jo & Rich Wedding - 31st August 2017</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->


    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>JO & RICH</h1>
                    <h2>are getting married</h2>
                    <h4>31.08.2017</h4>
                    <a class="rsvp-small btn btn-default page-scroll" href="#rsvp">RSVP</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-spacer" id="bg-one"></section>

    <!-- About Section -->
    <section id="venue" class="venue-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h1 class="text-left">UPWALTHAM BARNS</h1>
                    <h2 class="text-left">Chichester</h2>
                    <h3 class="text-left">West Sussex, GU28 0LX</h3>
                    <br /><br />
                    <p class="dklemon normal-copy">
                        Cars can be left at the barns overnight, but they must be collected by 11am the following morning.
                        <br /><br />
                        We recommend pre-booking taxis as they will be in high demand from midnight onwards.
                    </p>
                </div>

                <div id="map" class="col-xs-12 col-sm-6"></div>
                <script>
                  function initMap() {
                    var uluru = {lat: 50.9144066, lng: -0.6631431};
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 10,
                      center: uluru
                    });
                    var marker = new google.maps.Marker({
                      position: uluru,
                      map: map
                    });
                  }
                </script>
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?callback=initMap">
                </script>
            </div>
        </div>
    </section>

    <section class="bg-spacer" id="bg-two"></section>

    <!-- Services Section -->
    <section id="accommodation" class="accommodation-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>ACCOMMODATION</h1>

                    <br /><br />

                    <p class="dklemon">
                        Upwaltham Barns doesn't offer any overnight accommodation, however below is a list of nearby hotels and B&B's.
                        <br />
                        We would advise booking ASAP as availability is going fast!
                    </p>

                    <br /><br />

                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Trundlers</h4>
                    <h5><em>Charlton</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Southside Studio</h4>
                    <h5><em>Goodwood</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Rooks Hill</h4>
                    <h5><em>Lavant</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Bankywood</h4>
                    <h5><em>Fittleworth</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Castle Cottage</h4>
                    <h5><em>Fittleworth</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Home Farm House</h4>
                    <h5><em>Eartham</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Hookwood</h4>
                    <h5><em>Fittleworth</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Seabeach House</h4>
                    <h5><em>Halnaker</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Brufords</h4>
                    <h5><em>Chichester</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Old Railway Station</h4>
                    <h5><em>Petworth</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Willow Barns</h4>
                    <h5><em>Graffham</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Arundel Fontwell Travelodge</h4>
                    <h5><em>Arundel</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Chichester Park Hotel</h4>
                    <h5><em>Chichester</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Goodwood Hotel</h4>
                    <h5><em>Goodwood</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Chichester Harbor Hotel</h4>
                    <h5><em>Chichester</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Spread Eagle Hotel</h4>
                    <h5><em>Midhurst</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Fox Goes Free</h4>
                    <h5><em>Charlton</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Star & Garter</h4>
                    <h5><em>East Dean</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Stonemasons</h4>
                    <h5><em>Petworth</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Royal Oak</h4>
                    <h5><em>East Lavant</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Horseguards Inn</h4>
                    <h5><em>Tillington</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Welldiggers Arms</h4>
                    <h5><em>Petworth</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Angel Inn</h4>
                    <h5><em>Petworth</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Swan Inn</h4>
                    <h5><em>Fittleworth</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The White Horse Inn</h4>
                    <h5><em>Sutton</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Toad Hall</h4>
                    <h5><em>Duncton</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The White Swan</h4>
                    <h5><em>Arundel</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Rose Cottage</h4>
                    <h5><em></em></h5>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-spacer" id="bg-three"></section>

    <!-- Contact Section -->
    <section id="rsvp" class="rsvp-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!--<h1>RSVP</h1>

                    <br /><br />-->

                    <p class="dklemon">
                        Please let us know if you can make our wedding by contacting us in any of the ways below.
                    </p>

                    <br /><br />
                </div>

                <div class="col-xs-12 col-md-8">

                    <h4>Website</h4>
                    <form method="POST" class="form-horizontal">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="name" class="col-xs-4">Name(s)</label>
                                <div class="col-xs-8 text-left">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name(s)">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dietary" class="col-xs-4">Dietary Requirements</label>
                                <div class="col-xs-8 text-left">
                                    <input type="text" name="dietary" class="form-control" id="name" placeholder="Allergies, vegetarian, gluten-free, etc.">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-xs-4">Message</label>
                                <div class="col-xs-8 text-left">
                                    <textarea name="message" class="form-control" id="name" placeholder="Please leave us a message"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="num_guests"  class="col-xs-8">Number of guests</label>
                                <div class="col-xs-4 text-left">
                                    <select id="num_guests" name="num_guests">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="attending" class="col-xs-8">Attending</label>
                                <div class="col-xs-4 text-left">
                                    <input type="hidden" name="attending" value="0" />
                                    <input type="checkbox" id="attending" name="attending" value="1" />
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group text-left">
                                <div class="col-xs-2"></div>
                                <div class="col-xs-10">
                                    <input name="rsvp" type="submit" class="rsvp btn btn-default" value="RSVP" />
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="clearfix"></div>
                </div>

                <div class="col-xs-12 col-md-4">

                    <h4>Post</h4>
                    <p class="dklemon">93 Roedean Road,<br />Worthing,<br />West Sussex,<br />BN13 2BU</p>

                </div>


            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
