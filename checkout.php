<?php
header('Content-Type: application/json');

try {
    // 1. Kết nối database
    include __DIR__ . '/connect.php';
    if ($conn->connect_error) {
        throw new Exception("Kết nối thất bại: " . $conn->connect_error);
    }

    // 2. Nhận dữ liệu JSON từ client
    $input = json_decode(file_get_contents("php://input"), true);

    $username = $conn->real_escape_string($input["username"]);
    $address = $conn->real_escape_string($input["address"]);
    $phone = $conn->real_escape_string($input["phone"]);
    $cart = $input["cart"];

    // 3. Tạo đơn hàng
    $sqlOrder = "INSERT INTO orders (username, address, phone) VALUES ('$username', '$address', '$phone')";
    if (!$conn->query($sqlOrder)) {
        throw new Exception("Lỗi khi thêm đơn hàng: " . $conn->error);
    }

    $order_id = $conn->insert_id;

    // 4. Thêm từng sản phẩm vào bảng chi tiết đơn hàng
    foreach ($cart as $item) {
        $productName = $conn->real_escape_string($item["name"]);
        $productImage = $conn->real_escape_string($item["image"]);
        $productQuantity = (int) $item["quantity"];
        $sqlItem = "INSERT INTO order_items (order_id, product_name, product_image, quantity)
                    VALUES ($order_id, '$productName', '$productImage', $productQuantity)";
        if (!$conn->query($sqlItem)) {
            throw new Exception("Lỗi khi thêm chi tiết đơn hàng: " . $conn->error);
        }
    }

    echo json_encode(["status" => "success"]);
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage()
    ]);
}
?>