<?php

class Login extends Controller{
    public function index(){

        $user = new User;
        $data['errors'] = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $row = $user->first([
                'username'=>$_POST['username']
            ]);

            if($row){

                if(password_verify($_POST['password'], $row->password) && $_POST['username']===$row->username){
                    Auth::authenticate($row);
    
                    redirect('home');
                }
    
            }
        
            $data['errors']['password'] = 'Wrong username or password';
        }
        $data['title'] = 'Login';
        $this->view('login', $data);
    }
}