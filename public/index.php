<?php
    require_once('../db.php');

    mysql_connect('localhost', $db_user, $db_pass);

    //Select Database
    mysql_select_db('wedding') or die(mysql_error());


    $api_key = 'AIzaSyBVhWVaSn4kFfF5mspvCxIerodM-yqdPk8';

    if ( isset($_POST['rsvp']) ) {
        if ( $_POST['name'] && $_POST['num_guests'] ) {

            $insert_name = mysql_real_escape_string($_POST['name']);
            $insert_guests = mysql_real_escape_string($_POST['num_guests']);
            $insert_dietary = mysql_real_escape_string($_POST['dietary']);
            $insert_attending = mysql_real_escape_string($_POST['attending']);
            $insert_msg = mysql_real_escape_string($_POST['message']);

            $check_query = "SELECT rsvp_id FROM rsvp WHERE guest_names = '" . $insert_name . "';";
            $check_result = mysql_query($check_query);
            $row = mysql_fetch_assoc($check_result);
            if ( !$row['rsvp_id'] ) {

                //build query
                $query = "
                    INSERT INTO
                        rsvp
                    (
                        guest_names,
                        dietary,
                        message,
                        num_guests,
                        attending
                    )
                    VALUES
                    (
                        '" . $insert_name . "',
                        '" . $insert_dietary . "',
                        '" . $insert_message . "',
                        " . (int)$insert_guests . ",
                        " . ( ($insert_attending) ? 1 : 0 ) . "
                    );
                ";

                //Execute query
                $qry_result = mysql_query($query) or $error = "Oops, something went wrong. Please try again.";

            } else {
                $error = "We already have an RSVP for this name / guest!";
            }

            if ( !$error ) {

                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: richy8888@hotmail.com' . "\r\n";

                //include('/includes/message_template.php');

                $message = "
                <html>
                    <head>
                        <title>Wedding RSVP</title>
                    </head>
                    <body>
                        <p>Somebody has RSVP'd!</p>
                        <p><strong>Name(s)</strong>: " . $_POST['name'] . "</p>
                        <p><strong>No. Guests</strong>: " . $_POST['num_guests'] . "</p>
                        <p><strong>Coming</strong>: " . ( ($_POST['attending']) ? 'Yes' : 'No' ) . "</p>
                        <p><strong>Dietary Requirements</strong>: " . ( ($_POST['dietary']) ? $_POST['dietary'] : 'N/A' ) . "</p>
                        <p><strong>Message</strong>: " . ( ($_POST['message']) ? $_POST['message'] : 'N/A' ) . "</p>
                    </body>
                </html>
                ";

                mail('richy8888@me.com,jo_the_mongoose@hotmail.com', 'Wedding RSVP', $message, $headers);

                $success = "Thank you for your RSVP, we look forward to receiving it!";

                unset($_POST['name']);
                unset($_POST['num_guests']);
                unset($_POST['dietary']);
                unset($_POST['attending']);
                unset($_POST['message']);
            }

        } else {
            $error = "You need to enter your name please";
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

    <title>Jo &amp; Rich Wedding - 31st August 2017</title>

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
                    <h1>JO &amp; RICH</h1>
                    <h2>are getting married</h2>
                    <h4>31.08.2017</h4>
                    <a class="rsvp-small btn btn-default page-scroll" href="#rsvp">RSVP</a>
                    &nbsp;
                    <a class="rsvp-small btn btn-default page-scroll" href="#gifts">GIFTS</a>
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
                    src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=<?php echo $api_key; ?>">
                </script>
            </div>
        </div>
    </section>

    <section class="bg-spacer" id="bg-two"></section>

    <section id="gifts" class="gift-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>WEDDING GIFTS / PRESENTS</h1>
                    <p class="dklemon">
                        We do not expect any wedding gifts or presents and as such do not have a list,<br />
                        your presence on our wedding day is more than enough.
                    </p>
                    <br /><br />
                    <p class="dklemon">
                        If you however would like to get us a little something, a small contribution towards<br />
                        one of the following would be greatly appreciated:
                    </p>
                    <ul class="dklemon">
                      <li>A new dining room table and chairs</li>
                      <li>Our honeymoon</li>
                      <li>Renovating our garden</li>
                    </ul>
                    <p class="dklemon">
                      We cannot wait to share our special day with all our family and friends.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-spacer" id="bg-three"></section>

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
                    <h4>Southside Studio</h4>
                    <h5><a target="_blank" href="http://sites.google.com/site/southsidestudiobb">sites.google.com/site/southsidestudiobb</a></h5>
                    <h5><em>Goodwood, 2.6 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Home Farm House</h4>
                    <h5><a target="_blank" href="http://www.bedandbreakfast-directory.co.uk/info.asp?id=107153">www.bedandbreakfast-directory.co.uk/info.asp?id=107153</a></h5>
                    <h5><em>Eartham, 3 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Seabeach House</h4>
                    <h5><a target="_blank" href="http://www.sawdays.co.uk/britain/england/sussex/seabeach-house">www.sawdays.co.uk/britain/england/sussex/seabeach-house</a></h5>
                    <h5><em>Halnaker, 3 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Star &amp; Garter</h4>
                    <h5><a target="_blank" href="http://www.thestarandgarter.co.uk">www.thestarandgarter.co.uk</a></h5>
                    <h5><em>East Dean, 3 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Toad Hall</h4>
                    <h5><a target="_blank" href="http://www.toadhallduncton.co.uk">www.toadhallduncton.co.uk</a></h5>
                    <h5><em>Duncton, 3 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Trundlers</h4>
                    <h5><a target="_blank" href="http://www.trundlersaccommodation.co.uk">www.trundlersaccommodation.co.uk</a></h5>
                    <h5><em>Charlton, 3.8 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Old Railway Station</h4>
                    <h5><a target="_blank" href="http://www.old-station.co.uk">www.old-station.co.uk</a></h5>
                    <h5><em>Petworth, 5 miles</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Arundel Fontwell Travelodge</h4>
                    <h5><a target="_blank" href="http://www.travelodge.co.uk/hotels/14/arundel-fontwell-hotel">www.travelodge.co.uk/hotels/14/arundel-fontwell-hotel</a></h5>
                    <h5><em>Arundel, 5 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Fox Goes Free</h4>
                    <h5><a target="_blank" href="http://www.thefoxgoesfree.com/accomodation">www.thefoxgoesfree.com/accomodation</a></h5>
                    <h5><em>Charlton, 5 miles</em></h5>
                </div>


                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The White Horse Inn</h4>
                    <h5><a target="_blank" href="http://www.whitehorse-sutton.co.uk/our-rooms">www.whitehorse-sutton.co.uk/our-rooms</a></h5>
                    <h5><em>Sutton, 5 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Stonemasons</h4>
                    <h5><a target="_blank" href="http://www.thestonemasonsinn.co.uk">www.thestonemasonsinn.co.uk</a></h5>
                    <h5><em>Petworth, 6 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Angel Inn</h4>
                    <h5><a target="_blank" href="http://www.angelinnpetworth.co.uk">www.angelinnpetworth.co.uk</a></h5>
                    <h5><em>Petworth, 6 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Rose Cottage</h4>
                    <h5><a target="_blank" href="http://www.rosecottage-singleton.co.uk">www.rosecottage-singleton.co.uk</a></h5>
                    <h5><em>Singleton, 6 miles</em></h5>
                </div>



                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Royal Oak</h4>
                    <h5><a target="_blank" href="http://www.royaloakeastlavant.co.uk/stay">www.royaloakeastlavant.co.uk/stay</a></h5>
                    <h5><em>East Lavant, 7 miles</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Horseguards Inn</h4>
                    <h5><a target="_blank" href="http://www.thehorseguardsinn.co.uk">www.thehorseguardsinn.co.uk</a></h5>
                    <h5><em>Tillington, 7 miles</em></h5>
                </div>


                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Castle Cottage</h4>
                    <h5><a target="_blank" href="http://www.castlecottage.info">www.castlecottage.info</a></h5>
                    <h5><em>Fittleworth, 7 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Swan Inn</h4>
                    <h5><a target="_blank" href="http://www.swaninnhotel.com">www.swaninnhotel.com</a></h5>
                    <h5><em>Fittleworth, 8 miles</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The White Swan</h4>
                    <h5><a target="_blank" href="http://www.white-swan-arundel.co.uk">www.white-swan-arundel.co.uk</a></h5>
                    <h5><em>Arundel, 8 miles</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Bankywood</h4>
                    <h5><a target="_blank" href="http://www.bankywood.co.uk">www.bankywood.co.uk</a></h5>
                    <h5><em>Fittleworth, 8 miles</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Hookwood</h4>
                    <h5><a target="_blank" href="http://www.bedandbreakfast-pages.com/hotel.asp?id=15315">www.bedandbreakfast-pages.com/hotel.asp?id=15315</a></h5>
                    <h5><em>Fittleworth, 8 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Chichester Harbor Hotel</h4>
                    <h5><a target="_blank" href="http://www.chichester-harbour-hotel.co.uk">www.chichester-harbour-hotel.co.uk</a></h5>
                    <h5><em>Chichester, 8 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>Rooks Hill</h4>
                    <h5><a target="_blank" href="http://www.rookshill.co.uk">www.rookshill.co.uk</a></h5>
                    <h5><em>Lavant, 8.2 miles</em></h5>
                </div>
                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Welldiggers Arms</h4>
                    <h5><a target="_blank" href="http://www.thewelldiggersarms.co.uk">www.thewelldiggersarms.co.uk</a></h5>
                    <h5><em>Petworth, 9 miles</em></h5>
                </div>

                <div class="accommodation col-xs-12 col-sm-6 col-md-4">
                    <h4>The Spread Eagle Hotel</h4>
                    <h5><a target="_blank" href="http://www.hshotels.co.uk/spread-eagle/rooms">www.hshotels.co.uk/spread-eagle/rooms</a></h5>
                    <h5><em>Midhurst, 12 miles</em></h5>
                </div>



            </div>
        </div>
    </section>

    <section class="bg-spacer" id="bg-four"></section>

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


                    <form action="#rsvp" method="POST" class="form-horizontal">

                       <div class="col-xs-12">

                        <?php
                            if ( $error || $success ) {
                        ?>
                                <div class="form-group">
                                    <label class="col-xs-4"></label>
                                    <div class="col-xs-8 text-left" style="color: <?php echo ( ($error) ? 'red;' : 'green;' ); ?> font-weight: bold;">
                                        <?php echo ( ($error) ? $error : $success ); ?>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>

                            <div class="form-group">
                                <label for="name" class="col-xs-4">Name(s)</label>
                                <div class="col-xs-8 text-left">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name(s)" value="<?php echo $_POST['name']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dietary" class="col-xs-4">Dietary Requirements</label>
                                <div class="col-xs-8 text-left">
                                    <input type="text" name="dietary" class="form-control" id="dietary" placeholder="Allergies, vegetarian, gluten-free, etc." value="<?php echo $_POST['dietary']; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message" class="col-xs-4">Message</label>
                                <div class="col-xs-8 text-left">
                                    <textarea name="message" class="form-control" id="message" placeholder="Please leave us a message"><?php echo $_POST['message']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="num_guests"  class="col-xs-8">Number of guests</label>
                                <div class="col-xs-4 text-left">
                                    <select id="num_guests" name="num_guests">
                                        <option <?php echo ( ($_POST['num_guests']==1) ? 'selected' : '' ); ?> value="1">1</option>
                                        <option <?php echo ( ($_POST['num_guests']==1) ? 'selected' : '' ); ?> value="2">2</option>
                                        <option <?php echo ( ($_POST['num_guests']==1) ? 'selected' : '' ); ?> value="3">3</option>
                                        <option <?php echo ( ($_POST['num_guests']==1) ? 'selected' : '' ); ?> value="4">4</option>
                                        <option <?php echo ( ($_POST['num_guests']==1) ? 'selected' : '' ); ?> value="5">5</option>
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
