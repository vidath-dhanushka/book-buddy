<?php

class Member_model extends Model{
    protected $table = "members";
    protected $tableF = "userID";
    protected $tableP = "id";
    protected $parentTable = "users";
    protected $parentTableP = "id";
    protected $provinceT = "provinces";
    protected $cityT = "cities";
    public $errors = [];

    protected $allowedColumns = [
        'firstname',
        'lastname',
        'username',
        'email',
        'phone',
        'address',
        'password',
        'role',
        'user_image',
        'userID',
        'contactName',
        'province',
        'city',
        'postalCode'
    ];

    public function addReview($data, $table = 'ebook_reviews'){
        $query = "INSERT INTO " . $table . " (ebookID, userID, rating, description) VALUES (:ebook_id, :user_id, :rating, :description)";
        // echo $query;
        // print_r($data);
        // die;
        $res = $this->query($query, $data);
    
        if ($res) {
            return true;
        }
    
        return false;
    }

    public function update_by_column($columnValue, $data, $columnName = null, $secondTable = null, $firstTableJoinColumn = null, $secondTableJoinColumn = null)
    {
        $secondTable = $secondTable ?? $this->parentTable;
        $firstTableJoinColumn = $firstTableJoinColumn ?? $this->parentTableP;
        $secondTableJoinColumn = $secondTableJoinColumn ?? $this->tableP;
        $columnName = $columnName ??  $this->tableF;
    
        // Get the column names of the first table
        $stmt = $this->query("SHOW COLUMNS FROM " . $this->table);
        $columns1 = [];
        foreach ($stmt as $object) {
            $columns1[] = $object->Field;
        }
    
        // Get the column names of the second table
        $stmt = $this->query("SHOW COLUMNS FROM " . $secondTable);
        $columns2 = [];
        foreach ($stmt as $object) {
            $columns2[] = $object->Field;
        }
    
        // Check if the columns exist in the tables and are in the data array
        $data1 = $data2 = [];
        foreach ($data as $key => $value) {
            if (in_array($key, $columns1)) {
                $data1[$key] = $value;
            }
            if (in_array($key, $columns2)) {
                $data2[$key] = $value;
            }
        }
    
        // Update the first table
        // First, check if the record exists
        $query = "SELECT * FROM " . $this->table . " WHERE " . $columnName . " = :columnValue";
        $stmt = $this->query($query, ['columnValue' => $columnValue]);
        // echo $query;
        // echo $columnValue;
        // die;
    
        if ($stmt) {
        
        // Record exists, perform an update
        $query = "UPDATE " . $this->table . " SET ";
        foreach ($data1 as $key => $value) {
            $query .= $key . "=:" . $key . ",";
        }
        $query = trim($query, ",");
        
        $query .= " WHERE " . $columnName . " = :columnValue";
        $data1['columnValue'] = $columnValue;
    } else {
        
        // Record does not exist, perform an insert
        $query = "INSERT INTO " . $this->table . " (";
        // print_r($data);
        // die;
        $data1['userID'] = $data['userID'];
        foreach ($data1 as $key => $value) {
            $query .= $key . ",";
        }
        $query = trim($query, ",");
        $query .= ") VALUES (";
        foreach ($data1 as $key => $value) {
            $query .= ":" . $key . ",";
        }
        $query = trim($query, ",");
        $query .= ")";
    }
    
        
        // print_r($data1);
        // echo $query;
        // die;
        $this->query($query, $data1);
    
        // Update the second table
        $query = "UPDATE " . $secondTable . " SET ";
        foreach ($data2 as $key => $value) {
            $query .= $key . "=:" . $key . ",";
        }
        $query = trim($query, ",");
        $query .= " WHERE " . $secondTableJoinColumn . " = :columnValue";
        $data2['columnValue'] = $columnValue;
        // echo "<br>";
        // print_r($data2);
        // echo "<br>".$query."<br>";
        // die;
        $this->query($query, $data2);
    
        return true;
    }
    public function view_member_details($data)
    {
       
    
        $keys = array_keys($data);
     
        $query = "SELECT * FROM users AS t1
        LEFT JOIN members AS t2 ON t1.id = t2.userID
        WHERE t1.id = :id
        ORDER BY t2.id DESC LIMIT 1;
        ";
        
        // echo "<br>".$query."<br>";
        // print_r($data);
        // echo "<br>";
        // die;
        $res = $this->query($query, $data);
    
        if (is_array($res)) {
            // print_r($res[0]);
            return $res[0];
        }
    
        return false;
    }





