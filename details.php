<?php

include_once("connections/connection.php");
$con = connection();

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['access']) && $_SESSION['access'] == "admin"){

    if($_SESSION['access'] == "admin"){

        echo "Welcome Admin";
    }else{

        echo "Welcome Student";
    }
    $id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE  Id = '$id'";
    $student = $con->query($sql) or die ($con->error);
    $row = $student->fetch_assoc();

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Details</title>
        <link href="css/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <!-- Full Details Button -->

        <h1 class="fdetails">Full Details</h1>
        
        <!-- form for deleted query -->

        <table>
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $row['LastName']; ?></td>
                    <td><?php echo $row['FirstName']; ?></td>
                    <td><?php echo $row['Middle']; ?></td>
                    <td><?php echo $row["Gender"]; ?></td>
                    <td><?php echo $row['Age']; ?></td>
                    <td><?php echo $row['Date']; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="flex_container">
        
            <form action="delete.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $row['Id'];?>">
                <button class ="edits sbd" type="submit" name="delete">Delete</button>
            </form>
            <div class="detail_flex">
                <a class="edits"href="edit.php?ID=<?php echo $row['Id'];?>">Edit</a>
                <a class="edits"href="index.php">Back</a>
            </div>
        </div>
    </body>
    </html>
    <?php
} else{
        echo header('Location: index.php');
    } ?>