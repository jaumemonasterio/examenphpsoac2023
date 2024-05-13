

<?php
function validate_input($input){
    $input = trim($input); 
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    return $input;
 }
 
function pujafit($foto){
if ($foto["size"] > 0) {

    
    $uri = "C:\\xampp\\htdocs\\soc\\fotos\\". $foto["name"];
    move_uploaded_file($foto["tmp_name"], $uri);
}
}
function esMajorEdat($dataNaixement) {
    $dataActual = date('Y-m-d');
    $majorEdat = date('Y-m-d', strtotime('-18 years', strtotime($dataActual)));
    return $dataNaixement <= $majorEdat;
}

function validarEmail($email) {
    // Patró d'expressió regular per validar adreces de correu electrònic
    $patro = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    
    // Comprova si l'adreça de correu electrònic compleix el patró
    return preg_match($patro, $email);
}
function validarContrasenya($contrasenya) {
    // Comprova si la contrasenya té entre 6 i 8 caràcters
    if (strlen($contrasenya) < 6 || strlen($contrasenya) > 8) {
        return false;
    }
    
    // Comprova si la contrasenya conté almenys una minúscula, una majúscula i un caràcter especial
    if (!preg_match('/[a-z]/', $contrasenya) || !preg_match('/[A-Z]/', $contrasenya) || !preg_match('/[^\w]/', $contrasenya)) {
        return false;
    }
    
    // La contrasenya compleix tots els criteris
    return true;
}


?>