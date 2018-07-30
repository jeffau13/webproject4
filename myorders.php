<?php session_start(); ?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <script src="main.js"></script>
    <style>
        body {
            text-align: center;
        }

        table {
            margin-bottom: 20px !important;
        }

        th,
        td {
            border: 1px solid black;
            padding: 1em;
        }
        form{
            display:inline-block;
            margin:1em 1em;
        }
    </style>
</head>
<body>
<form action="logout.php">
        <input class="btn btn-danger" type="submit" value="Logout"> </input>

    </form>

    <form action="order.php">
        <input class="btn btn-info" type="submit" value="Place another rental order"> </input>

    </form>
    
   
    
    <?php 

    require "db.php";
    $username= $_SESSION['username'];
    $query = "SELECT * FROM orders WHERE username= '{$username}';";
    echo "
    <table align='center'><caption text-align='center' font-weight='bold'>Your Rental Orders:</caption><tr><th>Order Number</th><th>Username</th><th>Full Name</th><th>Car Type</th><th>Days Renting</th><th>Total Price</th><th>Billing Zip</th></tr>";
   
       $result=mysqli_query($conn, $query);
       while($row=mysqli_fetch_assoc($result)) {
           echo '<tr><td>'.$row['oid'].'</td><td>' . $row['username'] .'</td><td>' . $row['fullname'].'</td><td>' . $row['type'].'</td><td>' . $row['days'].'</td><td>$'. $row['price'] . '</td><td>' . $row['zip'] ."</td> </tr>";
       }
       echo "</table>";
   
       ?>



</body>
</html>