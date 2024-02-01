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
                `phone` VARCHAR(12) NOT NULL,
                `address` VARCHAR(255) NOT NULL,
                `password` VARCHAR(255) NOT NULL,
                `role` VARCHAR(20)  NOT NULL,
                `user_image` VARCHAR(1024) DEFAULT 'uploads/default.png',
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

        $query = "CREATE TABLE IF NOT EXISTS `members` (
            `id` int(11) NOT NULL,
            `userID` int(11) DEFAULT NULL,
            `contactName` varchar(255) DEFAULT NULL,
            `province` varchar(255) DEFAULT NULL,
            `city` varchar(255) DEFAULT NULL,
            `postalCode` varchar(20) DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `provinces` (
            `id` int(11) NOT NULL,
            `provinceName` varchar(255) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `cities` (
            `id` int(11) NOT NULL,
            `cityName` varchar(255) NOT NULL,
            `provinceID` int(11) DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";

        $this->query($query);

        $query = "INSERT IGNORE INTO `provinces` (id, provinceName) VALUES
        (1, 'Central Province'),
        (2, 'Eastern Province'),
        (5, 'Northern Province'),
        (7, 'Southern Province'),
        (9, 'Western Province'),
        (4, 'North Western Province'),
        (3, 'North Central Province'),
        (8, 'Uva Province'),
        (6, 'Sabaragamuwa Province');
        
        ";
        
        $this->query($query);

        $query = "INSERT IGNORE INTO `cities` (id, cityName, provinceID) VALUES
        (1, 'Kandy', 1),
        (2, 'Kandy - Outer', 1),
        (3, 'Matale', 1),
        (4, 'Nuwara Eliya', 1),
        (5, 'Other', 1),
        (6, 'Ampara', 2),
        (7, 'Batticaloa', 2),
        (8, 'Trincomalee', 2),
        (9, 'Other', 2),
        (10, 'Anuradhapura', 3),
        (11, 'Polonnaruwa', 3),
        (12, 'Other', 3),
        (13, 'Kurunegala', 4),
        (14, 'Puttalam', 4),
        (15, 'Other', 4),
        (16, 'Jaffna', 5),
        (17, 'Kilinochchi', 5),
        (18, 'Mannar', 5),
        (19, 'Mulativu', 5),
        (20, 'Vavuniya', 5),
        (21, 'Other', 5),
        (22, 'Kegalle', 6),
        (23, 'Ratnapura', 6),
        (24, 'Other', 6),
        (25, 'Galle', 7),
        (26, 'Hambantota', 7),
        (27, 'Matara', 7),
        (28, 'Other', 7),
        (29, 'Badulla', 8),
        (30, 'Monaragala', 8),
        (31, 'Other', 8),
        (32, 'Colombo (1-15)', 9),
        (33, 'Colombo - Greater', 9),
        (34, 'Colombo - Suburbs', 9),
        (35, 'Gampaha', 9),
        (36, 'Kalutara', 9),
        (37, 'Other', 9);
        ";

        $this->query($query);


        $query = "CREATE TABLE IF NOT EXISTS `ebooks` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) NOT NULL,
            `description` text DEFAULT NULL,
            `book_image` VARCHAR(1024) NOT NULL,
            `librarin_id` INT NOT NULL,
            `author_id` INT NOT NULL, 
            `date_added` DATETIME NOT NULL DEFAULT CURRENT_TIME,
            PRIMARY KEY (id),
            FOREIGN KEY (librarin_id) REFERENCES users(id) ON DELETE CASCADE,
            KEY title (title)
            )
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `borrowed_ebooks` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `ebook_id` int(11) NOT NULL,
            `member_id` int(11) NOT NULL,
            `borrow_date` date DEFAULT current_timestamp(),
            PRIMARY KEY (id),
            FOREIGN KEY (ebook_id) REFERENCES ebooks(id) ON DELETE CASCADE,
            FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE
          );
        ";
        $this->query($query);




}
}