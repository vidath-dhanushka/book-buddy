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
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>

<section class="home-section">
<section class="container">
      <header>Profile Information</header>
      <form action="#" class="form" enctype="multipart/form-data">
          <h3>Personal Details</h3>
          <div class="column">
            <div class="input-box">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
              <div class="upload">
                <img src="img/<?php echo $user['image']; ?>" id = "image">
                <div class="rightRound" id = "upload">
                  <input type="file" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">
                  <i class = "fa fa-camera"></i>
                </div>
        
                <div class="leftRound" id = "cancel" style = "display: none;">
                  <i class = "fa fa-times"></i>
                </div>
                
              </div>
            </div>
            
          </div>
        
  <div class="column">
    <div class="input-box">
      <label>First Name</label>
      <input type="text" placeholder="Enter First Name" value="John" required />
    </div>
    <div class="input-box">
      <label>Last Name</label>
      <input type="text" placeholder="Enter Last Name" value="Doe" required />
    </div>
  </div>
  <div class="column">
    <div class="input-box">
      <label>Phone Number</label>
      <input type="number" placeholder="Enter phone number" value="1234567890" required />
    </div>
    <div class="input-box">
      <label>Birth Date</label>
      <input type="date" placeholder="Enter birth date" value="1990-01-01" required />
    </div>
    <div class="input-box">
      <label>NIC Number</label>
      <input type="text" placeholder="Enter NIC number" value="123456789V" required />
    </div>
  </div>
  
  <div class="column">
  <div class="input-box">
    <label>Username</label>
    <input type="text" placeholder="Enter username" value="johndoe" required />
  </div>
    <div class="input-box">
      <label>Email</label>
      <input type="email" placeholder="Enter email" value="johndoe@example.com" required />
    </div>
    
  </div>
  
  <h3>Postal Details</h3>
  <div class="input-box">
    <label>Address</label>
    <input type="text" placeholder="Enter Address" value="123 Main St" required />
  </div>
  <div class="column">
    <div class="input-box">
      <label>City</label>
      <input type="text" placeholder="Enter City" value="Colombo" required />
    </div>
    <div class="input-box">
      <label>Postal Code</label>
      <input type="number" placeholder="Postal Code" value="12345" required />
    </div>
  </div>
  <div class="column">
              <div class="select-box"> 
                <select>
                  <option hidden>Province</option>
                  <!-- <option>America</option>
                  <option>Japan</option>
                  <option>India</option>
                  <option>Nepal</option> -->
                </select>
              </div>
              <div class="select-box">
                <select>
                  <option hidden>District</option>
                  <!-- <option>America</option>
                  <option>Japan</option>
                  <option>India</option>
                  <option>Nepal</option> -->
                </select>
              </div>
            </div>
  <div class="column">
    <div class="input-box">
      <label>City</label>
      <input type="text" placeholder="Enter City" value="Colombo" required />
    </div>
    <div class="input-box">
      <label>Postal Code</label>
      <input type="number" placeholder="Postal Code" value="12345" required />
    </div>
  </div>

  <div class="column">
    <button>Cancel</button>
    <button>Update Profile</button>
  </div>
      </form>
    </section>
    </section>
    <script type="text/javascript">
      document.getElementById("fileImg").onchange = function(){
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

        document.getElementById("cancel").style.display = "block";
        document.getElementById("confirm").style.display = "block";

        document.getElementById("upload").style.display = "none";
      }

      var userImage = document.getElementById('image').src;
      document.getElementById("cancel").onclick = function(){
        document.getElementById("image").src = userImage; // Back to previous image

        document.getElementById("cancel").style.display = "none";
        document.getElementById("confirm").style.display = "none";

        document.getElementById("upload").style.display = "block";
      }
    </script>
    

    <?php
    if(isset($_FILES["fileImg"]["name"])){
      $id = $_POST["id"];

      $src = $_FILES["fileImg"]["tmp_name"];
      $imageName = uniqid() . $_FILES["fileImg"]["name"];

      $target = "img/" . $imageName;

      move_uploaded_file($src, $target);

      $query = "UPDATE tb_user SET image = '$imageName' WHERE id = $id";
      mysqli_query($conn, $query);

      header("Location: index.php");
    }
    ?>

<?php $this->view('includes/footer') ?>