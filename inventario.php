<?php
session_start();
$_SESSION['Idusuario']="";
$Nombre = $_SESSION['Nombreusuario'];
$Perfil = $_SESSION['Idperfil'];
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
  <script src="./js/scrventas.js"></script>
  <head>
    <meta charset="utf-8">
    <title>Moda G&S</title>
    <link rel="stylesheet" href="css/estilos_inventario.css">
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
              <p class="texto_inicio"><a href="cerrarsesion.php" >Inicio</a></p>
          </ul>
        </div>
        <div class="opciones_menu">
          <ul>
              <img src="recursos/iconos/nosotras.png" alt="" width="30" height="30" >
              <p class="texto_inicio" onclick='winopen("add_usuario.php")'>Usuarios</p>
          </ul>
        </div>
      </div>
    </div>
    <header>
      <div class="titulo_inventario">
        <p>INVENTARIO MODA G&S</p>
        <?php echo "Usuario: ".$Nombre." . "?>
        <data id="perfil" value="<?php echo $Perfil ?>"></data>
      </div>
    </header>
    <div class="main" >
      <div class="titulo_producto">
        <p>Añadir Productos</p>
        <img style="cursor:pointer; margin:10px;" src="recursos/iconos/anadir.png" alt="" width="50" height="50" onclick="location.href='nuevoproducto.php'">
      </div>
      <div class="lista_productos_actuales">
        <div class="barra_datos_productos">
          <p class="p_datos_usuario">Codigo producto</p><p class="p_datos_usuario">Nombre Producto</p><p class="p_datos_usuario">Nombre Marca</p><p class="p_datos_usuario">Cantidad</p><p class="p_datos_usuario">Costo Producto</p><p class="p_datos_usuario_foto">Foto</p><p class="p_edit_elim">Editar</p><p class="p_edit_elim"> Eliminar </p>
        </div>
        <div class="contenido_productos">
          <?php
            $conectarbasedatos=Conectar();
            $Query = "SELECT tbl_producto.id_producto, tbl_producto.cantidad, tbl_categoria.categoria, tbl_marca.marca, tbl_producto.nombre AS nombre_producto, tbl_producto.valor_venta, tbl_producto.foto FROM tbl_producto INNER JOIN tbl_marca ON tbl_producto.id_marca = tbl_marca.id_marca INNER JOIN tbl_categoria ON tbl_producto.id_categoria = tbl_categoria.id_categoria ORDER BY id_producto";
            if ($Result = $conectarbasedatos->query($Query))
            {
                while ($Reg = $Result->fetch_assoc())
                {
                  echo "<ul>";
                    echo "<p class='p_datos_bd' >".$Reg['id_producto']."</p>";
                    echo "<p class='p_datos_bd_nombre' >".$Reg['nombre_producto']."</p>";
                    echo "<p class='p_datos_bd_nombre' >".$Reg['marca']."</p>";
                    echo "<p class='p_datos_bd_nombre' >".$Reg['cantidad']."</p>";
                    echo "<p class='p_datos_bd_nombre' >".$Reg['valor_venta']."</p>";
                    echo "<a class='a_foto_bd'><img src='".$Reg['foto']."' width='60' height='70'></a>";
                    echo "<a class='a_datos_bd' style=' height: 40px;' href='modificar_form_pro.php?Tipoid=".$Reg['id_producto']."'>";
                    echo "<img style='margin-left: 1px;' src='recursos/iconos/editar.png' width='40' height='40'></a>";
                    echo "<a class='a_datos_bd' style='width: 40px;' href='eliminar_pro.php?Tipoid=".$Reg['id_producto']."'>";
                    echo "<img style='margin-left: 1px;' src='recursos/iconos/eliminar.png' width='40' height='40' onclick='return Eliminar()'></a>";
                  echo "</ul>";

                }
                $Result->free();
            }
            $conectarbasedatos->close();
           ?>
        </div>
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

</html>
