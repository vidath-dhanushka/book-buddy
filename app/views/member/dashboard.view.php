<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/navbar.css">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/sidenav.css">
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
              <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/dashboard/book.png" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">2</div>
              <div class="cardName">
                <span>BOOKS</span><br />
                currently reading
              </div>
            </div> 
          </div>
          <div class="card">
            <div>
              <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/dashboard/current-reading.svg" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">15</div>
              <div class="cardName">
                <span>BOOKS</span><br />
                Read
              </div>
            </div>
          </div>
          <div class="card">
            <div>
            <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/dashboard/book.png" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">1</div>
              <div class="cardName">
                <span>BOOKS</span><br />
                Exchanged
              </div>
            </div>
         
</div>
         

          <div class="card">
            <div>
            <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/dashboard/ebook.png" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">2</div>
              <div class="cardName">
                <span>E-BOOKS</span><br />
                currently reading
              </div>
            </div> 
          </div>

          

            
     
          <div class="card">
            <div>
            <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/dashboard/current-ebook.png" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">10</div>
              <div class="cardName">
                <span>E-BOOKS</span><br />
                Read
              </div>
            </div>

            
          </div>
          <div class="card">
            <div>
            <div class="iconBx">
                <img src="<?= ROOT ?>/assets/images/dashboard/ebook.png" alt="reading" height="60px" width="60px">
              </div>
              <div class="numbers">1</div>
              <div class="cardName">
                <span>E-BOOKS</span><br />
                Shared
              </div>
            </div>

            
          </div>
        </div>

       
        <div class="details">
          <div class="history">
          <h2>My Borrowing</h2>
            <div class="cardHeader">
              
              <h3>Physical-Books</h3>
              <a href="#" class="btn">View All</a>
            </div>

            <table>
              <thead>
                <tr>
                  <td>ISBN</td>
                  <td>Title</td>
                  <td>Author</td>
                  <td>Publisher</td>
                  <td>Due Date</td>
                  <td>Status</td>
                </tr>
              </thead>

              <tbody>
              

              

              <tr>
                <td>978-0-316-01272-0</td>
                <td>The Catcher in the Rye</td>
                <td>J.D. Salinger</td>
                <td>Little, Brown and Company</td>
                <td>2024-01-15</td>
                <td><span class="status light-green-btn">Borrowed</span></td>
              </tr>

              <tr>
                <td>978-0-618-00221-7</td>
                <td>The Lord of the Rings</td>
                <td>J.R.R. Tolkien</td>
                <td>Houghton Mifflin Harcourt</td>
                <td>2023-12-15</td>
                <td><span class="status red-btn">Overdue</span></td>
              </tr>
              <tr>
                <td>978-0-618-00221-7</td>
                <td>The Lord of the Rings</td>
                <td>J.R.R. Tolkien</td>
                <td>Houghton Mifflin Harcourt</td>
                <td>2023-12-15</td>
                <td><span class="status green-btn">Returned</span></td>
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
                  <td>ISBN</td>
                  <td>Title</td>
                  <td>Author</td>
                  <td>Publisher</td>
                  <td>Due Date</td>
                  <td>Status</td>
                </tr>
              </thead>

              <tbody>
              <tr>
                <td>978-3-16-148410-0</td>
                <td>The Great Gatsby</td>
                <td>F. Scott Fitzgerald</td>
                <td>Scribner</td>
                <td>2023-12-31</td>
                <td><span class="status light-green-btn">Borrowed</span></td>
              </tr>

              <tr>
                <td>978-0-7432-7356-5</td>
                <td>To Kill a Mockingbird</td>
                <td>Harper Lee</td>
                <td>Harper Perennial</td>
                <td>2023-11-30</td>
                <td><span class="status red-btn">Overdue</span></td>
              </tr>

              
              <tr>
                <td>978-0-618-00221-7</td>
                <td>The Lord of the Rings</td>
                <td>J.R.R. Tolkien</td>
                <td>Houghton Mifflin Harcourt</td>
                <td>2023-12-15</td>
                <td><span class="status green-btn">Returned</span></td>
              </tr>

              </tbody>
            </table>
          </div>
          

          <div class="history">
          <h2>My Book Sharing</h2>
            <div class="cardHeader">
              
              <h3>Physical-Books</h3>
              <a href="#" class="btn">View All</a>
            </div>

            <table>
              <thead>
                <tr>
                  <td>ISBN</td>
                  <td>Title</td>
                  <td>Author</td>
                  <td>Publisher</td>
                  <td>Shared Date</td>
                  <td>Status</td>
                </tr>
              </thead>

              <tbody>
              

              

              <tr>
                <td>978-0-316-01272-0</td>
                <td>The Catcher in the Rye</td>
                <td>J.D. Salinger</td>
                <td>Little, Brown and Company</td>
                <td>2024-01-15</td>
                <td><span class="status green-btn">Donate</span></td>
              </tr>

              <tr>
                <td>978-0-618-00221-7</td>
                <td>The Lord of the Rings</td>
                <td>J.R.R. Tolkien</td>
                <td>Houghton Mifflin Harcourt</td>
                <td>2023-12-15</td>
                <td><span class="status light-green-btn">Lent</span></td>
              </tr>
              <tr>
                <td>978-0-618-00221-7</td>
                <td>The Lord of the Rings</td>
                <td>J.R.R. Tolkien</td>
                <td>Houghton Mifflin Harcourt</td>
                <td>2023-12-15</td>
                <td><span class="status light-green-btn">Lent</span></td>
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
                  <td>ISBN</td>
                  <td>Title</td>
                  <td>Author</td>
                  <td>Publisher</td>
                  <td>Shared Date</td>
                  <td>Status</td>
                </tr>
              </thead>

              <tbody>
              <tr>
                <td>978-0-316-01272-0</td>
                <td>The Catcher in the Rye</td>
                <td>J.D. Salinger</td>
                <td>Little, Brown and Company</td>
                <td>2024-01-15</td>
                <td><span class="status light-green-btn">Shared</span></td>
              </tr>

              <tr>
                <td>978-0-618-00221-7</td>
                <td>The Lord of the Rings</td>
                <td>J.R.R. Tolkien</td>
                <td>Houghton Mifflin Harcourt</td>
                <td>2023-12-15</td>
                <td><span class="status light-green-btn">Shared</span></td>
              </tr>
              <tr>
                <td>978-0-618-00221-7</td>
                <td>The Lord of the Rings</td>
                <td>J.R.R. Tolkien</td>
                <td>Houghton Mifflin Harcourt</td>
                <td>2023-12-15</td>
                <td><span class="status light-green-btn">Shared</span></td>
              </tr>

              </tbody>
            </table>
          </div>
          

         
          
        </div>
        
          
        </div>
        
      </div>

      
    </div>
</section>
</body>
</html>