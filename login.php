<?php

include_once("connections/connection.php");

$con = connection();

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['Login'])){

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $access = $_POST['access'];
    
        $sql = "SELECT * FROM user WHERE UserName ='$user' AND Password='$pass' AND Access='$access'";
        $user = $con->query($sql) or die ($con->error);
        $row = $user->fetch_assoc();
        $total =$user->num_rows;

        if($total > 0){

            $_SESSION["userLogin"] =$row["UserName"];
            $_SESSION["password"] = $row["Password"];
            $_SESSION["access"] = $row["Access"];
            echo header("Location: loginSuccess.php");

        }  else{

            $error = "<h3 id='error-message-invalid'>Invalid User</h3>
            
            <script>
                setTimeout(() => document.querySelector('#error-message-invalid').remove(),3000);
            </script>

            <style>
                #error-message-invalid {
                    color: red;
                }
            </style>";

        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Login Form</title>

</head>
<body>
    <h1 class="lform">Login Form</h1>
    <form action="" method="post" id ="login-form">
        <div class="flex">

    <?php if(isset($_POST['Login'])){ ?>

            <span ><?php echo $error ?></span>
    <?php } ?>

            <span id="error-message-user"></span>
            <label>User name</label>
            <input type="text" name="username" id="username" >

            <span id="error-message-pass"></span>
            <label>Passsword</label>
            <input type="password" name="password" id="password" >

            <span id="error-message-access"></span>
            <label>Access</label>
            <select class="access" name="access" id="access">
                <option value="" ></option>
                <option value="admin" >Admin</option>
                <option value="student" >Student</option>
            </select>

            <button class="submit" id="submit" type="submit" name="Login">Login</button>
            <a href="index.php"class="submit">Back</a>
        </div>
    </form>
</body>
<script src="JavaScript/login.js"></script>
</html>