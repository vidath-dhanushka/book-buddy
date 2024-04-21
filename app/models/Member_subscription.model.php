<?php

class Member_subscription extends Model
{
    protected $table = "member_subscriptions";
    public $errors = [];

    protected $allowedColumns = [
        "member_id",
        "subscription_id", 
        "end_date"

    ];
 
    public function getSubscription() {
        $query = "SELECT {$this->table}.*, subscriptions.*
                  FROM {$this->table} 
                  INNER JOIN subscriptions ON {$this->table}.subscription_id = subscriptions.id";
        $res =  $this->query($query);
        
        // If a user subscription is not found, return the default subscription
        if (empty($res)) {
            $query = "SELECT * FROM subscriptions WHERE id = 1";
            $res = $this->query($query);
        }
        
        return $res[0];
    }
    
    public function getDefaultSubscription() {
        $query = "SELECT * FROM subscriptions WHERE id = 1";
        $res = $this->query($query);
    
        if (!empty($res)) {
            return $res[0];
        }
    
        return false;
    }
    
  
    
    

}
