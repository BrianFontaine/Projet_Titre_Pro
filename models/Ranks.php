<?php
    require_once dirname(__FILE__) . '/../utils/Databases.php';
class Ranks{

    private $ranks_id;
    private $ranks_name;
    private $db;

    public function __construct($id = 0 , $name ='')
    {
        $this->ranks_id = $id;
        $this->ranks_name = $name;
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
    public function readAll(){
        $rankSql = 'SELECT `ranks_id`, `ranks_name` FROM `ranks`;';
        $rankStatment = $this->db->query($rankSql);
        $listRank = [];
        if ($rankStatment instanceof PDOstatement ) {
            $listRank = $rankStatment->fetchAll(PDO::FETCH_OBJ);
        }
        return $listRank;
    }
}