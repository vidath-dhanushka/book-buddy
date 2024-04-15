<?php

class Notification extends Model
{
    protected $table = "notifications";
    public $errors = [];
    
    protected $allowedColumns = [
        "id",
        "userid",
        "status",
        "date",
        "type",
        "url",
        "table",
        "seen"

    ];
    
    public static function active_notifications()
    {
        $table = "notifications"; // Define the table name
        $db = new self(); // Create an instance of the class
        $data = [];
        $query = "SELECT * FROM $table WHERE status='active' order by id desc";
        $res =  $db->query($query); // Use the instance to call the non-static method
        
        if($res){
            $n_numbers = count($res);
            return $n_numbers;
        }else {
            return 0;
        }
        
        // print_r($n_numbers);
        // die;
        // array_unshift($res, $n_numbers);
        
    }

    public static function show_notifications()
    {
        $table = "notifications"; // Define the table name
        $db = new self(); // Create an instance of the class
        $query = "SELECT * FROM $table ORDER BY id DESC LIMIT 10";
        $res =  $db->query($query); // Use the instance to call the non-static method
        return $res;
    }

    public static function inactive_notifications()
    {
        $table = "notifications"; // Define the table name
        $db = new self(); // Create an instance of the class
       
        $query = "UPDATE $table SET status='inactive' WHERE status='active'";
        $res =  $db->query($query); // Use the instance to call the non-static method
        
    }

    public static function notificationSeen($uniqueid)
    {
        $table = "notifications"; // Define the table name
        $db = new self(); // Create an instance of the class
       
        $query = "UPDATE $table SET seen='1' WHERE id='$uniqueid'";
        $res =  $db->query($query); // Use the instance to call the non-static method
        
    }

    public function getNotificationById($data)
{
   
    
    $query = "SELECT * FROM $this->table WHERE id=:id";
    // print_r($query);
    // die;
    $res = $this->query($query, $data);
    
    if($res){
        return $res;
    }else {
        return null;
    }
}




   
    

}
