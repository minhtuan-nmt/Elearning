<?php
// Kết nối cơ sở dữ liệu
include('config.php');

// Truy vấn danh sách khóa học từ bảng courses
// Lấy ID sản phẩm từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;


try {   
   // Truy vấn khóa học theo ID
   $sql = "SELECT * FROM courses WHERE id = :id";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
   $stmt->execute();

    // Lấy kết quả truy vấn (chỉ một bản ghi)
    $courses = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Thanh toán</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="course_style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <a href="#" class="logo">
            <img src="./img/pasted image 0.png" alt="Logo">
        </a>
        <div class="latter">
            <form method="GET" action="search.php">
                <input type="text" name="query" placeholder="Nhập khoá học muốn tìm?" required>
                <input type="submit" value="Tìm kiếm">
            </form>
        </div>
        <ul class="navbar">
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="#">Danh mục</a></li>
            <li><a href="./course_all.php">Khóa học</a></li>
            <li><a href="cart.php">Giỏ hàng</a></li>
        </ul>
        <div class="auth">
            <?php
            session_start();
            if (isset($_SESSION['user_id'])): ?>
                <span>Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="logout.php"><button class="btn logout-btn">Đăng xuất</button></a>
            <?php else: ?>
                <a href="login.html"><button class="btn login-btn">Đăng nhập</button></a>
                <a href="register.html"><button class="btn signup-btn">Đăng ký</button></a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Payment -->
    <div class="payment">

        <img src="./img/pay.jpg" alt="">
        <h1>Để kích hoạt khoá học, hãy chuyển tiền vào đây</h1>
        <h2>Sau khi chuyển xong, hãy <a href="javascript:history.back()">ẤN VÀO ĐÂY</a> và kéo xuống phía dưới ấn vào chữ"Link học"</h2>
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
