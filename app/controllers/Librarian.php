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
                        $data['c_status ']= 0;
                        message("book added successfully");
                        redirect('librarian/ebooks');
                    }

                    
                    
                   
                }
                // print_r($book->errors);
                // die;
                   
            }
               
        }

        elseif ($action == 'edit') {
            $data['book_details'] = $bookDetails= $book->view_ebook_details(['b.id' => $id]);
            // print_r($data['book_details']);
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // print_r($_POST);
                // Check if the author exists or insert a new one
                $auth_data = $author->like(['author_name' => $_POST['author_name']]);
                if ($auth_data) {
                    $_POST['author_id'] = $auth_data->id;
                    $author_verify = 1;
                } else {
                    $auth_det = [];
                    $auth_det["author_name"] = $_POST['author_name'];
                    if ($author->validate($auth_det)) {
                        $author_verify = 1;
                        $auth_res = $author->insert($auth_det);
                        $_POST['author_id'] = $auth_res;
                    }
                }
        
                // unset($_POST['author_name']);
        
                // Handle book image upload
                $folder = "uploads/books/";
                $allowed = ['image/jpeg', 'image/png'];
            
                if (!empty($_FILES['book_cover']['name'])) {
                    if ($_FILES['book_cover']['error'] == 0) {
                        if (in_array($_FILES['book_cover']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['book_cover']['name'];
                            move_uploaded_file($_FILES['book_cover']['tmp_name'], $destination);
                            resize_image($destination);
                            $_POST['book_cover'] = $destination;
                        } else {
                            $book->errors['book_cover'] = "This file type is not allowed";
                        }
                    } else {
                        $book->errors['book_cover'] = "Could not upload image";
                    }
                }else if(!empty($data['book_details']->book_cover)){
                    $_POST['book_cover'] = $data['book_details']->book_cover ;
                }
        
                // Handle ebook upload
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
        
                    if ($_FILES['file']['error'] == 0) {
                        $fileSize = $_FILES['file']['size'];
                        $maxSize = 5 * 1024 * 1024; // 5 MB
        
                        if ($fileSize > $maxSize) {
                            $book->errors['file'] = "File is too large. Maximum file size is 5 MB.";
                        } else if (in_array($_FILES['file']['type'], $allowed)) {
                            $destination = $folder . time() . $_FILES['file']['name'];
                            move_uploaded_file($_FILES['file']['tmp_name'], $destination);
                            $_POST['file'] = $destination;
                        } else {
                            $book->errors['file'] = "This file type is not allowed";
                        }
                    } else {
                        $book->errors['file'] = "Could not upload file";
                    }
                }else if(!empty($data['book_details']->file)){
                    $_POST['file'] = $data['book_details']->file ;
                }
                // print_r($_POST);
                // Validate and update the book details
                if ($book->ebook_info_validate($_POST)) {
                    $book_res = $data['book_details']->id;
                    foreach ($bookDetails as $key => $value) {
                        if (isset($_POST[$key]) && $_POST[$key] == $value) {
                            unset($data['book_details']->$key);
                            unset($_POST[$key]);
                        }
                    }
                    
                   
                    // print_r($data['book_details']);
                    
                    // Update book categories
                    $book_categ->categ_delete($data['book_details']->id);
                   
                    $category = $_POST['category'];
                    
                    if ($category) {
                        foreach ($category as $cat) {
                            $book_categ_details = [];
                            $book_categ_details['ebook_id'] = $data['book_details']->id;
                            $book_categ_details['category_id'] = $cat;
                            // print_r($book_categ_details);
                            $book_categ->insert($book_categ_details);
                        }

                        unset($_POST["category"]);
                    }
                    if(!empty($_POST)){
                        $book->update($book_res, $_POST);
                    }
                    if ($author_verify && $book_res) {
                        message("Book updated successfully");
                        redirect('librarian/ebooks');
                    }
                }
            }
        }
        elseif ($action == 'delete') {
            $book->delete($id);
            message("book deleted successfully");
            redirect('librarian/ebooks');
        }

        else {
            $user_books = [];
            $user_books['user_id'] = $_SESSION['USER_DATA']->id;
            
            $data['books'] = $book->view_all($user_books);
            
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
        $copyright = new Copyright;
        $subscription = new Subscription;
        $book = new Ebook;
        $data['row'] = $row =  $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['action'] = $action;

       
        if ($action == 'add') {
            if(empty($id)){
                $this->view("librarians/ebooks");
            }
            else{
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    // print_r($_POST);
                    if (!empty($_FILES['agreement']['name'])) {
                    
                        $allowed = [
                            'application/pdf', // PDF format
                            'application/msword', // DOC format
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // DOCX format
                            'text/plain'
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
                                $copyright->errors['agreement'] = "File is too large. Maximum file size is 5 MB.";
                            } else if (in_array($_FILES['agreement']['type'], $allowed)) {
                                $destination = $folder . time() . $_FILES['agreement']['name'];
                                move_uploaded_file($_FILES['agreement']['tmp_name'], $destination);
                    
                                $_POST['agreement'] = $destination;
                    
                            } else {
                                $copyright->errors['agreement'] = "This file type is not allowed";
                            }
                        } else {
                            $copyright->errors['agreement'] = "Could not upload file";
                        }
                    }
                   
                    $_POST['ebook_id'] = $id;
                    // print_r($_POST);
                    if($copyright->validate($_POST)){
                        $sub_data = $subscription->like(['name' => $_POST['subscription']]);
                        $_POST['subscription'] = $sub_data->id;
                        // print_r($_POST);
                        $copyright->insert($_POST);
                    }

                    if(empty($copyright->erorors)){
                        $book->update($id, ["copyright_status"=>1]);
                        message("copyright added successfully");
                        redirect('librarian/ebooks');
                    }
                }
            }
            
        }else if($action == 'edit'){
            // something
        }else{
            //something
        }
    //    print_r($copyright->errors);
       $data['errors'] = $copyright->errors;
       $this->view('librarians/copyright_permission', $data);
    }



    public function profile($id = null)
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id' => $id]);
        // echo $id;
        // print_r($_SESSION);
        // die;
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
                    die;
                   
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

    

        
    }
    $this->view('librarians/subscription', $data);


    
}

    


   
}
