
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8700b1bcd8.js" crossorigin="anonymous"></script>
    <style>
   
    h3{
        color: white;
        background-color: red;
    }
    .conteiner {
        
        height: 300px;
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .login {
        
        background: linear-gradient(rgb(28, 246, 229), rgb(61, 246, 28));
        text-align: center;
        padding: 2em;
        margin-top: 90px;
       
    }
    .head{
        background: rgb(218, 213, 213);
        font-family: Arial, Helvetica, sans-serif;
        
    }
    .feet{
        background: rgb(218, 213, 213);
        text-align: center;
    }
    body{
        width: 100%;
     
    }
    .recuperar{
        margin-right: 200px;
        margin-top: -15px;
        
    }
</style>
    <title>Document</title>
</head>
<body>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="1.jpg" class="d-block w-100" alt="100px">
      <div class="carousel-caption d-none d-md-block">
        <h5>Bienvenido</h5>
        <p>Servicio de Autolavado.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>La mejor opcion</h5>
        <p>Los Viernes el lavado de carros incluido.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Horario</h5>
        <p>Abrimos de Lunes a Domingo de 6:00AM a 10:00PM</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <img src="imagenes/car.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Sistema de Estacionamiento y Autolavado   
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">---------------</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">registrarse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">---------</a>
        </li>
      
        <form class="d-flex"  action="recuperarContraseña.php" method="post">
      <input require class="form-control me-2" type="email" placeholder="Correo" name="txtBuscar" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Recuperar Contraseña</button>
    </form>
      </ul>
    </div>
  </div>
</nav>

<div class="head">
    
    </div>
    <div class="conteiner">
      

        <div class="login">
               <form action="validasesion.php" method="post">
               <h1>Iniciar Sesion</h1><br><br>
               <input type="text" placeholder="Nombre de Usuario" id="user"name="user" class="form-control">
               <input type="password" placeholder="Password" name="pass" class="form-control my-4">
               <br>
                <input type="submit" class="btn btn-primary" value="Entrar" style="width: 140px;" name="btnIngresar">
                
               </form>
              
        </div>
    </div>


   
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