<?php
    declare(strict_types = 1);
    class Window {
        public string $title;
        public string $content;

        public function __construct(string $title, string $content) {
            $this->title = $title;
            $this->content = $content;
        }

        public function FormAdd() {
            //Форма добавления окон
            echo "
            <hr>
            <form id='form' action='handlers/send.php' method='post'>
                <label>Тема</label>
                <input type='text' name='title' required='required'/>
                <br>
                <label>Содержимое</label>
                <textarea name='content' cols='40' rows='3' required='required'/> </textarea>
                <input type='submit' value='Отправить'/>
            </form>
            ";
        }

        public function show_orderBy_id() {
            require ("E:/xamp/htdocs/workspace/handlers/connect_db.php");
            //Загрузка окон из базы данных по порядку ID
            if($res_title = $db->query("SELECT title FROM windows")) {
                if($res_content = $db->query("SELECT content FROM windows")) {
                    if($res_holder = $db->query("SELECT holder FROM windows")) {
                        if($res_id = $db->query("SELECT id FROM windows")) {
                            while($row_title = $res_title->fetch_row()) {
                                $row_content = $res_content->fetch_row();
                                $row_holder = $res_holder->fetch_row();
                                $row_id = $res_id->fetch_row();
                
                                $name_window = 'tmpls/window' . $row_id[0] . '.php';
                                echo "<a href=$name_window><b>Название:</b>" . $row_title[0] . "</a><br>";
                                echo "<b>Содержание:</b> " . $row_content[0] . "<br>";
                                echo "<b>Основатель:</b> " . $row_holder[0] . "<br><br>";
                            }
                        }
                    }
                    $res_title->close();
                    $res_content->close();
                    $res_id->close();
                }   
            }
        }

        public function show_orderBy_title() {
            require ("E:/xamp/htdocs/workspace/handlers/connect_db.php");
            //Загрузка окон по порядку названий
            if($res_title = $db->query("SELECT id, title, content, holder FROM windows ORDER BY title")) {
                echo "<hr><br>";
                for($i = 0; $i < $res_title->num_rows; $i++) {
                    $row = $res_title->fetch_array();
                    echo "<b>ID: </b>" . $row[0]. " <b>Title: </b>" . $row[1] . " <b>Content: </b>" . $row[2] . " <b>Holder: </b>" . $row[3];
                    echo "<br>";
                }
            }
        }
    }
    
    Window::show_orderBy_id();
    Window::FormAdd();
?>