<?php

class Ebook_review extends Model
{
    protected $table = "ebook_reviews";
    public $errors = [];

    protected $allowedColumns = [
        'ebook_id',
        'category_id'
    ];

    public function get_review($data){
        
        
        $query = "SELECT {$this->table}.*, users.username, users.user_image
          FROM `{$this->table}`
          INNER JOIN `users` ON {$this->table}.userID = users.id
          WHERE {$this->table}.ebookID = :ebook_id";
       
        // echo $query;
        // print_r($data);
        // die;
        $res = $this->query($query, $data);
        
            
        if (is_array($res) && count($res) > 0) {
            // print_r($res);
            // die;
            return $res;
        }
    
        
        return false;
       
    }
    public function get_average_rating($data){
        $query = "SELECT AVG(rating) as average_rating
                  FROM {$this->table}
                  WHERE ebookID = :ebook_id";
        // print_r($data);
        // echo $query;
        // die;
        $res = $this->query($query, $data);
    
        if (is_array($res) && count($res) > 0) {
            return $res[0]->average_rating;
        }
    
        return false;
    }

    public function get_ebooks_average_rating(){
        $query = "SELECT ebookID, AVG(rating) as average_rating
                  FROM {$this->table}
                  GROUP BY ebookID";
        
        $res = $this->query($query);
        
        if (is_array($res) && count($res) > 0) {
            return $res;
        }
        
        return false;
    }
    

    public function get_review_count($data){
        $query = "SELECT COUNT(*) as review_count
                  FROM {$this->table}
                  WHERE ebookID = :ebook_id";
        $res = $this->query($query, $data);
    
        if (is_array($res) && count($res) > 0) {
            return $res[0]->review_count;
        }
    
        return false;
    }

    public function get_rating_counts($data){
        $query = "SELECT rating, COUNT(*) as count
                  FROM {$this->table}
                  WHERE ebookID = :ebook_id
                  GROUP BY rating ORDER BY rating DESC";
        $res = $this->query($query, $data);
    
        if (is_array($res) && count($res) > 0) {
            return $res;
        }
    
        // If no ratings are found, return an array with a count of 0 for each rating
        $res = [];
        for ($i = 5; $i >= 1; $i--) {
            $res[] = (object) ['rating' => $i, 'count' => 0];
        }
    
        return $res;
    }
    

    public function get_user_review($data){
        $query = "SELECT *
                  FROM {$this->table}
                  WHERE ebookID = :ebook_id AND userID = :user_id";
        $res = $this->query($query, $data);
    
        if (is_array($res) && count($res) > 0) {
            return $res[0];
        }
    
        return false;
    }

    public function delete_user_review($data){
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $res = $this->query($query, $data);
    
        if($res){
            return true;
        }
    
        return false;
    }
    
    
    
    
    

    
}
