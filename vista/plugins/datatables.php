<?php 
    include 'C:/xampp/htdocs/serviteca-master/controlador/conexion.php';  
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Data tables</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
	<table id="tabla" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Ciudad</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM datos"; /* Trae la tabla*/
                        $resultado = mysqli_query($conexion, $query); /* Guarda los datos */

                        while($fila = mysqli_fetch_array($resultado)) { ?> <!-- Imprime los datos -->
                        <tr>
                            <td> <?php echo $fila['Id'] ?> </td>
                            <td> <?php echo $fila['Nombre'] ?> </td>
                            <td> <?php echo $fila['Apellido'] ?> </td>
                            <td> <?php echo $fila['Ciudad'] ?> </td>
                            <td> <?php echo $fila['Telefono'] ?> </td>
                            <td> <?php echo $fila['Direccion'] ?> </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
<script type="text/javascript">
	$(document).ready(function() {
    $('#tabla').DataTable();
} );
</script>            	
</body>
</html>