<?php

    include "./headers.html";

    $mysqli = new mysqli("localhost", "root", "", "siniestros");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    //echo $mysqli->host_info . "\n";
    
    $resultado = $mysqli->query("SELECT id, siniestro FROM siniestros ORDER BY id ASC");

    echo "Orden inverso...\n";

    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Siniestro</th>";
    echo "</tr>";
    for ($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila--) {
        $resultado->data_seek($num_fila);
        $fila = $resultado->fetch_assoc();
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['siniestro'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

?>