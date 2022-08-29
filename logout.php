<?php
if(!isset($_SESSION)){
    session_start();
}

unset($_SESSION['userLogin']);
unset($_SESSION['password']);
unset($_SESSION['access']);

echo header ("Location: index.php");