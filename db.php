<?php 
$server="localhost";
$db="rifa";
$usuario="root";
$contraseña="";
//esta es la base de datos 
try {
$conexion = new PDO("mysql:host=$server;dbname=$db",$usuario,$contraseña);

} catch (Exception $error) {
    echo $error->getMessage();
}
