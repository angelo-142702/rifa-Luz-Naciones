<?php
include("../db.php");
$output="";
$final=0;
for($inicio = 1; $inicio <11; $inicio ++){
    $miembros=[];
    $id=$inicio;
    $sentencia = $conexion->prepare("SELECT * FROM `encargados` WHERE `ID`=:id");
    $sentencia->bindParam(':id',$id);
    $sentencia->execute();
    $encargado=$sentencia->fetch(PDO::FETCH_LAZY);
    $inicio=1; $range=11;
        for($i=$inicio; $i < $range; $i++){
        $sentencia = $conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=".$i);
        $sentencia->execute();
        $registro = $sentencia->fetch(PDO::FETCH_LAZY);
        array_push($miembros, $registro);
        }    
    $encargadoP=$encargado["nombre"]; 
    $output .="
    <br><h2>encargado del  grupo".$id ." :". $encargadoP." </h2>
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
            
    ";    
        foreach($miembros as $item){
            $output .=" 
                    <tr>
                    <td><b>". $item["#tiket"]."</b></td>
                    <td>".$item["nombre"]."</td>
                    <td>".$item["apellido"]."</td>
                    <td>".$item["telefono"]."</td>
                    <td>".$item["pago"]."</td>
                    </tr>
                    ";        
            }
    $output .="
            </tbody>
        </table>
    ";
    $miembros=[];
    $indice=$indice+10;
    $rango=$rango+10;
    $final+=10;
}
echo($output);
