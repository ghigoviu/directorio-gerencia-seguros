<?php

    include "./headers.html";

    $mysqli = new mysqli("localhost", "root", "", "siniestros");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    mysqli_close($mysqli);
    //echo $mysqli->host_info . "\n";

?>