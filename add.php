<?php

include_once("connections/connection.php");

$con = connection();


if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['access']) && $_SESSION['access'] === 'admin'){


    if(isset($_POST["submit"])){

        
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $middle = $_POST['middle'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO student_list(FirstName,LastName,Middle,Age,Gender)VALUES('$fname','$lname','$middle','$age','$gender')";
        
        $con->query($sql) or die ($con->error);
        
        echo "<h1>Student Added</h1>";  
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Students</title>
        <link href="css/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    </head>
    <body">
        <h1 class="sform">Student Form</h1>
        <form action="" method="post">
            <div class="flex">
            <label>First Name</label>
            <input class="firstName" type="text" name="firstname" id="firstName" required>
            <label>Last Name</label>
            <input class="lastName"type="text" name="lastname" id="lastName" required>
            <label>Middle</label>
            <input class="middle" type="text" name="middle" id="middle" required>
            <label>Gender</label>
            <input class="gender" type="text" name="gender" id="gender" required>
            <label>Age</label>
            <input class="age" type="number" min="10" max="60" name="age" id="age" required> 
            <input class="submit" type ="submit" id="submit" value="Submit" name="submit">
            <a class="bindex" href="index.php" onclick= "backAdd()">Back</a>
            </div>
        </form>
    </body>
    <script src="back.js"></script>
    </html>
<?php 
}
else{ 

    echo header('Location: login.php');
    } ?>