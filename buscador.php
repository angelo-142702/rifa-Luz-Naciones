 <?php
// Conectar con la base de datos MySQL
include("./db.php");
$busqueda="";
// Recibir y procesar los datos del formulario
        $query = "SELECT * FROM `hermanos` ";
        $resultado = $conexion->prepare($query);
        $resultado->execute();
        //resivir los datos
        $busqueda=$resultado->fetchAll(PDO::FETCH_ASSOC);
        //ordenamos el arreglo segun el numero de "orden" de la abase de datos
        array_multisort(array_column($busqueda, 'orden'), SORT_ASC, $busqueda);
if (isset($_GET["buscar"])) {
    
        //al recibir el criterio para  buscar lo aadptamos para la sentencia $sql
        $buscar= ((isset($_GET["buscar"])) ? $_GET["buscar"] :"");
        $sql = "SELECT * FROM `hermanos` WHERE `nombre` LIKE '%$buscar%' OR `apellido` LIKE '%$buscar%'";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        $busqueda=$resultado->fetchAll(PDO::FETCH_ASSOC);
        array_multisort(array_column($busqueda, 'orden'), SORT_ASC, $busqueda);
          
}
if (isset($_GET["tikect"])) {
    
        //lo mismo para el criterio de numero de tikect
        $buscar= ((isset($_GET["tikect"])) ? $_GET["tikect"] :"");
        $sql = "SELECT * FROM `hermanos` WHERE `#tiket` LIKE '%$buscar%'";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        $busqueda=$resultado->fetchAll(PDO::FETCH_ASSOC);
        array_multisort(array_column($busqueda, 'orden'), SORT_ASC, $busqueda);
          
}
?>
<?php include("./tmplates/cabecera.php")?>
<div class= "card card-E fex " >
<div class="search fex padding">
    <form method="GET" class="form" action="buscador.php">
<b class='white'>Bucar por nombre:</b>
  <div class="search-box">
    <div class="search-field">
      <input name="buscar" placeholder="escribir nombre" class="input" type="text">
      <div class="search-box-icon">
        <button class="btn-icon-content">
          <i class="search-icon">
            <svg xmlns="://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" fill="#fff"></path></svg>
          </i>
        </button>
      </div>
    </div>
  </div>
</form>
    <form method="GET" class="form" action="buscador.php">
<b class='white'>Buscar por #tikect:</b>

  <div class="search-box">
    <div class="search-field">
      <input name="tikect" placeholder="escribir tikect" class="input" type="text">
      <div class="search-box-icon">
        <button class="btn-icon-content">
          <i class="search-icon">
            <svg xmlns="://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" fill="#fff"></path></svg>
          </i>
        </button>
      </div>
    </div>
  </div>
</form>
</div>
 
    </div>
<div class="resuls-container card card-E overflow"  id="resultsContainer">
    <table  id="results" class="table table-dark table-hover overflow">
        <thead>
            <td>
                <svg class="small" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                </svg>Tikect
            </td>
            <td>
                <svg class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>Nombre
            </td>
            <td>
                <svg class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>apellido
            </td>
            <td>
                <svg class='small' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>telefono
            </td>
            <td>
                <svg class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                </svg>Pago
            </td>
            <td>
                <svg class="small" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                </svg>Actions
            </td>
        </thead>
        <div class="cuerpo">
        <tbody class="tbody-2">
            <!-- recibimos los datos e imprimos con un foreach -->
            <?php foreach($busqueda as $item){?>
                <tr>
                <td><b><?php echo $item["#tiket"];?></b></td>
                <td><?php echo $item["nombre"];?></td>
                <td><?php echo $item["apellido"];?></td>
                <td><?php echo $item["telefono"];?></td>
                <td><b style="<?php ($item["pago"]=="realizado")?"color:green":""?>"><?php echo $item["pago"];?></b></td>
                
                <td>
                    <a href="crear.php?txtID=<?php echo $item["ID"];?>" class="btn btn-secondary"> <svg class="small" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                     </svg>
                  </a>
                </td>
                </tr>
                <?php }?>
        </tbody>
        </div>
    </table>
</div>
</div>
</div>
<?php include("./tmplates/pie.php")?>