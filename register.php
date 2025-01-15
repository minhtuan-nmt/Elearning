<?php
include 'config.php'; // Kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mã hóa mật khẩu
    $email = $_POST['email'];

    // Kiểm tra trùng lặp email hoặc tên đăng nhập
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Tên đăng nhập hoặc email đã tồn tại. <a href='register.html'>Thử lại</a>";
    } else {
        // Thêm người dùng mới
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            echo "<h2 style='text-align: center; align-item: center; margin-top: 25%;'>Đăng ký thành công. <a href='login.html' style='text-decoration:none; color: red;'>Đăng nhập ngay</a></h2>";
        } else {
            echo "Đã xảy ra lỗi. Vui lòng thử lại.";
        }
    }
}
?>