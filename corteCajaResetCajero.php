<?php

      include("conexion.php");
    
      mysqli_query($conexion,"UPDATE espacios SET totalOcupaciones='0',dinero='0' WHERE dinero>'0'");
      
    echo  "<SCRIPT >
alert('Corte de Caja exitosamente');
document.location=('corteHistorialCajero.php');
</SCRIPT>"; 
      
    ?>