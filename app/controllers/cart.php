<?php

class Cart extends Controller
{
    public function index()
    {
        // $users = new user();
        // $users->insert($data);
        $user = new User();
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = 'view cart';
        $this->view('shoppingcart', $data);
    }
}