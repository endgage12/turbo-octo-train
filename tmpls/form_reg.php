<?php
            if(empty($_COOKIE['login'])) {
                echo "
                <form action='handlers/registration.php' method='post' id='formReg'>
                <p>
                    <label>Ваш логин:<br></label>
                    <input name='login' type='text' size='15' maxlength='15' required='required'>
                </p>
                <p>
                    <label>Ваш пароль:<br></label>
                    <input name='password' type='password' size='15' maxlength='15' required='required'>
                </p>
                <p>
                    <input type='submit' name='submit' value='Зарегистрироваться'>
                </p>
                </form>

                <form action='handlers/log_in.php' method='post' id='formLogin'>
                <p>
                    <label>Ваш логин:<br></label>
                    <input name='login' type='text' size='15' maxlength='15' required='required'>
                </p>

                <p>
                    <label>Ваш пароль:<br></label>
                    <input name='password' type='password' size='15' maxlength='15' required='required'>
                </p>
            
                <p> <input type='submit' name='submit' value='Войти'> </p>
                </form>

                ";
                exit("Вы вошли на сайт, как гость <br>");
            }
            else {
                echo "Вы вошли на сайт, как ".$_COOKIE['login']." <br>";
                echo "
                <form id='form' action='handlers/exit.php' method='post'>
                    <input type='submit' value='Выйти из аккаунта'/>
                </form>
                ";
            }
        ?>