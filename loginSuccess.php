<?php

include_once("connections/connection.php");

$con = connection();

$sql = "SELECT * FROM student_list ORDER BY LastName";
$student = $con->query($sql) or die ($con->error);
$row = $student->fetch_assoc();


if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['access']) && $_SESSION['access'] === 'admin'){

    echo "
    
    <div class='container'>
    </div>
    <div class='container1'>
    <div class='picture'><img src='image/check.webp'></div>
    <h1 id='alert'>WELCOME ADMIN</h1>
    <p>Logged in successfully.</p>
    <a href='index.php' id='btn' onclick='containerClose()'>Ok</a>
    </div>

    <style>
        

        .container{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            position: fixed;
            top: 0;
            background-color: black;
            opacity: 70%;
        }
        .container1{
            width: 350px;
            height: 300px;
            background: white;
            text-align: center;
            position: fixed;
            top: 50%;
            left: 50%;
            border-radius: 10px;
            transform: translate(-50%, -50%) scale(1);
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }
        .open-container1{
            visibility: visible;
        }
        .picture{
            postion: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }
        .picture img{
            width: 100px;
            position: absolute;
            top: -25px;
        }
        h1{
            margin: 90px auto 10px;
            font-size: 24px;
            color: green;
        }
        .container1 p {
            margin-bottom: 50px;
        }
        #btn{
            padding: 10px 60px 10px 60px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
    
    <script>
    
        const popup1 = document.querySelector('.container1');
        popup1.classList.add('open-container1');

        const popup = document.querySelector('.container');

        function containerClose(){
            popup1.style.visibility ='hidden';
            popup.style.visibility ='hidden';
        }
        
    </script>";
        
}else{

    echo "
    
    <div class='container'>
    </div>
    <div class='container1'>
    <div class='picture'><img src='image/check.webp'></div>
    <h1 id='alert'>WELCOME STUDENT</h1>
    <p>Logged in successfully.</p>
    <a href='index.php' id='btn' onclick='containerClose()'>Ok</a>
    </div>

    <style>
        

        .container{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            position: fixed;
            top: 0;
            background-color: black;
            opacity: 70%;
        }
        .container1{
            width: 350px;
            height: 300px;
            background: white;
            text-align: center;
            position: fixed;
            top: 50%;
            left: 50%;
            border-radius: 10px;
            transform: translate(-50%, -50%) scale(1);
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }
        .open-container1{
            visibility: visible;
        }
        .picture{
            postion: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }
        .picture img{
            width: 100px;
            position: absolute;
            top: -25px;
        }
        h1{
            margin: 90px auto 10px;
            font-size: 24px;
            color: green;
        }
        .container1 p {
            margin-bottom: 50px;
        }
        #btn{
            padding: 10px 60px 10px 60px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
    
    <script>
    
        const popup1 = document.querySelector('.container1');
        popup1.classList.add('open-container1');

        const popup = document.querySelector('.container');

        function containerClose(){
            popup1.style.visibility ='hidden';
            popup.style.visibility ='hidden';
        }
        
    </script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Students List</title>
    
</head>
<body>

    <h1 class="slist">STUDENT LIST</h1>
    <span id="message_success"></span>

    <?php if(isset($_SESSION['access']) && $_SESSION['access'] === 'admin' || isset($_SESSION['access']) && $_SESSION['access'] === 'student' ){ ?>

        <div class="flex_container">

                <!-- nagtagal -->
            <div class="detail_flex searching">

                <!-- search -->
                <input class="search" type="text" name="search" id="search-input">
            </div>

            <div class="detail_flex">
                <?php if(isset($_SESSION['access']) && $_SESSION['access'] === 'admin') { ?>
                <a class="add"href="add.php">Add Students</a>
                <?php } ?>
                <a class="logout"href="logout.php">Logout</a>
            </div>
            
        </div>

    <?php }else{ ?>

        <div class="flex_container">
            <!-- search --> 
            <div class="detail_flex searching">    
                <input class="search" type="text" name="search" id="search-input">
            </div>
            <div class="detail_flex log">    
                <a class="login" href="login.php">Login</a>
            </div>
        </div>
        <?php } ?>

    <table>
        <thead>
            <tr>
                <?php if(isset($_SESSION['access']) && $_SESSION['access'] === 'admin') {?>
                <th>Full Details</th> <?php } ?>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Date</th>
            </tr>
        </thead>
        <?php do{?>
            <tr id="student-list">
                <?php if(isset($_SESSION['access']) && $_SESSION['access'] === 'admin'){ ?>
                <td ><a class="details"href ="details.php?ID=<?php echo $row['Id'];?>"> View</a></td> <?php } ?> 
                <td ><?php echo $row["LastName"]; ?></td>
                <td ><?php echo $row["FirstName"]; ?></td>
                <td ><?php echo $row["Middle"]; ?></td>
                <td ><?php echo $row["Age"]; ?></td>
                <td ><?php echo $row["Gender"]; ?></td>
                <td ><?php echo $row["Date"]; ?></td>
            </tr>
            <?php }while($row = $student->fetch_assoc()) ?>
        <tbody>

        </tbody>
    </table>

</body>
<script src="JavaScript/live_search.js"></script>