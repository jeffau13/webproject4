<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>All Orders</title>
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
                margin-top: 20px !important;
            }

            th,
            td,
            tr {
                border: 1px solid black;
                padding: 1em;
            }
            form{
                margin-top:5px;
            }
            caption {
                border-top: 1px solid black;
                border-left: 1px solid black;
                border-right: 1px solid black;
                text-align: center;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <form action="index.html">
            <button class="btn btn-danger" type="submit">Logout </button>
        </form>
        <?php $pw=$_POST['pw'];
require "db.php";
global $conn;
if($pw !='finalproject') {
    echo '<script type="text/javascript">';
    echo 'alert("Incorrect Admin Password. Please try again!");';
    echo 'window.location.href = "admin.php";';
    echo '</script>';
}

else {
    echo "
 <table align='center'><caption text-align='center' font-weight='bold'>All Car Rental Orders </caption><tr><th>Order ID</th><th>Username</th><th>Full Name</th><th>Car Type</th><th>Days Renting</th><th>Total Price</th><th>Billing Zip</th></tr>";
 $sql="SELECT * FROM orders";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)) {
        echo '<tr><td>'.$row['oid'].'</td><td>' . $row['username'] .'</td><td>' . $row['fullname'].'</td><td>' . $row['type'].'</td><td>' . $row['days'].'</td><td>$'. $row['price'] . '</td><td>' . $row['zip'] ."</td> </tr>";
    }
    echo "</table>";
}

?>
    </body>

    </html>