<?php
$mysqli= new mysqli('127.0.0.1','root','','tienda');
// Verificar la conexion
if ($mysqli->connect_errno) {
  echo "fallo al conectar a mysql".$mysqli->connect_errno;
}
//preparar consulta
$sql=" INSERT INTO productos (nombre, talla, precio) VALUES(?,?,?)";
$sentencia=$mysqli->prepare($sql);
if (!$sentencia) {
   echo "fallo la preparacion: ({$mysqli->errno}) {$mysqli->errno}";
}
//vincular parámetros
$nombre='Camiseta RUBY';
$talla='S';
$precio=2000;

if (!$sentencia->bind_param('ssi',$nombre,$talla,$precio)) {
  echo "fallo la vinculacion:({$mysqli->errno})";
}
//ejecutar
if (!$sentencia->execute()) {
    echo "fallo la ejeucion ({$mysqli->errno})";
}else {
  echo "{$sentencia->affected_rows} Fila insertada";
}


//preparar
$sql="SELECT nombre,precio FROM productos";
$sentencia2=$mysqli->prepare($sql);
//ejeccutar:
$sentencia2->execute();
//vincular las varianles de resultados
$sentencia2->bind_result($nombre,$precio);
//usar datos
while ($fila=$sentencia2->fetch()) {
   echo "{$nombre} Cuesta {$precio} <br>";

}












//cerrar centencia
$sentencia->close();
//cerrar
$mysqli->close();


 ?>
