<?php
include __DIR__ . '/connect.php';
$id = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM product WHERE id = $id";
    $result = mysqli_query($conn, $query);
}

header("Location: admin.php");
exit();

?>