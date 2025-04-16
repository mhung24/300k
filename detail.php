<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            <div class="header_detail-menu">

            </div>

            <div class="list_icon list_icon-detail">


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
                <div class="cart-slide" style="min-height: 1000px; overflow: auto;">
                    <div class="cart-header">
                        <div><i class="fas fa-shopping-basket"></i> Giỏ hàng</div>
                        <i class="fas fa-times" onclick="toggleCart(false)"></i>
                    </div>
                    <div class="cart-body" id="cart-items">
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
                    </div>

                    <div>
                        <button class="btn" onclick="window.location.href='listcart.php'">Thanh toán ngay</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Kết nối cơ sở dữ liệu
        include __DIR__ . '/connect.php';
        $search = '';
        if (isset($_GET['id'])) {
            $search = mysqli_real_escape_string($conn, $_GET['id']);
        }

        // Truy vấn sản phẩm
        $query = "SELECT * FROM product WHERE id = '$search'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
            <div class="content_detail">
                <div class="thumbaili">
                    <img src="./assets/images/sp1.jpg" alt="" />
                </div>
                <div class="detail_img">
                    <img src="./assets/images/sp1.jpg" alt="" id="product-image" />
                </div>
                <div style="width: 600px">
                    <p id="product-name" style="font-size: 24px; font-weight: 600">' . htmlspecialchars($row["name"]) . '</p>
                    <p style="color: #ff0000; font-size: 18px; font-weight: 600; margin-top: 14px;">
                        ' . number_format($row["price"], 0) . ' ₫
                    </p>
                    <p style="font-size: 18px; text-decoration: line-through; margin-top: 14px;">
                        ' . number_format($row["price_ss"], 0) . ' ₫
                    </p>
                    <p style="color: #ff0000; font-size: 14px; font-weight: 600; margin-top: 14px;">
                        *Giá chỉ áp dụng khi mua hàng tại website
                    </p>
                    <p style="color: #ff0000; font-size: 14px; font-weight: 600; margin-top: 14px;">
                        *Vui lòng nhập voucher để được mua với mức giá hiển thị
                    </p>

                    <div class="select_options">
                        <div class="select_options-item">
                            <p>Màu</p>
                            <select name="color" id="color">
                                <option value="">Màu</option>';

                // Truy vấn màu sắc sản phẩm
                $query2 = "SELECT * FROM colors ";
                $result2 = mysqli_query($conn, $query2);

                if ($result2 && mysqli_num_rows($result2) > 0) {
                    while ($colorRow = mysqli_fetch_assoc($result2)) {
                        echo '<option value="' . htmlspecialchars($colorRow["id"]) . '">' . htmlspecialchars($colorRow["color_name"]) . '</option>';
                    }
                } else {
                    echo '<option value="">Không có màu nào</option>';
                }

                echo '          </select>
                        </div>
                        <div class="select_options-item">
                            <p>Chọn size</p>
                            <select name="size" id="size">';

                // Truy vấn kích thước sản phẩm
                $query1 = "SELECT * FROM sizes ";
                $result1 = mysqli_query($conn, $query1);

                if ($result1 && mysqli_num_rows($result1) > 0) {
                    while ($sizeRow = mysqli_fetch_assoc($result1)) {
                        echo '<option value="' . htmlspecialchars($sizeRow["id"]) . '">' . htmlspecialchars($sizeRow["size_value"]) . '</option>';
                    }
                } else {
                    echo '<option value="">Không có kích thước nào</option>';
                }

                echo '          </select>
                        </div>
                    </div>
                    <div class="wrap_btn">
                        <button class="btn" style="margin-right: 10px">Mua ngay</button>
                       <button class="btn" onclick="addToCart(' . htmlspecialchars($row["id"]) . ')">Thêm vào giỏ hàng</button>




                    </div>

                     <div class="des_product">
            <div class="accordion-item">
              <div class="accordion-header">Mô tả sản phẩm</div>
              <div class="accordion-content">
                <p> ' . ($row["description"]) . '</p>
              </div>
            </div>

            <div class="accordion-item">
              <div class="accordion-header">Thông tin bảo hành</div>
              <div class="accordion-content">
                <p>Bảo hành 6 tháng đối với lỗi do nhà sản xuất.</p>
              </div>
            </div>

            <div class="accordion-item">
              <div class="accordion-header">Chính sách đổi trả</div>
              <div class="accordion-content">
                <p>
                  Đổi trả trong vòng 7 ngày kể từ khi nhận hàng với sản phẩm
                  chưa qua sử dụng.
                </p>
              </div>
            </div>

            <div class="accordion-item">
              <div class="accordion-header">Thông tin giao hàng</div>
              <div class="accordion-content">
                <p>Giao hàng toàn quốc trong 2 đến 5 ngày làm việc.</p>
              </div>
            </div>
          </div>
                </div>
            </div>
        ';
            }
        } else {
            echo '<p>Không tìm thấy sản phẩm.</p>';
        }
        ?>

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

