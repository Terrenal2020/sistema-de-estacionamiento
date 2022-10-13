<?php
 include("conexion.php");
session_start();
error_reporting(0);
$varSesion=$_SESSION['usuario'];

if($varSesion==null || $varSesion==''){
    echo "Acceso denegado <br> <a href='index.php'>Regresar</a>";
    die();
}
$id=(int)"$_REQUEST[id]";



echo '<pre>';

$archivo='datos.txt';
if(file_exists($archivo)){
$guardar=fopen('datos.txt','a+');
$todo = fread($guardar, filesize('datos.txt'));
$lineas = explode("\n",$todo);
$bandera=0;
for($i=0;$i<count($lineas);$i++){
    $palabras= explode(' ',$lineas[$i]);
    if ($id==$palabras[0]) {
        echo  "<SCRIPT >
    alert('Id registro repetido');
    document.location=('reservaConductor.php');
    </SCRIPT>";
        $bandera=1;
        break;
    }else{
        $bandera=0;
    }
}
if ($bandera==0) {
    fputs($guardar,$id."\n");
    fputs($guardar,$varSesion."\n");
    fputs($guardar,"Reservado"."\n");
   
    fclose($guardar);
echo  "<SCRIPT >
alert('Archivo guardado exitosamente');
document.location=('reservaConductor.php');
</SCRIPT>";
}
}else{
    $guardar=fopen('datos.txt','a+');
    fputs($guardar,$id."\n");
    fputs($guardar,$varSesion."\n");
    fputs($guardar,"Reservado"."\n");
    fclose($guardar);
 echo  "<SCRIPT >
alert('Archivo guardado exitosamente');
document.location=('reservaConductor.php');
</SCRIPT>";
    
}

mysqli_query($conexion,"UPDATE espacios SET estado='Reservado'  WHERE 	id_espacios='$id'");
mysqli_close($conexion);

//echo "Datos guardados";

//echo  "<SCRIPT >
//alert('Archivo guardado exitosamente');
//document.location=('ejemplo4.html');
//</SCRIPT>";
?>
