<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class City {
        private $cityName;
        private $cityZipcode ;
        private $db;
        public function __construct($city_name= '',$city_zipcode = '')
        {
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
        /**
         * Permet de créer un utilisateur dans la table users
         * @return boolean
         */
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