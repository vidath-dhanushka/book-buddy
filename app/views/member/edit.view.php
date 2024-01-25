<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/navbar.css">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/sidenav.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/edit-form.css">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/profile-pic.css">
</head>
<body>
<?php if(!empty($row)):?>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>

<section class="home-section">

<section class="container">
<?php if(message()):?>
    <div class="alert"><?=message('', true)?></div>
  <?php endif;?>
      <header>Profile Information</header>
      <form method="post" class="form" enctype="multipart/form-data" id="upload-form">
     
  <h3>Personal Details</h3>
  <div class="column">
      <div class="input-box">
        <div class="upload">
          <img src="<?=ROOT?>/<?=($row->user_image)?>" id = "image">
          <div class="rightRound" id = "upload">
            <input onchange="load_image(this.files[0])" type="file" name="image" id = "fileImg" accept=".jpg, .jpeg, .png">
           
            <i class = "fa fa-camera"></i>
          </div>
          
          <div class="leftRound" id = "cancel" style = "display: none;">
            <i class = "fa fa-times"></i>
          </div>
          
        </div>
        <?php if(!empty($errors['user_image'])):?>
              <small class="err-msg" id="centered-error"><?=$errors['user_image']?></small>
           <?php endif;?>
      </div>
      
  </div>
  <div class="column">
    <div class="input-box">
      <label>First Name</label>
      <input type="text" id="firstname" name="firstname" placeholder="Enter First Name" value="<?=set_value('firstname',$row->firstname)?>" required />
      <?php if(!empty($errors['firstname'])):?>
        <small class="err-msg"><?=$errors['firstname']?></small>
      <?php endif;?>
    </div>
    <div class="input-box">
      <label>Last Name</label>
      <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name" value="<?=set_value('lastname',$row->lastname)?>" required />
      <?php if(!empty($errors['lastname'])):?>
        <small class="err-msg"><?=$errors['lastname']?></small>
      <?php endif;?>
    </div>
  </div>
  <div class="column">
    <div class="input-box">
      <label>Phone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter phone number" value="<?=set_value('Phone',$row->phone)?>" required />
      <?php if(!empty($errors['phone'])):?>
        <small class="err-msg"><?=$errors['phone']?></small>
      <?php endif;?>
    </div>
    <!-- <div class="input-box">
      <label>Birth Date</label>
      <input type="date" id="birthdate" name="birthdate" placeholder="Enter birth date" value="1990-01-01" required />
      
    </div> -->
    <!-- <div class="input-box">
      <label>NIC Number</label>
      <input type="text" id="nic" name="nic" placeholder="Enter NIC number" value="123456789V" required />
    </div> -->
  </div>

  <div class="column">
    <div class="input-box">
      <label>Username</label>
      <input type="text" id="username" name="username" placeholder="Enter username" value="<?=set_value('username',$row->username)?>" required />
      <?php if(!empty($errors['username'])):?>
        <small class="err-msg"><?=$errors['username']?></small>
      <?php endif;?>
    </div>
    <div class="input-box">
      <label>Email</label>
      <input type="email" id="email" name="email" placeholder="Enter email" value="<?=set_value('email',$row->email)?>" required />
      <?php if(!empty($errors['email'])):?>
        <small class="err-msg"><?=$errors['email']?></small>
      <?php endif;?>
    </div>
  </div>
  <h3>Postal Details</h3>
  <div class="input-box">
    <label>Address</label>
    <input type="text" id="address" name="address" placeholder="Enter Address" value="<?=set_value('address',$row->address)?>" required />
    <?php if(!empty($errors['address'])):?>
      <small class="err-msg"><?=$errors['address']?></small>
    <?php endif;?>
  </div>
  <!-- <div class="column">
    <div class="input-box">
      <label>City</label>
      <input type="text" id="city" name="city" placeholder="Enter City" value="Colombo" required />
    </div>
    <div class="input-box">
      <label>Postal Code</label>
      <input type="number" id="postalcode" name="postalcode" placeholder="Postal Code" value="12345" required />
    </div>
  </div> -->
  <!-- <div class="column">
    <div class="select-box"> 
      <select id="province" name="province">
        <option hidden>Province</option>
        <option>America</option>
        <option>Japan</option>
        <option>India</option>
        <option>Nepal</option>
      </select>
    </div>
    <div class="select-box">
      <select id="district" name="district">
        <option hidden>District</option>
        <option>America</option>
        <option>Japan</option>
        <option>India</option>
        <option>Nepal</option>
      </select>
    </div> -->
  <!-- </div> -->
  <!-- <div class="column">
    <div class="input-box">
      <label>City</label>
      <input type="text" id="city2" name="city2" placeholder="Enter City" value="Colombo" required />
    </div>
    <div class="input-box">
      <label>Postal Code</label>
      <input type="number" id="postalcode2" name="postalcode2" placeholder="Postal Code" value="12345" required />
    </div>
  </div> -->

  <div class="column">
    <button>Cancel</button>
    <button type='submit'>Update Profile</button>
  </div>
</form>

    </section>
    </section>
<script>
   
  function load_image(file){
    var mylink = window.URL.createObjectURL(file);

    document.querySelector('#image').src = mylink;
    console.log(mylink);
  }


  document.getElementById('fileImg').addEventListener('change', function(e){
    var fileInput = document.getElementById('fileImg');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        document.getElementsByClassName('err-msg')[0].innerHTML = 'Please upload file having extensions .jpeg/.jpg/.png only.';
        fileInput.value = '';
    } else {
        document.getElementsByClassName('err-msg')[0].innerHTML = '';
    }
});
</script>

    
</script>

<?php else:?>
    <div>
       Profile is not found..
    </div>
<?php endif;?>
<?php $this->view('includes/footer') ?>