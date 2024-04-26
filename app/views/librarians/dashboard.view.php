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
<?php $this->view('includes/navbar', $data) ?>
<?php $this->view('includes/sidenav', $data) ?>
<section class="home-section">

<div class="cardBox col-3">
  <div class="card chart-card">
    <div class="chart-card-1">
      <div class="numbers"><?= $ebook_total ?></div>
      <h1>TOTAL</h1>
      <div class="cardName">E-Books</div>
    </div> 
    <div class="chart-card-2">
      <div class="charts">
        <div class="charts-card">
          <div id="bar-chart" style="min-width:100px"></div>
        </div>
      </div>
    </div> 
  </div>

  <div class="card chart-card">
    <div class="chart-card-1">
      <div class="numbers"><?= $member_total ?></div>
      <h1>ACTIVITE</h1>
      <div class="cardName">Subscribers</div>
    </div> 
    <div class="chart-card-2">
      <div class="charts">
        <div class="charts-card">
          <div id="pie-chart" style="min-width:100px"></div>
        </div>
      </div>
    </div> 
  </div>

  <div class="card chart-card">
    <div class="chart-card-1">
   
            
        
      <div class="numbers">2</div>
      <h1>TOTAL</h1>
      <div class="cardName">Revenue</div>
    </div> 
    <div class="chart-card-2">
      <div class="charts">
        <div class="charts-card">
          <div id="revenue-chart" style="min-width:100px"></div>
        </div>
      </div>
    </div> 
  </div>
  



  
         
</div>

       
        <div class="details">
          <div class="history">
          <h2>Recent Activities</h2>
            <div class="cardHeader">
              <h3>Recently Added Ebooks</h3>
              <a href="<?= ROOT ?>/librarian/ebooks" class="btn">View All</a>
            </div>

            <table>
              <thead>
              <tr>
                <th> Title </th>
                <th> Author</th>
                <th> License type</th>
                <th> Categories</th>
                <th> Date added</th>
                
                
                </tr>
              </thead>
              <tbody>
              <?php 
                  if (!empty($ebook_new)) {
                      foreach ($ebook_new as $book) : ?>
                          <tr>
                      
                              <td><?= $book->title ?></td>
                              <td><?= $book->author_name ?></td>
                              <td><?= $book->license_type ?></td>
                              <td><?= $book->categories ?></td>
                              <td><?= $book->date_added ?></td>
                              
                              
                          </tr>
                      <?php endforeach; 
                  } else {
                      echo "No books found.";
                  }
                  ?>

              </tbody>
            </table>

            <div class="cardHeader">
              <h3>Latest Subscribers</h3>
              <!-- <a href="<?= ROOT ?>/librarian/ebooks" class="btn">View All</a> -->
            </div>

            <table>
              <thead>
              <tr>
                <th> Name</th>
                <th> Start Date </th>
                <th> End Date</th>
                <th> Subscription </th>
                
                </tr>
              </thead>
              <tbody>
              <?php 
                  if (!empty($Subscribers)) {
                      foreach ($Subscribers as $subscriber) : ?>
                          <tr>
                              <td><?= $subscriber->member_name ?></td>
                              <td><?= $subscriber->start_date ?></td>
                              <td><?= $subscriber->end_date ?></td>
                              <td><?= $subscriber->name ?></td>
                          </tr>
                      <?php endforeach; 
                  } else {
                      echo "No subscribers found.";
                  }
                  ?>

              </tbody>
            </table>

            

            

            
     
          

    

        
</div>
</section>
<?php

echo "<script>
        var ebooksCount = " . json_encode($ebooks_count) . ";
      </script>";

      echo "<script>
        var subscriptions = " . json_encode($subscriptions) . ";
      </script>";

     
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
<script src="<?= ROOT ?>/assets/js/chart.js"></script>
</body>
</html>