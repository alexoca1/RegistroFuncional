<?php
//Parametros de conexion
$host="localhost";
$user="root";
$db="registrophp";

//Variables de conexion
$connection=mysqli_connect($host,$user,"",$db);
//Mensaje de erro de conexion 
$err="Ha habido un error con la conexion a la base de datos";

if($connection !=true){
    mysqli_error($connection);

}
?>
