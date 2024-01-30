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
<?php 
  $message = message('', true);
  if($message): 
    $class = empty($errors) ? 'alert' : 'error';  
  ?>
    <div class="<?= $class; ?>"><?= $message; ?></div>
<?php endif; ?>
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
  <div class="column">
    <div class="input-box">
      <label>Phone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter phone number" value="<?=set_value('Phone',$row->phone)?>" required />
      <?php if(!empty($errors['phone'])):?>
        <small class="err-msg"><?=$errors['phone']?></small>
      <?php endif;?>
    </div>
    <div class="input-box"></div>
  </div>
  
  <h3>Postal Details</h3>
  <div class="column">
    <div class="input-box">
      <label>Address</label>
      <input type="text" id="address" name="address" placeholder="Enter Address" value="<?=set_value('address',$row->address)?>" required />
      <?php if(!empty($errors['address'])):?>
        <small class="err-msg"><?=$errors['address']?></small>
      <?php endif;?>
    </div>
 
    <div class="input-box">
      <label>Contact Name</label>
      
      <input type="text" id="contactName" name="contactName" placeholder="Enter contact name" value="<?=set_value('contactName',$row->contactName)?>" />
      <?php if(!empty($errors['contactName'])):?>
        <small class="err-msg"><?=$errors['contactName']?></small>
      <?php endif;?>
    </div>
  </div>
    <?php 
      $provinceIdToFind = $row->province;
      $selectedProvince = current(array_filter($provinces, function($province) use ($provinceIdToFind) { return $province->id == $provinceIdToFind; }));
      $cityIdToFind = $row->city;
      $selectedCity = current(array_filter($cities, function($city) use ($cityIdToFind) { return $city->id == $cityIdToFind; }));
      
    ?>
   <div class="column">
    <div class="select-box">
      
      <select id="province" name="province">
        <option hidden><?= isset($selectedProvince->provinceName) ? set_value('Province', $selectedProvince->provinceName) : 'Province' ?></option>
        <?php if(!empty($provinces)):?>
          <?php foreach($provinces as $province): ?>
            <option  value="<?=$province->id?>"><?=esc($province->provinceName)?></option>
          <?php endforeach; ?>  
        <?php endif;?>
        
      </select>
      <?php if(!empty($errors['province'])):?>
        <small class="err-msg"><?=$errors['province']?></small>
      <?php endif;?>
    </div>
    <div class="select-box">
    
      <select id="city" name="city" disabled>
      
        <option hidden><?= isset($selectedCity->cityName) ? set_value('City', $selectedCity->cityName) : 'City' ?></option>
        
        <?php if(!empty($cities)):?>
          <?php foreach($cities as $city): ?>
            <option  value="<?=$city->id?>"><?=esc($city->cityName)?></option>
          <?php endforeach; ?>  
        <?php endif;?>
      </select>
    </div> 
  </div> 

  <div class="column">
    <div class="input-box">
      <label>Postal Code</label>
      <input type="number" id="postal" name="postalCode" placeholder="Enter postal code" value="<?=set_value('Postal code',$row->postalCode)?>" />
      <?php if(!empty($errors['postalCode'])):?>
        <small class="err-msg"><?=$errors['postalCode']?></small>
      <?php endif;?>
    </div>
    <div class="input-box">
    </div>
  </div>
   
  <div class="column">
    <button type='reset' >Cancel</button>
    <button type='submit'>Update Profile</button>
  </div>
</form>

    </section>
    </section>

<?php else:?>
    <div>
       Profile is not found..
    </div>
<?php endif;?>
<script>
   
  function load_image(file){
    var mylink = window.URL.createObjectURL(file);

    document.querySelector('#image').src = mylink;
    console.log(mylink);
  }


  document.getElementById('fileImg').addEventListener('change', function(e){
    var fileInput = document.getElementById('fileImg');
    var filePath = fileInput.value;
    document.getElementById("cancel").style.display = "block";
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        document.getElementsByClassName('err-msg')[0].innerHTML = 'Please upload file having extensions .jpeg/.jpg/.png only.';
        fileInput.value = '';
    } else {
        document.getElementsByClassName('err-msg')[0].innerHTML = '';
    }
  });

  var userImage = document.getElementById('image').src;
      document.getElementById("cancel").onclick = function(){
        document.getElementById("image").src = userImage; // Back to previous image

        document.getElementById("cancel").style.display = "none";
        document.getElementById("confirm").style.display = "none";

        document.getElementById("upload").style.display = "block";
      }


  // dropdown - provinces -> city

  var provinces = <?php echo json_encode($provinces); ?>;
  var cities = <?php echo json_encode($cities); ?>;
  console.log(cities);

document.getElementById("province").onchange = function() {
  var selectedOption = this.options[this.selectedIndex];
  var citySelect = document.getElementById("city");
  var provinceId = selectedOption.value;
  
  if (selectedOption.hidden ) {
    citySelect.disabled = true;
  } else {
    var relevantCities = cities.filter(function(city) {
      return city.provinceID == provinceId;
    });
    
    citySelect.innerHTML = "";

    var defaultOption = document.createElement("option");
    defaultOption.text = "City";
    citySelect.add(defaultOption);

    relevantCities.forEach(function(city) {
      var option = document.createElement("option");
      option.value = city.id;
      option.text = city.cityName;
      citySelect.add(option);
    });
    citySelect.disabled = false;
  }
}

// Trigger the onchange event to populate the city dropdown when the page loads
document.getElementById("province").onchange();



</script>

<?php $this->view('includes/footer') ?>