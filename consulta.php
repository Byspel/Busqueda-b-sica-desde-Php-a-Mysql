<?php 
header('Content-Type: application/json');
require('conexion.php');
$con = Conectar();
$SQL = 'SELECT id, nombres, apellidos, email, direccion, telefono FROM personas';
$stmt = $con->prepare($SQL);
$result = $stmt->execute();
$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
echo json_encode($rows);
?>