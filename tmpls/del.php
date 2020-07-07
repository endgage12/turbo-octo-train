<DOCTYPE html>
<html>
    <head>
        <?php require "head.php"; ?>
    </head>
    <body>
        <?php require "form_reg.php"; ?>
        <?php
            $filename = $_SERVER['HTTP_REFERER'];
            $frmtnum = preg_replace("/[^0-9]/", '', $filename);
            $pagename = 'window' . $frmtnum . '.php';
            require ("../handlers/connect_db.php");
            if($del_row = $db->query("DELETE FROM windows WHERE id=$frmtnum")) {
                //echo "Строка " . $frmtnum . " удалена";
                if($del = unlink($pagename)) {
                    header("location: http://localhost/workspace/index.php");
                }
            }
            else echo "Строка " . $frmtnum . "не удалена";
        ?>
    </body>
</html>