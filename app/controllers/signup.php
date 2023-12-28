<?php

class Signup extends Controller{
    function index(){
        $db = new Database();
        $db->create_tables();

        $data['title'] = 'Signup';
        $this->view('signup', $data);
    }
}