<?php
      include("conexion.php");
      $codigo="$_REQUEST[pass]";
      $nombre="$_REQUEST[nombre]";
      $nombreC="$_REQUEST[nombreC]";
      $edad="$_REQUEST[edad]";
      $correo="$_REQUEST[correo]";
      $sexo="$_REQUEST[sexo]";
      $telefono="$_REQUEST[telefono]";
      $tipo="$_REQUEST[tipoUser]";
  
      // Si la imagen se cargo de forma correcta, entonces insertas en tu base de datos.
      $quey=  mysqli_query($conexion,"SELECT*FROM usuarios WHERE correo='$correo'");
     $nr=mysqli_num_rows($quey);
     if($nr>0){
      echo  "<SCRIPT >
      alert('El usuario No puede ser creado,favor de intentar con otro correo');
      document.location=('index.php');
      </SCRIPT>"; 
     }else{
     
    mysqli_query($conexion, "INSERT INTO usuarios(nombreC,nombre,pass,correo,telefono,edad,sexo,tipo) VALUES ('$nombreC','$nombre','$codigo','$correo','$telefono','$edad','$sexo','$tipo')");
    mysqli_close($conexion);
    //echo $codigo;
      
    echo  "<SCRIPT >
alert('Usuario guardado exitosamente');
document.location=('index.php');
</SCRIPT>"; 
     }
    ?>