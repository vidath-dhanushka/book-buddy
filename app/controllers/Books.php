<?php

class Books extends Controller
{
    public function index()
    {
        $cats = new Category;
        $book_categ = new Book_category;
        $data['title'] = 'Books';
        $data['categories'] = $cats->getCategs();

        $cats = [];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // echo 'hello';
            // show($_GET);
            // die;

            if (isset($_GET["category_id"])) {
                $cats['c.category_id'] = $_GET['category_id'];
            }
            $data['books'] = $book_categ->get_book_data($cats);
        }


        // show($data['books']);
        // die;

        $this->view('books', $data);
    }

    public function view_book($id)
    {
        $book = new Book;

        $data['title'] = 'book details';

        $data['row'] = $book->view_book_details(['b.id' => $id]);


        $this->view('book_details', $data);
    }
}
