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

  function addElementCitas(){
    const select=document.getElementById("citasSelect");
    var lista=document.getElementById("div-lista-citas");
  
    var seleccionTxt=select.options[select.selectedIndex].text;//contiene lo que dice en la opcion txt
    var seleccionVal=select.options[select.selectedIndex].value;//contiene el val
    if(seleccionVal=="ID_Cita: #"){
        alert("Funcionó");
    }
    if(seleccionVal!="default"){
        console.log(seleccionTxt);
        var nuevoElemento = `<div></div>
        <div class="notification is-success">`+seleccionTxt+`</div>
        <p class="delete-btn" onclick="removeElement(event)">-</p>`;
        lista.innerHTML+=(nuevoElemento);
    }else{
        alert("Añade un ID_Cita válido");
    }
  }

function addElementWorkDays(){
    const select=document.getElementById("workdaysSelect");
    var lista=document.getElementById("div-lista-workdays");
  
    var seleccionTxt=select.options[select.selectedIndex].text;//contiene lo que dice en la opcion txt
    var seleccionVal=select.options[select.selectedIndex].value;//contiene el val
    
    if(seleccionVal!="default"){
        console.log(seleccionTxt);
        var nuevoElemento = `<div></div>
        <div class="notification is-success">`+seleccionTxt+`</div>
        <p class="delete-btn" onclick="removeElement(event)">-</p>`;
        lista.innerHTML+=(nuevoElemento);
    }else{
        alert("Añade una Día válido");
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
    if(Trabajadoras=="Mia-" || Trabajadoras=="Ely-" || Trabajadoras=="Arely-"){
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
      window.location="./PagosConsultados.php/?estilistas="+obtenerEstilistas()+"&fechaI="+obtenerFechaInicial()+"&fechaF="+obtenerFechaFinal()+"&trabajadora="+Estilista_o_Auxiliar();
      //window.location="./ConsultaPagos.php/?estilistas="+obtenerEstilistas()+"&workdays="+obtenerWorkDays()+"&fechaI="+obtenerFechaInicial()+"&fechaF="+obtenerFechaFinal()+"&trabajadora="+Estilista_o_Auxiliar();
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
      if(document.querySelector("#div-lista-citas").childElementCount==0){
        advertencia="Debes seleccionar al menos un ID_Cita<br>";
        valido=false;
      }


    }else if(currenttab==1){
        if(document.querySelector("#div-lista-fecha-fechas").childElementCount==0){
            advertencia="Debes seleccionar al menos una Fecha<br>";
            valido=false;
        }
  }
  else if(currenttab==2){
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