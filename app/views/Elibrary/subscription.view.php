<?php $this->view('includes/header') ?>
<?php $this->view('Elibrary/includes/elib_nav') ?>
<?php if(Auth::logged_in()):?>
  <div class="current-plan">
    <div class="wrapper" id="subscription">
      <div class="card-area">
      <div class="title">Current Plan</div>
        <div class="current cards">
       
          <div class="current price-details">
            <span class="price">0</span>
          </div>
          <div class="current name"><p>Lorem ipsum</p></div>
          <ul class="current features">
            <li><i class="fas fa-check"></i><span>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus</span></li>
            <li><i class="fas fa-check"></i><span>Vivamus suscipit tortor eget felis porttitor volutpat</span></li>
            <li><i class="fas fa-check"></i><span>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</span></li>
          </ul>
          
        </div>
      </div>
    </div>
  </div>
<?php endif;?>
<section class="pricing" id="sub-pricing">
 <div class="card">
    <div class="title">Choose Your Subscription Plan</div>
  <div class="content">
    <input type="radio" name="slider" id="tab-1">
    <input type="radio" name="slider" id="tab-2">
    <input type="radio" name="slider" id="tab-3">

    <label for="tab-1" class="box first" style="border: 2px solid #D9D9D9;">
      <div class="plan">
      <span class="circle"></span>
      <span class="yearly">Free</span>
    </div>
        <span class="price">0$/month</span>
    </label>
    <label for="tab-2" class="box second" style="border: 2px solid #D9D9D9;">
      <div class="plan">
      <span class="circle"></span>
      <span class="yearly">Basic</span>
    </div>
        <span class="price">00$/month</span>
    </label>
    <label for="tab-3" class="box third" style="border: 2px solid #D9D9D9;">
      <div class="plan">
      <span class="circle"></span>
        <span class="yearly">Premium</span>
      </div>
        <span class="price">000$/month</span>
    </label>
  </div>
 </div>
 <div class="wrapper" style="border: 2px solid #D9D9D9;">
    <div class="card-area">
      <div class="cards" >
        <div class="row" id="row-1">
          <div class="price-details">
            <span class="price">0</span>
            <p>Lorem ipsum</p>
          </div>
          <ul class="features">
            <li><i class="fas fa-check"></i><span>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus</span></li>
            <li><i class="fas fa-check"></i><span>Vivamus suscipit tortor eget felis porttitor volutpat</span></li>
            <li><i class="fas fa-check"></i><span>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</span></li>
          </ul>
          
        </div>
        <div class="row" id="row-2">
          <div class="price-details">
            <span class="price">00</span>
            <p>Lorem ipsum</p>
          </div>
          <ul class="features">
            <li><i class="fas fa-check"></i><span>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus</span></li>
            <li><i class="fas fa-check"></i><span>Vivamus suscipit tortor eget felis porttitor volutpat</span></li>
            <li><i class="fas fa-check"></i><span>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</span></li>
            <li><i class="fas fa-check"></i><span>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus</span></li>   
          </ul>
          
        </div>

        <div class="row" id="row-3">
          <div class="price-details">
            <span class="price">000</span>
            <p>Lorem ipsum</p>
          </div>
          <ul class="features">
            <li><i class="fas fa-check"></i><span>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus</span></li>
            <li><i class="fas fa-check"></i><span>Vivamus suscipit tortor eget felis porttitor volutpat</span></li>
            <li><i class="fas fa-check"></i><span>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</span></li>
            <li><i class="fas fa-check"></i><span>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus</span></li>
            <li><i class="fas fa-check"></i><span>Vivamus suscipit tortor eget felis porttitor volutpat</span></li>
            
          </ul>
          
        </div>
      </div>
    </div>
    
    <button>Choose plan</button>
  </div>

<script>
 window.onload = function() {
  var radios = document.getElementsByName('slider');

  for(var i = 0; i < radios.length; i++) {
    radios[i].addEventListener('change', function() {
      // Hide all rows
      document.getElementById('row-1').style.display = 'none';
      document.getElementById('row-2').style.display = 'none';
      document.getElementById('row-3').style.display = 'none';

      // Reset the color of all list items
      var allListItems = document.querySelectorAll('.box');
      for(var j = 0; j < allListItems.length; j++) {
        allListItems[j].style.backgroundColor = '#fff';

      }

      // Show the correct row and change the color of the list items based on which radio button is checked
      if(document.getElementById('tab-1').checked) {
        document.getElementById('row-1').style.display = 'block';
        var listItems = document.querySelectorAll('.box.first');
        for(var j = 0; j < listItems.length; j++) {
          listItems[j].style.background ="#818AF9";  // Change this to your desired color
        }
      } else if(document.getElementById('tab-2').checked) {
        document.getElementById('row-2').style.display = 'block';
        var listItems = document.querySelectorAll('.box.second');
        for(var j = 0; j < listItems.length; j++) {
          listItems[j].style.background ="#818AF9";  // Change this to your desired color
        }
      } else if(document.getElementById('tab-3').checked) {
        document.getElementById('row-3').style.display = 'block';
        var listItems = document.querySelectorAll('.box.third');
        for(var j = 0; j < listItems.length; j++) {
          listItems[j].style.background ="#818AF9";  // Change this to your desired color
        }
      }
    });
  }
};



</script>
</body>

</html>