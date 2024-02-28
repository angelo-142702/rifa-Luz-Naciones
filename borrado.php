<?php 
include("./db.php");
$initial='';

$sentencia=$conexion->prepare("UPDATE `hermanos` SET  `nombre`=:nombre,`apellido`=:apellido ,`telefono`=:telefono, `pago`=:pago");
$sentencia->bindParam(":nombre",$initial);
$sentencia->bindParam(":apellido",$initial);
$sentencia->bindParam(":telefono",$initial);
$sentencia->bindParam(":pago",$initial);
$sentencia->execute();



$sen = $conexion->prepare("UPDATE `gandores` SET `nombre`=$initial, `sector`=$initial");
$sen->execute();

$sen2 = $conexion->prepare("UPDATE `encargados` SET `nombre`=$initial, `sector`=$initial");
$sen2->execute();





$mensaje="se limpio todo el registro";
header("location: index.php?mensaje=".$mensaje);  