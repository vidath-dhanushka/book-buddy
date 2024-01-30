<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/admin/addLibrarian.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/sidenav.css">
 
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>
<section class="home-section">
   
<div class="dashDetails">
        <div class="dashUnit2">
          <div class="text1">
            <p>Share reading. </p>
          </div>
            <div class="text2">
            <p>built a book connected world.</p><br>
          </div>
          
          <div class="photo">
            
            <div class="Photo">
              <img src="./image/addLibrarian.png"  alt="" class="LOGO-img"><br>
              
             </div>
         
          
        </div>
        </div>
        
        
           

         
          <div class="dashUnit1">
                
         
            <form>
              <label for="profilep">Profile picture:</label>
              <div class="input1">
              <input type="text" id="profilep" name="profilep"><br><br><br>
              </div>
              <label for="fname">Full name:</label>
              <input type="text" id="fname" name="fname"><br><br><br>
              <label for="uname">User name:</label>
              <input type="text" id="uname" name="uname"><br><br><br>
              <label for="Password">Password:</label>
              <input type="text" id="Password" name="Password"><br><br><br>
              <label for="pnumber">Phone number:</label>
              <input type="text" id="pnumber" name="pnumber"><br><br><br>
              <label for="email">E mail:</label>
              <input type="text" id="email" name="email"><br><br><br>
              <label for="address">Address:</label>
              
            </form>
            <div class="button1">
              <button>Add</button>
            </div>
            
        </div> 
      </div>
      
    </div>

</section>
<script src="<?php echo ROOT ?>/assets/js/dropdown.js"></script>


</body>
</html>