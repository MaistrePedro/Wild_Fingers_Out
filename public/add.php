<?php

$pageTitle = 'Add your .Idea';
$pageUnderTitle = 'Great! You want to share with us your crazy .Idea ! :)'

?>


<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>.Idea - Add Yours</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="css/genix-assets.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>
<body>


	<div id="container">

        <?php
        include 'current/sidebar.php';
        ?>

		<div id="content">

            <?php
            include 'current/header.php';
            ?>


			<section class="contact-form-section">
				<div class="container">
					<div class="contact-form-box">
						<div class="row">
							<div class="col-sm-12">
								<h2>Complete our .gitignore</h2>

								<form id="contact-form">
									<div class="row">
										<div class="col-sm-6">
											<input name="name" id="name" type="text" placeholder="Lastname*">
										</div>
										<div class="col-sm-6">
											<input name="mail" id="mail" type="text" placeholder="Firstname*">
										</div>
									</div>

									<textarea name="comment" id="comment" placeholder="Your Idea*"></textarea>
									<input type="submit" id="submit_contact" value="Submit Comment">
									<div id="msg" class="message alert">
									
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>


		</div>


	</div>


	<script src="js/genix-plugins.min.js"></script>
	<script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en" type="text/javascript"></script>
	<script type="text/javascript" src="js/gmap3.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</body>
</html>