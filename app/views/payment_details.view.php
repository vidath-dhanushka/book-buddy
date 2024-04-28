<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/navbar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
    <?php $this->view('includes/navbar') ?>
    <?php $this->view('includes/navbar') ?>


    <div class="container">
        <form action="">
            <div class="row">
                <div class="col">
                    <h3 class="title">billing address</h3>
                    <div class="inputbox">
                        <span>full name:</span>
                        <input type="text" placeholder="john doe">
                    </div>
                    <div class="inputbox">
                        <span>email :</span>
                        <input type="email" placeholder="example@exmp.com">
                    </div>
                    <div class="inputbox">
                        <span>address :</span>
                        <input type="text">
                    </div>
                    <div class="inputbox">
                        <span>city :</span>
                        <input type="text">
                    </div>
                    <div class="flex">
                        <div class="inputbox">
                            <span>Province:</span>
                            <input type="text">
                        </div>
                        <div class="inputbox">
                            <span>Postal code:</span>
                            <input type="text">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3 class="title">Payment details</h3>
                    <div class="inputbox">
                        <span>cards accepted :</span>
                        <img src="<?= ROOT ?>/assets/images/card_img.png" alt="">
                    </div>
                    <div class="inputbox">
                        <span>name on card:</span>
                        <input type="text" placeholder="john doe">
                    </div>

                    <div class="inputbox">
                        <span>credit card number :</span>
                        <input type="number" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputbox">
                        <span>exp month :</span>
                        <input type="text" placeholder="01">
                    </div>
                    <div class="flex">
                        <div class="inputbox">
                            <span>exp year:</span>
                            <input type="number" placeholder="2024">
                        </div>
                        <div class="inputbox">
                            <span>CVV :</span>
                            <input type="text" placeholder="1234">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Proceed" class="submit-btn">
        </form>
    </div>