<?php $this->view('includes/header') ?>
<?php $this->view('includes/nav')?>

<?php $this->view('includes/sidenav', $data) ?>
<section class="home-section">
<div class="profile-box">
        <div class="cardBox col-1-3">
          <div class="profile col-1-1">
            
            <div class="col-1"> <b> My Account</b></div>

              <div class="col-2">
              <form method="post" class="registration-form">
    <div class="profile-pic-container full-width">
        <img id="profile-pic" src="<?= ROOT ?>/assets/images/Avatar.png" alt="Profile Picture">
        <div class="overlay">
            <img id="camera-icon" src="<?= ROOT ?>/assets/images/camera.png" alt="Upload">
            <input type="file" id="fileInput" name="profilePic">
        </div>
    </div>
    <button id="removeBtn" style="display:none;">Remove</button>
              </from>
                
              </div>
              <div class="col-3">A. Perera <br> <span>Someone@gmail.com</span></div>
              <div class="col-4">Basic</div>
              <div class="col-5">Change Subscription</div> 
          </div>

          <div class="box">
    <h2>Change password</h2>
    <form action="/change-password" method="post">
        <label for="current-password">Current password</label>
        <input type="password" id="current-password" name="currentPassword" required>

        <label for="new-password">New password</label>
        <input type="password" id="new-password" name="newPassword" required>

        <label for="confirm-new-password">Confirm new password</label>
        <input type="password" id="confirm-new-password" name="confirmNewPassword" required>

        <input type="submit">
    </form>
</div>

        </div> 
      </div>
      <div class="form-section box ">
      <form method="post" class="reset-form grid-3">
    
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" id="firstName" name="firstName">
        <!-- <span class="form-invalid">Error</span> -->

        <label for="lastName">Last Name</label>
        <input type="text" id="lastName" name="lastName">
        <!-- <span class="form-invalid">Error</span> -->
   
        <label for="nicNumber">NIC Number</label>
        <input type="text" id="nicNumber" name="nicNumber">
        <!-- <span class="form-invalid">Error</span> -->
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address">
        <!-- <span class="form-invalid">Error</span> -->
 
  
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
        <!-- <span class="form-invalid">Error</span> -->


        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        <!-- <span class="form-invalid">Error</span> -->
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob">
        <!-- <span class="form-invalid">Error</span> -->
  
    
        <label for="phoneNumber">Phone Number</label>
        <input type="tel" id="phoneNumber" name="phoneNumber">
        <!-- <span class="form-invalid">Error</span> -->
   
  
    <div class="profile-btn">
    <input type="submit" value="Save Changes">
    <input type="button" value="Cancel">
    </div>
    
    </div>
</form>

</section>
<script src="<?= ROOT ?>/assets/js/profile.js"></script>
