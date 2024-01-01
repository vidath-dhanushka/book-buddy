<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/signup.css">

</head>

<body>
    <div class="main-container">
        <div class="subcontainer-left">
            <div class="logo">
                <img src="<?=ROOT?>/assets/images/logo.svg" alt="logo" id="logoPic">
            </div>
            <div class="title">
                <p>sign up and discover a world of books</p>
                <p>join the <a href="<?=ROOT?>/home" class="title-url">BOOK BUDDY</a> family</p>
            </div>
            <div class="signup-img">
                <img src="<?=ROOT?>/assets/images/sign-up.svg" alt="signup img">
            </div>
            <div class="title">
                <p>already have an account? <a href="<?=ROOT?>/login"> sign in</a></p>
            </div>
        </div>
        <div class="subcontainer-right">
            <h2>sign up</h2>
            <form method="POST">
                <div class="inner-subcontainer">
                    <div class="details">
                        <label for="fname">First name</label><br>
                        <input value="<?=set_value('firstname')?>" type="text" name="firstname" id="fname" class="<?=!empty($errors['firstname']) ? 'err-border':'';?>" placeholder="Enter your firstname" required>

                        <?php if(!empty($errors['firstname'])):?>
                            <small class="err-msg"><?=$errors['firstname']?></small>
                        <?php endif;?>
                    </div>
                    <div class="details">
                        <label for="lname">Last name</label><br>
                        <input value="<?=set_value('lastname')?>" type="text" name="lastname" id="lname" class="<?=!empty($errors['lastname']) ? 'err-border':'';?>" placeholder="Enter your lastname" required>

                        <?php if(!empty($errors['lastname'])):?>
                            <small class="err-msg"><?=$errors['lastname']?></small>
                        <?php endif;?>
                    </div>
                    <div class="details">
                        <label for="uname">Username</label>
                        <input value="<?=set_value('username')?>" type="text" name="username" id="uname" class="<?=!empty($errors['username']) ? 'err-border':'';?>" placeholder="enter a username" required>

                        <?php if(!empty($errors['username'])):?>
                            <small class="err-msg"><?=$errors['username']?></small>
                        <?php endif;?>
                    </div>
                    <div class="details">
                        <label for="email">email</label>
                        <input value="<?=set_value('email')?>" type="text" name="email" id="email" class="<?=!empty($errors['email']) ? 'err-border':'';?>" placeholder="enter your email"  required>
                        
                        <?php if(!empty($errors['email'])):?>
                            <small class="err-msg"><?=$errors['email']?></small>
                        <?php endif;?>
                        
                    </div>
                    <div class="details">
                        <label for="phone">Phone Number</label>
                        <input value="<?=set_value('phone')?>" type="text" name="phone" id="phone" class="<?=!empty($errors['phone']) ? 'err-border':'';?>" placeholder="enter your phone number" required>

                        <?php if(!empty($errors['phone'])):?>
                            <small class="err-msg"><?=$errors['phone']?></small>
                        <?php endif;?>
                    </div>
                    <div class="details">
                        <label for="address">Address</label>
                        <input value="<?=set_value('address')?>" type="text" name="address" id="address" class="<?=!empty($errors['address']) ? 'err-border':'';?>" placeholder="enter your address" required>

                        <?php if(!empty($errors['address'])):?>
                            <small class="err-msg"><?=$errors['address']?></small>
                        <?php endif;?>
                    </div>
                    <div class="details">
                        <label for="pswd">password</label>
                        <input value="<?=set_value('password')?>" type="password" name="password" id="pswd" class="<?=!empty($errors['password']) ? 'err-border':'';?>" placeholder="enter a password" required>

                        <?php if(!empty($errors['password'])):?>
                            <small class="err-msg"><?=$errors['password']?></small>
                        <?php endif;?>
                    </div>
                    <div class="details">
                        <label for="confirm-password">confirm Password</label>
                        <input value="<?=set_value('confirm_password')?>" type="password" name="confirm_password" id="confirm-password" class="<?=!empty($errors['password']) ? 'err-border':'';?>" placeholder="retype the password" required>

                        <?php if(!empty($errors['confirm_password'])):?>
                            <small class="err-msg"><?=$errors['confirm_password']?></small>
                        <?php endif;?>
                    </div>
                    <div class="submit">
                        <button type="submit">Create Account</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>