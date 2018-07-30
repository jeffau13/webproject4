<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Recipt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- <script src="main.js"></script> -->
</head>
<body>
    
<?php
    require "db.php";
    global $conn;
    session_start();
    $username=$_SESSION['username'];
    $type=$_SESSION['type'];
    $days=$_SESSION['days'];
    $total=$_SESSION['total'];

    $cc=$_POST['cc'];
    $ccv=$_POST['ccv'];
    $fullname=$_POST['fullname'];
    $cardtype=$_POST['card-type'];
    $zip=$_POST['zip'];



?>



<?php

// echo($username);
// echo($type);
// echo($days);
// echo($total);
// echo($cc);
// echo($ccv);
// echo($fullname);
// echo($cardtype);
// echo($zip);


$insert="INSERT INTO orders(username, fullname, days,type,price,cc,ccv,zip) VALUES ('{$username}','{$fullname}','{$days}','{$type}','{$total}','{$cc}','{$ccv}','{$zip}' );"; 
mysqli_query($conn,$insert);

//Change inventory:


$query = "SELECT * FROM cars WHERE type= '{$type}';";
    $result =mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $avail= $row['count'];
    $avail= $avail-1;
$query="UPDATE cars set count = '{$avail}' WHERE type = '{$type}';";
mysqli_query($conn,$query);


echo '<script type="text/javascript">'; 
echo 'alert("Order Succesfully Placed! Thank You!");'; 
echo 'window.location.href = "myorders.php";';
echo '</script>';

// echo('<h2>Order Placed Successfully !</h2>')
?>

<h2>Order Placed!</h2>
<form action="myorders.php" method="post">

        <input class="btn btn-info" type="submit" value="View My Past Orders"> </input>

    </form>

</body>
</html>