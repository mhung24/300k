<?php
session_start();
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Modified query to retrieve full_name, phone_number, and address
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Gán session là full_name
    $_SESSION['username'] = $user['full_name'];

    // Phân quyền và lưu thông tin vào localStorage
    if ($user['role'] == 0) {
        // Admin: Redirect and set localStorage with full name, phone, address, and role
        echo "<script>
                localStorage.setItem('username', '" . $user['full_name'] . "');
                localStorage.setItem('phone_number', '" . $user['phone'] . "');
                localStorage.setItem('address', '" . $user['address'] . "');
                localStorage.setItem('role', '" . $user['role'] . "');
                window.location.href = 'admin.php';
              </script>";
    } else {
        // User: Redirect and set localStorage with full name, phone, address, and role
        echo "<script>
                localStorage.setItem('username', '" . $user['full_name'] . "');
                localStorage.setItem('phone_number', '" . $user['phone'] . "');
                localStorage.setItem('address', '" . $user['address'] . "');
                localStorage.setItem('role', '" . $user['role'] . "');
                window.location.href = 'trangchu.php';
              </script>";
    }
    exit();
} else {
    echo "Sai tên đăng nhập hoặc mật khẩu!";
}
?>