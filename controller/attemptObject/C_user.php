<?php

include "C_core.php";
include "model/M_User.php";

class C_user extends C_core{
    /**
     * Le constructeur est notre fonction qui est appelé en 1er
     */
    function __construct(?string $action = null)
    {
        //Dans tous les cas instancie un model User provenant de model
        $this->model = new M_User();

        //Selon l'action demandée par l'utilisateur
        switch ($action) {
            case 'add':
                $this->create();
                break;

            case 'read':
                $this->read();
                break;

            case 'update':
                $this->update();
                break;

            case 'delete':
                $this->delete();
                break;

            default:
                $this->index();
                break;
        }
    }

    public function index()
    {
        //effectue la requête du model et stock le résultat dans data qui sera récupére dans index.php
        //pareil pour la vue
        $this->data = $this->model->getAllUser();
        $this->view = "user";
    }

    public function create()
    {

        $this->view = "create";
        //Récupére les valeurs des inputs envoyé depuis le formulaire
    
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)){
            
            include('C_add.php');
            $result = $this->model->insertUser($name, $firstname, $age, $tel, $email, $country, $comment, $job, $url);
                //Si insert réussi
                if($result){
                    $this->data = $result;
                    $this->view = "user";
                }else {
                    $this->view = "Non valide";
                }
        }
       else {
            echo "aucune donnée envoyée";
        }
    }

    public function read()
    {
        $this->view = "read";
        include('C_read.php');
    }

    public function update()
    {
        $this->view = "update";
        include('C_update.php');
    }

    public function delete()
    {
        $this->view = "delete";
        include('C_delete.php');
    }
}