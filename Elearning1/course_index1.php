<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Edumall - Lập trình game 2D bằng Unity
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="course_style.css">
</head>

<body>
    <!-- start header -->
    <header>
        <a href="#" class="logo">
            <img src="./img/pasted image 0.png" alt="">
        </a>

        <div class="latter">
            <form>
                <input type="email" placeholder="Nhập khoá học muốn tìm" required>
                <input type="submit" value="Tìm kiếm" required>
            </form>
        </div>

        <ul class="navbar">
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="#">Danh mục</a></li>
            <li><a href="#">Khoá học</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

        <div class="auth">
            <?php
            session_start();
            if (isset($_SESSION['user_id'])): ?>
                <!-- Nếu người dùng đã đăng nhập -->
                <span>Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="logout.php"><button class="btn logout-btn">Đăng xuất</button></a>
            <?php else: ?>
                <!-- Nếu người dùng chưa đăng nhập -->
                <a href="login.html"><button class="btn login-btn">Đăng nhập</button></a>
                <a href="register.html"><button class="btn signup-btn">Đăng ký</button></a>
            <?php endif; ?>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <!-- Phần thân -->
    <div class="main-content">
        <div class="main-banner">
            <div class="breadcrumb">
                <a href="#">Lập Trình</a>
                -
                <a href="#">CNTT</a>
                -
                <a href="#">Lập trình game 2D bằng Unity (2020)</a>
            </div>
            <h1>Lập trình game 2D bằng Unity (2020)</h1>
            <p>Qua khóa học này bạn sẽ có được kiến thức nền tảng để tự mình phát triển 2D game bằng Unity. Bạn sẽ nhận được sự hướng dẫn giải đáp chi tiết về môi trường làm việc trong Unity, hệ thống API, các công cụ, các điều quan trọng, cần biết và cần chú ý khi phát triển game bằng Unity. Bạn sẽ học được cách thiết kể, tổ chức hệ thống linh hoạt có khả năng tái sử dụng cao. Khóa học này sẽ áp dụng một số công nghệ mới của Unity 2019. Sau khóa học này bạn sẽ có đủ kiến thức và tự tin để tự làm một game 2D theo ý thích. Khóa học này KHÔNG bao gồm các chủ đề: - Lập trình Editor, Plugin - Lập trình server, game online - ECS, DOTs</p>
            <div class="meta">
                <span>
                    <i class="fas fa-user"></i>
                    Tác giả Bear NB
                </span>
                <span class="star">
                    <i class="fas fa-star"></i>
                    5 (0 Nhận xét)
                </span>
                <span>
                    <i class="fas fa-clock"></i>
                    Lần chỉnh sửa cuối 16 tháng 2 năm 2022
                </span>
            </div>
        </div>
        <div class="course-card">
            <img alt="Unity course image" src="./img/course/php.jpg" />
            <h2>Miễn phí</h2>
            <div class="details">
                <span>
                    <i class="fas fa-book">
                    </i>
                    49 Bài học
                </span>
                <span>
                    <i class="fas fa-clock">
                    </i>
                    8 giờ 47 phút
                </span>
                <span>
                    <i class="fas fa-download">
                    </i>
                    0 tài liệu có thể tải xuống
                </span>
            </div>
            <div class="choice">
            <a class="cta" href="#">
                Học ngay
            </a>
            <div class="share">
                <i class="fas fa-share"></i>
                <i class="fas fa-shopping-cart"></i>
            </div>  
            </div>
            
        </div>
    </div>

    <div class="course-content">
        <h2>
            Bạn sẽ học được những gì
        </h2>
        <ul>
            <li>
                <i class="fas fa-check-circle">
                </i>
                Bạn sẽ nhận được sự hướng dẫn từ giảng viên với nhiều năm kinh nghiệm trong lĩnh vực phát triển game bằng Unity.
            </li>
            <li>
                <i class="fas fa-check-circle">
                </i>
                Có được kiến thức nền tảng để phát triển game 2D bằng Unity.
            </li>
            <li>
                <i class="fas fa-check-circle">
                </i>
                Nắm được cách tổ chức, thiết kế hệ thống linh hoạt dễ tái sử dụng.
            </li>
            <li>
                <i class="fas fa-check-circle">
                </i>
                Được học và sử dụng các công nghệ mới của Unity 2019 giúp tăng tốc phát triển game.
            </li>
            <li>
                <i class="fas fa-check-circle">
                </i>
                Kết thúc khóa học này bạn sẽ có đủ kiến thức và tự tin để làm hoàn chỉnh một game 2D theo ý thích.
            </li>
        </ul>

        <div class="content-list">
            <h2>
                Nội dung
            </h2>
            <div class="chapter1">
                <h3>
                    4 Chương - 49 Bài học - 8 giờ 47 phút
                </h3>
                <a href="#" style="color: #f66962;">
                    Mở rộng tất cả
                </a>
            </div>
            <div class="chapter">
                <h4>
                    Giới thiệu
                </h4>
                <p>
                    3 Bài học - 14 phút 21 giây
                </p>
            </div>
            <div class="chapter">
                <h4>
                    Cơ bản về UI Canvas qua game Ai là triệu phú
                </h4>
                <p>
                    7 Bài học - 63 phút 05 giây
                </p>
            </div>
            <div class="chapter">
                <h4>
                    Game Galaxy Shooter
                </h4>
                <p>
                    19 Bài học - 2 giờ 43 phút 32 giây
                </p>
            </div>
            <div class="chapter">
                <h4>
                    Game Platformer
                </h4>
                <p>
                    20 Bài học - 2 giờ 46 phút 49 giây
                </p>
            </div>
        </div>
    </div>


    <!-- Link js -->
    <script src="../script.js"></script>
</body>

</html>