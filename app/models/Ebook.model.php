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
        'license_type',
        'copyright_status',
        'borrowing_time'
    ];

    private function isValidISBN($isbn) {
        $isbn = str_replace('-', '', $isbn);

        // Check if the ISBN is either 10 or 13 digits
        if (strlen($isbn) !== 10 && strlen($isbn) !== 13) {
            return false;
        }
    
        // For ISBN-10
        if (strlen($isbn) === 10) {
            if (!ctype_digit(substr($isbn, 0, -1))) {
                return false;
            }
            $checksum = 0;
            for ($i = 0; $i < 9; $i++) {
                $checksum += (int)$isbn[$i] * (10 - $i);
            }
            $checksum %= 11;
            $checksum = ($checksum == 10) ? 'X' : $checksum;
            return $checksum == $isbn[9];
        }
    
        // For ISBN-13
        if (strlen($isbn) === 13) {
            if (!ctype_digit(substr($isbn, 0, -1))) {
                return false;
            }
            $sum = 0;
            for ($i = 0; $i < 12; $i++) {
                $sum += (int)$isbn[$i] * (($i % 2 === 0) ? 1 : 3);
            }
            $checksum = (10 - ($sum % 10)) % 10;
            return $checksum == $isbn[12];
        }
    }

    private function validateEdition($edition) {
        // Check if the edition is a positive integer
        if (filter_var($edition, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)))) {
            return true;
        } else {
            return false;
        }
    }
    
    public function ebook_info_validate($data)
{
    
    $this->errors = [];
    $maxLength = 255;
    if (empty($data['title'])) {
        $this->errors['title'] = "Error: Title cannot be empty.";
    } else 
    if (strlen($data['title']) < 2) {
        $this->errors['title'] = "Error: Title should be at least 2 characters long.";
    } else
    if(strlen($data['title']) > $maxLength) {
        $this->errors['title'] =  "Error: Title cannot exceed " . $maxLength . " characters.";
    }

    if (isset($data['author_name'])) {
        if (!preg_match("/^[a-zA-Z-' .]*$/", $data["author_name"])) {
            $this->errors['author_name'] = "Error: Only letters, white space, hyphen, period, and apostrophe are allowed in author name";
        }
    }
    
    if (empty($data['pages'])) {
        $this->errors['pages'] = "Error: Number of pages cannot be empty.";
    }

    if (isset($data['subtitle']) && strlen($data['subtitle']) >$maxLength) {
        $this->errors['subtitle'] = "Error: The subtitle should not exceed 255 characters.";
    }
   
    if (isset($data['isbn']) && !$this->isValidISBN($data['isbn'])) {
        $this->errors['isbn'] = "Error: The ISBN format is invalid.";
    }
    if (isset($data['edtion']) && !$this->validateEdition($data['edtion'])) {
        $this->errors['isbn'] = "Error: The Edition format is invalid.";
    }
    
    if (empty($data['language'])) {
        $this->errors['language'] = "Error: Language cannot be empty.";
    }

    if (empty($data['license_type'])) {
        $this->errors['license_type'] = "Error: License Type cannot be empty.";
    }
    
    if (empty($data['publisher'])) {
        $this->errors['publisher'] = "Error: Publisher cannot be empty.";
    } 
    if (empty($data['publish_date'])) {
        $this->errors['publish_date'] = "Error: Please provide a value for the publish_date.";
    } else if (!DateTime::createFromFormat('Y-m-d', $data['publish_date'])) {
        $this->errors['publish_date'] = "Error: The publish_date should be a date in 'Y-m-d' format.";
    }
    if (empty($data['description'])) {
        $this->errors['description'] = "Error: Please provide a value for the description.";
    } else if (strlen($data['description']) < 10 || strlen($data['description']) > 1000) {
        $this->errors['description'] = "Error: The description should be between 10 and 1000 characters long.";
    }

    if (empty($data['book_cover'])) {
        $this->errors['book_cover'] = "Error: Please provide a value for the cover_image.";
    }
    if (empty($data['file'])) {
        $this->errors['file'] = "Error: Please provide a value for the file.";
    }
    if (empty($data['category'])) {
        $this->errors['category'] = "Error: Please select at least one category.";
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

    public function get_file($data){
        $query =  "SELECT `file` FROM `ebooks` WHERE `id` = :book_id;";
        $res = $this->query($query, $data);
        if (is_array($res)) {
            return $res[0];
        }else{
            return false;
        }
    }


    public function getNewlyAddedEbooks(){
        $query = "SELECT e.*, a.author_name, c.categories
        FROM ebooks e
        LEFT JOIN authors a ON e.author_id = a.id
        LEFT JOIN (
            SELECT ebook_id, GROUP_CONCAT(DISTINCT category_name) as categories
            FROM ebook_category ec
            LEFT JOIN categories c ON ec.category_id = c.id
            GROUP BY ebook_id
        ) c ON e.id = c.ebook_id
        WHERE e.copyright_status = 1
        ORDER BY e.date_added DESC
        LIMIT 10
        ";
        
        $res = $this->query($query);
        
        if (is_array($res) && count($res) > 0) {
            return $res;
        }
        
        return false;
    }

    public function fetchEbookCountByType()
    {
        $query = "SELECT b.license_type, COUNT(b.id) as book_count 
                  FROM ebooks AS b 
                  LEFT OUTER JOIN ebook_category c ON c.ebook_id = b.id 
                  GROUP BY b.license_type ORDER BY book_count DESC";
    
        $res = $this->query($query);
    
        if (is_array($res)) {
            return $res;
        }
    
        return false;
    }
    

    
    

}


