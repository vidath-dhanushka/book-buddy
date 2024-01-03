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

  

    
}