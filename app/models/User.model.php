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
        }else
        if(!preg_match("/^[a-zA-Z ]+$/",$data['firstname'])){
            $this->errors['firstname'] = "first name can only have letters";
        }
        if(empty($data['lastname'])){
            $this->errors['lastname'] = "Please enter the last name";
        }else
        if(!preg_match("/^[a-zA-Z]+$/",$data['lastname'])){
            $this->errors['lastname'] = "last name can only have letters without spaces";
        }
        if(empty($data['username'])){
            $this->errors['username'] = "Please enter the username";
        }
        
        if(!filter_var($data['email'],  FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Please enter A valid email";
        }elseif($this->where(['email' =>$data['email']])){
            $this->errors['email'] = "email already exists";
        }
        if(empty($data['phone'])){
            $this->errors['phone'] = "Please enter the phone number";
        }else
        if(!preg_match('/^\+[0-9]{11}$/',$data['phone'])){
            $this->errors['phone'] = "please enter the number in international standards";
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