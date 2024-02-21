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
    
   
    
    
    
   
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>

<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>

<section class="home-section">
        <div class="layout">
            <input name="nav" type="radio" class="nav book-radio" id="book" checked="checked" />
            <div class="page book-page">
                <div class="page-contents">
                    <main class="table">
                        <section class="table__header">
                            <h1>Courier Details</h1>
                            <div class="input-group">
                                <input type="search" placeholder="Search Data...">
                                <img src="<?= ROOT ?>/assets/images/member/search-black.svg" alt="">
                            </div>

                        </section>
                        <section class="table__body">
                            <table>
         
          <thead>
            <tr>
              <th>Company Name</th>
              <th>Reg_no</th>
              <th> Phone</th>
              <th>Email Address</th>
              <th> Rate_first_kg</th>
              <th> Rate_extra_kg</th>
              <th> Action <span class="icon-arrow">&UpArrow;</span></th>
            </tr>           
          </thead>
          <tbody>
            <tr>
              <td>ZTO Express</td>
              <td>001122</td>
              <td>0712343246</td>
              <td>navaz@gmail.com</td>
              <td>**</td>
              <td>**</td>
              <td><a href="#" class="action btn">Delete </a></td>
            </tr>
            <tr>
              <td>Blue Dart</td>              
              <td>001123</td>
              <td>0719043246</td>
              <td>sarath@gmail.com</td>
              <td>**</td>
              <td>**</td>
              <td><a href="#" class="action btn">Delete </a></td>
            </tr>
            <tr>
              <td>SF Express</td>
              <td>001124</td>
              <td>0712349046</td>
              <td>kalana@gmail.com</td>
              <td>**</td>
              <td>**</td>
              <td><a href="#" class="action btn">Delete </a></td>
            </tr>
            <tr>
              <td>Aramex</td>
              <td>001125</td>
              <td>0712389246</td>
              <td>ranmal@gmail.com</td>
              <td>**</td>
              <td>**</td>
              <td><a href="#" class="action btn">Delete </a></td>
            </tr>
            <tr>
              <td>ExpressPulse</td>
              <td>001126</td>
              <td>0712903246</td>
              <td>visal@gmail.com</td>
              <td>**</td>
              <td>**</td>
              <td><a href="#" class="action btn">Delete </a></td>
            </tr>
            <tr>
              <td>BlinkLogistics</td>
              <td>001126</td>
              <td>0712903246</td>
              <td>vikasitha@gmail.com</td>
              <td>****</td>
              <td>****</td>
              <td><a href="#" class="action btn">Delete </a></td>
            </tr>
            <tr>
              <td>DashMovers</td>
              <td>001126</td>
              <td>0712903246</td>
              <td>rathne@gmail.com</td>
              <td>***</td>
              <td>***</td>
              <td><a href="#" class="action btn">Delete </a></td>
            </tr>
          </tbody>
          </table>
                        </section>
                    </main>
                </div>
            </div>

            </div>
        </div>
    </section>
    <script src="<?= ROOT ?>/assets/js/table.js"></script>
</body>

</html>
       
        