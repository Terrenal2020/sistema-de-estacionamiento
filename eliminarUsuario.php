<?php
                    include("conexion.php");
                        $id=(int)"$_REQUEST[id]";
                        mysqli_query($conexion,"DELETE FROM usuarios WHERE id_Usuario='$id'");
                        mysqli_close($conexion);
                        echo  "<SCRIPT >
                        alert('Usuario Eliminado exitosamente');
                        document.location=('GestionUsuarios.php');
                        </SCRIPT>";
                ?>