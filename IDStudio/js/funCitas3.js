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
      document.getElementById("nextBtn").innerHTML = "Enviar";
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

function removeElement(event){
    console.log(event.target.previousElementSibling);
    event.target.previousElementSibling.remove();
    event.target.previousElementSibling.remove();
    event.target.remove();
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

function addElementWorkDays(){
    const input=document.getElementById("workdaysSelect");
    var lista=document.getElementById("div-lista-workdays");
  
    var seleccionTxt=input.text;//contiene lo que dice en la opcion txt
    var seleccionVal=input.value;//contiene el val
    if(seleccionVal!="default"){
        console.log(seleccionTxt);
        var nuevoElemento = `<div></div>
        <div class="notification is-success">`+seleccionVal+`</div>
        <p class="delete-btn" onclick="removeElement(event)">-</p>`;
        lista.innerHTML+=(nuevoElemento);
    }else{
        alert("Añade un día válido");
    }
}

function addElementFechaInicial(){
    const input=document.getElementById("fechaInicial")
    var lista=document.getElementById("div-lista-fecha-inicial");
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

function addElementFechaFinal(){
    const input=document.getElementById("fechaFinal")
    var lista=document.getElementById("div-lista-fecha-final");
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

function addElementPropinas(){
  const input=document.getElementById("propinasSelect");
  var lista=document.getElementById("div-lista-propinas");

  var seleccionTxt=input.text;//contiene lo que dice en la opcion txt
  var seleccionVal=input.value;//contiene el val
  if(seleccionVal!="default"){
      console.log(seleccionTxt);
      var nuevoElemento = `<div></div>
      <div class="notification is-success">`+seleccionVal+`</div>
      <p class="delete-btn" onclick="removeElement(event)">-</p>`;
      lista.innerHTML+=(nuevoElemento);
  }else{
      alert("Añade una propina válida");
  }
}

function obtenerPropinas(){
  const lista=document.getElementById("div-lista-propinas");
  
  var propinas="";
  for(var i=0;i<lista.childElementCount;i++){
    if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
    propinas+=lista.children[i].innerHTML+"-";
  }
  return propinas;
}

function obtenerEstilistas(){
    const lista=document.getElementById("div-lista-estilistas");
    
    var estilistas="";
    for(var i=0;i<lista.childElementCount;i++){
      if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
      estilistas+=lista.children[i].innerHTML;
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
    if(Trabajadoras=="Mia-" || Trabajadoras=="Ely-" || Trabajadoras=="Arely-" || Trabajadoras=="Yarleth-"){
      TipoDeTrabajadora="estilista";
      return TipoDeTrabajadora;
    }
    else{
      TipoDeTrabajadora="auxiliar";
      return TipoDeTrabajadora;
    }
    
  }

function obtenerWorkDays(){
    const lista=document.getElementById("div-lista-workdays");
    
    var WorkDays="";
    for(var i=0;i<lista.childElementCount;i++){
      if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
      WorkDays+=lista.children[i].innerHTML;
    }
    return WorkDays;
}

function obtenerFechaInicial(){
    const lista=document.getElementById("div-lista-fecha-inicial");
    
    var fechaInicial="";
    for(var i=0;i<lista.childElementCount;i++){
      if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
      fechaInicial+=lista.children[i].innerHTML;
    }
    return fechaInicial;
}

function obtenerFechaFinal(){
    const lista=document.getElementById("div-lista-fecha-final");
    
    var fechaFinal="";
    for(var i=0;i<lista.childElementCount;i++){
      if(lista.children[i].innerHTML!="" && lista.children[i].innerHTML!="-")
      fechaFinal+=lista.children[i].innerHTML;
    }
    return fechaFinal;
}

function siguienteAnterior(n){
    var x = document.getElementsByClassName("tab");
    if(n==1 && !validarPaso())return false;
    x[currenttab].style.display = "none";
    currenttab = currenttab + n;
    if (currenttab >= x.length) {
      //...the form gets submitted:
      window.location="./InsertadoPago.php/?estilistas="+obtenerEstilistas()+"&workdays="+obtenerWorkDays()+"&fechaI="+obtenerFechaInicial()+"&fechaF="+obtenerFechaFinal()+"&trabajadora="+Estilista_o_Auxiliar()+"&propinas="+obtenerPropinas();
      //window.location="./AgregaPagos.php/?estilistas="+obtenerEstilistas()+"&workdays="+obtenerWorkDays()+"&fechaI="+obtenerFechaInicial()+"&fechaF="+obtenerFechaFinal()+"&trabajadora="+Estilista_o_Auxiliar();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currenttab);
  } 

//funcion que valida si una etapa esta completa
function validarPaso(){
    var valido=true;
    var advertencia="";
    if(currenttab==0){
      if(document.querySelector("#div-lista-estilistas").childElementCount==0){
        advertencia="Debes seleccionar al menos una Estilista<br>";
        valido=false;
      }
      if(document.querySelector("#div-lista-workdays").childElementCount==0){
        advertencia="Debes seleccionar al menos un Día";
        valido=false;
      }
      if(document.querySelector("#div-lista-workdays").childElementCount==0){
        advertencia="Debes seleccionar al menos un Día";
        valido=false;
      }

    }else if(currenttab==1){
        if(document.querySelector("#div-lista-fecha-inicial").childElementCount==0){
            advertencia="Debes seleccionar al menos una Fecha<br>";
            valido=false;
        }
        if(document.querySelector("#div-lista-fecha-final").childElementCount==0){
            advertencia="Debes seleccionar al menos una Fecha<br>";
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