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
        $query = "CREATE TABLE IF NOT EXISTS `users` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `firstname` VARCHAR(30) NOT NULL,
                `lastname` VARCHAR(30) NOT NULL,
                `username` VARCHAR(60) NOT NULL,
                `email` VARCHAR(100) NOT NULL,
                `phone` VARCHAR(10) NOT NULL,
                `address` VARCHAR(255) NOT NULL,
                `password` VARCHAR(255) NOT NULL,
                `role` VARCHAR(20)  NOT NULL,
                `date_created` DATETIME NOT NULL DEFAULT CURRENT_TIME,
                PRIMARY KEY (id),
                KEY firstname (firstname),
                KEY lastname (lastname),
                KEY username (username),
                KEY email (email),
                KEY date_created (date_created)
                ) 
            ";

        $this->query($query);
    }
}
