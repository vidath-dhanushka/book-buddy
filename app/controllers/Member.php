<?php

class Member extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->view('404', $data);
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $this->view('member/profile', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $this->view('member/edit', $data);
    }

    public function change_password()
    {
        $data['title'] = 'Change Password';
        $this->view('member/change_password', $data);
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $this->view('member/dashboard', $data);
    }

    public function borrowing()
    {
        $data['title'] = 'My Borrowing';
        $this->view('member/borrowing', $data);
    }


    public function books($action = null, $id = null)
    {
        if (!Auth::logged_in()) {
            message('please login to view the books');
            redirect('login');
        }

        $book = new Book;

        $author = new Author;

        $book_categ = new Book_category;

        $data = [];
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

            $data['row'] = $book->view_book_details(['b.id' => $id]);
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
