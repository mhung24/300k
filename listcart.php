<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-6.4.0-web/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div>
        <div class="header">
            <?php
            include __DIR__ . '/header.php'
                ?>
        </div>

        <div style="width: 1190px; margin: 0 auto;">
            <div style="display: flex; margin-top: 20px">
                <div id="listCartPay" style="width: 50%;"></div>
                <div id="listInfor" style="width: 50%;"></div>
            </div>

            <button style="margin-top: 20px;" class="btn" onclick="submitOrder()">Thanh toán ngay</button>
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

<script>
    const listCartPay = document.getElementById("listCartPay");
    const listInfor = document.getElementById("listInfor");

    const data = JSON.parse(localStorage.getItem('cart')) || [];
    const username = localStorage.getItem("username");
    const address = localStorage.getItem("address");
    const phone_number = localStorage.getItem("phone_number");

    // Hiển thị giỏ hàng
    listCartPay.innerHTML = data.map(item => `
        <div style="display: flex; margin-top: 20px">
            <img src='${item.image}' alt="" style="width: 100px; height: 100px; margin-right: 20px">
            <div>
                <p>${item.name}</p>
                <p style="margin-top: 20px">Số lượng: ${item.quantity}</p>
            </div>
        </div>
    `).join("");

    // Hiển thị thông tin người dùng
    listInfor.innerHTML = `
        <h3>Thông tin người nhận</h3>
        <div style="margin-top: 20px">
            <p>Họ và tên: ${username}</p>
            <p>Số điện thoại: ${phone_number}</p>
            <p>Địa chỉ: ${address}</p>
        </div>
    `;

    // Gửi đơn hàng lên server
    function submitOrder() {
        if (!username || !address || !phone_number || data.length === 0) {
            alert("Thông tin người nhận hoặc giỏ hàng không đầy đủ!");
            return;
        }

        fetch('checkout.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                username: username,
                address: address,
                phone: phone_number,
                cart: data
            })
        })
            .then(res => res.text())  // Get response as text
            .then(text => {
                try {
                    const response = JSON.parse(text);  // Try to parse the response
                    if (response.status === "success") {
                        alert("Đặt hàng thành công!");
                        localStorage.removeItem("cart");
                        window.location.href = "trangchu.php"; // Quay về trang chủ
                    } else {
                        alert("Có lỗi xảy ra khi đặt hàng: " + response.message);
                    }
                } catch (error) {
                    console.error("Lỗi khi xử lý phản hồi từ server:", error);
                    alert("Có lỗi xảy ra khi nhận phản hồi từ server. Vui lòng thử lại sau.");
                }
            })
            .catch(error => {
                console.error("Lỗi khi gửi đơn hàng:", error);
                alert("Không thể gửi đơn hàng. Vui lòng thử lại sau.");
            });
    }

</script>

</html>