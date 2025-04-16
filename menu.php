<ul class="nav">
    <li>
        <a href="">Về Bitis</a>
    </li>
    <li>
        <div class="menu_item menu_item-hover">
            <a href="">
                <p>Nam</p>
            </a>
            <i class="fa-solid fa-chevron-down"></i>
        </div>
        <ul class="navbar">
            <?php
            $categories = [
                'Hunter',
                'Sandal',
                'Giày thể thao',
                'Giày Chạy Bộ & Đi Bộ',
                'Giày Đá Bóng',
                'Giày Tây',
                'Dép - Hài',
                'Balo',
                'Quần áo'
            ];

            foreach ($categories as $cat) {
                $url = "/300k/search.php?gender=Nam&price=&category=" . urlencode($cat);
                echo "<li><a href=\"$url\">$cat</a></li>";
            }
            ?>
        </ul>
    </li>
    <li>
        <div class="menu_item">
            <a href="">
                <p>Nữ</p>
            </a>
            <i class="fa-solid fa-chevron-down"></i>
        </div>
        <ul class="navbar">
            <?php
            $categories = [
                'Hunter',
                'Sandal',
                'Giày thể thao',
                'Giày Chạy Bộ & Đi Bộ',
                'Giày Cao Gót',
                'Giày Búp Bê',
                'Dép - Hài',
                'Túi Xách - Ví',
                'Balo',
                'Quần áo'
            ];

            foreach ($categories as $cat) {
                $url = "/300k/search.php?gender=Nữ&price=&category=" . urlencode($cat);
                echo "<li><a href=\"$url\">$cat</a></li>";
            }
            ?>
        </ul>

    </li>
    <li>
        <div class="menu_item">
            <a href="">
                <p>Bé trai</p>
            </a>
            <i class="fa-solid fa-chevron-down"></i>
        </div>
        <ul class="navbar">
            <?php
            $categories = [
                'Sandal',
                'Giày thể thao',
                'Dép',
                'Giày & Sandal Tập Đi'
            ];

            foreach ($categories as $cat) {
                $url = "/300k/search.php?gender=Bé trai&price=&category=" . urlencode($cat);
                echo "<li><a href=\"$url\">$cat</a></li>";
            }
            ?>
        </ul>

    </li>
    <li>
        <div class="menu_item">
            <a href="">
                <p>Bé gái</p>
            </a>
            <i class="fa-solid fa-chevron-down"></i>
        </div>
        <ul class="navbar">
            <?php
            $categories = [
                'Sandal',
                'Giày thể thao',
                'Dép bé gái',
                'Giày & Sandal Tập Đi',
                'Giày Búp Bê'
            ];

            foreach ($categories as $cat) {
                $url = "/300k/search.php?gender=Bé gái&price=&category=" . urlencode($cat);
                echo "<li><a href=\"$url\">$cat</a></li>";
            }
            ?>
        </ul>

    </li>
    <li>
        <div class="menu_item">
            <a href="">
                <p>Phụ kiện</p>
            </a>
            <i class="fa-solid fa-chevron-down"></i>
        </div>
        <ul class="navbar">
            <ul class="navbar">
                <?php
                $categories = [
                    "Balo",
                    "Balo Trẻ Em",
                    "Túi Trẻ Em",
                    "Túi Xách",
                    "Ví",
                    "Vớ Người Lớn",
                    "Vớ Trẻ Em",
                    "Áo Thun & Áo Khoác",
                    "Quần Dài & Quần Short",
                    "Nón",
                    "Charm",
                    "Lót Đế",
                    "Dây Giày",
                    "Gấu Bông",
                    "Xịt Khử Mùi",
                    "Túi Mù"
                ];

                foreach ($categories as $cat) {
                    $url = "/300k/search.php?gender=Phụ kiện&price=&category=" . urlencode($cat);
                    echo "<li><a href=\"$url\">$cat</a></li>";
                }
                ?>
            </ul>

        </ul>

    </li>
    <li><a href="/300k/search.php?gender=&price=&category="> Danh mục </a></li>

</ul>