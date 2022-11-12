<?php
require_once('database/dbhelper.php');

?>

<?php
require('database/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/login-register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="#" alt="ảnh thời trang">
        </div>
        <form class="login100-form" action="login.php" method="POST">
            <span class="login100-form-title">
              Đăng nhập
            </span>
            <div class="wrap-input100">
              <input class="input100" type="text" name="email" placeholder="Email">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>
            <div class="wrap-input100">
              <input class="input100" type="password" name="password" placeholder="Password">
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>
            <div class="container-login100-form-btn">
              <button type="submit" class="login100-form-btn" name="submit">
                Đăng nhập
              </button>
            </div>
            <div class="text-center p-t-12">
              <span class="txt1">
                Quên
              </span>
              <a class="txt2" href="#">
                Mật Khẩu?
              </a>
            </div>
            <div class="text-center p-t-136">
              <a class="txt2" href="./register.html">
                Tạo tài khoản
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              </a>
            </div>
        </form>
      </div>
    </div>
  </div>

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
            $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
            $query = mysqli_query($con, $sql);
            $data = mysqli_fetch_assoc($query);
            $num = mysqli_num_rows($query);
            if($num == 0){
                echo '<script language="javascript">
                alert("Tên đăng nhập hoặc mật khẩu sai!"); 
                 </script>';
                // echo '<p style="color:red"Tên đăng nhập hoặc mật khẩu sai</p>';
            } else {
                $_SESSION['users'] = $data;
                header('location:/index.php');
            }
        }
    }
?>

</body>

</html>