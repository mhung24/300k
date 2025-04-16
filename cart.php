<?php
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $product_id => $item) {
        $query = "SELECT * FROM product WHERE id = '$product_id'";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            echo '
                    <p>' . htmlspecialchars($product["name"]) . ' - Số lượng: ' . $item['quantity'] . '</p>
                    <p>Size: ' . htmlspecialchars($item["size"]) . ' - Màu: ' . htmlspecialchars($item["color"]) . '</p>
                    ';
        }
    }
} else {
    echo '<p>Hiện chưa có sản phẩm trong giỏ hàng.</p>';
}
?>