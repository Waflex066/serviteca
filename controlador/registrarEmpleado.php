<?php 
    include '../controlador/conexion.php';
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

    $insertar = "INSERT INTO empleado (nombresEmpleado, apellidosEmpleado, nacimientoEmpleado, edadEmpleado, direccionEmpleado, telefonoEmpleado, generoEmpleado, cargoEmpleado, emailEmpleado, documentoEmpleado) VALUE ('$nombresEmpleado', '$apellidosEmpleado', '$nacimientoEmpleado', '$edadEmpleado', '$direccionEmpleado', '$telefonoEmpleado', '$generoEmpleado', '$cargoEmpleado', '$emailEmpleado' ,'$documentoEmpleado')";

    $resultado = mysqli_query($conexion, $insertar);

	if (!$resultado) {
        die("Error al registrar");
    }
    
    $_SESSION['message'] = 'Registro guardado';
    $_SESSION['message_type'] = 'success';
    header("Location: ../vista/crudEmpleado.php");
    
    
?>