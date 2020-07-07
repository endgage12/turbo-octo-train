<?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    include ("connect_db.php");
 
    $result = mysqli_query($db, "SELECT * FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($myrow['password']==$password) {
        setcookie('login', $myrow['login'], time() + (3600 * 24), '/');
        header('location: ../index.php');
    }
?>