    public function first_by_column($data, $secondTable = null, $firstTableJoinColumn = null, $secondTableJoinColumn = null)
    {
        $secondTable = $secondTable ?? $this->parentTable;
        $firstTableJoinColumn = $firstTableJoinColumn ?? $this->tableF;
        $secondTableJoinColumn = $secondTableJoinColumn ?? $this->parentTableP;
    
        $keys = array_keys($data);
        $query = "SELECT * FROM " . $secondTable . " AS t1";
        $query .= " LEFT JOIN " . $this->table . " AS t2 ON t1." . $secondTableJoinColumn . " = t2." . $firstTableJoinColumn;
        $query .= " WHERE t1.id = :id";
       
    
        $query = trim($query, "&& ");
        $query .= " ORDER BY t2.id DESC LIMIT 1";
        // echo "<br>".$query."<br>";
        // print_r($data);
        // echo "<br>";
        // die;
        $res = $this->query($query, $data);
    
        if (is_array($res)) {
            print_r($res[0]);
            return $res[0];
        }
    
        return false;
    }
    
    public function where($data, $tableName = null)
{
    // If no table name is provided, use the class property
    $tableName = $tableName ?? $this->table;

    $keys = array_keys($data);
    $query = "SELECT * FROM " . $tableName . " WHERE ";
    foreach ($keys as $key) {
        $query .= $key . "=:" . $key . " && ";
    }

    $query = trim($query, "&& ");
    $res = $this->query($query, $data);

    if (is_array($res)) {
        return $res;
    }

    return false;
}

public function vertify_review($data){
        
    $this->errors = [];
    $query = "SELECT ebookID, userID FROM `ebook_reviews` WHERE ebookID=:ebook_id AND userID=:user_id";
    $res = $this->query($query, $data);
        
    if (is_array($res) && count($res) > 0) {
        $this->errors['title'] = "Your review already added.";
    }

    if(empty($this->errors)){
        // print_r($this->errors);
        // die;
        return true;
    }
    else{
        
        return false;
    }
}



public function edit_validate($data, $id){
    $this->errors = [];

  
    if(isset($data['firstname']) && !preg_match("/^[a-zA-Z ]+$/",$data['firstname'])){
        $this->errors['firstname'] = "Please enter a valid first name";
    }

    if(isset($data['lastname']) && !preg_match("/^[a-zA-Z]+$/",$data['lastname'])){
        $this->errors['lastname'] = "Please enter a valid last name";
    }

    if(isset($data['username']) && !preg_match("/^[a-zA-Z0-9]+$/",$data['username'])){
        $this->errors['username'] = "Username can only contain letters and numbers";
    }
    

    if(isset($data['email']) && !filter_var($data['email'],  FILTER_VALIDATE_EMAIL)){
        $this->errors['email'] = "Please enter a valid email";
    }elseif($results = $this->where(['email' =>$data['email']], $this->parentTable)){
        foreach($results as $result){
            if($id != $result->id) $this->errors['email'] = "email already exists";
        }  
    }

    if(isset($data['phone']) && !preg_match('/^\+[0-9]{11}$/',$data['phone'])){
        $this->errors['phone'] = "please enter the number in international standards";
    }

    if(isset($data['contactName']) && !preg_match("/^[a-zA-Z ]+$/",$data['contactName'])){
        $this->errors['contactName'] = "Contact can only have letters";
    }

    if(isset($data['postalCode']) && !preg_match("/^[0-9]{5}$/", $data['postalCode'])){
        $this->errors['postalCode'] = "Postal Code must have exactly 5 numbers";
    }

    return empty($this->errors);
}

    public function getProvinces($order = 'desc'){
        $query = "SELECT * FROM " . $this->provinceT . " ORDER BY id " . $order;
        
        $res = $this->query($query);

        if (is_array($res)) {
            return $res;
        }

        return false;
    }

    public function getCities(){
        $query = "SELECT * FROM " . $this->cityT;
        
        $res = $this->query($query);

        if (is_array($res)) {
            return $res;
        }

        return false;
    }

    public function addMemberRecord($userID) {
        // Check if the user has a record in the 'members' table
        $query = "SELECT * FROM members WHERE userID = {$userID}";
        $member = $this->query($query);
    
        // If the user doesn't have a record in the 'members' table, add one
        if (empty($member)) {
            $query = "INSERT INTO members (userID) VALUES ({$userID})";
            $this->query($query);
        }
    }
    
    


   

    

}