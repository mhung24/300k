<?php
session_start(); // Luôn gọi session_start() đầu tiên
?>

<div class="header_logo">
    <img src="./assets/images/logo.png" alt="" />
</div>

<div class="menu">
    <?php include __DIR__ . '/menu.php'; ?>
</div>

<form class="search" action="search.php?search=">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="text" name="search" id="searchInput" />
</form>

<div class="headerhome_search" id="searchHeader">
    <img src="./assets/images/sp1.jpg" alt="" />
    <p>123123</p>
</div>

<div class="list_icon">
    <?php if (!isset($_SESSION['username'])): ?>
        <div class="list_item" style="display: flex; width: 240px;">
            <a href="">
                <i class="fa-regular fa-user" style="color: #000"></i>
            </a>
            <p style="margin-left: 10px"><a href="login.php">Đăng nhập</a></p>
        </div>
    <?php else: ?>
        <!-- Bọc cả list_item và navbar_account -->
        <div class="account_wrapper" style="position: relative;">
            <div class="list_item" style="display: flex; width: 240px;">
                <a href="">
                    <i class="fa-regular fa-user" style="color: #000"></i>
                </a>
                <p style="margin-left: 10px">Xin chào, <?= $_SESSION['username'] ?></p>
            </div>

            <div class="navbar_account">
                <ul>
                    <li>Thông tin tài khoản</li>
                    <li><a href="logout.php">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</div>