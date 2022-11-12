<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

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
    
<!-- header section starts  -->

<header class="header">

    <a href="index.php" class="logo"> <i class="fas fa-shopping-basket"></i> MENSTYLE </a>

    <nav class="navbar">
        <a href="index.php">Trang chủ</a>
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdown">Loại thời trang</a>
            <div class="dropdown-content">
                <?php
                $sql = "SELECT * FROM category";
                $categoryList = executeResult($sql);
                foreach($categoryList as $category){
                    echo '<a class="dropdown-item" href="/shop.php?id_category='.$category['id'].'">'.$category['name'].'</a>
                    <div class="dropdown-divider"></div>';
                }?>
            </div>
        </li>
        <a href="about.php">Về chúng tôi</a>
        <a href="review.php">Đánh giá</a>
        <a href="blog.php">BLOG</a>
        <a href="contact.php">Liên hệ</a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="cart-btn" class="fas fa-shopping-cart"></div>
        <div id="login-btn" class="fas fa-user"></div>
    </div>


    <!-- shoping cart is here -->
    <div class="shopping-cart">
        <div class="box">
              <!-- <i class="fas fa-times"></i> -->      
            <img src="image/quan_dai_thu_mo_vit_perry.jpg" alt="">
            <div class="content">
                <h3>quần dài thú mỏ vịt</h3>
                <span class="quantity">1</span>
                <span class="multiply">x</span>
                <span class="price">100.000đ</span>
            </div>
            <i class="fas fa-times"></i>
        </div>
        <div class="box">
            <!-- <i class="fas fa-times"></i> -->
            <img src="image/ao_thun_tron.jpg" alt="">
            <div class="content">
                <h3>áo thun vải trơn</h3>
                <span class="quantity">2</span>
                <span class="multiply">x</span>
                <span class="price">59.000đ</span>
            </div>
            <i class="fas fa-times"></i>
        </div>
        <div class="box">
            <!-- <i class="fas fa-times"></i> -->
            <img src="image/lot_khe_nam.jpg" alt="">
            <div class="content">
                <h3>quần lọt khe</h3>
                <span class="quantity">10</span>
                <span class="multiply">x</span>
                <span class="price">30.000đ</span>
            </div>
            <i class="fas fa-times"></i>
        </div>
        <h3 class="total"> tổng : <span>518.000đ</span> </h3>
        <a href="#" class="btn">thanh toán</a>
    </div>

<!-- Login form is here -->
<?php 
    if(isset($_POST['submit'])){
        if(empty($_POST['email']) or empty($_POST['password'])){
            echo '<script language="javascript">
            alert("Không được để trống tài khoản hoặc mật khẩu!"); 
             </script>';
            // echo '<p style="color:red"Vui lòng không để trống</p>';
        } else{
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
            $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);
            $num = mysqli_num_rows($query);
            if($num == 0){
                echo '<script language="javascript">
                alert("Tên đăng nhập hoặc mật khẩu sai!"); 
                 </script>';
                // echo '<p style="color:red"Tên đăng nhập hoặc mật khẩu sai</p>';
            } else {
                $_SESSION['users'] = $data;
            }
        }
    }
?>

<?php
    if(empty($_SESSION['users'])){ 
        echo'   
    <form action="" method="POST" class="login-form">
        <h3>đăng nhập</h3>
        <input name="email" type="email" placeholder="nhập email" class="box">
        <input name="password" type="password" placeholder="nhập mật khẩu" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">ghi nhớ tôi</label>
        </div>
        <input name="submit" type="submit" value="đăng nhập" class="btn">
        <p>quên mật khẩu? <a href="#">bấm vào đây</a></p>
        <p>chưa có tài khoản? <a href="#">tạo tài khoản</a></p>
    </form>';
    } else {
        echo'
        <form action="" class="login-form">
        <h4>Xin chào, '.$_SESSION['users']['hoten'].'
        ';
        if($_SESSION['users']['email'] == 'duchuynh@gmail.com'){
            echo'<p><a href="/admin">Trang quản lý admin</p><a></h4>';
        }
        echo'
        <p><a href="#">Đổi mật khẩu</p><a></h4>
        <p><a href="#">Lịch sử mua hàng</p><a></h4> <br>
        <span><a href="logout.php">Thoát</a></span>
    </form> ';
    }
    ?> 


</header>



<!-- header section ends -->