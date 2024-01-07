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
    <header>Change Password</header>
    <form action="#" class="form" >
        <div class="input-box">
            <label>Username</label>
            <input type="text" value="A. Perera" required />
        </div>
        <div class="input-box">
            <label>Current Password</label>
            <input type="password"  required />
        </div>
        <div class="input-box">
            <label>New Password</label>
            <input type="password"  required />
        </div>
        <div class="input-box">
            <label>Confirm Password</label>
            <input type="password"  required />
        </div>
        <div class="column">
            <button>Cancel</button>
            <button>Save Changes</button>
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