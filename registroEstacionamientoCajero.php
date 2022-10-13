<?php
session_start();
error_reporting(0);
$varSesion=$_SESSION['usuario'];

if($varSesion==null || $varSesion==''){
    echo "Acceso denegado <br> <a href='index.php'>Regresar</a>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8700b1bcd8.js" crossorigin="anonymous"></script>

    <title>Administrador</title>
</head>
<style>
 table{
        width: 50%;
        
    }
    td,th{
        font-size: 90%;
        width: 10%;
        color:white;
        border: white 5px solid;
         
    }

.conteiner {

    text-align: left;
    overflow: hidden;
}


.form {
    border: 2px solid;
    border-radius: 25px;
    text-align: center;
    margin: 3em;
    margin-top: 5px;
    padding: 1em;
    float: left;
}

.datos {
    border: 2px solid rgba(0, 81, 255, 0.658);
    border-radius: 25px;
    text-align: center;
    margin: 0em;
    margin-top: 5px;
    padding: 1em;
    float: left;
}

.datos1 {
    border: 2px solid rgba(0, 81, 255, 0.658);
    border-radius: 25px;
    text-align: center;
    margin: 0em;
    margin-top: 5px;
    padding: 1em;
    float: left;
}

h1 {
    color: white;
    background-color: blue;
    font-size: 80px;
    border-radius: 15px;
    padding: 10px;
    margin: 50px;
    box-shadow: 3px 3px red, 5px 0 1em rgb(0, 0, 0);
}
</style>

<body>

    <h1>Sistema de Estacionamiento "Tecni Wash"</h1>
    <div class="salir">
            
        <a href="cerrar.php" style="text-decoration: none; color: #12CE3F;"><h4 style="text-align: right; margin-right: 20px;"><span><i class="fas fa-power-off"></i></span><b>  Salir</b></h4></a>
        </div>
        <div>
            <?php echo "<h5 style='text-align: right; margin-right: 20px;'> <b>Usuario: ".$_SESSION['usuario']."</b></h5>"  ?>
        </div>
        <div>
    <div>
        <ul class="nav nav-tabs card-header-tabs" style="background-color: #4254b5;">

            <li class="nav-item">
                <a class="nav-link text-white " href="menuCajero.php">Inicio</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="registroVehiculoCajero.php">Registro de vehiculos </a>
            </li>
        
            <li class="nav-item ">
                <a class="nav-link  active disabled" href="registroEstacionamientoCajero.php">Disponibilidad de Espacios </a>

            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="corteHistorialCajero.php">Corte de Caja </a>

            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="">Gestion de Conductores </a>

            </li>
        
            <li class="nav-item">
                <a class="nav-link text-white" href="datosUsuarioCajero.php">Datos del usuario</a>
            </li>

           </ul>
    </div>
</div>
<br>
<div align="center">
<h3>Lugares Disponibles</h3>
<table class="table table-striped" border="3">
                      
                        <?php
                          include("conexion.php");
                         foreach ($conexion->query('SELECT * from espacios') as $row){
                            $id=$row['id_espacios'];
                            $estado=$row['estado'];
                            $idAuto=$row['id_Auto'];
                            $contOcupados=0;
                          
                           ?>
                           
                            <?php if($id<=20 and $estado=="Disponible") {?>
                                <?php if($id==9 or $id==17 ) {?>
                                    
                                    <tr>
                                <?php }?>
                                <td bgcolor="#224BF0 " ><img src="imagenes/car-Libre.svg" alt="" width="30" ><br><?php  echo "Num: ". $id."<br> Estado: ".$estado."<br>" ?>
                                <div align="center">
                                <a href=recepcionCajero.php?id=<?php echo $id?>><button type=Button class='btn btn-outline-warning' title="Liberar lugar">
                                <span><i class='fas fa-edit'></i></span></button></a>
                                </div>
                                <?php $contLibres++?>
                                </td>
                            <?php } else if($id<=20 and $estado=="Ocupado"){?>
                                
                                <?php if($id==10 or $id==16 ) { $contOcupados++?>
                                    <tr>
                                <?php }?>
                              
                                <td bgcolor="#CA2A14" ><img src="imagenes/car-Ocupadoo.svg" alt="" width="30" ><br><?php echo "Num: ". $id."<br> Id de Auto: ".$idAuto."<br>Estado: ".$estado."<br>" ?>
                                <div align="center">
                                <a href=ticketEntrada.php?id=<?php echo $id?>><button type=Button class='btn btn-outline-warning' title="Ticket de entrada">
                                <span><i class='fas fa-print' style='color:#4AF500'></i></span></button></a>
                                <a href=""><button type=Button class='btn btn-outline-warning' title="Desocupar">
                                <span><i class='fas fa-tachometer-alt' style='font-size:15px'></i></span></button></a>
                                <a href=ticketSalida.php?id=<?php echo $id?>><button type=Button class='btn btn-outline-warning' title="Ticket de Salida">
                                <span><i class='fas fa-print' style='color:#4AF500'></i></span></button></a>
                                </div>
                                <?php ?>
                                </td>
                                
                                <?php }?>
                               
                        <?php } mysqli_close($conexion);?>
                        </tr>
                 </table>
</div>
<div class="card">

        
    </div>

</body>
       
   
</html>