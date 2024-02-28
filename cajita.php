<?php 
    
    include("./db.php");
    $sentencia=$conexion->prepare("SELECT * FROM `encargados`");
    $sentencia->execute();
    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    if (isset($_GET["change"])) {
        $newResultados = $resultados;
        $insertar = end($newResultados);
        array_pop($newResultados);
        array_unshift($newResultados, $insertar);
        
        for($i=0 ; $i < 10 ; $i++) { 
            $txtID = $i+1;
            $nombre = $newResultados[$i]["nombre"];
            $sector = $newResultados[$i]["sector"];
            $imagen = $newResultados[$i]["img"];
            print_r( $nombre." ".$txtID." / ");
            $sentencia=$conexion->prepare("UPDATE `encargados` SET `img`=:imagen,`nombre`=:nombre, `sector`=:sector WHERE `encargados`.`ID`=:id");        
            $sentencia->bindParam(":id",$txtID);
            $sentencia->bindParam(":nombre",$nombre);
            $sentencia->bindParam(":sector",$sector);
            $sentencia->bindParam(":imagen",$imagen);
            $sentencia->execute();
          }
            header("location: cajita.php?mensaje=otro sorteo exitoso");
    }
    $sentencia=$conexion->prepare("SELECT * FROM `ganadores`");
    $sentencia->execute();
    $ganadores = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
    
?>

<?php include("./tmplates/cabecera.php");?>

