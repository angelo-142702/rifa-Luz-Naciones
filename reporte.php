<?php

ob_start();

include("./db.php");
$sentencia=$conexion->prepare("SELECT * FROM `hermanos`");
$sentencia->execute();
$registros=$sentencia->fetchAll(PDO::FETCH_ASSOC);
array_multisort(array_column($registros, 'orden'), SORT_ASC, $registros);




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
</head>
<body>
    

 <table  id="results" class="  table">
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
        
        <tbody class="tbody-2">
            <!-- recibimos los datos e imprimos con un foreach -->
            <?php foreach($registros as $item){?>
                <tr>
                <td><b><?php echo $item["#tiket"];?></b></td>
                <td><?php echo $item["nombre"];?></td>
                <td><?php echo $item["apellido"];?></td>
                <td><?php echo $item["telefono"];?></td>
                <td><?php echo $item["pago"];?></td>
                </tr>
                
                
                <?php }?>
        </tbody>
        
    </table>
    </body>
</html>
<?php 
$html=ob_get_clean();


require_once('./libreria/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$dompdf= new Dompdf(); 

$options= $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper("letter");


$fecha= date("d_m_Y");
$dompdf->render();
$dompdf->stream($fecha."_rifa.pdf", array("Attachment" => false));

?>