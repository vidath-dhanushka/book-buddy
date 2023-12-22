<?php

// some app configs
define('APP_NAME' , 'BOOK BUDDY');
define('APP_DESC', 'Book sharing platform for everyone');


// database configs
if ($_SERVER['SERVER_NAME'] == 'localhost'){
    define('DBHOST', 'localhost');
    define('DBNAME', 'bookbuddy_db');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');

    define('ROOT', 'http://localhost/bookbuddy/public');
}else{
    define('DBHOST', 'localhost');
    define('DBNAME', 'bookbuddy_db');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');
}