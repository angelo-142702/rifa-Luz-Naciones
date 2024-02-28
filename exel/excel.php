<?php
include("../db.php");

 header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=listado-Rifa-".date("d_m_Y").'.xls');
header("Program: no-cache");
header("Expires: 0");  
$list=[];
$ganadores=[];
for($inicio = 1; $inicio <11; $inicio ++){
    $id=$inicio;
    $sentencia = $conexion->prepare("SELECT * FROM `encargados` WHERE `ID`=:id");
    $sentencia->bindParam(':id',$id);
    $sentencia->execute();
    $encargado=$sentencia->fetch(PDO::FETCH_LAZY);
    array_push($list,$encargado);
}
for($inicio = 1; $inicio <11; $inicio ++){
    $sentencia = $conexion->prepare("SELECT * FROM `ganadores` WHERE `ID`=:id");
    $sentencia->bindParam(':id',$inicio);
    $sentencia->execute();
    $posible=$sentencia->fetch(PDO::FETCH_LAZY);
    array_push($ganadores,$posible );
}
$miembros1=[];
$miembros2=[];
$miembros3=[];
$miembros4=[];
$miembros5=[];
$miembros6=[];
$miembros7=[];
$miembros8=[];
$miembros9=[];
$miembros10=[];

for($i=1; $i < 11; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros1, $registro);
}      
for($i=11; $i < 21; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros2, $registro);
}      
for($i=21; $i < 31; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros3, $registro);
}      
for($i=31; $i < 41; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros4, $registro);
}      
for($i=41; $i < 51; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros5, $registro);
}      
for($i=51; $i < 61; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros6, $registro);
}      
for($i=61; $i < 71; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros7, $registro);
}        
for($i=71; $i < 81; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros8, $registro);
}      
for($i=81; $i < 91; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros9, $registro);
}      
for($i=91; $i < 101; $i++){
    $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    array_push($miembros10, $registro);
}      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
    

<div class="container d-flex justify-content-between">
    <div class="div">
    <h2>encargado grupo 1: <?php echo $list[0]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[0]["nombre"];?></h2>

    <table class='table'>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    apellido
                </td>
                <td>
                    telefono
                </td>
                
                <td>
                    pago
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros1 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>
    </div>


<div class="div">
<h2>encargado del  grupo 2: <?php echo $list[1]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[1]["nombre"];?></h2>

    <table class='table'>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    Apellido
                </td>
                <td>
                    Telefono
                </td>
                
                <td>
                    Cancelado
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros2 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>
</div>



</div>


<h2>encargado del  grupo 3: <?php echo $list[2]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[2]["nombre"];?></h2>

    <table>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    apellido
                </td>
                <td>
                    telefono
                </td>
                
                <td>
                    pago
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros3 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>

<h2>encargado del  grupo 4: <?php echo $list[3]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[3]["nombre"];?></h2>

    <table>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    apellido
                </td>
                <td>
                    telefono
                </td>
                
                <td>
                    pago
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros4 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>

<h2>encargado del  grupo 5: <?php echo $list[4]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[4]["nombre"];?></h2>

    <table>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    apellido
                </td>
                <td>
                    telefono
                </td>
                
                <td>
                    pago
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros5 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>


<h2>encargado del  grupo 6: <?php echo $list[5]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[5]["nombre"];?></h2>

    <table>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    apellido
                </td>
                <td>
                    telefono
                </td>
                
                <td>
                    pago
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros6 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>

<h2>encargado del  grupo 7: <?php echo $list[6]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[6]["nombre"];?></h2>

    <table>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    apellido
                </td>
                <td>
                    telefono
                </td>
                
                <td>
                    pago
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros7 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>

<h2>encargado del  grupo 8: <?php echo $list[7]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[7]["nombre"];?></h2>

    <table>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    apellido
                </td>
                <td>
                    telefono
                </td>
                
                <td>
                    pago
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros8 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>

<h2>encargado del  grupo 9: <?php echo $list[8]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[8]["nombre"];?></h2>

    <table>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    apellido
                </td>
                <td>
                    telefono
                </td>
                
                <td>
                    pago
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros9 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>

<h2>encargado del  grupo 10: <?php echo $list[9]["nombre"];?></h2>
<h2>apadrinado: <?php echo $ganadores[9]["nombre"];?></h2>

    <table>
            <thead>
                <td>
                    Tikect
                </td>
                <td>
                    Nombre
                </td>
                <td>
                    apellido
                </td>
                <td>
                    telefono
                </td>
                
                <td>
                    pago
                </td>
                
                
            </thead>
            <tbody>
                <?php foreach($miembros10 as $item){?>
                    <tr>
                    <td><b><?php echo $item["#tiket"]?> </b></td>
                    <td><?php echo $item["nombre"]?> </td>
                    <td><?php echo $item["apellido"]?> </td>
                    <td><?php echo $item["telefono"]?> </td>
                    <td><?php echo $item["pago"]?> </td>
                </tr>    
                    
                <?php }?>
            </tbody>
            
</table>
</body>
</html>