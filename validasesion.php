<?php
                        include("conexion.php");
                            $nombre="$_REQUEST[user]";
                            $pass="$_REQUEST[pass]";
                            if(isset($_POST['btnIngresar'])){
                             $quey=  mysqli_query($conexion,"SELECT * FROM usuarios WHERE nombre='$nombre' AND pass='$pass'");
                                $nr=mysqli_num_rows($quey);
                              
                                if($nr==1){
            
                                        session_start();
                                        $_SESSION['usuario']=$nombre;
                                        foreach ($conexion->query("SELECT * FROM usuarios WHERE nombre='$nombre' AND pass='$pass'") as $row){
                                            $favfood = $row['tipo'];
                                            switch ($favfood) {
                                                case "Cajero":
                                                    echo "<script> alert('Bienvenido $nombre'); window.location='menuCajero.php'</script>"; 
                                                break;
                                                case "Administrador":
                                                    echo "<script> alert('Bienvenido $nombre'); window.location='administrador.php'</script>"; 
                                                break;
                                                case "Valet":
                                                    echo "<script> alert('Bienvenido $nombre'); window.location='menuValet.php'</script>"; 
                                                break;
                                                case "Conductor":
                                                    echo "<script> alert('Bienvenido $nombre'); window.location='menuConductor.php'</script>"; 
                                                break;
                                            }
                                        }
                                }
                                else{
                                    echo "<script> alert('El usuario no existe'); window.location='index.php'</script>";
                                }

                             

                                
                              
                            }
                            mysqli_close($conexion);
                                ?>