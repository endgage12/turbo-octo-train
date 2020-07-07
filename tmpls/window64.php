<DOCTYPE html>
<html>
    <head>
        <?php require "head.php"; ?>
    </head>
    <body>
        <?php require "header.php" ?>
        <?php require "form_reg.php"; ?>
        <?php
            $filename = $_SERVER['PHP_SELF'];
            $frmtnum = preg_replace("/[^0-9]/", '', $filename);
            //$pagename = 'window' . $frmtname . '.php';
            require ("../handlers/connect_db.php");
            if($res_title = $db->query("SELECT title FROM windows WHERE id=$frmtnum")) {
                $res_content = $db->query("SELECT content FROM windows WHERE id=$frmtnum");
                $row_title = $res_title->fetch_row();
                $row_content = $res_content->fetch_row();
                echo "<form action='http://localhost/workspace/handlers/edit.php' method='post'>";
                echo "<input type='text' name='title' value='$row_title[0]' required='required'/>" . 
                        "<textarea name='content' cols='40' rows='3' required='required'/>" . $row_content[0] . "</textarea>";
                echo "<input type='submit' value='Редактировать'/>
                        </form>
                ";
                echo "
                <form action='del.php'>
                    <input type='submit' value='Удалить'/>
                </form>
                ";
            }
        ?>
    </body>
</html>