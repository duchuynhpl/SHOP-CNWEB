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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/shopping_cart.css">

</head>
<body>

<?php
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart']= array();
  }
  

  if(isset($_GET['action'])){
    function update_cart($add = false){
      foreach($_POST['quanlity'] as $id => $quanlity){
        if($quanlity == 0){
          unset($_SESSION['cart'][$id]);
        } else {
          if($add){
            $_SESSION['cart'][$id] += $quanlity;
          } else {
            $_SESSION['cart'][$id] = $quanlity;
          }
        } 
      }
    }
    $error = [];
    switch ($_GET['action']){
      case "add":
        update_cart(true);
      header('location: ./shopping_cart.php');
      break;
      case "delete":
        if(isset($_GET['id'])){
          unset($_SESSION['cart'][$_GET['id']]);
        }
        header('location: ./shopping_cart.php');
        break;
      case "submit":
        if(isset($_POST['update_click'])){
          update_cart();
        } elseif(isset($_POST['order_click'])){
          $name = $_POST['fullname'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $note = $_POST['note'];
          $orderDate = date('Y-m-d H:i:s');
          $status = $_POST['status'];

          if(empty($name)){
            $error['fullname'] = "Bạn chưa nhập tên người nhận<br>";
          }
          if(empty($phone)){
            $error['phone'] = "Bạn chưa nhập số điện thoại người nhận<br>";
          }
          if(empty($address)){
            $error['address'] = "Bạn chưa nhập địa chỉ giao hàng<br>";
          }
          if(empty($_POST['quanlity'])){
            $error['quanlity'] = "Chưa có sản phẩm";
          }

          if(empty($_SESSION['users'])){
            echo '<script language="javascript">
            alert("Vui lòng đăng nhập trước khi thanh toán"); 
            window.location = "/index.php";
             </script>';
          }

          if(empty($error) && !empty($_POST['quanlity'])){
            $sql = "SELECT * FROM product WHERE id in (".implode(",", array_keys($_POST['quanlity'])).")";
            $productList = executeResult($sql);
            $total = 0;
            $orderProducts = array();
              foreach($productList as $product){
                $orderProducts[] = $product;
                $total += $product['price']*$_POST['quanlity'][$product['id']];
              }  
              $sql ="INSERT INTO `orders` (`fullname`, `phone`, `address`, `note`, `order_date`) VALUES ('$name', '$phone', '$address', '$note', '$orderDate')";
              $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
              $inserOrder = mysqli_query($conn, $sql);
              $orderID = $conn->insert_id;

              $insertString = "";
              foreach($orderProducts  as $key => $product){
                $insertString .= "(NULL, '$orderID', '1', '".$product['id']."', '".$_POST['quanlity'][$product['id']]."', '".$product['price']."', '$status')";
                if($key != count($orderProducts)-1){
                  $insertString .= ",";
                }
              }  
              $sql ="INSERT INTO `order_details` (`id`, `order_id`, `id_user`, `product_id`, `num`, `price`, `status`) VALUES ".$insertString."";
              $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
              $inserOrder = mysqli_query($conn, $sql);
          }

        }
        break;  
    }
  }
?>

<?php require "layout/header.php"; ?>



    <div class="container px-3 my-5 clearfix font-large" style="padding-top: 7rem; padding-bottom: 5rem;">
        <!-- Shopping cart table -->
        <div class="card-shop">
            <div class="card-header">
                <h2>thông tin giỏ hàng</h2>
            </div>
          <form action="shopping_cart.php?action=submit" method="POST">
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered m-0">
                    <thead>
                      <tr>
                        <!-- Set columns width -->
                        <th class="text-center py-3 px-4" style="min-width: 400px;">chi tiết sản phẩm</th>
                        <th class="text-right py-3 px-4" style="width: 100px;">giá</th>
                        <th class="text-center py-3 px-4" style="width: 120px;">số lượng</th>
                        <th class="text-right py-4 px-4" style="width: 120px;">Thành tiền</th>
                        <th class="text-center align-middle py-3 px-0" style="width: 50px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"></a></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(!empty($_SESSION['cart'])){
                      $sql = "SELECT * FROM product WHERE id in (".implode(",", array_keys($_SESSION['cart'])).")";
                      $productList = executeResult($sql);
                      $tc=0;
                      foreach($productList as $product){
                      $tt= $_SESSION['cart'][$product['id']]*$product['price'];
                      $tc+=$tt;
                      echo'<tr>
                      <td class="p-4">
                        <div class="media align-items-center">
                          <img src="./image/'.$product['thumbnail'].'" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                          <div class="media-body">
                            <a href="#" class="d-block text-dark">'.$product['title'].'</a>
                            <small>
                              <span class="text-muted">Size: </span> 32 &nbsp;
                            </small>
                          </div>
                        </div>
                      </td>
                      <td class="text-right font-weight-semibold align-middle p-4">'.number_format($product['price'], 0, ',', '.').'</td>
                      <td class="align-middle p-4"><input type="text" name="quanlity['.$product['id'].']" class="form-control text-center" value="'.$_SESSION['cart'][$product['id']].'"></td>
                      <td class="text-right font-weight-semibold align-middle p-4">'.number_format($tt, 0, ',', '.').'</td>
                      <td class="text-center align-middle px-0"><a href="shopping_cart.php?action=delete&id='.$product['id'].'" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>'; 
                     } echo '<tr>
                     <td>Tổng cộng</td>
                     <td></td>
                     <td></td>
                     <td class="text-center">'.number_format($tc, 0, ',', '.').'</td>
                     <td></td>
                     </tr>';
                    } else {
                      echo'<tr>
                      <td>Chưa có sản phẩm</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>
                      <tr>
                      <td>Tổng cộng</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      </tr>';
                    }
                    ?> 
                    <span style="color: red;"> <?php echo (isset($error['quanlity']))?$error['quanlity']:''  ?></span>
                    </tbody>
                  </table>
                </div>
                <!-- / Shopping cart table -->
                <div class="float-right mt-3">
                  <button type="submit" name="update_click" class="btn btn-lg mt-2 mr-3 hover-btn">Cập nhật giỏ hàng</button>
                </div>
                <br>
                <div class="form-info">
                  <div class="mt-4">
                    <label>Họ và tên</label>
                    <input type="text" name="fullname" placeholder="họ và tên người nhận hàng" class="form-control">
                    <span style="color: red;"> <?php echo (isset($error['fullname']))?$error['fullname']:''  ?></span>
                    <label>Điện thoại</label>
                    <input type="text" name="phone" placeholder="số điện thoại nhận hàng" class="form-control">
                    <span style="color: red;"> <?php echo (isset($error['phone']))?$error['phone']:''  ?></span>
                    <label>Địa chỉ</label>
                    <input type="text" name="address" placeholder="địa chỉ giao hàng" class="form-control">
                    <span style="color: red;"> <?php echo (isset($error['address']))?$error['address']:''  ?></span>
                    <label>Ghi chú</label>
                    <textarea name="note" class="form-control" cols="30" rows="10"></textarea>
                    <input type="hidden" name="status" class="form-control" value="Hàng đang chuẩn bị">
                  </div>
                </div>
              </div>
            </div>
           
            <div class="float-right mt-3">
              <button type="submit" name="order_click" class="btn btn-lg mt-2 hover-btn checkout-btn">Thanh toán</button>
            </div>
            </div>
          </form> 
      </div>






<?php require "layout/footer.php"; ?>

<!-- custom css file link -->
<script src="js/script.js"></script>

</body>
</html>