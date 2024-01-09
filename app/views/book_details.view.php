<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

<div class="main-container">
    <section class="container-left">
        <img src="<?= ROOT ?>/assets/images/books/arrival_1.jpg">
    </section>
    <section class="container-right">
        <br>
        <p class="book-title">The Giver</p>
        <p>By <i>Thinuk Kabril</i></p>
        <br>
        <!-- <h2>Description:</h2> -->
        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae doloremque sed itaque, similique esse dicta alias odio commodi deleniti vel quas soluta odit voluptatem earum nemo nam? Sunt, quod. Unde.</p><br>
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

<?php $this->view('includes/footer') ?>