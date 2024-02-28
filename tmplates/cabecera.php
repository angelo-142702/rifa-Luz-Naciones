<?php 
$url_base="http://localhost/rifa/";

$fecha= date("d/m/Y");
?>

<!doctype html>
<html lang="en">

<head>
  <title>LuzParaLasNaciones</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="fondo.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
<!-- JQUERY -->
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

</head>

<body>
  <header> 
    <!-- place navbar here -->
    <nav class="navbar navbar-expand card-E white">
        <div class="nav navbar-nav  white">
            <a class="nav-item nav-link active white" href="<?php echo $url_base;?>" aria-current="page"><b class='white'>Administrador</b> <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link white" href="<?php echo $url_base;?>">Numeros</a>
            <a class="nav-item nav-link white" href="<?php echo $url_base;?>cajita.php">distribiucion</a>
            <a  class="nav-item nav-link white" href="<?php echo $url_base;?>buscador.php">lista de jugadores</a>
        </div>
        <div class="fecha"><svg class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
</svg>
<?php echo $fecha;?></div>
    </nav>
  </header>
  <br>
  <div class="container">
    <script>
    <?php if(isset($_GET["mensaje"])){ ?>
      Swal.fire({icon:"success", title:"<?php echo $_GET["mensaje"];?>"});
        <?php }?>
    </script>
   