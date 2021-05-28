<?php
session_start();
$_SESSION['Idusuario']="";
$_SESSION['Nombreusuario']="";
$_SESSION['Idperfil']="";
include("conectarbdmodagys.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Moda G&S</title>
    <link rel="stylesheet" href="css/estilos.css">
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
              <p class="texto_inicio"><a href="index.html"></a>Inicio</p>
          </ul>
        </div>
        <div class="opciones_menu">
          <ul>
              <img src="recursos/iconos/compras.png" alt="" width="30" height="30" >
              <p class="texto_inicio">Mis Pedidos</p>
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
      <div class="infoCabecera">
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
        <div class="info5">
          <li> <img src="recursos/iconos/usuario.png" alt="" width="25" height="25"> <a class="a_info" href="inicio_sesion.php">Iniciar Sesion</a></li>
          <li> <img src="recursos/iconos/compras.png" alt="" width="30" height="30"> <a href="#" class="a_info">Compras</a></li>
        </div>
      </div>
    </header>
    <div class="baner_ofertas" style="position: relative;">
    </div>
    <section class="main">
      <div id="filtro" style="top: 0%;">
        <div class="filtro_statico" id="filtro_prod" style="padding: 10px; width: 90%; ">
          <div class="logo">
            <img src="recursos/imagenes/logogys.png" alt="" width="150">
          </div>
          <div class="filtro_todo">
            <label for="acces">Categoria</label>
            <select id="categoria" name="idcategoria" onchange="Filtrar()">
              <option value='n/n'> Todo </option>
              <?php
                $conectarbasedatos=Conectar();
                $Query = "SELECT * FROM tbl_categoria ORDER BY categoria;";
                if ($Result = $conectarbasedatos->query($Query))
                {
                  while ($Reg = $Result->fetch_assoc()) {
                    echo "<option value='".$Reg['id_categoria']."'>".$Reg['categoria']."</option>";
                  }
                  $Result->free();
                }
                $conectarbasedatos->close();
               ?>
            </select>
            <!--input type="radio" name="filtro" id="todos" checked-->
          </div>
          <div class="filtro_hombre">
            <label for="acces">Marca</label>
            <select id="marca" name="idmarca" onchange="Filtrar()">
              <option value='n/n'> Todas </option>
              <?php
                $conectarbasedatos=Conectar();
                $Query = "SELECT * FROM tbl_marca ORDER BY marca;";
                if ($Result = $conectarbasedatos->query($Query))
                {
                  while ($Reg = $Result->fetch_assoc()) {
                    echo "<option value='".$Reg['id_marca']."'>".$Reg['marca']."</option>";
                  }
                  $Result->free();
                }
                $conectarbasedatos->close();
               ?>
            </select>
            <!--input type="radio" name="filtro" id="hombr" -->
          </div>
          <div class="filtro_mujer">
            <!--input type="radio" name="filtro" id="mujer"-->
            <label for="mujer">Linea</label>
            <select id="linea" name="idlinea" onchange="Filtrar()">
              <option value='n/n'> Todas </option>
              <?php
                $conectarbasedatos=Conectar();
                $Query = "SELECT * FROM tbl_linea_uso ORDER BY nombre;";
                if ($Result = $conectarbasedatos->query($Query))
                {
                  while ($Reg = $Result->fetch_assoc()) {
                    echo "<option value='".$Reg['id_linea']."'>".$Reg['nombre']."</option>";
                  }
                  $Result->free();
                }
                $conectarbasedatos->close();
               ?>
            </select>
          </div>
          <div class="filtro_buscar">
            <img style="cursor:pointer;" onclick="BuscarPro()" src="recursos/iconos/buscar.png" alt="" width="30" height="30" style="position: absolute;">
            <input id="schpro" type="search" name="" value="" placeholder="Buscar..." style="width: 60%; height: 25px; position: absolute; left: 50px;" onkeyup='Valkey()'>
          </div>
        </div>
      </div>
      <div class="pro_cont"  style="margin-left: 8%;">
      <div class="productos_contenedor">
          <?php
              $conectarbasedatos = Conectar();
              $Query = "SELECT id_producto, tbl_producto.nombre as nombreproducto, valor_venta, foto, tbl_marca.id_marca,";
              $Query .= "tbl_marca.marca as nombreMarcam, tbl_categoria.id_categoria, categoria FROM tbl_producto,";
              $Query .= "tbl_marca, tbl_categoria WHERE tbl_producto.id_marca = tbl_marca.id_marca AND tbl_producto.id_categoria = ";
              $Query .= "tbl_categoria.id_categoria ORDER BY tbl_producto.nombre";

              if($Result = $conectarbasedatos->query($Query))
              {
                //alert("entro a la base");
                while ($reg = $Result->fetch_assoc())
                {
                  $temp = "<div class='productos' id='".$reg['id_producto']."'>";
                  $temp .= "<img src='".$reg['foto']."' width='300' height='300'><p>".$reg['nombreproducto']."</p>";
                  $temp .= "<p>".$reg['categoria']."</p><p>".$reg['nombreMarcam']."</p>";
                  $temp .= "<p>".$reg['valor_venta']."</p></div>";
                  echo $temp;
                }
              }
              $Result->free();
              $conectarbasedatos->close();
            ?>
          </div>
        </div>
    </section>
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
    <script src="./js/scrventas.js"></script>
  </body>

</html>
