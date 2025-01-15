<?php
session_start();

// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Kiểm tra vai trò (chỉ admin mới được truy cập)
if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php"); // Chuyển hướng về trang chủ nếu không phải admin
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
    <div class="sidebar">
        
        <h2>Admin Panel</h2>
        <a href="admin.php">Trang chủ</a>
        <a href="./index.php">Dashboard</a>
        <a href="account_management.php">Users</a>
        <a href="course_management.php">Orders</a>
        <a href="#">Products</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Welcome to Admin Dashboard</h1>
        </div>
        <div class="content">
            <h2>Dashboard Overview</h2>
            <p>This is where you can view and manage your website's data.</p>
        </div>
    </div>
</body>
</html>