<?php

session_start();

if (isset($_POST["post"])){

    $data= date('d/m/Y h:i:s' );
    $comen= [
        "text"=>$_POST["comen"],
        "data" => $data
    ];

    $post=$_POST["post"];
    array_push($_SESSION["noticia"][$post]["comen"], $comen);

}

header("location:consultar.php");



?>