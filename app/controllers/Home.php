<?php

class Home extends Controller{
    public function index(){
        $db = new Database();
        $db->create_tables();
        // $users = new user();
        // $users->insert($data);

        $data['title'] = 'Home';
        $this->view('home', $data);
    }
}