<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<?php if(message()):?>
<div class="alert" id="hide"><?=message('', true)?></div>
<?php endif;?>
<div class="main-container">

    <section class="container-left">
    <img src="<?= ROOT ?>/assets/images/books/arrival_6.jpg">
        <!-- <img src="<?= ROOT . '/' . $data['row']->book_image; ?>"> -->
    </section>
    <section class="container-right">
        <br>
        <p class="book-title"><?= $data['row']->title; ?></p>
        <p>By <i><?= camelCaseToWords($data['row']->author_name); ?></i></p>
        <br>
        <!-- <h2>Description:</h2> -->
        <p class="description"><?= $data['row']->description; ?></p><br>
        <br>
        <div class="tags">
            <span>Fiction</span>
            <span>Horror</span>
            <span>Thriller</span>
        </div>
        <div>
            <button>Borrow Now</button>
            <button>Add to Cart</button>
        </div>
        
    </section>
</div>
<div class="review">
      <div class="review-header">
      <h1>User Review</h1>
      <img src="<?= ROOT ?>/assets/images/review.png" alt="add" id="myBtn" >
      
      <button class="cart-btn" id="more-btn">see more</button>
     

      </div>
      
      <div class="box-details-container">
        
      <?php if(!empty($reviews)) : ?>
        <?php foreach ($reviews as $review) : ?>
        <div class="box">
        <div class="box-top">
            <div class="profile">
                <div class="profile-img">
                    <img src="<?= ROOT ?>/<?= $review->user_image ?>" />
                </div>
                <div class="name-user">
                    <strong>@<?= $review->username ?></strong>
                    <span><?= $review->date ?></span>
                </div>
            </div>
            <div class="reviews">
                <?php for ($i = 0; $i < $review->rating; $i++) : ?>
                    <i class="fas fa-star"></i>
                <?php endfor; ?>
                <?php for ($i = $review->rating; $i < 5; $i++) : ?>
                    <i class="far fa-star"></i>
                <?php endfor; ?>
            </div>
        </div>
        <div class="client-comment">
            <p>
                <?= $review->description ?>
            </p>
        </div>
      </div>
      
    <?php endforeach; ?>
    
    <?php else: ?>
      <p style="margin:50px;">No reviews found.</p>
      <?php endif; ?>
     

    <!-- Add review box -->
    
            
    <?php $this->view('member/add_review', $data) ?>
    <?php $this->view('elibrary/review', $data) ?>

     
    <!-- end of add review box -->

<script>
        // Get the modal
var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal-2");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var moreBtn = document.getElementById("more-btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var span2 = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.visibility = "visible";
}
moreBtn.onclick = function() {
  modal2.style.visibility = "visible";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.visibility = "hidden";
  modal.classList.remove('animate');
}
span2.onclick = function() {
  modal2.style.visibility = "hidden";
  modal2.classList.remove('animate');
}
document.getElementById('myBtn').addEventListener('click', function() {
    document.getElementById('myModal').classList.add('animate');
});
document.getElementById('moreBtn').addEventListener('click', function() {
 document.getElementById('myModal-2').classList.add('animate');
});
    
</script>

