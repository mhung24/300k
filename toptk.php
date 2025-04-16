<?php

include __DIR__ . '/connect.php';

// Truy vấn thông tin sản phẩm
$query = "SELECT * FROM product LIMIT 12";
$query1 = "SELECT * FROM colors";
$query2 = "SELECT * FROM sizes";

$result = mysqli_query($conn, $query);
$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);

// Nhóm màu sắc theo product_id
$colorCounts = [];
if (mysqli_num_rows($result1)) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $colorCounts[$row['product_id']][] = $row; // Nhóm màu sắc theo product_id
    }
}

// Nhóm kích thước theo product_id
$sizeCounts = [];
if (mysqli_num_rows($result2)) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $sizeCounts[$row['product_id']][] = $row; // Nhóm kích thước theo product_id
    }
}

// Hiển thị thông tin sản phẩm
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['id']; // Lấy ID sản phẩm
        $colorLength = isset($colorCounts[$productId]) ? count($colorCounts[$productId]) : 0; // Số lượng màu sắc
        $sizeLength = isset($sizeCounts[$productId]) ? count($sizeCounts[$productId]) : 0; // Số lượng kích thước

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
                           ' . ($row["name"]) . '
                        </p>
                    </a>

                    <div class="item_product-price">
                        <p class="price">' . ($formattedNumber = number_format($row["price"], 0)) . ' ₫</p>
                        <p class="price_ss">' . ($formattedNumber = number_format($row["price_ss"], 0)) . ' ₫</p>
                        <p class="pt">-' . round(100 - ($row["price"] / (($row["price_ss"]))) * 100, 0) . '%</p>
                    </div>
                </div>
            </div>
        ';
    }
}

// Đóng kết nối
mysqli_close($conn);
?>