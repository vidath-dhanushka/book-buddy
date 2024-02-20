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
    if (empty($data['agreement'])) {
        $this->errors['agreement'] = "Agreement is required.";
    }

    // Validate license_type
    if (empty($data['license_type'])) {
        $this->errors['license_type'] = "License type is required.";
    }

    // Validate subscription
    if (empty($data['subscription'])) {
        $this->errors['subscription'] = "Subscription is required.";
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
    }

    
    if (empty($this->errors)) {
        
        return true;
    }
    // print_r($this->errors);
    return false;
}

}
