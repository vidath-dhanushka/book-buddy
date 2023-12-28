<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
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
            <h2>Login</h2>
            <form action="">
                <div class="inner-subcontainer">
                    <div class="details">
                        <label for="username">Username</label>
                        <input type="text" name="usrname" id="uname" required>
                    </div>
                    <div class="details">
                        <label for="pswd">password</label>
                        <input type="text" name="pswd" id="password" required>
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