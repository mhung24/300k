<?php
session_start();

// Kiểm tra nếu giỏ hàng chưa tồn tại thì tạo giỏ hàng mới
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $color = $_POST['color'];
    $size = $_POST['size'];

    // Kiểm tra xem sản phẩm đã có trong giỏ chưa
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1;  // Tăng số lượng nếu sản phẩm đã có
    } else {
        $_SESSION['cart'][$product_id] = [
            'quantity' => 1,
            'color' => $color,
            'size' => $size
        ];
    }
    echo json_encode(['status' => 'success']);
    exit;
}
?>