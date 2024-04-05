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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/borrowing.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/addfeature.css">

</head>

<body>
    <?php $this->view('includes/navbar', $data) ?>
    <?php $this->view('includes/sidenav', $data) ?>

    <?php if ($action == 'add') : ?>
        <br>
        <section class="home-section">
            <div class="container">
                <header>Add New Subscription Level</header>
                <form class="form" id="subscription-form" method="post" enctype="multipart/form-data">
                    <div class="column">
                        <div class="input-box">
                            <label for="name">Subscription Name *</label><br>
                            <input type="text" id="name" name="name">
                            <?php if(!empty($errors['name'])):?>
                                <small class="err-msg"><?=$errors['name']?></small>
                            <?php endif;?>
                        </div>
                        <div class="input-box">
                            <label for="price">Subscription Price *</label><br>
                            <input type="number" id="price" name="price" step="0.01" min="0">
                            <?php if(!empty($errors['price'])):?>
                                <small class="err-msg"><?=$errors['price']?></small>
                            <?php endif;?>
                        </div>
                    <!-- </div> -->
                    <!-- <div class="column"> -->
                        <div class="input-box">
                        <label for="numberOfBooks">Number of Books Allowed *</label><br>
                            <input type="number" id="numberOfBooks" name="numberOfBooks" min="0">
                            <?php if(!empty($errors['numberOfBooks'])):?>
                                <small class="err-msg"><?=$errors['numberOfBooks']?></small>
                            <?php endif;?>
                        </div>
                        
  
                    </div>
                    <br><label for="numberOfBooks">Features *</label>
                    <div class="column add-features">
                    
                            <div class="row input-box">
                            
                                <input  type="text" id="feature-input" placeholder="Add a feature">
                                <button  type="button" onclick="addFeature()">Add</button>
                            </div>
                            
                   
                    </div>
                    <div class="column add-features">
                        <ul id="features-list"></ul>
                    </div>
                    
                           
                    
                    
                    <div class="column">
                        <button type='reset' >Cancel</button>
                        <button type='submit'>Save</button>
                    </div>
                </form>
            </div>
        </section>
    <?php elseif ($action == 'edit') : ?>
        <br>
        <section class="home-section">
            <div class="container">
                <header>Edit Book Details</header>
                <form action="#" class="form" method="post" enctype="multipart/form-data">

                    <img onclick="document.getElementById('book_upload').click()" src="<?= ($data['book_details']->book_image) ? (ROOT . "/" . $data['book_details']->book_image) : "/assets/images/books/book_image.jpg" ?>" id="thumb" class="img-book" alt="">
                    <input type="file" onchange="change_img(this)" id="book_upload" accept="image/*" name="book_image">

                    <div class="input-box">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="<?= $data['book_details']->title; ?>" required>

                        <?php if (!empty($errors['title'])) : ?>
                            <small class="err-msg"><?= $errors['title'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required><?= $data['book_details']->description; ?></textarea>

                        <?php if (!empty($errors['description'])) : ?>
                            <small class="err-msg"><?= $errors['description'] ?></small>
                        <?php endif; ?>
                    </div>


                    <div class="input-box">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" value="<?= camelCaseToWords($data['book_details']->author_name); ?>" required>
                    </div>
                    <br>
                    <label for="category">Category</label>
                    <br>
                    <!-- <div class="select-box"> -->
                    <!-- <select id="category" multiple>     -->
                    <?php foreach ($data['categories'] as $category) : ?>
                        <input name="category[]" type="checkbox" value="<?= $category->id; ?>" <?= in_array($category->id, $data['book_details']->cats) ? 'checked' : '' ?> />
                        <label style="margin-right: 15px; text-transform: capitalize"><?= $category->category_name; ?></label>
                    <?php endforeach; ?>
                    <!-- </select> -->
                    <!-- </div> -->

                    <div class="column" style="justify-content:center;">
                        <button style="width:50%;">Update Details</button>
                    </div>
                </form>
            </div>
        </section>
    <?php else : ?>
        <section class="home-section">
            <?php if (message()) : ?>
                <div class="alert"><?= message('', true) ?></div>
            <?php endif; ?>
            <main class="table">
                <section class="table__header">
                    <h1 style="padding-top: 5px; text-align:center">Subscription Levels</h1>
                    <div class="input-group">
                        <input type="search" placeholder="Search Data...">
                        <img src="<?= ROOT ?>/assets/images/member/search-black.svg" alt="">
                        <!-- <button>new</button> -->
                    </div>
                    <a href="<?= ROOT ?>/librarian/subscription/add"><button id="btn-new"><i class="fa-solid fa-plus"></i> new</button></a>

                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <tr>
                                <th>Name <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Price <span class="icon-arrow">&UpArrow;</span></th>
                                <th>Date added<span class="icon-arrow">&UpArrow;</span></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($data['books'])) : ?>
                                <?php foreach ($data['books'] as $book) : ?>
                                    <tr>
                                        <td><?= $book->title ?></td>
                                        <td><?= $book->description ?></td>
                                        <td><?= camelCaseToWords($book->author_name) ?></td>
                                        <td><?= date('Y-m-d', strtotime($book->date_added)) ?></td>
                                        <td>
                                            <a href="<?= ROOT . '/member/books/edit/' . $book->id; ?>"><i class="fa-regular fa-pen-to-square" style="color:blue"></i></a>
                                            <a href="<?= ROOT . '/member/books/delete/' . $book->id; ?>"><i class="fa-solid fa-trash" style="color:red; margin-left:5px"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7">No records found!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </section>
            </main>

        </section>
        
        <script src="<?= ROOT ?>/assets/js/table.js"></script>
    <?php endif; ?>
    
        
        <script src="<?= ROOT ?>/assets/js/add-features.js"></script>
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
</body>