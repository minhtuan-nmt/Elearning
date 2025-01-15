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

    // Lấy tất cả khóa học
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website ELearning</title>
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
            <li><a href="#">Khoá học</a></li>
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

    <!-- Courses Section -->
    <section class="courses" id="courses">
        <div class="center-text1">
            <h2>Tất cả các khoá học</h2>
        </div>
        <div class="courses-content">
            <?php foreach ($courses as $course): ?>
                <div class="row">
                    <a href="course_index.php?id=<?php echo $course['id']; ?>">
                        <img src="./img/course/<?php echo htmlspecialchars($course['img']); ?>" alt="Course Image">
                    </a>
                    <div class="courses-text">
                        <a href="course_index.php?id=<?php echo $course['id']; ?>">
                            <h3><?php echo htmlspecialchars($course['name']); ?></h3>
                        </a>
                        <h5><?php echo number_format($course['price']); ?>đ</h5>
                        <h6>Thời lượng: <?php echo htmlspecialchars($course['duration']); ?></h6>
                        <div class="rating">
                        <span class="star">
                            <i class="bx bxs-star"></i>
                            <?php echo htmlspecialchars($course['rating']); ?> (<?php echo htmlspecialchars($course['reviews']); ?> Nhận xét)
                        </span>
                            <div class="review">
                                <p><?php echo htmlspecialchars($course['reviews']); ?> Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>    
    </section>

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