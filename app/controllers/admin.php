<?php

class  Admin extends Controller
{
    private function check_auth()
    {
        if (!Auth::logged_in()) {
            message('Please login to view the admin section');
            redirect('login');
        }
    }
    public function index()
    {
        // $users = new user();
        // $users->insert($data);
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = 'Dashboard';
        $this->view('admin/dashboard', $data);
    }

    public function dashboard()
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id' => $id]);
        $data['title'] = 'Dashboard';
        $this->view('admin/dashboard', $data);
    }

    public function profile()
    {
       // $user = new User();
       // $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        //$data['title'] = "Profile";
       // $this->view('admin/profile', $data);

       $this->check_auth();
       $id = $id ?? Auth::getId();
       // $user = new User();
       // $data['row'] = $user->first(['id' => $id]);
       // echo $id;
       $admin = new Member_model();
       $data['provinces'] = $admin->getProvinces();
       $data['cities'] = $admin->getCities();
       $data['row'] = $row = $admin->view_member_details(['id' => $_SESSION['USER_DATA']->id]);
       if($row->role !== "admin"){
           message('Please login to view the admin section');
           redirect('login');
       }
       $data['title'] = 'Profile';
       $this->view('admin/profile', $data);
       
    
    }

    public function edit()
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $admin = new Member_model();
        
        $data['provinces'] = $admin->getProvinces();
        $data['cities'] = $admin->getCities();
        // print_r($data['provinces']);
        // die;
        $data['row'] = $row = $admin->view_member_details(['id' => $_SESSION['USER_DATA']->id]);
        // print_r($row);
        // die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
            
            $folder = "uploads/images/";
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
                file_put_contents($folder . "index.php", "<? // silence");
                file_put_contents("uploads/index.php", "<? // silence");
            }
            // print_r($_POST);
            // die;
            if ($admin->edit_validate($_POST, $id)) {
                
                if (!is_numeric($_POST['province'])) {
                    unset($_POST['province']);
                }
                if (isset($_POST['city']) and !is_numeric($_POST['city'])) {
                    unset($_POST['city']);
                }
                // print_r($_POST);
                // die;
                
                $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!empty($_FILES['image']['name'])) {
                    if ($_FILES['image']['error'] == 0) {
                        if (in_array($_FILES['image']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                            $_POST['user_image'] = $destination;
                            if (file_exists($row->user_image != 'uploads/default.png' && $row->user_image)) {
                                unlink($row->user_image);
                            }
                        } else {
                            $admin->errors['user_image'] = "This file type is not allowed";
                        }
                    } else {
                        $admin->errors['user_image'] = "Could not upload image";
                    }
                };
                
                // Only update and redirect if there are no errors
                if (empty($admin->errors)) {
                    $_POST['userID'] = $id;
                    // print_r($row);
                    $admin->update_by_column($row->userID, $_POST);
                    
                    message("Profile saved successfully");
                    redirect("admin/edit/" . $id);
                }
            }
            // else{
            //     echo "something went wrong..1";
            //     die;
            // }
        }
        $data['title'] = 'Edit Profile';
        $data['errors'] = $admin->errors;
        
        $this->view('admin/edit', $data);
    }
  

    public function change_password()
    {
        // Fetch the current user
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $row = $user->first(['id' => $id]);
        echo $_SERVER['REQUEST_METHOD'];
        // Check if the user exists
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
            // Verify the current password
            if (password_verify($_POST['current_pass'], $row->password)) {
                // Check if the new password and confirm password match
                if ($_POST['new_pass'] == $_POST['confirm_pass']) {
                    // Hash the new password
                    $hashed_password = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);

                    // Update the user's password
                    $user->update($row->id, ['password' => $hashed_password]);

                    // Redirect or display a success message
                    message("Password changed successfully");
                    redirect("admin/change_password/" . $row->id);
                } else {
                    $user->errors['confirm_pass'] = "New password and confirm password do not match";
                }
            } else {
                $user->errors['current_pass'] = "Current password is incorrect";
            }
        } else {
            $user->errors['username'] = "User not found";
        }

        // If there were errors, display them
        if (!empty($user->errors)) {
            $data['errors'] = $user->errors;
            $this->view('admin/change_password', $data);
        }
    }

    public function courierAdd()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "CourierAdd";
        $this->view('admin/courierAdd', $data);

        
        
    }

    
   /* public function courierDetails()
    {
        $librarian = new User();
        $data['row'] = $librarian->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "courierDetails";
        $this->view('admin/courierDetails', $data);
    }*/


    /*public function librarianDetails()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "librarianDetails";
        $this->view('admin/librarianDetails', $data);
    }*/

    public function addLibrarian()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "addLibrarian";
        $this->view('admin/addLibrarian', $data);
    }

    public function courierDetails($action = null, $id = null)
    {
        $data = [];

        if (!Auth::logged_in()) {
            message('please login to view the books');
            redirect('login');
        }

        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        // show($data['row']);
        // die;

        $courier = new Courier;


        $data['action'] = $action;
        $data['id'] = $id;

        $user_id = $_SESSION['USER_DATA']->id;

        if ($action == 'add') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
                if ($courier->validate($_POST)) {
                    $courier->insert($_POST);
                    message("Courier added successfully");
                    redirect('admin/courierDetails');
                   
                    
                }
            }
        } elseif ($action == 'edit') {

            $data['book_details'] = $book->view_book_details(['b.id' => $id]);
            // show($data['row']);
            // die;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // show($_FILES);
                // die;
                $folder = "uploads/books/";

                $auth_data = $author->like(['author_name' => $_POST['author']]);
                // show($auth_data);
                if ($auth_data) {
                    $_POST['author_id'] = $auth_data->id;
                    $author_verify = 1;
                } else {
                    $auth_det = [];
                    $auth_det["author_name"] = $_POST['author'];
                    if ($author->validate($auth_det)) {
                        $author_verify = 1;
                        $auth_res = $author->insert($auth_det);
                        $_POST['author_id'] = $auth_res;
                        // print_r($auth_res);
                    }
                }

                unset($_POST['author']);

                $allowed = ['image/jpeg', 'image/png'];

                if (!empty($_FILES['book_image']['name'])) {
                    if ($_FILES['book_image']['error'] == 0) {
                        if (in_array($_FILES['book_image']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['book_image']['name'];
                            move_uploaded_file($_FILES['book_image']['tmp_name'], $destination);
                            resize_image($destination);
                            // echo $destination;
                            // die;
                            $_POST['book_image'] = $destination;
                        } else {
                            $book->errors['book_image'] = "This file type is not allowed";
                        }
                    } else {
                        $book->errors['book_image'] = "Could not upload image";
                    }
                }

                if ($courier->validate($_POST)) {

                    $courier->insert($_POST);
                    message("Courier added successfully");
                    redirect('admin/courierDetails');
                   

                  }
                    if ($author_verify && $book_verify) {
                        message("book updated successfully");
                        redirect('admin/courierDetails');
                    }
                }
            }
         elseif ($action == 'delete') {
            $courier->delete($id);
            message("book deleted successfully");
            redirect('admin/courierDetails');
        } else {
            // $user_books = [];
            // $user_books['user_id'] = $_SESSION['USER_DATA']->id;
            // $data['books'] = $book->view_all($user_books);
            // show($data['books']);
            // die;
        }




        $data['errors'] = $courier->errors;

        // $data['errors'] = array_merge($data['errors'], $author->errors);

        $this->view('admin/courierDetails', $data);
    }

    public function librarianDetails($action = null, $id = null)
    {
        $data = [];

        if (!Auth::logged_in()) {
            message('please login to view the books');
            redirect('login');
        }

        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        // show($data['row']);
        // die;

        $librarian = new Librarian_model;


        $data['action'] = $action;
        $data['id'] = $id;

        $user_id = $_SESSION['USER_DATA']->id;

        if ($action == 'add') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              
                if ($librarian->edit_validate($_POST,$id)) {
                    $librarian->insert($_POST);
                    message("Courier added successfully");
                    redirect('admin/librarianDetails');
                   
                    
                }
            }
        } /*elseif ($action == 'edit') {

            $data['book_details'] = $book->view_book_details(['b.id' => $id]);
            // show($data['row']);
            // die;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // show($_FILES);
                // die;
                $folder = "uploads/books/";

                $auth_data = $author->like(['author_name' => $_POST['author']]);
                // show($auth_data);
                if ($auth_data) {
                    $_POST['author_id'] = $auth_data->id;
                    $author_verify = 1;
                } else {
                    $auth_det = [];
                    $auth_det["author_name"] = $_POST['author'];
                    if ($author->validate($auth_det)) {
                        $author_verify = 1;
                        $auth_res = $author->insert($auth_det);
                        $_POST['author_id'] = $auth_res;
                        // print_r($auth_res);
                    }
                }

                unset($_POST['author']);

                $allowed = ['image/jpeg', 'image/png'];

                if (!empty($_FILES['book_image']['name'])) {
                    if ($_FILES['book_image']['error'] == 0) {
                        if (in_array($_FILES['book_image']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['book_image']['name'];
                            move_uploaded_file($_FILES['book_image']['tmp_name'], $destination);
                            resize_image($destination);
                            // echo $destination;
                            // die;
                            $_POST['book_image'] = $destination;
                        } else {
                            $book->errors['book_image'] = "This file type is not allowed";
                        }
                    } else {
                        $book->errors['book_image'] = "Could not upload image";
                    }
                }

                if ($librarian->edit_validate($_POST,$id)) {

                    $librarian->insert($_POST);
                    message("Courier added successfully");
                    redirect('admin/librarianDetails');
                   

                  }
                    if ($author_verify && $book_verify) {
                        message("book updated successfully");
                        redirect('admin/librarianDetails');
                    }
                }
            }
         elseif ($action == 'delete') {
            $courier->delete($id);
            message("book deleted successfully");
            redirect('admin/librarianDetails');
        } else {
            // $user_books = [];
            // $user_books['user_id'] = $_SESSION['USER_DATA']->id;
            // $data['books'] = $book->view_all($user_books);
            // show($data['books']);
            // die;
        }*/




        $data['errors'] = $librarian->errors;

        // $data['errors'] = array_merge($data['errors'], $author->errors);

        $this->view('admin/librarianDetails', $data);
    }


   
}



    