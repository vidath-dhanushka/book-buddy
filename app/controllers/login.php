<?php

class Login extends Controller{
    function index(){
       

        $data['title'] = 'Login';
        $this->view('login', $data);
    }
}