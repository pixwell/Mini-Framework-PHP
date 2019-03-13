<?php

namespace Core;

/**
 * Manipulacao do banco de dados
 *
 * @author pixwell
 */
class Database {
            
    public function getDatabase(){
        $conf = include_once __DIR__ . '/../App/database.php';
        if( $conf['driver'] == 'sqlite' ){
            $sqliteDBFile = include_once __DIR__ . '/../Storage/database/' . $conf['sqlite']['host'];
            $sqliteDNS = 'sqlite:' . $sqliteDBFile;
            
            //Tentar conectar
            try{
                $pdo = new \PDO($sqliteDNS);
                //Tipo de erro
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Retornar um objeto nas consultas
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $pdo;
            }catch( \PDOException $e ){
                echo $e->getMessage();
            }
        }
    }
}
