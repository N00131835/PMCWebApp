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
		<meta charset="utf-8"> <!-- This is so the browers can read and display characters -->
		<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- This means that the browser will (probably) render the width of the page at the width of its own screen.
		http://css-tricks.com/snippets/html/responsive-meta-tag/ -->
    <link rel="icon" href="img/dr-icon.png">
		<title> Dublin Rentals </title> <!--  -->

		<script type="text/javascript" src="js/respond.js"></script> <!-- This is what we downloaded from github, we need to hav this is the head, the page wont load or do the responsive thing without this.  -->

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!--This the bootstrap framework stylesheet. CSS that is used for mobiles, so that its faster to load. -->

    <link rel="stylesheet" type="text/css" href="css/indexStyle.css"> <!-- custom CSS -->

    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'> <!-- custom font -->
	</head>
	
	<body>
    <div class="container-fluid">
      <div class="row">
        <nav class="navtop navbar navbar-default navbar-fixed-top">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>

            <a class="navbar-brand" href="#"><img src="img/dr-logosm.png" width="77" height="15px" style="margin-bottom:5px;"> Dublin <br/> Rentals</a>

          </div>

          <?php require 'toolbar.php'; ?>
        </nav>
      </div>
    </div>

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
          <div class="col-lg-12 col-md-9 col-sm-9">
            <h2> <strong>To Rent | Short Term</strong></h2>

            <form class="form-inline" role="form" id="searchSelects" action="" method="post">
              <div class="form-group form-inline">
                <select class="form-control" id="sel1">
                  <option>Town</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
              </div>

              <div class="form-group form-inline">
                <select class="form-control" id="sel1">
                  <option>Area</option>
                  <option>Dublin Central</option>
                  <option>Dublin Bay North</option>
                  <option>Dublin North-West</option>
                  <option>Dublin South-Central</option>
                  <option>Dublin Bay South</option>
                </select>
              </div>

              <div class="form-group form-inline">
                <select class="form-control" id="sel1">
                  <option>Type</option>
                  <option>Apartment To Let</option>
                  <option>House To Let</option>
                  <option>3</option>
                  <option>4</option>
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

                    <img src="img/dr-logosm.png">
                    <p>
                      Are you looking for a new apartment or want to buy a house?
                      <br/> 
                      Do you want to sell your property or find a roommate?
                      <br/> 
                      Dublin Rentals has 9 put of 10 properties available
                      <br/> 
                      in all areas of Dublin.
                    </p>

                    <button type="submit" class="servicesButton btn btn-default btn-lg">Get Started</button> 
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer id="footerCode" class="footer-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbot navbar">
                      <div class="navbar-footer">

                        <a class="navbar-brand" href="#"><img src="img/dr-logosm.png" width="77px" height="15px" style="margin-bottom:5px;"></a>

                      </div>

                      <div class="navbotLinks">
                        <ul class="navbar-right">
                          <li><a href="#">Home</a></li>
                          <li><a href="#">To Rent</a></li>
                          <li><a href="#">Short-term</a></li>
                          <li><a href="#">Contact Us</a></li>
                          <li><a href="#">Login</a></li>
                          <li><a href="#">Register</a></li>
                        </ul>
                      </div>
                    </nav>
                </div>

                <div class="socialFooter col-lg-12">
                  <p class="pull-left">&#169; Dublin Rentals</p>
                  <div class="socialLinks">
                    <ul class="pull-right">
                      <li><img src="img/social/fb.png"></li>
                      <li><img src="img/social/g+.png"></li>
                      <li><img src="img/social/twit.png"></li>
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT just before the closing of the body tag --> <!-- Why its at the bottom? SPEED and so that the body, content loads faster. -->
		<script type="text/javascript" src="js/jquery.js"></script> <!-- jquery is a library, javascript framework, it has a lot of things 
		// using thwe CDN(content delivery network) for speed and efficiency for the end users -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script> <!-- This is the Bootstrap script -->
	</body>
</html>


