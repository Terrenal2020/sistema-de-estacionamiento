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

    <title>Registro de usuarios</title>
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
    margin-top: 2px;

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

<body>  <?php
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
                <a class="nav-link text-white" href="administrador.php">Inicio</a>
            </li>

            <li class="nav-item ">
                <a class="nav-link text-white" href="gestionVehiculos.php">Gestion de vehiculos </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="registroEstacionamiento.php">Disponibilidad de Espacios </a>

            </li>
           
            <li class="nav-item ">
                <a class="nav-link text-white" href="">Gestion de Conductores</a>

            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="historial.php">Historial de ocupacion </a>

            </li>
            <li class="nav-item ">
                <a class="nav-link text-white" href="corteHistorial.php">Corte de Caja </a>

            </li>
            <li class="nav-item">
                <a class="nav-link active disabled" href="GestionUsuarios.php">Gestion de Usuarios</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="datosUsuario.php">Datos del usuario</a>
            </li>
           </ul>
    </div>
</div>
<br>
<div align="center">
   
<div class="conteiner">

<div class="form">

    <h3>Personal</h3>
    <form action="guardarUsuarioAdmin.php" name="f1" method="post" enctype="multipart/form-data">
    <input type="text" name="nombreC" required class="form-control my-4" placeholder="Nombre Completo">
                <input type="text" name="nombre" required class="form-control my-4" placeholder="Nombre Usuario">
                <input type="password" name="pass" required class="form-control my-4" placeholder="Contraseña">
                <input type="email" name="correo" required class="form-control my-4" placeholder="Correo">
                <input type="telefono" name="telefono" required class="form-control my-4" placeholder="Telefono">
                <input type="number" name="edad" required class="form-control my-4"  placeholder="Edad" size="2">
                <p>Sexo: <br>
                <input type="radio" name="sexo" value="H"> Hombre
                <input type="radio" name="sexo" value="M"> Mujer
            </p>  
                <p>Tipo de Usuario: <br>
                <input type="radio" name="tipoUser" value="Cajero"> Cajero
                <input type="radio" name="tipoUser" value="Valet"> Valet
                <input type="radio" name="tipoUser" value="Valet"> Conductor
            </p> 
                   
        <input type="submit" class="btn btn-outline-success" value="Registrar" name="btnRegistrar">
    </form>

</div>

<form action="buscar.php" method="post">
    <div class="buscar">

        <input type="text" name="txtBuscar" placeholder="Buscar (H/M)" class="form-control">
    </div>
    <div class="divBotonBuscar" style="display: inline-block;text-align: center;">
        <button class="btn btn-success" name="buscarAuto" type="submit"><span><i
                    class="fas fa-search"></i></span></button>
    </div>
</form>
<div class="datos">

    <h3>Gestion de usuarios</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>usuario</th>
                <th>Contraseña</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Edad</th>
                <th>sexo</th>
                <th>Tipo</th>
                <th>Eliminar</th>
                <th>Editar</th> 
            </tr>
        </thead>
        
        <?php foreach ($conexion->query('SELECT * from usuarios') as $row){?>
        <tr>
            <td><?php echo $row['id_Usuario'] ?></td>
            <td><?php echo $row['nombreC'] ?></td>
            <td><?php echo $row['nombre'] ?></td>
            <td><?php echo $row['pass'] ?></td>
            <td><?php echo $row['correo'] ?></td>
            <td><?php echo $row['telefono'] ?></td>
            <td><?php echo $row['edad'] ?></td>
            <td><?php echo $row['sexo'] ?></td>
            <td><?php echo $row['tipo'] ?></td>
         
          
          
           
            <td><a href=eliminarUsuario.php?id=<?php echo $row['id_Usuario']?>><button type=Button
                        class='btn btn-outline-danger'>
                        <span><i class='fas fa-trash-alt'></i></span></button></a></td>
            <td><a href=editar.php?id=<?php echo $row['clave']?>><button type=Button
                        class='btn btn-outline-primary'>
                        <span><i class="fas fa-user-edit"></i></span></button></a></td>
           


        </tr>
        <?php
    }
    //mysqli_close($conexion);
    ?>
    </table>
</div>

</div>
</div>

///
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Nuevos Usuarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form">
            <h3>Ingresa los datos:</h3>
            <form action="guardarUsuarios.php" name="f1" method="post">
            <input type="text" name="nombreC" required class="form-control my-4" placeholder="Nombre Completo">
                <input type="text" name="nombre" required class="form-control my-4" placeholder="Nombre Usuario">
                <input type="password" name="pass" required class="form-control my-4" placeholder="Contraseña">
                <input type="email" name="correo" required class="form-control my-4" placeholder="Correo">
                <input type="telefono" name="telefono" required class="form-control my-4" placeholder="Telefono">
                <input type="number" name="edad" required class="form-control my-4"  placeholder="Edad" size="2">
                <p>Tipo de Usuario: <br>
                <input type="radio" name="tipoUser" value="Cajero"> Cajero
                <input type="radio" name="tipoUser" value="Valet"> Valet
                <input type="radio" name="tipoUser" value="Valet"> Conductor
            </p> 
                            <p>Sexo: <br>
                <input type="radio" name="sexo" value="H"> Hombre
                <input type="radio" name="sexo" value="M"> Mujer
            </p>  
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>
       
   
</html>