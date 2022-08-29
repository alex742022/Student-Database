<?php

function connection(){
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "students";
    $con = new mysqli($host, $user, $password, $database);

    if($con->connect_error){

        echo $con->connect_error;

    }else{

        return $con;
    }
}

