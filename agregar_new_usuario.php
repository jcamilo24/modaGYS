<?php
  include("conectarbdmodagys.php");

  $conectarbasedatos = Conectar();

  $Nombre = "'".$_POST['nombre']."'";
  $Clave = "'".$_POST['clave']."'";
  $Foto = "'".$_POST['foto']."'";
  $Query = "INSERT INTO tbl_usuario(nombre_usuario, Clave, foto) VALUES (".$Nombre.", ".$Clave.", ".$Foto.")";
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
