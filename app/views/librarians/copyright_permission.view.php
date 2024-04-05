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
<section class="home-section">
<div class="step-wrapper">
<form id="myForm" class="form" method="post" enctype="multipart/form-data">
  <h1>COPYRIGHT PERMISSION</h1>
          <div class="input-box">
            
            <div class="upload-wrapper" id="upload-wrapper-agreement">
            <label for="agreement" style="color:#6990F2;">Copyright Agreement: *</label> <br> <br>
              <input class="file-input" type="file" name="agreement" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,text/plain"  hidden value="<?= isset($_POST['agreement']) ? $_POST['agreement'] : (isset($_SESSION['agreement']) ? $_SESSION['agreement'] : '') ?>">
              <i class="fas fa-cloud-upload-alt"></i>
              <p>Browse File to Upload</p>
              <section class="progress-area" id="progress-area-agreement"></section>
              <section class="uploaded-area" id="uploaded-area-agreement">
              <?php if (isset($_SESSION['agreement'])) : ?>
                <li class="row">
                    <div class="content">
                        <i class="fas fa-file-alt"></i>
                        <div class="details">
                          
                            <span class="name"><?= $_SESSION['agreement'] ?> • Uploaded</span>
                            <span class="size"><?= $_SESSION['agreement_size'] ?></span>
                        </div>
                    </div>
                    <i class="fas fa-check"></i>
                </li>
              <?php endif; ?>
              </section>

              <?php if (!empty($errors['agreement'])) : ?>
             <small class="err-msg"><?= $errors['agreement'] ?></small>
            <?php endif; ?>



            </div>
            
          </div>
          <div class="column">
            <div class="select-box">     
              <select name="license_type">
              <option hidden value="default" <?= set_value('license_type') == 'default' ? 'selected' : '' ?> required>License Type *</option>
              <option value="cc0" <?= set_value('license_type') == 'cc0' ? 'selected' : '' ?>>No Rights Reserved (CC0)</option>
    <option value="cc_by" <?= set_value('license_type') == 'cc_by' ? 'selected' : '' ?>>Creative Commons Attribution (CC BY)</option>
    <option value="cc_by_sa" <?= set_value('license_type') == 'cc_by_sa' ? 'selected' : '' ?>>Creative Commons Attribution-ShareAlike (CC BY-SA)</option>
    <option value="cc_by_nc_sa" <?= set_value('license_type') == 'cc_by_nc_sa' ? 'selected' : '' ?>>Creative Commons Attribution-NonCommercial-ShareAlike (CC BY-NC-SA)</option>
    <option value="cc_by_nc" <?= set_value('license_type') == 'cc_by_nc' ? 'selected' : '' ?>>Creative Commons Attribution-NonCommercial (CC BY-NC)</option>
    <option value="cc_by_nc_nd" <?= set_value('license_type') == 'cc_by_nc_nd' ? 'selected' : '' ?>>Creative Commons Attribution-NonCommercial-NoDerivatives (CC BY-NC-ND)</option>
    <option value="cc_by_nd" <?= set_value('license_type') == 'cc_by_nd' ? 'selected' : '' ?>>Creative Commons Attribution-NoDerivatives (CC BY-ND)</option>
              </select>
              <?php if (!empty($errors['license_type'])) : ?>
              <small class="err-msg"><?= $errors['license_type'] ?></small>
              <?php endif; ?>
            </div>
            <div class="select-box">
            <select name="subscription" required>
    <option hidden value="default" <?= set_value('subscription') == 'default' ? 'selected' : '' ?>>Subscription *</option>
    <?php foreach ($data['subscriptions'] as $subscription) : ?>
        <option value="<?= $subscription->id; ?>" <?= set_value('subscription') == $subscription->id ? 'selected' : '' ?>>
            <?= $subscription->name; ?>
        </option>
    <?php endforeach; ?>
