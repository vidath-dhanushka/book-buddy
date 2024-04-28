// Get the modal element and the button that opens it
const modal = document.getElementById('checkoutModal');
const checkoutBtn = document.getElementById('checkoutButton');

// When the user clicks the button, open the modal
checkoutBtn.addEventListener('click', () => {
    modal.style.display = 'block';
    // Call a function here to populate the cart items dynamically
    //alert('button clicked!');
    populateCartItems();
});

// Function to close the modal when the user clicks on the close button (×)
document.querySelector('.close').addEventListener('click', () => {
    modal.style.display = 'none';
});

// Function to populate cart items dynamically
function populateCartItems() {
    const cartItemsList = document.getElementById('cartItemsList');
    // Example: You can fetch cart items data using AJAX and then populate the list
    // Replace this with your actual code to fetch and populate cart items
    const cartItemsData = [
        { name: 'Item 1', quantity: 2 },
        { name: 'Item 2', quantity: 1 }
    ];
    cartItemsList.innerHTML = cartItemsData.map(item => `<li>${item.name} (${item.quantity})</li>`).join('');
}

// Function to handle checkout confirmation
document.getElementById('confirmCheckout').addEventListener('click', () => {
    // Add your code here to handle checkout confirmation, e.g., redirect to checkout page
    alert('Checkout confirmed! Redirecting to payment page.');
    // Example redirection (replace with your actual redirection code)
    window.location.href = 'checkout.php';
});
