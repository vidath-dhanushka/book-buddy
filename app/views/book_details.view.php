<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>

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
        <div class="tags">
            <span>Fiction</span>
            <span>Horror</span>
            <span>Thriller</span>
        </div>
        <div>
            <a href="<?= ROOT ?>/payment"><button>Borrow Now</button></a>
            <a href="<?= ROOT ?>/cart/add_to_cart"><button>Add to Cart</button>
        </div>
    </section>
</div>

<?php $this->view('includes/footer') ?>