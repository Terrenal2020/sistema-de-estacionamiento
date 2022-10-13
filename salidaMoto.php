<?php

      include("conexion.php");
      $id=(int)"$_REQUEST[id]";
      
$sql1="SELECT dinero from espacios where id_espacios='$b'";
$result1 = mysqli_query($conexion, $sql1);
$fila1 = mysqli_fetch_assoc($result1);
$dinero1=$fila1['dinero'];

$sql2="SELECT totalOcupaciones from espacios where id_espacios='$b'";
$result2 = mysqli_query($conexion, $sql2);
$fila2 = mysqli_fetch_assoc($result2);

$dinero2=$fila2['totalOcupaciones'];
$ocupacion=$dinero2+1;
$pagos=$dinero1+$pago;
mysqli_query($conexion,"UPDATE espacios SET totalOcupaciones='$ocupacion'  WHERE 	id_espacios='$b'");
mysqli_query($conexion,"UPDATE espacios SET dinero='$pagos'  WHERE 	id_espacios='$b'");

mysqli_query($conexion, "INSERT INTO  espacioshistorial(id_espacios,totalOcupaciones,dinero)
VALUES ('$b',1,'$pagos')");

    
      mysqli_query($conexion,"UPDATE espaciosmotos SET estado='Disponible'  WHERE id_espacios='$id'");
      

   echo  "<SCRIPT >
alert('Auto entregado');
document.location=('registroEstacionamiento.php');
</SCRIPT>"; 
      
    ?>