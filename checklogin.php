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
    // $email= $_POST['email'];
   
   
    
        $query = "SELECT * FROM users WHERE username = '{$username}' and password = '{$password}';";
        $result= mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
       

        if($rows == 1){
            session_start();
            $_SESSION['username'] = $username;
          
            echo '<script type="text/javascript">'; 
            echo 'alert("Logged In Successfully. Welcome");'; 
            echo 'window.location.href = "order.php";';
            echo '</script>';
            
        }else{
        
           
            echo '<script type="text/javascript">'; 
            echo 'alert("Incorrect Credentials! Please try again");'; 
            echo 'window.location.href = "login.php";';
            echo '</script>';
            
        }

  



    
    ?>
</body>

</html>