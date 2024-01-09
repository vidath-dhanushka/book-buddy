<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst(App::$page) ?> - <?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/sidenav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/edit-form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/profile-pic.css">
</head>

<body>
    <?php $this->view('includes/navbar') ?>
    <?php $this->view('includes/sidenav', $data) ?>

    <?php if ($action == 'add') : ?>
        <br>
        <section class="home-section">
            <div class="container">
                <header>Add New Book to Share</header>
                <form action="#" class="form" method="post">

                    <img onclick="document.getElementById('book_upload').click()" src="<?= ROOT ?>/assets/images/books/book_image.jpg" id="thumb" class=img-book alt="">
                    <input type="file" onchange="change_img(this)" id="book_upload" accept="image/*">

                    <div class="input-box">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="<?= set_value('title') ?>" required>

                        <?php if (!empty($errors['title'])) : ?>
                            <small class="err-msg"><?= $errors['title'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="description">Description</label>
                        <textarea type="text" id="description" name="description" value="<?= set_value('description') ?>" required></textarea>

                        <?php if (!empty($errors['description'])) : ?>
                            <small class="err-msg"><?= $errors['description'] ?></small>
                        <?php endif; ?>
                    </div>


                    <div class="input-box">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" value="<?= set_value('') ?>" required>
                    </div>
                    <br>
                    <label for="category">Category</label>
                    <br>
                    <!-- <div class="select-box"> -->
                    <!-- <select id="category" multiple>     -->
                    <?php foreach ($data['categories'] as $category) : ?>
                        <input name="category" type="checkbox" value="<?= $category->id; ?>" />
                        <label style="margin-right: 15px; text-transform: capitalize"><?= $category->category_name; ?></label>
                    <?php endforeach; ?>
                    <!-- </select> -->
                    <!-- </div> -->

                    <div class="column" style="justify-content:center;">
                        <button style="width:50%;">Add book</button>
                    </div>
                </form>
            </div>
        </section>
    <?php elseif ($action == 'edit') : ?>
        <br>
        <section class="home-section">
            <div class="container">
                <header>Edit Book Details</header>
                <form action="#" class="form" method="post">

                    <img onclick="document.getElementById('book_upload').click()" src="<?= ROOT ?>/assets/images/books/book_image.jpg" id="thumb" class=img-book alt="">
                    <input type="file" onchange="change_img(this)" id="book_upload" accept="image/*">

                    <div class="input-box">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="<?= set_value('title') ?>" required>

                        <?php if (!empty($errors['title'])) : ?>
                            <small class="err-msg"><?= $errors['title'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" value="<?= set_value('description') ?>" required></textarea>

                        <?php if (!empty($errors['description'])) : ?>
                            <small class="err-msg"><?= $errors['description'] ?></small>
                        <?php endif; ?>
                    </div>


                    <div class="input-box">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" value="<?= set_value('') ?>" required>
                    </div>
                    <br>
                    <label for="category">Category</label>
                    <br>
                    <!-- <div class="select-box"> -->
                    <!-- <select id="category" multiple>     -->
                    <?php foreach ($data['categories'] as $category) : ?>
                        <input name="category" type="checkbox" value="<?= $category->id; ?>" />
                        <label style="margin-right: 15px; text-transform: capitalize"><?= $category->category_name; ?></label>
                    <?php endforeach; ?>
                    <!-- </select> -->
                    <!-- </div> -->

                    <div class="column" style="justify-content:center;">
                        <button style="width:50%;">Add book</button>
                    </div>
                </form>
            </div>
        </section>
    <?php else : ?>
        <?php if (message()) : ?>
            <div class="alert"><?= message('', true) ?></div>
        <?php endif; ?>


    <?php endif; ?>

    <script>
        change_img = (input) => {
            var image = document.getElementById('thumb');

            // Check if a file is selected
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Set the source of the image to the data URL
                    image.src = e.target.result;
                    // Display the image
                    image.style.display = 'block';
                };

                // Read the file as a data URL
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>