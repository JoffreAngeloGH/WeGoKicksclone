<?php
include "conexion.php";
// Editar Productos

$sql = "UPDATE producto SET nombre = '" . $_POST['nombre'] . "',  cantidad = " . $_POST['cantidad'] . ",
precio = " . $_POST['precio'] . ",descrip = '" . $_POST['descrip'] . "',idcategoria = '" . $_POST['idcategoria'] . "'
WHERE idproducto = ". $_POST['id'] . ";";

// var_dump($sql);
// var_dump($_POST);
$cone->query($sql);
header("Location: crud.php");