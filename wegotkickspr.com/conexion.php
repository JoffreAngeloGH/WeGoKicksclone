<?php

$cone = new mysqli("localhost", "root", "", "wgk");

if ($cone->connect_error) {

    echo "Fallo la conexion. " . $cone->connect_error;
}