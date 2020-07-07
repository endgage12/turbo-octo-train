<?php
    require ("connect_db.php");
    //Проверка передачи заголовка и контента
    if(isset($_POST['title']) && isset($_POST['content'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
    }
    else exit("Не передан заголовок или контент");
    //Получить id страницы с которой был совершен переход
    $filename = $_SERVER['HTTP_REFERER'];
    $frmtnum = preg_replace("/[^0-9]/", '', $filename);

    //Обновить запись в бд по полученному id
    if($res_upd = $db->query("UPDATE windows SET title = '$title', content = '$content' WHERE id = '$frmtnum'")) {
        header("location: http://localhost/workspace/index.php");
    } else echo 'Ошибка записи.';
?>