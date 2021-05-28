<?php
session_start();
$_SESSION['Idusuario']="";
$_SESSION['Nombreusuario']="";
$_SESSION['Idperfil']="";
include("conectarbdmodagys.php");
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<script type="text/javascript">
  if (history.forward(1)) {
    location.replace(history.forward(1));
  }
</script>
  <head>
    <meta charset="utf-8">
    <title>Moda G&S</title>
    <link rel="stylesheet" href="css/estilos_new_usuario.css">
  </head>
  <body>
    <header>

    </header>
    <div class="main" >
        <form class="new_usuario" action="agregar_new_usuario.php" method="post">
            <div class="lbl_datos">
              <p>Id Usuario (A.I)</p></br>
              <p>Nombre</p></br>
              <p>clave</p></br>
              <p>foto</p></br>
            </div>
            <div class="txb_datos">
              <p><input type="text" disabled></p></br>
              <p><input type="text" name='nombre' required autocomplete="off"> *</p></br>
              <p><input type="password" name='clave' required autocomplete="off"> *</p></br>
              <p><input type="file" name='foto' ></p></br>
            </div>
            <div class="btns_formulario">
                <input class="inp_btn" type="submit" name='Aceptar' value="Agregar">
                <input class="inp_btn" type="button" onclick="location.href='add_usuario.php'" value="Cancelar">
            </div>
        </form>

    </div>
    <footer>
      <div class="alinear_redes_sociales">
        <div class="redes_sociales">
          <img src="recursos/iconos/ubicacion.png" alt="" width="40" height="40">
          <p class="p_footer">Popayan-Cauca</p>
        </div>
        <div class="redes_sociales">
          <img src="recursos/iconos/whatsapp1.png" alt="" width="35" height="35">
          <p class="p_footer">3206208487 - 3104625520</p>
        </div>
        <div class="redes_sociales">
          <img src="recursos/iconos/facebook1.png" alt="" width="35" height="35">
          <p class="p_footer">G&Smodas</p>
        </div>
        <div class="redes_sociales">
          <img src="recursos/iconos/instagram2.png" alt="" width="35" height="35">
          <p class="p_footer">G&Smodas.12</p>
        </div>
      </div>
      <div class="pie_pagina">
        <p>EDUAR HERNAN TUQUERRES RUIZ</p>
        <img src="recursos/imagenes/Logo_Autonoma.png" alt="" width="120" height="90">
        <p>2020</p>
      </div>
    </footer>
  </body>

</html>
