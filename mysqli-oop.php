<?php
// conectar
$mysqli=new mysqli('127.0.0.1','root','','tienda');
// Verificar la conexion
if ($mysqli->connect_errno) {
  echo "fallo al conectar a mysql".$mysqli->connect_errno;
}
// ejecutar la sentencia SQL
$resultado=$mysqli->query("SELECT * FROM productos");
// imprimir filas
while ($fila=$resultado->fetch_assoc())
{

  echo "<br>";
  echo $fila['nombre'].' cuesta '.$fila['precio'].' sus tallas son '.$fila['talla'];

}
// liberar memorias
$resultado->free();
// cerrar la conexio
$mysqli->close();
 ?>
