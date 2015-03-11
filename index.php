<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$statement = $gateway->getProperty();
?>
<!-- This is where the ready made Property List is placed. -->
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

    <body>
        <!-- Header Navigation is in a separate page, so that when I want to edit something i can just go in to the header.php page 
            and make my edits there, instead of having to edit it in a lot of pages.  -->
        <?php require 'header.php'; ?>

        <!-- Intro Section -->
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
        </div><!-- /.carousel -->

        <!-- Search Box Section -->
        <section id="searchbox" class="search-section">
          <div class="container">
            <div class="row">
              <div class="col-lg-offset-0 col-lg-12 col-md-offset-2 col-md-9 col-sm-offset-1 col-sm-10 col-xs-offset-1">
                <h2> <strong>To Rent | Short Term</strong></h2>

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
                  </div>
                    
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
                  </div>

                  <div class="form-group form-inline">
                    <select class="form-control" id="sel1">
                      <option>Type</option>
                      <option>Apartment To Let</option>
                      <option>House To Let</option>
                      <option>Studio To Let</option>
                      <option>Flat To Let</option>
                    </select>
                  </div>
                </form>

                  <button type="submit" class="searchButton btn btn-default btn-lg">Search</button>

              </div>
            </div> 
          </div>
        </section>

        <!-- Quote Section -->
        <section id="quotePic" class="quote-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">

                        <img src="img/mobile-apps.png" class="quoteImg img-responsive pull-right">
                        <h3>Lorem ipsum dolor sit amet.</h3>
                        <p class="quoteSec pull-left col-lg-3 col-xs-3">
                          We are a firm that is truly
                          <br/>
                          dedicated to providing
                          <br/> only the highest 
                          <br/>
                          of quality of service,
                          <br/>
                          & exceptional industry
                          <br/>
                          knowledge and experience
                          <br/>
                          that our clients can genuinely
                          <br/>
                          trust with confidence.
                        </p>


                    </div>
                </div>
            </div>
        </section>

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
                                <p><a href="#">see more</a></p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="ch-item ch-img-2">
                              <div class="ch-info">
                                <h3>23 Block D,
                                    Whitestone Ward,
                                    Cabra</h3>
                                <p><a href="#">see more</a></p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="ch-item ch-img-3">
                              <div class="ch-info">
                                <h3>1623 Storybrooke,
                                    Park,
                                    Tallaght</h3>
                                <p><a href="#">View on Dribbble</a></p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="ch-item ch-img-4">
                              <div class="ch-info">
                                <h3>34 Dale Field,
                                    New Park,
                                    Phibsboro</h3>
                                <p><a href="#">see more</a></p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="ch-item ch-img-5">
                              <div class="ch-info">
                                <h3>70 Fairwall,
                                    Maine Avenue,
                                    Finglas</h3>
                                <p><a href="#">see more</a></p>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="ch-item ch-img-6">
                              <div class="ch-info">
                                <h3>56 Nightshade,
                                    Bane Road,
                                    Merrion</h3>
                                <p><a href="#">see more</a></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

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

                        <a href="register.php"><button type="submit" class="servicesButton btn btn-default btn-lg">Get Started</button></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <?php require 'footer.php'; ?>

        <!-- JAVASCRIPT just before the closing of the body tag --> <!-- Why its at the bottom? SPEED and so that the body, content loads faster. -->
        <script type="text/javascript" src="js/jquery.js"></script> <!-- jquery is a library, javascript framework, it has a lot of things 
        // using thwe CDN(content delivery network) for speed and efficiency for the end users -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- This is the Bootstrap script -->
    </body>
</html>


