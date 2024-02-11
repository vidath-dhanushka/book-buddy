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

    public function copyright_info_validate($data)
{
    $this->errors = [];
    
   // Validate ebook_id
    if (empty($data['ebook_id'])) {
        $errors['ebook_id'] = "Ebook ID is required.";
    }

    // Validate agreement
    if (empty($data['agreement'])) {
        $errors['agreement'] = "Agreement is required.";
    }

    // Validate license_type
    if (empty($data['license_type'])) {
        $errors['license_type'] = "License type is required.";
    }

    // Validate subscription
    if (empty($data['subscription'])) {
        $errors['subscription'] = "Subscription is required.";
    }

    // Validate licensed_copies
    if (empty($data['licensed_copies'])) {
        $errors['licensed_copies'] = "Number of licensed copies is required.";
    }

    // Validate copyright_fee
    if (empty($data['copyright_fee'])) {
        $errors['copyright_fee'] = "Copyright fee is required.";
    }

    // Validate license_start_date
    if (empty($data['license_start_date'])) {
        $errors['license_start_date'] = "License start date is required.";
    }

    // Validate license_end_date
    if (empty($data['license_end_date'])) {
        $errors['license_end_date'] = "License end date is required.";
    }

    
    if (empty($this->errors)) {
        return true;
    }

    return false;
}

}
