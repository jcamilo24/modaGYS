<?php
  session_start();
  $_SESSION['Idusuario']="";
  $_SESSION['Nombreusuario']="";
  $_SESSION['Idperfil']="";
  $_SESSION['Pagina']="";
  $_SESSION['Foto']="";
  $_SESSION['Idproducto']="";
  include("conectarbdmodagys.php");
  $conectarbasedatos = Conectar();
  $Usuario = $_POST['Usuario'];
  $Clave = $_POST['Clave'];
  $Query = "SELECT * FROM tbl_usuario WHERE nombre_usuario = '".$Usuario."'";

  if ($Result = $conectarbasedatos->query($Query)) {
    $fila = $Result->fetch_assoc();
    if ($Clave == $fila['Clave']) {
      $_SESSION['Idusuario'] = $fila['id_usuario'];
      $_SESSION['Nombreusuario'] = $fila['nombre_usuario'];
      $_SESSION['Idperfil'] = $fila['id_perfil'];
      $Result->free();
      $conectarbasedatos->close();
      header('location: inventario.php');
    }
    else {
      //alert("NO conecto con base de datos");
      $Result->free();
      $conectarbasedatos->close();
      header('location: index.php');
    }
  }
  else {
    mysqli_close($conectarbasedatos);
    header('location: index.php');
  }
 ?>
