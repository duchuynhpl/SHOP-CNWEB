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
    <title>shop</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<?php require "layout/header.php"; ?>

<div class="heading">
    <h1>mua sắm</h1>
    <p> <a href="index.php">trang chủ >></a> mua sắm </p>
</div>

<section class="products">

    <h1 class="title"> loại <span>sản phẩm</span> <a href="#">xem tất cả >></a> </h1>

    <div class="box-container">

    <?php
    if (isset($_GET['id_category'])) {
        $id_category = $_GET['id_category'];
    }
    $sql = "SELECT * FROM product WHERE id_category=$id_category";
    $productList = executeResult($sql);
    foreach($productList as $product){
        echo '<div class="box">
        <div class="icons">
            <a href="product_detail.php?id='.$product['id'].'" class="fas fa-shopping-cart"></a>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a>
        </div>
        <div class="image">
            <img src="uploads/'.$product['thumbnail'].'" alt="">
        </div>
        <div class="content">
            <h3>'.$product['title'].'</h3>
            <div class="price">'.number_format($product['price'], 0, ',', '.').'</div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
        </div>
    </div>';
    }
     
     ?>

    </div>

</section>

<?php require "layout/footer.php"; ?>

<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>