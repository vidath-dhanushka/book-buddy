<?php $this->view('includes/header') ?>
<?php if($data['type'] == 'book'): ?>
    <?php $this->view('includes/nav') ?>
<?php else: ?>
    <?php $this->view('Elibrary/includes/elib_nav', $data) ?>
<?php endif; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shoppingcart.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/modalpopup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>


<body>   
    <div class="c1ontainer">
        <div class="c1art">
        <?php if($data['cart_items']): ?>
            <?php foreach($data['cart_items'] as $cartItem): ?>
                <div class="b1ook">
                    <?php if($data['type'] == 'ebook'): ?>
                        <img src="<?= ROOT ?>/<?= $cartItem->book_cover ?>" alt="Book Image">
                    <?php else: ?>    
                        <img src="<?= ROOT ?>/assets/images/books/<?= $cartItem->book_image ?>" alt="Book Image">
                    <?php endif; ?> 
                    <div class="b1ook-details">
                        <h3><?= $cartItem->title ?></h3>
                        <!-- Display other details like author, price, etc. -->
                        <p><?= $cartItem->author_name ?></p>
                        <p></p>
                    </div>
                <?php if($data['type'] == 'ebook'): ?>
                    <div>
                        <a href="<?= ROOT ?>/elibrary/view_ebook/<?= $cartItem->book_id ?>"><button class="details-button">view details</button></a>
                    </div>
                <?php else: ?>
        
                <?php endif; ?> 
                
                <?php if($data['type'] == 'book'): ?>
                    <div>
                        <a href="<?= ROOT ?>/cart/remove/<?= $cartItem->book_id ?>"><button class="r1emove-button">Remove</button></a>
                    </div>
                <?php else: ?>
                    <div>
                        <a href="<?= ROOT ?>/ebookcart/remove/<?= $cartItem->book_id ?>"><button class="r1emove-button">Remove</button></a>
                    </div>
                <?php endif; ?> 
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <?php if($data['type'] == 'book'): ?>
                <h2>Your Cart is Empty</h2>
                <p>Add items to your cart to continue shopping.</p>
            <?php else: ?> 
                <h2>Your Favorites List is Empty</h2>
                <p>Add items to your favorites to easily find them later.</p>

            <?php endif; ?> 
            
        <?php endif; ?>
        </div>
    
    <?php if($data['type'] == 'book'): ?>
        <div class="c1heckout">
            <h2>Checkout</h2>
            <hr>
            <p>Total Items: 2</p>
            <p>Total Price: $25.00</p>
            <button id="checkoutButton">Proceed to Checkout</button>
        </div>
    <?php else: ?>
        
    <?php endif; ?>    


        <div id="checkoutModal" class="cart-modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <!-- Content to display items in the cart -->
                <h2>Cart Items</h2>
                <ul id="cartItemsList">
                    <!-- List of cart items will be populated dynamically using JavaScript -->
                </ul>
                <button id="confirmCheckout">Confirm</button>
            </div>
        </div>
    </div>

    <script src="<?= ROOT ?>/assets/js/modalpop.js"></script>


</body>
