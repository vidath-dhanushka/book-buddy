<?php

class User extends Model{
    protected $table = "users";
    public $errors = [];

    protected $allowedColumns = [
        'firstname',
        'lastname',
        'username',
        'email',
        'phone',
        'address',
        'password',
        'role'
    ];

    public function validate($data){
        $this-> errors = [];

        if(empty($data['firstname'])){
            $this->errors['firstname'] = "Please enter the first name";
        }
        if(empty($data['lastname'])){
            $this->errors['lastname'] = "Please enter the last name";
        }
        if(empty($data['username'])){
            $this->errors['username'] = "Please enter the username";
        }elseif($this->where(['username' =>$data['username']])){
            $this->errors['username'] = "username already exists";
        }
        
        if(!filter_var($data['email'],  FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Please enter A valid email";
        }elseif($this->where(['email' =>$data['email']])){
            $this->errors['email'] = "email already exists";
        }
        if(empty($data['phone'])){
            $this->errors['phone'] = "Please enter the phone number";
        }
        if(empty($data['address'])){
            $this->errors['address'] = "Please enter the address";
        }
        if(empty($data['password'])){
            $this->errors['password'] = "Please enter the password";
        }
        if($data['password'] !== $data['confirm_password']){
            $this->errors['password'] = "passwords
             do not match";
        }
        
        if(empty($this->errors)){
            return true;
        }

        return false;
    }

    
}