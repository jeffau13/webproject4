<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- <script src="main.js"></script> -->
</head>

<body>
    <?php
    
 
    require 'db.php';
    global $conn;
    $username= $_POST['username'];
    $password= $_POST['password'];
    $email= $_POST['email'];
   
   
    
        $query = "SELECT * FROM users WHERE username = '{$username}';";
        $result= mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
       

        if($rows == 1){
            echo '<script type="text/javascript">'; 
            echo 'alert("Username already exists! Please try another.");'; 
            echo 'window.location.href = "register.php";';
            echo '</script>';
            
        }else{
            $insert="INSERT INTO users(username, password, email) VALUES ('{$username}','{$password}','{$email}' );"; 

            mysqli_query($conn,$insert);
            echo '<script type="text/javascript">'; 
            echo 'alert("Registered Successfully! Redirecting to Login Page");'; 
            echo 'window.location.href = "login.php";';
            echo '</script>';
            
        }

  
    
    ?>
</body>

</html>