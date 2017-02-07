<?php
// conectar
$mysqli=mysqli_connect('127.0.0.1','root','','tienda');
// Verificar la conexion
if (mysqli_connect_errno($mysqli)) {
  echo "Fallo la conexion". mysqli_connect_errno();
}
// ejecutar la sentencia SQL
$resultado=mysqli_query($mysqli,"SELECT * FROM productos");
// imprimir filas
while ($fila =mysqli_fetch_assoc($resultado)) {
  echo "<br>";
  echo $fila['nombre'].' cuesta '.$fila['precio'].' sus tallas son '.$fila['talla'];
}
// liberar memorias
mysqli_free_result($resultado);
// cerrar la conexion
mysqli_close($mysqli);

 ?>
