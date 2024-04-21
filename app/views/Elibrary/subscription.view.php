<?php $this->view('includes/header') ?>
<?php $this->view('Elibrary/includes/elib_nav') ?>
<?php if(Auth::logged_in()):?>
  <main class="subscription" >
  <div class="current-plan">
    <div class="wrapper" id="subscription">
      <div class="card-area">
        <div class="title">Current Plan</div>
        <div class="current cards">
       
          <div class="current price-details">
            <span class="price"><?= $user_subscription->price?></span>
          </div>
          <div class="current name"><p><?= $user_subscription->name?></p></div>
          <?php
           $user_subscription->features = unserialize($user_subscription->features); 
          ?>
          <ul class="current features">
            <?php foreach($user_subscription->features as $feature): ?>
             <li><i class="fas fa-check"></i><span><?php echo $feature; ?></span></li>
            <?php endforeach; ?>
          </ul>
          
        </div>
      </div>
    </div>
  </div>
<?php endif;?>
<section class="pricing" id="sub-pricing">
  <div class="card">
    <div class="title">Upgrade Your Subscription Plan</div>
    <div class="content">
    <?php foreach($subscriptions as $index => $subscription): ?>
        <input type="radio" name="slider" id="tab-<?= $index+1 ?>" <?php if ($subscription->id === $user_subscription->subscription_id) echo 'checked'; ?>>
        <label for="tab-<?= $index+1 ?>" class="box" style="border: 2px solid #D9D9D9;" data-index="<?= $index+1 ?>">
            <div class="plan">
                <span class="circle"></span>
                <span class="yearly"><?= $subscription->name ?></span>
            </div>
            <span class="price"><?= $subscription->price ?> Rs/month</span>
        </label>
    <?php endforeach; ?>

    </div>
  </div> 
  <div class="wrapper" style="border: 2px solid #D9D9D9;">
      <?php foreach($subscriptions as $index => $subscription): ?>
      <div class="card-area">
        <div class="cards" >
          <div class="row" id="row-<?= $index+1 ?>" style="display: none;">
            <div class="price-details">
              <span class="price"><?= $subscription->price ?></span>
              <p><?= $subscription->name ?></p>
            </div>
            <ul class="features">
              <?php foreach(unserialize($subscription->features) as $feature): ?>
                <li><i class="fas fa-check"></i><span><?= $feature ?></span></li>
              <?php endforeach; ?>
            </ul>  
          </div>
        </div>
      </div>
    
  <?php endforeach; ?>
  <a href="<?= ROOT ?>/payment">
    <button>Upgrade plan</button>
</a>

  </div>
</section>
    

</main>
<?php $this->view('includes/footer') ?>

<script>
window.onload = function() {
    var radios = document.getElementsByName('slider');

    for(var i = 0; i < radios.length; i++) {
        radios[i].addEventListener('change', function() {
            // Get the index of the selected radio button
            var selectedIndex = parseInt(this.id.split('-')[1]);
            
            // Hide all rows
            var allRows = document.querySelectorAll('.row');
            for(var j = 0; j < allRows.length; j++) {
                allRows[j].style.display = 'none';
            }

            // Show the selected row
            var selectedRow = document.getElementById('row-' + selectedIndex);
            if (selectedRow) {
                selectedRow.style.display = 'block';
            }

            // Reset the background color of all labels
            var allLabels = document.querySelectorAll('.box');
            for(var k = 0; k < allLabels.length; k++) {
                allLabels[k].style.backgroundColor = '#fff';
            }

            // Change the background color of the selected label
            var selectedLabel = document.querySelector('.box[data-index="' + selectedIndex + '"]');
            if (selectedLabel) {
                selectedLabel.style.backgroundColor = '#818AF9'; // Change this to your desired color
            }
        });
        if (radios[i].checked) {
            var selectedIndex = parseInt(radios[i].id.split('-')[1]);
            var selectedRow = document.getElementById('row-' + selectedIndex);
            var selectedLabel = document.querySelector('.box[data-index="' + selectedIndex + '"]');
            if (selectedLabel) {
                selectedLabel.style.backgroundColor = '#818AF9'; // Change this to your desired color
            }
            if (selectedRow) {
                selectedRow.style.display = 'block';
            }
        }
    }
};
</script>
