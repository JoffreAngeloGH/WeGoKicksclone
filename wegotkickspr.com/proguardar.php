<?php
include "conexion.php";

$sql = "INSERT INTO producto(idproducto,nombre,precio,cantidad,descrip,imagen,idcategoria)
VALUES (null,'" . $_POST['nombre'] . "',
'" . $_POST['precio'] . "',
'" . $_POST['cantidad'] . "',
'" . $_POST['descrip'] . "',
'" . $_POST['imagen'] . "',
" . $_POST['idcategoria'] . ");";


$cone->query($sql);

header("Location: crud.php");
?>