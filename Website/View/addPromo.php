<?php

	session_start();
	if(!(isset($_SESSION['userNamePromoter']))){
		header("Location: ../View/404.php");
		exit();
	}
		
?>



<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>වාසි.lk-header</title>
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


	<body style="background-color:DodgerBlue;">
	
    <header class="top-area single-page" id="home">
        <div class="top-area-bg-movies" data-stellar-background-ratio="0.6"></div>
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
                        		<?php
									if(!(isset($_SESSION["userNamePromoter"]))){
										echo ('<li><a href="#">Service</a>
                                    <ul>
										<li><a href="promoterSignup.php">Register as a promoter</a></li>
                                    </ul>
                                </li>');
									}
								?>
								<li class="logged-user">
									<?php
									
									if (isset($_SESSION["userName"])){
										
										$username = $_SESSION["userName"];
										if (isset($_SESSION['userNameCustomer'])){
											echo '<a href="index.php" class="logged-user" background-colour="lightsalmon">
											'.$username.'
											</a>';
										}
										elseif(isset($_SESSION['userNamePromoter'])){
											echo '<a href="promoterIndex.php" class="logged-user" background-colour="lightsalmon">
											'.$username.'
											</a>';											
										}
										else{
											echo '<a href="adminView.php" class="logged-user" background-colour="lightsalmon">
											'.$username.'
											</a>';											
										}
										

										echo '<ul>
											<li class="logout-submit"><a href="../Controller/logout.php">Logout</a></li>
										</ul>';
									}
									
									else{
										echo '<a href="login.php">LOGIN</a>';		
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
                            <h2>Add Promotion</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
		
		<section class="about-area gray-bg section-padding">
		<div class="container-signup">	
      		<div class="form">
				
			<form action="../Controller/addPromo_submit.php" method="post" enctype="multipart/form-data">
				
				
				<select name="category">
					<option value="food">FOOD</option>
					<option value="cloths-accessories">CLOTHS & ACCESSORIES</option>
					<option value="movies">MOVIES</option>
					<option value="electronic-devices">ELECTRONIC DEVICES</option>
					<option value="sport-equipments">SPORTS EQUIPMENTS</option>
					<option value="other">OTHER</option>
			  </select>
				
				<input type="text" placeholder="Enter the Title" name="title">
				<input type="text" placeholder="Enter the Description" name="description">
				<input type="date" placeholder="Enter the Start Date" name="start-time">
				<input type="date" placeholder="Enter the end date" name="end-time">
				<input type="url" placeholder="Enter your link" name="link">
				<input type="text" placeholder="Enter the location" name="location">
				<input type="file" name="fileToUpload" id="fileToUpload">
				
				<br>
				
				<button type="submit" name="addPromo-submit">Add Promo</button>
				
			</form>
		
			</div>
		</div>	
    </section>
			

		
		<?php include "footer.php";?>
	</body>





</html>