<?php
require_once('database/dbhelper.php');

?>

<?php
require('database/connect.php');

?>

<?php
if (isset($_GET['id'])) {
   $id = $_GET['id'];
}
  $sql = "SELECT * FROM product WHERE id=$id";
  $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  $query = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail</title>

    <link rel="stylesheet" href="./css/detail.css">
    <link rel="stylesheet" href="./css/style.css">

     <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
     <meta name="robots" content="noindex,follow" />
     <!-- CSS Boostrap 4.3.1 -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

<?php require "layout/header.php"; ?>

    <main class="container">
        <!-- Left Column / Headphones Image -->
        <div class="left-column">
          <img style="height: 500px; width:500px" data-image="black" src="uploads/<?php echo $data['thumbnail']; ?>">
        </div>
  
  
        <!-- Right Column -->
        <div class="right-column">

          <!-- Product Description -->
          <div class="product-description">
            <h1><?php echo $data['title']; ?></h1>
            <p><?php echo $data['content']; ?></p>
          </div>
  
          <!-- Product Configuration -->
          <div class="product-configuration">
            <div class="size-config">
              <span>Size</span>
              <div class="size-choose">
                <button>M</button>
                <button>L</button>
                <button>XL</button>
              </div>
            </div>
          </div>
        <form action="shopping_cart.php?action=add" method="POST">
          <div class="product-sl">
            <label for="sl">Số lượng: </label>
            <input type="number" name="quanlity[<?=$data['id']?>]" value="1">
          </div>
  
          <!-- Product Pricing -->
          <div class="product-price">
            <span>Giá: <?php echo number_format($data['price'], 0, ',', '.'); ?></span>
            <input type="submit" class="btn" value="Thêm giỏ hàng">
        </div>
        </form>
      </main>



<?php require "layout/footer.php"; ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="js/detail.js" charset="utf-8"></script>
    <script src="js/script.js"></script>

</body>
</html>