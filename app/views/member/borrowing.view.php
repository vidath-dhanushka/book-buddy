<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/sidenav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/tabmenu.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/dashboard.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/borrowing.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/notification.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
    <?php $this->view('includes/navbar', $data)  ?>
    <?php $this->view('includes/sidenav', $data) ?>
    
    <section class="home-section">
        <div class="layout">
            <input name="nav" type="radio" class="nav book-radio" id="book" checked="checked" />
            <div class="page book-page">
                <div class="page-contents">
                    <main class="table">
                        <section class="table__header">
                            <h1>My Borrowing</h1>
                            <div class="input-group">
                                <input type="search" placeholder="Search Data...">
                                <img src="<?= ROOT ?>/assets/images/member/search-black.svg" alt="">
                            </div>

                        </section>
                        <section class="table__body">
                            <table>
                                <thead>
                                    <tr>
                                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Title <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Author <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Lender <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Borrow Date <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Due Date <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Return Date <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                                    </tr>
                                </thead>
                                <!-- status returned -->
                                <!-- status overdue -->
                                <!-- status borrowed -->
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>The Great Gatsby</td>
                                        <td>F. Scott Fitzgerald</td>
                                        <td>User1</td>
                                        <td>2024-01-01</td>
                                        <td>2024-01-15</td>
                                        <td>2024-01-14</td>
                                        <td>
                                            <p class="status returned">Returned</p>
                                        </td>
                                        <td><a href="<?= ROOT ?>/member/review_book" class="action btn">View </a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>To Kill a Mockingbird</td>
                                        <td>Harper Lee</td>
                                        <td>User2</td>
                                        <td>2024-01-03</td>
                                        <td>2024-01-17</td>
                                        <td>2024-01-16</td>
                                        <td>
                                            <p class="status returned">Returned</p>
                                        </td>
                                        <td><a href="#" class="action btn">View </a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>1984</td>
                                        <td>George Orwell</td>
                                        <td>User3</td>
                                        <td>2024-01-05</td>
                                        <td>2024-01-19</td>
                                        <td></td>
                                        <td>
                                            <p class="status borrowed">Borrowed</p>
                                        </td>
                                        <td><a href="#" class="action btn">View </a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>The Catcher in the Rye</td>
                                        <td>J.D. Salinger</td>
                                        <td>User4</td>
                                        <td>2024-01-07</td>
                                        <td>2024-01-21</td>
                                        <td></td>
                                        <td>
                                            <p class="status borrowed">Borrowed</p>
                                        </td>
                                        <td><a href="#" class="action btn">View </a></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Pride and Prejudice</td>
                                        <td>Jane Austen</td>
                                        <td>User5</td>
                                        <td>2024-01-09</td>
                                        <td>2024-01-23</td>
                                        <td></td>
                                        <td>
                                            <p class="status overdue">Overdue</p>
                                        </td>
                                        <td><a href="#" class="action btn">View </a></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>The Hobbit</td>
                                        <td>J.R.R. Tolkien</td>
                                        <td>User6</td>
                                        <td>2024-01-11</td>
                                        <td>2024-01-25</td>
                                        <td></td>
                                        <td>
                                            <p class="status overdue">Overdue</p>
                                        </td>
                                        <td><a href="#" class="action btn">View </a></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Moby Dick</td>
                                        <td>Herman Melville</td>
                                        <td>User7</td>
                                        <td>2024-01-13</td>
                                        <td>2024-01-27</td>
                                        <td>2024-01-26</td>
                                        <td>
                                            <p class="status returned">Returned</p>
                                        </td>
                                        <td><a href="#" class="action btn">View </a></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>War and Peace</td>
                                        <td>Leo Tolstoy</td>
                                        <td>User8</td>
                                        <td>2024-01-15</td>
                                        <td>2024-01-29</td>
                                        <td>2024-01-28</td>
                                        <td>
                                            <p class="status returned">Returned</p>
                                        </td>
                                        <td><a href="#" class="action btn">View </a></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>The Odyssey</td>
                                        <td>Homer</td>
                                        <td>User9</td>
                                        <td>2024-01-17</td>
                                        <td>2024-01-31</td>
                                        <td></td>
                                        <td>
                                            <p class="status borrowed">Borrowed</p>
                                        </td>
                                        <td><a href="#" class="action btn">View </a></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Ulysses</td>
                                        <td>James Joyce</td>
                                        <td>User10</td>
                                        <td>2024-01-19</td>
                                        <td>2024-02-02</td>
                                        <td></td>
                                        <td>
                                            <p class="status overdue">Overdue</p>
                                        </td>
                                        <td><a href="#" class="action btn">View </a></td>
                                    </tr>


                                </tbody>
                            </table>
                        </section>
                    </main>
                </div>
            </div>
            <label class="nav" for="book">
                <span>
                    Book
                </span>
            </label>

            <input name="nav" type="radio" class="ebook-radio" id="ebook" />
            <div class="page ebook-page">
                <div class="page-contents">
                    <main class="table">
                        <section class="table__header">
                            <h1>My Borrowing</h1>
                            <div class="input-group">
                                <input type="search" placeholder="Search Data...">
                                <img src="<?= ROOT ?>/assets/images/member/search-black.svg" alt="">
                            </div>

                        </section>
                        <section class="table__body">
                            <table>
                                <thead>
                                    <tr>
                                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Title <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Author <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Lender <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Borrow Date <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Due Date <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                                        <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>1</td>
                                    <td>The Great Gatsby</td>
                                    <td>F. Scott Fitzgerald</td>
                                    <td>User1</td>
                                    <td>2024-01-01</td>
                                    <td>2024-01-15</td>
                                    <td>
                                        <p class="status returned">Returned</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>To Kill a Mockingbird</td>
                                    <td>Harper Lee</td>
                                    <td>User2</td>
                                    <td>2024-01-03</td>
                                    <td>2024-01-17</td>
                                    <td>
                                        <p class="status returned">Returned</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>1984</td>
                                    <td>George Orwell</td>
                                    <td>User3</td>
                                    <td>2024-01-05</td>
                                    <td>2024-01-19</td>
                                    <td>
                                        <p class="status borrowed">Borrowed</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>The Catcher in the Rye</td>
                                    <td>J.D. Salinger</td>
                                    <td>User4</td>
                                    <td>2024-01-07</td>
                                    <td>2024-01-21</td>
                                    <td>
                                        <p class="status borrowed">Borrowed</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Pride and Prejudice</td>
                                    <td>Jane Austen</td>
                                    <td>User5</td>
                                    <td>2024-01-09</td>
                                    <td>2024-01-23</td>
                                    <td>
                                        <p class="status returned">Returned</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>The Hobbit</td>
                                    <td>J.R.R. Tolkien</td>
                                    <td>User6</td>
                                    <td>2024-01-11</td>
                                    <td>2024-01-25</td>
                                    <td>
                                        <p class="status returned">Returned</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Moby Dick</td>
                                    <td>Herman Melville</td>
                                    <td>User7</td>
                                    <td>2024-01-13</td>
                                    <td>2024-01-27</td>
                                    <td>
                                        <p class="status borrowed">Borrowed</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>War and Peace</td>
                                    <td>Leo Tolstoy</td>
                                    <td>User8</td>
                                    <td>2024-01-15</td>
                                    <td>2024-01-29</td>
                                    <td>
                                        <p class="status borrowed">Borrowed</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>The Odyssey</td>
                                    <td>Homer</td>
                                    <td>User9</td>
                                    <td>2024-01-17</td>
                                    <td>2024-01-31</td>
                                    <td>
                                        <p class="status returned">Returned</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Ulysses</td>
                                    <td>James Joyce</td>
                                    <td>User10</td>
                                    <td>2024-01-19</td>
                                    <td>2024-02-02</td>
                                    <td>
                                        <p class="status returned">Returned</p>
                                    </td>
                                    <td><a href="#" class="action btn">View </a></td>
                                </tr>
                                </tbody>
                            </table>
                        </section>
                    </main>
                </div>
            </div>
            <label class="nav" for="ebook">
                <span>
                    E-Book
                </span>
            </label>


        </div>
        </div>
    </section>
    <script src="<?= ROOT ?>/assets/js/table.js"></script>
    <script src="<?=ROOT?>/assets/js/notification.js"></script>
</body>

</html>