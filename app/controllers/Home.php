<?php

class Home extends Controller{
    function index(){
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