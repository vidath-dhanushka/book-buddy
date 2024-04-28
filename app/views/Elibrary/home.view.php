<?php $this->view('includes/header') ?>
<?php $this->view('Elibrary/includes/elib_nav', $data) ?>
<main>
    <section class="banner">
        <div class="banner-content">Unlock the power <br> of knowledge with <br> <span>Bookbuddy</span></div>
        <img src="<?= ROOT ?>/assets/images/elibrary_cover4.jpeg" alt="home-img">
    </section>
    <section class="top-rated-books">
        <h1>Top Rated Books</h1>
        <div class="top-rated-book-box">
        
        <?php if (!empty($top_ebooks)) : ?>
            <?php foreach ($top_ebooks as $ebook) : ?>
                <div class="top-rated-book-card">
                    <div class="top-rated-book-img">
                        <img src="<?= $ebook->book_cover ?>">
                    </div>
                    <div class="top-rated-book-tag">
                        <h2>Featured Books</h2>
                        <p class="writer"><?= $ebook->author_name ?></p>
                        <div class="categories"><?= $ebook->categories ?></div>
                        <p class="book-price"></p>
                        <a href="<?= ROOT ?>/elibrary/view_ebook/<?= $ebook->id ?>" class="f-btn">Learn More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

           
        </div>
    </section>
    <section class="top-rated-books">
        <h1>Newly Added</h1>
        <div class="top-rated-book-box">
        <?php if (!empty($new_ebooks)) : ?>
            <?php foreach ($new_ebooks as $ebook) : ?>
                <div class="top-rated-book-card">
                    <div class="top-rated-book-img">
                        <img src="<?= $ebook->book_cover ?>">
                    </div>
                    <div class="top-rated-book-tag">
                        <h2>Featured Books</h2>
                        <p class="writer"><?= $ebook->author_name ?></p>
                        <div class="categories"><?= $ebook->categories ?></div>
                        <p class="book-price"></p>
                        <a href="<?= ROOT ?>/elibrary/view_ebook/<?= $ebook->id ?>" class="f-btn">Learn More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        </div>
    </section>
</main>
<?php $this->view('includes/footer') ?>