<?php

class Member extends Controller
{
    private function check_auth()
    {
        if (!Auth::logged_in()) {
            message('Please login to view the member section');
            redirect('login');
        }
    }

    public function index()
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = 'Dashboard';
        $this->view('member/dashboard', $data);
    }
    
    public function profile($id = null)
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        // $user = new User();
        // $data['row'] = $user->first(['id' => $id]);
        // echo $id;
        $member = new Member_model();
        $data['provinces'] = $member->getProvinces();
        $data['cities'] = $member->getCities();
        $data['row'] = $row = $member->view_member_details(['id' => $_SESSION['USER_DATA']->id]);
        if($row->role !== "member"){
            message('Please login to view the member section');
            redirect('login');
        }
        $data['title'] = 'Profile';
        $this->view('member/profile', $data);
    }

    public function borrow($id=null)
    {
        // echo "yes";
        // die;
        $this->check_auth();
        // $data["id"] = $id = $_SESSION['USER_DATA']->id;
        $user = new User();
        $user_id = $user->first(['id' => $_SESSION['USER_DATA']->id])->id;
        // print_r($id);
        // die;
        $ebook = new EBook;
        $data['row'] =$row= $ebook->add_borrowed(['ebook_id' => $id, 'user_id' => $user_id]);
    
        redirect("elibrary/view_ebook/" . $id);
       
    }

    public function change_subscription($id = null)
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        // $user = new User();
        // $data['row'] = $user->first(['id' => $id]);
        // echo $id;
        $member = new Member_model();
        $data['row'] = $row = $member->view_member_details(['id' => $_SESSION['USER_DATA']->id]);
        // print_r($data);
        // die;
        $data['title'] = 'Change Subscription';
        $this->view('member/change_subscription', $data);
    }

    

    public function add_review($id=null)
    {
        // echo "yes";
        // die;
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $member = new Member_model();
        $ebook = new EBook;
        $data['row'] =$row= $ebook->view_ebook_details(['b.id' => $id]);
        // print_r($data);
        // die;
        
        // $data['ebook'] = $ebook->first_by_column(['ebookID' => ]);
        // $data['row'] = $row = $member->first_by_column(['id' => $_SESSION['USER_DATA']->id]);
        // print_r($_POST);
        // die;
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
            $_POST["ebook_id"] = $id;
            $_POST["user_id"] =  $_SESSION['USER_DATA']->id;
            // print_r($_POST);
            // die;
            $title = $_POST['title'];
            $title = filter_var($title, FILTER_SANITIZE_STRING);
            $description = filter_var($title, FILTER_SANITIZE_STRING);
            $description = $_POST['description'];
            $rating = $_POST['rating'];
            $rating = filter_var($title, FILTER_SANITIZE_STRING);
            if($member->vertify_review(["ebook_id"=>$_POST["ebook_id"],"user_id"=>$_POST["user_id"]])){
                if(isset($_POST["submit"])) {
                    unset($_POST["submit"]);
                }
                
                $member->addReview($_POST);
                message("Review added.");
                redirect("elibrary/view_ebook/" . $id);
                
                
            }
        }
        $data['title'] = 'Add review';
        $data['errors'] = $member->errors;
        // print_r($data['errors']);
        // die;
        message("Your review already added.");
        redirect("elibrary/view_ebook/" . $id);
    }

   

    public function edit()
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $member = new Member_model();
        
        $data['provinces'] = $member->getProvinces();
        $data['cities'] = $member->getCities();
        // print_r($data['provinces']);
        // die;
        $data['row'] = $row = $member->view_member_details(['id' => $_SESSION['USER_DATA']->id]);
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
            if ($member->edit_validate($_POST, $id)) {
                
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
                            $member->errors['user_image'] = "This file type is not allowed";
                        }
                    } else {
                        $member->errors['user_image'] = "Could not upload image";
                    }
                };
                
                // Only update and redirect if there are no errors
                if (empty($member->errors)) {
                    $_POST['userID'] = $id;
                    // print_r($row);
                    $member->update_by_column($row->userID, $_POST);
                    
                    message("Profile saved successfully");
                    redirect("member/edit/" . $id);
                }
            }
            // else{
            //     echo "something went wrong..1";
            //     die;
            // }
        }
        $data['title'] = 'Edit Profile';
        $data['errors'] = $member->errors;
        
        $this->view('member/edit', $data);
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
        $this->view('member/dashboard', $data);
    }

    public function borrowing()
    {
        $this->check_auth();
        $id = $id ?? Auth::getId();
        $user = new User();
        $data['row'] = $user->first(['id' => $id]);
        $data['title'] = 'My Borrowing';
        $this->view('member/borrowing', $data);
    }


    public function books($action = null, $id = null)
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

        $book = new Book;

        $author = new Author;

        $book_categ = new Book_category;


        $data['action'] = $action;
        $data['id'] = $id;

        $user_id = $_SESSION['USER_DATA']->id;

        $data['categories'] = $book->categories();

        $author_verify = 0;
        $book_verify = 0;
        // $category_verify = 0;

        if ($action == 'add') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST['user_id'] = $user_id;

                // print_r($_POST);
                $folder = "uploads/books/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . "index.php", "<h2>Access denied!</h2>");
                    file_put_contents("uploads/index.php", "<h2>Access denied!</h2>");
                }

                $auth_data = $author->like(['author_name' => $_POST['author']]);
                // show($auth_data);
                if ($auth_data) {
                    $_POST['author_id'] = $auth_data->id;
                    $author_verify = 1;
                } else {
                    $auth_det = [];
                    $auth_det["author_name"] = toCamelCase($_POST['author']);
                    if ($author->validate($auth_det)) {
                        $author_verify = 1;
                        $auth_res = $author->insert($auth_det);
                        $_POST['author_id'] = $auth_res;
                        // print_r($auth_res);
                    }
                }

                unset($_POST['author']);

                $allowed = ['image/jpeg', 'image/png'];
                // show($_FILES);

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


                    $book_res = $book->insert($_POST);

                    // if ($book_res) {
                    //     echo "success";
                    // } else {
                    //     echo "failure";
                    // }
                    // // show($book_res);
                    // echo $book_res;
                    $book_verify = 1;

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
                        message("book added successfully");
                        redirect('member/books');
                    }
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
        } elseif ($action == 'delete') {
            $book->delete($id);
            message("book deleted successfully");
            redirect('member/books');
        } else {
            $user_books = [];
            $user_books['user_id'] = $_SESSION['USER_DATA']->id;
            $data['books'] = $book->view_all($user_books);
            // show($data['books']);
            // die;
        }




        $data['errors'] = $book->errors;

        $data['errors'] = array_merge($data['errors'], $author->errors);

        $this->view('member/books', $data);
    }

    
}
