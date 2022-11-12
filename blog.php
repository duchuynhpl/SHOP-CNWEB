<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài viết</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<?php require "layout/header.php"; ?>

<div class="heading">
    <h1>Bài viết</h1>
    <p> <a href="index.html">trang chủ >></a> bài viết </p>
</div>

<section class="blogs">

    <h1 class="title"> các <span>bài viết</span> <a href="#">xem tất cả >></a> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="image/banner-6.jpg" alt="phu kien">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21 tháng 7 năm 2022 </a>
                    <a href="#"> <i class="fas fa-user"></i> Hà Đức Huỳnh </a>
                </div>
                <h3>phụ kiện hot vừa ra mắt</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, dolor!</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="image/banner-7.webp" alt="lưu ý phối đồ">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 22 tháng 7 năm 2022 </a>
                    <a href="#"> <i class="fas fa-user"></i> Nguyễn Hải Đăng </a>
                </div>
                <h3>bí quyết phối đồ cùng phụ kiện</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, dolor!</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="image/blog-11.jpg" alt="không gian trưng bày">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 1 tháng 8 năm 2022 </a>
                    <a href="#"> <i class="fas fa-user"></i> hà đức huỳnh </a>
                </div>
                <h3>không gian trưng bày ảnh hưởng đến tâm lý mua hàng</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, dolor!</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="image/blog-12.jpg" alt="vest">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 11 tháng 8 năm 2022 </a>
                    <a href="#"> <i class="fas fa-user"></i> nguyễn hải đăng </a>
                </div>
                <h3>tiêu chí chọn vest nam</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, dolor!</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>

    </div>

</section>

<?php require "layout/footer.php"; ?>

<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>