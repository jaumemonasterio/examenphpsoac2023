<?php

function llegir($path){
  $theFile = $path;
  $con="";

if ($gestor = fopen($theFile, 'r')) {
  while (($line = fgets($gestor)) !== false) {
    $con=$con.$line."\n";
  }
  fclose($gestor);
}

return $con;
}

function pujafit($foto){
    if ($foto["size"] > 0) {
    
        
        $uri = "C:\\xampp\\htdocs\\soc\\fotos\\". $foto["name"];
        move_uploaded_file($foto["tmp_name"], $uri);
    }
    }

function escriure($fit, $con){
  $theFile = $fit;
  
  if ($gestor = fopen($theFile, 'w')) {
    fwrite($gestor, $con);
    fclose($gestor);
  }
  
}


function baixar ($file){

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
}


?>