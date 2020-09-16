<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Note {
        private $note_id;
        private $note_value;
        private $post_id;
        private $db;
        public function __construct($note_id= 0,$noteValue =0,$postId=0)
        {
            $this->note_id = $noteId;
            $this->note_value = $noteValue;
            $this->post_id = $postId;
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
            $note_sql = "INSERT INTO `notes` (`note_value`,`post_id`) VALUES (:noteValue,:postId)";
            $note_stmt = $this->db->prepare($note_sql);
            $note_stmt->bindValue(':noteValue', $this->note_value, PDO::PARAM_STR);
            $note_stmt->bindValue(':postId', $this->post_id, PDO::PARAM_STR);
            return $note_stmt->execute();
        }
        public function readAll()
		{
            $sql = "SELECT `city_id`, `city_name` FROM `cities` WHERE 1 ORDER BY `cities`.`city_name` ASC";
            $postStatement = $this->db->query($sql);
            $listCity = [];
            if ($postStatement instanceof PDOstatement ) {
                $listCity = $postStatement->fetchAll(PDO::FETCH_OBJ);
            }
            return $listCity;
        }
    }