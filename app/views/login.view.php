<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/login.css">

</head>

<body>
    <div class="main-container">
        <div class="subcontainer-left">
            <div class="logo">
                <img src="<?=ROOT?>/assets/images/logo.svg" alt="logo" id="logoPic">
            </div>
            <div class="title">
                <p>Welcome back</p>
                <p>join the <a href="<?=ROOT?>/home" class="title-url">BOOK BUDDY</a> family</p>
            </div>
            <div class="signup-img">
                <img src="<?=ROOT?>/assets/images/login-bg.svg" alt="signup img">
            </div>
            <div class="title">
                <p>New to Book Buddy? <a href="<?=ROOT?>/Signup"> Create a free account</a></p>
            </div>
        </div>
        <div class="subcontainer-right">

            <?php if(message()):?>
                <div class="alert"><?=message('', true)?></div>
            <?php endif;?>

            <h2>Login</h2>
            <form method="post">
                <div class="inner-subcontainer">
                    <div class="details">
                        <label for="uname">email</label>
                        <input value="<?=set_value('email')?>" type="email" name="email" id="email" class="<?=!empty($errors['password']) ? 'err-border':'';?>" required1>
                    </div>
                    <div class="details">
                        <label for="password">password</label>
                        <input value="<?=set_value('password')?>" type="password" name="password" id="password" class="<?=!empty($errors['password']) ? 'err-border':'';?>" required1>

                        <?php if(!empty($errors['password'])):?>
                            <small class="err-msg"><?=$errors['password']?></small>
                        <?php endif;?>
                    </div>
                    
                    <div class="submit">
                        <button type="submit">Log In</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>