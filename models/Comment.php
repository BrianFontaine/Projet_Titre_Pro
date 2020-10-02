<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Comment{

        private $comment_id ;
        private $comment_content;
        private $comment_date;
        private $comments_signal;
        private $users_id;
        private $post_id;
        private $db;

        public function __construct($id = 0,$content='',$date='',$signal='',$users_id=0,$post_id=0)
        {
            $this->comment_id = $id;
            $this->comment_content = $content;
            $this->comment_date = $date;
            $this->comments_signal = $signal;
            $this->users_id = $users_id;
            $this->post_id = $post_id;
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
            return $comment_stmt->execute();
        }
        public function readAll()
		{
            $sql ='SELECT comments.*, users.`users_id`,users.users_firstname,users.users_lastname,users.users_pictures FROM `comments` JOIN `users` ON comments.users_id = users.users_id';
            $postStatement = $this->db->query($sql);
            $listComment = [];
            if ($postStatement instanceof PDOstatement  ) {
                $listComment = $postStatement->fetchAll(PDO::FETCH_OBJ);
            }
            return $listComment;
        }
        public function readAllFromPost()
		{
            $sql ='SELECT `comment_id`, `comment_content`, `comment_date`, `comments_signal`, `post_id`,users.users_id,users.users_firstname, users.users_lastname,users.users_pictures 
            FROM `comments`
            JOIN users on comments.users_id = users.users_id';
            $commentStatment = $this->db->query($sql);
            $listComment = null;
            if ($commentStatment instanceof PDOstatement) {
                $listComment = $commentStatment->fetchAll(PDO::FETCH_OBJ);
            }
            return $listComment;
        }
        public function deleteCommentFromPost(){
            $sql='DELETE FROM `comments` WHERE `post_id` = :post_id;';
            $commentStatment = $this->db->prepare($sql);
            $commentStatment->bindValue(':post_id',$this->post_id,PDO::PARAM_INT);
            return $commentStatment->execute();
        }
    }