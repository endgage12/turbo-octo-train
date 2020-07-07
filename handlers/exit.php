<?php 
    setcookie('login', '', time() - 3600, '/');
    header('location: http://localhost/workspace/');
?>