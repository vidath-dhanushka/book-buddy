<?php

class Elibrary extends Controller
{
    public function index()
    {
        // $db = new Database();
        // $db->create_tables();
        // $users = new user();
        // $users->insert($data);

        $data['title'] = 'Elibrary';
        $this->view('Elibrary/home', $data);
    }


    public function ebooks()
    {
        $cats = new Category;
        $book_categ = new Book_category;
        $data['title'] = 'E - Books';
        $data['categories'] = $cats->getCategs();

        $cats = [];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // echo 'hello';
            // show($_GET);
            // die;

            if (isset($_GET["category_id"])) {
                $cats['c.category_id'] = $_GET['category_id'];
            }
            $data['ebooks'] = $book_categ->get_ebook_data($cats);
        }


        // show($data['ebooks']);
        // die;

        $this->view('elibrary/ebooks', $data);
    }

    public function view_ebook($id)
    {
        
        $ebook = new Ebook;
        $member = new Member_model();
        $member_id = $member->first_by_column(['id' => $_SESSION['USER_DATA']->id])->id;
        
        $review = $ebook->get_review(["ebook_id"=>$id]);
        $isborrowed = $ebook->is_borrowed(["ebook_id"=>$id, "member_id"=>$member_id]);
       

        $data['title'] = 'E - book details';

        $data['row'] = $ebook->view_ebook_details(['b.id' => $id]);
        $data['reviews'] = $review;
        $data['is_borrowed'] =  $isborrowed;
        // print_r($data);
        // die;

        $this->view('elibrary/ebook_details', $data);
    }
}
