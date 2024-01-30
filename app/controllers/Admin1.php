<?php

class Admin1 extends Controller{
    public function index(){
        $data['title'] = 'Dashboard';
        $this->view('404', $data);
    }

    public function profile(){
        $data['title'] = 'Profile';
        $this->view('admin/profile', $data);

    }


    public function dashboard(){
        $data['title'] = 'Dashboard';
        $this->view('admin/dashboard', $data);
    }

    public function addLibrarian(){
        $data['title'] = 'AddLibrarian';
        $this->view('admin/addLibrarian', $data);
    }
  
    public function librarianDetails(){
        $data['title'] = 'AddLibrarian';
        $this->view('admin/librarianDetails', $data);
    }
}