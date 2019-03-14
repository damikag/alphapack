<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>Food</title>
    <link rel="shortcut icon" type="image/ico" href="../Extra/img/favicon.png" />
	
    <!--====== STYLESHEETS ======-->
	<link rel="stylesheet" href="../Extra/css/normalize.css">
    <link rel="stylesheet" href="Extra/css/normalize.css">
    <link rel="stylesheet" href="../Extra/css/animate.css">
    <link rel="stylesheet" href="../Extra/css/stellarnav.min.css">
    <link rel="stylesheet" href="../Extra/css/owl.carousel.css">
    <link href="../Extra/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Extra/css/font-awesome.min.css" rel="stylesheet">
	<link href="../Extra/css/imagehover.min.css" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
	<link rel="stylesheet" href="../Extra/css/style2.css">
    <link href="style.css" rel="stylesheet">
    <link href="../Extra/css/responsive.css" rel="stylesheet">
	<link href="../Extra/css/ihover.css" rel="stylesheet">

    <script src="../Extra/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="single-page">
	
    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area single-page" id="home">
        <div class="top-area-bg-food" data-stellar-background-ratio="0.6"></div>
        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
                <div class="mainmenu-area-bg"></div>
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="#home" class="navbar-brand"><img src="../Extra/img/logo.png" alt="logo"></a>
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
								<li><a href="#">home</a></li>
								<li><a href="#">about</a>
                                </li>
                                <li><a href="#">Service</a>
                                    <ul>
										<li><a href="promoterLogin.php">Login as a promoter</a></li>
										<li><a href="promoterTemplate.php">Login as a promoter112</a></li>
										<li><a href="promoterIndex.php">Login as a promoter112</a></li>
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
                                        <li class="logout-submit"><a href="../Controller/logout.php">Logout</a></li>
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
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>Food promotions</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--END TOP AREA-->

    <!--ABOUT DETAILS AREA-->
    <section class="about-details-area section-padding wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="tab-content about-details-content">
                        <div id="company" class="about-company tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="about-history-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="about-history-content">
                                        <img src="img/about/about-cargo.png" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="about-history-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <div class="about-history-content">
                                        <h3>Our Mission</h3>
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        <a href="#" class="read-more">Learn More</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <div class="about-history-content">
                                        <img src="img/about/about-details-bottom.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <div class="about-history-content">
                                        <h3>Our Vision</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <ul>
                                            <li><i class="fa fa-check"></i> Lorem ipsum dolor sit amet, consectetur.</li>
                                            <li><i class="fa fa-check"></i> Lorem ipsum dolor sit amet, consectetur.</li>
                                            <li><i class="fa fa-check"></i> Lorem ipsum dolor sit amet, consectetur.</li>
                                        </ul>
                                        <a href="#" class="read-more">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="history" class="company-history tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="about-history-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="about-history-content">
                                        <img src="img/about/about-cargo.png" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="about-history-content history-list">
                                        <div class="single-history">
                                            <div class="history-year">
                                                <p>2011</p>
                                            </div>
                                            <h4>we start our business</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                                        </div>
                                        <div class="single-history">
                                            <div class="history-year">
                                                <p>2012</p>
                                            </div>
                                            <h4>we co-opperate problem solution</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                                        </div>
                                        <div class="single-history">
                                            <div class="history-year">
                                                <p>2014</p>
                                            </div>
                                            <h4>we are expanding our network </h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                                        </div>
                                        <div class="single-history">
                                            <div class="history-year">
                                                <p>2016</p>
                                            </div>
                                            <h4>we are serve worldwide </h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="report" class="company-anual-reports tab-pane fade">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="annual-reports">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                <div class="annual-reports-image">
                                                    <img src="img/reports/2012.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                <div class="annual-reports-content">
                                                    <h4>2016 logistics transportation annual reprot</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                                    <ul>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 pull-right">
                                                <div class="annual-reports-image">
                                                    <img src="img/reports/2015.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                <div class="annual-reports-content">
                                                    <h4>2016 logistics transportation annual reprot</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                                    <ul>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                <div class="annual-reports-image">
                                                    <img src="img/reports/2016.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                <div class="annual-reports-content">
                                                    <h4>2016 logistics transportation annual reprot</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                                    <ul>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 pull-right">
                                                <div class="annual-reports-image">
                                                    <img src="img/reports/2017.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                <div class="annual-reports-content">
                                                    <h4>2016 logistics transportation annual reprot</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                                    <ul>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                        <li><i class="fa fa-check"></i> Sed quia consequuntur magni dolores eos.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="team" class="team-list tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-1.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>John Bruig</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-2.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Lara Dotto</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-3.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Labong Mitro</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-4.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>John Part</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-5.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Jora Pata</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="img/team/member-6.jpg" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Dimra Ajax</h3>
                                            <p>Founder 'G'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="support" class="support-content tab-pane fade">
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
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <div class="promo-img">
                                        <img src="img/promo/promo_troli.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ABOUT DETAILS AREA END-->

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
                        <div class="single-footer-widget footer-about"></div>
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
                        <div class="single-footer-widget list-widget">
                            <h3>Main Catgories</h3>
                            <ul>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Movies</a></li>
                                <li><a href="#">Cloths and Accessories</a></li>
								<li><a href="#">Electronic Equipments</a></li>
                                <li><a href="#">Sports Equipments</a></li>
								<li><a href="#">Other</a></li>
                            </ul>
                        </div>
                    </div>
					
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
					<!--<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="single-footer-widget instafeed-widget">
                            <h3>Main Categories</h3>
                            <ul>
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
								
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								<li>
								<div class="ih-item square colored effect4"><a href="#">
									<div class="img"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt="img"></div>
									<div class="mask1"></div>
									<div class="mask2"></div>
									<div class="info">
										<h3>Food</h3>
								</li>
									
								
									
                            <!--    <li><a href="#"><img src="img/instafeed/04-fashion-upgrades-classic-coat11s.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/04-fashion-upgrades-classic-coats (1).jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/04-fashion-upgrades-classic-coats.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/Girl_Soccer_Goalie.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/movies.jpg" alt=""></a></li>
                                <li><a href="#"><img src="img/instafeed/perfect-selfie.jpg" alt=""></a></li>-->
                           <!-- </ul>
                        </div>
                    </div> -->
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
    <script src="../Extra/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../Extra/js/vendor/bootstrap.min.js"></script>

    <!--====== PLUGINS JS ======-->
    <script src="../Extra/js/vendor/jquery.easing.1.3.js"></script>
    <script src="../Extra/js/vendor/jquery-migrate-1.2.1.min.js"></script>
    <script src="../Extra/js/vendor/jquery.appear.js"></script>
    <script src="../Extra/js/owl.carousel.min.js"></script>
    <script src="../Extra/js/stellar.js"></script>
    <script src="../Extra/js/wow.min.js"></script>
    <script src="../Extra/js/stellarnav.min.js"></script>
    <script src="../Extra/js/contact-form.js"></script>
    <script src="../Extra/js/jquery.sticky.js"></script>

    <!--===== ACTIVE JS=====-->
    <script src="../Extra/js/main.js"></script>
</body>

</html>
