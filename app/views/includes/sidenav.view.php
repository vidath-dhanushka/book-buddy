<div class="sidebar close">
  <?php if($row->role === "member"):?>
  <a href="<?= ROOT ?>/member/profile">
  <?php endif; ?>
  <?php if($row->role === "librarian"):?>
  <a href="<?= ROOT ?>/librarian/profile">
  <?php endif; ?>
  <?php if($row->role === "admin"):?>
  <a href="<?= ROOT ?>/admin/profile">
  <?php endif; ?>
    <div class="logo-details">
      <img src="<?= ROOT ?>/<?= ($row->user_image) ?>" alt="profile-image" />

      <span class="logo_name"><span class="profile-title"><?= ($row->role) ?></span><br /><?= esc($row->username) ?>
      </span>
    </div>
  </a>
  <hr>
  <?php if($row->role === "member"):?>
    <ul class="nav-links">
      <li>
        <a href="<?= ROOT ?>/member">
          <div class="icon">
            <img src="<?= ROOT ?>/assets/images/sidenav/dashboard.png" alt="icon" />
          </div>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/member/dashboard">Dashboard</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="<?= ROOT ?>/member/borrowing">
          <div class="icon">
            <img src="<?= ROOT ?>/assets/images/sidenav/borrowing.png" alt="icon" />
          </div>

          <span class="link_name">My Borrowing</span>
        </a>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/member/borrowing">My Borrowing</a>
          </li>
        </ul>
      </li>
    <li>
        <div class="iocn-link">
          <a href="<?= ROOT ?>/member/books">
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
          <li><a class="link_name" href="<?= ROOT ?>/member/books/add">Book Exchange</a></li>
          <li>
            <a href="<?= ROOT ?>/member/books/add"
              >Add Book</a
            >
          </li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="<?= ROOT ?>/Elibrary/subscription">
            <div class="icon">
              <img
                src="<?= ROOT ?>/assets/images/sidenav/subscription.png"
                alt="icon"
              />
            </div>
            <span class="link_name">Subscription</span>
          </a>

          <img
            class="arrow"
            src="<?= ROOT ?>/assets/images/sidenav/arrow.png"
            alt="arrow"
          />
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="<?= ROOT ?>/member/books/add">Subscription</a></li>
          
        </ul>
      </li>
    


      
    <!-- body > div.sidebar.close > ul > li:nth-child(3) -->
  
<!-- 
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
    <?php endif;?>
    <?php if($row->role === "librarian"):?>
    <ul class="nav-links">
      <li>
        <a href="<?= ROOT ?>/librarian/dashboard">
          <div class="icon">
            <img src="<?= ROOT ?>/assets/images/sidenav/dashboard.png" alt="icon" />
          </div>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/librarian/dashboard">Dashboard</a>
          </li>
        </ul>
      </li>

      
    <li>
        <div class="iocn-link">
          <a href="<?= ROOT ?>/librarian/ebooks">
            <div class="icon">
              <img
                src="<?= ROOT ?>/assets/images/sidenav/ebook.png"
                alt="icon"
              />
            </div>
            <span class="link_name">E - Book</span>
          </a>

          
        </div>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/librarian/dashboard">E-Books</a>
          </li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="<?= ROOT ?>/librarian/subscription">
            <div class="icon">
              <img
                src="<?= ROOT ?>/assets/images/sidenav/subscription.png"
                alt="icon"
              />
            </div>
            <span class="link_name">Subscription</span>
          </a>

         
        </div>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/librarian/dashboard">Subscription</a>
          </li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="<?= ROOT ?>/librarian/copyright">
            <div class="icon">
              <img
                src="<?= ROOT ?>/assets/images/sidenav/permission.png"
                alt="icon"
              />
            </div>
            <span class="link_name">Copyright</span>
          </a>

         
        </div>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/librarian/dashboard">Copyright</a>
          </li>
        </ul>
      </li>
    
      <?php endif?>

      
    <!-- body > div.sidebar.close > ul > li:nth-child(3) -->
  
<!-- 
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

    

   
  
  <?php if($row->role === "admin"):?>
    <ul class="nav-links">
      <li>
        <a href="<?= ROOT ?>/admin/dashboard">
          <div class="icon">
            <img src="<?= ROOT ?>/assets/images/sidenav/dashboard.png" alt="icon" />
          </div>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/admin/dashboard">Dashboard</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="<?= ROOT ?>/admin/courierAdd">
          <div class="icon">
            <img src="<?= ROOT ?>/assets/images/sidenav/borrowing.png" alt="icon" />
          </div>

          <span class="link_name">Add Courier</span>
        </a>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/admin/courierAdd">Add Courier</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="<?= ROOT ?>/admin/courierDetails">
          <div class="icon">
            <img src="<?= ROOT ?>/assets/images/sidenav/white-book.svg" alt="icon" />
          </div>

          <span class="link_name">Courier Details</span>
        </a>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/admin/courierDetails">Courier Details</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="<?= ROOT ?>/admin/addLibrarian">
          <div class="icon">
            <img src="<?= ROOT ?>/assets/images/sidenav/borrowing.png" alt="icon" />
          </div>

          <span class="link_name">Add Librarian</span>
        </a>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/admin/addLibrarian">Add Librarian</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="<?= ROOT ?>/admin/librarianDetails">
          <div class="icon">
            <img src="<?= ROOT ?>/assets/images/sidenav/white-book.svg" alt="icon" />
          </div>

          <span class="link_name">Librarian Details</span>
        </a>
        <ul class="sub-menu blank">
          <li>
            <a class="link_name" href="<?= ROOT ?>/admin/librarianDetails">Librarian Details</a>
          </li>
        </ul>
      </li>

    
      
    


      
    
    <?php endif;?>

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