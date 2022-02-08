<?php 
    class Database { 
        private static $dbName = 'crudephp' ; 
        private static $dbHost = 'localhost' ; 
        private static $dbUsername = 'root'; 
        private static $dbUserPassword = ''; 
        private static $bdd = null;  //$cont = $bdd

        //Constructeur
        public function __construct() { 
          //  die('Init function is not allowed');
        } 

        private static function connect()
        {
            self::$bdd = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword, array(PDO::ATTR_PERSISTENT => true));
            // set the PDO error mode to exception
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    
        public static function getConnetion()
        {
            if (!isset(self::$bdd)) {
                self::connect();
            }
            return self::$bdd;
        }


        public static function disconnect()
        {
            return self::$bdd=null;
        }

        // public static function connect() { 
        //     //self : pour acceder aux variables ou methodes d'une classe en STATIC
        //     if ( null == self::$bdd ) { 
        //         try { 
        //             //instancie l’objet PDO qui nous permet le lien à la base
        //             self::$bdd = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        //         //    echo "Successfully connected !";
        //             echo '<br>';
        //         } catch(PDOException $e) {

        //             echo " Failed to connect : ";
        //             die($e->getMessage()); 
        //         }
        //     }
        //     return self::$bdd;
        // }
     
        // public static function disconnect()
        // {
        //     self::$bdd = null;
        // }
    }

?>