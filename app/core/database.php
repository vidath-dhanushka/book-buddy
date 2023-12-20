<?php

class Database 
{
    private function connect(){

        $str = DBDRIVER.':host='.DBHOST.';dbname='.DBNAME;
        return new PDO($str, DBUSER, DBPASS);

    }

    public function query($query, $data = [], $type = 'object'){

        $con = $this->connect();
        $stm = $con->prepare($query);
        if($stm){
            $check = $stm->execute($data);
            if($check){
                if($type != 'object'){
                    $type = PDO::FETCH_ASSOC;
                }else{
                    $type = PDO::FETCH_OBJ;
                }
                $result = $stm->fetchAll($type);

                if(is_array($result) && count($result) > 0){
                    return $result;
                }
            }
        }
        return false;
    }

    public function create_tables(){
        $query = "
        CREATE TABLE IF NOT EXISTS users (
            id INT(11) NOT NULL AUTO_INCREMENT,
            email VARCHAR(100) NOT NULL,
            password VARCHAR(255) NOT NULL,
            date_created date DEFAULT NULL,
            PRIMARY KEY (id),
            KEY email (email),
            KEY date_created (date_created)
            )
        ";

        $this->query($query);
    }
}
