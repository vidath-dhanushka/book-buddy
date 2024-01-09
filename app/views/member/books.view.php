<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/navbar.css">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/sidenav.css">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/dashboard.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/edit-form.css">
   <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/profile-pic.css">
</head>
<body>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>

<?php if($action == 'add'):?>
    <br>
    <section class="home-section">
        <div class="container">
            <header>Add new Book to share</header>
            <form action="#" class="form" method="post">
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