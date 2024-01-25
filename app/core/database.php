<?php

class Database
{
    private function connect()
    {

        $str = DBDRIVER . ':host=' . DBHOST . ';dbname=' . DBNAME;
        return new PDO($str, DBUSER, DBPASS);
    }

    public function query($query, $data = [], $type = 'object')
    {
        $con = $this->connect();

        $stm = $con->prepare($query);
        if ($stm) {
            foreach ($data as $key => $value) {
                $newKey = str_replace('.', '', $key);

                // Remove the old key and set the value with the new key
                unset($data[$key]);
                $data[$newKey] = $value;
            }

            $check = $stm->execute($data);
            if ($check) {
                if ($type != 'object') {
                    $type = PDO::FETCH_ASSOC;
                } else {
                    $type = PDO::FETCH_OBJ;
                }
                $result = $stm->fetchAll($type);

                if (is_array($result) && count($result) > 0) {
                    return $result;
                }
                return $con->lastInsertId();
            }
        }
        return false;
    }

    public function create_tables()
    {
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


        $query = "CREATE TABLE IF NOT EXISTS `books` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) NOT NULL,
            `description` text DEFAULT NULL,
            `book_image` VARCHAR(1024) NOT NULL,
            `user_id` INT NOT NULL,
            `author_id` INT NOT NULL, 
            `date_added` DATETIME NOT NULL DEFAULT CURRENT_TIME,
            PRIMARY KEY (id),
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            KEY title (title)
            )
        ";

        $this->query($query);
        $query = "CREATE TABLE IF NOT EXISTS `categories` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `category_name` VARCHAR(255) NOT NULL, 
            PRIMARY KEY (id)
            )
        ";

        $this->query($query);


        $query = "CREATE TABLE IF NOT EXISTS `book_category` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `book_id` INT NOT NULL, 
            `category_id` INT NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE,
            FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
            )
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `authors` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `author_name` VARCHAR(255) NOT NULL, 
            `date_added` DATETIME NOT NULL DEFAULT CURRENT_TIME,
            PRIMARY KEY (id)
            )
        ";

        $this->query($query);
    }
}
