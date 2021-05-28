<?php
  include("conectarbdmodagys.php");

  $conectarbasedatos = Conectar();

  $Valores = "id_usuario ='".$_POST['id_user']."', nombre_usuario = '".$_POST['nombre']."', Clave = '".$_POST['clave']."', foto = '".$_POST['foto']."'";

  $Query = "UPDATE tbl_usuario SET ".$Valores." WHERE id_usuario = '".$_POST['id_user']."'";

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
