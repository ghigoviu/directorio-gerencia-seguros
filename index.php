<?php

    include "./headers.html";

    $mysqli = new mysqli("localhost", "root", "", "siniestros");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    //echo $mysqli->host_info . "\n";

    echo "Orden inverso...\n";

    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Siniestro</th>";
    echo "</tr>";

    

    echo "</table>";

?>