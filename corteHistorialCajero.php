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
        width: 12%;
        color:black;
        border: black 5px solid;
        background:linear-gradient(to bottom right, Aqua, white);
         
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
<?php
                include("conexion.php");
                date_default_timezone_set('America/Mexico_City');
             ?>

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
                <a class="nav-link text-white" href="registroEstacionamientoCajero.php">Disponibilidad de Espacios </a>

            </li>
            <li class="nav-item ">
                <a class="nav-link active disabled" href="corteHistorialCajero.php">Corte de Caja </a>

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
<h3>Corte General de Caja</h3>
<table class="table table-striped" border="3">
                      
                        <?php
                          include("conexion.php");
                         foreach ($conexion->query('SELECT * from espacios') as $row){
                            $id=$row['id_espacios'];
                            $ocupacion=$row['totalOcupaciones'];
                            $dinero=$row['dinero'];
                            $contOcupados=0;
                            $total+=$dinero;
                          
                           ?>
                           
                            <?php if($id<=20 ) {?>
                                <?php if($id==10 or $id==19 ) {?>
                                    
                                    <tr>
                                <?php }?>
                                <td ><img src="imagenes/car-Libre.svg" alt="" width="30" ><br><?php  echo "Estacionamiento: ". $id."<br> Total Ocupaciones: ".$ocupacion."<br> Efectivo:$ ".$dinero."<br>" ?>
                                <div align="center">
                                
                                </div>
                                
                                </td>
                                </td>
                               
                               
                                <?php }?>
                               
                        <?php } mysqli_close($conexion);?>
                        </tr>
                        <h5><b><?php echo "Total = $".$total." .00"; ?></b></h5>
                        
                 </table>
                 <a href="CorteCajaResetCajero.php"><button type="button" class="btn btn-warning">Corte Caja
                    </button></a>
                
</div>

<div class="card">
<div class="datos1">
    <div class="graficas" >
                <canvas style="border: 2px solid red; width: 500px; height: 400px;" id="grafica">Tu navegador no es
                    conmpatible</canvas>
            </div>
            </div>
        
    </div>

</body>

<script>
    <?php
                include("conexion.php");
                $espacios=[];
                function consultaC(){
                    global $conexion;
                    $sqlC="SELECT * FROM  espacios";
                    return $conexion->query($sqlC);
                    }
                    $consultarC=consultaC();
                
                 while($espacio = $consultarC->fetch_assoc())
                 {
                     $Icajon=$espacio['id_espacios'];
                     $espacios[]=$espacio['totalOcupaciones'];
                 }
                
                 $espacio1=$espacios[0];
                 $espacio2=$espacios[1];
                 $espacio3=$espacios[2];
                 $espacio4=$espacios[3];
                 $espacio5=$espacios[4];
                 $espacio6=$espacios[5];
                 $espacio7=$espacios[6];
                 $espacio8=$espacios[7];
                 $espacio9=$espacios[8];
                 $espacio10=$espacios[9];
                 $espacio11=$espacios[10];
                 $espacio12=$espacios[11];
                 $espacio13=$espacios[12];
                 $espacio14=$espacios[13];
                 $espacio15=$espacios[14];
                 $espacio16=$espacios[15];
                 $espacio17=$espacios[16];
                 $espacio18=$espacios[17];
                 $espacio19=$espacios[18];
                 $espacio20=$espacios[19];
            
        ?>
             
    var ctx = document.getElementById('grafica');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {

                labels:["Espacio 1","Espacio 2","Espacio 3","Espacio 4","Espacio 5","Espacio 6","Espacio 7","Espacio 8",
                "Espacio 9","Espacio 10","Espacio 11","Espacio 12","Espacio 13","Espacio 14","Espacio 15","Espacio 16","Espacio 17","Espacio 18",
                "Espacio 19","Espacio 20",],
                datasets: [{
                    label: 'veces ocupado',
                
                    data: [<?php echo $espacio1; ?>,<?php echo $espacio2; ?>,<?php echo $espacio3; ?>,<?php echo $espacio4; ?>,<?php echo $espacio5; ?>,<?php echo $espacio6; ?>,<?php echo $espacio7; ?>,<?php echo $espacio8; ?>,<?php echo $espacio9; ?>,<?php echo $espacio10; ?>,<?php echo $espacio11; ?>,<?php echo $espacio12; ?>,<?php echo $espacio13; ?>,<?php echo $espacio14; ?>,<?php echo $espacio15; ?>,<?php echo $espacio16; ?>,<?php echo $espacio17; ?>,<?php echo $espacio18; ?>,<?php echo $espacio19; ?>,<?php echo $espacio20; ?>,],
                
                    backgroundColor: [
                        'rgba(18, 206, 63)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
       
   
</html>