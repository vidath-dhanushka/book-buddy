<?php

class Home extends Controller{
    function index(){
        $db = new Database();
        // $users = new user();
        // $users->insert($data);

        $data['title'] = 'Home';
        $this->view('home', $data);
    }

    function edit(){
        echo "editting page";
    }

    function delete(){
        echo "deleting page";
    }
}