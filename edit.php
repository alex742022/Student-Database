<?php

include_once("connections/connection.php");

$con = connection();

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['access']) && $_SESSION['access'] === 'admin'){

    $id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE Id ='$id'";
    $student = $con->query($sql) or die ($con->error);
    $row = $student->fetch_assoc();

    if(isset($_POST['save'])){
        $lname = $_POST['lastname'];
        $fname = $_POST['firstname'];
        $middle = $_POST['middle'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $date = $_POST['date'];

        $sql = "UPDATE student_list SET LastName ='$lname', FirstName ='$fname', Middle='$middle', Age='$age', Gender='$gender', Date ='$date' WHERE  Id = '$id'";
        $student = $con->query($sql) or die ($con->error);

        echo header('Location: details.php?ID='.$id);
    }

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
        <h1 class="fdetails">Full Details</h1>
        <form action="" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="edit" type="text" name="lastname" value="<?php echo $row['LastName'];?>"></td>
                        <td><input class="edit" type="text" name="firstname" value="<?php echo $row['FirstName'];?>"></td>
                        <td><input class="edit" type="text" name="middle" value="<?php echo $row['Middle']; ?>"></td>
                        <td><input class="edit" type="text" name="age" value="<?php echo $row['Age']; ?>"></td>
                        <td><input class="edit" type="text" name="gender" value="<?php echo $row['Gender']; ?>"></td>
                        <td><input class="edit" type="text" name="date" value="<?php echo $row['Date']; ?>"></td>
                    </tr>  
                </tbody>
            </table>

            <div class="flex_container">
                <div class="detail_flex">
                </div>
                <div class="detail_flex">
                    <input class="edits sbd" type="submit" name="save" value ="Save">
                    <a class="edits sbd" href="details.php?ID=<?php echo $row['Id'];?>">Back</a>
                </div>
            </div>
        </form>
    </body>
    </html>
    <?php
}else{

    echo header('Location: index.php');
}
