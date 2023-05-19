<?php

require_once("../classes/tacos.class.php");
$url = __DIR__ . "/tacos.json";
$tacoslist = [];



if(file_exists($url)){
  $tacosjson = file_get_contents($url);

  $tacos=json_decode($tacosjson);

  foreach ($tacos as $taco) {
    $item = new Taco(
      $taco->tort,
      $taco->sabores,
      $taco->verd,
      $taco->cant,
      $taco->salsa,
      $taco->comentarios
    );
    array_push($tacoslist,$item);
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TACOS</title>
</head>
<body>
 


<section>
        <form action="altatacos.php" method="POST" >
            <fieldset>
                <legend>TACOS</legend>
                <label for="tort">  Tortilla</label> <br>
                <input type="radio" name="tort" id="tort" value="Harina"> Harina 
                <input type="radio"  name="tort" id="tort" value="Maiz" checked > Maiz
            </fieldset>
            <br>

         <fieldset>
                <legend>Carne</legend>
                <label for="sabores">Tipo de carne</label>
           <select name="sabores" id="sabores">sabor
                <option value="Suadero">Suadero</option>
                <option value="Pastor" selected>Pastor</option>
                <option value="Buche">Buche</option>
                <option value="Tinga">Tinga</option>
                <option value="Pollo">Pollo</option>
          </select>
        </fieldset>    
             <br>

        <fieldset>
              <legend>Verdura</legend>
              <input type="radio" name="verd" id="verd" value="si"> Si 
              <input type="radio" name="verd" id="verd" value="no" checked> No
        </fieldset>
           <br>

        <fieldset>
          <legend># De Tacos</legend>
            Cantidad <input type="number" name="cant" value="2"> 
        </fieldset>
          <br><br>

 <fieldset>
  <legend>Salsa</legend>
    <input type="radio" name ="salsa" value="roja" checked> roja
    <input type="radio" name ="salsa" value="verde"> verde  
</fieldset>
 <br> <br>

 <fieldset>

  <textarea name="comentarios" id="comentarios" cols="30" rows="10" placeholder="Comentarios" style="resize: none;"></textarea>

</fieldset>
<br>

<input type="submit" value="Send" name="ok">

    </form>
  </section>
 
 
 
 
    <hr><hr>    





<h1>Tacos</h1>
<table border="1" cellspacing="5" ceLlpadding="5">
  <tr>
      <th>Tortilla</th>
      <th>Carne</th>
      <th>Verdura</th>
      <th># Tacos</th>
      <th>Salsa</th>
      <th>Comentarios</th>
  </tr>


  <?php 
  foreach($tacoslist as $taco){
    $taco->getTaco();
  }
?>
</table>


    
</body>
</html>