<script>
    // Accordion mở/đóng
    document.querySelectorAll(".accordion-item").forEach((item) => {
        const header = item.querySelector(".accordion-header");
        header.addEventListener("click", () => {
            item.classList.toggle("active");
        });
    });

    // Mở / đóng giỏ hàng
    function toggleCart(open) {
        const overlay = document.querySelector(".overlay");
        const cart = document.querySelector(".cart-slide");
        if (open) {
            overlay.style.display = "block";
            cart.classList.add("open");
            renderCartItems(); // Gọi khi mở để hiển thị danh sách sản phẩm
        } else {
            overlay.style.display = "none";
            cart.classList.remove("open");
        }
    }

    // Thêm vào giỏ hàng
    function addToCart(productId) {
        // Lấy thông tin sản phẩm từ trang HTML
        const color = document.getElementById("color")?.value || "";
        const size = document.getElementById("size")?.value || "";
        const name = document.getElementById("product-name")?.innerText || "Không rõ tên";
        const image = document.getElementById("product-image")?.src || "";


        console.log(name);

        // Kiểm tra chọn đầy đủ
        if (!color || !size) {
            alert("Vui lòng chọn màu và size trước khi thêm vào giỏ hàng.");
            return;
        }

        // Lấy giỏ hàng cũ
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        // Kiểm tra sản phẩm đã có chưa (so theo id + color + size)
        const index = cart.findIndex(item =>
            item.id === productId &&
            item.color === color &&
            item.size === size
        );

        if (index === -1) {
            // Thêm sản phẩm mới
            cart.push({
                id: productId,
                name: name,
                image: image,
                color: color,
                size: size,
                quantity: 1
            });
        } else {
            // Tăng số lượng
            cart[index].quantity += 1;
        }

        // Lưu lại giỏ hàng
        localStorage.setItem("cart", JSON.stringify(cart));
        alert("🎉 Sản phẩm đã được thêm vào giỏ hàng!");

        // Cập nhật hiển thị
        updateCart();
        renderCartItems();
    }


    // Cập nhật số lượng giỏ hàng trên icon
    function updateCart() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);

        const cartCount = document.querySelector(".cart-count");
        if (cartCount) {
            cartCount.innerText = totalQuantity;
        }
    }


    // Hiển thị sản phẩm trong khung giỏ hàng
    function renderCartItems() {
        const cartContainer = document.getElementById("cart-items");
        if (!cartContainer) return;

        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        if (cart.length === 0) {
            cartContainer.innerHTML = "<p>Giỏ hàng trống.</p>";
            return;
        }
        cart.forEach((item, index) => {
            cartContainer.innerHTML = cart.map(item => `
        <div class="listcart-item" style="display:flex; align-items: start; line-height: normal; height: 110px; border-bottom: 1px solid #ccc; margin-bottom: 20px" >
            <img src="${item.image}" alt="${item.name}" style="width:80px; height:70px; object-fit:cover; margin-right: 20px">
            <div style='text-align: start;'>
                <p>${item.name}</p>
                <p>Màu: ${item.color} | Size: ${item.size}</p>
                <p>Số lượng: ${item.quantity}</p>
            </div>

            <button onclick="removeItem(${index})">x</button>
        </div>
    `).join("");
        })
    }

    function removeItem(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        alert("Xoá sản phẩm khỏi giỏ hàng thành công!");
        location.reload();
    }


    // Khi trang tải
    window.onload = function () {
        updateCart();
    };


</script>

</html>