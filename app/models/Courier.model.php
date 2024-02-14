<?php

class Courier extends Model
{
    protected $table = "Courier";
    public $errors = [];

    protected $allowedColumns = [
        'company_name',
        'reg_no',
        'email',
        'phone',
        'rate_first_kg',
        'rate_extra_kg'
    ];

    public function validate($data)
    {

        if (empty($data['company_name'])) {
            $this->errors['company_name'] = "Please enter company name";
        }

        if (empty($data['reg_no'])) {
            $this->errors['reg_no'] = "Please enter registration number of the company";
        }

        if (empty($data['email'])) {
            $this->errors['email'] = "Please enter company email";
        } else
        if (!filter_var($data['email'],  FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Please enter a valid email";
        }

        if (empty($data['phone'])) {
            $this->errors['phone'] = "Please enter the phone number";
        } else
        if (!preg_match('/^\+[0-9]{11}$/', $data['phone'])) {
            $this->errors['phone'] = "please enter the number in international standards";
        }

        if (empty($data['rate_first_kg'])) {
            $this->errors['rate_first_kg'] = "Please enter the rates for the first kilogram";
        } else
        if (!preg_match('/^\d{1,9}(?:,\d{3})*(?:\.\d{2})?$/', $data['rate_first_kg'])) {
            $this->errors['rate_first_kg'] = "rate should only include numbers with 2 decimals";
        }
        if (empty($data['rate_extra_kg'])) {
            $this->errors['rate_extra_kg'] = "Please enter the rates for the extra kilogram";
        } else
        if (!preg_match('/^\d{1,9}(?:,\d{3})*(?:\.\d{2})?$/', $data['rate_extra_kg'])) {
            $this->errors['rate_extra_kg'] = "rate should only include numbers with 2 decimals";
        }
    }
}
