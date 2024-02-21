<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cart Confirmation</title>
<link rel="stylesheet" href="<?=ROOT?>/assets/css/addtocart.css">
</head>
<body>
<div class="confirmation">
    <h2>Book Added to Cart!</h2>
    <p>Your book has been successfully added to the cart.</p>
</div>

<div class="actions">
    <button onclick="goToCart()">Go to Cart</button>
    <button onclick="proceedToCheckout()">Proceed to Checkout</button>
</div>  

<script>
    function goToCart() {
        
        window.location.href = "cart.html";
    }

    function proceedToCheckout() {
        
        window.location.href = "checkout.html";
    }
</script>
</body>
</html>
