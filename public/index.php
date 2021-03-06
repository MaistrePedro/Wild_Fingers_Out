<?php

require '../src/connec.php';

$pdo = new PDO(DSN, USER, PASS);
$query = "SELECT * FROM idea";
$res = $pdo->query($query);
$idea = $res->fetchAll();


$pageTitle = 'Discover our .Idea';
$pageUnderTitle = 'So much crazy !'

?>



<!doctype html>


<html lang="en" class="no-js">
<head>
	<title>.Idea</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/genix-assets.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

        <section class="blog-page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-page-box iso-call">
                            <?php

                            foreach ($idea as $key => $value) {
                                include 'current/card.php';
                            }
                            ?>
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