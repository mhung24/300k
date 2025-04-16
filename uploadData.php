<?php
include __DIR__ . '/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Escape input để an toàn và chống lỗi SQL
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $price_ss = mysqli_real_escape_string($conn, $_POST['price_ss']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $image = mysqli_real_escape_string($conn, $_POST['image_upload']); // ảnh cũ

    // Nếu có ảnh mới được upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "./assets/images/";
        $file_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = mysqli_real_escape_string($conn, $file_name); // cập nhật ảnh mới
        }
    }

    // Cập nhật vào DB
    $sql = "UPDATE product SET 
                name = '$name',
                category = '$category',
                description = '$description',
                image = '$image',
                price = '$price',
                quantity = '$quantity',
                price_ss = '$price_ss'
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Cập nhật sản phẩm thành công!'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Cập nhật thất bại: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Dữ liệu không hợp lệ'); window.history.back();</script>";
}
?>