<br>
<div class=" ">
    <div class="card-body">
        <div id="fe"  class="grid-c">
                <div class="seccion card-E l flex">
                    <div class="encargado l m-l">
                        <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[0]["ID"];?>"><b style="color: blue">(1) </b><?php echo $resultados[0]["nombre"];?></a>
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[0]['img'];?>" alt="">
                    <div class="capsula"><a href="cambiarGanador.php?txtID=1"  class="centrar btn btn-success" id='00'>Apadrinado:🏆<b><?php echo $ganadores[0]["nombre"];?></b> </a></div>
                    <div class=" separacion ">
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
                    <a class="btn btn-success" href="./exel/grupo.php?txtID=1">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                    <a href="./tikeras/cars.php?txtID=1" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                    </a>
                </div>
                <br>
                <div class="seccion card-E l flex card-x">
                    <div class="encargado l m-l">
                        <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[1]["ID"];?>"><b style="color: blue">(2) </b><?php echo $resultados[1]["nombre"];?></a>
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[1]['img'];?>" alt="">

                    <div class="capsula"><a href="cambiarGanador.php?txtID=2"  class="centrar btn btn-success" id='00'>Apadrinado:🏆 <b><?php echo $ganadores[1]["nombre"];?></b></a></div>
                    
                    <div class="separacion ">
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
                    <a class="btn btn-success" href="./exel/grupo.php?txtID=2">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                    <a href="./tikeras/cars2.php?txtID=2" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                    </a>
                </div>
                <br>
                <div class="seccion card-E l flex">
                    <div class="encargado l m-l">
                    <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[2]["ID"];?>"><b style="color: blue">(3) </b><?php echo $resultados[2]["nombre"];?></a>    
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[2]['img'];?>" alt="">

                    <div class="capsula"><a href="cambiarGanador.php?txtID=3"  class="centrar btn btn-success" id='00'>Apadrinado:🏆 <b><?php echo $ganadores[2]["nombre"];?></b></a></div>

                     <div class="separacion ">
                     <a href="crear.php?txtID=21" class="centrar btn btn-success "id='02'>02</a>
                    <a href="crear.php?txtID=22" class="centrar btn btn-success "id='17'>17</a>
                    <a href="crear.php?txtID=23" class="centrar btn btn-success "id='22'>22</a>
                    <a href="crear.php?txtID=24" class="centrar btn btn-success "id='32'>32</a>
                    <a href="crear.php?txtID=25" class="centrar btn btn-success"id='47'>47</a>
                    <a href="crear.php?txtID=26" class="centrar btn btn-info "id='52'>52</a>
                    <a href="crear.php?txtID=27" class="centrar btn btn-info "id='67'>67</a>
                    <a href="crear.php?txtID=28" class="centrar btn btn-info "id='72'>72</a>
                    <a href="crear.php?txtID=29" class="centrar btn btn-info "id="84">84</a>
                    <a href="crear.php?txtID=30" class="centrar btn btn-info "id='92'>92</a>
                    </div>
                    <a class="btn btn-success" href="./exel/grupo.php?txtID=3">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                <a href="./tikeras/cars3.php?txtID=3" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                </a>        
                </div>
                <br>
                <div class="seccion card-E l flex">
                    <div class="encargado l m-l">
                    <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[3]["ID"];?>"><b style="color: blue">(4) </b><?php echo $resultados[3]["nombre"];?></a>    
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[3]['img'];?>" alt="">

                    <div class="capsula"><a href="cambiarGanador.php?txtID=4"  class="centrar btn btn-success" id='00'>Apadrinado:🏆 <b><?php echo $ganadores[3]["nombre"];?></b></a></div>

                     <div class="separacion ">
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
                <a class="btn btn-success" href="./exel/grupo.php?txtID=4">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                <a href="./tikeras/cars4.php?txtID=4" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                </a>        
                </div>
                <br>
                <div class="seccion card-E l flex">
                    <div class="encargado l m-l">
                    <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[4]["ID"];?>"><b style="color: blue">(5) </b><?php echo $resultados[4]["nombre"];?></a>    
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[4]['img'];?>" alt="">

                    <div class="capsula"><a href="cambiarGanador.php?txtID=5"  class="centrar btn btn-success" id='00'>Apadrinado:🏆 <b><?php echo $ganadores[4]["nombre"];?></b></a></div>

                     <div class="separacion ">
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
                <a class="btn btn-success" href="./exel/grupo.php?txtID=5">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                <a href="./tikeras/cars5.php?txtID=5" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                </a>        
                </div>
                <br>
                <div class="seccion card-E l flex">
                    <div class="encargado l m-l">
                    <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[5]["ID"];?>"><b style="color: blue">(6) </b><?php echo $resultados[5]["nombre"];?></a>    
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[5]['img'];?>" alt="">

                    <div class="capsula"><a href="cambiarGanador.php?txtID=6"  class="centrar btn btn-success" id='00'>Apadrinado:🏆 <b><?php echo $ganadores[5]["nombre"];?></b></a></div>

                    <div class="separacion ">
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
                <a class="btn btn-success" href="./exel/grupo.php?txtID=6">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                <a href="./tikeras/cars6.php?txtID=6" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                </a>        
                </div>
                <br>
                <div class="seccion card-E l flex">
                    <div class="encargado l m-l">
                    <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[6]["ID"];?>"><b style="color: blue">(7) </b><?php echo $resultados[6]["nombre"];?></a>    
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[6]['img'];?>" alt="">

                    <div class="capsula"><a href="cambiarGanador.php?txtID=7"  class="centrar btn btn-success" id='00'>Apadrinado:🏆 <b><?php echo $ganadores[6]["nombre"];?></b></a></div>

                    <div class="separacion ">
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
                <a class="btn btn-success" href="./exel/grupo.php?txtID=7">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                <a href="./tikeras/cars7.php?txtID=7" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                </a>        
                </div>
                <br>
                <div class="seccion card-E l flex">
                    <div class="encargado l m-l">
                    <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[7]["ID"];?>"><b style="color: blue">(8) </b><?php echo $resultados[7]["nombre"];?></a>    
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[7]['img'];?>" alt="">

                    <div class="capsula"><a href="cambiarGanador.php?txtID=8"  class="centrar btn btn-success" id='00'>Apadrinado:🏆 <b><?php echo $ganadores[7]["nombre"];?></b></a></div>

                    <div class="separacion ">
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
                <a class="btn btn-success" href="./exel/grupo.php?txtID=8">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                <a href="./tikeras/cars8.php?txtID=8" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                </a>        
                </div>
                <br>
                <div class="seccion card-E l flex">
                    <div class="encargado l m-l">
                    <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[8]["ID"];?>"><b style="color: blue">(9) </b><?php echo $resultados[8]["nombre"];?></a>    
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[8]['img'];?>" alt="">

                    <div class="capsula"><a href="cambiarGanador.php?txtID=9"  class="centrar btn btn-success" id='00'>Apadrinado:🏆 <b><?php echo $ganadores[8]["nombre"];?></b></a></div>
                    <div class="separacion ">
                    
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
                <a class="btn btn-success" href="./exel/grupo.php?txtID=9">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                <a href="./tikeras/cars9.php?txtID=9" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                </a>        
                </div>
                <br>
                <div class="seccion card-E l flex">
                    <div class="encargado l m-l">
                    <a class="btn btn-info" href="editar.php?txtID=<?php echo $resultados[9]["ID"];?>"><b style="color: blue">(10) </b><?php echo $resultados[9]["nombre"];?></a>    
                    </div>
                    <img  width="50px" height="50px" src="./encargados/<?php echo $resultados[9]['img'];?>" alt="">

                    <div class="capsula"><a href="cambiarGanador.php?txtID=10"  class="centrar btn btn-success" id='00'>Apadrinado:🏆 <b><?php echo $ganadores[9]["nombre"];?></b></a></div>

                    
                    <div class="separacion ">
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
                <a class="btn btn-success" href="./exel/grupo.php?txtID=10">
                        <svg  class="small"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                        </svg>
                    </a>
                <a href="./tikeras/cars10.php?txtID=10" class="btn btn-danger rigth"> 
                        <svg class="small " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                </a>        
                </div>
                
                
        </div>
    </div>
</div>
<br><br><br>

<div class="contenedor">
    <a href="borrado.php" class="btn btn-danger">borrar todos los registros cuidado borrara tos los registros</a>
    <a href="cajita.php?change=1" class="btn btn-primary">rotación de turnos</a>
</div>

<?php include("./tmplates/pie.php");?>