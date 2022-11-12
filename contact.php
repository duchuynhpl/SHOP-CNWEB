<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        .lowercase{
            text-transform: lowercase;
        }
    </style>

</head>
<body>
    
<?php require "layout/header.php"; ?>

<div class="heading">
    <h1>Liên hệ với chúng tôi</h1>
    <p> <a href="index.html">trang chủ >></a> liên hệ </p>
</div>

<section class="contact">

    <div class="icons-container">

        <div class="icons">
            <i class="fas fa-phone"></i>
            <h3>Số điện thoại</h3>
            <p>+84-1234567789</p>
            <p>+111-222-3333</p>
        </div>

        <div class="icons">
            <i class="fas fa-envelope"></i>
            <h3>Địa chỉ Email</h3>
            <p class="lowercase">ndndnd@gmail.com</p>
            <p class="lowercase">anasdhai@gmail.com</p>
        </div>

        <div class="icons">
            <i class="fas fa-map-marker-alt"></i>
            <h3>địa chỉ</h3>
            <p>3/2, ninh kiều - cần thơ</p>
        </div>

    </div>

    <div class="row">

        <form action="">
            <h3>thông tin liên lạc</h3>
            <div class="inputBox">
                <input type="text" placeholder="tên của bạn" class="box">
                <input type="email" placeholder="email của bạn" class="box">
                <input type="number" placeholder="số điện thoại của bạn" class="box">
            </div>
            <textarea placeholder="nội dung" cols="30" rows="10"></textarea>
            <input type="submit" value="gửi" class="btn">
        </form>

    </div>

</section>

<?php require "layout/footer.php"; ?>

<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>