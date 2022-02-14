<?php
    include_once('model/M_User.php');


    class C_User 
    {
        private $m_user;

        function __construct()
        {
            $this->m_user = new M_User();
        }

        public function getAllUsers()
        {
            return $this->m_user->getAllUsers();
        }
        
        public function getUserById($id)
        {
            if (!is_int($id)) {
                header("Location: ../view/404.php");
            }
            return $this->m_user->getUserById($id);
        }

        public function getToCreateUser($name, $firstname, $age, $tel, $email, $country, $comment, $job, $url)
        {
            return $this->m_user->createUser($name, $firstname, $age, $tel, $email, $country, $comment, $job, $url);
        }


    }


?>