<?php

require '../model/connect.php';

//initialisation id
$id = null;
if ( !empty($_GET['id'])) { 
    $id = $_REQUEST['id']; 
}

if ( null==$id ) { 
    header("Location: ../index.php"); 
}


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
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $age = $_POST['age'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $comment = $_POST['comment'];
    $job = $_POST['job'];
    $url = $_POST['url'];

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
            $ageError = 'Please enter a valid age, number between 0 to 150';
            $valid = false;
        }
    } elseif (!preg_match("#^[0-9]*$#", $age)) {

        $ageError = 'Please enter a valid age, number between 0 to 150';
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


    // mise à jour des données 
    if ($valid) {

        //on lance la connection 
        $pdo = Database::getConnetion();

        //PDO : represente la connection entre php et un serveur de base de donnee
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //On lance la requete (qui affichera chaque element retrouné)
        $sql = "UPDATE user SET name = ?,firstname = ?,age = ?,tel = ?, email = ?, country = ?, comment = ?, job = ?, url = ? WHERE id = ?";

        //Preparing Statement
        $q = $pdo->prepare($sql);


        $toExecute = $q->execute(array($name, $firstname, $age, $tel, $email, $country, $comment, $job, $url, $id));

        //on arrete la connection 
        Database::disconnect();
        header("Location: ../index.php");
    }
} else {

    $pdo = Database::getConnetion();

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM user where id = ?";

    $q = $pdo->prepare($sql);
    $q->execute(array($id));

    $data = $q->fetch(PDO::FETCH_ASSOC);

    $name = $data['name'];
    $firstname = $data['firstname'];
    $age = $data['age'];
    $tel = $data['tel'];
    $email = $data['email'];
    $country = $data['country'];
    $comment = $data['comment'];
    $job = $data['job'];
    $url = $data['url'];
    Database::disconnect();
}

?>