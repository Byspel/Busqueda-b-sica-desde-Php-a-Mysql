<?php 
function Conectar (){
	$conexion = null;
	$host = '127.0.0.1';
	$db =   'test';
	$user = 'root';
	$pwd =  'root';
	try {
		$conexion = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
	}
	catch (PDOException $e) {
		echo '<p>No se puede conectar a la base de datos !!</p>';
		exit;
	}
	return $conexion;
}
?>