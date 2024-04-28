<?php

class Borrow extends Model
{
    protected $table = "borrow";
    public $errors = [];

    protected $allowedColumns = [
        'user_id',
        'send_delivery',
        'return_delivery'
    ];

    public function validate($data)
    {

        if (empty($data['send_delivery'])) {
            $this->errors['send_delivery'] = "Please enter sending delivery address";
        }

        if (empty($data['return_delivery'])) {
            $this->errors['return_delivery'] = "Please enter return delivery address";
        }
    }
}