</select>
              <?php if (!empty($errors['subscription'])) : ?>
                  <small class="err-msg"><?= $errors['subscription'] ?></small>
              <?php endif; ?>
            </div>

          </div>
            

          <div class="column">
            <div class="input-box half">
              <div class="input-box">
                <label>Licensed Copies *</label>
                <input type="number"  placeholder="Number of Copies" value="<?= set_value('licensed_copies') ?>" name="licensed_copies" />
                <?php if (!empty($errors['licensed_copies'])) : ?>
                <small class="err-msg"><?= $errors['licensed_copies'] ?></small>
                <?php endif; ?>
              </div>
              <div class="input-box">
                <label>Copyright Fee (LKR)*</label>
                <input type="number" id="price"  min="0" step="0.01" name="copyright_fee" value="<?= set_value('copyright_fee') ?>">
                <?php if (!empty($errors['copyright_fee'])) : ?>
                <small class="err-msg"><?= $errors['copyright_fee'] ?></small>
                <?php endif; ?>
            </div>
                
          </div>
            </div>
            <div class="input-box half">
                
              <div class="input-box">
                <label>License Start Date *</label>
                <input type="date"  placeholder="" value="<?= set_value('license_start_date') ?>" name="license_start_date"/>
                <?php if (!empty($errors['license_start_date'])) : ?>
             <small class="err-msg"><?= $errors['license_start_date'] ?></small>
            <?php endif; ?>
              </div>
              <div class="input-box">
                <label>License End Date *</label>
                <input type="date"  placeholder="" value="<?= set_value('license_end_date') ?>" name="license_end_date"/>
                <?php if (!empty($errors['license_end_date'])) : ?>
             <small class="err-msg"><?= $errors['license_end_date'] ?></small>
            <?php endif; ?>
              </div>
            </div>
           
          <div class="column">
          
          <div class="input-box">
          <button type="reset">Cancel</button>
          </div>
          <div class="input-box">
             <button type="submit">Save</button>
          </div>
        </div>
                </form>
                </div>
                </section>
<?php elseif ($action == 'edit') : ?>
  <section class="home-section">
  <div class="step-wrapper">
<form id="myForm" class="form" method="post" enctype="multipart/form-data">
  <h1>EDIT COPYRIGHT PERMISSION</h1>
          <div class="input-box">
            
            <div class="upload-wrapper" id="upload-wrapper-agreement">
            <label for="agreement" style="color:#6990F2;">Copyright Agreement: *</label> <br> <br>
              <input class="file-input" type="file" name="agreement" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,text/plain"  hidden value="<?= isset($_POST['agreement']) ? $_POST['agreement'] : (isset($_SESSION['agreement']) ? $_SESSION['agreement'] : '') ?>">
              <i class="fas fa-cloud-upload-alt"></i>
              <p>Browse File to Upload</p>
              <section class="progress-area" id="progress-area-agreement"></section>
              <section class="uploaded-area" id="uploaded-area-agreement">
              <?php if (isset($data['copyright']->agreement)) : ?>
                <li class="row">
                    <div class="content">
                        <i class="fas fa-file-alt"></i>
                        <div class="details">
                            
                            <span class="name"><?= substr(basename($data['copyright']->agreement),10) ?> • Uploaded</span>
                            <span class="size"><?= round(filesize($data['copyright']->agreement)/1024,2) ?>KB</span>
                        </div>
                    </div>
                    <i class="fas fa-check"></i>
                </li>
              <?php endif; ?>
              </section>

              <?php if (!empty($errors['agreement'])) : ?>
             <small class="err-msg"><?= $errors['agreement'] ?></small>
            <?php endif; ?>



            </div>
            
          </div>
          <div class="column">
            
          <div class="select-box">     
            <select name="license_type">
                <option value="" disabled selected hidden><?= isset($data['copyright']->license_type) ? $data['copyright']->license_type : 'License Type*' ?></option>
                <option value="cc0" <?= $data['copyright']->license_type == 'cc0' ? 'selected' : '' ?>>No Rights Reserved (CC0)</option>
                <option value="cc_by" <?= $data['copyright']->license_type == 'cc_by' ? 'selected' : '' ?>>Creative Commons Attribution (CC BY)</option>
                <option value="cc_by_sa" <?= $data['copyright']->license_type == 'cc_by_sa' ? 'selected' : '' ?>>Creative Commons Attribution-ShareAlike (CC BY-SA)</option>
                <option value="cc_by_nc_sa" <?= $data['copyright']->license_type == 'cc_by_nc_sa' ? 'selected' : '' ?>>Creative Commons Attribution-NonCommercial-ShareAlike (CC BY-NC-SA)</option>
                <option value="cc_by_nc" <?= $data['copyright']->license_type == 'cc_by_nc' ? 'selected' : '' ?>>Creative Commons Attribution-NonCommercial (CC BY-NC)</option>
                <option value="cc_by_nc_nd" <?= $data['copyright']->license_type == 'cc_by_nc_nd' ? 'selected' : '' ?>>Creative Commons Attribution-NonCommercial-NoDerivatives (CC BY-NC-ND)</option>
                <option value="cc_by_nd" <?= $data['copyright']->license_type == 'cc_by_nd' ? 'selected' : '' ?>>Creative Commons Attribution-NoDerivatives (CC BY-ND)</option>
            </select>
            <?php if (!empty($errors['license_type'])) : ?>
                <small class="err-msg"><?= $errors['license_type'] ?></small>
            <?php endif; ?>
