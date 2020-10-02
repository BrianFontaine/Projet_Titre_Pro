<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Note {
        private $note_id;
        private $note_value;
        private $post_id;
        private $db;
        public function __construct($noteId= 0,$noteValue =0,$postId=0)
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
            $sql = "SELECT COUNT(`note_id`) noteTotal FROM `notes`  WHERE `post_id` = 4 GROUP BY `post_id`;";
            $noteStatment = $this->db->query($sql);
            $listNote = [];
            if ($noteStatment instanceof PDOstatement ) {
                $listNote = $noteStatment->fetchAll(PDO::FETCH_OBJ);
            }
            return $listNote;
        }
        public function deleteNoteFromPost(){
            $sql='DELETE FROM `notes` WHERE `post_id` = :post_id;';
            $postStatment = $this->db->prepare($sql);
            $postStatment->bindValue(':post_id',$this->post_id,PDO::PARAM_INT);
            return $postStatment->execute();
        }
    }