<?php
include("controlador/conexion.php");
session_start();
if(isset($_SESSION['id_usuario'])){
  header("Location: admin.php");
}
//Login
if(!empty($_POST)){
  $usuario= mysqli_real_escape_string($con,$_POST['user']);
  $password=mysqli_real_escape_string($con,$_POST['pass']);
  $sql = "SELECT idusuarios FROM usuarios WHERE Usuario = '$usuario' AND Password = '$password' ";
  $resultado = $con->query($sql);
  $rows=$resultado ->num_rows;
  if ($rows>0) {
    $row = $resultado -> fetch_assoc();
    $_SESSION['id_usuario']= $row["idusuarios"];
    header("Location: vista/admin/admin.php");
  } else {
    echo "<script>
    alert('Usuario o password incorrecto');
    window.location = 'index.php';
  </script>";
  }
}
//Registrar usuario
if(isset($_POST["registrar"])){
  //Esto se usa para evitar inyecciones sql, se usa para validar
  $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
  $correo=mysqli_real_escape_string($con,$_POST['correo']);
  $usuario=mysqli_real_escape_string($con,$_POST['user']);
  $password=mysqli_real_escape_string($con,$_POST['pass']);
  $sqluser = "SELECT idusuarios FROM usuarios WHERE Usuario = '$usuario' ";
  $resultadouser= $con->query($sqluser);
  $filas= $resultadouser->num_rows;
  if($filas > 0 ){
    echo "<script>
      alert('el usuario ya existe');
      window.location = 'index.php';
    </script>";
  }
  else{
    //Insertar información//
    $sqlusuario = "INSERT INTO usuarios(Nombre,Correo,Usuario,Password) VALUES ('$nombre','$correo','$usuario','$password')";
    $resultadousuario= $con->query($sqlusuario);
    if($resultadousuario > 0){
      echo "<script>
      alert('Registro Exitoso');
      window.location = 'index.php';
    </script>";
    }else{
      echo "<script>
        alert('Error al registrarse');
        window.location = 'index.php';
      </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="vista/css/normalize.css">
    <link rel="stylesheet" href="vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />   
    <link rel="stylesheet" href="vista/css/styles.css">
    <link rel="stylesheet" href="vista/css/target.css">
    <link rel="icon" href="vista/img/logo.png">
    <title>Servitavria</title>
</head>
<body>
    
<header class="header">
            <nav class="navbar sticky-top navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#">
                <img src="vista/img/logo.png" class="logo"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                    <a class="nav-link nav" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav" href="#servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav" href="#quienes_somos">¿Quienes Somos?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav" href="#ubicacion">Ubicación</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav" href="formulario.php">Cotizaciones</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-info my-2 my-sm-0" type="button" data-toggle="modal" data-target="#modal1">Iniciar Sesión</button>
                </form>
            </div>
            </nav>
    </header>

<!--Main-->

<main id="main" class="mb-3">
        <div class="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-pause="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://img.motoryracing.com/noticias/portada/25000/25615-n.jpg" class="d-block w-100" alt=""/>
                </div>
                <div class="carousel-item">
                    <img src="https://www.senati.edu.pe/sites/default/files/2017/especialidad/08/especialidad-mecanica-automotriz-1800x677.jpg" class="d-block w-100" alt=""/>
                </div>
                <div class="carousel-item">
                    <img src="https://www.escuelamapa.edu.uy/wp-content/uploads/2016/06/mecanica-automotriz.jpg" class="d-block w-100" alt=""/>
                </div>
                <div class="overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 offset-md-6 text-center text-md-right">
                                <h1>TÚ MERECES MÁS, TU CARRO TAMBIÉN</h1>
                                <p class="d-none d-md-block">
                                SERVICIO TÉCNICO Y AUTOMOTRIZ A PRECIO ACCESIBLE
                    
                                </p>
                                <a href="formulario.php" class="btn btn-outline-light">Pedir Cotización</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!--/Main-->


<!--Targets-->
<div class="container ">

<h2 class="text-center mb-3 mt-3 textin"  id="servicios">Servicios Que Ofrecemos</h2>

<div class="row">
  <div class="col-md-6">
    
 

  <div class="blog-card">
    <div class="meta">
      <div class="photo"><img src="vista/img/cambio_aceite.png" alt=""></div>
    </div>
    <div class="description">
      <h1>Mecánica Básica.....</h1>
      <h2>ABRIENDO UNA PUERTA AL FUTURO</h2>
      <p>
          <ul>
            <li>Alineación y balanceo</li>
            <li>Cambio de aceite</li>
            <li>Cambio de discos</li>
            <li>Cambio de pastas</li>
            <li>Sincronización</li>
        </ul>
      </p>
    
      <p class="read-more">
        <a href="#">Leer Más</a>
      </p>
    </div>
  </div>

  </div>


  <div class="col-md-6">


  <div class="blog-card">
    <div class="meta">
      <div class="photo"><img src="vista/img/balanceo.png" alt=""></div>
    </div>
    <div class="description">
      <h1>Mecánica Especializada</h1>
      <h2>ABRIENDO UNA PUERTA AL FUTURO</h2>
      <p>
          <ul>
            <li>Alineación y balanceo</li>
            <li>Cambio de aceite</li>
            <li>Cambio de discos</li>
            <li>Cambio de pastas</li>
            <li>Sincronización</li>
        </ul>
      </p>
      <p class="read-more">
        <a href="#">Leer Más</a>
      </p>
    </div>
  </div>


  </div>


  
  <div class="col-md-6">


  <div class="blog-card">
    <div class="meta">
      <div class="photo" style="background-image: url(https://corporacioninformatica.com/wp-content/uploads/2014/08/curso-de-mecanico-de-vehiculos-ligeros.jpg)"></div>
    </div>
    <div class="description">
      <h1>Revisiones Automotriz</h1>
      <h2>ABRIENDO UNA PUERTA AL FUTURO</h2>
      <p>
          <ul>
            <li>Alineación y balanceo</li>
            <li>Cambio de aceite</li>
            <li>Cambio de discos</li>
            <li>Cambio de pastas</li>
            <li>Sincronización</li>
        </ul>
      </p>
      <p class="read-more">
        <a href="#">Leer Más</a>
      </p>
    </div>
  </div>


  </div>


  
  <div class="col-md-6">


  <div class="blog-card">
    <div class="meta">
      <div class="photo"><img src="vista/img/suspension.png" alt=""></div>
    </div>
    <div class="description">
      <h1>Estética Automotriz</h1>
      <h2>ABRIENDO UNA PUERTA AL FUTURO</h2>
      <p>
          <ul>
            <li>Alineación y balanceo</li>
            <li>Cambio de aceite</li>
            <li>Cambio de discos</li>
            <li>Cambio de pastas</li>
            <li>Sincronización</li>
        </ul>
      </p>
      <p class="read-more">
        <a href="#">Leer Más</a>
      </p>
    </div>
  </div>


  </div>

</div>

</div>
<hr>

<!--Marcas de carro -->


<section class="habilidades mt-3" >
    <div class="container">
      <h2 class="text-center mb-3 mt-3 textin" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">Marcas Que Atendemos</h2>
        <div class="row">
            <div class="col-md-6 display" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
                <img src="vista/img/hyundai.png">
                <img src="vista/img/chevrolet.png">
                <img src="vista/img/kia.png">
            </div>
            <div class="col-md-6 display" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
              <img src="vista/img/honda.png">
              <img src="vista/img/volkswagen.png">
              <img src="vista/img/renault.png">
            </div>
        </div>
    </div>
</section>

<hr>
<!--Targetas 2-->

<h2 class="text-center mb-3 mt-3 textin" id="quienes_somos">Nuestro Equipo</h2>
<div class="contenedor">
  
    <div class="contenedor_tarjeta">
      <a href="#">
        <figure id="tarjeta">
          <img src="vista/img/mec_1.jpg" class="frontal">
          <figcaption class="trasera">
            <h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
          </figcaption>
        </figure>
      </a>
    </div>

    <div class="contenedor_tarjeta">
      <a href="#">
        <figure id="tarjeta">
          <img src="vista/img/mec_2.jpg" class="frontal">
          <figcaption class="trasera">
            <h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
          </figcaption>
        </figure>
      </a>
    </div>

    <div class="contenedor_tarjeta">
      <a href="#">
        <figure id="tarjeta">
          <img src="vista/img/mec_3.jpg" class="frontal">
          <figcaption class="trasera">
            <h2 class="titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, vero!</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis cupiditate voluptates ipsum suscipit, aspernatur eum, amet nemo architecto nihil corrupti.</p>
          </figcaption>
        </figure>
      </a>
    </div>

  </div>
<hr>
<!--Google maps -->

<div class="container">
<h2 class="textin text-center mb-3" id="ubicacion">Nuestra Ubicación</h2>

<div class="mapouter mb-3" data-aos="fade-left"
     data-aos-anchor="#example-anchor"
     data-aos-offset="500"
     data-aos-duration="500">
  <div class="gmap_canvas">
    <iframe width="100%" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=calle%2053%20%2334-38&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
    </iframe>
    <a href="https://www.embedgooglemap.net/blog/elementor-pro-discount-code-review/">elementor discount code</a>
  </div>
  <style>.mapouter{position:relative;text-align:right;height:300px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:100%;}</style>
</div>


</div>

<!--Footer-->


<footer class="footer-distributed">
<div class="footer-right">

  <a href="#"><i class="fab fa-facebook-f"></i></a>
  <a href="#"><i class="fas fa-envelope-square"></i></a>
  <a href="#"><i class="fab fa-instagram"></i></a>
  <a href="#"><i class="fab fa-twitter"></i></a>

</div>

<div class="footer-left">

  <p class="footer-links">

    <a href="#main">Inicio</a>

    <a href="#servicios">Servicios</a>

    <a href="#quienes_somos">¿Quiénes Somos?</a>

    <a href="#ubicacion">Ubicacion</a>

    <a href="formulario.php">Cotizaciones</a>
  </p>

  <p>SERVITAVRIA &copy; 2019 | Todos los derechos reservados.</p>
</div>
<div class="logo_footer">
    <img src="vista/img/logo.png" class="logo_footer" alt="" style="width: 180px">
 </div>

</footer>

<!--Modal-->    
<div>
        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inicia sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                          <div class="container">
                              <h4 class="text-center mb-3">Inicia sesión con tu correo</h4>
                                <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >
                                      <input class="form-control caja_correo" type="text" id="user" name="user" placeholder="Ingresa tu correo" required/>
                                      <input class="form-control caja_correo" type="password" id="pass" name="pass" placeholder="Ingresa tu contraseña" required/>
                                      <button type="submit" class="btn btn-lg btn-block btn2">
                                            Iniciar sesión
                                      </button>
                                </form>
                                      
                              </div>
                         
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-primary"  data-dismiss="modal" data-toggle="modal" data-target="#modal2">Crear una cuenta</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>  
  
  
            
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crea una nueva cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
              <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Ingresa tu nombre" required/>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu email" required/>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" id="user" name="user" placeholder="Ingresa tu usuario" required/>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Ingresa tu contraseña" required/>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Repite la contraseña</label>
                        <input type="password" class="form-control" name="passr" placeholder="Ingresa nuevamente tu contraseña"/>
                      </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal1" data-dismiss="modal">Regresar al login</button>
                        <button type="submit" id="registrar" name="registrar"  class="btn btn-primary">Registrar</button>
                      </div>
                    </form>
      </div>
      
    </div>
  </div>
  </div>
  
    </div>

<!-- Fin modal-->
<!--Sccripts-->    
<script src="vista/js/formulario.js"></script>
<script src="vista/js/jquery.js"></script>
<script src="vista/js/popper.js"></script>
<script src="vista/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
          <script>
            AOS.init();
          </script>
<!--Scripts-->    
</body>
</html>