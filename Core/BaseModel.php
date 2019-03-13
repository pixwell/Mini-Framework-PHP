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
}
