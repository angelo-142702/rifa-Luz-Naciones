<?php 
include("../db.php");
if ($_GET) {
    $txtID=(isset($_GET["txtID"])?$_GET["txtID"]:"");
    $sentencia=$conexion->prepare("SELECT * FROM `encargados` WHERE `encargados`.`ID`= :id");
$sentencia->bindParam(":id",$txtID);
$sentencia->execute();
$jugador=$sentencia->fetch(PDO::FETCH_LAZY);
$encargado=$jugador["nombre"];
$imagen=$jugador["img"];
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
            <p class="socialSvg instagramSvg gol">07</p>
        </a>
        
        <a class="socialContainer containerTwo" href="#">
            <p class="socialSvg twitterSvg">12</p>
        </a>                   
        <a class="socialContainer containerThree" href="#">
            <p class="socialSvg twitterSvg">27</p>                
        </a>
        
        <a class="socialContainer containerFour" href="#">
            <p class="socialSvg whatsappSvg">33</p>
        </a>

        <a class="socialContainer containerOne" href="#">
            <p class="socialSvg whatsappSvg">42</p>    
        </a>
        </div>             
        <div class="card card2">
        <a class="socialContainer containerOne" href="#">
            <p class="socialSvg instagramSvg gol">57</p>
        </a>
        
        <a class="socialContainer containerTwo" href="#">
            <p class="socialSvg twitterSvg">62</p>
        </a>                   
        <a class="socialContainer containerThree" href="#">
            <p class="socialSvg twitterSvg">77</p>                
        </a>
        
        <a class="socialContainer containerFour" href="#">
            <p class="socialSvg whatsappSvg">83</p>
        </a>

        <a class="socialContainer containerOne" href="#">
            <p class="socialSvg whatsappSvg">90</p>    
        </a>
        </div>             


  </div>
</div>
</div>
</body>
</html>





