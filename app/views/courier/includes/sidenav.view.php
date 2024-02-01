<div class="sidebar close">
    <a href="<?= ROOT ?>/Courier/profile">
        <div class="logo-details">
            <img src="<?= ROOT ?>/<?= ($row->user_image) ?>" alt="profile-image" />

            <span class="logo_name"><span class="profile-title"><?= ($row->role) ?></span><br /><?= esc($row->username) ?>
            </span>
        </div>
    </a>
    <hr>
    <ul class="nav-links">
        <li>
            <a href="<?= ROOT ?>/courier/dashboard">
                <div class="icon">
                    <img src="<?= ROOT ?>/assets/images/sidenav/dashboard.png" alt="icon" />
                </div>

                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li>
                    <a class="link_name" href="<?= ROOT ?>/courier/dashboard">Dashboard</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="<?= ROOT ?>/courier/ongoing">
                <div class="icon">
                    <i class="fa-solid fa-truck-fast" style="color:white"></i>
                    <!-- <img src="<?= ROOT ?>/assets/images/sidenav/borrowing.png" alt="icon" /> -->
                </div>

                <span class="link_name">ongoing orders</span>
            </a>
            <ul class="sub-menu blank">
                <li>
                    <a class="link_name" href="<?= ROOT ?>/courier/borrowing">Ongoing Orders</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= ROOT ?>/courier/completed">
                <div class="icon">
                    <i class="fa-solid fa-truck" style="color: white;"></i>
                    <!-- <img src="<?= ROOT ?>/assets/images/sidenav/borrowing.png" alt="icon" /> -->
                </div>

                <span class="link_name">completed orders</span>
            </a>
            <ul class="sub-menu blank">
                <li>
                    <a class="link_name" href="<?= ROOT ?>/courier/borrowing">Completed Orders</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= ROOT ?>/courier/transactions">
                <div class="icon">
                    <i class="fa-solid fa-money-check-dollar" style="color: white;"></i>
                    <!-- <img src="<?= ROOT ?>/assets/images/sidenav/borrowing.png" alt="icon" /> -->
                </div>

                <span class="link_name">Transactions</span>
            </a>
            <ul class="sub-menu blank">
                <li>
                    <a class="link_name" href="<?= ROOT ?>/courier/Transactions">Transactions</a>
                </li>
            </ul>
        </li>
        <!-- <li>
      <div class="iocn-link">
        <a href="<?= ROOT ?>/404">
          <div class="icon">
            <img
              src="<?= ROOT ?>/assets/images/sidenav/book.png"
              alt="icon"
            />
          </div>
          <span class="link_name">Book Exchange</span>
        </a>

        <img
          class="arrow"
          src="<?= ROOT ?>/assets/images/sidenav/arrow.png"
          alt="arrow"
        />
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="<?= ROOT ?>/404">Book Exchange</a></li>
        <li>
          <a href="<?= ROOT ?>/404"
            >Search Book</a
          >
        </li>
        <li>
          <a href="<?= ROOT ?>/404"
            >Borrowing History</a
          >
        </li>
        <li>
          <a href="<?= ROOT ?>/404"
            >Sharing History</a
          >
        </li>
        <li>
          <a href="<?= ROOT ?>/member/books/add"
            >Add Book</a
          >
        </li>
      </ul>
    </li>

    <li>
      <div class="iocn-link">
        <a href="<?= ROOT ?>/404">
          <div class="icon">
            <img
              src="<?= ROOT ?>/assets/images/sidenav/ebook.png"
              alt="icon"
            />
          </div>
          <span class="link_name">E-Library</span>
        </a>

        <img
          class="arrow"
          src="<?= ROOT ?>/assets/images/sidenav/arrow.png"
          alt="arrow"
        />
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="<?= ROOT ?>/book/search">E-Library</a></li>
        <li>
          <a href="<?= ROOT ?>/book/search"
            >Search Book</a
          >
        </li>
        <li>
          <a href="<?= ROOT ?>/member/borrowing"
            >Borrowing History</a
          >
        </li>
        <li>
          <a href="<?= ROOT ?>/404"
            >Sharing History</a
          >
        </li>
      </ul>
    </li> -->
        <hr>
        <li id="log-out">
            <a href="<?= ROOT ?>/logout">
                <div class="icon">
                    <img src="<?= ROOT ?>/assets/images/sidenav/logout.png" alt="icon" />
                </div>
                <span class="link_name">Log-out</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="<?= ROOT ?>/logout">Log-out</a></li>
            </ul>
        </li>
    </ul>

    <img src="<?= ROOT ?>/assets/images/sidenav/Button.png" alt="Button" class="menu-button" onclick="changePosition()" />
</div>
<script src="<?= ROOT ?>/assets/js/sidenav.js"></script>