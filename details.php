<?php

include_once("connections/connection.php");
$con = connection();

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['access']) && $_SESSION['access'] == "admin"){

    
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
            <!-- sadsadsa -->
            <div class="detail_flex">
                <button class="delete">Delete</button>
                <div class='container1'>

                    <div class='picture'><img src='image/warning.webp'></div>
                    <h1 id='alert'>WARNING</h1>
                    <p>Do you want to delete?</p>

                    <form id="formAction"action="delete.php" method="post">
                        <input type="hidden" name="ID" value="<?php echo $row['Id'];?>">
                        <button class ="yesdelete sbd" type="submit" name="delete">Yes</button>
                        <a class ="notdelete" href="details.php?ID=<?php echo $row['Id'];?>">No</a>
                    </form>
                </div>
            </div>
            <div class="detail_flex">
                <a class="edits"href="edit.php?ID=<?php echo $row['Id'];?>">Edit</a>
                <a class="back"href="index.php">Back</a>
            </div>
        </div>
    </body>
    </html>

    <style>

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
            visibility: visible;
            transition: transform 0.4s, top 0.4s;
            background-color: lightgray;
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
            color: black;
        }
        .container1 p {
            margin-bottom: 50px;
        }

    </style>
    <?php
} else{
        echo header('Location: index.php');
    } ?>