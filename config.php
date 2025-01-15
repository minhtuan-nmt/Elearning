<?php   
$host = 'localhost';//Địa chỉ IP Máy chủ MySQL
$dbname = 'user_management';//Tên CSDL
$username = 'root';//Tên đăng nhập
$password = '';//Mật khẩu

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    echo("Kết nối thất bại: ". $e->getMessage());
}
?>