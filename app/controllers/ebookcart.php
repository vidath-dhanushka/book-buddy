<?php

class Ebookcart extends Controller
{
    public function index()
    {
        // Check if the user is logged in
        if(isset($_SESSION['USER_DATA']) && is_object($_SESSION['USER_DATA']) && isset($_SESSION['USER_DATA']->id)) {
            $userCart = new Ebook_usercart();
            $data['cart_items'] = $userCart->getUserCartItems1($_SESSION['USER_DATA']->id);
        } else {
            $data['cart_items'] = []; // Empty cart for guests or users not logged in
        }

        // Load other data for the view
        $data['title'] = 'View Cart';
        $data['type'] = 'ebook';
        $this->view('shoppingcart', $data);
    }

    public function add_to_cart($id=null)
    {
        // Check if user is logged in
        if(isset($_SESSION['USER_DATA']) && is_object($_SESSION['USER_DATA']) && isset($_SESSION['USER_DATA']->id)) {
            $userCart = new Ebook_usercart();
            $user_id = $_SESSION['USER_DATA']->id;
            $book_id = esc($id);

            // Check if the item already exists in the user's cart
            $existingItem = $userCart->getUserCartItem($user_id, $book_id);

            if($existingItem) {
                //message("The book is already in your cart");
                // Update quantity if item exists
                //$userCart->updateCartItemQuantity($user_id, $book_id, $existingItem->quantity + 1);
            } else {
                // Add new item to cart
                $userCart->insertCartItem($user_id, $book_id);
                //message("Success! The book is added to your cart");
            }
            redirect('elibrary/view_ebook/'.$book_id);
        }         
    }

    public function remove($id='')
    {
        // Check if user is logged in
        if(isset($_SESSION['USER_DATA']) && is_object($_SESSION['USER_DATA']) && isset($_SESSION['USER_DATA']->id)) {
            $userCart = new Ebook_usercart();
            $user_id = $_SESSION['USER_DATA']->id;
            $book_id = esc($id);

            // Remove item from user's cart
            $userCart->removeCartItem($user_id, $book_id);
        }

        redirect("ebookcart");
    }

    public function get_cart_count()
    {
        if (isset($_SESSION['USER_DATA']) && is_object($_SESSION['USER_DATA']) && isset($_SESSION['USER_DATA']->id)) {
            $userCart = new Ebook_usercart();
            $cartCount = $userCart->getCartItemCount($_SESSION['USER_DATA']->id);
            echo json_encode(['cartCount' => $cartCount]);
        } else {
            echo json_encode(['cartCount' => 0]);
        }
    }

    

}