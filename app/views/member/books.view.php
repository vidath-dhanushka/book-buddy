<?php $this->view('includes/header', $data) ?>
<?php $this->view('includes/nav')?>

<?php $this->view('includes/sidenav', $data) ?>

<?php if($action == 'add'):?>
    <br>
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