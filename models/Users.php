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
        private $db;

        public function __construct($users_id = 0, $users_lastname='', $users_firstname='', $users_birthdate='', $users_mail='', $users_password='',$users_phone='',$users_cgu= 0 )
        {
            $this->users_id = $users_id;
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
    
            $users_stmt->bindValue(':lastname', $this->users_lastname, PDO::PARAM_STR);
            $users_stmt->bindValue(':firstname', $this->users_firstname, PDO::PARAM_STR);
            $users_stmt->bindValue(':birthdate', $this->users_birthdate, PDO::PARAM_STR);
            $users_stmt->bindValue(':mail', $this->users_mail, PDO::PARAM_STR);
            $users_stmt->bindValue(':pass', $this->users_password, PDO::PARAM_STR);
            $users_stmt->bindValue(':phone', $this->users_phone, PDO::PARAM_STR);
            // $users_stmt->bindValue(':cgu', $this->users_cgu, PDO::PARAM_STR);
            return $users_stmt->execute();
        }
    }