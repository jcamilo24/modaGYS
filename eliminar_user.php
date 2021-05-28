<?php
  include("conectarbdmodagys.php");
  $conectarbasedatos = Conectar();

  $Query = "DELETE FROM tbl_usuario WHERE id_usuario = '".$_GET['Tipoid']."'";

  if ($Exito = $conectarbasedatos->query($Query))
  {
    $conectarbasedatos->close();
    header('location: add_usuario.php');
  }
  else {
    $conectarbasedatos->close();
    var_dump($Query);
    exit;
  }

 ?>
