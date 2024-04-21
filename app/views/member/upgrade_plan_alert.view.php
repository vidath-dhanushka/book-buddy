
<div id="myModal-3" class="modal" >
        <!-- Modal content -->
    <div class="modal-content">
        <span class="close">×</span>
        <div class="upgrade-card">
        <div class="upgrade-header">
          <span class="upgrade-icon">
            <img src="<?= ROOT ?>/assets/images/member/upgrade.png" width="100px" >
          </span>
          <p class="upgrade-alert">Upgrade Your Subscription</p>
        </div>
      
        <p class="upgrade-message">
            To access this book, please consider upgrading your subscription.
        </p>
      
        <div class="upgrade-action">
          
          <a class="upgrade-cancel" href="<?= ROOT ?>/Elibrary/view_ebook/<?= $ebook->id ?>">
            Do this later
          </a><br>
          <a class="upgrade-submit" href="<?= ROOT ?>/Elibrary/subscription">
            Upgrade
          </a>
        </div>
      </div>
          
    </div>
</div>
