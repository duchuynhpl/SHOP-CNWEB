<?php
require_once('database/dbhelper.php');
?>

<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
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
    <title>Lịch sử mua hàng</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/history.css">

</head>
<body>

<?php require "layout/header.php"; ?>

<div class="container">
    <div class="row">
        <h2>Lịch sử mua hàng</h2>
        <table class="table table-bordered m-0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(empty($_SESSION['users'])){
                    echo'
                    <tr>
                    <th></th>
                    <th>Vui lòng đăng nhập xem lịch sử mua hàng</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>';
                } else {
                    $userId = $_SESSION['users']['id'];
                    $sql = "SELECT *,order_details.num as numdetails from order_details, product where product.id=order_details.product_id AND order_details.id_user = '$userId' ORDER BY order_id DESC";
                    $order_details_List = executeResult($sql); 
                    $count = 0;
                    $total = 0;
                    foreach ($order_details_List as $order) {
                        $total = $order['numdetails']*$order['price'];
                        echo '<tr>
                        <th>' . (++$count) . '</th>
                        <th>'.$order['title'].'</th>
                        <th>'.$order['numdetails'].'</th>
                        <th>' . number_format($total, 0, ',', '.') . ' VNĐ</th>
                        <th>'.$order['status'].'</th>
                    </tr>';
                    }
                }
                 ?>
            </tbody>
        </table>
    </div>
</div>

<?php require "layout/footer.php"; ?>
<!-- custom css file link -->
<script src="js/script.js"></script>
</body>
</html>