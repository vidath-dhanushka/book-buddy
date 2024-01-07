<?php $this->view('includes/header', $data) ?>
<?php $this->view('includes/nav')?>

<?php $this->view('includes/sidenav', $data) ?>

<?php if($action == 'add'):?>
    <p>add</p>
<?php elseif($action == 'edit'):?>
    <p>edit</p>
<?php else:?>
    
<?php endif;?>