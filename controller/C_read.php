<?php
require '../model/connect.php'; //on appelle notre fichier de config 

//On initialise une variable $id
$id = null;


if (!empty($_GET['id'])) { //si on a bien un id envoyé dans l’url ($_GET)
    $id = $_REQUEST['id']; //on le recupere
}
if (null == $id) {
    header("location:index.php");
} else {
    //on lance la connection 
    $pdo = Database::getConnetion();

    //PDO : represente la connection entre php et un serveur de base de donnee
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .

    //On lance la requete (qui affichera chaque element retrouné)
    $sql = "SELECT * FROM user where id =?";

    //Preparing Statement
    $q = $pdo->prepare($sql);

    $toExecute = $q->execute(array($id));

    //Recuperer et afficher sous forme de tableau associatif
    $data = $q->fetch(PDO::FETCH_ASSOC);

    //var_dump($data);

    //on arrete la connection 
    Database::disconnect();
}



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>