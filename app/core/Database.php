<?php 
namespace App\core;
require_once 'config.php';

use PDO;
use PDOException;

trait Database
{
    private $connection;

    public function getConnection(){

        try{
            $this->connection = new PDO('pgsql:host='. SERVERNAME .';dbname='. DBNAME, USERNAME,PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC).
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->connection;

        }catch(PDOException $e){
            die('database error : '.$e->getMessage());
        }
    
    }

    public function query($query,$data = []){
        
        $stmt = $this->getConnection()->prepare($query);
        $check = $stmt->execute($data);

        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            if(is_array($result) && count($result)){
                return $result;
            }

        }
        else return false;

    }


    public function get_row($query , $data = []){

        $stmt = $this->getConnection()->prepare($query);
        $check = $stmt->execute($data);

        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);

            if(is_array($result) && count($result)){
                return $result[0];
            }

        }
        else return false;

    }

}

