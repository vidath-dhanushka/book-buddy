<?php

class Book extends Model{
    protected $table = "books";
    public $errors = [];

    protected $allowedColumns = [
        'title',
        'description',
        'book_image',
        'user_id',
        'author_id'
    ];

    public function validate($data){
        $this-> errors = [];

        if(empty($data['title'])){
            $this->errors['title'] = "Please enter the title of the book";
        }
        if(empty($data['description'])){
            $this->errors['description'] = "Please enter a small description";
        }
        
        if(empty($this->errors)){
            return true;
        }

        return false;
    }

    
}