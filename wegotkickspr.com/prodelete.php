<?php
include "conexion.php";

$sql ="DELETE FROM producto WHERE idproducto=" . $_GET['id'] ;
$cone -> query($sql);
header("Location: crud.php");
?>