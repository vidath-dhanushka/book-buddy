<?php

class Subscription extends Model
{
    protected $table = "subscriptions";
    public $errors = [];

    protected $allowedColumns = [
        "name",
        "price",
        "numberOfBooks",
        "features"
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

    public function getSubscriptions() {
        $query = "SELECT * FROM subscriptions";
        $res =  $this->query($query);
        // show($res);
        // die;
        return $res;
    }

    public function getSubscription($data) {
        $query = "SELECT * FROM subscriptions WHERE id =:id";
        
        // print_r($data);
        // echo $query;
        // die;
        $res =  $this->query($query, $data);
        return $res[0];
    }

    public function subscriptions() {
        $query = "SELECT * FROM $this->table";
        $res =  $this->query($query);
        if (is_array($res)) {

            return $res;
        }

        return false;

    }

    public function getSubscriptionById($data) {
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $res = $this->query($query, $data);
        if (is_array($res)) {
            return $res[0]; 
        }
        return false;
    }
    
    
    

}
