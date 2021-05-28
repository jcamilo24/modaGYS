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
    <link rel="stylesheet" href="css/estilos_add_usuario.css">
  </head>
  <body>
    <header>

    </header>
    <div class="main" >
        <div class="titulo_usuario">
          <p>Añadir usuarios</p>
          <img style="cursor:pointer; margin:10px;" src="recursos/iconos/anadir.png" alt="" width="50" height="50" onclick="location.href='nuevouser.php'">
        </div>
        <div class="lista_usuarios_actuales">
          <div class="barra_datos_usuario">
            <p class="p_datos_usuario">Codigo usuario</p><p class="p_datos_usuario">Nombre usuario</p><p class="p_datos_usuario_foto">Foto</p><p class="p_edit_elim">Editar</p><p class="p_edit_elim">Eliminar</p>
          </div>
          <div class="contenido_datos_usuario">
            <?php
              $conectarbasedatos=Conectar();
              $Query = "SELECT * FROM tbl_usuario ORDER BY nombre_usuario";
              if ($Result = $conectarbasedatos->query($Query))
              {
                  while ($Reg = $Result->fetch_assoc())
                  {
                    echo "<ul>";
                      echo "<p class='p_datos_bd' >".$Reg['id_usuario']."</p>";
                      echo "<p class='p_datos_bd_nombre' >".$Reg['nombre_usuario']."</p>";
                      echo "<a class='a_foto_bd'><img src='".$Reg['foto']."' width='60' height='70'></a>";
                      echo "<a class='a_datos_bd' style=' height: 40px;' href='modificar_form_usuario.php?Tipoid=".$Reg['id_usuario']."'>";
                      echo "<img style='margin-left: 1px;' src='recursos/iconos/editar.png' width='40' height='40'></a>";
                      echo "<a class='a_datos_bd' style='width: 40px;' href='eliminar_user.php?Tipoid=".$Reg['id_usuario']."'>";
                      echo "<img style='margin-left: 1px;' src='recursos/iconos/eliminar.png' width='40' height='40' onclick='return Eliminar()'></a>";
                    echo "</ul>";

                  }
                  $Result->free();
              }
              $conectarbasedatos->close();
             ?>
          </div>
        </div>
        <div class="btn_cerrar">
          <button type="button" name="cerrar" onclick="window.close()">Cerrar</button>
        </div>
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
  <script src="./js/scrventas.js"></script>
</html>
