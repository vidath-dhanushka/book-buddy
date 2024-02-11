<?php

class Librarian extends Controller
{
    private function check_auth()
    {
        if (!Auth::logged_in()) {
            message('Please login to view the librarin section');
            redirect('login');
        }
    }

    public function index()
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $row =  $user->first(['id' => $_SESSION['USER_DATA']->id]);
        // print_r($row->role);
        // die;
        $data['title'] = 'Dashboard';
        $this->view('librarians/dashboard', $data);
    }

    


    public function ebooks($action = null, $id = null)
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $row = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['action'] = $action;
        
        $book = new Ebook;
        $author = new Author;
        $book_categ = new Ebook_category;
        
        $data['categories'] = $book->categories();
        $author_verify = 0;
        $book_verify = 0;

        if ($action == 'add') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (empty($_POST['isbn'])) {
                    $_POST['isbn'] = null; 
                }
                if (empty($data['subtitle'])) {
                    $data['subtitle'] = null;
                }
                
                if (empty($data['edition'])) {
                    $data['edition'] = null;
                }
               
                // print_r($book->errors);
                // die;
               
                $_POST['librarian_id'] = $row->id;
                unset($_POST['author']);
                
                // ebook upload 
                if (!empty($_FILES['file']['name'])) {
                    
                    $allowed = [
                        'application/epub+zip', // EPUB format
                        'application/pdf', // PDF format
                        'application/x-mobipocket-ebook', // MOBI format
                        'application/vnd.amazon.ebook' // AZW format
                      ];
                      $folder = "uploads/ebooks/file/";
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                        file_put_contents($folder . "index.php", "<h2>Access denied!</h2>");
                        file_put_contents("uploads/index.php", "<h2>Access denied!</h2>");
                    }
            
                    if ($_FILES['file']['error'] == 0 ) {
                        $fileSize = $_FILES['file']['size'];
                        $maxSize = 5 * 1024 * 1024; // 5 MB
                        if ($fileSize > $maxSize) {
                            $book->errors['file'] = "File is too large. Maximum file size is 5 MB.";
                        }else
                        if (in_array($_FILES['file']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['file']['name'];
                            move_uploaded_file($_FILES['file']['tmp_name'], $destination);
                           
                            $_POST['file'] = $destination;
                            
                        } else {
                            $book->errors['file'] = "This file type is not allowed";
                        }
                    } else {
                        $book->errors['file'] = "Could not upload file";
                    }
                }
                // end ebook upload

                // copyright agreement

                if (!empty($_FILES['agreement']['name'])) {
                    
                    $allowed = [
                        'application/pdf', // PDF format
                        'application/msword', // DOC format
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' // DOCX format
                    ];
                    $folder = "uploads/ebooks/agreement/";
                    if (!file_exists($folder)) {
                        mkdir($folder, 0777, true);
                        file_put_contents($folder . "index.php", "<h2>Access denied!</h2>");
                        file_put_contents("uploads/index.php", "<h2>Access denied!</h2>");
                    }
                
                    if ($_FILES['agreement']['error'] == 0 ) {
                        $fileSize = $_FILES['agreement']['size'];
                        $maxSize = 5 * 1024 * 1024; // 5 MB
                        if ($fileSize > $maxSize) {
                            $book->errors['agreement'] = "File is too large. Maximum file size is 5 MB.";
                        } else if (in_array($_FILES['agreement']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['agreement']['name'];
                            move_uploaded_file($_FILES['agreement']['tmp_name'], $destination);
                
                            $_POST['agreement'] = $destination;
                
                        } else {
                            $book->errors['agreement'] = "This file type is not allowed";
                        }
                    } else {
                        $book->errors['agreement'] = "Could not upload file";
                    }
                }
                

                // end copyright agreement

                // cover image
                $folder = "uploads/ebooks/cover/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . "index.php", "<h2>Access denied!</h2>");
                    file_put_contents("uploads/index.php", "<h2>Access denied!</h2>");
                }

                $allowed = ['image/jpeg', 'image/png'];

                if (!empty($_FILES['book_cover']['name'])) {
                    if ($_FILES['book_cover']['error'] == 0) {
                        if (in_array($_FILES['book_cover']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['book_cover']['name'];
                            move_uploaded_file($_FILES['book_cover']['tmp_name'], $destination);
                            resize_image($destination);
                            // echo $destination;
                            // die;
                            $_POST['book_cover'] = $destination;
                        } else {
                            $book->errors['book_cover'] = "This file type is not allowed";
                        }
                    } else {
                        $book->errors['book_cover'] = "Could not upload image";
                    }
                }

                // end cover image
        
                if ($book->ebook_info_validate($_POST) && empty($book->errors)){
                    // print_r($book->errors);
                    // die;
                    $auth_data = $author->like(['author_name' => $_POST['author_name']]);
                    
                    if ($auth_data) {
                       
                        $_POST['author_id'] = $auth_data->id;
                        $author_verify = 1;
                    } else {
                    
                        $auth_det = [];
                        $auth_det["author_name"] = toCamelCase($_POST['author_name']);
                        if ($author->validate($auth_det)) {
                            $author_verify = 1;
                            $auth_res = $author->insert($auth_det);
                            $_POST['author_id'] = $auth_res;
                           
                        }
                    }
                    
                    $book_res = $book->insert($_POST);
                    $book_verify = 1;
                   
                    
                    $category = $_POST['category'];
                    if ($category) {
                        foreach ($category as $cat) {
                            $book_categ_details = [];
                            $book_categ_details['ebook_id'] = $book_res;
                            $book_categ_details['category_id'] = $cat;
                            // print_r($book_categ_details);
                            $book_categ->insert($book_categ_details);
                        }
                    }
                  
                    if ($author_verify && $book_verify) {
                        message("book added successfully");
                        redirect('librarian/ebooks');
                    }

                    
                    
                   
                }
                // print_r($book->errors);
                // die;
                   
            }
               
        }

        elseif ($action == 'edit') {

            $data['book_details'] = $book->view_ebook_details(['b.id' => $id]);
            show($data['row']);
            die;
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

                if ($book->validate($_POST)) {


                    $book_res = $data['row']->id;
                    $book->update($data['row']->id, $_POST);

                    // if ($book_res) {
                    //     echo "success";
                    // } else {
                    //     echo "failure";
                    // }
                    // // show($book_res);
                    // echo $book_res;
                    $book_verify = 1;

                    $book_categ->categ_delete($data['row']->id);
                    // show($_POST['category']);
                    // die;
                    $category = $_POST['category'];
                    if ($category) {
                        foreach ($category as $cat) {
                            // echo "hi ";
                            // echo $cat;
                            $book_categ_details = [];
                            $book_categ_details['book_id'] = $book_res;
                            $book_categ_details['category_id'] = $cat;
                            $book_categ->insert($book_categ_details);
                        }
                    }
                    if ($author_verify && $book_verify) {
                        message("book updated successfully");
                        redirect('member/books');
                    }
                }
            }
        }

        else {
            $user_books = [];
            $user_books['user_id'] = $_SESSION['USER_DATA']->id;
            
            $data['books'] = $book->view_all($user_books);
            $data['books'][0]->c_status = 0;
            // show($data['books']);
            // die;
        }
       

        $data['categories'] = $book->categories();
        $data['title'] = 'E - BOOK';
        $data['errors'] = $book->errors;
       
       $this->view('librarians/ebooks', $data);
    }

    public function copyright($action = null, $id = null)
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $row =  $user->first(['id' => $_SESSION['USER_DATA']->id]);
       $this->view('librarians/copyright_permission', $data);
    }



    public function profile($id = null)
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id' => $id]);
        // echo $id;
        
        // print_r($data);
        // die;
        $data['title'] = 'Librarian | Profile';
        $this->view('librarians/profile', $data);
    }



    


    public function edit()
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        
       
        $data['row'] = $row = $user->first(['id' => $_SESSION['USER_DATA']->id]);
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
            if ($user->edit_validate($_POST, $id)) {
                
                $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!empty($_FILES['image']['name'])) {
                    // print_r($row);
                    // die;
                    if ($_FILES['image']['error'] == 0) {
                        if (in_array($_FILES['image']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                            $_POST['user_image'] = $destination;
                            if (file_exists($row->user_image != 'uploads/default.png' && $row->user_image)) {
                                unlink($row->user_image);
                            }
                        } else {
                            $user->errors['user_image'] = "This file type is not allowed";
                        }
                    } else {
                        $user->errors['user_image'] = "Could not upload image";
                    }
                };
            //    print_r($user->errors);
            //    die;
                // Only update and redirect if there are no errors
                if (empty($user->errors)) {
                    
                    // print_r($row);
                    // die;
                    $user->update($row->id, $_POST);
                    
                    message("Profile saved successfully");
                    redirect("librarian/edit/" . $id);
                }
            }
            // else{
            //     echo "something went wrong..1";
            //     die;
            // }
        }
        $data['title'] = 'Edit Profile';
        $data['errors'] = $user->errors;
        
        $this->view('librarians/edit', $data);
    }

    public function change_password()
    {
        // Fetch the current user
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $row = $user->first(['id' => $id]);
        // echo $_SERVER['REQUEST_METHOD'];
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
                    redirect("member/change_password/" . $row->id);
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
            $this->view('member/change_password', $data);
        }
    }



    public function dashboard()
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id' => $id]);
        $data['title'] = 'Dashboard';
        $this->view('librarians/dashboard', $data);
    }

   

    public function subscription($action = null, $id = null)
    {
        $data = [];

        if (!Auth::logged_in()) {
            message('please login to view the books');
            redirect('login');
        }

        $user = new User();
        $librarian = new Librarian_model();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        // show($data['row']);
        // die;

        $data['action'] = $action;
        $data['id'] = $id;

        $user_id = $_SESSION['USER_DATA']->id;

        if ($action == 'add') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($librarian->subscription_validate($_POST, $id)) {
                    $message = $_POST["description"];
                    echo nl2br(htmlspecialchars($message));
                   
                }
                
                
            }
        // } elseif ($action == 'edit') {

          
            //     if ($book->validate($_POST)) {


            //        
        //     }
        // } elseif ($action == 'delete') {
        //   
        // } else {
        //    
        // }




        $data['errors'] = $librarian->errors;

    

        $this->view('librarians/subscription', $data);
    }


    
}

    


   
}
