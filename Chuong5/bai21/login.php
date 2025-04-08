<?php
    session_start();
    // <h1>Trang xử lý thông tin đăng nhập</h1>
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    echo "<h1>TRANG XỬ LÝ THÔNG TIN ĐĂNG NHẬP";
    echo "<hr>";

    if ($username === "linh123456" && $email === "linh123@gmail.com" && $password === "8426759130") {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        echo "Thông tin đăng nhập hợp lệ<br>";
        echo '<a href="mainpage.php">Trang chính</a>';
    } else {
        echo "Thông tin đăng nhập không hơp lệ<br>";
        echo '<a href="login.html">Quay lại trang đăng nhập<a/>';
    }

?>