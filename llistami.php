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
    include ("head.php");
    include ("validacio.php");
   
    $amics=$user["amics"];
    $nom = "";
    $cognom = "";

    ?>


    <?php

    $amicsll = [];
    if (isset($_POST["enviar"])) {
        $nom = validate_input($_POST["nom"]);
        $cognom = validate_input($_POST["cognom"]);
        if ($nom != '') {

            $con = strlen($nom);
            if ($con > 2) {

                for ($i = 0; $i < count($amics); $i++) {
                    $amic = $amics[$i];

                    $noe= substr($amic["nom"], 0, $con);
                    //echo $noe;

                    if ($noe === $nom) {
                        array_push($amicsll, $amic);
                    }
                }
            }
        }
        if ($cognom != '') {

            $con = strlen($cognom);
            if ($con > 2) {

                for ($i = 0; $i < count($amics); $i++) {
                    $amic = $amics[$i];

                    $coge= substr($amic["cognom"], 0, $con);
                    //echo $noe;

                    if ($coge === $nom) {
                        array_push($amicsll, $amic);
                    }
                }
            }
        }

        if ($nom!='' && $cognom!=''){
            $amicsll=[];
            
            for ($i = 0; $i < count($amics); $i++) {
                $amic = $amics[$i];
                if ($nom === $amic["nom"] && $cognom===$amic["cognom"]) {
                    array_push($amicsll, $amic);
                }
        }
    }

    } else {

        $amicsll = $amics;
    }
    ?>

    <form action="" method="post">

        <table>
            <tr>
                <td> <label for="nom"> Nom</label> </td>
                <td> <input type="text" name="nom" id="nom" value="<?= $nom ?>"><br>


            </tr>
            </td>
            </tr>
            <tr>
                <td> <label for="cognom"> cognom</label> </td>
                <td> <input type="text" name="cognom" id="cognom" value="<?= $cognom ?>"><br>
                </td>
            </tr>

            <tr>
                <td colspan="2"> <input type="submit" value="enviar" name="enviar" id="emviar"></td>
            </tr>
        </table>


    </form>
    <?php

    if (count($amicsll)==0){

        ?>

        <h1> No hi ha usuari amb aquesta cerca!!!   </h1>
        <?php
    }else{

    for ($i = 0; $i < count($amicsll); $i++) {
        $amic = $amicsll[$i];

        ?>

        <div class="card">
            <img src="<?= $amic["imatge"] ?>" alt="Avatar" style="width:100%">
            <div class="container">
                <h4> <b> <?= $amic["nom"] . " " . $amic["cognom"] ?> </b></h4>

            </div>
        </div>
        <?php

    }
    }
    ?>







    <?php


    include ("footer.html");


    ?>
</body>

</html>