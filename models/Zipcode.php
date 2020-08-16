<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Zipcode {

        private $zipcode_id;
        private $zipcode_number;
        private $db;

        public function __construct($zipcode_id=0, $zipcode_number='')
        {
            $this->zipcode_id = $zipcode_id;
            $this->zipcode_number = $zipcode_number;
            $this->db = Database::getInstance();
        }

        public function __get($attr)
        {
            return $this->$attr;
        }

        public function __set($attr, $value)
        {
            $this->$attr = $value;
        }
        // public function setMail($mail)
        // {
        //     if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
        //         $this->mail = $mail;
        //     }
        // }
        /**
         * Permet de créer un utilisateur dans la table users
         * @return boolean
         */

        public function create()
        {
            $sql = "INSERT INTO `zipcode` (`zipcode_number`) VALUES (:zip_code)";
            $zipcode_stmt = $this->db->prepare($sql);
    
            $zipcode_stmt->bindValue(':zip_code', $this->zipcode_number, PDO::PARAM_STR);
            return $zipcode_stmt->execute();
        }
    }