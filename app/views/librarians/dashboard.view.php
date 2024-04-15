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
      <div class="numbers">2</div>
      <h1>TOTAL</h1>
      <div class="cardName">E-Books</div>
    </div> 
    <div class="chart-card-2">
      <div class="charts">
        <div class="charts-card">
          <div id="bar-chart"></div>
        </div>
      </div>
    </div> 
  </div>

  <div class="card chart-card">
    <div class="chart-card-1">
      <div class="numbers">2</div>
      <h1>ACTIVITE</h1>
      <div class="cardName">Subscribers</div>
    </div> 
    <div class="chart-card-2">
      <div class="charts">
        <div class="charts-card">
          <div id="pie-chart"></div>
        </div>
      </div>
    </div> 
  </div>

  <div class="card chart-card">
    <div class="chart-card-1">
   
            <div id="area-chart"></div>
        
      <div class="numbers">2</div>
      <h1>TOTAL</h1>
      <div class="cardName">Revenue(Yearly)</div>
    </div> 
    <div class="chart-card-2">
      <div class="charts">
        <div class="charts-card">
          <div id="revenue-chart"></div>
        </div>
      </div>
    </div> 
  </div>
  



  
         
</div>

       
        <div class="details">
          <div class="history">
          <h2>Recent Activities</h2>
            <div class="cardHeader">
              <h3>E-Books</h3>
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
              </tbody>
            </table>

            <div class="cardHeader">
              <h3>Subscribers</h3>
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
              </tbody>
            </table>

            <div class="cardHeader">
              <h3>Copyright</h3>
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
              </tbody>
            </table>

            <div class="cardHeader">
              <h3>Subscriptions</h3>
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
              </tbody>
            </table>
            

            
          </div>
          

    

        
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
<script src="<?= ROOT ?>/assets/js/chart.js"></script>
</body>
</html>