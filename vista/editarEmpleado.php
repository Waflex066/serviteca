<?php
    include '../controlador/conexion.php';  

    if(isset($_GET['id'])){
        $idEmpleado = $_GET['id'];
        $consulta  = "SELECT * FROM empleado WHERE idEmpleado = $idEmpleado";
        $resultado = mysqli_query($conexion, $consulta);
        
        if (mysqli_num_rows($resultado) == 1) { 
            $fila = mysqli_fetch_array($resultado);
            $nombresEmpleado = $fila['nombresEmpleado'];
            $apellidosEmpleado = $fila['apellidosEmpleado'];
            $edadEmpleado = $fila['edadEmpleado'];
            $direccionEmpleado = $fila['direccionEmpleado'];
            $telefonoEmpleado = $fila['telefonoEmpleado']; 
            $generoEmpleado = $fila['generoEmpleado'];
            $cargoEmpleado = $fila['cargoEmpleado'];
            $emailEmpleado = $fila['emailEmpleado'];
            $documentoEmpleado = $fila['documentoEmpleado'];
        }
    }

    if (isset($_POST['actualizar'])){
        $idEmpleado = $_GET['id'];
        $nombresEmpleado = $_POST['nombresEmpleado'];
        $apellidosEmpleado = $_POST['apellidosEmpleado'];
        $nacimientoEmpleado = $_POST['nacimientoEmpleado'];
        $edadEmpleado = $_POST['edadEmpleado'];
        $direccionEmpleado = $_POST['direccionEmpleado'];
        $telefonoEmpleado = $_POST['telefonoEmpleado'];
        $generoEmpleado = $_POST['generoEmpleado'];
        $cargoEmpleado = $_POST['cargoEmpleado'];
        $emailEmpleado = $_POST['emailEmpleado'];
        $documentoEmpleado = $_POST['documentoEmpleado'];


        

        $consulta = "UPDATE empleado SET nombresEmpleado = '$nombresEmpleado',
                                         apellidosEmpleado= '$apellidosEmpleado ',
                                         nacimientoEmpleado= '$nacimientoEmpleado ',
                                         edadEmpleado= '$edadEmpleado ',
                                         direccionEmpleado= '$direccionEmpleado ',
                                         telefonoEmpleado = '$telefonoEmpleado',
                                         generoEmpleado = '$generoEmpleado',
                                         cargoEmpleado = '$cargoEmpleado',
                                         emailEmpleado = '$emailEmpleado',
                                         documentoEmpleado = '$documentoEmpleado'
                                    WHERE idEmpleado = $idEmpleado";

        mysqli_query($conexion, $consulta);
        $_SESSION['message'] = 'Tabla Actualizada';
        $_SESSION['message_type'] = 'primary';
        header("Location: ../vista\crudEmpleado.php"); 
    }
    if(isset($_POST['cancelar'])){
        header("Location: ../vista\crudEmpleado.php");
    }
?>
    <?php include '../vista\includes\header.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="editarEmpleado.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <h6>Nombres</h6>
                            <input type="text" name="nombresEmpleado" value="<?php echo $nombresEmpleado; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <h6>Apellidos</h6>
                            <input type="text" name="apellidosEmpleado" value="<?php echo $apellidosEmpleado; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <h6>Fecha De Nacimiento</h6>
                            <input type="date" name="nacimientoEmpleado" value="<?php echo $nacimientoEmpleado; ?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <h6>Edad</h6>
                            <input type="text" name="edadEmpleado" value="<?php echo $edadEmpleado; ?>" class="form-control" >
                        </div>
                        <div class="form-group">    
                            <h6>Dirección Residencial</h6>
                            <input type="text" name="direccionEmpleado" value="<?php echo $direccionEmpleado; ?>" class="form-control" >
                        </div>    
                        <div class="form-group">    
                            <h6>Teléfono</h6>
                            <input type="text" name="telefonoEmpleado" value="<?php echo $telefonoEmpleado; ?>" class="form-control" >
                        </div> 
                        <div class="form-group">    
                            <h6>Género</h6>
                            <small><?php echo $generoEmpleado; ?></small> <br>
                            <input type="radio" name="generoEmpleado" value="Masculino"> Masculino
                            <input type="radio" name="generoEmpleado" value="Femenino"> Femenino
                            <input type="radio" name="generoEmpleado" value="Otro"> Otro
                        </div>    
                        <div class="form-group">    
                            <h6>Cargo</h6>
                            <input type="text" name="cargoEmpleado" value="<?php echo $cargoEmpleado; ?>" class="form-control" >
                        </div>    
                        <div class="form-group">    
                            <h6>Email</h6>
                            <input type="email" name="emailEmpleado" value="<?php echo $emailEmpleado; ?>" class="form-control">
                        </div>    
                        <div class="form-group">    
                            <h6>Número de identificación</h6>
                            <input type="text" name="documentoEmpleado" value="<?php echo $documentoEmpleado; ?>" class="form-control" >
                        </div>          
                        <button class="btn btn-success" name="actualizar"> Actualizar </button>
                        <button class="btn btn-secondary" name="cancelar"> Cancelar </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include '../vista\includes\footer.php'; ?> 

