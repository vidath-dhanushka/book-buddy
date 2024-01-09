<?php

class Member extends Controller{
    public function index(){
        $data['title'] = 'Dashboard';
        $this->view('404', $data);

    }

    public function profile(){
        $data['title'] = 'Profile';
        $this->view('member/profile', $data);

    }

    public function books($action = null, $id = null){
        if(!Auth::logged_in()){
            message('please login to view the books');
            redirect('login');
        }

        $book = new Book;

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        
        $data['categories'] = $book->categories();
        

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($book->validate($_POST)){

                $book->insert($_POST);
                if($action == 'add'){
                    message("book added successfully");
                }elseif($action == 'edit'){
                    message("book updated successfully");
                }
                redirect('member/books');
            }
        }

        $this->view('member/books', $data);
    }

  

    
}