<?php
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID STUDIO</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="./Images/salon.jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;1,100;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/general.css">
    <link rel=stylesheet href="css/all.css">
    <link rel="stylesheet" href="css/estiloCitas.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">

    
</head>
<body class="body">
        
  <header>
        <nav>
    
          <div class="container-nav">        
            
            <a href="./InputPagos.html"><img class="logo" src="img/salon.png" alt="ID STUDIO"></a>
            
            <div class="menu">  
              <a href="./InputPagos.php"> Agregar trabajos </a> 
              <a href="./AgregaPagos.php"> Agregar Pagos </a> 
              <a href="./ConsultarLosPagos.php"> Consultar Pagos </a> 
              <a href="./ModificarCitas.php"> Modificar citas </a> 
            </div>  
       
            <!-- Símbolo para pantallas pequeñas -->
            <button class="hamburguer">
              <span></span>
              <span></span>
              <span></span>
            </button>
    
          </div>
    
        </nav>
  </header>
    <br>
    <br>
    <div id="contenedor-citas" class="contenedor-citas">
        <div></div>
        <form id="formCitas" action="" method="get" >
            <!-- Circulos que indican la etapa -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
            <!--AQUI EMPIEZA EL FORMULARIO: -->
            <!--PASO1:Selecciona un servicio -->
            <div id="div-advertencia" class="notification is-danger" style="text-align:center;display:none;"></div>
            <div id="div-paso1" class="tab">

                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Selecciona la Estilista o auxiliar</h1>
                <div style="text-align:center;" id="div-centrador">
                    <select name="estilistas" id="estilistasSelect" class="servicioSelect"  onmousedown="if(this.options.length>10){this.size=10;}" onchange='this.size=0;' onblur="this.size=0;" style="border-radius:5px;border-color:transparent;">
                        <option value="default">Selecciona la auxiliar o estilista</option>
                            <option value="Mia">Mia</option>
                            <option value="Ely">Ely</option>
                            <option value="Arely">Arely</option>
                            <option value="Alisson">Alisson</option>
                            <option value="Fabis">Fabis</option>
                            <option value="Yarleth">Yarleth</option>
                        </optgroup>
                    </select>
                    <br>
                    <button type="button" id="add" class="btn" onclick="addElementEstilistas(event)">Añadir</button>
                    <div id="div-lista-estilistas">

                    </div>
                </div>



                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Selecciona el servicio y añádelo</h1>
                <div style="text-align:center;" id="div-centrador">
                    <select name="servicio" id="servicioSelect" class="servicioSelect"  onmousedown="if(this.options.length>10){this.size=10;}" onchange='this.size=0;' onblur="this.size=0;" style="border-radius:5px;border-color:transparent;">
                        <option value="default">Selecciona un servicio</option>
                        <optgroup label="Balayage/Babylights">
                            <option value="balayage">Balayage</option>
                            <option value="Babylights">Babylights</option>
                        </optgroup>
                        <optgroup label="Tratamientos">
                            <option value="ampolleta">Ampolleta</option>
                            <option value="olaplex">Tratamiento Olaplex</option>
                            <option value="hidratacionintensiva">Tratamieno hidratación intensiva</option>
                            <option value="avyna">Avyna</option>
                        </optgroup>
                        <optgroup label="Cortes">
                            <option value="cortedama">Corte dama/niña</option>
                            <option value="cortecaballero">Corte caballero/niño</option>
                        </optgroup>
                        <optgroup label="Nanoplastia">
                            <option value="nano">Nanoplastia</option>
                        </optgroup>
                        <optgroup label="Tintes">
                            <option value="tinte">Tinte</option>
                            <option value="retoquetinte">Retoque Tinte</option>
                        </optgroup>
                        <optgroup label="Peinado y maquillaje">
                            <option value="peinadoymaquillaje">Peinado y maquillaje</option>
                            <option value="maquillajecasual">Maquillaje casual</option>
                            <option value="peinadocasual">Peinado casual</option>
                            <option value="peinadostraightwave">Peinado Straight/Wave</option>
                            <option value="lavado">Lavado</option>
                        </optgroup>
                        <optgroup label="Matiz">
                            <option value="matiz">Matiz</option>
                        </optgroup>
                        <optgroup label="Global">
                            <option value="global">Global</option>
                        </optgroup>
                        <optgroup label="Uñas">
                            <option value="manicure">Manicure</option>
                            <option value="gelishmanos">Gelish en manos</option>
                            <option value="gelishpies">Gelish en pies</option>
                            <option value="acrilicas">Acrilicas</option>
                            <option value="esculturales">Esculturales</option>
                            <option value="diseno">Diseño</option>
                            <option value="setefecto">Set(efecto)</option>
                            <option value="vitaminaunas">Vitamina en uñas</option>
                            <option value="retirogelish">Retiro gelish</option>
                            <option value="retiroacrilico">Retiro acrílico</option>
                            <option value="efectospar">Efectos(par)</option>
                            <option value="disenofrench">Diseño French</option>
                            <option value="disenoenuna">Diseño en uña (par)</option>
                        </optgroup>
                    </select>
                    <br>
                    <button type="button" id="add" class="btn" onclick="addElementServicios(event)">Añadir</button>
                    <div id="div-lista-servicios">

                    </div>
                </div>

                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Establece el precio y añádelo</h1>            
                <div style="text-align:center;" id="div-centrador">
                    <input type="number" id="precioSelect" class="precioSelect" name="precioSelect" min="0" max="4000" step="100" value="1000" style="border-radius:15px;border-color:transparent;font-family:Raleway;font-weight: bold;padding:8px;">
                    <br>
                    <button type="button" id="add" class="btn" onclick="addElementPrecios(event)">Añadir</button>
                    <div id="div-lista-precios">

                    </div>
                </div>
            </div>
            <!--PASO2:Elegir dia-->
            <div id="div-paso2" class="tab">
                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Selecciona el horario</h1>
                <div style="text-align:center;" id="div-centrador-date">
                <!-- <div style="display:grid;grid-template-columns:50% auto auto 20%"> -->
                    <div></div>
                    <strong style="text-align: center;font-family:'Raleway'">Fecha</strong>
                    <div></div>

                    <div></div>
                    <input type="date" name="hora" id="hora" class="input">
                    
                    <div style="display:grid;grid-template-columns:50% auto auto 20%" id="div-boton-centrador">
                        
                    </div>
                    <div></div>
                    <button type="button" id="add" class="btn" onclick="addElementFecha(event)">Añadir</button>
                    <div id="div-lista-fechas">

                    </div>
                </div>
                
            </div>

            <!--Botones-->
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" class="btn" onclick="siguienteAnterior(-1)">Anterior</button>
                    <button type="button" id="nextBtn" class="btn" onclick="siguienteAnterior(1)">Siguiente</button>
                </div>
            </div>
            <br>
            <br>
            <br>
        </form>
        <div></div>
    </div>
    
    <script src="js/funCitas2.js"> </script>
    <script>
        
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
        dd = '0' + dd;
        }

        if (mm < 10) {
        mm = '0' + mm;
        } 
            
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("hora");
    </script>
    
</body>
</html>