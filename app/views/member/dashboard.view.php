<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/navbar.css">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/sidenav.css">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/borrowing.css">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/dashboard.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>
<section class="home-section">

<div class="cardBox  col-6">
          

          <div class="card">
            <div>
              <h1>BOOKS</h1>
              <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/member/book-reading.png" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">2</div>
              <div class="cardName">
                currently reading
              </div>
            </div> 
          </div>
          <div class="card">
            <div>
              <h1>BOOKS</h1>
              <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/member/book.png" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">15</div>
              <div class="cardName">
                Read
              </div>
            </div>
          </div>
          <div class="card">
            <div>
              <h1>BOOKS</h1>
            <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/member/book-share.png" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">1</div>
              <div class="cardName">
                Shared
              </div>
            </div>
         
</div>
         

          <div class="card">
            <div>
            <h1>E-BOOKS</h1>
            <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/member/ebook-reading.png" alt="reading" height="60px" width="60px">
              </div>
              
              <div class="numbers">2</div>
              <div class="cardName">
                currently reading
              </div>
            </div> 
          </div>
          <div class="card">
            <div>
            <h1>E-BOOKS</h1>
            <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/member/ebook.png" alt="reading" height="60px" width="60px">
              </div>
              
              <div class="numbers">10</div>
              <div class="cardName">
                Read
              </div>
            </div>

            
          </div>
          <div class="card">
            <div>
              <h1>E-BOOKS</h1>
            <div class="iconBx" style="text-align:center;">
                <img src="<?= ROOT ?>/assets/images/member/sharing.png" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">1</div>
              <div class="cardName">
                Shared
              </div>
            </div>

            
          </div>
        </div>

       
        <div class="details">
          <div class="history">
          <h2>My Borrowing</h2>
            <div class="cardHeader">
              
              <h3>Books</h3>
              <a href="<?= ROOT ?>/member/borrowing" class="btn">View All</a>
            </div>

            <table>
              <thead>
              <tr>
                <th> Id </th>
                <th> Title </th>
                <th> Author</th>
                <th> Lender </th>
                <th> Borrow Date</th>
                <th> Due Date</th>
                <th> Return Date</th>
                <th> Status</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
                <td>The Great Gatsby</td>
                <td>F. Scott Fitzgerald</td>
                <td>User1</td>
                <td>2024-01-01</td>
                <td>2024-01-15</td>
                <td>2024-01-14</td>
                <td><p class="status returned">Returned</p></td>
              </tr>
              <tr>
                <td>3</td>
                <td>1984</td>
                <td>George Orwell</td>
                <td>User3</td>
                <td>2024-01-05</td>
                <td>2024-01-19</td>
                <td></td>
                <td><p class="status borrowed">Borrowed</p></td>
              </tr>
              <tr>
                <td>5</td>
                <td>Pride and Prejudice</td>
                <td>Jane Austen</td>
                <td>User5</td>
                <td>2024-01-09</td>
                <td>2024-01-23</td>
                <td></td>
                <td><p class="status overdue">Overdue</p></td>
              </tr>
              </tbody>
            </table>

            <div class="cardHeader">
              
              <h3>E-Books</h3>
              
            </div>
            <table>
              <thead>
              <tr>
                <th> Id </th>
                <th> Title </th>
                <th> Author</th>
                <th> Lender </th>
                <th> Borrow Date</th>
                <th> Return Date </th>
                <th> Status</th>
                </tr>
              </thead>

              <tbody>
              <tr>
                <td>1</td>
                <td>The Great Gatsby</td>
                <td>F. Scott Fitzgerald</td>
                <td>User1</td>
                <td>2024-01-01</td>
                <td>2024-01-15</td>
                <td><p class="status returned">Returned</p></td>
              </tr>
              <tr>
                <td>2</td>
                <td>To Kill a Mockingbird</td>
                <td>Harper Lee</td>
                <td>User2</td>
                <td>2024-01-03</td>
                <td>2024-01-17</td>
                <td><p class="status returned">Returned</p></td>
              </tr>
              <tr>
                <td>3</td>
                <td>1984</td>
                <td>George Orwell</td>
                <td>User3</td>
                <td>2024-01-05</td>
                <td>2024-01-19</td>
                <td><p class="status borrowed">Borrowed</p></td>
              </tr>

            </tbody>
            </table>
          </div>
          

          <!-- <div class="history">
          <h2>My Sharing</h2>
          <div class="cardHeader">
              
              <h3>Books</h3>
              <a href="#" class="btn">View All</a>
            </div>

            <table>
              <thead>
              <tr>
                <th> Id </th>
                <th> Title </th>
                <th> Author</th>
                <th> Shared Date</th>
                <th> Due Date</th>
                <th> Return Date</th>
                <th> Status</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
                <td>The Great Gatsby</td>
                <td>F. Scott Fitzgerald</td>
              
                <td>2024-01-01</td>
                <td>2024-01-15</td>
                <td>2024-01-14</td>
                <td><p class="status returned">Returned</p></td>
              </tr>
              <tr>
                <td>3</td>
                <td>1984</td>
                <td>George Orwell</td>
              
                <td>2024-01-05</td>
                <td>2024-01-19</td>
                <td></td>
                <td><p class="status borrowed">Borrowed</p></td>
              </tr>
              <tr>
                <td>5</td>
                <td>Pride and Prejudice</td>
                <td>Jane Austen</td>
                
                <td>2024-01-09</td>
                <td>2024-01-23</td>
                <td></td>
                <td><p class="status overdue">Overdue</p></td>
              </tr>
              </tbody>
            </table>

            <div class="cardHeader">
              
              <h3>E-Books</h3>
              <a href="#" class="btn">View All</a>
            </div>
            <table>
              <thead>
              <tr>
                <th> Id </th>
                <th> Title </th>
                <th> Author</th>
               
                <th> Borrow Date</th>
                <th> Return Date </th>
                <th> Status</th>
                </tr>
              </thead>

              <tbody>
              <tr>
                <td>1</td>
                <td>The Great Gatsby</td>
                <td>F. Scott Fitzgerald</td>
              
                <td>2024-01-01</td>
                <td>2024-01-15</td>
                <td><p class="status returned">Returned</p></td>
              </tr>
              <tr>
                <td>2</td>
                <td>To Kill a Mockingbird</td>
                <td>Harper Lee</td>
               
                <td>2024-01-03</td>
                <td>2024-01-17</td>
                <td><p class="status returned">Returned</p></td>
              </tr>
              <tr>
                <td>3</td>
                <td>1984</td>
                <td>George Orwell</td>
                
                <td>2024-01-05</td>
                <td>2024-01-19</td>
                <td><p class="status borrowed">Borrowed</p></td>
              </tr>

            </tbody>
            </table>
    </div> -->
</div>
</section>
</body>
</html>