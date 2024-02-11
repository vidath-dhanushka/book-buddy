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
<section class="home-section">
<div class="step-wrapper">
<form id="myForm" class="form" method="post" enctype="multipart/form-data">
          <div class="input-box">
            <label for="agreement">Copyright Agreement: *</label> <br> <br>
            <div class="upload-wrapper" id="upload-wrapper-agreement">
              <input class="file-input" type="file" name="agreement" hidden>
              <i class="fas fa-cloud-upload-alt"></i>
              <p>Browse File to Upload</p>
              <section class="progress-area" id="progress-area-agreement"></section>
              <section class="uploaded-area" id="uploaded-area-agreement"></section>
            </div>
            <?php if (!empty($errors['agreement'])) : ?>
             <small class="err-msg"><?= $errors['agreement'] ?></small>
            <?php endif; ?>
          </div>
          <div class="column">
            <div class="select-box">     
              <select name="license">
                <option hidden disabled selected value>License Type *</option>
                <option value="public_domain">Public Domain</option>
                <option value="cc_by">Creative Commons Attribution (CC BY)</option>
                <option value="cc_by_sa">Creative Commons Attribution-ShareAlike (CC BY-SA)</option>
                <option value="cc_by_nc_sa">Creative Commons Attribution-NonCommercial-ShareAlike (CC BY-NC-SA)</option>
                <option value="cc_by_nc">Creative Commons Attribution-NonCommercial (CC BY-NC)</option>
                <option value="cc_by_nc_nd">Creative Commons Attribution-NonCommercial-NoDerivatives (CC BY-NC-ND)</option>
                <option value="cc_by_nd">Creative Commons Attribution-NoDerivatives (CC BY-ND)</option>
              </select>
              <?php if (!empty($errors['license'])) : ?>
             <small class="err-msg"><?= $errors['license'] ?></small>
            <?php endif; ?>
            </div>
            <div class="select-box">  
              <select name="subscription"> 
                <option hidden disabled selected value>Subscription Level *</option>
                <option value="basic">Basic (Free)</option>
                <option value="silver">Silver</option>
                <option value="gold">Gold</option>
                <option value="platinum">Platinum</option>
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
                <input type="number"  placeholder="Number of Copies" value="<?= set_value('licensed_copies') ?>" name="licensed_copies"/>
                <?php if (!empty($errors['licensed_copies'])) : ?>
             <small class="err-msg"><?= $errors['licensed_copies'] ?></small>
            <?php endif; ?>
              </div>
              <div class="input-box">
                <label>Copyright Fee *</label>
                <input type="number" id="price" name="price" min="0" step="0.01" name="copyright_fee" value="<?= set_value('copyright_fee') ?>">
                <?php if (!empty($errors['copyright_fee'])) : ?>
             <small class="err-msg"><?= $errors['copyright_fee'] ?></small>
            <?php endif; ?>
              </div>
                
            </div>
            </div>
            <div class="input-box half">
                
              <div class="input-box">
                <label>License Start Date *</label>
                <input type="date"  placeholder="" value="<?= set_value('license_end_date') ?>" name="license_end_date"/>
                <?php if (!empty($errors['license_end_date'])) : ?>
             <small class="err-msg"><?= $errors['license_end_date'] ?></small>
            <?php endif; ?>
              </div>
              <div class="input-box">
                <label>License End Date *</label>
                <input type="date"  placeholder="" value="<?= set_value('license_start_date') ?>" name="license_start_date"/>
                <?php if (!empty($errors['license_start_date'])) : ?>
             <small class="err-msg"><?= $errors['license_start_date'] ?></small>
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

<script>
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
</script>