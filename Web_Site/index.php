<?php

	session_start();
		
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>වාසි.lk</title>
    <link rel="shortcut icon" type="image/ico" href="img/favicon.png" />
	
    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/stellarnav.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/imagehover.min.css" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
	<link rel="stylesheet" href="css/style2.css">
    <link href="style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	<link href="css/ihover.css" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="home-one">

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area" id="home">
        <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="#home" class="navbar-brand"><img src="img/logo.png" alt="logo"></a>
                        </div>
                        <div class="search-and-language-bar pull-right">
                            <ul>
								<?php
									if (! isset($_SESSION["userName"])){
										echo '<li><a href="login.php"><i class="fa fa-user"></i></a></li>';
										
									}
								?>
                                
                                <li class="search-box"><i class="fa fa-search"></i></li>
                               	</li>
                            </ul>
                            <form action="#" class="search-form">
                                <input type="search" name="search" id="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div id="main-nav" class="stellarnav">
                            <ul id="nav" class="nav navbar-nav">
								<li><a href="index.php">home</a></li>
								<li><a href="about.html">about</a>
                                </li>
                                <li><a href="service.html">Service</a>
                                    <ul>
										<li><a href="promoterLogin.php">Login as a promoter</a></li>
                                    </ul>
                                </li>
								<li class="logged-user">
									<?php
									
									if (isset($_SESSION["userName"])){
										
										$username = $_SESSION["userName"];
										echo '<a href="#" class="logged-user" background-colour="lightsalmon">
									'.$username.'
									</a>
                                    <ul>
                                        <li class="logout-submit"><a href="includes/logout.php">Logout</a></li>
                                        <li><a href="contact-2.html">Contact Version 2</a></li>
                                    </ul>';
									}
									
									else{
										echo '<a href="login.php">LOGIN AS A CUSTOMER</a>';		
									}
								?>								
								</li>	
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!--END MAINMENU AREA END-->
        </div>
        <!--HOME SLIDER AREA-->
        <div class="welcome-slider-area">
            <div class="welcome-single-slide slider-bg-one">
                <div class="container">
                    <div class="row flex-v-center">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="welcome-text text-center">
                                <h1>ALL YOUR PROMOTION NEEDS IN ONE PLACE!</h1>
                                <p>Without promotion, something terrible happens... nothing!</p>
                                <div class="home-button">
                                    <a href="#categories">Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-single-slide slider-bg-two">
                <div class="container">
                    <div class="row flex-v-center">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="welcome-text text-center">
                                <h1>ALL YOUR PROMOTION NEEDS IN ONE PLACE!</h1>
                                <p>Without promotion, something terrible happens... nothing!</p>
                                <div class="home-button">
                                    <a href="#categories">Categories</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="welcome-single-slide slider-bg-three">
                <div class="container">
                    <div class="row flex-v-center">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="welcome-text text-center">
                                <h1>ALL YOUR PROMOTION NEEDS IN ONE PLACE!</h1>
                                <p>Without promotion, something terrible happens... nothing!</p>
                                <div class="home-button">
                                    <a href="#categories">Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END HOME SLIDER AREA-->
    </header>
    <!--END TOP AREA-->

    <!--BLOG AREA-->
    <section class="blog-area gray-bg padding-top" id="categories">
		<h2 class="index-h2">OUR MAIN CATEGORIES</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
						<div class ="blog-image">
							<figure class="imghvr-hinge-left"><img src="img/blog/04-fashion-upgrades-classic-coats.jpg" alt="example-image">
							<figcaption>
								<h3 align="center">FOOD</h3>
								<p align="center">“If more of us valued food and cheer and song above hoarded gold, it would be a merrier world.” 
								― J.R.R. Tolkien</p>
								<p align="center">Check out food promotions here!</p>
							</figcaption>
							</figure>
						</div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.3s">
						<div class ="blog-image">
							<figure class="imghvr-hinge-up"><img src="img/blog/04-fashion-upgrades-classic-coats (1).jpg" alt="example-image">
							<figcaption>
								<h3 align="center">CLOTHS &amp; ACCESSORIES</h3>
								<p align="center">"You can have anything you want in life if you dress for it." — Edith Head.</p>
								<p align="center">Check out cloths &amp; accessories promotions here!</p>
							</figcaption>
							</figure>
						</div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
						<div class ="blog-image">
							<figure class="imghvr-hinge-right"><img src="img/blog/movies.jpg" alt="example-image">
							<figcaption>
								<h3 align="center">MOVIES</h3>
								<p align="center">“It's funny how the colors of the real world only seem really real when you watch them on a screen.” 
								― anthony burgess, A Clockwork Orange.</p>
								<p align="center">Check out movies promotions here!</p>
							</figcaption>
							</figure>
						</div>
                    </div>
                </div>
				<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
						<div class ="blog-image">
							<figure class="imghvr-hinge-left"><img src="img/blog/perfect-selfie.jpg" alt="example-image">
							<figcaption>
								<h3 align="center">ELECTRONIC DEVICES</h3>
								<p align="center">"The new electronic independence re-creates the world in the image of a global village"- Marshall McLuhan.</p>
								<p align="center">Check out electronic devices promotions here!</p>
							</figcaption>
							</figure>
						</div>
                    </div>
                </div>
				<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
						<a href="index.php">
                        <div class ="blog-image">
							<figure class="imghvr-hinge-down"><img src="img/blog/Girl_Soccer_Goalie.jpg" alt="example-image">
							>
							<figcaption>
								<h3 align="center">SPORTS EQUIPMENTS</h3>
								<p align="center">"Champions keep playing until they get it right" - Billie Jean King</p>
								<p align="center">Check out sports equipments promotions here!</p>
							</figcaption>
							
							</figure>
						</div>
						</a>
                    </div>
                </div>
				<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.4s">
                        <div class ="blog-image">
							<figure class="imghvr-hinge-right"><img src="img/blog/04-fashion-upgrades-classic-coat11s.jpg" alt="example-image">
							<figcaption>
								<h3 align="center">OTHER</h3>
								<p align="center">Check out other promotions here!</p>
							</figcaption>
							</figure>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--BLOG AREA END-->

    <!--ABOUT AREA-->
    <section class="about-area gray-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="quote-form-area wow fadeIn">
                        <h3>Get A Quote</h3>
                        <form class="quote-form" action="#">
                            <p class="width-full">
                                <input type="text" name="name" id="name" placeholder="Your Name">
                            </p>
                            <p class="width-half">
                                <input type="email" name="email" id="email" placeholder="Email">
                                <input class="pull-right" type="phone" name="phone" id="phone" placeholder="Phone">
                            </p>
                            <p class="width-half">
                                <input type="text" name="type" id="type" placeholder="Type">
                                <input class="pull-right" type="text" name="quantity" id="quantity" placeholder="Quantity">
                            </p>
                            <p class="width-full">
                                <input type="text" name="destination" id="destination" placeholder="Destination">
                            </p>
                            <p>
                                <textarea name="quote-message" id="quote-message" cols="30" rows="4" placeholder="Your Message..."></textarea>
                            </p>
                            <button type="submit">Send</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                    <div class="about-content-area wow fadeIn">
                        <div class="about-content">
                            <h2>We have 25 years experience in this passion</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,</p>
                            <a href="#">read more <i class="fa fa-angle-right"></i></a>
                        </div>
                        <div class="about-count">
                            <div class="single-about-count">
                                <h4><i class="fa fa-suitcase"></i> 120</h4>
                                <p>Project Done</p>
                            </div>
                            <div class="single-about-count">
                                <h4><i class="fa fa-thumbs-o-up"></i> 100</h4>
                                <p>Project Done</p>
                            </div>
                            <div class="single-about-count">
                                <h4><i class="fa fa-users"></i> 30</h4>
                                <p>Project Done</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ABOUT AREA END-->

    <!--SERVICE AREA-->
    <section class="service-area">
        <div class="service-top-area padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                        <div class="area-title text-center wow fadeIn">
                            <h2>Our Service</h2>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                        <div class="service-content wow fadeIn">
                            <h2>we offer quick & powerful logistics solution</h2>
                            <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you.</p>
                            <a href="service.html" class="read-more">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="service-catalouge-content-area wow fadeIn">
                            <div class="service-catalouge-bg"></div>
                            <div class="row">
                                <div class="col-md-7 col-lg-7 col-md-offset-5 col-lg-offset-5 col-sm-12 col-xs-12">
                                    <div class="catalouge-content">
                                        <h3>Why Choose Us ?</h3>
                                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you.</p>
                                        <ul>
                                            <li><i class="fa fa-check"></i> Lorem ipsum dolor sit amet, consectetur.</li>
                                            <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                            <li><i class="fa fa-check"></i> Nemo enim ipsam voluptatem .</li>
                                            <li><i class="fa fa-check"></i> We denounce with righteous indignation.</li>
                                        </ul>
                                        <a href="service.html" class="read-more">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-bottom-area section-padding">
            <div class="service-bottom-area-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-md-offset-6 col-lg-offset-6 col-sm-12 col-xs-12">
                        <div class="service-list wow fadeIn">
                            <div class="single-service">
                                <div class="service-icon-hexagon">
                                    <div class="hex">
                                        <div class="service-icon">
                                            <i class="fa fa-dropbox"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h4>Ware House</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    <a href="#">read more</a>
                                </div>
                            </div>
                            <div class="single-service">
                                <div class="service-icon-hexagon">
                                    <div class="hex">
                                        <div class="service-icon"><i class="fa fa-truck"></i></div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h4>Road Freight</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    <a href="#">read more</a>
                                </div>
                            </div>
                            <div class="single-service">
                                <div class="service-icon-hexagon">
                                    <div class="hex">
                                        <div class="service-icon"><i class="fa fa-ship"></i></div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h4>Sea Freight</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    <a href="#">read more</a>
                                </div>
                            </div>
                            <div class="single-service">
                                <div class="service-icon-hexagon">
                                    <div class="hex">
                                        <div class="service-icon"><i class="fa fa-plane"></i></div>
                                    </div>
                                </div>
                                <div class="service-details">
                                    <h4>Air Freight</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    <a href="#">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SERVICE AREA END-->

    <!--PROMO AREA-->
    <section class="promo-area">
        <div class="promo-top-area section-padding wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-promo">
                            <div class="promo-icon"><i class="fa fa-anchor"></i></div>
                            <div class="promo-details">
                                <h3>Our Location</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="single-promo">
                            <div class="promo-icon"><i class="fa fa-newspaper-o"></i></div>
                            <div class="promo-details">
                                <h3>Latest News</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="single-promo">
                            <div class="promo-icon"><i class="fa fa-umbrella"></i></div>
                            <div class="promo-details">
                                <h3>24/7 Support</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="single-promo">
                            <div class="promo-icon"><i class="fa fa-bicycle"></i></div>
                            <div class="promo-details">
                                <h3>Fast Delevery</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="promo-bottom-area section-padding">
            <div class="promo-botton-area-bg" data-stellar-background-ratio="0.6"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12 text-center">
                        <div class="promo-bottom-content wow fadeIn">
                            <h2>we provide international freight &amp; logistics service worldwidw</h2>
                            <a href="#" class="read-more">Get a quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--PROMO AREA END-->

    <!--TESTMONIAL AREA -->
    <section class="testmonial-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>what client’s say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                    <div class="client-photo-list wow fadeIn">
                        <div class="client_photo">
                            <div class="item">
                                <img src="img/testmonial/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="img/testmonial/2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="img/testmonial/3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="img/testmonial/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="img/testmonial/2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="client_nav">
                        <span class="fa fa-angle-left testi_prev"></span>
                        <span class="fa fa-angle-right testi_next"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-md-10 col-md-offset-1 text-center">
                    <div class="client-details-content wow fadeIn">
                        <div class="client_details">
                            <div class="item">
                                <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </q>
                                <h3>JABIN KANE</h3>
                                <p>CEO, TOPSMMPANEL.COM</p>
                            </div>
                            <div class="item">
                                <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </q>
                                <h3>JABIN KANE</h3>
                                <p>CEO, TOPSMMPANEL.COM</p>
                            </div>
                            <div class="item">
                                <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </q>
                                <h3>JABIN KANE</h3>
                                <p>CEO, TOPSMMPANEL.COM</p>
                            </div>
                            <div class="item">
                                <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </q>
                                <h3>JABIN KANE</h3>
                                <p>CEO, TOPSMMPANEL.COM</p>
                            </div>
                            <div class="item">
                                <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </q>
                                <h3>JABIN KANE</h3>
                                <p>CEO, TOPSMMPANEL.COM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--TESTMONIAL AREA END -->

    <!--FOOER AREA-->
    <div class="footer-area dark-bg">
        <div class="footer-area-bg"></div>
        <div class="footer-top-area wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="subscribe-content">
                            <h2>WAASI.LK</h2>
                            <p>The biggest promotion collection in Sri Lanka.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-border"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-area wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget footer-about">
                            <h3>About Us</h3>
                            <p>We revolutionside the way of promotion in the country.</p>
                            <ul>
                                <li><i class="fa fa-phone"></i> <a href="callto:+8801911854378">011-299-9999</a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:backpiper.com@gmail.com">xxx.com@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget list-widget">
                            <h3>Customer Service</h3>
                            <ul>
                                <li><a href="#">Support Forums</a></li>
                                <li><a href="#">Communication</a></li>
                                <li><a href="#">FAQS</a></li>
								<li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
					<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget instafeed-widget">
                            <h3>Main Categories</h3>
                            <ul>
								<li>
								<div class="ih-item circle colored effect2 right_to_left"><a href="#">
								<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
								<div class="info">
								  <h3>Food</h3>
								  <p>Promotions of food!</p>
								</div></a></div>
								</li>
								
								<li>
								<div class="ih-item circle colored effect2 right_to_left"><a href="#">
								<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
								<div class="info">
								  <h3>Food</h3>
								  <p>Promotions of food!</p>
								</div></a></div>
								</li>
								
								<li>									
								<div class="ih-item circle colored effect2 right_to_left"><a href="#">
								<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
								<div class="info">
								  <h3>Food</h3>
								  <p>Promotions of food!</p>
								</div></a></div>
								</li>
								
								<li>	
								<div class="ih-item circle colored effect2 right_to_left"><a href="#">
								<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
								<div class="info">
								  <h3>Food</h3>
								  <p>Promotions of food!</p>
								</div></a></div>
								</li>
									
								<li>
								<div class="ih-item circle colored effect2 right_to_left"><a href="#">
								<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
								<div class="info">
								  <h3>Food</h3>
								  <p>Promotions of food!</p>
								</div></a></div>
								</li>
								
								<li>	
								<div class="ih-item circle colored effect2 right_to_left"><a href="#">
								<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
								<div class="info">
								  <h3>Food</h3>
								  <p>Promotions of food!</p>
								</div></a></div>
								</li>
									
                            <!--    <li><a href="#"><img src="img/instafeed/04-fashion-upgrades-classic-coat11s.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/04-fashion-upgrades-classic-coats (1).jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/Girl_Soccer_Goalie.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/movies.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/perfect-selfie.jpg" alt=""></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-border"> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="footer-copyright wow fadeIn">
                           
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="footer-social-bookmark text-right wow fadeIn">
                            <ul class="social-bookmark">
								<li><a href="https://www.facebook.com/%E0%B7%80%E0%B7%8F%E0%B7%83%E0%B7%92lk-491144901414109/?modal=admin_todo_tour"><i class="fa fa-facebook fa-2x"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
    <!--FOOER AREA END-->


    <!--====== SCRIPTS JS ======-->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>

    <!--====== PLUGINS JS ======-->
    <script src="js/vendor/jquery.easing.1.3.js"></script>
    <script src="js/vendor/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/vendor/jquery.appear.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/stellarnav.min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!--===== ACTIVE JS=====-->
    <script src="js/main.js"></script>
</body>

</html>
