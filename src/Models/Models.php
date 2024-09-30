<?php

namespace Stdev\Framework\Models ;

abstract class Models 
{
    protected $db ;
    protected $table ;

    public function __construct($db) {
        $this->db = $db;
    }


    public function all() {
        $req = $this->db->getPdo()->query("SELECT * FROM {$this->table}");
        $req->setFetchMode(\PDO::FETCH_CLASS,get_class($this),[$this->db]);
        return $req->fetchAll();
    }

    public function findById($id) : Models  {
        $req = $this->db->getPdo()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $req->setFetchMode(\PDO::FETCH_CLASS,get_class($this),[$this->db]);
        return $req->execute([$id])->fetch();
    }
}