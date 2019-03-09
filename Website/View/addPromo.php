<?php

	session_start();
		
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
	
		<?php include "header.php";?>
		
		<section class="about-area gray-bg section-padding">
		<div class="container-signup">	
      		<div class="form">
				
			<form action="../Controller/addPromo_submit.php" method="post">
				
				
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
				<input type="image">
				
				<br>
				
				<button type="submit" name="addPromo-submit">Add Promo</button>
				
			</form>
		
			</div>
		</div>	
    </section>
			

		
		<?php include "footer.php";?>
	</body>





</html>