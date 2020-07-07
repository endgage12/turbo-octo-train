<?php
    //Ошибка после удаления записи из БД файл берет неправильный индекс
    $countWindow = 1;
    //Взять последний id из таблицы
    require ("connect_db.php");
    if($res_title = $db->query("SELECT id FROM windows ORDER BY id DESC LIMIT 1")) {
        $row_countWindow = $res_title->fetch_row();
        $countWindow = $row_countWindow[0] + 1;
        $res_title->close();
    }
    //Проверка существования основателя окна
    if(isset($_COOKIE['login'])) {
        $holder = $_COOKIE['login'];
    }
    else $holder = 'Unknown';
    //Добавление окна в БД
    if(isset($_POST['title'])) {
        include ("connect_db.php");
        $title = $_POST['title'];
        $content = $_POST['content'];
        $result2 = mysqli_query($db, "INSERT INTO windows (title, content, holder) VALUES('$title', '$content', '$holder')");
    }
    //Создание и заполнение страницы окна
    $templ_dir = '../tmpls/temp_win.php';
    $template_file = fopen($templ_dir, 'r');
    $template = fread($template_file, filesize($templ_dir));
    
    fclose($template_file);

    $add_file = fopen('../tmpls/window' . $countWindow . '.php', 'w');
    fwrite($add_file, $template);
    
    fclose($add_file);

    header('location: ../index.php');
?>