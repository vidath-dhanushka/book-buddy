<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav') ?>
<main>
    <section class="searchbar">
        <form action="">
            <input type="text" name="search" id="search" placeholder="search book....">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </section>
    <section class="categories">
        <a href="<?= ROOT ?>/books">All</a>
        <?php foreach ($data['categories'] as $category) : ?>
            <a href="?category_id=<?= $category->id ?>"><?= $category->category_name ?></a>
        <?php endforeach; ?>
        <!-- <a href="fiction">Fiction</a>
        <a href="thriller">Thriller</a>
        <a href="Fantasy">Fantasy</a>
        <a href="adventure">Adventure</a>
        <a href="romance">Romance</a>
        <a href="horror">Horror</a> -->
    </section>
    <div class="container-hr">
        <hr>
    </div>
    <section class="arrivals">
        <!-- <h1>New Arrivals</h1> -->
        <div class="arrivals-box">
            <!-- <div class="arrivals-card">
                <div class="arrivals-img">
                    <img src="<?= ROOT ?>/assets/images/books/arrival_1.jpg">
                </div>
                <div class="arrivals-tag">
                    <p>New Arrivals</p>
                    <div class="arrivals-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="<?= ROOT ?>/books/view_book/" class="arrivals-btn">Learn More</a>
                </div>
            </div> -->
            <!-- <div class="arrivals-card">
                <div class="arrivals-img">
                    <img src="<?= ROOT ?>/assets/images/books/arrival_2.jpg">
                </div>
                <div class="arrivals-tag">
                    <p>New Arrivals</p>
                    <div class="arrivals-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="#" class="arrivals-btn">Learn More</a>
                </div>
            </div>
            <div class="arrivals-card">
                <div class="arrivals-img">
                    <img src="<?= ROOT ?>/assets/images/books/arrival_3.jpg">
                </div>
                <div class="arrivals-tag">
                    <p>New Arrivals</p>
                    <div class="arrivals-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="#" class="arrivals-btn">Learn More</a>
                </div>
            </div>
            <div class="arrivals-card">
                <div class="arrivals-img">
                    <img src="<?= ROOT ?>/assets/images/books/arrival_4.jpg">
                </div>
                <div class="arrivals-tag">
                    <p>New Arrivals</p>
                    <div class="arrivals-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="#" class="arrivals-btn">Learn More</a>
                </div>
            </div> -->

            <?php foreach ($data['books'] as $book) : ?>
                <div class="arrivals-card">
                    <div class="arrivals-img">
                        <img src="<?= ROOT . '/' . $book->book_image ?>">
                    </div>
                    <div class="arrivals-tag">
                        <p><?= $book->title ?></p>
                        <div class="arrivals-icon">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <a href="<?= ROOT ?>/books/view_book/<?= $book->id ?>" class="arrivals-btn">Learn More</a>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- <div class="arrivals-card">
                <div class="arrivals-img">
                    <img src="<?= ROOT ?>/assets/images/books/arrival_6.jpg">
                </div>
                <div class="arrivals-tag">
                    <p>New Arrivals</p>
                    <div class="arrivals-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="#" class="arrivals-btn">Learn More</a>
                </div>
            </div>
            <div class="arrivals-card">
                <div class="arrivals-img">
                    <img src="<?= ROOT ?>/assets/images/books/arrival_7.jpg">
                </div>
                <div class="arrivals-tag">
                    <p>New Arrivals</p>
                    <div class="arrivals-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="#" class="arrivals-btn">Learn More</a>
                </div>
            </div>
            <div class="arrivals-card">
                <div class="arrivals-img">
                    <img src="<?= ROOT ?>/assets/images/books/arrival_8.webp">
                </div>
                <div class="arrivals-tag">
                    <p>New Arrivals</p>
                    <div class="arrivals-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="#" class="arrivals-btn">Learn More</a>
                </div>
            </div> -->
            <!-- <div class="arrivals-card">
                <div class="arrivals-img">
                    <img src="<?= ROOT ?>/assets/images/books/arrival_9.jpg">
                </div>
                <div class="arrivals-tag">
                    <p>New Arrivals</p>
                    <div class="arrivals-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="#" class="arrivals-btn">Learn More</a>
                </div>
            </div>
            <div class="arrivals-card">
                <div class="arrivals-img">
                    <img src="<?= ROOT ?>/assets/images/books/arrival_10.jpg">
                </div>
                <div class="arrivals-tag">
                    <p>New Arrivals</p>
                    <div class="arrivals-icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <a href="#" class="arrivals-btn">Learn More</a>
                </div>
            </div> -->
        </div>
    </section>
</main>
<?php $this->view('includes/footer') ?>