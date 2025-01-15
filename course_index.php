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

    // Kiểm tra nếu không tìm thấy khóa học
    if (!$courses) {
        die("Khóa học không tồn tại.");
    }
} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title><?php echo htmlspecialchars($courses['name']); ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="course_style.css">
</head>
<body>
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
            <li><a href="course_all.php">Khóa học</a></li>
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
    
    <div class="main-content">
        <div class="main-banner">
            <div class="breadcrumb">
                <a href="#">Lập Trình</a> - 
                <a href="#">CNTT</a> - 
                <a href="#"><?php echo htmlspecialchars($courses['name']); ?></a>
            </div>
            <h1><?php echo htmlspecialchars($courses['name']); ?></h1>
            <p><?php echo htmlspecialchars($courses['description']); ?></p>
            <div class="meta">
                <span><i class="fas fa-user"></i> Tác giả: <?php echo htmlspecialchars($courses['author']); ?></span>
                <span class="star">
                    <i class="fas fa-star"></i>
                    <?php echo htmlspecialchars($courses['rating']); ?> (<?php echo htmlspecialchars($courses['reviews']); ?> Nhận xét)
                </span>
                <span><i class="fas fa-clock"></i> Lần chỉnh sửa cuối: <?php echo htmlspecialchars($courses['last_updated']); ?></span>
            </div>
        </div>
        <div class="course-card">
            <img alt="Course image" src="./img/course/<?php echo htmlspecialchars($courses['img']); ?>" />
            <h2>
                <?php echo $courses['price'] == 0 ? 'Miễn phí' : number_format($courses['price']) . 'đ'; ?>
            </h2>
            <div class="details">
                <span><i class="fas fa-book"></i> <?php echo htmlspecialchars($courses['lessons']); ?> Bài học</span>
                <span><i class="fas fa-clock"></i> <?php echo htmlspecialchars($courses['duration']); ?></span>
                <span><i class="fas fa-download"></i> <?php echo htmlspecialchars($courses['downloads']); ?> tài liệu có thể tải xuống</span>
            </div>
            <div class="choice">
                <a class="cta" href="payment.php">Mua ngay    </a>
                <div class="share">
                    <a href=""><i class="fas fa-share"></i></a>
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="course-content">
        <h2>Bạn sẽ học được những gì</h2>
        <ul>
            <?php
            if (!empty($courses['benefits'])) {
                $benefits = explode('|', $courses['benefits']);
                foreach ($benefits as $benefit): ?>
                    <li><i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($benefit); ?></li>
                <?php endforeach;
            } else {
                echo "<li>Chưa có thông tin lợi ích.</li>";
            }
            ?>
        </ul>

        <div class="content-list">
            <h2>Nội dung</h2>
            <div class="chapter1">
                <h3>
                    <?php echo htmlspecialchars($courses['chapters']); ?> Chương - 
                    <?php echo htmlspecialchars($courses['lessons']); ?> Bài học - 
                    <?php echo htmlspecialchars($courses['duration']); ?>
                </h3>
                <a href="#" style="color: #f66962;">Mở rộng tất cả</a>
            </div>

            <div class="linkhoc">
                <p>Để học, hãy ấn vào chữ "Link học" bên dưới</p>
                <a href="<?php echo htmlspecialchars($courses['linkhoc'])?>">Link học</a>
            </div>
        </div>
    </div>

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
