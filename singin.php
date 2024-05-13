<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estils.css">
</head>
<body>
<?php
session_start();
include("head.php");
include("validacio.php");
$nom="";
$cognom="";
$email="";
$pass1="";
$pass2="";
$data="";

$nomE="";
$cognomE="";
$mailE="";
$passE="";
$dataE="";
$error=false;





if (isset($_POST["enviar"])){

    $nom=   validate_input($_POST["nom"]);
    $cognom= validate_input($_POST["cognom"]);
    $mail=  validate_input( $_POST["email"]);
    $pass1=  validate_input($_POST["password1"]);
    $pass2=  validate_input($_POST["password2"]);
    $data=   validate_input($_POST["data"]);


    if ($nom===""){

        $nomE="el nom es obligatori";
        $error=true;
    }  
    if ($cognom===""){

        $cognomE="el cognom es obligatori";
        $error=true;
    }  
    if ($mail===""){

        $mailE="el mail es obligatori";
        $error=true;
    }  
    if ($data===""){

        $dataE="La data de neixament es obligatoria";
        $error=true;
    }  
    if ($pass1==="" || $pass2===""){

        $passE="el password es obligatori";
        $error=true;
    }  



    if ($pass1!=$pass2){

       $passE="els 2 passwords no son iguals.";
       $error=true;
    } else if (!validarContrasenya($pass1)) {

        $passE="La contrasenya ha de tenir com minim 1 majuscula una minuscula i un caracter especial i dentre 6 i8 caracters.";
        $error=true;
    }
    if (!esMajorEdat($data)) {
        $dataE="No ets major d'edat no pot entrar en aquesta xarxa social ";
        $error=true;
    }
    if (!validarEmail($mail)) {
        $mailE="El format de l'email no es correcte";
        $error=true;
    }


    if (!$error){

        header("location: login.php");
    }
}

?>

<h1> Registre</h1>
<table>

<form  method="post">
<tr>
    <td> <label for="nom"> Nom</label> </td>?
    <td> <input type="text" name="nom" id="nom" value="<?=$nom?>" ><br> 
         <p class="error"><?=$nomE?></p>
</tr>
</td>
</tr>
<tr>
    <td> <label for="cognom"> cognom</label> </td>?
    <td> <input type="text" name="cognom" id="cognom" value="<?=$cognom?>"><br> 
         <p class="error"><?=$cognomE?></p></td>
</tr>
<tr>
    <td> <label for="email"> email</label> </td>
    <td> <input type="email" name="email" id="email"value="<?=$email?>" ><br> 
    <p class="error"><?=$mailE?></p></td>
</tr>
<tr>
    <td> <label for="data"> data de neixament</label> </td>
    <td> <input type="date" name="data" id="data"  value="<?=$data?>"><br>
    <p class="error"><?=$dataE?></p></td>
</tr>
<tr>
    <td> <label for="password1"> password1</label> </td>
    <td> <input type="password" name="password1" id="password1" > <br>
    <p class="error"><?=$passE?></p></td>
</tr>
<tr>
    <td> <label for="password2"> password2</label> </td>
    <td> <input type="password" name="password2" id="password2" > <br>
    <p class="error"><?=$passE?></p></td>
</tr>
<tr>
    <td colspan="2"> <input type="submit" value="enviar" name="enviar" id="emviar"></td>
</tr>
</form>    
</table>
<?php
include("footer.html");

?>
</body>
</html>