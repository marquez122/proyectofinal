<?php

$usuario = 'root';
$contraseña = 'asael1993';

try
{
    $mbd = new PDO('mysql:host=localhost:3333;dbname=proyectof',$usuario,$contraseña);
echo"conxion exitosa";

}
catch (PDOException $e){
    print "¡error!:".$e->getMessage()."<br/>";
    die();
}

$aux = $mbd->query('SELECT * FROM users');
var_dump($aux);

echo "<br><br>";

foreach ($mbd->query('SELECT * FROM users') as $fila){

    print_r($fila);

}

echo "<br><br>";

foreach ($mbd->query('SELECT * FROM users') as $fila){

    echo $fila['id']. "  ";
    echo $fila['nombres']. "  ";
    echo $fila['apellido_paterno']. " ";
    echo $fila['apellido_materno']. " ";
    echo $fila['email']. "  ";
    echo $fila['password']. " ";
    echo $fila['levels_id']. "<br><br>";

}

echo "<br><br>";
$email = 'marquezhector122@gmail.com';
$pass = 'asael1993';

$smt = $mbd->prepare("CALL sp_login 1(?,?");
$smt->bindparam(1,$email,PDO::PARAM_STR);
$smt->bindparam(2,$pass,PDO::PARAM_STR);
$smt->execute();
$result = $smt->fetchALL(PDO::FETCH_ASSOC);
var_dump($result);