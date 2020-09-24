<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Etre_amis {
        private $users_id;
        private $users_id_etre_amis;
        private $pending;
        private $db;
        public function __construct($users_id= 0,$users_id_etre_amis = 0,$pending=0)
        {
            $this->users_id = $users_id;
            $this->users_id_etre_amis = $users_id_etre_amis;
            $this->pending = $pending;
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
        public function verifyFriends()
		{
            $friend_sql = "SELECT `users_id`, `users_id_etre_amis`, `pending` FROM `etre_amis` WHERE `users_id_etre_amis` = :id";
            $friend_stmt = $this->db->prepare($friend_sql);
            $friend_stmt->bindValue(':id', $this->users_id, PDO::PARAM_INT);
            $verifyFriends = null;
            if ($friend_stmt->execute()) {
                $verifyFriends = $friend_stmt->fetch(PDO::FETCH_OBJ);
            }
            return $verifyFriends;
        }
        public function addFriends(){
            $friend_sql = 'INSERT INTO `etre_amis`(`users_id`, `users_id_etre_amis`, `pending`) VALUES (:users_id,:id_friend,:pending)';
            $friend_stmt = $this->db->prepare($friend_sql);
            $friend_stmt->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
            $friend_stmt->bindValue(':id_friend', $this->users_id_etre_amis, PDO::PARAM_INT);
            $friend_stmt->bindValue(':pending', $this->pending, PDO::PARAM_INT);
            return $friend_stmt->execute();
        }
        public function listFriends(){
            $friend_sql = 'SELECT usersConect.users_firstname as namedemander ,usersConect.users_lastname as lastnamedeamandeur ,etre_amis.`users_id`, usersConect.users_pictures,friends.users_firstname,friends.users_lastname,etre_amis.`users_id_etre_amis`, etre_amis.`pending`,friends.users_pictures 
            FROM `etre_amis` 
            JOIN users AS usersConect ON usersConect.users_id = etre_amis.`users_id`
            LEFT JOIN users AS friends ON friends.users_id = etre_amis.`users_id_etre_amis`
            WHERE etre_amis.`users_id`= :users_id';
            // $friend_sql ='SELECT `users_id`, `users_id_etre_amis`, `pending` FROM `etre_amis` WHERE `users_id` = :users_id';
            $friend_stmt = $this->db->prepare($friend_sql);
            $friend_stmt->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
            $listFriends = [];
            
            if ($friend_stmt->execute()) {
                $listFriends = $friend_stmt->fetchAll(PDO::FETCH_OBJ);
            }
            return $listFriends;
        }

    }