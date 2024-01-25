<?php

class Book_category extends Model
{
    protected $table = "book_category";
    public $errors = [];

    protected $allowedColumns = [
        'book_id',
        'category_id'
    ];

    public function getCategs()
    {
        $query = "SELECT * FROM book_category";
        $res =  $this->query($query);
        show($res);
        die;
        return $res;
    }

    public function categ_delete($id)
    {
        $query = "delete from book_category where book_id = " . $id;
        $this->query($query);
    }

    public function get_book_data($data = [])
    {
        $keys = array_keys($data);
        $query = "SELECT b.*, a.author_name, b.id bid FROM books AS b LEFT JOIN authors AS a ON b.author_id = a.id LEFT OUTER JOIN book_category c ON c.book_id = b.id ";

        if ($data) {
            $query .= "where c.category_id =:ccategory_id";
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
