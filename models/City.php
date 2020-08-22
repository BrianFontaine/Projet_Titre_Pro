<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class City {

        // private $country_id;
        private $cityName;
        private $cityZipcode ;
        private $db;
        public function __construct($city_name= '',$city_zipcode = '')
        {
            // $this->country_id = $country_id;
            $this->cityName = $city_name;
            $this->cityZipcode = $city_zipcode;
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
            $sql = "INSERT INTO `city` (`city_name`,`city_zipcode`) VALUES (:city,:zipcode)";
            $country_stmt = $this->db->query($sql);
            $country_stmt->bindValue(':country', $this->city_name, PDO::PARAM_STR);
            $country_stmt->bindValue(':zipcode', $this->city_zipcode, PDO::PARAM_INT);
            if($country_stmt->execute()){
                $id = $this->db->lastInsertId();
                return true;
            }else {
                return false;
            }
        }
        
    }