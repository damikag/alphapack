<?php 
	session_start();	
	include("../Controller/monthly_report.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
	
    <meta charset="UTF-8">
    <title>වාසි.lk</title>
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
    
	 

</head>

<body class="home-two">
<!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>
	<header class="top-area" id="home">
        <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>
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
								<li><a href="index.php">home</a></li>
								<li><a href="about.html">about</a>
                                </li>
                                <li><a href="service.html">Service</a>
                                    <ul>
										<li><a href="promoterLogin.php">Login as a promoter</a></li>
										<li><a href="promoterTemplate.php">Login as a promoter112</a></li>
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

    <?php //include "header.php";?>
</header>
    
    
    <style>
		
	#table {
	  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 92%;
      margin-left: 4%;
      margin-right: 4%;
      border-radius: 6px;
      -moz-border-radius:6px;
/*	  margin: 25px;*/
	  
	}

	#table td, #table th {
	  border: 2px solid #ddd;
	  padding: 8px;
	}

	#table tr:nth-child(even){background-color: #f2f2f2;}

	#table tr:hover {background-color: #ddd;}

	#table th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: left;
	  background-color: #f39c12;
	  color: white;
	}
		
/*
	.read-more {
    background: #5d6b82 none repeat scroll 0 0;
    border-radius: 5px;
    color: #fff;
    display: inline-block;
    height: 40px;
    margin-top: 15px;
    padding: 7px 25px;
    text-align: center;
    width: 140px;
	}
*/
		
</style>

   
 
<div style="overflow-x:auto;">
<table id = "table">
	<tr>
		<th>Title</th>
		<th>Category</th>
		<th>Description</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>state</th>
		
<?php 
//		$wrapper = $_GET['wrapper'];
//		$promotionList = $wrapper->getArrayList();
////	echo $promotionList[0]->pr_username;
	$promoter = $_SESSION['promoter'];
	$promotionList = $_SESSION['promotionList'];
	$subscribeCount = $_SESSION['subscribeCount'];
	
		
	foreach ($promotionList as $promo){
		echo "<tr>";
		echo "<td>".$promo->getTitle()."</td>";
		echo "<td>".$promo->getCategory()."</td>";
		echo "<td>".$promo->getDescription()."</td>";
		echo "<td>".$promo->getStartDate()."</td>";
		echo "<td>".$promo->getEndDate()."</td>";
		echo "<td>".$promo->getState()."</td>";
		// echo "</tr>";
	}
    ?>
		
	</tr>
</table>
</div>

    <!--BLOG AREA-->
    <section class="blog-area gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                        <!--<div class="blog-image">
                            <img src="img/blog/blog_1.jpg" alt="">
                        </div>-->
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><!--<i class="fa fa-ship"></i>--></a></div>
                            <h3><a href="single-blog.html">ADD PROMOTIONS</a></h3>
                            <p>Click below to add a new promotion!</p>
                            <a href="#" class="read-more">ADD</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                        <!--<div class="blog-image">
                            <img src="img/blog/blog_1.jpg" alt="">
                        </div>-->
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><!--<i class="fa fa-ship"></i>--></a></div>
                            <h3><a href="single-blog.html">UPDATE DETAILS</a></h3>
                            <p>Click below to upadte your business details!</p>
                            <a href="#" class="read-more">UPDATE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                        <!--<div class="blog-image">
                            <img src="img/blog/blog_1.jpg" alt="">
                        </div>-->
                        <div class="blog-details text-center">
                            <div class="blog-meta"><a href="#"><!--<i class="fa fa-ship"></i>--></a></div>
                            <h3><a href="single-blog.html">VIEW PROMOTIONS</a></h3>
                            <p>Click below to view promotions of your business.</p>
                            <a href="#" class="read-more">VIEW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--BLOG AREA END-->


<!--<a href="#" class="read-more">Save</a>-->

<?php include "footer.php";?>

</body>

</html>
