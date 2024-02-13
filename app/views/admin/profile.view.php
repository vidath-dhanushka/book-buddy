<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/admin/profile.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/admin/profiletable.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/sidenav.css">
    
   
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>
<?php if(!empty($row)):?>
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
                    <li><img src="<?=ROOT?>/assets/images/member/edit-info.png" alt=""><a href="<?=ROOT?>/admin/edit">Edit Profile</a></li>
                    <li><img src="<?=ROOT?>/assets/images/member/reset-password.png" alt=""><a href="<?=ROOT?>/admin/change_password">Change Password</a></li>
                   
                </ul>
            </div>
        </div>
        
        
        <img src=""  class="profile-pic">
        <h3><?=esc($row->firstname)?> <?=esc($row->lastname)?></h3>
        <p><?=esc($row->email)?></p>
        
        <!-- <button type="button">BASIC</button> -->
        <div class="profile-buttom">
            
        </div>
    </div>
   
    <div class="layout">
        <input name="nav" type="radio" class="nav personal-radio" id="personal" checked="checked" />
        <div class="page personal-page">
            <div class="page-contents">
                <main class="table" id="details_table">
                    <label class="nav" for="personal">
                        <span>
                        
                            Personal Details
                        </span>
                    </label>
                    <section class="table__body">
                        <table>
                            
                            <tbody>
                                <tr>
                                    <td> First Name: </td>
                                    <td> <?=esc($row->firstname)?></td>
                                </tr>
                                <tr>
                                    <td> Last Name: </td>
                                    <td> <?=esc($row->lastname)?></td>
                                </tr>
                                <tr>
                                    <td> Phone Number: </td>
                                    <td><?=esc($row->phone)?></td>
                                </tr>
                                <!-- <tr>
                                    <td> Birth Date </td>
                                    <td> 1998-08-11</td>
                                </tr> -->
                                <tr>
                                    <td> Username: </td>
                                    <td> <?=esc($row->username)?></td>
                                </tr>
                                <tr>
                                    <td> Email: </td>
                                    <td> <?=esc($row->email)?></td>
                                </tr>

                                <tr>
                                    <td>Address: </td>
                                    <td> <?=set_value('',$row->address)?></td>
                                </tr>
                                
                                
                            </tbody>
                            
                        </table>
                    </section>
                </main>
            </div>
        </div>
       
       
        <input name="nav" type="radio" class="postal-radio" id="postal" />
        
       
        
        
        
        
        </div>
   </div>
</section>
<script src="<?= ROOT ?>/assets/js/dropdown.js"></script>
<?php else:?>
    <div>
       Profile is not found..
    </div>
<?php endif;?>


</body>
</html>