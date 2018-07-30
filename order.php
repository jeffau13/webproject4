<?php session_start();
include "db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order a car</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
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
        }
    </style>
</head>

<body>
    <h1>Welcome
        <?php 
            echo $_SESSION['username'];
            echo ('!');      
    
    
    
    
    ?>
    </h1>
    <form action="logout.php">
        <input class="btn btn-danger" type="submit" value="Logout"> </input>

    </form>

    <form action="myorders.php">
        <input class="btn btn-info" type="submit" value="View My Past Orders"> </input>

    </form>
    </br>
    <h4>
    List of Available Cars:
    </h4>
    <?php 
    global $conn ; 

        $sql= "SELECT * FROM cars";
        $result = mysqli_query($conn,$sql);

            echo "<table align='center' ><tr><th>Type</th><th># available </th><th>Price Per day</th></tr>";

            while($row = mysqli_fetch_assoc($result)){
                        
                echo '<tr><td>'.$row['type'].'</td><td>' . $row['count'] . '</td><td>$' . $row['price'] ."</td></tr>";
                

           
            }
            echo "</table>";


    ?>


    <form class="orderform" method="post" action="cart.php">

        <label>Select Car Type:</label>
        <select id="cartype" name="type">
            <option value="compact">Compact</option>
            <option value="suv">SUV</option>
            <option value="sports">Sports</option>
            <option value="luxury">Luxury</option>

        </select>

        <label>Full Name: </label>
        <input type="text" name="fullname" placeholder="Full Name" maxlength="20" required> </input>
        </br>
        <label>How many Days? </label>
        <input type="number" name="days" placeholder="Number of days" min="1" maxlength="3" required> </input>
        </br>
        <button class="btn btn-primary" type="submit">Add to Cart</button>
    </form>



</body>

</html>