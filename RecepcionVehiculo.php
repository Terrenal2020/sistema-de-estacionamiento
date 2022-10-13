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
<?php
                include("conexion.php");
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
                <a class="nav-link text-white" href="gestionVehiculos.php">Registro de vehiculos </a>
            </li>
         
            <li class="nav-item ">
                <a class="nav-link active disabled" href="">Disponibilidad de Espacios </a>

            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="">Corte de Caja </a>

            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="GestionUsuarios.php">Gestion de Usuarios</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="datosUsuario.php">Datos del usuario</a>
            </li>

           </ul>
    </div>
</div>
<br>
<div align="center">
<h3>Recepcion Del Vehiculo</h3>
<form action="guardarRecepcio.php" name="f1" method="post" enctype="multipart/form-data">
<?php $id=(int)"$_REQUEST[id]"; ?>
<?php foreach ($conexion->query("SELECT * from espacios WHERE id_espacios=$id") as $row) { ?>
    <div class="row">
<div class="col-lg-4 col-sm-12 form-group">
<label for="">Numero Del espacio</label>
<input type="text" class="form-control " name="numero" id="numero" value="<?php echo $row['id_espacios']?>" readonly>
</div>   
<div class="col-lg-4 col-sm-12 form-group">
<label for="">Estado</label>
<input type="text" class="form-control " name="estado" id="estado" value="Ocupado" readonly>
</div> 
<div class="col-lg-4 col-sm-12 form-group">
<label for="">Placas</label>
<input type="text" class="form-control " name="placas" id="placas"  >
</div>   
<div class="col-lg-4 col-sm-12 form-group">
<label for="">Desea servicio de lavado</label><br>
<input type="radio" name="lavar" value="100" require> Si
                    <input type="radio" name="lavar" value="0" require> No
</div>      
<div class="col-lg-4 col-sm-12 form-group">
<input type="submit" class="btn btn-outline-success" value="ocupar Lugar">
</div>
<?php
                        }
                        ?>

</form>

</div>
</div>

</body>
       
   
</html>