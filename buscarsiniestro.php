<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/661bf8cec7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/styles/style.css" type="text/css">
    <script src="./assets/js/datatables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ver siniestro</title>
</head>
<body>
    <?php
        $mysqli = new mysqli("localhost", "root", "", "siniestros");
        if (!$mysqli->set_charset("utf8")) {
            printf("Error loading character set utf8: %s\n", $mysqli->error);
        } 
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        //echo $mysqli->host_info . "\n";
        $id = $_GET['id'];
        $resultado = $mysqli->query("SELECT ID, 
            SINIESTRO,
            POLIZA, RED,
            FECHA_ACCIDENTE, FECHA_REPORTE, FECHA_ARRIBO, 
            HORA_REPORTE, HORA_ARRIBO, 
            UNIDAD_REGIONAL, 
            TRAMO_CARRETERO, 
            OFICINA, CIUDAD, 
            KM, SENTIDO, 
            NUM_CASETA, NOMBRE_CASETA, 
            COBERTURA, 
            TIPO_ACCIDENTE, CAUSA_ACCIDENTE, 
            VH_RESPONSABLE_ASEGURADORA, 
            VH_RESPONSABLE_POLIZA, 
            VH_RESPONSABLE_TIPO, 
            VH_RESPONSABLE_MARCA, 
            VH_RESPONSABLE_COLOR, 
            VH_RESPONSABLE_PLACAS, 
            VH_RESPONSABLE_MODELO, 
            VH_AFECTADO_TIPO, 
            VH_AFECTADO_MARCA, 
            VH_AFECTADO_COLOR, 
            VH_AFECTADO_MODELO, 
            VH_AFECTADO_PLACAS, 
            VH_AFECTADO_NOMBRE, 
            VH_INVOLUCRADOS, 
            VH_INVOLUCRADOS_TIPO, 
            EXTEMPORANEO, 
            LESIONADOS, FALLECIDOS, 
            HORA_PASE_MEDICO, HOSPITAL, 
            DANHOS_CAMINO, 
            PROCEDENCIA, 
            DETALLES, 
            ESTATUS, 
            INGRESO_OCURRENCIA, 
            ESTIMACION_INICIAL_RC, ESTIMACION_INICIAL_GM, 
            INDEMNIZACION_RC, INDEMNIZACION_GM, 
            GASTO_DIRECTO, GASTO_INDIRECTO, 
            DEDUCIBLE, SALVAMENTO, SUBROGACIONES, 
            RESERVA_RC, RESERVA_GM, RESERVA_TOTAL, 
            RECUPERACION, SINIESTRO_TOTAL 
            FROM siniestros WHERE siniestro = '$id'");
        $fila = $resultado->fetch_assoc();
    ?>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="bg-dark col-auto col-md-3 col-lg-2 min-vh-100 d-flex flex-column justify-content sidebar-container">
                <div class="bg-dark">
                    <span class="fs-4 d-none d-sm-inline text-white p-3 py-3">Directorio</span>
                    <ul class="nav nav-pills flex-column mt-4">
                        <li class="nav-item py-2 py-sm-0">
                            <a href="" class="nav-link text-white">
                                <i class="fas fa-gauge"></i><span class="fs-4 ms-2 d-none d-sm-inline">Todos</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0" aria-current="page">
                            <a href="" class="nav-link text-white">
                                <i class="fas fa-house-chimney"></i><span
                                    class="fs-4 ms-2 d-none d-sm-inline">Gerencia</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="./unidades.html" class="nav-link text-white">
                                <i class="fas fa-tablet"></i><span class="fs-4 ms-2 d-none d-sm-inline">Unidades Regionales</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="" class="nav-link text-white">
                                <i class="fas fa-table-cells-large"></i>
                                <span class="fs-4 ms-2 d-none d-sm-inline">GNP</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a href="siniestros.php" class="nav-link text-white active">
                                <i class="fas fa-table-cells-large"></i>
                                <span class="fs-4 ms-2 d-none d-sm-inline">Siniestros</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--
                <div class="dropdown open p-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" 
                        aria-expanded="false" >
                        <i class="fa fa-user"></i><span class="ms-2">Rho</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <button class="dropdown-item" href="#">Settings</button>
                        <button class="dropdown-item disabled" href="#">Profile</button>
                    </div>
                </div>
                -->
            </div>

            <!-- Contenido-->
            <div class="container-fluid py-2 px-4" >
                <h2 class="display-2"> Siniestro
                    <?php
                        //echo "Aún no ###### \n";
                        echo $fila['SINIESTRO'];
                    ?>
                </h2>
                <div class="py-4">
                    <a href="./siniestros.php" class="btn btn-secondary">
                        Volver
                    </a>
                </div>

                <textarea cols="55" rows="3" placeholder=" <?php echo $fila['DETALLES'] ?> "></textarea>

                <div class="row">
                    <div class="col-2">
                        <h3>Lugar</h3>
                        <label for="tramo">Tramo: <?php echo $fila['TRAMO_CARRETERO'] ?> </label>
                        <label for="caseta">Caseta <?php echo $fila['NUM_CASETA'] . ": " . $fila['NOMBRE_CASETA'] ?> </label>
                        <label for="km">KM: <?php echo $fila['KM'] ?>  </label>
                        <label for="cuerpo">Cuerpo: <?php echo $fila['SENTIDO'] ?>  </label>
                        <label for="oficina">Oficina: <?php echo $fila['OFICINA'] ?>  </label>
                        <label for="ciudad">Ciudad: <?php echo $fila['CIUDAD'] ?>  </label>
                        <label for="ur"><?php echo $fila['UNIDAD_REGIONAL'] ?>  </label>
                        <label for="red">Red: <?php echo $fila['RED'] ?>  </label>
                    </div>
               
                    <div class="col-2">
                        <h3>Estatus</h3>
                        <label for="cobertura"> <?php echo $fila['COBERTURA'] ?>  </label>
                        <label for="tipo">Tipo: <?php echo $fila['TIPO_ACCIDENTE'] ?>  </label>
                        <label for="causa">Causa: <?php echo $fila['CAUSA_ACCIDENTE'] ?>  </label>
                        <label for="daños">Daños al camino: <?php echo $fila['DANHOS_CAMINO'] ?>  </label>
                        <label for="procedencia"><?php echo $fila['PROCEDENCIA'] ?>  </label>
                        <label for="status">Status: <?php echo $fila['ESTATUS'] ?>  </label>
                    </div>

                    <div class="col-2">
                        <h3>VH Responsable</h3>
                        <label for="color">Aseguradora: <?php echo $fila['VH_RESPONSABLE_ASEGURADORA'] ?>  </label>
                        <label for="tipo">Tipo: <?php echo $fila['VH_RESPONSABLE_TIPO'] ?>  </label>
                        <label for="causa">Marca: <?php echo $fila['VH_RESPONSABLE_MARCA'] ?>  </label>
                        <label for="daños">Color: <?php echo $fila['VH_RESPONSABLE_COLOR'] ?>  </label>
                        <label for="procedencia">Modelo: <?php echo $fila['VH_RESPONSABLE_MODELO'] ?>  </label>

                        <h3>VH Afectado</h3>
                        <label for="status">Tipo: <?php echo $fila['VH_AFECTADO_TIPO'] ?>  </label>
                        <label for="status">Marca: <?php echo $fila['VH_AFECTADO_MARCA'] ?>  </label>
                        <label for="status">Color: <?php echo $fila['VH_AFECTADO_COLOR'] ?>  </label>
                        <label for="status">Modelo: <?php echo $fila['VH_AFECTADO_MODELO'] ?>  </label>
                        <label for="status">Nombre o RS: <?php echo $fila['VH_AFECTADO_NOMBRE'] ?>  </label>

                    </div>
                    
                    <div class="col-2">
                        <h3>Costos</h3>
                        <label for="total">Total $<?php echo number_format($fila['SINIESTRO_TOTAL'], 2) ?>  </label>
                        <label for="deducible">Deducible $<?php echo number_format($fila['DEDUCIBLE'], 2) ?>  </label>
                        <label for="recuperacion">Recuperación $<?php echo number_format($fila['RECUPERACION'], 2) ?>  </label>
                        <label for="directo">Gasto indirecto $ <?php echo number_format($fila['GASTO_DIRECTO'], 2) ?>  </label>
                        <label for="indirecto">Gasto directo $<?php echo number_format($fila['GASTO_INDIRECTO'], 2) ?>  </label>
                        <label for="reserva">Reserva $<?php echo number_format($fila['RESERVA_TOTAL'], 2) ?>  </label>
                    </div>
                </div>


            </div>
        </div>
        <?php
            mysqli_close($mysqli);
        ?>
    </div>
    

    
    
</body>
</html>