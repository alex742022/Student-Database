<?php

include_once("connections/connection.php");

$con = connection();

$sql = "SELECT * FROM student_list ORDER BY LastName";
$student = $con->query($sql) or die ($con->error);
$row = $student->fetch_assoc();

if(!isset($_SESSION)){
    session_start();
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
</html>