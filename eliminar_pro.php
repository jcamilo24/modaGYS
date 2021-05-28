<?php
  include("conectarbdmodagys.php");
  $id_produc = $_GET['Tipoid'];
  $conectarbasedatos = Conectar();

  $Query = " DELETE FROM tbl_producto WHERE id_producto = '".$id_produc."'";

  $Exito = $conectarbasedatos->query($Query);

  if ($Exito = $conectarbasedatos->query($Query))
  {
    $conectarbasedatos->close();
    header('location: inventario.php');
  }
  else {
    $conectarbasedatos->close();
    var_dump($Query);
    exit;
  }

 ?>
