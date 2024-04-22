<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<?php 
    $class = isset($_SESSION['message_class']) ? $_SESSION['message_class'] : 'alert'; 
    if(message()):?>
        <div class="<?= $class ?>"><?=message('', true)?></div>
    <?php 
        unset($_SESSION['message_class']);
    endif;
?>

<div class="main-container">
    <section class="container-left">
        <img src="<?= ROOT . '/' . $data['row']->book_image; ?>">
    </section>
    <section class="container-right">
        <br>
        <p class="book-title"><?= $data['row']->title; ?></p>
        <p>By <i><?= camelCaseToWords($data['row']->author_name); ?></i></p>
        <br>
        <!-- <h2>Description:</h2> -->
        <p class="description"><?= $data['row']->description; ?></p><br>
        <br>
        <?php if (!empty($row->cats)) : ?>
        <div class="tags">
            <?php for ($i = 0; $i < count($row->cats); $i++) : ?>
                <span><?php echo $row->cats[$i]; ?></span>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
       
        <div>
            <a href="<?= ROOT ?>/payment"><button>Borrow Now</button></a>
            <a href="<?= ROOT ?>/cart/add_to_cart"><button>Add to Cart</button></a>
        </div>
    </section>
</div>
<div class="review">
    <h1>Rating and Reviews</h1>
<div class="summary-rating">
            <div class="rating_average">
            <h1><?=$reviews['average_rating'] ?></h1>
            <div class="star-outer">
                <div class="star-inner">
                    <?php
                    $rating = $reviews['average_rating'];
                    $intRating = floor($rating);
                    $decimal = $rating - $intRating;

                    // Print full stars
                    for ($i = 0; $i < $intRating; $i++) {
                        echo '<i class="bx bxs-star gold-star"></i>';
                    }

                    // Print half star if decimal part is >= 0.5
                    if ($decimal >= 0.5) {
                        echo '<i class="bx bxs-star-half gold-star"></i>';
                        $intRating++;
                    }

                    // Print empty stars
                    for ($i = $intRating; $i < 5; $i++) {
                        echo '<i class="bx bx-star gold-star"></i>'; // Assuming bx-star is the class for empty star
                    }
                    ?>
                </div>
            </div>



                <p><?=$reviews['count'] ?></p>
            </div>
            <div class="rating-progress">
                <?php
                $rating_counts = $reviews['rating_count']; 
               

                for ($i = 5; $i >= 1; $i--) {
                    $count = 0;
                    foreach ($rating_counts as $rating_count) {
                        if ($rating_count->rating == $i) {
                            $count = $rating_count->count;
                            break;
                        }
                    }
                ?>
                    <div class="rating_progress-value">
                        <p><?php echo $i; ?> <span class="star">★</span></p>
                        <div class="progress">
                            <div class="bar" style="width: <?php echo $count; ?>%;"></div>
                        </div>
                        <p><?php echo $count; ?></p>
                    </div>
                <?php } ?>
            </div>
            <div class="add-review">
                
                <?php 
            
            if (!empty($reviews['user_review'])) : ?>
                <?php $user_review = $reviews['user_review'];  ?>
                <div class="box">
                    <div class="box-header">
                        <h2>My Review</h2>
                        <div>
                        <a href="">
                            <i class="fa-regular fa-pen-to-square" style="color:blue"></i>
                        </a>
                        <a href="" style="margin-left:5px">
                            <i class="fa-solid fa-trash" style="color:red;"></i>
                        </a>
                        </div>
                    </div>
                    <div class="box-top">
                        <div class="profile">
                            <div class="profile-img">
                                <img src="<?= ROOT ?>/<?= $user->user_image ?>" />
                            </div>
                            <div class="name-user">
                                <strong>@<?= $user->username ?></strong>
                                <span><?= $user_review->date ?></span>
                            </div>
                        </div>
                        <div class="reviews">
                            <?php for ($i = 0; $i < $user_review->rating; $i++) : ?>
                                <i class="fas fa-star"></i>
                            <?php endfor; ?>
                            <?php for ($i = $user_review->rating; $i < 5; $i++) : ?>
                                <i class="far fa-star"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="client-comment">
                        <p>
                            <?= $user_review->description ?>
                        </p>
                    </div>
                </div>
            <?php else : ?>
                <p>Write Review Here:</p>
                
                <div id="myBtn" class="review-box">Review</div>
            <?php endif; ?>
        </div>

            
        </div>
      <div class="review-header">
   
     
      <button class="cart-btn" id="more-btn">see more</button>

     

      </div>
   
      <div class="box-details-container">
      <?php if(!empty($reviews['all'])) : ?>
        <?php foreach ($reviews['all'] as $review) : ?>
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
    
            
    <?php $this->view('member/add_book_review', $data) ?>
    <?php $this->view('elibrary/review', $data) ?>
    

     
    <!-- end of add review box -->

<script>
        // Get the modal
var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal-2");
var modal3 = document.getElementById("myModal-3");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var moreBtn = document.getElementById("more-btn");
var borrowBtn = document.getElementById("borrow-btn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var span2 = document.getElementsByClassName("close")[1];
var span3 = document.getElementsByClassName("close")[2];
// When the user clicks the button, open the modal 
if (btn) {
    btn.onclick = function() {
        modal.style.visibility = "visible";
    }
}

if (moreBtn) {
    moreBtn.onclick = function() {
        modal2.style.visibility = "visible";
    }
}
if (borrowBtn) {
    borrowBtn.onclick = function() {
        console.log("yes")
        modal3.style.visibility = "visible";
    }
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
span3.onclick = function() {
  modal3.style.visibility = "hidden";
  modal3.classList.remove('animate');
}
if (document.getElementById('myBtn')) {
    document.getElementById('myBtn').addEventListener('click', function() {
        document.getElementById('myModal').classList.add('animate');
    });
}

if (document.getElementById('more-btn')) {
    document.getElementById('more-btn').addEventListener('click', function() {
        document.getElementById('myModal-2').classList.add('animate');
    });
}
if (document.getElementById('borrow-btn')) {
    document.getElementById('borrow-btn').addEventListener('click', function() {
        console.log("borrow");
        document.getElementById('myModal-3').classList.add('animate');
    });
}
</script>
<?php $this->view('includes/footer') ?>
<?php $this->view('includes/footer') ?>