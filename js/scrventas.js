// espacio variables globales

function Eliminar(){
  var Opcion = confirm('Esta seguro que desea eliminar el Registro?...');
  return Opcion;
}

function BuscarCad(texto, subt, num)
{
  var i, x, n;
  n = num || 0;
  for (x = n; x <= texto.length-subt.length; x++)
  {
    i=0;
    while (i<subt.length && texto[x+i]==subt[i])
      i++;
    if (i==subt.length)
      return x;
  }
  return -1;
}

function BuscarPro()
{
  //alert("esta buscando");
  var Schp, Vs, Vp, Vm, k, ki=0, ti, i, pr, padre;
  Schp = document.getElementById('schpro');
  Vs = document.querySelectorAll('#filtro_prod select');
  for (k = 0; k < Vs.length; k++)
  {
    Vs[k].selectedIndex = 0;
  }
    Vp = document.querySelectorAll('.productos_contenedor p');
    Vm = document.querySelectorAll('.productos');
    ki = Vp.length / Vm.length;
    for (k = 0; k < Vp.length; k+=ki)
      {
        ti = -1;
        for (i = 0; i < ki && ti==-1; i++)
        {
          //alert("busca");
          ti = BuscarCad(Vp[k+i].innerHTML, Schp.value);
        }
          padre= Vp[k].parentNode;
          if (ti==-1) { padre.style.display = "none"; }
          else { padre.style.display = "inline-block"; }
      }
}

function Valkey()
{
  if (event.keyCode==13)
  {
    BuscarPro();
  }
}

function Filtrar()
{
  var Vs, Vp, Vm, p, s, i, ks=0, ka=0, ki=0, tx="", padre;
  document.getElementById('schpro').value = "";
  Vs = document.querySelectorAll('#filtro_prod select');
  for (s = 0; s < Vs.length; s++)
  {
    if (Vs[s].selectedIndex != 0) { ks++; }
  }
    Vp = document.querySelectorAll('.productos_contenedor p');
    Vm = document.querySelectorAll('.productos');
    ki = Vp.length / Vm.length;
    //alert(ki);
    for (p = 0; p < Vp.length; p+=ki)
    {
      ka = 0;
      for (s = 0; s < Vs.length; s++)
      {
        i = Vs[s].selectedIndex;
        if(i != 0)
        {
          if (Vp[p+s+1].innerHTML == Vs[s].options[i].text) { ka++; }
        }
      }
        padre = Vp[p].parentNode;
        if (ka==ks) {  padre.style.display = "inline-block"; }
        else {  padre.style.display = "none"; }
     }
}

function winopen(archivo)
{
  window.open(archivo, 'Agregar Usuario', 'width=500, height=400');
}

function Iniciar() {

}

window.onload=Iniciar();
