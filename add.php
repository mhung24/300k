<?php
include __DIR__ . '/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy và xử lý dữ liệu từ form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : ''; // nếu có trường gender
    $price = floatval($_POST['price']);
    $price_ss = floatval($_POST['price_ss']);
    $quantity = intval($_POST['quantity']);

    // Xử lý ảnh
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "./assets/images/";
        $file_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = mysqli_real_escape_string($conn, $file_name);
        } else {
            echo "<script>alert('Tải ảnh thất bại'); window.history.back();</script>";
            exit;
        }
    }

    // Tạo câu lệnh SQL
    $sql = "INSERT INTO product (name, description, price, quantity, category, gender, image, price_ss)
            VALUES ('$name', '$description', '$price', '$quantity', '$category', '$gender', '$image', '$price_ss')";

    // Thực thi
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Thêm thất bại: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Dữ liệu không hợp lệ'); window.history.back();</script>";
}
?>