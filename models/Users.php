<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Users {

        private $users_id;
        private $users_lastname;
        private $users_firstname;
        private $users_birthdate;
        private $users_mail;
        private $users_password;
        private $users_phone;
        private $users_cgu;
        private $profil_pictures;
        private $gender;
        private $grads;
        private $fk_city_id;
        private $db;

        public function __construct($users_id = 0,$users_lastname='', $users_firstname='', $users_birthdate='', $users_mail='', $users_password='',$users_phone='',$users_cgu= 0,$gender = 0,$profil_pictures = '',$grads ='',$fk_city_id =0  )
        {
            $this->users_id = $users_id;
            $this->users_lastname = $users_lastname;
            $this->users_firstname = $users_firstname;
            $this->users_birthdate = $users_birthdate;
            $this->users_mail = $users_mail;
            $this->users_password = $users_password;
            $this->users_phone = $users_phone;
            $this->users_cgu = $users_cgu;
            $this->profil_pictures = $profil_pictures;
            $this->gender = $gender;
            $this->grads = $grads;
            $this->fk_city_id = $fk_city_id;
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
            $sql = 'INSERT INTO `users` (`users_lastname`,`users_firstname`,`users_birthdate`,`users_mail`,`users_password`,`users_phone`,`users_cgu`,`profil_pictures`,`gender`,`grads`,`fk_city_id`) 
            VALUES (:lastname,:firstname,:birthdate,:mail,:pass,:phone,:cgu,:profil_pictures,:gender,:grads,:fk_city_id)';
            $users_stmt = $this->db->prepare($sql);
            $users_stmt->bindValue(':lastname', $this->users_lastname, PDO::PARAM_STR);
            $users_stmt->bindValue(':firstname', $this->users_firstname, PDO::PARAM_STR);
            $users_stmt->bindValue(':birthdate', $this->users_birthdate, PDO::PARAM_STR);
            $users_stmt->bindValue(':mail', $this->users_mail, PDO::PARAM_STR);
            $users_stmt->bindValue(':pass', $this->users_password, PDO::PARAM_STR);
            $users_stmt->bindValue(':phone', $this->users_phone, PDO::PARAM_STR);
            $users_stmt->bindValue(':cgu', $this->users_cgu, PDO::PARAM_STR);
            $users_stmt->bindValue(':profil_pictures', $this->profil_pictures, PDO::PARAM_STR);
            $users_stmt->bindValue(':gender', $this->gender, PDO::PARAM_INT);
            $users_stmt->bindValue(':grads', $this->grads, PDO::PARAM_STR);
            $users_stmt->bindValue(':fk_city_id', $this->fk_city_id, PDO::PARAM_INT);
            return $users_stmt->execute();
        }
        
		public function readSingle()
		{
			// :nomDeVariable pour les données en attentes
			$sql = 'SELECT `users_id`,`users_lastname`,`users_firstname`,`users_birthdate`,`users_mail`,`users_password`,`users_phone`,`profil_pictures`,`gender`,`grads` FROM `users` WHERE `users_mail`= :mail OR `users_id`= :id';
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
            $users_sql = 'SELECT `users_id`,`users_lastname`,`users_firstname`,`users_birthdate`,`users_mail`,`users_password`,`users_phone`,`profil_pictures`,`gender`,`grads` FROM `users`';
            $patientsStatement = $this->db->query($users_sql);
            $users = [];
            if ($patientsStatement instanceof PDOstatement ) {
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
