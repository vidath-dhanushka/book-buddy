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

    public function add_to_cart($id=null)
    {
        // $users = new user();
        // $users->insert($data);
        $user = new User();
        // print_r($_SESSION);
        // die;
        $data['row'] = $user->first(['id' => $_SESSION['USER_DATA']->id]);
        $data['title'] = 'add to cart';
        $this->view('addtocart', $data);
    }
}