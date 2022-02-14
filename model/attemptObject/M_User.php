<?php
    class M_User extends Database{

        //read
        public function getAllUser() : array
        {

            //On recupere le resultat dans un tableau
            $result = [];
            try {
                $pdo = $this->getConnetion();
                $query = $pdo->prepare('SELECT * FROM user');
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);

                $sth = $this->dbh->prepare("SELECT * FROM user");
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_CLASS, 'name');
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            return $result;
            Database::disconnect();
        }
    
        //add ou create
        public function insertUser($name, $firstname, $age, $tel, $email, $country, $comment, $job, $url) 
        {
            $result = false;
            try {
                $pdo = $this->getConnetion();
                $query = $pdo->prepare("INSERT INTO user (name,firstname,age,tel, email, country,comment, job,url) values(:name, :firstname, :age, :tel, :email, :country, :comment, :job, :url)");
                $query->bindParam(":username", $name);
                $query->bindParam(":firstname", $firstname);
                $query->bindParam(":age", $age);
                $query->bindParam(":tel", $tel);
                $query->bindParam(":email", $email);
                $query->bindParam(":country", $country);
                $query->bindParam(":comment", $comment);
                $query->bindParam(":job", $job,);
                $query->bindParam(":url", $url);
                $result = $query->execute();
                Database::disconnect();
                header("Location: ../index.php");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            return $result;
        }

        //update
        public function updateUser(){
            include('C_update.php');
        }

        //delete
        public function deleteUser(){
            include('C_delete.php');
        }

    }

?>