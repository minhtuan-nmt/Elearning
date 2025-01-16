<?php
session_start();
require_once "config.php"; // Tệp kết nối CSDL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->bindParam(':username', $username_or_email);
    $stmt->bindParam(':email', $username_or_email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Đăng nhập thành công 
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username']; // Lưu username vào session
        $_SESSION['role'] = $user['role'];
         // Kiểm tra vai trò và chuyển hướng
         if ($user['role'] === 'admin') {
            header("Location: admin.php"); // Chuyển đến trang admin
        } else {
            header("Location: index.php"); // Chuyển đến trang user
        }
        exit;
    } else {
        echo "<h2 style='text-align: center; align-item: center; margin-top: 25%;'>Tên đăng nhập hoặc mật khẩu sai. <a href='login.html' style='text-decoration:none; color: red;'>Thử lại</a></h2>";
    }
}
?>