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
}
