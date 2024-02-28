<?php
include("db.php"); 
$url_base="http://localhost/rifa/";
$fecha= date("d/m/Y");
$sentencia=$conexion->prepare("SELECT * FROM `hermanos`");
$sentencia->execute();
$registros=$sentencia->fetchAll(PDO::FETCH_ASSOC);
array_multisort(array_column($registros, 'orden'), SORT_ASC, $registros);



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
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Arvo&display=swap" rel="stylesheet">
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script>
<!-- JQUERY -->
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

</head>

<body>
  <header> 
    
  </header>
  <div class="container">
  <div class="card card-E">
            <div class="card-header">
                    <h2 class="txtTitle">Kingdom <a href="reporte.php" class="btn btn-primary">PDF</a>  <a href="./exel/excel.php" class="btn btn-success">EXCEL</a></h2>
                    <a class="nav-item nav-link" href="<?php echo $url_base;?>">Numeros</a>
                <a class="nav-item nav-link" href="<?php echo $url_base;?>cajita.php">Distribiucion</a>
                <a  class="nav-item nav-link" href="<?php echo $url_base;?>buscador.php">Lista de jugadores</a>
                <div class="fecha"><svg class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <?php echo $fecha;?></div>
                
                
                
                <!-- <button onclick="active()">fercho</button> -->
            </div>
            <script>
                <?php if(isset($_GET["mensaje"])){?>
                Swal.fire({icon:"success", title:"<?php echo $_GET["mensaje"];?>"});
                 <?php }?>
            </script>

            <div id="full-power" class="card-body full-power">
                
                <div class="finish">  
                    <div class=" separacion mb-3">
                        <a href="crear.php?txtID=1"  class="centrar btn btn-success" id='00'>00</a>
                        <a href="crear.php?txtID=2" class="centrar btn btn-success" id='19'>19</a>
                        <a href="crear.php?txtID=3" class="centrar btn btn-success "id='24'>24</a>
                        <a href="crear.php?txtID=4" class="centrar btn btn-success " id='30'>30</a>
                        <a href="crear.php?txtID=5" class="centrar btn btn-success "id='49'>49</a>
                        <a href="crear.php?txtID=6" class="centrar btn btn-info "id="55">55</a>
                        <a href="crear.php?txtID=7" class="centrar btn btn-info "id='69'>69</a>
                        <a href="crear.php?txtID=8" class="centrar btn btn-info "id="76">76</a>
                        <a href="crear.php?txtID=9" class="centrar btn btn-info "id='89'>89</a>
                        <a href="crear.php?txtID=10" class="centrar btn btn-info "id="97">97</a>
                    </div>
                    <div class="separacion mb-3">
                        <a href="crear.php?txtID=11" class="centrar btn btn-success "id='01'>01</a>
                        <a href="crear.php?txtID=12" class="centrar btn btn-success "id="10">10</a>
                        <a href="crear.php?txtID=13" class="centrar btn btn-success "id="28">28</a>
                        <a href="crear.php?txtID=14" class="centrar btn btn-success "id='31'>31</a>
                        <a href="crear.php?txtID=15" class="centrar btn btn-success "id="43">43</a>
                        <a href="crear.php?txtID=16" class="centrar btn btn-info "id='51'>51</a>
                        <a href="crear.php?txtID=17" class="centrar btn btn-info "id='68'>68</a>
                        <a href="crear.php?txtID=18" class="centrar btn btn-info "id="75">75</a>
                        <a href="crear.php?txtID=19" class="centrar btn btn-info "id="82">82</a>
                        <a href="crear.php?txtID=20" class="centrar btn btn-info "id='91'>91</a>
                    </div>
                <div class="separacion mb-3">
                    <a href="crear.php?txtID=21" class="centrar btn btn-success "id='02'>02</a>
                    <a href="crear.php?txtID=22" class="centrar btn btn-success "id='17'>17</a>
                    <a href="crear.php?txtID=23" class="centrar btn btn-success "id='22'>22</a>
                    <a href="crear.php?txtID=24" class="centrar btn btn-success " id='32'>32</a>
                    <a href="crear.php?txtID=25" class="centrar btn btn-success" id='47'>47</a>
                    <a href="crear.php?txtID=26" class="centrar btn btn-info "id='52'>52</a>
                    <a href="crear.php?txtID=27" class="centrar btn btn-info "id='67'>67</a>
                    <a href="crear.php?txtID=28" class="centrar btn btn-info "id='72'>72</a>
                    <a href="crear.php?txtID=29" class="centrar btn btn-info "id="84">84</a>
                    <a href="crear.php?txtID=30" class="centrar btn btn-info "id='92'>92</a>
                </div>
                <div class="separacion mb-3">
                    <a href="crear.php?txtID=31" class="centrar btn btn-success "id='03'>03</a>
                    <a href="crear.php?txtID=32" class="centrar btn btn-success "id='16'>16</a>
                    <a href="crear.php?txtID=33" class="centrar btn btn-success "id='25'>25</a>
                    <a href="crear.php?txtID=34" class="centrar btn btn-success "id="37">37</a>
                    <a href="crear.php?txtID=35" class="centrar btn btn-success "id="46">46</a>
                    <a href="crear.php?txtID=36" class="centrar btn btn-info "id="53">53</a>
                    <a href="crear.php?txtID=37" class="centrar btn btn-info "id="66">66</a>
                    <a href="crear.php?txtID=38" class="centrar btn btn-info "id="73">73</a>
                    <a href="crear.php?txtID=39" class="centrar btn btn-info "id="86">86</a>
                    <a href="crear.php?txtID=40" class="centrar btn btn-info "id="93">93</a>
                </div>
                <div class="separacion mb-3">
                    <a href="crear.php?txtID=41" class="centrar btn btn-success "id='04'>04</a>
                    <a href="crear.php?txtID=42" class="centrar btn btn-success "id='15'>15</a>
                    <a href="crear.php?txtID=43" class="centrar btn btn-success "id='20'>20</a>
                    <a href="crear.php?txtID=44" class="centrar btn btn-success "id='34'>34</a>
                    <a href="crear.php?txtID=45" class="centrar btn btn-success "id="40">40</a>
                    <a href="crear.php?txtID=46" class="centrar btn btn-info "id='54'>54</a>
                    <a href="crear.php?txtID=47" class="centrar btn btn-info "id='65'>65</a>
                    <a href="crear.php?txtID=48" class="centrar btn btn-info "id="79">79</a>
                    <a href="crear.php?txtID=49" class="centrar btn btn-info "id='85'>85</a>
                    <a href="crear.php?txtID=50" class="centrar btn btn-info "id="96">96</a>
                </div>
                <div class="separacion mb-3">
                    <a href="crear.php?txtID=51" class="centrar btn btn-success "id='05'>05</a>
                    <a href="crear.php?txtID=52" class="centrar btn btn-success "id='14'>14</a>
                    <a href="crear.php?txtID=53" class="centrar btn btn-success "id='23'>23</a>
                    <a href="crear.php?txtID=54" class="centrar btn btn-success "id="35">35</a>
                    <a href="crear.php?txtID=55" class="centrar btn btn-success "id="44">44</a>
                    <a href="crear.php?txtID=56" class="centrar btn btn-info "id='50'>50</a>
                    <a href="crear.php?txtID=57" class="centrar btn btn-info "id="60">60</a>
                    <a href="crear.php?txtID=58" class="centrar btn btn-info "id='71'>71</a>
                    <a href="crear.php?txtID=59" class="centrar btn btn-info "id='87'>87</a>
                    <a href="crear.php?txtID=60" class="centrar btn btn-info "id="95">95</a>
                </div>
                <div class="separacion mb-3">
                    <a href="crear.php?txtID=61" class="centrar btn btn-success "id="06">06</a>
                    <a href="crear.php?txtID=62" class="centrar btn btn-success "id="13">13</a>
                    <a href="crear.php?txtID=63" class="centrar btn btn-success "id='21'>21</a>
                    <a href="crear.php?txtID=64" class="centrar btn btn-success "id="36">36</a>
                    <a href="crear.php?txtID=65" class="centrar btn btn-success "id='48'>48</a>
                    <a href="crear.php?txtID=66" class="centrar btn btn-info "id="56">56</a>
                    <a href="crear.php?txtID=67" class="centrar btn btn-info "id="63">63</a>
                    <a href="crear.php?txtID=68" class="centrar btn btn-info "id='70'>70</a>
                    <a href="crear.php?txtID=69" class="centrar btn btn-info "id="83">88</a>
                    <a href="crear.php?txtID=70" class="centrar btn btn-info "id='94'>94</a>
                </div>
                <div class="separacion mb-3">
                    <a href="crear.php?txtID=71" class="centrar btn btn-success "id="07">07</a>
                    <a href="crear.php?txtID=72" class="centrar btn btn-success "id="12">12</a>
                    <a href="crear.php?txtID=73" class="centrar btn btn-success "id="27">27</a>
                    <a href="crear.php?txtID=74" class="centrar btn btn-success "id="33">33</a>
                    <a href="crear.php?txtID=75" class="centrar btn btn-success "id="42">42</a>
                    <a href="crear.php?txtID=76" class="centrar btn btn-info "id="57">57</a>
                    <a href="crear.php?txtID=77" class="centrar btn btn-info "id="62">62</a>
                    <a href="crear.php?txtID=78" class="centrar btn btn-info "id="77">77</a>
                    <a href="crear.php?txtID=79" class="centrar btn btn-info "id='88'>83</a>
                    <a href="crear.php?txtID=80" class="centrar btn btn-info "id='90'>90</a>
                </div>
                <div class="separacion mb-3">
                    <a href="crear.php?txtID=81" class="centrar btn btn-success "id="08">08</a>
                    <a href="crear.php?txtID=82" class="centrar btn btn-success "id="11">11</a>
                    <a href="crear.php?txtID=83" class="centrar btn btn-success "id="26">26</a>
                    <a href="crear.php?txtID=84" class="centrar btn btn-success "id="38">38</a>
                    <a href="crear.php?txtID=85" class="centrar btn btn-success "id="41">41</a>
                    <a href="crear.php?txtID=86" class="centrar btn btn-info "id="58">58</a>
                    <a href="crear.php?txtID=87" class="centrar btn btn-info "id="61">61</a>
                    <a href="crear.php?txtID=88" class="centrar btn btn-info "id="78">78</a>
                    <a href="crear.php?txtID=89" class="centrar btn btn-info "id="81">81</a>
                    <a href="crear.php?txtID=90" class="centrar btn btn-info "id="98">98</a>
                </div>
                <div class="separacion mb-3">
                    <a href="crear.php?txtID=91" class="centrar btn btn-success "id="09">09</a>
                    <a href="crear.php?txtID=92" class="centrar btn btn-success "id='81'>18</a>
                    <a href="crear.php?txtID=93" class="centrar btn btn-success "id="29">29</a>
                    <a href="crear.php?txtID=94" class="centrar btn btn-success "id="39">39</a>
                    <a href="crear.php?txtID=95" class="centrar btn btn-success "id='45'>45</a>
                    <a href="crear.php?txtID=96" class="centrar btn btn-info "id="59">59</a>
                    <a href="crear.php?txtID=97" class="centrar btn btn-info "id="64">64</a>
                    <a href="crear.php?txtID=98" class="centrar btn btn-info "id='74'>74</a>
                    <a href="crear.php?txtID=99" class="centrar btn btn-info "id="80">80</a>
                    <a href="crear.php?txtID=100"class="centrar btn btn-info "id="99">99</a>
                </div>
                
<!-- finish --></div>
<div class="Seccion overflow">
                    <table class="table table-hover table-dark ">
                        <thead class='fixed'>
                            <tr>
                                <th class="thead" scope="col">
                                    <svg class="small" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                </svg>  Tiket 
                                </th>
                                <th class="thead" scope="col">
                                    <svg class="small" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>  Nombre 
                                </th>
                                <th class="thead" scope="col">
                                    <svg class='small' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>  Telefono
                                </th>
                            </tr>
                        </thead >
                        <tbody class="overflow">
                            <!-- vamos a recorer cada registro para inp´rimir sus valores en la tabla -->
                            <?php foreach($registros as $registro){?>
                                <tr>
                                    <th class="thead"> <?php echo $registro["#tiket"];?></th>
                                    <th class="thead"> <?php echo $registro["nombre"];?></th>
                                    <th class="thead"> <?php echo $registro["telefono"];?></th>
                                </tr>
                            <?php };?>
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
  </div>

    

    
<script>
     $(document).ready( function () {
    $('table').DataTable();
} );
</script>
    <?php include("tmplates/pie.php");?>
