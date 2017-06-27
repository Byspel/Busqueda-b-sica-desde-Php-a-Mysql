<!DOCTYPE html>
<html lang="en">
<head>
  <title>Busqueda básica desde Php a Mysql</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Busqueda básica desde Php a Mysql</h2>
  <form role="form" method="POST">
    <div class="form-group">
      <label for="email">Identificación:</label>
      <input type="text" class="form-control" name="documento" placeholder="Ingrese una identificación" required>
    </div>
    <button type="submit" class="btn btn-default">Consultar</button>
  </form>

<?php 

if($_POST){
require('conexion.php');
$con = Conectar();
$id = $_POST['documento'];
$SQL = 'SELECT id, nombres, apellidos, genero, edad, email, direccion, telefono FROM personas WHERE identificacion = :doc';
$stmt = $con->prepare($SQL);
$result = $stmt->execute(array(':doc'=>$id));
$rows = $stmt->fetchAll(\PDO::FETCH_OBJ);

if(count($rows)){
foreach ($rows AS $row) {
?>
<div class="panel panel-primary">
      <div class="panel-heading">Información del usuario con ID: <?php print($id)?></div>
      <div class="panel-body">
      <?php print("NOMBRES Y APELLIDOS: ".$row->nombres." ".$row->apellidos."<br>")?>
      <?php print("GENERO: ".$row->genero."<br>")?>
      <?php print("EDAD: ".$row->edad."<br>")?>
      <?php print("EMAIL: ".$row->email."<br>")?>
      <?php print("DIRECCIÓN: ".$row->direccion."<br>")?>
      <?php print("TELÉFONO: ".$row->telefono."<br>")?>
      </div>
    </div>
<?php
}
}else{
  echo "El usuario no existe en la base de datos";
}
} 
?>
</div>
</body>
</html>