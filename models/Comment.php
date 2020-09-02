<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Comment{

        private $comment_id ;
        private $comment_content;
        private $comment_date;
        private $comments_signal;
        private $users_id;
        private $post_id;
        // private $notify_id;
        private $db;

        public function __construct($id = 0,$content='',$date='',$signal='',$users_id=0,$post_id=0)
        {
            $this->comment_id = $id;
            $this->comment_content = $content;
            $this->comment_date = $date;
            $this->comments_signal = $signal;
            $this->users_id = $users_id;
            $this->post_id = $post_id;
            // $this->notify_id = $notify_id;

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
            $sql = 'INSERT INTO `comments`(`comment_content`,`comment_date`,`comments_signal`,`users_id`,`post_id`) 
            VALUES (:content,:date_com,:signal,:users_id,:post_id)';
            $comment_stmt = $this->db->prepare($sql);
            $comment_stmt->bindValue(':content', $this->comment_content, PDO::PARAM_STR);
            $comment_stmt->bindValue(':date_com', $this->comment_date, PDO::PARAM_STR);
            $comment_stmt->bindValue(':signal', $this->comments_signal, PDO::PARAM_STR);
            $comment_stmt->bindValue(':users_id', $this->users_id, PDO::PARAM_STR);
            $comment_stmt->bindValue(':post_id', $this->post_id, PDO::PARAM_STR);
            // $comment_stmt->bindValue(':notify_id', $this->notify_id, PDO::PARAM_INT);
            return $comment_stmt->execute();
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
            // $listComment_sql = 'SELECT `posts_id`,`posts_content`,`users_id` FROM `posts` ORDER BY `posts_id` DESC';
            // $sql = "SELECT `comment_id`, `users_id`, `comment_content` FROM comments WHERE post_id = :id ORDER BY comment_date DESC";
            // $sql = 'SELECT c.* FROM comments as c LEFT JOIN users u ON u.users_id = c.`users_id`';
            // $sql ='SELECT comments.*,posts.`post_content` FROM `posts` JOIN `comments` ON comments.`post_id` = posts.`post_id` JOIN `users` ON users.users_id = posts.`users_id` ORDER BY `post_id` DESC';
            // $sql ='SELECT comments.* FROM `posts` INNER JOIN `comments` ON comments.`post_id` = posts.`post_id` ORDER BY `post_id` DESC';
            // $sql ='SELECT comments.*,posts.*,users.* 
            // FROM `posts` 
            // JOIN `comments` ON comments.`post_id` = posts.`post_id`
            // JOIN `users` ON users.users_id = posts.`users_id`
            // ORDER BY posts.`post_id` DESC';
            $sql ='SELECT comments.*, users.users_firstname,users.users_lastname,users.users_pictures FROM `comments` JOIN `users` ON comments.users_id = users.users_id';
            $postStatement = $this->db->query($sql);
            // $postStatement->bindValue(':id',$this->post_id,PDO::PARAM_INT);
            $listComment = [];
            if ($postStatement instanceof PDOstatement  ) {
                $listComment = $postStatement->fetchAll(PDO::FETCH_OBJ);
            }
            return $listComment;
		}
    }
// instanceof PDOstatement
//execute()