<?php

return [
    /**
     * Options: mysql, sqlite
     */
    
    'driver' => 'sqlite',
    
    'sqlite' => [
        'host' => 'database.db'
    ],
    'mysql' => [
        'host' => 'localhost',
        'database' => 'php_framework',
        'user' => 'root',
        'pass' => 'vagrant',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci'
    ],
];

