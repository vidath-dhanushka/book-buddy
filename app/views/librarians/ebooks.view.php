<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucfirst(App::$page) ?> - <?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/sidenav.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/edit-form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/profile-pic.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/member/borrowing.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/book/add-ebook.css">
</head>

<?php $this->view('includes/navbar',$data) ?>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


<?php $this->view('includes/sidenav', $data) ?>
<?php if ($action == 'add') : ?>
<section class="home-section" id="add-ebook">

<div class="step-wrapper">
<header>Add New Book to Share</header>
  <div class="step-header">
    <ul>
      <li class="step-active form_1_progessbar">
        <div>
          <p>1</p>
        </div>
      </li>
      <li class="form_2_progessbar">
        <div>
          <p>2</p>
        </div>
      </li>
      
    </ul>
  </div>
  <div class="form_wrap">
    <form id="myForm" class="form" method="post" enctype="multipart/form-data">
      <div class="form_1 data_info">
        <h2>E-Book Info</h2>
        <div class="column">
          <div class="input-box">
            <label>Title *</label>
            <input type="text"  placeholder="Enter the title" value="<?= set_value('title') ?>" name="title"/>
            <?php if (!empty($errors['title'])) : ?>
             <small class="err-msg"><?= $errors['title'] ?></small>
            <?php endif; ?>
          </div>
          <div class="input-box">
            <label>Subtitle </label>
            <input type="text"  placeholder="Enter the subtitle" value="<?= set_value('subtitle') ?>" name="subtitle"/>
            <?php if (!empty($errors['subtitle'])) : ?>
             <small class="err-msg"><?= $errors['subtitle'] ?></small>
            <?php endif; ?>
          </div>
        </div>

        <div class="column">
          <div class="input-box">
            <label>ISBN</label>
            <input type="text"  placeholder="Enter ISBN number" value="<?= set_value('isbn') ?>" name="isbn"/>
            <?php if (!empty($errors['isbn'])) : ?>
             <small class="err-msg"><?= $errors['isbn'] ?></small>
            <?php endif; ?>
          </div>
          <div class="input-box">
            <label>Language *</label>
            <input type="text"  placeholder="enter language" value="<?= set_value('language') ?>" name="language"/>
            <?php if (!empty($errors['language'])) : ?>
             <small class="err-msg"><?= $errors['language'] ?></small>
            <?php endif; ?>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Author *</label>
            <input type="text"  placeholder="Enter Author's name" value="<?= set_value('author_name') ?>" name="author_name"/>
            <?php if (!empty($errors['author_name'])) : ?>
             <small class="err-msg"><?= $errors['author_name'] ?></small>
            <?php endif; ?>
          </div>
          <div class="input-box">
            <label>Edition </label>
            <input type="text"  placeholder="Enter Edition Number" value="<?= set_value('edition') ?>" name="edition"/>
            <?php if (!empty($errors['edition'])) : ?>
             <small class="err-msg"><?= $errors['edition'] ?></small>
            <?php endif; ?>
          </div>
        </div>
          
        <div class="column">
          <div class="input-box">
              <label>Publisher*</label>
              <input type="text"  placeholder="Enter publisher's name" value="<?= set_value('publisher') ?>" name="publisher"/>
              <?php if (!empty($errors['publisher'])) : ?>
             <small class="err-msg"><?= $errors['publisher'] ?></small>
            <?php endif; ?>
          </div>
          <div class="input-box">
              <label>Publish Date *</label>
              <input type="date"  placeholder="" value="<?= set_value('publish_date') ?>" name="publish_date"/>
              <?php if (!empty($errors['publish_date'])) : ?>
             <small class="err-msg"><?= $errors['publish_date'] ?></small>
            <?php endif; ?>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Pages *</label>
              <input type="number"  placeholder="Enter number of pages" value="<?= set_value('pages') ?>" name="pages"/>
              <?php if (!empty($errors['pages'])) : ?>
              <small class="err-msg"><?= $errors['pages'] ?></small>
              <?php endif; ?>
              <div class="select-box">  
              <select name="license">
              <option value="" disabled selected><?= isset($data["license"]) ? set_value('license', $data["license"]) : 'License *' ?></option>
                <option value="public_domain">Public Domain</option>
                <option value="cc_by">Creative Commons Attribution (CC BY)</option>
              </select>
              <?php if (!empty($errors['license'])) : ?>
             <small class="err-msg"><?= $errors['license'] ?></small>
            <?php endif; ?>
              </div>
          </div>
          <div class="input-box">
            <label for="description">Description *</label>
            <textarea type="text" id="description" name="description" style="padding-top: 10px;" value="<?= set_value('description') ?>"></textarea> 
            <?php if (!empty($errors['description'])) : ?>
             <small class="err-msg"><?= $errors['description'] ?></small>
            <?php endif; ?>  
          </div>
         
        </div>
        <br>
          
        <label for="category">Category</label>
        <br>
          <!-- <div class="select-box"> -->
          <!-- <select id="category" multiple>     -->
        <?php foreach ($data['categories'] as $category) : ?>
            <input name="category[]" type="checkbox" value="<?= $category->id; ?>" />
            <label style="margin-right: 15px; text-transform: capitalize"><?= $category->category_name; ?></label>
        <?php endforeach; ?>
        <br>
        <?php if (!empty($errors['category'])) : ?>
             <small class="err-msg"><?= $errors['category'] ?></small>
            <?php endif; ?> 
                    <!-- </select> -->
                    <!-- </div> -->
      </div>
      


      <div class="form_2 data_info" style="display: none;">
        <h2>Upload Files</h2>
        <div class="column">
          <div class="input-box">
            <label for="book_cover">Cover Image *</label> <br> <br>
            <div class="upload-cover-wrapper">
              <img onclick="document.getElementById('book_upload').click()" src="<?= ROOT ?>/assets/images/books/book_image.jpg" id="thumb" class=img-book>
              <input type="file" onchange="change_img(this)" id="book_upload" accept="image/jpeg,image/png" name="book_cover" >
            </div>
            <?php if (!empty($errors['book_cover'])) : ?>
             <small class="err-msg"><?= $errors['book_cover'] ?></small>
            <?php endif; ?>
          </div>
          <div class="input-box">
            <label for="book_cover">E-book File: *</label> <br> <br>
            <div class="upload-wrapper" id="upload-wrapper-book">
              <input class="file-input" type="file" name="file" hidden>
              <i class="fas fa-cloud-upload-alt"></i>
              <p>Browse File to Upload</p>
              <section class="progress-area" id="progress-area-book"></section>
              <section class="uploaded-area" id="uploaded-area-book"></section>
            </div>
            <?php if (!empty($errors['file'])) : ?>
             <small class="err-msg"><?= $errors['file'] ?></small>
            <?php endif; ?>
          </div>
        </div>
      </div>

    
          <div class="column">
            <div class="input-box">
              <div class="btns_wrap">
                <div class="common_btns form_1_btns">
                  <button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
                </div>
                <div class="common_btns form_2_btns" style="display: none;">
                  <button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
                  <button type="submit" class="btn_done">Done</button>
                </div>
                
              </div>
            </div>
          </div>
    </form>
  </div>
