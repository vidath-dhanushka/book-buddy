<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/profile.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/sidenav.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/dropdown.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/profiletable.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/member/tabmenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
<?php $this->view('includes/navbar') ?>
<?php $this->view('includes/sidenav', $data) ?>
<section class="home-section">
<div class="profile-container">
    <div class="profile-box">
        <div class="dropdown-action">
            <div class="icon" onclick="menuToggle()" id="toggle">
                <img src="<?=ROOT?>/assets/images/member/setting.png"  class="setting-icon">
            </div>
            <div class="menu">
                <ul>
                    <li><img src="<?=ROOT?>/assets/images/member/edit-info.png" alt=""><a href="<?=ROOT?>/member/edit">Edit Profile</a></li>
                    <li><img src="<?=ROOT?>/assets/images/member/reset-password.png" alt=""><a href="<?=ROOT?>/member/change_password">Change Password</a></li>
                    <!-- <li><img src="./images/arrow.png" alt=""><a href="#">sample</a></li>
                    <li><img src="./images/arrow.png" alt=""><a href="#">sample</a></li>
                    <li><img src="./images/arrow.png" alt=""><a href="#">sample</a></li>
                    <li><img src="./images/arrow.png" alt=""><a href="#">sample</a></li> -->
                </ul>
            </div>
        </div>
        
        <img src="<?=ROOT?>/assets/images/Avatar.png"  class="profile-pic">
        <h3>A . Perera</h3>
        <p>someonr@gmail.com</p>
        
        <button type="button">BASIC</button>
        <div class="profile-buttom">
            
        </div>
    </div>

    <div class="layout">
        <input name="nav" type="radio" class="nav personal-radio" id="personal" checked="checked" />
        <div class="page personal-page">
            <div class="page-contents">
                <main class="table" id="details_table">

                    <section class="table__body">
                        <table>
                            
                            <tbody>
                                <tr>
                                    <td> First Name </td>
                                    <td> John</td>
                                </tr>
                                <tr>
                                    <td> Last Name </td>
                                    <td> Doe</td>
                                </tr>
                                <tr>
                                    <td> Phone Number </td>
                                    <td> +1-234-567-8901</td>
                                </tr>
                                <tr>
                                    <td> Birth Date </td>
                                    <td> 1998-08-11</td>
                                </tr>
                                <tr>
                                    <td> Username </td>
                                    <td> johndoe123</td>
                                </tr>
                                <tr>
                                    <td> Email </td>
                                    <td> johndoe123@example.com</td>
                                </tr>
                                <tr>
                                    <td> NIC Number </td>
                                    <td> 0000000000</td>
                                </tr>
                                
                            </tbody>
                            
                        </table>
                    </section>
                </main>
            </div>
        </div>
        <label class="nav" for="personal">
            <span>
            
                Personal Details
            </span>
        </label>
    
        <input name="nav" type="radio" class="postal-radio" id="postal" />
        <div class="page postal-page">
            <div class="page-contents">
                <main class="table" id="details_table">

                    <section class="table__body">
                        <table>
                            
                            <tbody>
                                <tr>
                                    <td>Address </td>
                                    <td> 19, 1st Floor, Battaramulla</td>
                                </tr>
                                <tr>
                                    <td> Province </td>
                                    <td> Western</td>
                                </tr>
                                <tr>
                                    <td> District </td>
                                    <td> Colombo</td>
                                </tr>
                                <tr>
                                    <td> City </td>
                                    <td> Battaramulla</td>
                                </tr>
                                <tr>
                                    <td> Postal Code </td>
                                    <td> 10120</td>
                                </tr>
                                
                            </tbody>
                            
                        </table>
                    </section>
                </main>
            </div>
        </div>
        <label class="nav" for="postal">
            <span>
                Postal Details
            </span>
        </label>
    
        
        </div>
   </div>
</section>

<script src="<?= ROOT ?>/assets/js/dropdown.js"></script>

</body>
</html>