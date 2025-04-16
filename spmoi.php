<?php

include __DIR__ . '/connect.php';

// Truy vấn thông tin sản phẩm, lấy tối đa 12 sản phẩm cuối
$query = "SELECT * FROM product ORDER BY id DESC LIMIT 12";
$result = mysqli_query($conn, $query);

// Nhóm màu sắc theo product_id
$colorCounts = [];
$query1 = "SELECT * FROM colors";
$result1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($result1)) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $colorCounts[$row['product_id']][] = $row;
    }
}

// Nhóm kích thước theo product_id
$sizeCounts = [];
$query2 = "SELECT * FROM sizes";
$result2 = mysqli_query($conn, $query2);
if (mysqli_num_rows($result2)) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $sizeCounts[$row['product_id']][] = $row;
    }
}

// Hiển thị thông tin sản phẩm
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['id'];
        $colorLength = isset($colorCounts[$productId]) ? count($colorCounts[$productId]) : 0;
        $sizeLength = isset($sizeCounts[$productId]) ? count($sizeCounts[$productId]) : 0;

        // Định dạng giá
        $price = number_format($row["price"], 0, ',', '.') . ' ₫';
        $originalPrice = number_format($row["price_ss"], 0, ',', '.') . ' ₫';
        $discount = round(100 - ($row["price"] / ($row["price_ss"])) * 100, 0) . '%';

        echo '
            <div class="item_product">
                <a href="detail.php?id=' . ($row["id"]) . '">
                    <img src="./assets/images/' . htmlspecialchars($row["image"]) . '" alt="" />
                </a>
                <div class="item_product-in4">
                    <div class="item_product-in4-size">
                        <p>' . htmlspecialchars($sizeLength) . ' kích thước</p>
                        <p>' . htmlspecialchars($colorLength) . ' màu sắc</p>
                    </div>

                    <a class="item_product-name" href="detail.php?id=' . ($row["id"]) . '">
                        <p style="margin-top: 10px">
                           ' . htmlspecialchars($row["name"]) . '
                        </p>
                    </a>

                    <div class="item_product-price">
                        <p class="price">' . $price . '</p>
                        <p class="price_ss">' . $originalPrice . '</p>
                        <p class="pt">-' . $discount . '</p>
                    </div>
                </div>
            </div>
        ';
    }
}

// Đóng kết nối
mysqli_close($conn);
?>