<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Users {

        private $users_id;
        private $users_firstname;
        private $users_lastname;
        private $users_mail;
        private $users_birthdate;
        private $users_password;
        private $users_gender;
        private $users_pictures;
        private $users_phone;
        private $users_job;
        private $users_school;
        private $users_situations;
        private $users_actif;
        private $city_id;
        private $ranks_id;
        private $db;

        public function __construct($id = 0,$firstname='',$lastname='',$mail='',$birthdate='',$password='',$gender=0,$pictures='',$phone='',$job='',$school='',$situation='',$actif=0,$cityId=0,$ranksId=0)
        {
            $this->users_id = $id;
            $this->users_firstname = $firstname;
            $this->users_lastname = $lastname;
            $this->users_mail = $mail;
            $this->users_birthdate = $birthdate;
            $this->users_password = $password;
            $this->users_gender = $gender;
            $this->users_pictures = $pictures;
            $this->users_phone = $phone;
            $this->users_job = $job;
            $this->users_school = $school;
            $this->users_situations = $situation;
            $this->users_actif = $actif;
            $this->city_id = $cityId;
            $this->ranks_id = $ranksId;
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
            $sql ='INSERT INTO `users`(`users_firstname`,`users_lastname`,`users_mail`,`users_birthdate`,`users_password`,`users_gender`,`users_pictures`,`users_phone`,`users_job`,`users_school`,`users_situations`,`users_actif`,`city_id`,`ranks_id`) 
            VALUES (:firstname,:lastname,:mail,:birthdate,:pass,:gender,:profil_pictures,:phone,:job,:school,:situation,:actif,:fk_city_id,:ranks)';
            $users_stmt = $this->db->prepare($sql);
            $users_stmt->bindValue(':firstname', $this->users_firstname, PDO::PARAM_STR);
            $users_stmt->bindValue(':lastname', $this->users_lastname, PDO::PARAM_STR);
            $users_stmt->bindValue(':mail', $this->users_mail, PDO::PARAM_STR);
            $users_stmt->bindValue(':birthdate', $this->users_birthdate, PDO::PARAM_STR);
            $users_stmt->bindValue(':pass', $this->users_password, PDO::PARAM_STR);
            $users_stmt->bindValue(':gender', $this->users_gender, PDO::PARAM_STR);
            $users_stmt->bindValue(':profil_pictures', $this->users_pictures, PDO::PARAM_STR);
            $users_stmt->bindValue(':phone', $this->users_phone, PDO::PARAM_STR);
            $users_stmt->bindValue(':job', $this->users_job, PDO::PARAM_STR);
            $users_stmt->bindValue(':school', $this->users_school, PDO::PARAM_STR);
            $users_stmt->bindValue(':situation', $this->users_situations, PDO::PARAM_STR);
            $users_stmt->bindValue(':actif', $this->users_actif, PDO::PARAM_STR);
            $users_stmt->bindValue(':fk_city_id', $this->city_id, PDO::PARAM_STR);
            $users_stmt->bindValue(':ranks', $this->ranks_id, PDO::PARAM_STR);
            return $users_stmt->execute();
        }
        
		public function readSingle()
		{
			// :nomDeVariable pour les données en attentes
			$sql = 'SELECT `users_id`, `users_firstname`, `users_lastname`, `users_mail`, DATE_FORMAT(`users_birthdate`,"%d/%m/%Y") AS birthdate_fr,`users_birthdate`,`users_password`, `users_gender`, `users_pictures`, `users_phone`, `users_job`, `users_school`, `users_situations`, `users_actif`,`city_name` FROM users INNER JOIN cities ON users.`city_id` = cities.`city_id` WHERE `users_mail`= :mail OR `users_id`= :id';
            $userStatment = $this->db->prepare($sql);
			$userStatment->bindValue(':mail', $this->users_mail, PDO::PARAM_STR);
			$userStatment->bindValue(':id', $this->users_id, PDO::PARAM_INT);
			$userInfo = null;
			if ($userStatment->execute()){
				$userInfo = $userStatment->fetch(PDO::FETCH_OBJ);
            }
			return $userInfo;
        }
        public function readAll()
		{
            $users_sql = 'SELECT * FROM users INNER JOIN posts ON  posts.`users_id` = users.`users_id` WHERE users.`users_id`= :id';
            $patientsStatement = $this->db->prepare($users_sql);
            $patientsStatement->bindValue(':id', $this->users_id, PDO::PARAM_INT);
            $users = [];
            if ($patientsStatement->execute() ) {
                $users = $patientsStatement->fetchAll(PDO::FETCH_OBJ);
            }
            return $users;
        }
        public function readPregMatchMail()
		{
            $users_sql = 'SELECT `users_mail` FROM `users` WHERE `users_mail`=:mail';
            $userStatment = $this->db->prepare($users_sql);
            $userStatment->bindValue(':mail', $this->users_mail, PDO::PARAM_STR);
            $users = null;
            if ($userStatment->execute()) {
                $users = $userStatment->fetchAll(PDO::FETCH_OBJ);
            }
            return $users;
		}
    }