</div>
</section>
<?php elseif ($action == 'edit') : ?>
        <br>
        <section class="home-section" style="background-color: #D9D9D9">
            <div class="container">
                <header>Edit Book Details</header>
                <form action="#" class="form" method="post" enctype="multipart/form-data">

                    <img onclick="document.getElementById('book_upload').click()" src="<?= ($data['book_details']->book_image) ? (ROOT . "/" . $data['book_details']->book_image) : "/assets/images/books/book_image.jpg" ?>" id="thumb" class="img-book" alt="">
                    <input type="file" onchange="change_img(this)" id="book_upload" accept="image/*" name="book_image">

                    <div class="input-box">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="<?= $data['book_details']->title; ?>" required>

                        <?php if (!empty($errors['title'])) : ?>
                            <small class="err-msg"><?= $errors['title'] ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="input-box">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" required><?= $data['book_details']->description; ?></textarea>

                        <?php if (!empty($errors['description'])) : ?>
                            <small class="err-msg"><?= $errors['description'] ?></small>
                        <?php endif; ?>
                    </div>


                    <div class="input-box">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" value="<?= camelCaseToWords($data['book_details']->author_name); ?>" required>
                    </div>
                    <br>
                    <label for="category">Category</label>
                    <br>
                    <!-- <div class="select-box"> -->
                    <!-- <select id="category" multiple>     -->
                    <?php foreach ($data['categories'] as $category) : ?>
                        <input name="category[]" type="checkbox" value="<?= $category->id; ?>" <?= in_array($category->id, $data['book_details']->cats) ? 'checked' : '' ?> />
                        <label style="margin-right: 15px; text-transform: capitalize"><?= $category->category_name; ?></label>
                    <?php endforeach; ?>
                    <!-- </select> -->
                    <!-- </div> -->

                    <div class="column" style="justify-content:center;">
                        <button style="width:50%;">Update Details</button>
                    </div>
                </form>
            </div>
        </section>
    <?php else : ?>
        <section class="home-section" style="background-color: #D9D9D9;">
            <?php if (message()) : ?>
                <div class="alert"><?= message('', true) ?></div>
            <?php endif; ?>
            
                        <main class="table">
                            <section class="table__header">
                                <h1 style="padding-top: 5px; text-align:center">Books Shared</h1>
                                <div class="input-group">
                                    <input type="search" placeholder="Search Data...">
                                    <img src="<?= ROOT ?>/assets/images/member/search-black.svg" alt="">
                                    <!-- <button>new</button> -->
                                </div>
                                <a href="<?= ROOT ?>/librarian/ebooks/add"><button id="btn-new"><i class="fa-solid fa-plus"></i> new</button></a>

                            </section>
                            <section class="table__body">
                                <table>
                                    <thead>
                                        <tr>
                                            <th> Title <span class="icon-arrow">&UpArrow;</span></th>
                                            <th> Author <span class="icon-arrow">&UpArrow;</span></th>
                                            <th> Publisher <span class="icon-arrow">&UpArrow;</span></th>
                                            <th> Type<span class="icon-arrow">&UpArrow;</span></th>
                                            <th> Status<span class="icon-arrow">&UpArrow;</span></th>
                                            <th>Date added<span class="icon-arrow">&UpArrow;</span></th>
                                            <th>Action</th>
                                            <th>Copyright</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <?php if (!empty($data['books'])) : ?>
                                            <?php foreach ($data['books'] as $book) : ?>
                                                <tr>
                                                    <td><?= $book->title ?></td>
                                                    <td><?= camelCaseToWords($book->author_name) ?></td>
                                                    <td><?= camelCaseToWords($book->publisher) ?></td>
                                                    <td><?= $book->license ?></td>
                                                    <?php if($book->c_status) : ?>
                                                      <td ><p class="status uploaded">Uploaded</p></td>
                                                    <?php else : ?>
                                                      <td> <p class="status pending"> Pending</p></td>
                                                    <?php endif; ?>
                                                    <td><?= date('Y-m-d', strtotime($book->date_added)) ?></td>
                                                    <td>
                                                        <a href="<?= ROOT . '/librarian/ebooks/edit/' . $book->id; ?>"><i class="fa-regular fa-pen-to-square" style="color:blue"></i></a>
                                                        <a href="<?= ROOT . '/librarian/ebooks/delete/' . $book->id; ?>"><i class="fa-solid fa-trash" style="color:red; margin-left:5px"></i></a>
                                                    </td>
                                                    <td>
                                                      <?php if($book->c_status) : ?>
                                                        <a href="#" class="action btn">Edit</a>
                                                      <?php else : ?>
                                                        <a href="<?= ROOT . '/librarian/copyright/' . $book->id; ?>" class="action btn">Add</a>
                                                      <?php endif; ?>
                                                      </td> 
                                                        
                                                  
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="7">No records found!</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>

                                </table>
                            </section>
                        </main>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?= ROOT ?>/assets/js/table.js"></script>

    <?php endif; ?>



