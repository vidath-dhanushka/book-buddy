<?php

class Category extends Model
{
    protected $table = "categories";
    public $errors = [];

    // protected $allowedColumns = [
    //     'book_id',
    //     'category_id'
    // ];

    public function getCategs()
    {
        $query = "SELECT * FROM categories";
        $res =  $this->query($query);
        // show($res);
        // die;
        return $res;
    }
}
