<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Post{

        private $posts_id ;
        private $posts_content;
        private $date;
        private $users_id;
        private $db;

        public function __construct($post_id = 0,$posts_content='',$date='', $users_id=0)
        {
            $this->posts_id = $posts_id;
            $this->posts_content = $posts_content;
            $this->date = $date;
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
            $sql = 'INSERT INTO `posts` (`posts_content`,`date`,`users_id`) 
            VALUES (:post,:post_date,:users_id)';
            $users_stmt = $this->db->prepare($sql);
            $users_stmt->bindValue(':post', $this->posts_content, PDO::PARAM_STR);
            $users_stmt->bindValue(':post_date', $this->date, PDO::PARAM_STR);
            $users_stmt->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
            return $users_stmt->execute();
        }
        
		// public function readSingle()
		// {
		// 	// :nomDeVariable pour les données en attentes
		// 	$sql = 'SELECT `users_id`,`users_lastname`,`users_firstname`,`users_birthdate`,`users_mail`,`users_password`,`users_phone`,`profil_pictures`,`gender`,`grads` FROM `users` WHERE `users_mail`= :mail OR `users_id`= :id';
        //     $userStatment = $this->db->prepare($sql);
		// 	$userStatment->bindValue(':mail', $this->users_mail, PDO::PARAM_STR);
		// 	$userStatment->bindValue(':id', $this->users_id, PDO::PARAM_INT);
		// 	$userInfo = null;
		// 	if ($userStatment->execute()){
		// 		$userInfo = $userStatment->fetch(PDO::FETCH_OBJ);
        //     }
		// 	return $userInfo;
        // }
        
        public function readAll()
		{
            // $listPost_sql = 'SELECT `posts_id`,`posts_content`,`users_id` FROM `posts` ORDER BY `posts_id` DESC';
            $sql = "SELECT * FROM `posts` INNER JOIN `users` ON users.users_id = posts.`users_id` ORDER BY `posts_id` DESC";
            $postStatement = $this->db->query($sql);
            $listPost = [];
            if ($postStatement instanceof PDOstatement ) {
                $listPost = $postStatement->fetchAll(PDO::FETCH_OBJ);
            }
            return $listPost;
		}
    }
