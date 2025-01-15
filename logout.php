<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php"); // Điều hướng về trang chủ
exit();
?>