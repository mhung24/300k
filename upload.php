<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/css/detail.css" />
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
            <div class="header_detail-menu"></div>
            <div class="list_icon list_icon-detail"></div>
        </div>

        <div class="container-item">
            <div class="container-header">
                <p>Sửa sản phẩm</p>
            </div>

            <?php
            include __DIR__ . '/connect.php';
            $id = '';
            $query = '';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM product where id= $id";
            }
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $categoryQuery = "SELECT * FROM category";
                    $categoryResult = mysqli_query($conn, $categoryQuery);

                    echo '
                            <form method="post" action="uploadData.php?id=' . ($row["id"]) . '" enctype="multipart/form-data">
                                <div class="content_list">
                                    <ul class="wrap_content_list-header" style="margin: 12px 0">
                                        <li>
                                            <a class="content_list-header">Thông tin chung</a>
                                        </li>
                                    </ul>

                                    <div>
                                        <div class="wrap_content_list-name wrap_content">
                                            <p>Tên sản phẩm</p>
                                            <input id="name" type="text" placeholder="Nhập tên sản phẩm"
                                                name="name" value="' . ($row["name"]) . '" />
                                        </div>
                                        <div class="wrap_content_list-select ">
                                            <div class="content_list-select wrap_content">
                                                <p>Nhà cung cấp</p>
                                                <select id="category" name="category">';

                    while ($cat = mysqli_fetch_assoc($categoryResult)) {
                        $selected = ($cat["category"] == $row["category"]) ? "selected" : "";
                        echo '<option value="' . htmlspecialchars($cat["name"]) . '" ' . $selected . '>' . htmlspecialchars($cat["name"]) . '</option>';
                    }

                    echo '</select>
                                            </div>
                                        </div>
                                        <div class="wrap_content_list-describe wrap_content">
                                            <p>Mô tả sản phẩm</p>
                                            <input type="text" placeholder="Mô tả" id="description" name="description" value="' . ($row["description"]) . '" />
                                        </div>
                                </div>

                                <div class="content_list wrap_content">
                                    <p>Hình ảnh sản phẩm</p>
                                    <img src="./assets/images/' . $row["image"] . '" alt="' . htmlspecialchars($row["name"]) . '" style="width: 100px; height: 100px; object-fit: cover;">
                                    <input type="text" id="image_upload" name="image_upload" value="' . ($row["image"]) . '" style="display:none;">
                                    <input type="file" id="image" style="margin-top:10px" name="image" accept="image/*" >
                                </div>

                                <div class="content_list wrap_content">
                                    <p>Giá sản phẩm</p>
                                    <input type="text" placeholder="0" name="price"  value="' . ($row["price"]) . '"/>
                                </div>

                                <div class="content_list wrap_content">
                                    <p>Giá so sánh</p>
                                    <input type="text" placeholder="0" name="price_ss"  value="' . ($row["price_ss"]) . '"/>
                                </div>

                                <div class="content_list wrap_content">
                                    <p >Số lượng</p>
                                    <input type="text" placeholder="0" name="quantity" id="quantity" value="' . ($row["quantity"]) . '" />
                                </div>

                                <div class="wrap_btn-save">
                                    <input class="btn_save-data" type="submit" value="Sửa" />

                                    <button class="btn_save-data cancel_data ">
                                        <a href="delete.php?id=' . ($row["id"]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn xoá sản phẩm này không?\')">Xoá</a>
                                    </button>
                                </div>
                    </form>';
                }
            }
            ?>

        </div>
    </div>
</body>

</html>