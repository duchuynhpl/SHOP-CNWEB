<?php
require_once('../../database/connect.php');
?>
<?php
require_once('../../database/dbhelper.php');
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<?php
    $sql = "DELETE FROM category WHERE id= $id";
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    $query = mysqli_query($conn, $sql);
    header('Location: index.php');
?>