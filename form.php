<?php

//connection to database .idea via connec.php

require 'connec.php';
$pdo = new PDO(DSN, USER, PASS);
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = trimArray($_POST); //function trim will get rid of empty spaces at both ends of a string

//Validates if all fields are not empty and create a variable (type Array) to store errors.

    $errors = array();

//start of validation

    if (empty($data['lastname'])) {
        $errors['lastname'] = "Ce champ est obligatoire...merci !";
    }

    if (empty($data['firstname'])) {
        $errors['firstname'] = "Ce champ est obligatoire...merci !";
    }

    if (empty($data['idea'])) {
        $errors['idea'] = "Ce champ est obligatoire...merci !";
    }

//checking for any errors

    if (empty ($errors)) {
        //record into database
        $query = "INSERT INTO ideas (lastname, firstname, idea) VALUES (:last_name, :first_name, :idea)";
        $statement = $pdo->prepare($query);
        var_dump($data);
        $statement->bindValue(':last_name', $data['lastname'], PDO::PARAM_STR);
        $statement->bindValue(':first_name', $data['firstname'], PARAM_STR);
        $statement->bindValue(':idea', $data['idea'], PDO::PARAM_STR);

        $statement->execute();

        //redirect to success page
        header("Location: success.php");
        //exit so the rest of the script does not run
        exit();
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">


    <title>Ideas</title>
</head>

<body>

<div class="container">


    <!--start of form -->

    <form action="addproductform.php" method="post">
        <h2>We wanna hear about your great idea!</h2><br>

        <div class="form-group">
            <label for="produit">Lastname :</label>
            <input class="form-control" type="text" id="lastname" name="lastname">
            <!--required removed so we can test the server side-->
            <p><?php if (isset($errors['lastname'])) echo $errors['lastname']; ?></p>
        </div>

        <div class="form-group">
            <label for="firstname">Firstname :</label>
            <input class="form-control" type="number" id="firstname" name="firstname">
            <!--required removed so we can test the server side-->
            <p><?php if (isset($errors['firstname'])) echo $errors['firstname']; ?></p>
        </div>

        <div class="form-group">
            <label for="idea">Idea :</label>
            <input class="form-control" type="url" id="idea" name="idea">
            <!--required removed so we can test the server side-->
            <p><?php if (isset($errors['idea'])) echo $errors['idea']; ?></p>
        </div>

        <div class="button">
            <button class="btn btn-primary">Click to submit your great idea!</button>
        </div>

    </form>
    <!--end of form -->

</div>
</body>

</html>