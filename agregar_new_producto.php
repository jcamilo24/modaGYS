<?php
  include("conectarbdmodagys.php");

  $conectarbasedatos = Conectar();

  $id_prducto = "'".$_POST['id_producto']."'";
  $nombre_producto = "'".$_POST['nombre_producto']."'";
  $cantidad = "'".$_POST['cantidad']."'";
  $valor_venta = "'".$_POST['valor_venta']."'";
  $Foto = "'".$_POST['foto']."'";
  $nombre_categoria = "'".$_POST['nombre_categoria']."'";
  $nombre_marca = "'".$_POST['nombre_marca']."'";


  $Query = "INSERT INTO tbl_producto (id_producto, nombre, cantidad, valor_venta, foto) VALUES (".$id_prducto.", ".$nombre_producto.", ".$cantidad.", ".$valor_venta.", ".$Foto.")";
  $Query1 = "INSERT INTO tbl_categoria (categoria) VALUES (".$nombre_categoria.")";
  $Query2 = "INSERT INTO tbl_marca (marca) VALUES (".$nombre_marca.")";

  if ($Exito = $conectarbasedatos->query($Query) && $Exito = $conectarbasedatos->query($Query1) && $Exito = $conectarbasedatos->query($Query2))
  {
    $conectarbasedatos->close();
    header('location: inventario.php');
  }
  else {
    $conectarbasedatos->close();
    var_dump($Query2);
    exit;
  }

 ?>
