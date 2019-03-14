<?php

namespace Core;

use PDO;
use Core\Database;

abstract class BaseModel {
    private $pdoConn;
    protected $table;
    
    public function __construct()
    {
        $this->pdoConn = Database::connDB();
    }
    
    public function all()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->pdoConn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    }
    
    /**
     * Pesquisar registro atraves do ID
     * @param integer $id
     * @return obj
     */
    public function find($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id=:id';
        $stmt = $this->pdoConn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $stmt->closeCursor();
        return $result;
    }
}
