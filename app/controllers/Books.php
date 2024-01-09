<?php

class Books extends Controller
{
    public function index()
    {

        $data['title'] = 'Books';
        $this->view('books', $data);
    }

    public function view_book()
    {

        $data['title'] = 'book details';


        $this->view('book_details', $data);
    }
}
