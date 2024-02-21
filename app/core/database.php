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
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `userID` int(11),
            `contactName` varchar(255),
            `province` varchar(255),
            `city` varchar(255),
            `postalCode` varchar(20),
            PRIMARY KEY (`id`),
            FOREIGN KEY (`userID`) REFERENCES `users`(`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `provinces` (
            `id` int(11) NOT NULL,
            `provinceName` varchar(255) NOT NULL,
            PRIMARY KEY (id)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `cities` (
            `id` int(11) NOT NULL,
            `cityName` varchar(255) NOT NULL,
            `provinceID` int(11),
            PRIMARY KEY (`id`),
            FOREIGN KEY (`provinceID`) REFERENCES `provinces`(`id`)
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


        // $query = "CREATE TABLE IF NOT EXISTS `ebooks` (
        //     `id` INT(11) NOT NULL AUTO_INCREMENT,
        //     `title` VARCHAR(255) NOT NULL,
        //     `description` text DEFAULT NULL,
        //     `book_image` VARCHAR(1024) NOT NULL,
        //     `librarin_id` INT NOT NULL,
        //     `author_id` INT NOT NULL, 
        //     `date_added` DATETIME NOT NULL DEFAULT CURRENT_TIME,
        //     PRIMARY KEY (id),
        //     FOREIGN KEY (librarin_id) REFERENCES users(id) ON DELETE CASCADE,
        //     KEY title (title)
        //     )
        // ";
        
        $query = "CREATE TABLE IF NOT EXISTS ebooks (
            `id` INT AUTO_INCREMENT,
            `title` VARCHAR(255),
            `subtitle` VARCHAR(255),
            `author_id` INT NOT NULL, 
            `isbn` VARCHAR(13) UNIQUE,
            `language` VARCHAR(50),
            `edition` INT,
            `publisher` VARCHAR(255),
            `publish_date` DATE,
            `pages` INT,
            `description` TEXT,
            `book_cover`  VARCHAR(1024) NOT NULL,
            `file`  VARCHAR(1024) NOT NULL,
            license_type VARCHAR(50) NOT NULL,
            `librarian_id` INT, 
            `copyright_status` INT NOT NULL DEFAULT 0,
            `date_added` DATETIME NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (id),
            FOREIGN KEY (librarian_id) REFERENCES Users(id) ON DELETE SET NULL
           
        );
        
        ";
        $this->query($query);



        $query = "CREATE TABLE IF NOT EXISTS subscriptions (
            `id` INT AUTO_INCREMENT,
            `name` VARCHAR(255) NOT NULL,
            `price` DECIMAL(10,2) NOT NULL,
            `numberOfBooks` INT NOT NULL,
            `description` TEXT,
            `date_added` DATETIME NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (id)
        );        
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS copyrights (
            id INT AUTO_INCREMENT,
            ebook_id INT NOT NULL,
            agreement VARCHAR(1024) NOT NULL,
            license_type VARCHAR(50) NOT NULL,
            subscription INT NOT NULL DEFAULT 0 ,
            licensed_copies INT NOT NULL,
            copyright_fee DECIMAL(10,2) NOT NULL,
            license_start_date DATE NOT NULL,
            license_end_date DATE NOT NULL,
            date_added DATETIME NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (id),
            FOREIGN KEY (ebook_id) REFERENCES ebooks(id) ON DELETE CASCADE,
            FOREIGN KEY (subscription) REFERENCES subscriptions(id) 
        );
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `ebook_category` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `ebook_id` INT NOT NULL, 
            `category_id` INT NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (ebook_id) REFERENCES ebooks(id) ON DELETE CASCADE,
            FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
            );
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `reviews` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `ebookID` int(11) DEFAULT NULL,
            `userID` int(11) DEFAULT NULL,
            `rating` int(11) DEFAULT NULL,
            `description` text DEFAULT NULL,
            `date` timestamp NOT NULL DEFAULT current_timestamp(),
            PRIMARY KEY (`id`),
            FOREIGN KEY (`ebookID`) REFERENCES `ebooks`(`id`) ON DELETE CASCADE,
            FOREIGN KEY (`userID`) REFERENCES `users`(`id`)
        );

        ";
        $this->query($query);


        $query = "CREATE TABLE IF NOT EXISTS `borrowed_ebooks` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `ebook_id` int(11) NOT NULL,
            `user_id` int(11) NOT NULL,
            `borrow_date` date DEFAULT current_timestamp(),
            PRIMARY KEY (id),
            FOREIGN KEY (`ebook_id`) REFERENCES `ebooks`(`id`) ON DELETE CASCADE,
            FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
          );
        ";
        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `courier`
        (
            `courier_id`    SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `company_name`  VARCHAR(32) UNIQUE NOT NULL,
            `reg_no`        VARCHAR(16) UNIQUE NOT NULL,
            `email`         VARCHAR(96) UNIQUE NOT NULL,
            `phone`         VARCHAR(16) UNIQUE NOT NULL,
            `rate_first_kg` DECIMAL(9, 2)      NOT NULL,
            `rate_extra_kg` DECIMAL(9, 2)      NOT NULL,
            `reg_time`      TIMESTAMP          NOT NULL DEFAULT unix_timestamp(),
            `mod_time`      DATETIME ON UPDATE CURRENT_TIMESTAMP
        );
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `courier_rate_exception`
        (
            `courier_rate_exception_id` MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `courier`                   SMALLINT UNSIGNED NOT NULL REFERENCES courier (courier_id),
            `source_district`           VARCHAR(96),
            `destination_district`      VARCHAR(96),
            `rate_first_kg`             DECIMAL(9, 2)     NOT NULL,
            `rate_extra_kg`             DECIMAL(9, 2)     NOT NULL,
            `reg_time`                  TIMESTAMP         NOT NULL DEFAULT unix_timestamp(),
            `mod_time`                  DATETIME ON UPDATE CURRENT_TIMESTAMP,
            UNIQUE (courier, source_district, destination_district)
        );
        ";
        $this->query($query);


        $query = "CREATE TABLE IF NOT EXISTS `borrow`
        (
            `borrow_id`                  MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `user`                       MEDIUMINT UNSIGNED NOT NULL REFERENCES user (user_id),
            `sending_address_line1`      VARCHAR(128),
            `sending_address_line2`      VARCHAR(128),
            `sending_address_city`       VARCHAR(32),
            `sending_address_district`   VARCHAR(32),
            `sending_address_zip`        CHAR(5),
            `receiving_address_line1`    VARCHAR(128),
            `receiving_address_line2`    VARCHAR(128),
            `receiving_address_city`     VARCHAR(32),
            `receiving_address_district` VARCHAR(32),
            `receiving_address_zip`      CHAR(5),
            `courier`                    SMALLINT UNSIGNED REFERENCES courier (courier_id),
            `delivery_charge`            SMALLINT UNSIGNED  NOT NULL REFERENCES courier_rate_exception (courier_rate_exception_id),
            `delivery_method`            VARCHAR(64)        NOT NULL, #(courier, self-deliver....)
            `reg_time`                   TIMESTAMP          NOT NULL DEFAULT unix_timestamp(),
            `mod_time`                   DATETIME ON UPDATE CURRENT_TIMESTAMP
        );
        ";

        $this->query($query);


        $query = "CREATE TABLE IF NOT EXISTS `borrow`
        (
            `borrow_id`                  MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `user`                       MEDIUMINT UNSIGNED NOT NULL REFERENCES user (user_id),
            `sending_address_line1`      VARCHAR(128),
            `sending_address_line2`      VARCHAR(128),
            `sending_address_city`       VARCHAR(32),
            `sending_address_district`   VARCHAR(32),
            `sending_address_zip`        CHAR(5),
            `receiving_address_line1`    VARCHAR(128),
            `receiving_address_line2`    VARCHAR(128),
            `receiving_address_city`     VARCHAR(32),
            `receiving_address_district` VARCHAR(32),
            `receiving_address_zip`      CHAR(5),
            `courier`                    SMALLINT UNSIGNED REFERENCES courier (courier_id),
            `delivery_charge`            SMALLINT UNSIGNED  NOT NULL REFERENCES courier_rate_exception (courier_rate_exception_id),
            `delivery_method`            VARCHAR(64)        NOT NULL, #(courier, self-deliver....)
            `reg_time`                   TIMESTAMP          NOT NULL DEFAULT unix_timestamp(),
            `mod_time`                   DATETIME ON UPDATE CURRENT_TIMESTAMP
        );
        ";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS user_invitation
        (
            `user_invitation_id` MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `email`              VARCHAR(128),
            `token`              VARCHAR(96) UNIQUE,
            `role`               TINYINT UNSIGNED   NOT NULL,
            `courier`            SMALLINT UNSIGNED REFERENCES courier (courier_id),
            `other`              JSON               NOT NULL DEFAULT JSON_OBJECT(),
            `used_time`          DATETIME,
            `new_user`           MEDIUMINT UNSIGNED REFERENCES user (user_id),
            `reg_user`           MEDIUMINT UNSIGNED NOT NULL REFERENCES user (user_id),
            `reg_time`           DATETIME           NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `mod_time`           DATETIME ON UPDATE CURRENT_TIMESTAMP
        );";

       $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS `transaction`
        (
            `transaction_id` MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `user`           MEDIUMINT UNSIGNED NOT NULL REFERENCES user (user_id),
            `description`    VARCHAR(64)        NOT NULL,
            `payment_method` VARCHAR(64)        NOT NULL,
            `status`         VARCHAR(32)        NOT NULL,
            `amount`         DECIMAL(9, 2)      NOT NULL,
            `reg_time`       DATETIME           NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `mod_time`       DATETIME ON UPDATE CURRENT_TIMESTAMP
        );";

        $this->query($query);


        $query = "CREATE TABLE IF NOT EXISTS delivery
        (
            `delivery_id`               MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `sender_name`               VARCHAR(32)   NOT NULL,
            `sender_address_line1`      VARCHAR(128),
            `sender_address_line2`      VARCHAR(128),
            `sender_address_city`       VARCHAR(32),
            `sender_address_district`   VARCHAR(32),
            `sender_address_zip`        CHAR(5),
            `sender_phone`              VARCHAR(16)   NOT NULL,
            `receiver_name`             VARCHAR(32)   NOT NULL,
            `receiver_address_line1`    VARCHAR(128),
            `receiver_address_line2`    VARCHAR(128),
            `receiver_address_city`     VARCHAR(32),
            `receiver_address_district` VARCHAR(32),
            `receiver_address_zip`      CHAR(5),
            `receiver_phone`            VARCHAR(16)   NOT NULL,
            `weight`                    DECIMAL(9, 2) NOT NULL,
            `charge`                    DECIMAL(9, 2),
            `method`                    VARCHAR(64)   NOT NULL, #(courier, self-deliver....)
            `courier`                   SMALLINT UNSIGNED REFERENCES courier (courier_id),
            `reg_time`                  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `mod_time`                  DATETIME ON UPDATE CURRENT_TIMESTAMP
        );";

       $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS borrow
        (
            `borrow_id`       MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `user`            MEDIUMINT UNSIGNED NOT NULL REFERENCES user (user_id),
            `send_delivery`   MEDIUMINT UNSIGNED REFERENCES delivery (delivery_id),
            `return_delivery` MEDIUMINT UNSIGNED REFERENCES delivery (delivery_id),
            `reg_time`        DATETIME           NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `mod_time`        DATETIME ON UPDATE CURRENT_TIMESTAMP
        );";

       $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS book_borrow
        (
            `book_borrow_id` MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `book`           MEDIUMINT UNSIGNED NOT NULL REFERENCES book (book_id),
            `borrow`         MEDIUMINT UNSIGNED NOT NULL REFERENCES borrow (borrow_id),
            `user`           MEDIUMINT UNSIGNED NOT NULL REFERENCES user (user_id),
            `reg_time`       DATETIME           NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `mod_time`       DATETIME ON UPDATE CURRENT_TIMESTAMP,
            UNIQUE (book, user, borrow)
        );";

        $this->query($query);

        $query = "CREATE TABLE IF NOT EXISTS book_borrow_status
        (
            `book_borrow_status_id` MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `book_borrow`           MEDIUMINT UNSIGNED NOT NULL REFERENCES borrow (borrow_id),
            `status`                VARCHAR(16)        NOT NULL,
            `reg_time`              DATETIME           NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `mod_time`              DATETIME ON UPDATE CURRENT_TIMESTAMP
        );";

        $this->query($query);

        // CREATE TABLE subscription(
        //     id INT PRIMARY KEY AUTO_INCREMENT,
        //     name VARCHAR(50) NOT NULL,
        //     price DECIMAL(10, 2) NOT NULL,
        //     copyrightCost DECIMAL(10, 2),
        //     maxBooksAllowed INT NOT NULL,
        //     description TEXT,
        //     isActive BOOLEAN DEFAULT FALSE,
        //     dateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        // );
        
        
    }
}
