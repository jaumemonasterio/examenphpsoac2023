<?php


session_start();
include("head.php");


include("validacio.php");

if (isset($_SESSION["user"])){
$nom="";

$titole="";
$cose="";
$error=false;


        $titol=validate_input($_POST["titol"]);
        $cos= validate_input($_POST["noticia"]); 
        if (strlen($titol)<10){
            $error=true;
            $titole="al nom ha contenir com minim 10 caracters";
        }

        if (strlen($cos)>500){
            $error=true;
            $cose="El cos ha de tenir com a maxim 500 caracters";
        }



if (!$error){

    $foto=$_FILES["foto"]; 
    $nom = $_FILES["foto"]["name"];
     pujafit($foto);
        $noticia=[

            "titol"=>$titol,
            "noticia"=>$cos,
            "nom"=> $nom,
            "like"=> 0,
            "comen"=>[]

        ];

        if (isset($_SESSION["noticia"])){

            array_push($_SESSION["noticia"], $noticia);

        }else{
            
            $_SESSION["noticia"]= [$noticia];
        }
        

        header("location: consultar.php");
    } else {

        
        $noticiae=[
            "titol"=>$titol,
            "titole"=>$titole,
            "cos"=>$cos,
            "cose" => $cose,
        ];

        $_SESSION["noticiae"]= $noticiae;
        header("location: afegir.php");
    }

}

?>