<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/admin/dashboard.css">

    <link rel="stylesheet" href="<?=ROOT?>/assets/css/sidenav.css">
    
   
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
<?php if(!empty($row)):?>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>
<section class="home-section">
<div class="cardBox  col-6">
          

          <div class="card">
            <div>
              <h1>TOTAL BOOKS</h1>
              <div class="numbers">50</div>

            </div> 
          </div>

          <div class="card">
            <div>
              <h1>TOTAL MEMBERS</h1>
              <div class="numbers">23</div>
            </div>
          </div>

          <div class="card">
            <div>
              <h1>LOGGING USERS</h1>
              <div class="numbers">12</div>
            </div>
         
         </div>

         <div class="card">
            <div>
              <h1>ONGOING ODERS</h1>
              <div class="numbers">10</div>
            </div>
         
         </div>

         <div class="card">
            <div>
              <h1>COMPLETE ORDERS</h1>
              <div class="numbers">22</div>
            </div>
         
         </div>

        </div>

       
        <div class="details">
          <div class="history">
          
            <div class="cardHeader">
              
              <h3>New Members</h3>
              <a href="<?= ROOT ?>/member/borrowing" class="btn">View All</a>
            </div>

            <table>
              <thead>
              <tr>
                
                <th> Member Id </th>
                <th> User Name</th>
                <th> Email </th>
                <th> Status</th>
                </tr>
              </thead>
              <tbody>
              <tr>
               
                <td>2</td>
                <td>Michel David</td>
                <td>User1</td>
                <td><p class="status returned">Returned</p></td>
              </tr>
              <tr>
               
                <td>3</td>
                <td>Mark Daniel</td>
                <td>User3</td>
                <td><p class="status borrowed">Borrowed</p></td>
              </tr>
              <tr>
               
                <td>6</td>
                <td>Kevin George</td>
                <td>User5</td>
                <td><p class="status overdue">Overdue</p></td>
              </tr>
              </tbody>
            </table>

            <div class="cardHeader">
              
              <h3>New Books</h3>
              <a href="<?= ROOT ?>/member/borrowing" class="btn">View All</a>
            </div>
            <table>
              <thead>
              <tr>
                <th> Id </th>
                <th> Title </th>
                <th> Author</th>
                </tr>
              </thead>

              <tbody>
              <tr>
                <td>1</td>
                <td>The Great Gatsby</td>
                <td>F. Scott Fitzgerald</td>
              </tr>
              <tr>
                <td>2</td>
                <td>To Kill a Mockingbird</td>
                <td>Harper Lee</td>
              </tr>

              <tr>
                <td>3</td>
                <td>The Great Gatsby</td>
                <td>George Orwell</td>
              </tr>

            </tbody>
            </table>
          </div>
          

          
</div>
  
</section>
<script src="<?= ROOT ?>/assets/js/dropdown.js"></script>
<?php else:?>
    <div>
       Profile is not found..
    </div>
<?php endif;?>
</body>
</html>