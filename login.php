<?php include "header.php"; ?> 

    <style> 
    body { 
        text-align: center; 
      
    }
    form { 
        margin-top: 250px; 
        font-size: 33px; 
    }
    </style> 


    <form class="loginform" method="post" action="checklogin.php">    
    
    <label>Username: </label>
    <input type="text" name="username" placeholder="Username" maxlength="20" minlength= "6" required> </input></br>
    <label>Password: </label>
    <input type="password" name="password" placeholder="Password" maxlength="20" minlength="6" required> </input> </br>
    
    
    <button class="btn btn-primary" type="submit" > Login </button>
    </form>


    
</body>
</html>