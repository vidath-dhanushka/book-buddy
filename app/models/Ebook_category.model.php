<?php

class Ebook_category extends Model
{
    protected $table = "ebook_category";
    public $errors = [];

    protected $allowedColumns = [
        'ebook_id',
        'category_id'
    ];

    public function getCategs()
    {
        $query = "SELECT * FROM ebook_category";
        $res =  $this->query($query);
        // show($res);
        // die;
        return $res;
    }

    public function categ_delete($id)
    {
        $query = "delete from ebook_category where ebook_id = " . $id;
        // echo $query;
        // echo $id;

        $this->query($query);
    }

   

    public function get_ebook_data($data = [])
    {
        $keys = array_keys($data);
        $query = "SELECT b.*, a.author_name, b.id bid FROM ebooks AS b LEFT JOIN authors AS a ON b.author_id = a.id LEFT OUTER JOIN ebook_category c ON c.ebook_id = b.id WHERE b.copyright_status = 1";

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

    public function get_category_names($data){
        $ids = implode(',', $data);
        $query = "SELECT category_name FROM categories WHERE id IN ($ids)";
        // echo $query;
        // print_r( $ids);
        // die;
        $res = $this->query($query);
    
        if(is_array($res) && count($res) > 0){
            $category_names = array_column($res, 'category_name');
            return $category_names;
        }
    
        return false;
    }
}
