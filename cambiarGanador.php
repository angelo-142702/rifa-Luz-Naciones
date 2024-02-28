<?php 
//importamos la base de datos y esta en la variable $conexion
include("db.php");
//al resivir un envio get vamos a tomar el ID y luego seleccionar ese elemento y sus respectivos valores 
if($_GET){
   $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
   $sql="SELECT * FROM `ganadores` WHERE `ganadores`.`ID`=:id";
   $sentencia=$conexion->prepare($sql);
   $sentencia->bindParam(":id",$txtID);
   $sentencia->execute();
   $ganadores=$sentencia->fetch(PDO::FETCH_LAZY);
   $txtID=$ganadores["ID"]; 
   $nombre=$ganadores["nombre"];
   $sector=$ganadores["sector"]; 
}
//al enviar el formulario estremos cambiando los registros en la base de datos
if($_POST){
    $txtID=(isset($_POST["id"]))?$_POST["id"]:"";
    $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
    $sector =(isset($_POST["sector"]))?$_POST["sector"]:"";
    $sentencia=$conexion->prepare("UPDATE `ganadores` SET `nombre`=:nombre, `sector`=:sector WHERE `ganadores`.`ID`=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":sector",$sector);
    $sentencia->execute();
    header("location: cajita.php");    
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
        <form class="form" action="cambiarGanador.php" method="post">
        <div class="mb-3">
            <label class="form-label" for="id" class="form-label">identificador:</label>
            <input readonly name="id" class="form-control" value="<?php echo $txtID;?>" type="nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="nombre" class="form-label">nombre</label>
            <input class="form-control" value="<?php echo $nombre;?>" name="nombre" type="text" class="form-control">
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