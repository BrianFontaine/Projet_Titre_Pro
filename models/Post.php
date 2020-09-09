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
                // $this->id = $post;
                // $post = $this;
            }
            return $post;
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
            // $sql='SELECT users.`users_id`,users.`users_firstname`, users.`users_lastname`,users.`users_pictures`,posts.post_title,posts.post_content,posts.post_date ,posts.post_id
            // FROM users
            // INNER JOIN posts ON users.users_id = posts.users_id ORDER BY `posts`.`post_id` DESC';
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
    }

    // SELECT c.* 
    // FROM comments as c 
    // LEFT JOIN users u ON u.users_id = c.`users_id`
    // LEFT JOIN posts p ON p.`post_id`= c.`post_id`
    // WHERE p.`post_id` = 57



//     SELECT comments.comment_content,comments.comment_date,comments.users_id AS id_users_comments,posts.post_id,posts.post_title,posts.post_content,posts.post_date,users.users_id,users.users_firstname,users.users_lastname AS USERS_PUBLISH
// FROM `posts` 
// JOIN `comments` ON comments.`post_id` = posts.`post_id`
// JOIN `users` ON users.users_id = posts.`users_id` AND users.users_id = comments.users_id
// ORDER BY posts.`post_id` DESC



// SELECT *
// FROM users
// INNER JOIN posts ON users.users_id = posts.users_id
// LEFT JOIN comments ON users.users_id = comments.users_id


// SELECT users.`users_firstname`, users.`users_lastname`,posts.post_title,posts.post_content,posts.post_date,comments.comment_content,comments.comment_date
// FROM users
// INNER JOIN posts ON users.users_id = posts.users_id
// LEFT JOIN comments ON users.users_id = comments.users_id

// SELECT users.`users_firstname`, users.`users_lastname`,posts.post_title,posts.post_content,posts.post_date,comments.comment_content,comments.comment_date
// FROM users
// INNER JOIN posts ON users.users_id = posts.users_id
// LEFT JOIN comments ON users.users_id = comments.users_id

// SELECT users.`users_firstname`, users.`users_lastname`,posts.post_title,posts.post_content,posts.post_date ,posts.post_id,comments.comment_content,comments.comment_date,comments.post_id
// FROM users
// INNER JOIN posts ON users.users_id = posts.users_id
// INNER JOIN comments ON users.`users_id` = comments.`users_id


// ==============================================================//
// aficher le nom et prenom de la personne qui publie un article
// ==============================================================//
// SELECT users.`users_firstname`, users.`users_lastname`,posts.post_title,posts.post_content,posts.post_date ,posts.post_id
// FROM users
// INNER JOIN posts ON users.users_id = posts.users_id
// =============================================================//
// afficher le nom est prenom de la personne sui commente l'article
// =============================================================//
// SELECT users.`users_firstname`, users.`users_lastname`,comments.comment_content,comments.comment_date,comments.post_id
// FROM users
// INNER JOIN comments ON users.`users_id` = comments.`users_id`


// ============================================================//
// n eme jointure pour resoude ce probleme 
// affichage du nom et prenom de la personne qui publie un poste et aussi le nom et prenom de la personnes qui publie 
// un commentaires 
// ===========================================================//
// SELECT users.`users_firstname` AS users_f_comments, users.`users_lastname` AS users_l_comments ,comments.comment_content,comments.comment_date,comments.post_id,users.users_firstname AS f_p,users.`users_lastname` AS l_p,posts.post_title,posts.post_content,posts.post_date ,posts.post_id
// FROM users
// INNER JOIN comments ON users.`users_id` = comments.`users_id`
// INNER JOIN posts ON users.users_id = posts.users_id
// LEFT JOIN users U ON U.users_id = comments.`users_id`
// ORDER BY posts.post_date DESC


// ENCORE UNE
// SELECT users.`users_firstname` AS users_f_comments, users.`users_lastname` AS users_l_comments ,comments.comment_content,comments.comment_date,comments.post_id,users.users_pictures AS p_c,users.users_firstname AS f_p,users.`users_lastname` AS l_p,posts.post_title,posts.post_content,posts.post_date ,posts.post_id,users.`users_pictures` AS P_P
// FROM posts
// LEFT JOIN comments ON posts.post_id = comments.`post_id`
// LEFT JOIN users ON users.users_id = posts.users_id
// ORDER BY posts.post_date DESC



