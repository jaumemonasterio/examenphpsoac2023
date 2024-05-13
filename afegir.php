<!DOCTYPE html>
<html lang="en">

<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estils.css">
    <title>Document</title>
</head>

<body>

    <?php

    $titole="";
    $cose="";
    $titol="";
    $cos="";

    include("head.php");

    if (isset($_SESSION["si"])) {

        if (isset($_SESSION["noticiae"])){

            
            $noticiae= $_SESSION["noticiae"];

            unset ($_SESSION["noticiae"]);
       
            $titole=$noticiae["titole"];
            $cose=$noticiae["cose"];
            $titol=$noticiae["titol"];
            $cos=$noticiae["cos"];
        }
        
        ?>


        <form action="insert.php" method="post"  enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <label for="">titol de la publicació </label>
                    </td>
                    <td>
                        <input type="text" name="titol" id="" value="<?=$titol?>"><br>
                        <p class="error"> <?=$titole?></p>

                    </td>
                </tr>


                <tr>
                    <td>
                        <label for=""> text publicació: </label>
                    </td>
                    <td>
                        <textarea name="noticia" id="" cols="30" rows="10"><?=$cos?></textarea><br>
                        <p class="error"> <?=$cose?></p>
                    </td>
                </tr>
               
               

                <tr>
                    <td>
                        <label for=""> foto </label>
                    </td>
                    <td>
                        <input type="file" name="foto" id="">

                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                <input type="submit" value="ok">
                    </td>
                </tr>


                
            </table>

        </form>
        <?php
    } else {
        ?>


        <h1> Error no login </h1>
        <a href="login.html"> login</a>

        <?php
    }

    ?>

<?php
include("footer.html");

?>

</body>

</html>