<?php
include "header.php"; 
$linkto = 'registerdb.php';
?>
   <style> 
    body { 
        text-align: center; 
      
    }
    form { 
        margin-top: 250px; 
        font-size: 33px; 
    }
    </style> 
  

    <form class="registerform" method="post" action="registerdb.php">    
    
    <label>Username: </label>
    <input type="text" name="username" placeholder="Username" maxlength="20" minlength= "6" required> </input></br>
    <label>Password: </label>
    <input type="password" name="password" placeholder="Password" maxlength="20" minlength="6" required> </input> </br>
    <label>Email: </label>
    <input type="email" name="email" placeholder="email" maxlength="30" required> </input></br>
    
    <button class="btn btn-primary" type="submit" > Register </button>
    </form>


    
</body>
</html>