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
<?php if(!empty($row)):?>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>

    

    

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
              <img src="<?=ROOT?>/assets/images/admin/addLibrarian.png"  alt="" class="LOGO-img"><br>
              
             </div>
         
          
        </div>
        </div>
        
        
           

         
          <div class="dashUnit1">
                
         
            <form>
             
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
              <input type="text" id="Address" name="Address"><br><br><br>
            </form>
            <div class="button1">
              <button>Add</button>
            </div>
            
        </div> 
      </div>
      
    </div>

    <?php else:?>
    <div>
       Dashboard is not found..
    </div>
<?php endif;?>
</body>
</html>