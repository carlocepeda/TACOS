
<?php

if(isset($_POST['ok'])){

    require_once('../classes/tacos.class.php');
    
    $tort = $_POST['tort'];
    $sabores = $_POST['sabores']; 
    $verd = $_POST['verd']; 
    $cant = intval($_POST['cant']); 
    $salsa = $_POST['salsa'];
    $validar = valString($_POST['comentarios']);

    if ($validar){
        $comentarios = $_POST['comentarios'];
    }
    else{
        echo "No mas de 20 caracteres";
        header("refresh:3; url='tacosform.php'");
        die();
    }
    

    $taco1 =new Taco($tort,$sabores,$verd,$cant,$salsa,$comentarios);

    $tacosjson = json_encode($taco1, JSON_PRETTY_PRINT);
 
    $archivo = __DIR__ . "/tacos.json";
    if(!file_exists($archivo)){
        $file = fopen($archivo, "w");
        fwrite($file,"[\n");
    }
    else{
        $file = fopen($archivo,"c");
        fseek($file,-2, SEEK_END);
        fwrite($file, ",\n");

    }
    fwrite($file, $tacosjson);
    fwrite($file,"\n]");
    fclose($file);
}
function valString($comentarios){
    if(preg_match("/^[A-Za-z]{1,20}$/",$comentarios)){
        return True;
    }
    return False;
}
 echo "taco registrado";
    header("refresh:3; url='tacosform.php'"); 
?>
