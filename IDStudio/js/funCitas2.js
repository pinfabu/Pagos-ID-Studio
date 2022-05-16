var currenttab=0;
showTab(currenttab);

function showTab(n) {
    // primero obtengo todos los tab
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    // ... ajusta los botones prev y next:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
      console.log("boton mostrado");
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Reservar";
    } else {
      document.getElementById("nextBtn").innerHTML = "Siguiente";
    }
    // ... ajusta el step los circulitos de arriba:
    fixStepIndicator(n);
  }

  function fixStepIndicator(n) {
    //remueve el activo de los steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... añade la clase active a los steps:
    x[n].className += " active";
  }

function addElementFecha(){
  const input=document.getElementById("hora")
  var lista=document.getElementById("div-lista-fechas");
  var seleccionTxt=input.text;//contiene lo que dice en la opcion txt
  var seleccionVal=input.value;//contiene el val
  console.log(seleccionTxt);
    if(seleccionVal!=""){
        //console.log(seleccionTxt);
        var nuevoElemento = `<div></div>
        <div class="notification is-success">`+seleccionVal+`</div>
        <p class="delete-btn" onclick="removeElement(event)">-</p>`;
        lista.innerHTML+=(nuevoElemento);
    }else{
        alert("Añade una fecha válida");
    }
}

//funcion para añadir elemento del servicioSelect  a la lista
function addElementServicios(){
    const select=document.getElementById("servicioSelect");
    var lista=document.getElementById("div-lista-servicios");

    var seleccionTxt=select.options[select.selectedIndex].text;//contiene lo que dice en la opcion txt
    var seleccionVal=select.options[select.selectedIndex].value;//contiene el val
    
    if(seleccionVal!="default"){
        console.log(seleccionTxt);
        var nuevoElemento = `<div></div>
        <div class="notification is-success">`+seleccionTxt+`</div>
        <p class="delete-btn" onclick="removeElement(event)">-</p>`;
        lista.innerHTML+=(nuevoElemento);
    }else{
        alert("Añade un servicio válido");
    }
}

function addElementPrecios(){
  const select=document.getElementById("precioSelect");
  var lista=document.getElementById("div-lista-precios");

  var seleccionTxt=select.options[select.selectedIndex].text;//contiene lo que dice en la opcion txt
  var seleccionVal=select.options[select.selectedIndex].value;//contiene el val
  //alert(seleccionTxt*2);
  if(seleccionVal!="default"){
      console.log(seleccionTxt);
      var nuevoElemento = `<div></div>
      <div class="notification is-success">`+seleccionTxt+`</div>
      <p class="delete-btn" onclick="removeElement(event)">-</p>`;
      lista.innerHTML+=(nuevoElemento);
  }else{
      alert("Añade un precio válido");
  }
}

function addElementEstilistas(){
  const select=document.getElementById("estilistasSelect");
  var lista=document.getElementById("div-lista-estilistas");

  var seleccionTxt=select.options[select.selectedIndex].text;//contiene lo que dice en la opcion txt
  var seleccionVal=select.options[select.selectedIndex].value;//contiene el val
  
  if(seleccionVal!="default"){
      console.log(seleccionTxt);
      var nuevoElemento = `<div></div>
      <div class="notification is-success">`+seleccionTxt+`</div>
      <p class="delete-btn" onclick="removeElement(event)">-</p>`;
      lista.innerHTML+=(nuevoElemento);
  }else{
      alert("Añade una Estilista o Auxiliar válida");
  }
}

