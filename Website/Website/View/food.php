<?php
	
	include("../Model/Person.php");
	session_start();
	$person = new Person();
	$viewPromo = $person->readPromotionFromDBCategory("food");

?>


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
                        <!--<div id="company" class="about-company tab-pane fade">
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
                        </div>-->
                        <div id="team" class="team-list tab-pane fade in active">
                            <div class="row">
								
								<?php
									
									if(empty($viewPromo)){
										echo('<div class="single-blog wow fadeIn">
											<div class="blog-details">
												<div class="blog-meta"></div>
												<h3>NO PENDING PROMOTIONS</h3>
											</div>
										</div><br />');
									}
									else{

										$len = count($viewPromo);
										for ($i=0; $i<$len; $i++){
											$tempPromo = $viewPromo[$i];
											echo('<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="single-team">
                                        <div class="member-image">
                                            <img src="'.$tempPromo->getImage().'" alt="">
                                        </div>
                                        <div class="member-details">
                                            <h3>Company : '.$tempPromo->getPr_username().'</h3>
                                            <p>'.$tempPromo->getDescription().'</p>
                                            <div class="member-social-bookmark">
                                                <ul class="social-bookmark">
                                                    <li><a href="#"><i class="fa fa-phone"></i></a></li>
													 <li><a href="#"><i class="fa fa-book"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>');

										}
									}
								
								
								
								
								?>
								
								
								
								
								
								
								
                                <!--<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
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
                                </div>-->
                            </div>
                        </div>
                        <!--<div id="support" class="support-content tab-pane fade">
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
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ABOUT DETAILS AREA END-->

     <?php include "footer.php";?>
</body>

</html>
