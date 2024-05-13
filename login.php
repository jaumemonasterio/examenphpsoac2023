<!DOCTYPE html>
<html lang="">

<?php
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> login </title>
</head>
<body>
    


<?php

include("head.php");
$missatge ="";
if (isset($_POST["usuari"])) {
    $usuari= $_POST["usuari"];
    $pass= $_POST["password"];
    $login =false;
    $i=0;
  while (!$login && $i < count($users)) {

    $user=$users[$i];

  $login= ($user["username"]===$usuari && $user["password"]===$pass);

  $i++;
  }  

  $i--; // ultim id del user que s'ha logeat
    
    if ($login) {
        $_SESSION["si"] = "true";
        $_SESSION["user"]=$i;
        $missatge= "seccio iniciada";
      if (isset($_POST["recorda"])){
        $cookie_name = "remember_me";
            $cookie_value = 1; // podria ser el token o el id del usuari
            $cookie_expiry_time = time() + (24*3600); //un dia
            setcookie($cookie_name, $cookie_value, $cookie_expiry_time, "/","",true,true);

      }

        header("location: consultar.php");

     

    } else {  
        
        $_SESSION["si"] = "false";
        $missatge="Error seccio no iniciada";
}
}

?>

<form action="" method="post">

<label for="">usuari</label> <input type="text" name="usuari" > <br>
<label for=""> password </label> <input type="password" name="password"><br>
<input type="checkbox" name="recorda" id="">recorda <br>
<input type="submit"   value="iniciar">

<p> <?= $missatge ?></p>

</form>
<a href="singin.php"> regitrat</a>

</body>

<?php
include("footer.html");

?>
</html>