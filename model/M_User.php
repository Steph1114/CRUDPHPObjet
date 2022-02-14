<?php

include_once('model/connect.php');
include_once('model/User.php');

class M_User{
    private $dbh;  //databasehost

    function __construct()
    {
        $this->dbh = Database::getConnetion();
    }

    //fonction comportant Requete qui affichage de tous les users dans la db //READ
    public function getAllUsers()
    {
        $sth = $this->dbh->prepare("SELECT * FROM user");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_CLASS, 'name');
        return $result;
    }

    //fonction comportant Requete qui affichera chaque user selon son id
    public function getUserById($id)
    {
        $sth = $this->dbh->prepare("SELECT * FROM user WHERE id = :id");
        $sth->execute(array(':id' => $id));
        $sth->setFetchMode(PDO::FETCH_CLASS, 'name');
        $result = $sth->fetch();
        return $result;
    }

    //fonction comportant Requete qui permettra de creer un champ user  //CREATE
    public function createUser($name, $firstname, $age, $tel, $email, $country, $comment, $job, $url)
    {
        $sth = $this->dbh->prepare("INSERT INTO user (name,firstname,age,tel, email, country,comment, job,url) values(:name, :firstname, :age, :tel, :email, :country, :comment, :job, :url)");
        $sth->execute();
        $sth->bindParam(":username", $name);
        $sth->bindParam(":firstname", $firstname);
        $sth->bindParam(":age", $age);
        $sth->bindParam(":tel", $tel);
        $sth->bindParam(":email", $email);
        $sth->bindParam(":country", $country);
        $sth->bindParam(":comment", $comment);
        $sth->bindParam(":job", $job);
        $sth->bindParam(":url", $url);
        $result = $sth->execute();
        header("Location: ../index.php");
        return $result;
    }

     //fonction comportant Requete qui permettra de mettre a jour un user // UPDATE
    public function updateUser(){
        include('C_update.php');

    // on vérifie nos champs 
    $valid = true;

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
    }else {

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
} 

    //fonction comportant Requete qui permettra de supprimer un user // DELETE
    public function deleteUser(){
        include('C_delete.php');
        $id = 0;
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $pdo = Database::getConnetion();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM user  WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($id));
            Database::disconnect();
            header("Location: ../index.php");
        }
    }



}


?>