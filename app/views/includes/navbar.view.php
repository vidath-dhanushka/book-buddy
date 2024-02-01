<div class="hero">
  <nav>
    <div class="logo">
      <a href="<?=ROOT?>/home"><img src="<?=ROOT?>/assets/images/logo.svg" alt="logo"></a>
    </div>
    
    <div class="account">

                <?php if(!Auth::logged_in()):?>
                    <p><a href="<?=ROOT?>/login">Login</a> |  <a href="<?=ROOT?>/signup">signup</a></p>
                <?php else:?>
                  
                    <p>
                    
                      
                      <span id='display-uname'><?=Auth::getUsername()?></span><a href="<?=ROOT?>/member/profile"><span id="user-btn" class="fas fa-user"></span></a> <a href="<?=ROOT?>/logout">Logout</a>
                    </p>
                <?php endif;?>
            </div>
  </nav>
</div>