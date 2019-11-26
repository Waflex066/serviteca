<?php 
    include '../controlador/conexion.php';  
    include '../vista\includes\header.php'; 
    ?>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">   
<title>Crud Empleado</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<div class="container-fluid p-4 ">
        <div class="row"> 
          <div class="col-md-4">
                <?php if(isset($_SESSION['message'])) { ?> <!-- Mostrar mensaje -->
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); }?>
            <div class="card card-body">
                <form action="../controlador/registrarEmpleado.php" method="post" id="frmEmpleado" name="frmEmpleado" enctype="multipart/form-data" onsubmit="return validarForm();">
                    <div class="form-group">
                        <h6>Nombres</h6>
                        <input type="text" id="nombresEmpleado" name="nombresEmpleado" class="form-control" autofocus />
                    </div>
                    <div class="form-group">
                        <h6>Apellidos</h6>
                        <input type="text" id="apellidosEmpleado" name="apellidosEmpleado" class="form-control" active />
                    </div>
                    <div class="form-group">
                        <h6>Fecha de nacimiento</h6>
                        <input type="date" id="nacimientoEmpleado" name="nacimientoEmpleado" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <h6>Edad</h6>
                        <input type="text" id="edadEmpleado" name="edadEmpleado" class="form-control" />
                    </div>
                    <div class="form-group">
                        <h6>Dirección Residencial</h6>
                        <input type="text" id="direccionEmpleado" name="direccionEmpleado" class="form-control" />
                    </div>   
                    <div class="form-group">
                        <h6>Teléfono</h6>
                        <input type="text" id="telefonoEmpleado" name="telefonoEmpleado" class="form-control" />
                    </div>    
                    <div class="form-group">
                        <h6>Género</h6>
                        <input type="radio" id="masculino" name="generoEmpleado" value="Masculino"/> Masculino
                        <input type="radio" id="femenino" name="generoEmpleado" value="Femenino"/> Femenino
                        <input type="radio" id="otro" name="generoEmpleado" value="Otro"/> Otro
                    </div>  
                    <div class="form-group">
                        <h6>Cargo</h6>
                        <input type="text" id="cargoEmpleado" name="cargoEmpleado" class="form-control" />
                    </div>  
                    <div class="form-group">
                        <h6>Email</h6>
                        <input type="text" id="emailEmpleado" name="emailEmpleado" class="form-control" />
                    </div>  
                    <div class="form-group">
                        <h6>Número de identificación</h6>
                        <input type="text" id="documentoEmpleado" name="documentoEmpleado" class="form-control" />
                    </div>    
                    <input class="boton btn btn-success btn-block" type="submit" id="enviar" name="enviar" value="Guardar"/>
                </form>
            </div>
          </div>
          <div class="col-md-8">
            <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha De Nacimiento</th>
                        <th>Edad</th>
                        <th>Dirección Residencial</th>
                        <th>Teléfono</th>
                        <th>Género</th>
                        <th>Cargo</th>
                        <th>Email</th>
                        <th>Número de identificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM empleado"; /* Trae la tabla*/
                        $resultado = mysqli_query($conexion, $query); /* Guarda los datos */

                        while($fila = mysqli_fetch_array($resultado)) { ?> <!-- Imprime los datos -->
                        <tr>
                            <td> <?php echo $fila['idEmpleado'] ?> </td>
                            <td> <?php echo $fila['nombresEmpleado'] ?> </td>
                            <td> <?php echo $fila['apellidosEmpleado'] ?> </td>
                            <td> <?php echo $fila['nacimientoEmpleado'] ?> </td>
                            <td> <?php echo $fila['edadEmpleado'] ?> </td>
                            <td> <?php echo $fila['direccionEmpleado'] ?> </td>
                            <td> <?php echo $fila['telefonoEmpleado'] ?> </td>
                            <td> <?php echo $fila['generoEmpleado'] ?> </td>
                            <td> <?php echo $fila['cargoEmpleado'] ?> </td> 
                            <td> <?php echo $fila['emailEmpleado'] ?> </td>
                            <td> <?php echo $fila['documentoEmpleado'] ?> </td>
                            <td class="btn-group"> 
                                <div class="editar">
                                    <a href="../vista/editarEmpleado.php?id=<?php echo $fila['idEmpleado']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                </div>
                                <div class="eliminar">
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#confirmacion<?php echo $fila['idEmpleado']?>" id="eliminar">
                                      <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <div class="modal fade" id="confirmacion<?php echo $fila['idEmpleado']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="display: flex;justify-content: center;align-items: center;">
                                                <?php if(isset($_GET['id'])){
                                                $idEmpleado = $_GET['id'];
                                                echo($idEmpleado);
                                                }?>
                                                    <img src="../vista/img/danger.png" alt="!" style="width:120px;">
                                                    <h3 class="modal-title">¿Está seguro de eliminar?</h3>
                                                </div>
                                                <div class="modal-body" style="text-align:center;">
                                                    <h4>El registro se eliminará</h4>
                                                    <button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Cancelar</button>
                                                    <a href="../controlador/eliminarEmpleado.php?id=<?php echo $fila['idEmpleado']?>" class="btn btn-danger btn-block">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="crear">
                                    <a href="../vista/crudUsuario.php?id=<?php echo $fila['idEmpleado']?>"> <span style="font-size: 30px;"> <i class="fas fa-user-plus"></i></span></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#tabla').DataTable();
} );
</script>        
<script src="../vista/js/validarEmpleado.js"></script>
<script src="../vista/js/eliminarEmpleado.js"></script>
<?php include '../vista\includes\footer.php'?>