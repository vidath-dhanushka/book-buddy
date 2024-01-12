<?php

class Member extends Controller{
    private function check_auth() {
        if(!Auth::logged_in()){
            message('Please login to view the member section');
            redirect('login');
        }
    }

    public function index(){
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = 'Dashboard';
        $this->view('member/dashboard', $data);
    }

    public function profile($id = null){
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        
        $data['title'] = 'Profile';
        $this->view('member/profile', $data);

    }

    public function edit(){
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $row = $user->first(['id'=>$id]);
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $row){
            
            $folder = "uploads/images/";
            if(!file_exists($folder)){
                mkdir($folder, 0777, true);
                file_put_contents($folder."index.php","<? // silence");
                file_put_contents("uploads/index.php","<? // silence");
            }
            if($user->edit_validate($_POST, $id)){
                $allowed = ['image/jpeg','image/png','image/jpg'];
                if(!empty($_FILES['image']['name'])){
                    if($_FILES['image']['error'] == 0){
                        if(in_array($_FILES['image']['type'], $allowed)){
                            $destination = $folder.time().$_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                            $_POST['user_image'] = $destination;
                            if(file_exists($row->user_image != 'uploads/default.png' && $row->user_image)){
                                unlink($row->user_image);
                            }
                        }else{
                            $user->errors['user_image'] = "This file type is not allowed";
                        }
                    }else{
                        $user->errors['user_image'] = "Could not upload image";
                    }
                };
                // Only update and redirect if there are no errors
                if(empty($user->errors)){
                    $user->update($id, $_POST);
                    message("Profile saved successfully");
                    redirect("member/edit/".$id);
                }
            }
            
           
      
    }
        $data['title'] = 'Edit Profile';
        $data['errors'] = $user->errors;
        $this->view('member/edit', $data);

    }

    public function change_password(){
        // Fetch the current user
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $row = $user->first(['id'=>$id]);
        echo $_SERVER['REQUEST_METHOD'];
        // Check if the user exists
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $row){
            // Verify the current password
            if(password_verify($_POST['current_pass'], $row->password)){
                // Check if the new password and confirm password match
                if($_POST['new_pass'] == $_POST['confirm_pass']){
                    // Hash the new password
                    $hashed_password = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
    
                    // Update the user's password
                    $user->update($row->id, ['password' => $hashed_password]);
    
                    // Redirect or display a success message
                    message("Password changed successfully");
                    redirect("member/change_password/".$row->id);
                }else{
                    $user->errors['confirm_pass'] = "New password and confirm password do not match";
                }
            }else{
                $user->errors['current_pass'] = "Current password is incorrect";
            }
        }else{
            $user->errors['username'] = "User not found";
        }
    
        // If there were errors, display them
        if(!empty($user->errors)){
            $data['errors'] = $user->errors;
            $this->view('member/change_password', $data);
        }
    }
    
    

    public function dashboard(){
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = 'Dashboard';
        $this->view('member/dashboard', $data);
    }

    public function borrowing(){
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = 'My Borrowing';
        $this->view('member/borrowing', $data);
    }


    public function books($action = null, $id = null){
        if(!Auth::logged_in()){
            message('please login to view the books');
            redirect('login');
        }

        $book = new Book;

        $data = [];
        $data['action'] = $action;
        $data['id'] = $id;
        
        $data['categories'] = $book->categories();
        

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($book->validate($_POST)){

                $book->insert($_POST);
                if($action == 'add'){
                    message("book added successfully");
                }elseif($action == 'edit'){
                    message("book updated successfully");
                }
                redirect('member/books');
            }
        }

        $this->view('member/books', $data);
    }
  
}