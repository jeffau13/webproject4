<?php include "header.php";?> 
<style> 
    body { 
        text-align: center; 
      
    }
    form { 
        margin-top: 250px; 
        font-size: 33px; 
    }
    </style> 
    <form action="admindb.php" method="post">
      <label>Enter Admin Password</label>
        <input name="pw" type="password" placeholder="password"></input>
        <input class="btn btn-primary" type="submit" value ="submit"></input>
</form>

</body>
</html>