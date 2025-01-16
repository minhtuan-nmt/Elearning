<?php
// Kết nối cơ sở dữ liệu
include('config.php');

// Bắt đầu session
session_start();

// Truy vấn danh sách khóa học từ bảng courses
try {
    $sql = "SELECT * FROM courses";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <a href="#" class="logo">
            <img src="./img/pasted image 0.png" alt="Logo">
        </a>
        <ul class="navbar">
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="#">Danh mục</a></li>
            <li><a href="./course_all.php">Khoá học</a></li>
            <li><a href="cart.php">Giỏ hàng</a></li>
        </ul>
        <div class="auth">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="logout.php"><button class="btn logout-btn">Đăng xuất</button></a>
            <?php else: ?>
                <a href="login.html"><button class="btn login-btn">Đăng nhập</button></a>
                <a href="register.html"><button class="btn signup-btn">Đăng ký</button></a>
            <?php endif; ?>
        </div>
    </header>
    
    <!-- Cart -->

    <div class="cart-status">
        <img src="./img/cart.png" alt="">
        <h1>Giỏ hàng</h1>
        <p>Giỏ hàng trống. <a href="index.php">Click để mua khóa học.</a></p>
    </div>

 <!-- Footer -->
 <footer>
        <div class="footer-container">
            <div class="footer-info">
                <h3>Liên Hệ</h3>
                <p>Địa chỉ: Trường Cao đẳng Bách khoa Hà Nội</p>
                <p>Điện thoại: 0123456789</p>
                <p>Email: monster82638@gmail.com</p>
            </div>
            <div class="footer-links">
                <h3>Liên Kết Nhanh</h3>
                <ul>
                    <li><a href="#">Chính sách bảo mật</a></li>
                    <li><a href="#">Điều khoản sử dụng</a></li>
                    <li><a href="#">Hỗ trợ</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h3>Theo Dõi Chúng Tôi</h3>
                <a href="https://www.facebook.com"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="https://www.youtube.com/"><i class="fab fa-twitter"></i>Youtube</a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Edumall. Bảo lưu mọi quyền.</p>
        </div>
    </footer>

    <!-- Link js -->
    <script src="./script.js"></script>
</body>
</html>