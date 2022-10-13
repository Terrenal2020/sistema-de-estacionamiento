<?php
                    include("conexion.php");
                    $id=(int)"$_REQUEST[codigo]";
                    $marca="$_REQUEST[marca]";
                    $modelo="$_REQUEST[modelo]";
                    $placas="$_REQUEST[placas]";
                    $conductor="$_REQUEST[conductor]";
                        mysqli_query($conexion,"UPDATE autos SET marca='$marca'  WHERE id='$id'");
                        mysqli_query($conexion,"UPDATE autos SET modelo='$modelo'  WHERE id='$id'");
                        mysqli_query($conexion,"UPDATE autos SET placas='$placas'  WHERE id='$id'");
                        mysqli_query($conexion,"UPDATE autos SET conductor='$conductor'  WHERE id='$id'");
                      
                        mysqli_close($conexion);
                        echo  "<SCRIPT >
                        alert('Auto Modificado exitosamente');
                     document.location=('gestionVehiculos.php');
                     </SCRIPT>";
                ?>
