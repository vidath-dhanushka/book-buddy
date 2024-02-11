<header class="header">
    <div class="header-1">
        <div class="flex">
            <div class="logo">
                <a href="<?= ROOT ?>/home"><img src="<?= ROOT ?>/assets/images/logo.svg" alt="logo"></a>
            </div>
            <div class="account">
                <?php if (!Auth::logged_in()) : ?>
                    <p><a href="<?= ROOT ?>/login">Login</a> | <a href="<?= ROOT ?>/signup">signup</a></p>
                <?php else : ?>
                    <p><span id='display-uname'><?= Auth::getUsername() ?></span><a href="<?= ROOT ?>/member/profile"><span id="user-btn" class="fas fa-user"></span></a> <a href="<?= ROOT ?>/logout">Logout</a></p>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <div class="header-2">
        <div class="flex">
            <nav class="navbar">
                <a href="<?= ROOT ?>/Elibrary">Home</a>
                <a href="<?= ROOT ?>/Elibrary/Ebooks">E Books</a>
                <a href="<?= ROOT ?>/Elibrary/subscription">Subscription</a>
                <a href="<?= ROOT ?>/aboutus">About Us</a>
                <a href="<?= ROOT ?>/home">Book Exchange</a>

            </nav>
            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i> <span>(00)</span></a>
            </div>
        </div>
    </div>
</header>