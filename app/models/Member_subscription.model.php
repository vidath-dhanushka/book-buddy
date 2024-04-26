<?php

class Member_subscription extends Model
{
    protected $table = "member_subscriptions";
    public $errors = [];

    protected $allowedColumns = [
        "member_id",
        "subscription_id", 
        'start_date',
        "end_date"

    ];
 
    public function getSubscription($data) {
        $query = "SELECT {$this->table}.*, subscriptions.*
                  FROM {$this->table} 
                  INNER JOIN subscriptions ON {$this->table}.subscription_id = subscriptions.id
                  WHERE {$this->table}.member_id = :id";

        
        $res =  $this->query($query, $data);
        
        // If a user subscription is not found, return the default subscription
        if (empty($res)) {
            $query = "SELECT * FROM subscriptions WHERE id = 1";
            $res = $this->query($query);
        }
        
        return $res[0];
    }

    public function getSubscriptions() {
        $query = "SELECT {$this->table}.*, subscriptions.*
                  FROM {$this->table} 
                  INNER JOIN subscriptions ON {$this->table}.subscription_id = subscriptions.id
                 ";

       
        $res =  $this->query($query);
        
        // If a user subscription is not found, return the default subscription
        if (empty($res)) {
            $query = "SELECT * FROM subscriptions WHERE id = 1";
            $res = $this->query($query);
        }
        
        return $res;
    }
    
    public function getDefaultSubscription() {
        $query = "SELECT * FROM subscriptions WHERE id = 1";
        $res = $this->query($query);
    
        if (!empty($res)) {
            return $res[0];
        }
    
        return false;
    }

    public function getCountBySubscription()
    {
        $query = "SELECT s.name, s.price, DATE_FORMAT(ms.start_date, '%b') as month, COUNT(ms.id) as member_count
                  FROM member_subscriptions AS ms
                  RIGHT JOIN subscriptions AS s ON ms.subscription_id = s.id
                  GROUP BY s.name, month";
        
        $res = $this->query($query);
        
        if (is_array($res)) {
            return $res;
        }
        
        return false;
    }
    

    
    public function assignDefaultSubscription($member_id)
    {
    // Check if the member already has a subscription
    $query = "SELECT * FROM {$this->table} WHERE member_id = :member_id";
    $res = $this->query($query, ['member_id' => $member_id]);

    // If the member does not have a subscription, assign the default subscription
    if (empty($res)) {
        $defaultSubscription = $this->getDefaultSubscription();
        if ($defaultSubscription) {
            $query = "INSERT INTO {$this->table} (member_id, subscription_id, start_date, end_date) 
                      VALUES (:member_id, :subscription_id, NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH))";
            $params = [
                'member_id' => $member_id,
                'subscription_id' => $defaultSubscription->id
            ];
            $this->query($query, $params);
        }
    }
    }


    public function updateExpiredSubscriptions($data)
{
    

    $query = "UPDATE {$this->table}
              SET subscription_id = 1 
              WHERE end_date < :now";
    $this->query($query, $data);
}


    
  
    
    

}