</div>

            <div class="select-box">
            <select name="subscription" required>
            <option value="" disabled selected><?= isset($data['subscription']->name) ? $data['subscription']->name : 'Subscription*' ?></option>
    <?php foreach ($data['subscriptions'] as $subscription) : ?>
        <option value="<?= $subscription->id; ?>" <?= $data['subscription']->id == $subscription->id ? 'selected' : '' ?>>
            <?= $subscription->name; ?>
        </option>
    <?php endforeach; ?>
</select>
              <?php if (!empty($errors['subscription'])) : ?>
                  <small class="err-msg"><?= $errors['subscription'] ?></small>
              <?php endif; ?>
            </div>

          </div>
            
          <div class="column">
            <div class="input-box half">
              <div class="input-box">
                <label>Licensed Copies *</label>
                <input type="number"  placeholder="Number of Copies" value="<?= $data['copyright']->licensed_copies; ?>" name="licensed_copies" />
                <?php if (!empty($errors['licensed_copies'])) : ?>
                <small class="err-msg"><?= $errors['licensed_copies'] ?></small>
                <?php endif; ?>
              </div>
              <div class="input-box">
                <label>Copyright Fee (LKR)*</label>
                <input type="number" id="price"  min="0" step="0.01" name="copyright_fee" value="<?= $data['copyright']->copyright_fee; ?>">
                <?php if (!empty($errors['copyright_fee'])) : ?>
                <small class="err-msg"><?= $errors['copyright_fee'] ?></small>
                <?php endif; ?>
            </div>
                
          </div>
            </div>
            <div class="input-box half">
                
              <div class="input-box">
                <label>License Start Date *</label>
                <input type="date"  placeholder="" value="<?= $data['copyright']->license_start_date; ?>" name="license_start_date"/>
                <?php if (!empty($errors['license_start_date'])) : ?>
             <small class="err-msg"><?= $errors['license_start_date'] ?></small>
            <?php endif; ?>
              </div>
              <div class="input-box">
                <label>License End Date *</label>
                <input type="date"  placeholder="" value="<?= $data['copyright']->license_end_date; ?>" name="license_end_date"/>
                <?php if (!empty($errors['license_end_date'])) : ?>
             <small class="err-msg"><?= $errors['license_end_date'] ?></small>
            <?php endif; ?>
              </div>
            </div>
           
          <div class="column">
          
          <div class="input-box">
          <button type="reset">Cancel</button>
          </div>
          <div class="input-box">
             <button type="submit">Save</button>
          </div>
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
                                

                            </section>
                            <section class="table__body">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Title <span class="icon-arrow">↑</span></th>
                                        <th> License Type <span class="icon-arrow">↑</span></th>
                                        <th> Subscription <span class="icon-arrow">↑</span></th>
                                        <th> Licensed Copies <span class="icon-arrow">↑</span></th>
                                        <th> Copyright Fee <span class="icon-arrow">↑</span></th>
                                        <th> License Start Date <span class="icon-arrow">↑</span></th>
                                        <th> License End Date <span class="icon-arrow">↑</span></th>
                                        <th> Action </th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    
                                        <?php if (!empty($data['copyrights'])) : ?>
                                            <?php foreach ($data['copyrights'] as $copyright) : ?>
                                                <tr>
                                                    
                                                    <td><?= $copyright->title ?></td>
                                                    
                                                    <td><?= strtoupper($copyright->license_type) ?></td>
                                                    <td><?= $copyright->subscription_name?></td>
                                                    <td><?= $copyright->licensed_copies?></td>
                                                    <td><?= $copyright->copyright_fee?></td>
                                                    <td><?= $copyright->license_start_date?></td>
                                                    <td><?= $copyright->license_end_date?></td>
                                                    <td>
                                                        <a href="<?= ROOT . '/librarian/copyright/edit/' . $copyright->ebook_id; ?>"><i class="fa-regular fa-pen-to-square" style="color:blue"></i></a>
                                                        <a href="<?= ROOT . '/librarian/copyright/delete/' . $copyright->ebook_id; ?>"><i class="fa-solid fa-trash" style="color:red; margin-left:5px"></i></a>
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
  let form = document.querySelector('form');
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
        console.log("working");
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
</script>