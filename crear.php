<?php 
//importamos la base de datos y esta en la variable $conexion
include("db.php");
//al resivir un envio get vamos a tomar el ID y luego seleccionar ese elemento y sus respectivos valores 
if($_GET){
   $txtID=(isset($_GET["txtID"])?$_GET["txtID"]:"");
   $sql="SELECT * FROM `hermanos`WHERE `hermanos`.`ID`=:id";
   $sentencia=$conexion->prepare($sql);
   $sentencia->bindParam(":id",$txtID);
   $sentencia->execute();
   $jugador=$sentencia->fetch(PDO::FETCH_LAZY);
   $pago=$jugador["pagado"];
   $ID=$jugador["ID"];
   $numero=$jugador["#tiket"];
   $nombre=$jugador["nombre"];
   $telefono=$jugador["telefono"];
   $apellido=$jugador["apellido"];
   $orden=$jugador["orden"];
}
//al enviar el formulario estremos cambiando los registros en la base de datos
if($_POST){
    $txtID=(isset($_POST["id"])?$_POST["id"]:"");
    $pago=(isset($_POST["pago"])?$_POST["pago"]:"");
    $apellido=(isset($_POST["apellido"])?$_POST["apellido"]:"");
    $numero=(isset($_POST["numero"])?$_POST["numero"]:"");
    $nombre=(isset($_POST["nombre"])?$_POST["nombre"]:"");
    $telefono=(isset($_POST["telefono"])?$_POST["telefono"]:"");
    $sentencia=$conexion->prepare("UPDATE `hermanos` SET `ID`=:id, `#tiket`=:numero, `nombre`=:nombre,`apellido`=:apellido ,`telefono`=:telefono, `pago`=:pago WHERE `hermanos`.`ID`=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":numero",$numero);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":apellido",$apellido);
    $sentencia->bindParam(":telefono",$telefono);
    $sentencia->bindParam(":pago",$pago);
    $sentencia->execute();
    $mensaje="se actualizó el regidtro";
    header("location: index.php?mensaje=".$mensaje);    
}
?>
<?php 
include("tmplates/cabecera.php");?>
<br>
<div class="card noflex">
    <div class="card-header negro">
        ingresa los datos de tiket <?php echo $numero ;?>
    </div>
    <div class="card-body noflex" id="negro">
        <form class="form" action="crear.php" method="post">
        <div style="" class="mb-3">
            <label  class="form-label" for="id" class="form-label">identificador:</label>
            <input readonly name="id" class="form-control" value="<?php echo $txtID;?>" type="nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="numero" class="form-label">numero de rifa:</label>
            <input readonly  class="form-control" value="<?php echo $numero;?>" name="numero" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="nombre" class="form-label">nombre</label>
            <input class="form-control" value="<?php echo $nombre;?>" name="nombre" type="text" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="apellido" class="form-label">apellido</label>
            <input class="form-control" value="<?php echo $apellido;?>" name="apellido" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="telefono" class="form-label">telefono</label>
            <input class="form-control" value="<?php echo $telefono;?>" name="telefono" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label" for="pago" class="form-label">cobro del tikect:</label>
            <b style=" color: green">realizado</b><input style="margin: 0px 10px; witdh:30px; heigth:30px" <?php ($pago =="realizado")?"checked":"";?> class="" value="realizado" name="pago" type="radio" class="">
            <b style="color: orange witdh:30px heigth:30px">nada</b><input <?php ($pago =="en espera")?"checked":"";?> class="" value="en espera" name="pago" type="radio" class="">
        </div>
        <button class="btn btn-success">actulizar</button>
        <a href="index.php" class="btn btn-danger">cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("tmplates/pie.php");?>