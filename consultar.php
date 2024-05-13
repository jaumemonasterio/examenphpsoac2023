<!DOCTYPE html>
<html lang="en">
<?php
session_start();



?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consultar noticies</title>
    <link rel="stylesheet" href="estils.css">

</head>

<body>


    <?php
    include ("head.php");


    // print_r($amics);
    
    ?>

    <a href="afegir.php"> <button> afegir</button> </a>
    <a href="llistami.php"> <button> Veure llista d'amics</button></a>

    <?php

    if (isset($_SESSION["user"])) {


        if (isset($_SESSION["noticia"])) {

            ?>

            <h1> noticies</h1>
            <?php


            if (isset($_GET["like"])) {

                $like = $_GET["like"];

                $_SESSION["noticia"][$like]["like"]++;
            }
            $noticies = $_SESSION["noticia"];
            ?>



            <?php

            for ($i = 0; $i < count($noticies); $i++) {
                $noticia = $noticies[$i];
                $comen = $noticia["comen"];
                ?>

                <div class="card">
                    <img src="http://localhost/soc/fotos/<?= $noticia["nom"] ?>" alt="Avatar" style="width:100%">
                    <div class="container">
                        <h4> <b> <?= $noticia["titol"] ?> </b></h4>
                        <p> <?= $noticia["noticia"] ?></p>
                        <p><?= $noticia["like"]; ?> <a href="consultar.php?like=<?= $i ?>"> <button> like</button> </a> </p>
                        <p>
                            <?php


                            for ($k = 0; $k < count($comen); $k++) {
                                $com = $comen[$k];
                                echo $com["text"] . " " . $com["data"] . "<br>";
                            }
                            ?>
                        <form action="newcom.php" method="post">
                            <textarea name="comen" id=""></textarea>
                            <input type="hidden" name="post" value="<?= $i ?>">
                            <input type="submit" value="coment">

                        </form>
                        </p>

                    </div>
                </div>




                <?php

            }



        } else {


            ?>
            <h1> No hi han noticies</h1>

            <?php
        }
        ?>

        <h1> Amics </h1>
        <?php
        $amics = $user["amics"];
        for ($i = 0; $i < count($amics); $i++) {
            $amic = $amics[$i];

            ?>

            <div class="card">
                <img src="<?= $amic["imatge"] ?>" alt="Avatar" style="width:100%">
                <div class="container">
                    <h4> <b> <?= $amic["nom"] . " " . $amic["cognom"] ?> </b></h4>

                </div>
            </div>
            <?php

        }


        ?>

        <h1> Amic d'Amics</h1>




        <?php

        for ($i = 0; $i < count($amics); $i++) {

            $amic = $amics[$i];
            $noma = $amic["nom"];
            $noma= strtolower($noma);



            for ($k = 0; $k < count($users); $k++) {
                $us = $users[$k];
                if ($us["username"] === $noma) {
                    $amics = $us["amics"];
                    for ($t = 0; $t < count($amics); $t++) {
                        $amic = $amics[$t];

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



            }



        }
    } else {
        header("location:login.php");
    }
    ?>

</body>

</html>