//funcion que remueve elemento de lista
function removeElement(event){
    console.log(event.target.previousElementSibling);
    event.target.previousElementSibling.remove();
    event.target.previousElementSibling.remove();
    event.target.remove();
}
//funcion que selecciona el paso siguiente// n es 1 o -1
function siguienteAnterior(n){
  var x = document.getElementsByClassName("tab");
  if(n==1 && !validarPaso())return false;
  x[currenttab].style.display = "none";
  currenttab = currenttab + n;
  if (currenttab >= x.length) {
    //...the form gets submitted:
    window.location="./AgregarPagos.php/?estilistas="+obtenerEstilistas()+"&trabajos="+obtenerServicios()+"&precios="+obtenerPrecios()+"&fechas="+obtenerFechas()+"&comisiones="+calcularComisiones()+"&trabajadora="+Estilista_o_Auxiliar();
    //window.location="./InputPagos.php/?estilistas="+obtenerEstilistas()+"&trabajos="+obtenerServicios()+"&precios="+obtenerPrecios()+"&fechas="+obtenerFechas()+"&comisiones="+calcularComisiones();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currenttab);
} 
//funcion que obtiene los nombres de los servicios en texto concatenado
function obtenerServicios(){
    const lista=document.getElementById("div-lista-servicios");
    
    var servicios="";
    for(var i=0;i<lista.childElementCount;i++){
      if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
        servicios+=lista.children[i].innerHTML+"-";
    }
    return servicios;
}


function obtenerPrecios(){
  const lista=document.getElementById("div-lista-precios");
  
  var precios="";
  for(var i=0;i<lista.childElementCount;i++){
    if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
      precios+=lista.children[i].innerHTML+"-";
  }
  return precios;
}

function obtenerEstilistas(){
  const lista=document.getElementById("div-lista-estilistas");
  
  var estilistas="";
  for(var i=0;i<lista.childElementCount;i++){
    if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
    estilistas+=lista.children[i].innerHTML+"-";
  }
  return estilistas;
}

function Estilista_o_Auxiliar(){
  const lista=document.getElementById("div-lista-estilistas");

  var Trabajadoras="";
  var TipoDeTrabajadora="";
  for(var i=0;i<lista.childElementCount;i++){
    if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
    Trabajadoras+=lista.children[i].innerHTML+"-";
  }
  if(Trabajadoras=="Mia-" || Trabajadoras=="Ely-" || Trabajadoras=="Arely-"|| Trabajadoras=="Yarleth-"){
    TipoDeTrabajadora="estilista";
    return TipoDeTrabajadora;
  }
  else{
    TipoDeTrabajadora="auxiliar";
    return TipoDeTrabajadora;
  }
  
}

function calcularComisiones(){
  const listaEstilista=document.getElementById("div-lista-estilistas")
  const lista=document.getElementById("div-lista-precios");
  var estilistas="";
  var comision="";
  for(var i=0;i<listaEstilista.childElementCount;i++){
    if(listaEstilista.children[i].innerHTML!="" && listaEstilista.children[i].innerHTML!="-")
    estilistas+=listaEstilista.children[i].innerHTML+"-";
  }
  if(estilistas=="Mia-"){
    //alert("Es Mia");
    for(var i=0;i<lista.childElementCount;i++){
      if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
      comision+=lista.children[i].innerHTML*.25+"-";
    }
  }
  else{
    //alert("No es Mia");
    for(var i=0;i<lista.childElementCount;i++){
      if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
      comision+=lista.children[i].innerHTML*.2+"-";
    }
  }
  return comision;
}

//obtener horario
function obtenerFechas(){
  const lista=document.getElementById("div-lista-fechas");
  
  var fechas="";
  for(var i=0;i<lista.childElementCount;i++){
    if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
      fechas+=lista.children[i].innerHTML+"-";
  }
  return fechas;
}
//funcion que valida si una etapa esta completa
function validarPaso(){
  var valido=true;
  var advertencia="";
  if(currenttab==0){
    if(document.querySelector("#div-lista-servicios").childElementCount==0){
      advertencia="Debes seleccionar al menos un servicio<br>";
      valido=false;
    }
    if(document.querySelector("#div-lista-precios").childElementCount==0){
      advertencia="Debes seleccionar al menos un precio";
      valido=false;
    }
  }else if(currenttab==1){
    if(document.querySelector("#hora").value==""){
      advertencia+="Debes ingresar un día de trabajo";
      valido=false;
    }
  }

  if(!valido){
    document.querySelector("#div-advertencia").innerHTML=advertencia;
    document.querySelector("#div-advertencia").style.display="block";
  }else{
    document.querySelector("#div-advertencia").style.display="none";
  }
  return valido;
}