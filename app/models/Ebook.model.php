<?php

class Ebook extends Model
{
    protected $table = "ebooks";
    public $errors = [];

    protected $allowedColumns = [
        'title',
        'subtitle',
        'isbn',
        'language',
        'edition',
        'publisher',
        'publish_date',
        'pages',
        'description',
        'book_cover',
        'file',
        'author_id',
        'librarian_id',
        'license_type'
    ];

    public function ebook_info_validate($data)
{
    $this->errors = [];
    
    if (empty($data['title'])) {
        $this->errors['title'] = "Please provide a value for the title.";
    } else if (strlen($data['title']) < 2) {
        $this->errors['title'] = "The title should be at least 2 characters long.";
    }

    if (empty($data['author_name'])) {
        $this->errors['author_name'] = "Please provide a value for the author.";
    }else
    if (!preg_match("/^[a-zA-Z-' ]*$/",$data["author_name"])) {
        $this->errors['author_name'] = "Only letters and white space allowed in author name";
    }
    if (empty($data['pages'])) {
        $this->errors['pages'] = "Please provide a value for the pages.";
    }

    if (isset($data['subtitle']) && strlen($data['subtitle']) > 255) {
        $this->errors['subtitle'] = "The subtitle should not exceed 255 characters.";
    }

    if (isset($data['isbn']) && !preg_match('/^(?:ISBN(?:-1[03])?:? )?(?:[0-9]{10}(?:[- ]?[0-9]{4})?|[0-9]{13})$/', $data['isbn'])) {
        $this->errors['isbn'] = "The ISBN format is invalid.";
    }
    
    if (empty($data['language'])) {
        $this->errors['language'] = "Please enter the language of the book";
    }

    if (empty($data['license_type'])) {
        $this->errors['license_type'] = "Please select the license type of the book";
    }
    
    if (empty($data['publisher'])) {
        $this->errors['publisher'] = "Please provide a value for the publisher.";
    } else if (!is_string($data['publisher'])) {
        $this->errors['publisher'] = "The publisher should be a string.";
    }
    if (empty($data['publish_date'])) {
        $this->errors['publish_date'] = "Please provide a value for the publish_date.";
    } else if (!DateTime::createFromFormat('Y-m-d', $data['publish_date'])) {
        $this->errors['publish_date'] = "The publish_date should be a date in 'Y-m-d' format.";
    }
    if (empty($data['description'])) {
        $this->errors['description'] = "Please provide a value for the description.";
    } else if (strlen($data['description']) < 10 || strlen($data['description']) > 1000) {
        $this->errors['description'] = "The description should be between 10 and 1000 characters long.";
    }

    if (empty($data['book_cover'])) {
        $this->errors['book_cover'] = "Please provide a value for the cover_image.";
    }
    if (empty($data['file'])) {
        $this->errors['file'] = "Please provide a value for the file.";
    }
    if (empty($_POST['category'])) {
        $this->errors['category'] = "Please select at least one category.";
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

    public function view_ebook_details($data)
    {
        $keys = array_keys($data);
        $query = "SELECT b.*, a.author_name, b.id bid, GROUP_CONCAT(c.category_id) cats FROM " . $this->table . " AS b LEFT JOIN authors AS a ON b.author_id = a.id LEFT OUTER JOIN ebook_category c ON c.ebook_id = b.id where ";
        foreach ($keys as $key) {
            $query .= $key . "=:" . str_replace('.', '', $key) . " && ";
        }

        $query = trim($query, "&& ");
        $query .= " group by b.id order by id desc limit 1";
        // echo $query;
        // print_r($data);
        // die;
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
        $query = "SELECT b.*, a.author_name, b.id bid FROM ebooks AS b LEFT JOIN authors AS a ON b.author_id = a.id LEFT OUTER JOIN ebook_category c ON c.ebook_id = b.id ";

        if ($data) {
            $query .= "where librarian_id =:user_id";
        }

        $query .= " group by b.id order by id desc";
        // print_r($data);
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

    public function get_review($data){
        
        
        $query =  "SELECT reviews.*, users.username, users.user_image
        FROM `reviews`
        INNER JOIN `users` ON reviews.userID = users.id
        WHERE reviews.ebookID = :ebook_id;
        ";
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

    public function is_borrowed($data){
        // print_r($data);
        // die;
        
        $query =  "SELECT * FROM borrowed_ebooks WHERE ebook_id = :ebook_id AND user_id = :user_id";
        // echo $query;
        // print_r($data);
        // die;
        $res = $this->query($query, $data);
        
            
        if (is_array($res) && count($res) > 0) {
            return true;
        }else{
            return false;
        }
    
        
       
       
    }
    public function add_borrowed($data){
        // print_r($data);
        // die;
        
        $query =  "INSERT INTO borrowed_ebooks (ebook_id, user_id) VALUES (:ebook_id, :user_id)";
        // echo $query;
        // print_r($data);
        // die;
        $res = $this->query($query, $data);
        
            
        if (is_array($res) && count($res) > 0) {
            return true;
        }else{
            return false;
        }
    
        
       
       
    }
}
