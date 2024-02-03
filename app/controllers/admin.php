<?php

class  Admin extends Controller
{
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



    