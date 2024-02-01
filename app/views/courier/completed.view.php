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
</head>

<body>
    <?php $this->view('includes/navbar') ?>
    <?php $this->view('courier/includes/sidenav', $data) ?>
    <section class="home-section">
        <?php if (message()) : ?>
            <div class="alert"><?= message('', true) ?></div>
        <?php endif; ?>
        <div class="layout">
            <div class="page book-page">
                <div class="page-contents">
                    <main class="table">
                        <section class="table__header">
                            <h1 style="padding-top: 5px; text-align:center">Completed Orders</h1>
                            <div class="input-group">
                                <input type="search" placeholder="Search Data...">
                                <img src="<?= ROOT ?>/assets/images/member/search-black.svg" alt="">
                                <!-- <button>new</button> -->
                            </div>
                            <!-- <a href="<?= ROOT ?>/member/books/add"><button id="btn-new"><i class="fa-solid fa-plus"></i> new</button></a> -->

                        </section>
                        <section class="table__body">
                            <table>
                                <thead>
                                    <tr>
                                        <th> Order No. <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Sender Address <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Reciever Address <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Delivered Date <span class="icon-arrow">&UpArrow;</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php if (!empty($data['books'])) : ?>
                                            <?php foreach ($data['books'] as $book) : ?> -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <!-- <td>
                                                <a href="<?= ROOT . '/member/books/edit/' . $book->id; ?>"><i class="fa-regular fa-pen-to-square" style="color:blue"></i></a>
                                                <a href="<?= ROOT . '/member/books/delete/' . $book->id; ?>"><i class="fa-solid fa-trash" style="color:red; margin-left:5px"></i></a>
                                            </td> -->
                                    </tr>
                                    <!-- <?php endforeach; ?>
                                        <?php else : ?> -->
                                    <!-- <tr>
                                            <td colspan="7">No records found!</td>
                                        </tr> -->
                                    <!-- <?php endif; ?> -->
                                </tbody>

                            </table>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= ROOT ?>/assets/js/table.js"></script>
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