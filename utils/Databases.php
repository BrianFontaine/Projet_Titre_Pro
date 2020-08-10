<?php
    require_once dirname(__FILE__).'/../config/config.php';
    
    class Database {
        public static function getInstance()
        {
            $dsn = 'mysql:host='.HOST.';dbname='.DB_NAME.';charset=utf8';
            $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    
            try {
                return new PDO($dsn, USER, PASSWORD, $option);
            } catch (PDOException $e) {
                die('pb de connexion à la bdd' . $e->getMessage());
            }
        }
    }