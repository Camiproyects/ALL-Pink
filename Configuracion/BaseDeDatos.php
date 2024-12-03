<?php
    class DataBase{
        public static function connection(){
            $host_mysql = "localhost";
            $user_mysql = "root";
            $pass_mysql = "";
            $db_mysql = "tiendaonline";
            $mysqli = mysqli_connect($host_mysql,$user_mysql,$pass_mysql,$db_mysql);        
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
        }        
    }
?>