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
                <header>Add Librarian </header>
                <form class="form" method="post" enctype="multipart/form-data">

                
         
              
            
  
                    <div class="input-box">
                        <label for="full_name">full_name</label>
                        <input type="text" id="full_name" name="full_name" value="<?= set_value('full_name') ?>">

                        <?php if (!empty($errors['full_name'])) : ?>
                            <small class="err-msg"><?= $errors['full_name'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="user_name">user_name</label>
                        <input type="text" id="user_name" name="user_name"><?= set_value('user_name') ?></input>

                        <?php if (!empty($errors['user_name'])) : ?>
                            <small class="err-msg"><?= $errors['user_name'] ?></small>
                        <?php endif; ?>
                    </div>


                    <div class="input-box">
                        <label for="email">email</label>
                        <input type="text" id="email" name="email" value="<?= set_value('email') ?>">

                        <?php if (!empty($errors['email_name'])) : ?>
                            <small class="err-msg"><?= $errors['email_name'] ?></small>
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
                        <label for="password">password</label>
                        <input type="text" id="password" name="password" value="<?= set_value('password') ?>">

                        <?php if (!empty($errors['password'])) : ?>
                            <small class="err-msg"><?= $errors['password'] ?></small>
                        <?php endif; ?>

                    </div>

                    <div class="input-box">
                        <label for="address">address</label>
                        <input type="text" id="address" name="address" value="<?= set_value('address') ?>">

                        <?php if (!empty($errors['rate_fextra_kg'])) : ?>
                            <small class="err-msg"><?= $errors['address'] ?></small>
                        <?php endif; ?>

                    </div>
                        
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
                <form action="#" class="form" method="post" enctype="multipart/form-data">

                    <img onclick="document.getElementById('book_upload').click()" src="<?= ($data['book_details']->book_image) ? (ROOT . "/" . $data['book_details']->book_image) : "/assets/images/books/book_image.jpg" ?>" id="thumb" class="img-book" alt="">
                    <input type="file" onchange="change_img(this)" id="book_upload" accept="image/*" name="book_image">

                    <div class="input-box">
                        <label for="full_name">full_name</label>
                        <input type="text" id="full_name" name="full_name" value="<?= $data['book_details']->full_name; ?>" required>

                        <?php if (!empty($errors['full_name'])) : ?>
                            <small class="err-msg"><?= $errors['full_name'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="user_name">user_name</label>
                        <textarea id="user_name" name="user_name" required><?= $data['book_details']->user_name; ?></textarea>

                        <?php if (!empty($errors['user_name'])) : ?>
                            <small class="err-msg"><?= $errors['user_name'] ?></small>
                        <?php endif; ?>
                    </div>


                    <div class="input-box">
                        <label for="email">email</label>
                        <input type="text" id="email" name="email" value="<?= camelCaseToWords($data['book_details']->email_name); ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="phone">phone</label>
                        <textarea id="phone" name="phone" required><?= $data['book_details']->user_name; ?></textarea>

                        <?php if (!empty($errors['phone'])) : ?>
                            <small class="err-msg"><?= $errors['phone'] ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="input-box">
                        <label for="password">password</label>
                        <textarea id="password" name="password" required><?= $data['book_details']->user_name; ?></textarea>

                        <?php if (!empty($errors['password'])) : ?>
                            <small class="err-msg"><?= $errors['password'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="address">address</label>
                        <textarea id="address" name="address" required><?= $data['book_details']->user_name; ?></textarea>

                        <?php if (!empty($errors['address'])) : ?>
                            <small class="err-msg"><?= $errors['address'] ?></small>
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
                                <h1 style="padding-top: 5px; text-align:center">Librarian Details</h1>
                                <div class="input-group">
                                    <input type="search" placeholder="Search Data...">
                                    <img src="<?= ROOT ?>/assets/images/member/search-black.svg" alt="">
                                    <!-- <button>new</button> -->
                                </div>
                                <a href="<?= ROOT ?>/admin/librarianDetails/add"><button id="btn-new"><i class="fa-solid fa-plus"></i> new</button></a>

                            </section>
                            <section class="table__body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th> full_name <span class="icon-arrow">&UpArrow;</span></th>
                                            <th> user_name <span class="icon-arrow">&UpArrow;</span></th>
                                            <th> email <span class="icon-arrow">&UpArrow;</span></th>
                                            <th>phone<span class="icon-arrow">&UpArrow;</span></th>
                                            <th>password<span class="icon-arrow">&UpArrow;</span></th>
                                            <th>address<span class="icon-arrow">&UpArrow;</span></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($data['books'])) : ?>
                                            <?php foreach ($data['books'] as $book) : ?>
                                                <tr>
                                                    <td><?= $book->full_name ?></td>
                                                    <td><?= $book->user_name ?></td>
                                                    <td><?= camelCaseToWords($book->email_name) ?></td>
                                                    <td><?= $book->password ?></td>
                                                    <td><?= $book->address ?></td>
                                                    <td>
                                                        <a href="<?= ROOT . '/admin/librarianDetails/edit/' . $book->id; ?>"><i class="fa-regular fa-pen-to-square" style="color:blue"></i></a>
                                                        <a href="<?= ROOT . '/admin/librarianDetails/delete/' . $book->id; ?>"><i class="fa-solid fa-trash" style="color:red; margin-left:5px"></i></a>
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
       
 