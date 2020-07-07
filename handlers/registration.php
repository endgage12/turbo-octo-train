<?php 
    if (isset($_POST['login'])) {
        $login = $_POST['login']; 
        if($login == '') {unset($login);} 
    }

    if (isset($_POST['password'])) {
        $password=$_POST['password']; 
        if($password == '') {unset($password);} 
    }

    if(empty($login) or empty($password)) {
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $login = trim($login);
    $password = trim($password);

    include ("connect_db.php");

    $result = mysqli_query($db, "SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if(!empty($myrow['id'])) {
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }

    $result2 = mysqli_query($db, "INSERT INTO users (login, password) VALUES('$login','$password')");
    if ($result2 == 'TRUE') {
        setcookie('login', $login);
        echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='../index.php'>Главная страница</a>";
    }

    else {
        echo "Ошибка! Вы не зарегистрированы.";
    }
?>