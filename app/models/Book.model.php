<?php

class Book extends Model
{
    protected $table = "books";
    public $errors = [];

    protected $allowedColumns = [
        'title',
        'description',
        'book_image',
        'user_id',
        'author_id'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['title'])) {
            $this->errors['title'] = "Please enter the title of the book";
        }
        if (empty($data['description'])) {
            $this->errors['description'] = "Please enter a small description";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function categories()
    {
        $query = "SELECT id, category_name FROM categories ORDER BY category_name";
        $res = $this->query($query);
        return $res;
    }

    public function view_book_details($data)
    {
        $keys = array_keys($data);
        $query = "SELECT b.*, a.author_name, b.id bid, GROUP_CONCAT(c.category_id) cats FROM " . $this->table . " AS b LEFT JOIN authors AS a ON b.author_id = a.id LEFT OUTER JOIN book_category c ON c.book_id = b.id where ";
        foreach ($keys as $key) {
            $query .= $key . "=:" . str_replace('.', '', $key) . " && ";
        }

        $query = trim($query, "&& ");
        $query .= " group by b.id order by id desc limit 1";

        $res = $this->query($query, $data);
        $res[0]->cats = explode(',', $res[0]->cats);
        // show($res[0]->cats);
        if (is_array($res)) {
            return $res[0];
        }

        return false;
    }

    public function view_all($data)
    {
        $query = "SELECT b.*, a.author_name, b.id bid FROM books AS b LEFT JOIN authors AS a ON b.author_id = a.id LEFT OUTER JOIN book_category c ON c.book_id = b.id ";

        if ($data) {
            $query .= "where user_id =:user_id";
        }

        $query .= " group by b.id order by id desc";
        // show($query);
        // die;

        $res = $this->query($query, $data);
        // show($res);
        // die;
        // $res[0]->cats = explode(',', $res[0]->cats);
        // // show($res[0]->cats);
        if (is_array($res)) {
            // show($res);
            // die;
            return $res;
        }

        return false;
    }
}
