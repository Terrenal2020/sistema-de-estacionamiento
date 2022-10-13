<?php
                    include("conexion.php");
                        $id=(int)"$_REQUEST[id]";
                        mysqli_query($conexion,"DELETE FROM autos WHERE id='$id'");
                        mysqli_close($conexion);
                        echo  "<SCRIPT >
                        alert('Auto Eliminado exitosamente');
                        document.location=('gestionVehiculos.php');
                        </SCRIPT>";
                ?>