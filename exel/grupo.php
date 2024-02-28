<?php

include("../db.php");
$miembros=[];
if ($_GET["txtID"]) {
    $id=(isset($_GET["txtID"])?$_GET["txtID"]:"");
    $sentencia = $conexion->prepare("SELECT * FROM `encargados` WHERE `ID`=:id");
    $sentencia->bindParam(':id',$id);
    $sentencia->execute();
    $encargado=$sentencia->fetch(PDO::FETCH_LAZY);
    $rango;$indice;
    switch ($id) {
        case '1':
            $indice=1;
            $rango=11;
            break;
            
            case '2':
                $indice=11;
                $rango=21;
                break;
                
                case '3':
                    $indice=21;
                    $rango=31;
            break;
        
        case '4':
            $indice=31;
            $rango=41;
            break;
        
        case '5':
            $indice=41;
            $rango=51;
            break;
        
        case '6':
            $indice=51;
            $rango=61;
            break;
        case '7':
            $indice=61;
            $rango=71;
            break;
        case '8':
            $indice=71;
            $rango=81;
            break;
        case '9':
            $indice=81;
            $rango=91;
            break;
        case '10':
            $indice=91;
            $rango=101;
            break;
        
        
        
        default:
            # code...
            break;
    } 
    
}
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=rifa_G-(".$id."#)".date("d_m_Y").'.xls');
header("Program: no-cache");
header("Expires: 0");


$output="";


for ($i=$indice; $i < $rango; $i++) { 
    $sentencia=$conexion->prepare("SELECT * FROM `hermanos` WHERE `ID`=:di");
    $sentencia->bindParam(':di',$i);
$sentencia->execute();
$registro=$sentencia->fetch(PDO::FETCH_LAZY);
array_push($miembros,$registro);
}
$encargadoP=$encargado["nombre"]; 
$output .="<h2>encargado del  grupo".  $id ." :". $encargadoP." </h2>
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
        <!-- recibimos los datos e imprimos con un foreach -->
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
</body>
</html>
";
echo($output);
?>
 
<?php

/* $html=ob_get_clean();
require_once('../libreria/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf= new Dompdf(); 

$options= $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper("letter");


$fecha= date("d_m_Y");
$dompdf->render();
$dompdf->stream($fecha."_rifa.pdf", array("Attachment" => false)); */
?>