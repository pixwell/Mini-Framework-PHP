<?php

namespace Core;

/**
 * Conexao com o banco de dados
 *
 * @author pixwell
 */
class Database {
            
    public static function connDB(){
        $conf = include_once __DIR__ . '/../App/database.php';
        if( $conf['driver'] == 'sqlite' ){
            $sqliteDBFile = include_once __DIR__ . '/../Storage/database/' . $conf['sqlite']['host'];
            $sqliteDNS = 'sqlite:' . $sqliteDBFile;
            
            //Tentar conectar
            try{
                $pdo = new \PDO($sqliteDNS);
                //Tipo de erro
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                //Retornar um objeto nas consultas
                $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
                return $pdo;
            }catch( \PDOException $e ){
                echo $e->getMessage();
            }
        } elseif( $conf['driver'] == 'mysql' ){
            
            $host = $conf['mysql']['host'];
            $database = $conf['mysql']['database'];
            $charset = $conf['mysql']['charset'];
            $collation = $conf['mysql']['collation'];
            $user = $conf['mysql']['user'];
            $pass = $conf['mysql']['pass'];
            
            //Tentar conectar
            try {
                $pdo = new \PDO( 'mysql:host=' . $host . ';dbname=' . $database . ';charset=' . $charset, $user, $pass );
                //Tipo de erro
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                //Charset e collation do banco de dados
                $pdo->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES '$charset' COLLATE '$collation'");
                //Retornar um objeto nas consultas
                $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
                return $pdo;
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}
