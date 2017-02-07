<?php
try {
  $pdo=new PDO('mysql:host=127.0.0.1;dbname=tienda',
               'root',
                ''
    );
$sql='SELECT nombre, precio FROM productos';

$resultado=$pdo->query($sql);

foreach ($resultado as $fila) {
      echo "{$fila['nombre']} vale {$fila['precio']}.<br>";
}


} catch (PDOException $e) {
  echo 'error!'.$e->getMessange();
}finally{
    $pdo=null;
}
 ?>
