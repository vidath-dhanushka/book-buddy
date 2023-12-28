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
            <form action="">
                <div class="inner-subcontainer">
                    <div class="details">
                        <label for="fname">First name</label><br>
                        <input type="text" name="firstname" id="fname" required>
                    </div>
                    <div class="details">
                        <label for="lname">Last name</label><br>
                        <input type="text" name="lastname" id="lname" required>
                    </div>
                    <div class="details">
                        <label for="uname">Username</label>
                        <input type="text" name="username" id="uname" required>
                    </div>
                    <div class="details">
                        <label for="email">email</label>
                        <input type="text" name="email" id="email" required>
                    </div>
                    <div class="details">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" id="phone" required>
                    </div>
                    <div class="details">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" required>
                    </div>
                    <div class="details">
                        <label for="pswd">password</label>
                        <input type="text" name="password" id="pswd" required>
                    </div>
                    <div class="details">
                        <label for="confirm-password">confirm Password</label>
                        <input type="text" name="confirm-password" id="confirm-password" required>
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