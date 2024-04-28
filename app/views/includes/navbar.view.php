<div class="hero">
  <nav id="navbar">
    <div class="logo">
      <a href="<?=ROOT?>/home"><img src="<?=ROOT?>/assets/images/logo.svg" alt="logo"></a>
    </div> 
    <div class="account">
        <?php if(!Auth::logged_in()):?>
            <p><a href="<?=ROOT?>/login">Login</a> |  <a href="<?=ROOT?>/signup">signup</a></p>
        <?php else:?>
          <?php if(!empty($row) and $row->role == "librarian"):?>
            <span id='display-uname'><?=Auth::getUsername()?></span><a href="<?=ROOT?>/librarian/profile"><span id="user-btn" class="fas fa-user"></span></a> <a href="<?=ROOT?>/logout">Logout</a>
          <?php elseif(!empty($row) and $row->role == "member"): ?>
            <span>
              <div class="nf-all">
                <div class="nf-area">
                  <button class="btn-noti" id="nf-btn"><i class="fas fa-bell"></i></button>
                  <span id="nf-n">0</span>
                </div>
                <div class="nf-message" id="notifications">Nothing</div>
              </div>
            </span>
            <span id='display-uname'><?=Auth::getUsername()?></span><a href="<?=ROOT?>/member/profile"><span id="user-btn" class="fas fa-user"></span></a> <a href="<?=ROOT?>/logout">Logout</a>
          <?php else :?>
            <span id='display-uname'><?=Auth::getUsername()?></span><a href="<?=ROOT?>/member/profile"><span id="user-btn" class="fas fa-user"></span></a> <a href="<?=ROOT?>/logout">Logout</a>
          <?php endif; ?>
        <?php endif;?>
    </div>
  </nav>
</div>