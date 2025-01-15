<?php
// Kết nối cơ sở dữ liệu
include('config.php');

// Lấy từ khóa từ URL (query string)
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if (empty($query)) {
    die("Vui lòng nhập từ khóa tìm kiếm.");
}

try {
    // Truy vấn cơ sở dữ liệu tìm theo tên khóa học
    $sql = "SELECT * FROM courses WHERE name LIKE :query";
    $stmt = $conn->prepare($sql);
    $searchQuery = '%' . $query . '%'; // Thêm ký tự đại diện cho tìm kiếm
    $stmt->bindParam(':query', $searchQuery, PDO::PARAM_STR);
    $stmt->execute();

    // Lấy kết quả
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Nếu không có kết quả
    if (empty($results)) {
        echo "Không tìm thấy khóa học nào với từ khóa: " . htmlspecialchars($query);
        exit;
    }
} catch (PDOException $e) {
    die("Lỗi truy vấn: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="course_style.css">
</head>
<body>
    <header>
        <h1>Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($query); ?>"</h1>
    </header>
    <div class="courses-content">
            <?php foreach ($results as $course): ?>
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
                            <div class="star">
                                <?php for ($i = 0; $i < $course['rating']; $i++): ?>
                                    <i class='bx bxs-star'></i>
                                <?php endfor; ?>
                            </div>
                            <div class="review">
                                <p><?php echo htmlspecialchars($course['reviews']); ?> Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</body>
</html>
