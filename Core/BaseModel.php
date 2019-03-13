<?php

namespace Core;

use PDO;

abstract class BaseModel {
    private $pdoConn;
    protected $table;
    
    public function __construct(PDO $pdoObj)
    {
        $this->pdoConn = $pdoObj;
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
