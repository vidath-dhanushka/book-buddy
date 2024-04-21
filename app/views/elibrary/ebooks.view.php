<?php $this->view('includes/header') ?>
<?php $this->view('Elibrary/includes/elib_nav') ?>
<main>
    <section class="searchbar">
        <form action="">
            <input type="text" name="search" id="search" placeholder="search book....">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </section>
    <section class="categories">
        <a href="<?= ROOT ?>/elibrary/ebooks">All</a>
        <?php if (!empty($data['categories'])) : ?>
            <?php foreach ($data['categories'] as $category) : ?>
                <a href="?category_id=<?= $category->id ?>"><?= $category->category_name ?></a>
            <?php endforeach; ?>

        <?php endif; ?>

    </section>
    <div class="container-hr">
        <hr>
    </div>
    <section class="arrivals">
        <div class="arrivals-box">
        <?php if (!empty($data['ebooks'])) : ?>
            <section class="arrivals">
    <div class="arrivals-box">
        <?php 
        foreach ($data['ebooks'] as $book) : 
            $average_rating = 0;
            if (!empty($ebook_ratings)) {
                foreach($ebook_ratings as $ebook_rating) {
                    if($book->id == $ebook_rating->ebookID) {
                        $average_rating = $ebook_rating->average_rating;
                        break;
                    }
                }
            }
        ?>
        <div class="arrivals-card">
            <div class="arrivals-img">
                <img src="<?= ROOT . '/' . $book->book_cover ?>">
            </div>
            <div class="arrivals-tag">
                <p><?= $book->title ?></p>
                
                <div class="arrivals-icon">
                    <?php
                    $intRating = floor($average_rating);
                    $decimal = $average_rating - $intRating;

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
                          
                <a href="<?= ROOT ?>/elibrary/view_ebook/<?= $book->id ?>" class="arrivals-btn">Learn More</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>



    <?php else : ?>
        <h2 style="text-align: center; font-size:15px; margin-top:20px;">No books found for this category!</h2 style="text-align: center;">
    <?php endif; ?>

    </section>

</main>
<?php $this->view('includes/footer') ?>