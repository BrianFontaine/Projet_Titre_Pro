<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Users {

        // private $users_id;
        private $users_lastname;
        private $users_firstname;
        private $users_birthdate;
        private $users_mail;
        private $users_password;
        private $users_phone;
        private $users_cgu;
        private $db;

        public function __construct($users_lastname='', $users_firstname='', $users_birthdate='', $users_mail='', $users_password='',$users_phone='',$users_cgu= 0 )
        {
            // $this->users_id = $users_id;
            $this->users_lastname = $users_lastname;
            $this->users_firstname = $users_firstname;
            $this->users_birthdate = $users_birthdate;
            $this->users_mail = $users_mail;
            $this->users_password = $users_password;
            $this->users_phone = $users_phone;
            $this->users_cgu = $users_cgu;
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
            $sql = 'INSERT INTO `users` (`users_lastname`, `users_firstname`, `users_birthdate`,`users_mail`,`users_password`, `users_phone`,`users_cgu`) VALUES (:lastname,:firstname,:birthdate,:mail,:pass,:phone,1)';
            $users_stmt = $this->db->prepare($sql);
    
            $users_stmt->bindParam(':lastname', $this->users_lastname, PDO::PARAM_STR);
            $users_stmt->bindParam(':firstname', $this->users_firstname, PDO::PARAM_STR);
            $users_stmt->bindParam(':birthdate', $this->users_birthdate, PDO::PARAM_STR);
            $users_stmt->bindParam(':mail', $this->users_mail, PDO::PARAM_STR);
            $users_stmt->bindParam(':pass', $this->users_password, PDO::PARAM_STR);
            $users_stmt->bindParam(':phone', $this->users_phone, PDO::PARAM_STR);
            // $users_stmt->bindValue(':cgu', $this->users_cgu, PDO::PARAM_STR);
            $this->$db->lastInsertId();
            return $users_stmt->execute();
        }
        // public static function lastInsertID () {
        //     global $db;
        //     return $db->handler->lastInsertId();
        // }
            
		// public function readSingle()
		// {
		// 	// :nomDeVariable pour les données en attentes
		// 	$stmt = $db->query("SELECT LAST_INSERT_ID(`users_id`) FROM users ORDER BY `users_id` DESC LIMIT 1 ");
        //     $lastId = $stmt->fetch(PDO::FETCH_OBJ);
		// 	$id_stmt = null;
		// 	if ($lastId->execute()){
		// 		$id_stmt = $lastId->fetch(PDO::FETCH_OBJ);
		// 	}
		// 	return $id_stmt;
		// }
        // public function lasid(){
        //     $db = "SELECT LAST_INSERT_ID(`users_id`) FROM users ORDER BY `users_id` DESC LIMIT 1";
        //     $id = $this->db->prepare($db);
        //     $id->bindValue(':id', $this->users_id,PDO::PARAM_INT);
		// 	$ide = null;
        //     if ($id->execute()){
		// 		$ide = $id->fetch(PDO::FETCH_OBJ);
		// 	}
        //     return $ide;
        // }
    }
    var_dump($db);