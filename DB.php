<?php
        define("DB_HOST","localhost");
        define('DB_NAME','swasarjan');
        define("DB_USER", "root");
        define("DB_PASS", "");
        define('DB_CHARSET','utf8');
        $conn = mysqli_connect("localhost", "root", "", "swasarjan");
            
            // Check connection
            if($conn === false){
                die("ERROR: Could not connect. "
                    . mysqli_connect_error());
            }
            
        class DB
        {
            

            private static $pdo = NULL;
            private function __construct(){
                //singleton class
            }
            private function __clone(){
                // singleton class
            }
            private static function connect(){
                if(self::$pdo != NULL){
                    return self::$pdo;
                }
                self::$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET,DB_USER,DB_PASS);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return self::$pdo;
            }

            public static function query($query, $params=array(),$PDOParams = FALSE){
                $statement = self::connect()->prepare($query);
                $statement->execute($params);
                $q =  explode(' ',$query)[0];
                if(strtoupper($q) == 'SELECT'){
                    $data = $statement->fetchAll($PDOParams);
                    return $data;
                }
            }
        }