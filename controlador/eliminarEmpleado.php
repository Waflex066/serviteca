<?php 
        include '../controlador/conexion.php';  

        if(isset($_GET['id'])){
            $idEmpleado = $_GET['id'];
            $consulta = "DELETE FROM empleado WHERE idEmpleado = $idEmpleado";
            $resultado = mysqli_query($conexion, $consulta);
            if (!$resultado) {
                die("Error al eliminar");
            }
            
            $_SESSION['message'] = 'Se ha eliminado';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../vista/crudEmpleado.php");
        }
?>