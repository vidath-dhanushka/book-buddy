<?php

class Transaction extends Model
{
    protected $table = "transaction";
    public $errors = [];

    protected $allowedColumns = [
        'user',
        'description',
        'payment_method',
        'status',
        'amount'
    ];

    public function validate($data)
    {

        if (empty($data['payment_method'])) {
            $this->errors['payment_method'] = "Please select a payment method";
        }

        if (empty($data['amount'])) {
            $this->errors['amount'] = "Please enter the amount";
        } else
        if (!preg_match('/^\d{1,9}(?:,\d{3})*(?:\.\d{2})?$/', $data['amount'])) {
            $this->errors['amount'] = "amount should only include numbers with 2 decimals";
        }
    }
}
