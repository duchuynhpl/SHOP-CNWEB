<?php
require_once('database/dbhelper.php');
?>


<?php
require('database/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php require "layout/header.php"; ?>

<section class="home">

    <div class="slides-container">

        <div class="slide active">
            <div class="content">
                <span>combo quần áo công sở</span>
                <h3>giảm giá đến 50%</h3>
                <a href="#" class="btn">mua ngay</a>
            </div>
            <div class="image">
                <img src="image/home-img-4.png" alt="">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>combo 3-5-9 áo thun vải trơn mát lạnh</span>
                <h3>giảm còn 59K</h3>
                <a href="#" class="btn">mua ngay</a>
            </div>
            <div class="image">
                <img src="image/home-img-5.png" alt="">
            </div>
        </div>

    </div>

    <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
    <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>

</section>

<section class="category">

    <h1 class="title">loại <span>thời trang</span> <a href="#">xem tất cả >></a> </h1>

    <div class="box-container">
        <?php
        $sql = "SELECT * FROM category";
        $categoryList = executeResult($sql);
        foreach($categoryList as $category){
            echo '<a href="/san-pham'.$category['id'].'.html" class="box">
            <img src="image/'.$category['img'].'" alt="">
            <h3>'.$category['name'].'</h3>
            </a>';
        }
         ?>

    </div>

</section>

<section class="banner-container">

    <div class="banner">
        <img src="image/banner-5.webp" alt="">
        <div class="content">
            <span>Sales giới hạn</span>
            <h3>giảm đến 59%</h3>
            <a href="#" class="btn">mua ngay</a>
        </div>
    </div>

    <div class="banner">
        <img src="image/banner-7.webp" alt="">
        <div class="content">
            <span>Giảm giá cực sốc</span>
            <h3>giảm đến 59k</h3>
            <a href="#" class="btn">mua ngay</a>
        </div>
    </div>

    <div class="banner">
        <img src="image/banner-8.webp" alt="">
        <div class="content">
            <span>xả hàng</span>
            <h3>đồng giá 59k</h3>
            <a href="#" class="btn">mua ngay</a>
        </div>
    </div>

</section>

<?php require "layout/footer.php"; ?>

<!-- custom css file link -->
<script src="js/script.js"></script>

</body>
</html>