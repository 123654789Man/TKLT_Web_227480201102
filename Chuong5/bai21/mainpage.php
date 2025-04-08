<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['email'])){
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    echo "<h2> trang chinh <br>";
    echo "Nguoi dung dang nhap voi ten username <b> $username </b> và email <b> $email </b>";
}
else{
    header("Location: login.html");
}

?>