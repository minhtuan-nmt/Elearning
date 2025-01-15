<?php
session_start();   
// Kết nối cơ sở dữ liệu
include('config.php'); 

//Truy vấn danh sách tài khoản từ bảng courses
try {
    $sql = "SELECT id, name, img, price FROM courses";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    //Lấy kết quả truy vấn
    $courses = $stmt->fetchALL(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Lỗi truy vấn: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_style.css">
    <style>
        .content h2{
            text-align: center;
            padding-bottom: 50px;
            text-transform: Uppercase;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        td a{
            text-decoration: none;
            color: black;
        }


        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="admin.php">Trang chủ</a>
        <a href="#">Dashboard</a>
        <a href="account_management.php">Users</a>
        <a href="#">Courses</a>
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
            <h2>Manage Users</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price(đ)</th>
                    <th>Actions</th>
                </tr>
                <?php
                // Hiển thị dữ liệu tài khoản người dùng
                if (!empty($courses)) {
                    foreach ($courses as $course) {
                        echo "<tr>
                                <td>" . htmlspecialchars($course['id']) . "</td>
                                <td>" . htmlspecialchars($course['name']) . "</td>
                                <td><img src='img/course/" . htmlspecialchars($course['img']) . "' alt='Course Image' style='width:100px; height:auto;'></td>
                                <td>" . htmlspecialchars($course['price']) . "</td>
                            
                                <td>
                                    <button><a href='edit_user.php?id=" . $course['id'] . "'>Edit</a></button> | 
                                    <button><a href='delete_user.php?id=" . $course['id'] . "'>Delete</a></button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No course found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Đóng kết nối PDO
$conn = null;
?>