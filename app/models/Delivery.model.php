<?php

class Delivery extends Model
{
    protected $table = "delivery";
    public $errors = [];

    protected $allowedColumns = [
        'sender_name',
        'sender_address_line_1',
        'sender_address_line_2',
        'sender_address_city',
        'sender_address_district',
        'sender_address_zip',
        'sender_phone',
        'receiver_name',
        'receiver_address_line_1',
        'receiver_address_line_2',
        'receiver_address_city',
        'receiver_address_district',
        'receiver_address_zip',
        'receiver_phone',
        'weight',
        'charge',
        'method',
        'courier'
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
