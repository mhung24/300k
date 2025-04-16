<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
                echo '
                            <form method="post" action="uploadData.php?id=' . ($row["id"]) . '" enctype="multipart/form-data">
                                <div class="content_list">
                                    <ul class="wrap_content_list-header">
                                        <li>
                                            <a class="content_list-header">Thông tin chung</a>
                                        </li>
                                    </ul>

                                    <div>
                                        <div class="wrap_content_list-name">
                                            <p>Tên sản phẩm</p>
                                            <input id="name_product" type="text" placeholder="Nhập tên sản phẩm"
                                                name="name_product" value="' . ($row["name"]) . '" />
                                        </div>
                                        <div class="wrap_content_list-select">
                                            <div class="content_list-select">
                                                <p>Nhà cung cấp</p>
                                                <input type="text" id="supplier" name="supplier" value="' . ($row["category"]) . '">
                                            </div>

                                           

                                            </div>
                                        </div>

                                        <div class="wrap_content_list-describe">
                                            <p>Mô tả sản phẩm</p>
                                            <input type="text" placeholder="Mô tả" id="describe" name="describe" value="' . ($row["description"]) . '" />
                                        </div>
                                    </div>
                                </div>


                                <div class="content_list">
                                        <p>Hình ảnh sản phẩm</p>
                                        <input type="text" id="image_upload" name="image_upload" value="' . ($row["image"]) . '" style="display:none;">
                                        <input type="file" id="image" style="margin-top=10px" name="image" accept="image/* >
                                   
                                </div>
                                 
                                <div class="content_list ">
                                    <p>Thêm ảnh từ url</p>
                                    <input type="text" placeholder="Nhập url" class="input_url" />
                                </div>

                                <div class="content_list">
                                    <p>Giá sản phẩm</p>
                                    <input type="text" placeholder="0" name="price"  value="' . ($row["price"]) . '"/>
                                </div>

                                <div class="content_list">
                                    <p >Số lượng</p>

                                    
                                            <input type="text" placeholder="0" name="quantity" id="quantity" value="' . ($row["quantity"]) . '" />
                                     
                                </div>

                                <div class="wrap_btn-save">
                                    <input class="btn_save-data" type="submit" value="Sửa" />

                                    <button class="btn_save-data cancel_data ">
                                        <a href="http://localhost/web_bh/delete.php?id=' . ($row["id"]) . '">Xoá</a>
                                    </button>
                                </div>
                    </form>
                    ';
            }
        }
        ?>


    </div>
</body>

</html>