<?php

require '../model/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

    //on assigne une variable d'erreur puis on initialise nos messages d'erreurs; 
    $nameError = '';
    $firstnameError = '';
    $ageError = '';
    $telError = '';
    $emailError = '';
    $countryError = '';
    $commentError = '';
    $jobError = '';
    $urlError = '';

    // on recupère nos valeurs 
    $name = htmlentities(trim($_POST['name']));
    $firstname = htmlentities(trim($_POST['firstname']));
    $age = htmlentities(trim($_POST['age']));
    $tel = htmlentities(trim($_POST['tel']));
    $email = htmlentities(trim($_POST['email']));
    $country = htmlentities(trim($_POST['country']));
    $comment = htmlentities(trim($_POST['comment']));
    $job = htmlentities(trim($_POST['job']));
    $url = htmlentities(trim($_POST['url']));

    // on vérifie nos champs 
    $valid = true; //boolean (set on true)

    //verification champ name
    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameError = "Only letters and white space allowed";
    }

    //verification champ firstname
    if (empty($firstname)) {
        $firstnameError = 'Please enter firstname';
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) { //$name
        $firstnameError = "Only letters and white space allowed";      //$nameError   
    }

    //verification champ email 
    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    } elseif (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]{2,4}+$/", $email)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    }

    //verification champ age //0 - 150
    if (empty($age)) {
        $ageError = 'Please enter your age';
        $valid = false;
    } elseif (preg_match("#^[0-9]*$#", $age)) {
        if ($age > 150 || $age <= 0) {
            $ageError = 'Please enter a valid age';
            $valid = false;
        }
    } elseif (!preg_match("#^[0-9]*$#", $age)) {

        $ageError = 'Please enter a valid age';
        $valid = false;
    }


    //verification champ tel
    if (empty($tel)) {
        $telError = 'Please enter phone';
        $valid = false;
    } else if (!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $tel)) {
        $telError = 'Please enter a valid phone';
        $valid = false;
    }

    //verification champ country
    if (!isset($country)) {
        $countryError = 'Please select a country';
        $valid = false;
    }

    //verification champ comment
    if (empty($comment)) {
        $commentError = 'Please enter a description';
        $valid = false;
    }

    //verification champ job
    if (empty($job)) {
        $jobError = 'Please select a job';
        $valid = false;
    }

    //verification champ url
    if (empty($url)) {
        $urlError = 'Please enter website url';
        $valid = false;
    } else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
        $urlError = 'Enter a valid url';
        $valid = false;
    }

    // si les données sont présentes et bonnes, on se connecte à la base 
    if ($valid) {
        $pdo = Database::getConnetion();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO user (name,firstname,age,tel, email, country,comment, job,url) values(?, ?, ?, ? , ? , ? , ? , ?, ?)";
        $q = $pdo->prepare($sql);
        $toExecute = $q->execute(array($name, $firstname, $age, $tel, $email, $country, $comment, $job, $url));
        Database::disconnect();
        header("Location: ../index.php");
    }
}
