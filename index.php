<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';
//php pages that are required to run this page.


$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$sortOrder = 'Address1';

$statement = $gateway->getProperty($sortOrder);

//to connect to the databases and the queries.
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- meta tags  -->
        <meta charset="utf-8"> <!-- This is so the browers can read and display characters -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- This means that the browser will (probably) render the width of the page at the width of its own screen.
        http://css-tricks.com/snippets/html/responsive-meta-tag/ -->
        
        <!-- Favicon and Title of the Site -->
        <link rel="icon" href="img/dr-icon.png">
        <title> Dublin Rentals </title> <!--  -->

        <!-- Bootstrap CSS and JS -->
        <script type="text/javascript" src="js/respond.js"></script> <!-- This is what we downloaded from github, we need to hav this is the head, the page wont load or do the responsive thing without this.  -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!--This the bootstrap framework stylesheet. CSS that is used for mobiles, so that its faster to load. -->
        
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="css/customBS3Style.css">
        
        <!-- Custom font -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    </head>

    <body id="back-to-top"> <!-- BODY starts here, it also has an id so that when the user goes to the very bottom of the page, 
                                 they can click the 4 colourful houses at the bottom so that it's easier to go to the top.-->
        
        <?php require 'header.php'; ?> <!-- Header Navigation is in a separate page, so that when I want to edit something i can just go in to the header.php page 
            and make my edits there, instead of having to edit it in a lot of pages.  -->
        
        <!-- CAROUSEL Section -->
        <!-- This is a very simple Carousel that consists of 3 images. -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="item active">
              <img src="img/hero/original/hero-img1.jpg" alt=""> 
            </div>
            <div class="item">
              <img src="img/hero/original/hero-img2.jpg" alt="">
            </div>
            <div class="item">
              <img src="img/hero/original/hero-img3.jpg" alt="">
            </div>
          </div>
        </div><!-- END of Carousel Section -->

        <!-- Search Box Section -->
        <section id="searchbox" class="search-section">
          <div class="container">
            <div class="row">
              <div class="col-lg-offset-0 col-lg-12 col-md-offset-2 col-md-9 col-sm-offset-1 col-sm-10 col-xs-offset-1">
                <h2> <strong>To Rent | Short Term</strong></h2> <!--  -->

                <form class="form-inline" role="form" id="searchSelects" action="" method="post">
                  <div class="form-group form-inline">
                    <select class="form-control" id="sel1">
                      <option>Area</option>
                      <option>Dublin Central</option>
                      <option>Dublin Bay North</option>
                      <option>Dublin North-Central</option>
                      <option>Dublin South-Central</option>
                      <option>Dublin Bay South</option>
                    </select>
                  </div> <!-- Dropdown selection for AREA Search -->
                    
                  <div class="form-group form-inline">
                    <select class="form-control" id="sel1">
                      <option>Town</option>
                      <option>Ballsbridge</option>
                      <option>Cabra</option>
                      <option>Tallaght</option>
                      <option>Phibsboro</option>
                      <option>Finglas</option>
                      <option>Merrion</option>
                      <option>Merrion Square</option>
                    </select>
                  </div> <!-- Dropdown selection for Town Search -->

                  <div class="form-group form-inline">
                    <select class="form-control" id="sel1">
                      <option>Type</option>
                      <option>Apartment To Let</option>
                      <option>House To Let</option>
                      <option>Studio To Let</option>
                      <option>Flat To Let</option>
                    </select>
                  </div> <!-- Dropdown selection for Type Search -->
                </form> <!-- END of form for Search options -->

                <button type="submit" class="searchButton btn btn-default btn-lg">Search</button>
                <!-- Search Submit button -->

              </div>
            </div> 
          </div>
        </section> <!-- END of Search Box Section -->

        <!-- Services Section -->
        <section id="services" class="services-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                          Are you looking for a new apartment or want to buy a house?
                          <br/> 
                          Do you want to sell your property or find a roommate?
                          <br/> 
                          Dublin Rentals has 9 put of 10 properties available
                          <br/> 
                          in all areas of Dublin.
                        </p>
                        
                        <div class="clearfix"></div> <!-- Clearfix class can easily clear floats by adding this. -->

                        <div class="servicesImgs row col-lg-offset-1">
                            <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                                <img src="img/services/ownerPic.png" class="img-responsive">

                                <h4 class="text-center">Reliable.</h4>
                            </div>
                            <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                                <img src="img/services/tenantPic.png" class="img-responsive">

                                <h4 class="text-center">Comfortable.</h4>
                            </div>
                            <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                                <img src="img/services/areaPic.png" class="img-responsive">

                                <h4 class="text-center">Accessible.</h4>
                            </div>
                        </div> <!-- END of servicesImgs row -->
                        
                        <a href="register.php"><button type="submit" class="servicesButton btn btn-default btn-lg">Get Started</button></a>
                        <!-- This button will go to the Register page. -->
                    </div>
                </div>
            </div>
        </section> <!-- END of Services Section -->

        <!-- Featured Properties Section -->
        <section id="featuredPro" class="featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Featured Properties</h1>

                        <ul class="ch-grid">
                          <li>
                            <div class="ch-item ch-img-1">
                              <div class="ch-info">
                                <h3>16 Brookfields,
                                    Lane Avenue,
                                    Ballsbridge</h3>
                                <p><?php echo '<a href="viewProperty.php?PropertyID=1">see more</a> ' ?></p>
                              </div>
                            </div>
                          </li> <!-- Featured Property : 1 -->
                         
                          <li>
                            <div class="ch-item ch-img-2">
                              <div class="ch-info">
                                <h3>23 Block D,
                                    Whitestone Ward,
                                    Cabra</h3>
                                <p><?php echo '<a href="viewProperty.php?PropertyID=2">see more</a> ' ?></p>
                              </div>
                            </div>
                          </li> <!-- Featured Property : 2 -->
                          
                          <li>
                            <div class="ch-item ch-img-3">
                              <div class="ch-info">
                                <h3>1623 Storybrooke,
                                    Park,
                                    Tallaght</h3>
                                <p><?php echo '<a href="viewProperty.php?PropertyID=3">see more</a> ' ?></p>
                              </div>
                            </div>
                          </li> <!-- Featured Property : 3 -->
                          
                          <li>
                            <div class="ch-item ch-img-4">
                              <div class="ch-info">
                                <h3>34 Dale Field,
                                    New Park,
                                    Phibsboro</h3>
                                <p><?php echo '<a href="viewProperty.php?PropertyID=4">see more</a> ' ?></p>
                              </div>
                            </div>
                          </li> <!-- Featured Property : 4 -->
                          
                          <li>
                            <div class="ch-item ch-img-5">
                              <div class="ch-info">
                                <h3>70 Fairwall,
                                    Maine Avenue,
                                    Finglas</h3>
                                <p><?php echo '<a href="viewProperty.php?PropertyID=5">see more</a> ' ?></p>
                              </div>
                            </div>
                          </li> <!-- Featured Property : 5 -->
                          
                          <li>
                            <div class="ch-item ch-img-6">
                              <div class="ch-info">
                                <h3>56 Nightshade,
                                    Bane Road,
                                    Merrion</h3>
                                <p><?php echo '<a href="viewProperty.php?PropertyID=6">see more</a> ' ?></p>
                              </div>
                            </div>
                          </li> <!-- Featured Property : 6 -->
                        </ul> <!-- END of LIST of Featured Properties -->
                        
                    </div>
                </div>
            </div>
        </section> <!-- END of Featured Section -->

        <!-- Quote Section -->
        <section id="quotePic" class="quote-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-7 col-lg-7">
                        <img src="img/app/dr-devices.png" class="img-responsive"> <!-- Device Mock up for Computer, Laptop, Tablets and Phones. -->
                    </div>
                    
                    <div class="quoteText col-md-5 col-lg-5">
                        <p>
                            From the ground up, we’ve re-imagined what DublinRentals.ie can be, which led us to developing a completely new site that works across all platforms, all devices, and all browsers. 
                            <br/>
                            <br/>
                            We applied that effort across our app ecosystem too, taking advantage of the power of native apps to deliver a rich and intuitive search experience. 
                            <br/>
                            <br/>
                            Log on or download our app today to see the new DublinRentals.ie.
                        </p>
                        <a href="https://itunes.apple.com/ie/genre/ios/id36?mt=8" target="_blank"><img src="img/app/dr-appstore.png" class="appLogo img-responsive"></a> <!-- Apple App Store Logo -->
                        <a href="https://play.google.com/store/apps?hl=en" target="_blank"><img src="img/app/dr-playstore.png" class="playLogo img-responsive"></a> <!-- Google Play Logo -->
                    </div>
                </div>
            </div>
        </section> <!-- END of Quote Section -->

        <!-- Footer Section is a link to another page because this section is featured all through out my pages,
             and by using a link it will be easier to edit things.-->
        <?php require 'footer.php'; ?>

        <!-- JAVASCRIPT just before the closing of the body tag --> <!-- Why its at the bottom? SPEED and so that the body, content loads faster. -->
        <script type="text/javascript" src="js/jquery.js"></script> <!-- jquery is a library, javascript framework, it has a lot of things 
        // using thwe CDN(content delivery network) for speed and efficiency for the end users -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- This is the Bootstrap script -->
    </body>
</html>


