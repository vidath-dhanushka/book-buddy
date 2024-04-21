
<div id="myModal-3" class="modal" >
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">×</span>
        <div class="upgrade-card">
        <?php if (isset($_SESSION['user_id'])): // Check if user is logged in ?>
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
        <?php else: ?>
            <p class="upgrade-alert">Please Log In</p>
            <p class="upgrade-message">
                To access this book, please log in or sign up.
            </p>
            <div class="upgrade-action">
                <a class="upgrade-cancel" href="<?= ROOT ?>/Elibrary/view_ebook/<?= $ebook->id ?>">
                    Do this later
                </a><br>
                <a class="upgrade-submit" href="<?= ROOT ?>/login">
                    Log In
                </a>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>