<script>

  var form_1 = document.querySelector(".form_1");
  var form_2 = document.querySelector(".form_2");
  

  var form_1_btns = document.querySelector(".form_1_btns");
  var form_2_btns = document.querySelector(".form_2_btns");


  var form_1_next_btn = document.querySelector(".form_1_btns .btn_next");
  var form_2_back_btn = document.querySelector(".form_2_btns .btn_back");

  var form_2_progessbar = document.querySelector(".form_2_progessbar");
 

  form_1_next_btn.addEventListener("click", function(){
    form_1.style.display = "none";
    form_2.style.display = "block";

    form_1_btns.style.display = "none";
    form_2_btns.style.display = "flex";

    form_2_progessbar.classList.add("step-active");
  });

  form_2_back_btn.addEventListener("click", function(){
    form_1.style.display = "block";
    form_2.style.display = "none";

    form_1_btns.style.display = "flex";
    form_2_btns.style.display = "none";

    form_2_progessbar.classList.remove("step-active");
  });

 

  form_2_back_btn.addEventListener("click", function(){
    form_1.style.display = "block";
    form_2.style.display = "none";

    form_1_btns.style.display = "flex";
    form_2_btns.style.display = "none";

    form_2_progessbar.classList.remove("step-active");
  });

  change_img = (input) => {
      var image = document.getElementById('thumb');

      // Check if a file is selected
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
              // Set the source of the image to the data URL
              image.src = e.target.result;
              
              // Display the image
              image.style.display = 'block';
          };

          // Read the file as a data URL
          reader.readAsDataURL(input.files[0]);
      }
  }


  let form = document.querySelector("#myForm");

