<?php

class Author extends Model
{
    protected $table = "authors";
    public $errors = [];

    protected $allowedColumns = [
        'author_name',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['author_name'])) {
            $this->errors['author_name'] = "Please enter the author name";
        }
        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}
