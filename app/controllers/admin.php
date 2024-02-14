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

    public function profile()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "Profile";
        $this->view('admin/profile', $data);
    }

    public function edit()
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $admin = new Member_model();
        
       
        $data['row'] = $row = $admin->first_by_column(['id' => $_SESSION['USER_DATA']->id]);
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
    public function courierDetails()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "courierDetails";
        $this->view('admin/courierDetails', $data);
    }


    public function librarianDetails()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "librarianDetails";
        $this->view('admin/librarianDetails', $data);
    }

    public function addLibrarian()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "addLibrarian";
        $this->view('admin/addLibrarian', $data);
    }
}



    