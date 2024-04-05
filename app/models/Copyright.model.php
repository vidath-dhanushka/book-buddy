<?php

class Copyright extends Model
{
    protected $table = "copyrights";
    public $errors = [];

    protected $allowedColumns = [
        "ebook_id",
        "agreement",
        "license_type",
        "subscription",
        "licensed_copies",
        "copyright_fee" ,
        "license_start_date",
        "license_end_date"
    ];

    public function validate($data)
{
    // print_r($data);
    // Validate agreement
   
    if (empty($data['agreement']) && empty($_SESSION['agreement'])) {
        $this->errors['agreement'] = "Agreement is required.";
    }

    // Validate licensed_copies
    if (empty($data['licensed_copies'])) {
        $this->errors['licensed_copies'] = "Number of licensed copies is required.";
    }

    // Validate copyright_fee
    if (empty($data['copyright_fee'])) {
        $this->errors['copyright_fee'] = "Copyright fee is required.";
    }

    // Validate license_start_date
    if (empty($data['license_start_date'])) {
        $this->errors['license_start_date'] = "License start date is required.";
    }

    // Validate license_end_date
    if (empty($data['license_end_date'])) {
        $this->errors['license_end_date'] = "License end date is required.";
    } else if (!empty($data['license_start_date'])) {
        // Convert dates to DateTime objects for proper comparison
        $startDate = new DateTime($data['license_start_date']);
        $endDate = new DateTime($data['license_end_date']);
    
        // Compare the DateTime objects
        if ($endDate <= $startDate) {
            $this->errors['license_end_date'] = "License end date should be greater than the start date.";
        }
    }
    
    

    if (!isset($data['license_type']) || $data['license_type'] == 'default') {
        $this->errors['license_type'] = "Please select a license type.";
    }

    // Check if subscription is set and has a valid value
    if (!isset($data['subscription']) || $data['subscription'] == 'default') {
        $this->errors['subscription'] = "Please select a subscription.";
    }

    
    if (empty($this->errors)) {
        
        return true;
    }
    // print_r($this->errors);
    return false;
}

public function getCopyright($data){
    $query = "SELECT * FROM copyrights WHERE ebook_id =:ebook_id;";
    // print_r($data);
    // echo $query;
    // die;
    $res = $this->query($query, $data);
    return $res[0];
}

public function view_all($data){
    $query = "SELECT copyrights.*, ebooks.title, subscriptions.name AS subscription_name
    FROM copyrights
    JOIN ebooks ON copyrights.ebook_id = ebooks.id
    JOIN subscriptions ON copyrights.subscription = subscriptions.id
    ";
    if ($data) {
        $query .= "where librarian_id =:librarian_id";
    }
    // print_r($data);
    // echo $query;
    // die;
    $res = $this->query($query, $data);
    return $res;
}





}
