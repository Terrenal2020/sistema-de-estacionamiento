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

    <title>Datos del Usuario</title>
</head>
<style>
.buscar {
    display: inline-block;
    margin-left: 580px;
    margin-top: 5px;

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
        <li class="nav-item">
                <a class="nav-link text-white" href="menuCajero.php">Inicio</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="registroVehiculoCajero.php">Registro de vehiculos </a>
            </li>
         
            <li class="nav-item ">
                <a class="nav-link text-white" href="registroEstacionamientoCajero.php">Disponibilidad de Espacios </a>

            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="corteHistorialCajero.php">Corte de Caja </a>

            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="">Gestion de Conductores </a>

            </li>
        
            <li class="nav-item">
                <a class="nav-link active disabled" href="datosUsuarioCajero.php">Datos del usuario</a>
            </li>
           </ul>
    </div>
</div>
<br>
<div class="card">
            <div class="card-body">
                <h4>Datos del Usuario</h4>
                <br>
                <?php
               $usuaruo= $_SESSION['usuario'];
               
                 include("conexion.php");
                 foreach ($conexion->query("SELECT * FROM usuarios WHERE nombre='$usuaruo'") as $row){
                    $a=$row['nombreC'];
                    $b=$row['nombre'];
                    $c=$row['pass'];
                    $d=$row['correo'];
                    $e=$row['telefono'];
                    $f=$row['edad'];
                    $g=$row['sexo'];
                    $h=$row['tipo'];
                 }
                ?>
             
                <label><b>Nombre Completo:</b>  <?php echo $a?> </label>
                <br>
                <label><b>Nombre de Usuario:</b>  <?php echo $b?>  </label>
                <br>
                <label><b>Correo:</b>  <?php echo $d?>  </label>
                <br>
                <label><b>Telefono:</b> <?php echo $e?>  </label>
                <br>
                <label><b>Edad:</b> <?php echo $f?>  </label>
                <br>
                <label><b>Sexo:</b> <?php echo $g?>  </label>
                <br>
                <label><b>Tipo de usuario:</b> <?php echo $h?>  </label>
                <br>
                <form action="">
                <label><b>Contraseña:</b> </label>
                    <input type="password" id="pwd" name="pwd" value="<?php echo $c?>">
                </form>
            </div>
        </div>
        <br>
        
        
    </div>

</body>
       
   
</html>