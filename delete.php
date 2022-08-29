<?php

include_once("connections/connection.php");

$con = connection();

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['access']) && $_SESSION['access'] === 'admin'){


    if(isset($_POST['delete'])){

        echo header('Location: index.php');

        $id = $_POST['ID'];

        $sql = "DELETE FROM student_list WHERE Id = '$id'";
        $con->query($sql) or die ($con->error);
    }
}else{
    echo header('Location: index.php');
}