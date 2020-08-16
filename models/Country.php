<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Country {

        private $country_id;
        private $country_name;
        private $db;

        public function __construct($country_id = 0, $country_name = '')
        {
            $this->country_id = $country_id;
            $this->users_country_name = $country_name;
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
        public function readAll()
        {
            $listPatients_sql = 'SELECT `users_id` FROM `users`';
            $patientsStatement = $this->db->query($listPatients_sql);
            $listPatients = [];
            if ($patientsStatement instanceof PDOstatement ) {
                $listPatients = $patientsStatement->fetchAll(PDO::FETCH_OBJ);
            }
            return $listPatients;
        }
        public function create()
        {
            $sql = 'INSERT INTO `country` (`country_name`) VALUES (:country)';
            $country_stmt = $this->db->prepare($sql);
    
            $country_stmt->bindValue(':country', $this->country_name, PDO::PARAM_STR);
            return $country_stmt->execute();
        }
    }