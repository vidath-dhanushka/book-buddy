<?php

class Courier extends Controller
{
    public function index()
    {
        // $users = new user();
        // $users->insert($data);
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = 'Dashboard';
        $this->view('courier/dashboard', $data);
    }

    public function ongoing()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "Ongoing orders";
        $this->view('courier/ongoing', $data);
    }

    public function completed()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "Completed orders";
        $this->view('courier/completed', $data);
    }
    public function transactions()
    {
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = "Transactions";
        $this->view('courier/transactions', $data);
    }
}
