<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/css/detail.css" />
    <link rel="stylesheet" href="./assets/css/search.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-6.4.0-web/css/all.min.css" />
</head>

<body>

    <div>

        <div class="header_detail">
            <div class="wrap_header-logo">
                <div class="header_detail-logo">
                    <a href="/300k/trangchu.php">
                        <svg width="127" height="41" viewBox="0 0 127 41" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M35.0821 0H61.3929L50.3446 10.6078C56.6096 9.05901 63.2146 8.10439 70.2766 7.5087L78.2494 0H105.814L96.7028 7.62784C109.573 8.34266 121.078 10.0121 127 11.9183C115.041 12.3949 101.031 12.7523 84.4005 15.2557C77.6801 16.2088 71.5305 17.1619 65.0378 18.593C71.5305 17.8782 79.1617 17.9974 84.4005 18.9505L58.659 41H38.4992L59.1158 20.1434C55.1294 21.2156 50.8015 22.5276 46.1305 24.3147C30.6403 30.0363 18.9088 41 18.9088 41H0L35.0821 0Z"
                                fill="#111111"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="header_detail-menu">

            </div>

            <div class="list_icon list_icon-detail">
                <div class="list_item">
                    <a href="">
                        <i class="fa-regular fa-user" style="color: #fff"></i>
                    </a>
                </div>

                <div class="list_item">
                    <a href="">
                        <i class="fa-regular fa-heart" style="color: #fff"></i>
                    </a>
                </div>

                <div class="list_item list_item-cart" onclick="toggleCart(true)">
                    <i class="fa-solid fa-cart-shopping" style="color: #fff"></i>
                </div>

                <div class="overlay" onclick="toggleCart(false)"></div>

                <!-- Slide giỏ hàng -->
                <div class="cart-slide">
                    <div class="cart-header">
                        <div><i class="fas fa-shopping-basket"></i> Giỏ hàng</div>
                        <i class="fas fa-times" onclick="toggleCart(false)"></i>
                    </div>
                    <div class="cart-body">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Hiện chưa có sản phẩm</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_search" style="margin-top: 40px;">
            <div>
                <p>Trang chủ / Danh mục</p>
            </div>
            <h4>Tất cả</h4>


            <!-- xuly.php hoặc index.php -->
            <form id="form_search" method="GET" action="" class="search_option">
                <!-- Giới tính -->
                <select name="gender" onchange="document.getElementById('form_search').submit()">
                    <option value="" <?= ($_GET['category'] ?? '') == '' ? 'selected' : '' ?>>Giới tính</option>
                    <option value="Nam" <?= ($_GET['category'] ?? '') == 'Nam' ? 'selected' : '' ?>>Nam</option>
                    <option value="Nữ" <?= ($_GET['category'] ?? '') == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                    <option value="Bé trai" <?= ($_GET['category'] ?? '') == 'Bé trai' ? 'selected' : '' ?>>Bé trai
                    </option>
                    <option value="Bé gái" <?= ($_GET['category'] ?? '') == 'Bé gái' ? 'selected' : '' ?>>Bé gái</option>

                    <option value="Phụ kiện" <?= ($_GET['Phụ kiện'] ?? '') == 'Phụ kiện' ? 'selected' : '' ?>>Phụ kiện
                    </option>

                </select>

                <!-- Giá -->
                <select name=" price" onchange="document.getElementById('form_search').submit()">
                    <option value="" <?= empty($_GET['price']) ? 'selected' : '' ?>>Giá</option>
                    <option value="300-500" <?= ($_GET['price'] ?? '') == '300-500' ? 'selected' : '' ?>>Từ 300k đến 500k
                    </option>
                    <option value="500-1000" <?= ($_GET['price'] ?? '') == '500-1000' ? 'selected' : '' ?>>Từ 500k đến 1
                        triệu</option>
                    <option value="1000-5000" <?= ($_GET['price'] ?? '') == '1000-5000' ? 'selected' : '' ?>>Từ 1 triệu đến
                        5 triệu
                    </option>
                    <option value="5000+" <?= ($_GET['price'] ?? '') == '5000+' ? 'selected' : '' ?>>Trên 5 triệu</option>
                </select>

                <!-- Size -->
                <?php
                include __DIR__ . '/connect.php';

                // Lấy dữ liệu danh mục từ bảng category
                $query = "SELECT * FROM category";
                $result = mysqli_query($conn, $query);

                // Kiểm tra xem có kết quả không
                if (mysqli_num_rows($result) > 0):
                    ?>
                    <select name="category" onchange="document.getElementById('form_search').submit()">
                        <!-- Tùy chọn mặc định -->
                        <option value="" <?= empty($_GET['category']) ? 'selected' : '' ?>>Tất cả</option>

                        <!-- Lặp qua các danh mục và hiển thị -->
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <option value="<?= htmlspecialchars($row['name']) ?>" <?= ($_GET['category'] ?? '') == $row['name'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['name']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <?php
                endif;
                ?>




            </form>

            <div class="list_product-search">
                <?php

                include __DIR__ . '/connect.php';
                $gender = '';
                $price = '';
                $category = '';
                $query = '';
                $search = '';

                $where = [];

                if (isset($_GET['gender']) && $_GET['gender'] !== '') {
                    $gender = $_GET['gender'];
                    $where[] = "gender = '$gender'";
                }

                if (isset($_GET['price']) && $_GET['price'] !== '') {
                    $price = $_GET['price'];
                    if ($price == '5000+') {
                        $where[] = "price >= 5000000";
                    } else {
                        // Tách khoảng giá
                        list($min, $max) = explode('-', $price);
                        $min = intval($min) * 1000;
                        $max = intval($max) * 1000;
                        $where[] = "price BETWEEN $min AND $max";
                    }
                }

                if (isset($_GET['category']) && $_GET['category'] !== '') {
                    $category = $_GET['category'];
                    $where[] = "category = '$category'";
                }

                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                }



                // Gộp điều kiện WHERE lại
                $where_sql = '';
                if (!empty($where)) {
                    $where_sql = 'WHERE ' . implode(' AND ', $where);
                    $query = "SELECT * FROM product $where_sql LIMIT 50";
                    $result = mysqli_query($conn, $query);
                } else if ($search !== "") {
                    $query = "SELECT * FROM product WHERE name LIKE '%$search%'";
                    $result = mysqli_query($conn, $query);
                } else {
                    $query = "SELECT * FROM product ";
                    $result = mysqli_query($conn, $query);
                }



                // Thực hiện truy vấn
                // $result = mysqli_query($conn, $query);
                


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
            </div>
        </div>

        <div class="bn_detail">
            <h1>On FIT</h1>

            <div class="wrap_bn">
                <img src="./assets/images/bn1.jpg" alt="" />
                <img src="./assets/images/bn2.jpg" alt="" />
                <img src="./assets/images/bn3.jpg" alt="" />
            </div>
        </div>

        <footer class="footer">
            <div class="footer-logo">BITI'SHUNTER</div>
            <div class="footer-content">
                <div class="footer-column">
                    <h4>THÔNG TIN</h4>
                    <ul>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Khách hàng thân thiết</a></li>
                        <li><a href="#">Bảo vệ thông tin</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>VỀ BITI’SHUNTER</h4>
                    <ul>
                        <li><a href="#">Câu chuyện</a></li>
                        <li><a href="#">Hoạt động</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>TRỢ GIÚP</h4>
                    <ul>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Hệ thống cửa hàng</a></li>
                        <li><a href="#">Hợp tác</a></li>
                        <li><a href="#">Q&A</a></li>
                    </ul>
                </div>

                <div class="footer-column contact">
                    <h4>LIÊN HỆ</h4>
                    <p>Email: <strong>chamsockhachhang@bitis.com.vn</strong></p>
                    <p>Hotline: <strong>0966.158.666</strong></p>
                    <p>Thời gian: 8h – 21h30 (trừ lễ, Tết)</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </footer>


    </div>

</body>
<script src="./assets/js/main.js"></script>

</html>