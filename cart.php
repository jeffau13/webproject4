<?php session_start();
 require 'db.php';
 // require 'order.php';
 global $conn;   ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="./creditcardjs-v0.10.13.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
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

        form {
            /* display: inline-block; */
            margin: 1em 1em;
        }
    </style>

</head>

<body>
    <?php
    
    $username= $_SESSION['username'];
    $type= $_POST['type'];
    $fullname= $_POST['fullname'];
    $days = $_POST['days'];
    $base = 0;
    $query = "SELECT * FROM cars WHERE type= '{$type}';";
    $result =mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $avail= $row['count'];
    $base = $row['price'];
    $totalprice = $base * $days;


    $_SESSION['days']= $days ;
    $_SESSION['type']= $type ;
    $_SESSION['total']= $totalprice;
    
    if($avail<1){
// if Out of stock

        echo '<script type="text/javascript">'; 
        
        echo 'alert("Sorry, The type of car you\'re trying to rent is booked out .  Please choose another type.");'; 
            
            echo 'window.location.href = "order.php";';
            echo '</script>';
   
    }else{
    
     //Display detail of what's in cart:
    echo('<h4>Your Rental Order:</h4><p> Please verify that the following details about your rental order are correct:</p>');
    
    echo 
    "<table align='center'>
    
    <tr><th>username</th><th>Full Name</th><th>Car Type</th><th>Days</th><th>Price per Day</th><th>Total Price</th></tr>";
    
    echo('<tr><td>'.$username .'</td><td>'.$fullname .'</td><td>'.$type .'</td><td>'.$days. '</td><td>$' . $base .'</td><td>$'.$totalprice.'</td></tr></table>'  );


        }
    
    ?>

       <form action="order.php">
            <input class="btn btn-danger" type="submit" value="Empty Cart"> </input>

        </form>
        <hr></hr>
        <h4>Please Enter your Credit Card Info Here:</h4>
        <div id="ccarea">
            <form method="post" id="ccform" action="recipt.php">
                <div class="ccjs-card">
                    <label class="ccjs-number">
                        Card Number
                        <input name="cc" class="ccjs-number" placeholder="•••• •••• •••• ••••">
                    </label>

                    <label class="ccjs-csc">
                        Security Code
                        <input name="ccv" class="ccjs-csc" placeholder="•••">
                    </label>

                    <button type="button" class="ccjs-csc-help">?</button>

                    <label class="ccjs-name">
                        Name on Card
                        <input name="fullname" class="ccjs-name">
                    </label>

                    <fieldset class="ccjs-expiration">
                        <legend>Expiration</legend>
                        <select name="month" class="ccjs-month">
                            <option selected disabled>MM</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>

                        <select name="year" class="ccjs-year">
                            <option selected disabled>YY</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                        </select>
                    </fieldset>

                    <select name="card-type" class="ccjs-hidden-card-type">
                        <option value="amex" class="ccjs-amex">American Express</option>
                        <option value="discover" class="ccjs-discover">Discover</option>
                        <option value="mastercard" class="ccjs-mastercard">MasterCard</option>
                        <option value="visa" class="ccjs-visa">Visa</option>
                        <option value="diners-club" class="ccjs-diners-club">Diners Club</option>
                        <option value="jcb" class="ccjs-jcb">JCB</option>
                        <!--<option value="laser" class="laser">Laser</option>-->
                        <!--<option value="maestro" class="maestro">Maestro</option>-->
                        <!--<option value="unionpay" class="unionpay">UnionPay</option>-->
                        <!--<option value="visa-electron" class="visa-electron">Visa Electron</option>-->
                        <!--<option value="dankort" class="dankort">Dankort</option>-->
                    </select>
                    </br>
                    </br>
                    </br>
                    </br>
                    <label class="special">Billing Zip-Code</label>
                    <input name="zip" class="special" type="text" maxlength="5" placeholder="ZIP"
                        required size="5"></input>


                </div>
                <button class="btn btn-primary" type="submit">Place Order</button>
            </form>
        </div>
        <script src="./creditcardjs-v0.10.13.min.js"></script>


     
</body>

</html>