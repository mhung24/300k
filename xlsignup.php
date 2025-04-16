<?php

include __DIR__ . '/connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$full_name = $_POST['full_name'];
$address = $_POST['address'];
$password = $_POST['password'];
$role = 1;

// Kiểm tra xem username đã tồn tại hay chưa
$query_check_username = "SELECT * FROM user WHERE username = '$username'";
$result_check_username = mysqli_query($conn, $query_check_username);

// Kiểm tra xem email đã tồn tại hay chưa
$query_check_email = "SELECT * FROM user WHERE email = '$email'";
$result_check_email = mysqli_query($conn, $query_check_email);

if (mysqli_num_rows($result_check_username) > 0) {
    // Nếu username đã tồn tại, hiển thị cảnh báo và dừng thực hiện
    echo "<script>alert('Tên người dùng đã tồn tại. Vui lòng chọn tên khác!');</script>";
    echo "<script>window.history.back();</script>"; // Quay lại trang trước
} elseif (mysqli_num_rows($result_check_email) > 0) {
    // Nếu email đã tồn tại, hiển thị cảnh báo và dừng thực hiện
    echo "<script>alert('Email đã được sử dụng. Vui lòng sử dụng email khác!');</script>";
    echo "<script>window.history.back();</script>"; // Quay lại trang trước
} else {
    // Nếu cả username và email đều chưa tồn tại, thực hiện việc thêm người dùng mới
    $query = "INSERT INTO user (username, password, email, full_name, phone, address, role) 
              VALUES ('$username', '$password', '$email', '$full_name', '$phone', '$address', $role)";
    $result = mysqli_query($conn, $query);

    // Kiểm tra kết quả và thông báo khi đăng ký thành công
    if ($result) {
        // Thông báo đăng ký thành công và chuyển trang sau 3 giây
        echo "<script>alert('Đăng ký thành công!');</script>";
        echo "<script>setTimeout(function() { window.location.href = 'trangchu.php'; }, 1000);</script>"; // Chuyển trang sau 3 giây
    } else {
        echo "Đã xảy ra lỗi khi đăng ký. Vui lòng thử lại!";
    }
}

?>