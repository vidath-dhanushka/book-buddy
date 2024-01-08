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

    public function edit(){
        $data['title'] = 'Edit Profile';
        $this->view('member/edit', $data);

    }

    public function change_password(){
        $data['title'] = 'Change Password';
        $this->view('member/change_password', $data);
    }

    public function dashboard(){
        $data['title'] = 'Dashboard';
        $this->view('member/dashboard', $data);
    }




    public function books($action = null, $id = null){
        if(!Auth::logged_in()){
            message('please login to view the books');
            redirect('login');
        }

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;

        $this->view('member/books', $data);
    }

  

    
}