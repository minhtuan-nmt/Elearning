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

    <!-- Home Section -->
    <section class="home" id="home">
        <div class="home-text">
            <h6>Học cùng Edumall</h6>
            <h1>Học mọi lúc, mọi nơi, nâng tầm kiến thức!</h1>
            <p>Chinh phục đỉnh cao học vấn, bắt đầu ngay hôm nay!</p>
            <div class="latter">
                <form method="GET" action="search.php">
                    <input type="text" name="query" placeholder="Nhập khoá học muốn tìm?" required>
                    <input type="submit" value="Tìm kiếm">
                </form>
            </div>
        </div>
        <div class="home-img">
            <img src="./img/0000000699-giao-duc-hoc-tap-hoc-sinh-kien-thuc-tai-hinh-png-181.png" alt="Home Image">
        </div>
    </section>

    <!-- Start container section  -->
    <section class="container">
        <div class="container-box">
            <div class="container-img">
                <img src="./img/mlw-about.png" alt="">
            </div>
            <div class="container-text">
                <h4>5K</h4>
                <p>Online Courses</p>
            </div>
        </div>

        <div class="container-box">
            <div class="container-img">
                <img src="./img/mlw-about.png" alt="">
            </div>
            <div class="container-text">
                <h4>5K</h4>
                <p>Online Courses</p>
            </div>
        </div>

        <div class="container-box">
            <div class="container-img">
                <img src="./img/mlw-about.png" alt="">
            </div>
            <div class="container-text">
                <h4>5K</h4>
                <p>Online Courses</p>
            </div>
        </div>

        <div class="container-box">
            <div class="container-img">
                <img src="./img/mlw-about.png" alt="">
            </div>
            <div class="container-text">
                <h4>5K</h4>
                <p>Online Courses</p>   
            </div>
        </div>
     </section>

      <!-- Start categories section  -->
     <section class="categories" id="categories">
        <div class="center-text">
            <h5>DANH MỤC</h5>
            <h2>Các danh mục nổi tiếng</h2>
        </div>

        <div class="categories-content">
            <div class="box">
                <img src="./img/PHP-logo.png" alt="">
                <h3>PHP</h3>
                <p>2 Courses</p>
            </div>

            <div class="box">
                <img src="./img/JavaScript-logo.png" alt="">
                <h3>JavaScript</h3>
                <p>1 Courses</p>
            </div>

            <div class="box">
                <img src="./img/java.png" alt="">
                <h3>Java</h3>
                <p>1 Courses</p>
            </div>
            
            <div class="box">
                <img src="./img/c++logo.png" alt="">
                <h3>C++</h3>
                <p>1 Courses</p>
            </div>

            <div class="box">
                <img src="./img/html.webp" alt="">
                <h3>HTML</h3>
                <p>1 Courses</p>
            </div>

            <div class="box">
                <img src="./img/css.png" alt="">
                <h3>Css</h3>
                <p>1 Courses</p>
            </div>
        </div>
            <div class="main-btn">
                <a href="#" class="btn">All Categories</a>
            </div>
     </section>

    <!-- Courses Section -->
    <section class="courses" id="courses">
        <div class="center-text">
            <h5>KHOÁ HỌC</h5>
            <h2>Khám phá các khóa học phổ biến</h2>
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

     <!-- Start cta section  -->
     <section class="cta">
            <div class="center-text">
                <h5> Truster By</h5>
                <h2>500+ Leading Universities And Companies</h2>
            </div>

            <div class="cta-content">
                <div class="cta-img">
                    <img src="./img/images.png" alt="">
                </div>

                <div class="cta-img">
                    <img src="./img/images.png" alt="">
                </div>

                <div class="cta-img">
                    <img src="./img/images.png" alt="">
                </div>

                <div class="cta-img">
                    <img src="./img/images.png" alt="">
                </div>

                <div class="cta-img">
                    <img src="./img/images.png" alt="">
                </div>

                <div class="cta-img">
                    <img src="./img/images.png" alt="">
                </div>
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
