<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Post{
        private $post_id ;
        private $post_title;
        private $post_content;
        private $post_date;
        private $post_signal;
        private $users_id;
        private $db;
        public function __construct($id = 0,$title='',$content='',$date='',$signal =0, $users_id=0)
        {
            $this->post_id = $id;
            $this->post_title = $title;
            $this->post_content = $content;
            $this->date = $date;
            $this->post_signal = $signal;
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
        /**
         * Permet de créer un post dans la table posts
         * @return boolean
         */
        public function create()
        {
            $sql = 'INSERT INTO `posts`(`post_title`, `post_content`, `post_date`, `post_signal`, `users_id`) 
            VALUES (:title,:content,:post_date,:signal,:users_id)';
            $users_stmt = $this->db->prepare($sql);
            $users_stmt->bindValue(':title', $this->post_title, PDO::PARAM_STR);
            $users_stmt->bindValue(':content', $this->post_content, PDO::PARAM_STR);
            $users_stmt->bindValue(':post_date', $this->date, PDO::PARAM_STR);
            $users_stmt->bindValue(':signal', $this->post_signal, PDO::PARAM_STR);
            $users_stmt->bindValue(':users_id', $this->users_id, PDO::PARAM_INT);
            // return $users_stmt->execute();
            $post = null;
            if($users_stmt->execute())
            {
                $post = $this->db->lastInsertId();
            }
            return $post;
        }
        public function readAll()
		{
            $sql ='SELECT AVG(notes.note_value) AS note_generale ,users.`users_id`,users.`users_firstname`, users.`users_lastname`,users.`users_pictures`,posts.post_title,posts.post_content,posts.post_date ,posts.post_id
            FROM users
            INNER JOIN posts ON users.users_id = posts.users_id
            LEFT JOIN notes ON posts.post_id = notes.post_id
            GROUP BY posts.post_id
            ORDER BY `posts`.`post_id` DESC';
            $postStatement = $this->db->query($sql);
            $listPost = [];
            if ($postStatement instanceof PDOstatement ) {
                $listPost = $postStatement->fetchAll(PDO::FETCH_OBJ);
            }
            return $listPost;
        }
        // SELECT `post_title`, `post_content` FROM `posts` WHERE `post_title` LIKE '%%' ORDER BY `posts`.`post_title` ASC LIMIT 0,5
        public function findPost($text)
        {
            $sql = 'SELECT `post_title`, `post_content` FROM `posts` WHERE `post_title` LIKE :title ORDER BY `posts`.`post_title` ASC LIMIT 0,5' ;
            $searchPatients = $this->db->prepare($sql);
            $searchPatients->bindValue(':title','%'.$text.'%',PDO::PARAM_STR);
            $patientsView = [];
            if ($searchPatients->execute()){
                $patientsView = $searchPatients->fetchAll(PDO::FETCH_ASSOC);
            }
            return $patientsView;
        }
    }