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
        // public function create()
        // {
        //     $sql = "INSERT INTO `city` (`city_name`,`city_zipcode`) VALUES (:city,:zipcode)";
        //     $country_stmt = $this->db->prepare($sql);
        //     $country_stmt->bindValue(':city', $this->cityName, PDO::PARAM_STR);
        //     $country_stmt->bindValue(':zipcode', $this->cityZipcode, PDO::PARAM_STR);
        //     $city = null;
        //     if($country_stmt->execute()){
        //         $id = $this->db->lastInsertId();
        //         $this->id = $id;
        //         $city = $this;
        //     } 
        //         return $city;
        // }
        public function readAll()
		{
            $sql = "SELECT `city_id`, `city_name` FROM `cities` WHERE 1 ORDER BY `cities`.`city_name` ASC";
            $postStatement = $this->db->query($sql);
            $listCity = [];
            if ($postStatement instanceof PDOstatement ) {
                $listCity = $postStatement->fetchAll(PDO::FETCH_OBJ);
            }
            return $listCity;
        }
        
        public function findCity($text)
        {
            $sql = 'SELECT `city_id`, `city_name` FROM `cities` WHERE `city_name` LIKE :city ORDER BY `cities`.`city_name` ASC LIMIT 0,5' ;
            $searchPatients = $this->db->prepare($sql);
            $searchPatients->bindValue(':city',$text.'%',PDO::PARAM_STR);
            $patientsView = [];
            if ($searchPatients->execute()){
                $patientsView = $searchPatients->fetchAll(PDO::FETCH_ASSOC);
            }
            return $patientsView;
        }
    }