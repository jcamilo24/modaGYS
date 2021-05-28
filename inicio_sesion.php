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
    <link rel="stylesheet" href="css/estilos_inicio_sesion.css">
  </head>
  <body>
    <div class="menu_lateral">
      <div class="pos_menulateral">
        <div class="logo_menu">
          <p class="titulo_menu">MENU</p>
          <img src="recursos/iconos/menu.png" alt="" width="35" height="35">
        </div>
        <div class="opciones_menu">
          <ul>
              <img src="recursos/iconos/home.png" alt="" width="30" height="30" >
              <p class="texto_inicio"><a href="index.php">Inicio</a></p>
          </ul>
        </div>
        <div class="opciones_menu">
          <ul>
              <img src="recursos/iconos/nosotras.png" alt="" width="30" height="30" >
              <p class="texto_inicio">Nosotras</p>
          </ul>
        </div>
      </div>
    </div>
    <header>
      <div class="info1">
        <li> <img src="recursos/iconos/campanario.png" alt="" width="40" height="40"><a href="#" class="a_info">Colombia | Popayan </a></li>
      </div>
      <div class="info2">
        <li> <img src="recursos/iconos/whatsapp.png" alt="" width="40" height="40"> <a class="a_info">3206208487 - 3104625520</a></li>
      </div>
      <div class="info3">
        <li> <img src="recursos/iconos/instagram.png" alt="" width="40" height="40"> <a href="#" class="a_info">G&Smodas.12</a></li>
      </div>
      <div class="info4">
          <li> <img src="recursos/iconos/facebook.png" alt="" width="40" height="40"> <a href="#" class="a_info">G&Smodas</a></li>
        </div>
    </header>
    <div class="main" >
      <form action="verificarusuario.php" method="post" autocomplete="off" name="verificarusuario">
      <div class="registro">
        <div class="user">
          <img src="recursos/iconos/user.png" alt="" width="40" height="40">
          <input class="datos_user" type="text" name="Usuario" value="" placeholder="usuario" required autofocus>
        </div>
        <div class="pass">
          <img src="recursos/iconos/pass.png" alt="" width="40" height="40">
          <input class="datos_user" type="password" name="Clave" value="" placeholder="contraseña" txminlength="4" required>
        </div>
        <div class="btn">
          <div id="btn_aceptar">
            <input type="submit" name="ingresar" value="aceptar" class="btns">
          </div>
          <div id="btn_cancelar">
            <input type="button" name="cancelar" onclick="location.href='index.php'" value="cancelar" class="btns">
          </div>
        </div>
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
