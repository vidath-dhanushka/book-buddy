<?php

class Home extends Controller{
    public function index(){
        if(!Auth::logged_in()){
            message('please login to view the admin section');
            redirect('login');
        }

        $data['title'] = 'Dashboard';
        $this->view('admin/dashboard', $data);
    }

    public function profile($id = null){
        if(!Auth::logged_in()){
            message('please login to view the admin section');
            redirect('login');
        }

    }
}