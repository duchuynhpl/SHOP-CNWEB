<?php
require_once('database/dbhelper.php');
?>

<?php
require('database/connect.php');
?>

<?php 
$error = [];
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $sdt = $_POST['sdt'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $rwpass = $_POST['rw-pass'];

  if($pass != $rwpass){
    $error['rw-pass'] = 'Xác nhận mật khẩu không đúng';
  } else {
    if(empty($error)){
    $sql = "INSERT INTO user(hoten,password,email,phone) values ('$name','$pass','$email','$sdt')";
    $query = mysqli_query($con, $sql);
        if($query){
            echo '<script language="javascript">
                alert("Tạo tài khoản thành công"); 
                window.location = "/login.php";
                 </script>';
        }
      }
  }


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký tài khoản</title>

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
        <form class="login100-form" action="" method="POST">
          <span class="login100-form-title">
            Đăng ký tài khoản
          </span>
          <div class="wrap-input100">
            <input class="input100" type="text" name="name" placeholder="Tên">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa-solid fa-user" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100">
            <input class="input100" type="number" name="sdt" placeholder="Số điện thoại">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa-solid fa-phone" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100">
            <input class="input100" type="email" name="email" placeholder="địa chỉ email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100">
            <input class="input100" type="password" name="pass" placeholder="Mật khẩu">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100">
            <input class="input100" type="password" name="rw-pass" placeholder="Xác nhận mật khẩu">
            <span> <?php echo (isset($error['rw-pass']))?$error['rw-pass']:''  ?></span>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
            </span>
          </div>
          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn" name="submit">
              Đăng ký
            </button>
          </div>
          <div class="text-center p-t-136">
            <a class="txt2" href="./login.html">
              Đã có tài khoản
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>