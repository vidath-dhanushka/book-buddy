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
        $user = new User();
        $category = new Book_category;
        $review = new Book_review();
        $data['title'] = 'book details';
        if (Auth::logged_in()) {
            $data['user'] =  $user->first(['id' => $_SESSION['USER_DATA']->id]);
            $data['reviews']['user_review'] = $review->get_user_review(["book_id"=>$id, "user_id"=>$_SESSION['USER_DATA']->id]);
        }
        $data['row'] = $book->view_book_details(['b.id' => $id]);
        $data['reviews']['all'] =$review->get_review(["book_id"=>$id]);
        $data['reviews']['average_rating'] = number_format($review->get_average_rating(["book_id"=>$id]), 1);
        $data['reviews']['count'] = $review->get_review_count(["book_id"=>$id]);
        $data['reviews']['rating_count'] = $review->get_rating_counts(["book_id"=>$id]);
        

        $data['row']->cats = $category->get_category_names($data['row']->cats);
       
      
       

        // show($data);
        // die;

        $this->view('book_details', $data);
    }
}
