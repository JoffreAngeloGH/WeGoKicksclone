<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$contraseña = $_POST["contraseña"];

//Login
if(isset($_POST["btningresar"]))
{
	$sql = "SELECT * FROM admin WHERE estado = 1 AND usuario = ? AND contraseña= ?;";	
	$stmt = $cone->prepare($sql);
	$stmt->bind_param("ss",$_POST["usuario"],$_POST["contraseña"]);
	$stmt->execute();
	$stmt->store_result();


	// $query=mysqli_query($cone,$sql);
	// $nr = mysqli_num_rows($query);
	// if($nr);
	if($stmt->affected_rows>0){
		$_SESSION['usuario'] = $_POST["usuario"];
			header("location: crud.php");
	}else {
		echo "<script> alert('Usuario no existe'); window.location='login.php' </script>";
	}
}