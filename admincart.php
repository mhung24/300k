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
    <style>
        table {
            margin-top: 20px;
            width: 100%;
            border: 1px solid #000;
            border-collapse: collapse;
            text-align: center;
        }

        td,
        tr {
            border: 1px solid #000;
            padding: 6px 10px;
        }
    </style>
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






            </div>
        </div>

        <div style="width: 1600px; margin: 0 auto;">
            <div style="text-align: end; margin-top: 40px; ">
                <button style="padding: 8px 12px"><a href="admincart.php">Chi tiết đơn hàng</a></button>
                <button style="padding: 8px 12px"><a href="admin.php">Danh sách đơn hàng</a></button>
            </div>
            <h4 style="margin: 10px 0 0 0;">Chi tiết đơn hàng</h4>
            <table>
                <thead>
                    <tr>
                        <td>Tên khách hàng</td>
                        <td>Địa chỉ</td>
                        <td>Số điện thoại</td>
                        <td>Tên sản phẩm</td>
                        <td>Hình ảnh</td>
                        <td>Số lượng</td>
                    </tr>
                </thead>

                <tbody>


                    <?php
                    include __DIR__ . '/connect.php';
                    $query = "SELECT *
                        FROM orders o
                        JOIN order_items oi ON o.id = oi.order_id;";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo '
                                        <tr>
                        <td>' . ($row["username"]) . '</td>
                        <td >' . ($row["address"]) . '</td>
                         <td >' . ($row["phone"]) . '</td>
                           <td >' . ($row["product_name"]) . '</td>  
                           <td ><img src="' . ($row["product_image"]) . '" alt="" 
                            style="width: 100px; height: 100px; object-fit: cover;"></td>
                             <td >' . ($row["quantity"]) . '</td>
                        
                    </tr>
                                        ';
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>