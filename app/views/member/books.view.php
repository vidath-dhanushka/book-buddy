<?php $this->view('includes/header', $data) ?>
<?php $this->view('includes/nav')?>

<?php $this->view('includes/sidenav', $data) ?>

<?php if($action == 'add'):?>
    <br>
    <!-- <div class="profile-box">
        <div class="cardBox col-1-3">
            <div class="profile col-1-1">
                
                <div class="col-1"> <b> My Account</b></div>

                <div class="col-2">
                <form method="post" class="registration-form">
        <div class="profile-pic-container full-width">
            <img id="profile-pic" src="<?= ROOT ?>/assets/images/Avatar.png" alt="Profile Picture">
            <div class="overlay">
                <img id="camera-icon" src="<?= ROOT ?>/assets/images/camera.png" alt="Upload">
                <input type="file" id="fileInput" name="profilePic">
            </div>
        </div>
        <button id="removeBtn" style="display:none;">Remove</button>
                </from>
                    
                </div>
                <div class="col-3">A. Perera <br> <span>Someone@gmail.com</span></div>
                <div class="col-4">Basic</div>
                <div class="col-5">Change Subscription</div> 
            </div> -->
    <section class="home-section">
        <div class="box">
            <h2>Add new Book to share</h2>
            <form action="#" method="post">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?=set_value('title')?>" required>

                <?php if(!empty($errors['title'])):?>
                    <small class="err-msg"><?=$errors['title']?></small>
                <?php endif;?>

                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="<?=set_value('description')?>" required>

                <?php if(!empty($errors['description'])):?>
                    <small class="err-msg"><?=$errors['description']?></small>
                <?php endif;?>

                <label for="author">Author</label>
                <input type="text" id="author" name="author" value="<?=set_value('')?>" required>

                <!-- <label for="category">Author</label>
                <input type="text" id="author" name="author" value="<?=set_value('')?> -->
                <label for="category">Category</label>
                <select id="category">    
                <?php foreach ($data['categories'] as $category ):?>
                        <option value="<?= $category->id ?>"><?= $category->category_name; ?></option>
                    <?php endforeach ;?>
                </select>

                <input type="submit">
            </form>
        </div>
    </section>
<?php elseif($action == 'edit'):?>
    <p>edit</p>
<?php else:?>
    <?php if(message()):?>
        <div class="alert"><?=message('', true)?></div>
    <?php endif;?>


<?php endif;?>