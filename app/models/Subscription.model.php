<?php

class Subscription extends Model
{
    protected $table = "subscriptions";
    public $errors = [];

    protected $allowedColumns = [
        "name",
        "price",
        "numberOfBooks",
        "description"
    ];
    public function validate($data)
    {
        // Validate name
        if (empty($data['name'])) {
            $errors['name'] = "Name is required.";
        }
    
        // Validate price
        if (empty($data['price'])) {
            $errors['price'] = "Price is required.";
        }
    
        // Validate numberOfBooks
        if (empty($data['numberOfBooks'])) {
            $errors['numberOfBooks'] = "Number of books is required.";
        }
    
        // Validate description
        if (empty($data['description'])) {
            $errors['description'] = "Description is required.";
        }
    
        if (empty($errors)) {
            return true;
        }
    
        return false;
    }
    

}
