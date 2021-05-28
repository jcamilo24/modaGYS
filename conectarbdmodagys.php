<?php
header('Content-Type: text/html; charset=UTF-8');

function Conectar()
{
  $Servidor = "localhost";
  $Based = "bd_modagys";
  $Usuario = "camilo";
  $Clave = "camilo123";

  $conn = new mysqli($Servidor, $Usuario, $Clave, $Based);
  if ($conn->connect_errno)
  {
    var_dump($conn);
    exit;
  }
  return $conn;
}
?>
