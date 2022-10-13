<?php

      include("conexion.php");
      $id=(int)"$_REQUEST[numero]";
      $estado="$_REQUEST[estado]";
      $placas="$_REQUEST[placas]";
      $lavar="$_REQUEST[lavar]";
      $quey=  mysqli_query($conexion,"SELECT * FROM motos WHERE placas='$placas'");
      $nr=mysqli_num_rows($quey);
      if($nr==1){
      foreach ($conexion->query("SELECT * FROM motos WHERE placas='$placas'") as $row){
        $a=$row['marca'];
        $b=$row['modelo'];
        $c=$row['placas'];
        $d=$row['conductor'];
        $e=$row['id'];
       
    }

      mysqli_query($conexion, "INSERT INTO ocuparlugar(numEspacio,numAuto,marca,modelo,	placas,	conductor,lavado)
       VALUES ('$id','$e','$a','$b','$c','$d','$lavar')");
      
      mysqli_query($conexion,"UPDATE espaciosmotos SET estado='$estado'  WHERE 	id_espacios='$id'");
      mysqli_query($conexion,"UPDATE espaciosmotos SET id_Auto='$e'  WHERE 	id_espacios='$id'");
      mysqli_close($conexion);
      
    echo  "<SCRIPT >
alert('Resguardo de exitosamente');
document.location=('registroEstacionamiento.php');
</SCRIPT>"; 
}else{
    echo "<script> alert('La moto no esta asociado a ningunas placas'); window.location='registroEstacionamiento.php'</script>";
}
      
    ?>