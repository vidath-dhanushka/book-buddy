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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/notification.css">
</head>
<body>

<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>

<section class="home-section">

<section class="container">
    <header>Change Password</header>
    <form  class="form" method="post" >
    <?php if(message()):?>
    <div class="alert"><?=message('', true)?></div>
  <?php endif;?>
        <div class="input-box">
            <label>Username</label>
            <input type="text" name="username" value="<?=esc($row->username)?>" disabled />
        </div>
        <div class="input-box">
            <label>Current Password</label>
            <input type="password" name="current_pass" required />
            <?php if(!empty($errors['current_pass'])):?>
              <small class="err-msg" ><?=$errors['current_pass']?></small>
           <?php endif;?>
        </div>
        <div class="input-box">
            <label>New Password</label>
            <input type="password" name="new_pass" required />
            <?php if(!empty($errors['new_pass'])):?>
              <small class="err-msg" ><?=$errors['new_pass']?></small>
           <?php endif;?>
        </div>
        <div class="input-box">
            <label>Confirm Password</label>
            <input type="password" name="confirm_pass" required />
            <?php if(!empty($errors['confirm_pass'])):?>
              <small class="err-msg" ><?=$errors['confirm_pass']?></small>
           <?php endif;?>
        </div>
        <div class="column">
            <button type="reset">Cancel</button>
            <button type="submit">Save Changes</button>
        </div>
    </form>
    </section>
    </section>
   
  
<script src="<?=ROOT?>/assets/js/notification.js"></script>
<?php $this->view('includes/footer') ?>