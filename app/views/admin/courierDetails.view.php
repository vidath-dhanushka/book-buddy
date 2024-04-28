<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/sidenav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/edit-form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/profile-pic.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/borrowing.css">
    

</head>

<body>
    <?php $this->view('includes/navbar') ?>
    <?php $this->view('includes/sidenav', $data) ?>

    <?php if ($action == 'add') : ?>
        <br>
        <section class="home-section">
            <div class="container">
                <header>Add Courier </header>
                <form class="form" method="post" enctype="multipart/form-data">
                    <div class="input-box">
                        <label for="company_name">company_name</label>
                        <input type="text" id="company_name" name="company_name" value="<?= set_value('company_name') ?>">

                        <?php if (!empty($errors['company_name'])) : ?>
                            <small class="err-msg"><?= $errors['company_name'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="reg_no">reg_no</label>
                        <input type="text" id="reg_no" name="reg_no"><?= set_value('reg_no') ?></input>

                        <?php if (!empty($errors['reg_no'])) : ?>
                            <small class="err-msg"><?= $errors['reg_no'] ?></small>
                        <?php endif; ?>
                    </div>


                    <div class="input-box">
                        <label for="email">email</label>
                        <input type="text" id="email" name="email" value="<?= set_value('email') ?>">

                        <?php if (!empty($errors['email'])) : ?>
                            <small class="err-msg"><?= $errors['email'] ?></small>
                        <?php endif; ?>

                    </div>
                    <div class="input-box">
                        <label for="phone">phone</label>
                        <input type="text" id="phone" name="phone" value="<?= set_value('phone') ?>">

                        <?php if (!empty($errors['phone'])) : ?>
                            <small class="err-msg"><?= $errors['phone'] ?></small>
                        <?php endif; ?>

                    </div>
                    <div class="input-box">
                        <label for="rate_first_kg">rate_first_kg</label>
                        <input type="text" id="rate_first_kg" name="rate_first_kg" value="<?= set_value('rate_first_kg') ?>">

                        <?php if (!empty($errors['rate_first_kg'])) : ?>
                            <small class="err-msg"><?= $errors['rate_first_kg'] ?></small>
                        <?php endif; ?>

                    </div>

                    <div class="input-box">
                        <label for="rate_extra_kg">rate_extra_kg</label>
                        <input type="text" id="rate_extra_kg" name="rate_extra_kg" value="<?= set_value('rate_extra_kg') ?>">

                        <?php if (!empty($errors['rate_extra_kg'])) : ?>
                            <small class="err-msg"><?= $errors['rate_extra_kg'] ?></small>
                        <?php endif; ?>

                    </div>
                        
                    <div class="column" style="justify-content:center;">
                        <button style="width:50%;">Add couier</button>
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
                        <label for="company_name">company_name</label>
                        <input type="text" id="company_name" name="company_name" value="<?= $data['book_details']->company_name; ?>" required>

                        <?php if (!empty($errors['company_name'])) : ?>
                            <small class="err-msg"><?= $errors['company_name'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="reg_no">reg_no</label>
                        <textarea id="reg_no" name="reg_no" required><?= $data['book_details']->reg_no; ?></textarea>

                        <?php if (!empty($errors['reg_no'])) : ?>
                            <small class="err-msg"><?= $errors['reg_no'] ?></small>
                        <?php endif; ?>
                    </div>


                    <div class="input-box">
                        <label for="email">email</label>
                        <input type="text" id="email" name="email" value="<?= camelCaseToWords($data['book_details']->email_name); ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="phone">phone</label>
                        <textarea id="phone" name="phone" required><?= $data['book_details']->reg_no; ?></textarea>

                        <?php if (!empty($errors['phone'])) : ?>
                            <small class="err-msg"><?= $errors['phone'] ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="input-box">
                        <label for="rate_first_kg">rate_first_kg</label>
                        <textarea id="rate_first_kg" name="rate_first_kg" required><?= $data['book_details']->reg_no; ?></textarea>

                        <?php if (!empty($errors['rate_first_kg'])) : ?>
                            <small class="err-msg"><?= $errors['rate_first_kg'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="rate_extra_kg">rate_first_kg</label>
                        <textarea id="rate_extra_kg" name="rate_extra_kg" required><?= $data['book_details']->reg_no; ?></textarea>

                        <?php if (!empty($errors['rate_extra_kg'])) : ?>
                            <small class="err-msg"><?= $errors['rate_extra_kg'] ?></small>
                        <?php endif; ?>
                    </div>

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
            <div class="layout">
                <div class="page book-page">
                    <div class="page-contents">
                        <main class="table">
                            <section class="table__header">
                                <h1 style="padding-top: 5px; text-align:center">Courier Details</h1>
                                <div class="input-group">
                                    <input type="search" placeholder="Search Data...">
                                    <img src="<?= ROOT ?>/assets/images/member/search-black.svg" alt="">
                                    <!-- <button>new</button> -->
                                </div>
                                <a href="<?= ROOT ?>/admin/courierDetails/add"><button id="btn-new"><i class="fa-solid fa-plus"></i> new</button></a>

                            </section>
                            <section class="table__body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th> company_name <span class="icon-arrow">&UpArrow;</span></th>
                                            <th> reg_no <span class="icon-arrow">&UpArrow;</span></th>
                                            <th> email <span class="icon-arrow">&UpArrow;</span></th>
                                            <th>phone<span class="icon-arrow">&UpArrow;</span></th>
                                            <th>rate_first_kg<span class="icon-arrow">&UpArrow;</span></th>
                                            <th>rate_extra_kg<span class="icon-arrow">&UpArrow;</span></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($data['books'])) : ?>
                                            <?php foreach ($data['books'] as $book) : ?>
                                                <tr>
                                                    <td><?= $book->company_name ?></td>
                                                    <td><?= $book->reg_no ?></td>
                                                    <td><?= camelCaseToWords($book->email_name) ?></td>
                                                    <td><?= $book->rate_first_kg ?></td>
                                                    <td><?= $book->rate_extra_kg ?></td>
                                                    <td>
                                                        <a href="<?= ROOT . '/admin/courierDetails/edit/' . $book->id; ?>"><i class="fa-regular fa-pen-to-square" style="color:blue"></i></a>
                                                        <a href="<?= ROOT . '/admin/courierDetails/delete/' . $book->id; ?>"><i class="fa-solid fa-trash" style="color:red; margin-left:5px"></i></a>
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
                    </div>
                </div>
            </div>
        </section>
        <script src="<?= ROOT ?>/assets/js/table.js"></script>

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
       
