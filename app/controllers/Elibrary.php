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
    public function subscription()
    {

        $data['title'] = 'subscription';
        $this->view('Elibrary/subscription', $data);
    }


    public function ebooks()
    {
        $cats = new Category;
        $book_categ = new EBook_category;
        $data['title'] = 'E - Books';
        $data['categories'] = $cats->getCategs();

        $cats = [];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            if (isset($_GET["category_id"])) {
                $cats['c.category_id'] = $_GET['category_id'];
            }
            $data['ebooks'] = $book_categ->get_ebook_data($cats);
            // show($data['ebooks']);
            // die;
        }


        // show($data['ebooks']);
        // die;

        // $data['ebooks'] = array_filter($data['ebooks'], function($book) {
        //     return $book->copyright_status == 1;
        // });
        

        $this->view('elibrary/ebooks', $data);
    }

    public function view_ebook($id)
    {
        
        $ebook = new Ebook;
        $member = new Member_model();
        $category = new Ebook_category();
        $review = new Ebook_review();
        if (Auth::logged_in()) {
            $data['user'] = $row = $member->view_member_details(['id' => $_SESSION['USER_DATA']->id]);
            $isborrowed = $ebook->is_borrowed(["ebook_id"=> $id, "user_id"=>$_SESSION['USER_DATA']->id]);
            
            $data['reviews']['all'] =$review->get_review(["ebook_id"=>$id]);
            $data['reviews']['average_rating'] = number_format($review->get_average_rating(["ebook_id"=>$id]), 1);
            $data['reviews']['count'] = $review->get_review_count(["ebook_id"=>$id]);
            $data['reviews']['rating_count'] = $review->get_rating_counts(["ebook_id"=>$id]);
            $data['reviews']['user_review'] = $review->get_user_review(["ebook_id"=>$id, "user_id"=>$_SESSION['USER_DATA']->id]);
            $data['is_borrowed'] =  $isborrowed;
            
        }
        $data['row'] = $row = $ebook->view_ebook_details(['b.id' => $id]);
        

        $data['title'] = 'E - book details';


        $this->view('elibrary/ebook_details', $data);
    }

    public function borrow_ebook($id)
    {
        
        $ebook = new Ebook;
        $member = new Member_model();
        if (Auth::logged_in()) {
            
           
        }
        $data['row'] = $row = $ebook->view_ebook_details(['b.id' => $id]);
        
        // $row->cats = $category->

        $data['title'] = 'E - book details';

       
       
        // print_r($data);
        // die;

        $this->view('elibrary/ebook_reader', $data);
    }
    public function pdf_poxy($id=null)
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $pdfUrl = $_GET['url'];
            // Set the appropriate headers for a PDF file and CORS
            header('Content-Type: application/pdf');
            header('Access-Control-Allow-Origin: *'); // Allow requests from any origin (replace '*' with specific origins if needed)

            // Proxy the request to fetch the PDF file and output it
            readfile($pdfUrl);
        }

    }

    public function ebook_url($id=null)
    {
        $ebook = new Ebook;
        $pdfUrl = $ebook->get_file(["book_id"=>$id])->file;
        $pdfUrl = ROOT . '/' . $pdfUrl;


        // Output the PDF URL as JavaScript code
        echo "var pdfUrl = '$pdfUrl';";

    }




   
    
}
