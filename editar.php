<?php 
//importamos la base de datos y esta en la variable $conexion
include("db.php");
//al resivir un envio get vamos a tomar el ID y luego seleccionar ese elemento y sus respectivos valores 
if($_GET){
   $txtID=(isset($_GET["txtID"])?$_GET["txtID"]:"");

   $sql="SELECT * FROM `encargados`WHERE `encargados`.`ID`=:id";
   $sentencia=$conexion->prepare($sql);
   $sentencia->bindParam(":id",$txtID);
   $sentencia->execute();
   $encargado=$sentencia->fetch(PDO::FETCH_LAZY);
   $txtID=$encargado["ID"]; 
   $nombre=$encargado["nombre"];
   $sector=$encargado["sector"]; 
   $img=$encargado["img"];

   

}
//al enviar el formulario estremos cambiando los registros en la base de datos
if($_POST){
    $txtID=(isset($_POST["id"])?$_POST["id"]:"");
    $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
    $sector =(isset($_POST["sector"])?$_POST["sector"]:"");
    $sentencia=$conexion->prepare("UPDATE `encargados` SET `nombre`=:nombre, `sector`=:sector WHERE `encargados`.`ID`=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":sector",$sector);
    $sentencia->execute();

   //imagen 
    if($_FILES["imagen"]["name"] !== ""){
    $imagen = (isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
     $fecha = new DateTime();
     $nombre_archivo_imagen = ($imagen !== "")?$fecha->getTimestamp()."_".$imagen: "";
     $temp_name_imagen = $_FILES["imagen"]["tmp_name"];
     move_uploaded_file($temp_name_imagen, "./encargados/".$nombre_archivo_imagen);
     $sql="SELECT `img` FROM `encargados` WHERE `encargados`.`ID` = :id ";
     $sentencia= $conexion->prepare($sql);
     $sentencia->bindParam(":id", $txtID);
     $sentencia->execute();
     $fotos = $sentencia->fetch(PDO::FETCH_LAZY);

     if(isset($fotos["img"])){
        if(file_exists("./encargados/".$fotos["img"])){
            unlink("./encargados/".$fotos["img"]);
            $mensaje="registro actualizado";
            header("location: cajita.php?mensaje=".$mensaje);
        }

     }
     $ejec=$conexion->prepare("UPDATE `encargados` SET `img`=:imagen WHERE `encargados`.`ID`=:id");
     $ejec->bindParam(":id", $txtID);
     $ejec->bindParam(":imagen", $nombre_archivo_imagen);
     $ejec->execute();
    }
    $mensaje="se actualizó el registro";
    header("location: cajita.php?mensaje=".$mensaje);    
    
}
?>
<?php 
include("tmplates/cabecera.php");?>
<br>
<div class="card noflex">
    <div class="card-header negro">
        ingresa los datos de tiket 
    </div>
    <div class="card-body noflex" id="negro">
        <form class="form" enctype="multipart/form-data" action="editar.php" method="post">
        <div class="mb-3">
            <label class="form-label" for="id" class="form-label">identificador:</label>
            <input readonly name="id" class="form-control" value="<?php echo $txtID;?>" type="nombre" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="nombre" class="form-label">nombre</label>
            <input class="form-control" value="<?php echo $nombre;?>" name="nombre" type="text" class="form-control">

        </div>
        <div class="mb-3">
                <label class="form-label" for="imagen">Imagen:</label>
                <img width="100px" height="50px" src="./encargados/<?php echo $img;?>" alt="">

                <input class="form-control" type="file" name="imagen" id="imagen">
            </div>
        <div class="mb-3">
            <label class="form-label" for="sector" class="form-label">sector</label>
            <input class="form-control" value="<?php echo $sector;?>" name="sector" type="text" class="form-control">
        </div>
        <br>
        
        <button class="btn btn-success" type="submit">actulizar</button>
        <a href="cajita.php" class="btn btn-danger">cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("tmplates/pie.php");?>