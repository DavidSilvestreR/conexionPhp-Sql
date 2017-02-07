<?php
try {
  $pdo=new PDO('mysql:host=127.0.0.1;dbname=tienda',
               'root',
                ''
    );
$sql='TRUNCATE TABLE productos';
$sentencia=$pdo->prepare($sql);
$sentencia->execute();
//preprarar
$sql='INSERT INTO productos(nombre,talla,precio) VALUES(:nombre,:talla,:precio)';
$sentencia=$pdo->prepare($sql);
//vincular
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':talla',$talla);
$sentencia->bindParam(':precio',$precio);

//ejecutar
//insertar fila
$nombre="Camiseta de Node";
$talla="S";
$precio=1200;
$sentencia->execute();
//insertar otra filas
$nombre="Camiseta de Materialize";
$talla="L";
$precio=2000;
$sentencia->execute();

} catch (PDOException $e) {
  echo 'error!'.$e->getMessange();
}finally{
    $pdo=null;
}



 ?>
