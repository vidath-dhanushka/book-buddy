<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/profile.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/sidenav.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/dropdown.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/profiletable.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/tabmenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>
<section class="home-section">

<div class="dashDetails">
        <div class="dashUnit1">
          
          <div class="account">
            <span> <strong>My Account</strong></span><br><br><br>
          </div>
          <div class="image">
            <img src="./image/avatar.png" alt="" class="LOGO-img"><br><br>
          </div>
          <div class="name">
            <span>B. Kavisha </span><br><br>
          </div>
          <div class="Email">
            <span>Kavi@gmail.com</span><br><br>
          </div>
          <div class="button2">
          <button>Change Plan</button>
        </div>
        </div>


      <div class="dashUnit2">
        <div class="changepassword">
          <span><strong>Change password</strong></span><br><br><br>
        </div>
        <div class="pasword">
              
            
            <form>
                <label for="currentP">Current password:</label>
                <input type="text" id="currentP" name="currentP"><br><br><br>
                <label for="newP">New Pasword:</label>
                <input type="text" id="newP" name="newP"><br><br><br>
                <label for="confirmP">Confirm new password:</label>
                <input type="text" id="confirmP" name="confirmP"><br><br><br>
              </form>
              <div class="button1">
                <button>Change Password</button>
              </div>
          </div>     
      </div>

      <div class="dashUnit3">
          
        <div class="photo">
          
        <div class="image">
          <img src="./image/download.png" alt="" class="LOGO-img"><br><br>
        </div>
       
        <div class="button2">
        <button>Upload photo</button>
      </div>
      </div>
      </div>

       


         <div class="dashUnit4">
                
         
          <form>
            <label for="fname">Full name:</label>
            <input type="text" id="fname" name="fname"><br><br><br>
            <label for="uname">User name:</label>
            <input type="text" id="uname" name="uname"><br><br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email"><br><br><br>
            <label for="dob">Date of Birth:</label>
            <input type="text" id="dob" name="dob"><br><br><br>
            <label for="pnumber">Phone Number:</label>
            <input type="text" id="pnumber" name="pnumber"><br><br><br>
          </form>
          <div class="button1">
            <button>Save</button>
          </div>
         
      </div>
    </div>

</section>
<script src="<?php= ROOT ?>/assets/js/dropdown.js"></script>

</body>
</html>