<?php 
include("../db.php");
if ($_GET) {
    $txtID=(isset($_GET["txtID"])?$_GET["txtID"]:"");
    $sentencia=$conexion->prepare("SELECT * FROM `encargados` WHERE `encargados`.`ID`= :id");
$sentencia->bindParam(":id",$txtID);
$sentencia->execute();
$jugador=$sentencia->fetch(PDO::FETCH_LAZY);
$encargado=$jugador["nombre"];
$imagen = $jugador['img'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fichas.css">
</head>
<body>
    <br><br><br><br><br><br><br>
    
<div class="conatiner">
<div class="persona">
<img id="rey" margin-left='20px' height="150px" width="190px" border-redius="20px" src="../encargados/<?php echo $imagen;?>" alt="">
    
        <span> Encargado</span>
        <button> <?php echo $encargado;?> </button>
</div>        
  <div class="fe">
        <div class="card card1">
        <a class="socialContainer containerOne" href="#">
            <p class="socialSvg instagramSvg gol">04</p>
        </a>
        
        <a class="socialContainer containerTwo" href="#">
            <p class="socialSvg twitterSvg">15</p>
        </a>                   
        <a class="socialContainer containerThree" href="#">
            <p class="socialSvg twitterSvg">20</p>                
        </a>
        
        <a class="socialContainer containerFour" href="#">
            <p class="socialSvg whatsappSvg">34</p>
        </a>

        <a class="socialContainer containerOne" href="#">
            <p class="socialSvg whatsappSvg">40</p>    
        </a>
        </div>             
        <div class="card card2">
        <a class="socialContainer containerOne" href="#">
            <p class="socialSvg instagramSvg gol">54</p>
        </a>
        
        <a class="socialContainer containerTwo" href="#">
            <p class="socialSvg twitterSvg">65</p>
        </a>                   
        <a class="socialContainer containerThree" href="#">
            <p class="socialSvg twitterSvg">79</p>                
        </a>
        
        <a class="socialContainer containerFour" href="#">
            <p class="socialSvg whatsappSvg">85</p>
        </a>

        <a class="socialContainer containerOne" href="#">
            <p class="socialSvg whatsappSvg">96</p>    
        </a>
        </div>             


  </div>
</div>
</div>
</body>
</html>