// SELECT users.`users_firstname` AS users_f_comments, users.`users_lastname` AS users_l_comments ,comments.comment_content,comments.comment_date,comments.post_id,users.users_pictures AS p_c,users.users_firstname AS f_p,users.`users_lastname` AS l_p,posts.post_title,posts.post_content,posts.post_date ,posts.post_id,users.`users_pictures` AS P_P
// FROM posts
// LEFT JOIN comments ON posts.post_id = comments.`post_id`
// LEFT JOIN users ON comments.users_id = users.users_id
// ORDER BY posts.post_date DESC


// peut etre la dernier 
// SELECT `post_title`, `post_content`, `post_date`,users.users_firstname AS firtname_post, users.users_lastname AS lastname_post, comments.comment_content,comments.comment_date,comment_users.`users_firstname`,comment_users.`users_lastname`
// FROM `posts`
// JOIN users ON posts.users_id = users.users_id
// JOIN comments ON posts.post_id = comments.post_id
// JOIN users AS comment_users ON comment_users.users_id = comments.users_id

            // $sql ='SELECT comments.*,posts.`post_content` FROM `posts` JOIN `comments` ON comments.`post_id` = posts.`post_id` JOIN `users` ON users.users_id = posts.`users_id` ORDER BY `post_id` DESC';
            // $sql = 'SELECT comments.*,posts.*,users.* 
            // FROM `posts` 
            // JOIN `comments` ON comments.`post_id` = posts.`post_id`
            // JOIN `users` ON users.users_id = posts.`users_id`
            // ORDER BY posts.`post_id` DESC';
            // $sql = 'SELECT * FROM posts AS p LEFT JOIN users AS u ON p.`users_id` = u.`users_id` LEFT JOIN comments AS c ON p.`post_id` = c.`post_id`';
            // $sql = 'SELECT * FROM posts ORDER BY `post_id` DESC';
            // $sql ='SELECT * FROM `comments` LEFT JOIN `posts` ON posts.post_id = comments.`post_id` ORDER BY `comment_id` DESC';

                        // $listPost_sql = 'SELECT `posts_id`,`posts_content`,`users_id` FROM `posts` ORDER BY `posts_id` DESC';
            // $sql = "SELECT * FROM `posts` INNER JOIN `users` ON users.users_id = posts.`users_id` ORDER BY `post_id` DESC";
            // $sql ='SELECT comments.*,posts.*,users.* 
            // FROM `posts` 
            // JOIN `comments` ON comments.`post_id` = posts.`post_id`
            // JOIN `users` ON users.users_id = posts.`users_id`
            // ORDER BY posts.`post_id` DESC';
            // $sql = 'SELECT users.`users_firstname` AS users_f_comments, users.`users_lastname` AS users_l_comments ,comments.comment_content,comments.comment_date,comments.post_id,users.users_pictures AS p_c,users.users_firstname AS f_p,users.`users_lastname` AS l_p,posts.post_title,posts.post_content,posts.post_date ,posts.post_id,users.`users_pictures` AS P_P
            // FROM users
            // INNER JOIN comments ON users.`users_id` = comments.`users_id`
            // INNER JOIN posts ON users.users_id = posts.users_id
            // LEFT JOIN users U ON U.users_id = comments.`users_id`
            // ORDER BY posts.post_date DESC';
            // $sql ="SELECT users.`users_firstname` AS users_f_comments, users.`users_lastname` AS users_l_comments ,comments.comment_content,comments.comment_date,comments.post_id,users.users_pictures AS p_c,users.users_firstname AS f_p,users.`users_lastname` AS l_p,posts.post_title,posts.post_content,posts.post_date ,posts.post_id,users.`users_pictures` AS P_P
            // FROM users
            // INNER JOIN comments ON users.`users_id` = comments.`users_id`
            // INNER JOIN posts ON users.users_id = posts.users_id
            // INNER JOIN comments C ON posts.`post_id` = C.`post_id`
            // ORDER BY posts.post_date DESC";

            // $sql ='SELECT posts.`post_id`,`post_title`, `post_content`, `post_date`,users.users_firstname AS firtname_post, users.users_lastname AS lastname_post, comments.post_id AS comment_post_id, comments.comment_content,comments.comment_date,comment_users.`users_firstname`,comment_users.`users_lastname`
            // FROM `posts`
            // JOIN users ON posts.users_id = users.users_id
            // JOIN comments ON posts.post_id = comments.post_id
            // JOIN users AS comment_users ON comment_users.users_id = comments.users_id';