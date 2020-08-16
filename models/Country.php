<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Country {

        private $country_id;
        private $country_name;
        private $zipcode_id;
        private $users_id;
        private $db;

        public function __construct($country_id = 0, $country_name = '',$zipcode_id=0,$users_id=0)
        {
            $this->country_id = $country_id;
            $this->country_name = $country_name;
            $this->zipcode_id = $zipcode_id;
            $this->users_id = $users_id;
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
            $sql = "INSERT INTO `country` (`country_name`,`zipcode_id`,`users_id`) VALUES (0,:country)";
            $country_stmt = $this->db->prepare($sql);
    
            $country_stmt->bindValue(':country', $this->country_name, PDO::PARAM_STR);
            return $country_stmt->execute();
        }
    }