<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/661bf8cec7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/styles/style.css" type="text/css">
    <script src="./assets/js/datatables.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="./assets/js/datatables/datatables.css" rel="stylesheet" />
    <script src="./assets/js/jquery/jquery.js"></script>
    <script src="./assets/js/datatables/datatables.css"></script>
    
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <title>Directorio</title>
</head>

<body>
    <?php

    $mysqli = new mysqli("localhost", "root", "", "siniestros");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    //echo $mysqli->host_info . "\n";

    $resultado = $mysqli->query("SELECT id, siniestro, fecha_accidente, unidad_regional FROM siniestros ORDER BY id ASC");
    ?>
    <header>
        <!-- Colocar Nav bar-->
    </header>
    <main>
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div
                    class="bg-dark col-auto col-md-3 col-lg-2 min-vh-100 d-flex flex-column justify-content sidebar-container">
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
                                    <i class="fas fa-tablet"></i><span class="fs-4 ms-2 d-none d-sm-inline">Unidades
                                        Regionales</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 py-sm-0">
                                <a href="" class="nav-link text-white">
                                    <i class="fas fa-table-cells-large"></i>
                                    <span class="fs-4 ms-2 d-none d-sm-inline">GNP</span>
                                </a>
                            </li>
                            <li class="nav-item py-2 py-sm-0">
                                <a href="#" class="nav-link text-white active">
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
                <div class="container col-md-9">
                    <h2 class="display-2">Gerencia de seguros</h2>
                    <h4>Contactos de la gerencia de seguros</h4>
                    <div class="container py-3">
                        <table id="datatable" class="table table-striped table-hover display">
                            <thead>
                                <tr>
                                    <th scope="col">Siniestro</th>
                                    <th scope="col">UR</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
                                        $resultado->data_seek($num_fila);
                                        $fila = $resultado->fetch_assoc();
                                        echo "<tr>";
                                        echo "<td>" . $fila['siniestro'] . "</td>";
                                        echo "<td>" . $fila['unidad_regional'] . "</td>";
                                        echo "<td>" . $fila['fecha_accidente'] . "</td>";
                                ?>
                                        <td>
                                            <a class='btn btn-primary' 
                                                href="./versiniestro.php?id=<?php echo urlencode($fila['id']) ?> ">
                                                Ver completo
                                            </a>
                                        </td>
                                <?php
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
</body>
</html>