setupUploader("book");
setupUploader("agreement");

function setupUploader(id) {
  let wrapper = document.querySelector("#upload-wrapper-" + id);
  let fileInput = document.querySelector("#upload-wrapper-" + id + " .file-input");

  let progressArea = document.querySelector("#progress-area-" + id);
  let uploadedArea = document.querySelector("#uploaded-area-" + id);

  // form click event
  wrapper.addEventListener("click", () =>{
    fileInput.click();
  });

  fileInput.onchange = ({target})=>{
    let file = target.files[0];
    if(file){
      let fileName = file.name;
      if(fileName.length >= 12){
        let splitName = fileName.split('.');
        fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
      }

      uploadFile(fileName, progressArea, uploadedArea);
    }
  }
}

function uploadFile(name, progressArea, uploadedArea){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "<?=ROOT?>/librarian/ebooks");
  xhr.upload.addEventListener("progress", ({loaded, total}) =>{
    let fileLoaded = Math.floor((loaded / total) * 100);
    let fileTotal = Math.floor(total / 1000);
    let fileSize;
    (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
    let progressHTML = `<li class="row">
                          <i class="fas fa-file-alt"></i>
                          <div class="content">
                            <div class="details">
                              <span class="name">${name} • Uploading</span>
                              <span class="percent">${fileLoaded}%</span>
                            </div>
                            <div class="progress-bar">
                              <div class="progress" style="width: ${fileLoaded}%"></div>
                            </div>
                          </div>
                        </li>`;
    uploadedArea.innerHTML = "";
    uploadedArea.classList.add("onprogress");
    progressArea.innerHTML = progressHTML;

    if(loaded == total){
      progressArea.innerHTML = "";
      let uploadedHTML = `<li class="row">
                            <div class="content">
                              <i class="fas fa-file-alt"></i>
                              <div class="details">
                                <span class="name">${name} • Uploaded</span>
                                <span class="size">${fileSize}</span>
                              </div>
                            </div>
                            <i class="fas fa-check"></i>
                          </li>`;
      uploadedArea.classList.remove("onprogress");
      uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
    }
  });

  let data = new FormData(form);
  xhr.send(data);
}

textarea = document.querySelector("textarea");
textarea.style.height = "45px";
textarea.addEventListener("keyup", e =>{
  let scHeight = e.target.scrollHeight;
  textarea.style.height = `${scHeight}px`;
});



</script>

  </body>
</html>
