<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-6.4.0-web/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div id="main">
        <div class="header">
            <?php
            include __DIR__ . '/header.php'
                ?>
        </div>

        <div class="banner">
            <img src="./assets/images/banner.jpg" alt="" />
        </div>

        <div class="content">
            <div class="content_list">
                <div class="sectionHeading-tab-new">TOP TÌM KIẾM</div>

                <div class="list_item-product">
                    <?php
                    include __DIR__ . '/toptk.php'
                        ?>
                </div>
            </div>

            <div class="content_list">
                <div class="sectionHeading-tab-new">SẢN PHẨM MỚI</div>

                <div class="list_item-product">
                    <?php
                    include __DIR__ . '/spmoi.php'
                        ?>
                </div>
            </div>

            <div class="content_list">
                <div class="sectionHeading-tab-new">TOP TÌM KIẾM</div>

                <div class="list_item-product">
                    <?php
                    include __DIR__ . '/spnoibat.php'
                        ?>
                </div>
            </div>
        </div>

        <div class="footer" style="margin-top: 100px;">
            <div class="footer-newsletter">
                <div style="text-align: center; margin-right: 12px">
                    <p style="font-size: 18px; font-weight: 600; margin-bottom: 6px">
                        Đăng ký nhận khuyến mãi
                    </p>
                    <p>
                        Để nhận các thông tin mới từ Biti's cũng như các chương trình
                        khuyến mãi hấp dẫn
                    </p>
                </div>

                <div class="footer-newsletter-input">
                    <input type="text" placeholder="Vui lòng nhập địa chỉ email của bạn" />
                    <button>Đăng ký</button>
                </div>
            </div>

            <div class="footer_img">
                <img src="https://file.hstatic.net/200000522597/file/240x240_1_fcccf4c902ec4c5dbffb267d55480361.jpg"
                    alt="" />
                <img src="https://file.hstatic.net/200000522597/file/240x240_2_eb3aab14e3c4460598b186581e14319c.jpg"
                    alt="" />
                <img src="https://file.hstatic.net/200000522597/file/240x240_3_4ea1528b7b6c4b768edca82c5177b63f.jpg"
                    alt="" />
                <img src="https://file.hstatic.net/200000522597/file/240x240_3_4ea1528b7b6c4b768edca82c5177b63f.jpg"
                    alt="" />
                <img src="https://file.hstatic.net/200000522597/file/240x240_5_796788d0cc3c4cb8becdd4095b9657ec.jpg"
                    alt="" />

                <img src="https://file.hstatic.net/200000522597/file/240x240_6_cbc7d744bbad464393bbf3b378eb17e0.jpg"
                    alt="" />

                <img src="https://file.hstatic.net/200000522597/file/240x240_7_c8ce843f94c74e0e8e8aa51372ddf97b.jpg"
                    alt="" />

                <img src="https://file.hstatic.net/200000522597/file/240x240_8_bfbc1f9a56f24921979f053befbb7d67.jpg"
                    alt="" />
            </div>

            <div class="footer_content">
                <?php
                include __DIR__ . '/footer.php'
                    ?>
            </div>
        </div>
    </div>
</body>

</html>