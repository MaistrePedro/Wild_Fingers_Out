<?php

$pageTitle = 'Add your .Idea';
$pageUnderTitle = 'Share with us your crazy idea !'

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
                                <?php
                                require '../src/function.php';


                                require '../src/connec.php';

                                $pdo = new PDO(DSN, USER, PASS);
                                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    $data = cleanData($_POST);
                                    $errors = [];
                                    if (empty($data['user_name'])) {
                                    $errors['user_name'] = 'Please define your Nickname';
                                    }
                                    if (empty($data['title'])) {
                                    $errors['title'] = 'Define a title for your .Idea';
                                    }
                                    if (empty($data['idea'])) {
                                    $errors['idea'] = 'Share with us your .Idea';
                                    }
                                    if (empty($errors)) {
                                        $query = "INSERT INTO ideas (user_name, title, idea) VALUES (:user_name, :title, :idea)";
                                        $statement = $pdo->prepare($query);
                                        $statement->bindValue(':user_name', $_POST["user_name"], PDO::PARAM_STR);
                                        $statement->bindValue(':title', $_POST["title"], PDO::PARAM_STR);
                                        $statement->bindValue(':idea', $_POST["idea"], PDO::PARAM_STR);
                                        $statement->execute();
                                        header('Location: index.php');
                                    }
                                }
                                // --------------------------------------------------------- //
                                ?>

								<form id="contact-form" novalidate method="post">
									<div class="row">
										<div class="col-sm-6">
                                            <p class="errors" ><?= $errors['user_name'] ?? '' ?></p>
											<input name="user_name" id="user_name" type="text" placeholder="Nick-name*" required value="<?php
                                            if (!empty($errors)) {
                                                echo $data['user_name'];
                                            }
                                            ?>">
										</div>
										<div class="col-sm-6">
                                            <p class="errors" ><?= $errors['title'] ?? '' ?></p></label>
											<input name="title" id="title" type="text" placeholder="Title" required value="<?php
                                            if (!empty($errors)) {
                                                echo $data['title'];
                                            }
                                            ?>">
										</div>
									</div>
                                    <p class="errors"><?= $errors['idea'] ?? '' ?></p>
									<textarea name="idea" id="idea" placeholder="Your Idea*"><?php
                                        if (!empty($errors)) {
                                            echo $data['idea'];
                                        }
                                        ?>
                            </textarea>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-light">Send it now</button>
                                    </div>
									
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