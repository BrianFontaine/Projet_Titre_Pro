<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
    class Element {
        // private $element_id;
        private $element_name;
        private $element_quantity;
        private $element_available;
        private $post_id;
        private $db;
        public function __construct($name =0,$quantity='',$available=0,$postId=0)
        {
            // $this->element_id = $id;
            $this->element_name = $name;
            $this->element_quantity = $quantity;
            $this->element_available = $available;
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
            $note_sql = "INSERT INTO `elements` (`element_name`,`element_quantity`,`element_available`,`post_id`) 
            VALUES (:elementName,:qte,:available,:postId)";
            $note_stmt = $this->db->prepare($note_sql);
            $note_stmt->bindValue(':elementName', $this->element_name, PDO::PARAM_STR);
            $note_stmt->bindValue(':qte', $this->element_quantity, PDO::PARAM_STR);
            $note_stmt->bindValue(':available', $this->element_available, PDO::PARAM_STR);
            $note_stmt->bindValue(':postId', $this->post_id, PDO::PARAM_INT);
            return $note_stmt->execute();
        }
        public function readAll()
		{
            $sql = "SELECT `element_name`, `element_quantity`, `element_available` FROM `elements`;";
            $elementStatement = $this->db->query($sql);
            $listElements = [];
            if ($elementStatement instanceof PDOstatement ) {
                $listElements = $elementStatement->fetchAll(PDO::FETCH_OBJ);
            }
            return $listElements;
        }
    }