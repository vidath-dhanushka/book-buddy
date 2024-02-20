<?php

class Courier_rate_exception extends Model
{
    protected $table = "courier_rate_exception";
    public $errors = [];

    protected $allowedColumns = [
        'courier',
        'source_district',
        'destination_district',
        'rate_first_kg',
        'rate_extra_kg'
    ];

    public function validate($data)
    {

        if (empty($data['courier'])) {
            $this->errors['courier'] = "Please enter Courier name";
        }

        if (empty($data['source_district'])) {
            $this->errors['source_district'] = "Please enter source district";
        }
        if (empty($data['destination_district'])) {
            $this->errors['destination_district'] = "Please enter destination district";
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
