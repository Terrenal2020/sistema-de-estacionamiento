<?php

      include("conexion.php");
      $marca="$_REQUEST[marca]";
      $modelo="$_REQUEST[modelo]";
      $placas="$_REQUEST[placas]";
      $conductor="$_REQUEST[conductor]";
      $dir_subida = 'imagenes/';
      $imagenRuta = $dir_subida . basename($_FILES['imagen']['name']);
      $imagenNombre = $_FILES['imagen']['name'];
      $imagenValida = false;
      
      if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagenRuta)) {
           $imagenValida = true;
      }
      
      // Si la imagen se cargo de forma correcta, entonces insertas en tu base de datos.
      
      if($imagenValida) {
    mysqli_query($conexion, "INSERT INTO autos(marca,modelo,placas,conductor,foto) VALUES ('$marca','$modelo','$placas','$conductor','$imagenNombre')");
    mysqli_close($conexion);
    //echo $codigo;
      
    echo  "<SCRIPT >
alert('Auto guardado exitosamente');
document.location=('registroEstacionamiento.php');
</SCRIPT>"; 
      }
    ?>