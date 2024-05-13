



<header> 
   <h1> Xarxa social</h1>   
      
  

   <?php
   include("users.php");
   

   if (isset($_SESSION["user"])){  

    $user=$users[$_SESSION["user"]];
   ?>


    <h5> <?= $user["username"]?>&nbsp; <a href="logout.php"><button>lougout</button> </a></h5></>

    <?php
    }
    ?>  
    
</header>