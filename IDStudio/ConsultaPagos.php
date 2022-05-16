<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID STUDIO</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel=stylesheet href="http://localhost:81/IDStudio/css/estiloCitas.css">
    <link rel=stylesheet href="http://localhost:81/IDStudio/css/all.css"><!--Estilo para los símbolos de las redes sociales-->
    <link rel="stylesheet" href="http://localhost:81/IDStudio/css/navbar.css"><!--Estilo para el  menu del header-->
    <link rel="stylesheet" href="http://localhost:81/IDStudio/css/footer.css"><!--Estilo para el footer general-->
    <link rel="stylesheet" href="http://localhost:81/IDStudio/css/general.css"><!--Estilo Formato general de la página-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;1,100;1,300&display=swap" rel="stylesheet">

    </head>
<body class="body">

    <header>
        <nav>
    
          <div class="container-nav">        
            
            <a href="/inicio.html"><img class="logo" src="http://localhost:81/IDStudio/img/salon.png" alt="ID STUDIO"></a>
            
            <div class="menu">  
              <a href="http://localhost:81/IDStudio/InputPagos.php"> Agregar trabajos </a> 
              <a href="http://localhost:81/IDStudio/ConsultaPagos.php"> Agregar Pagos </a>
              <a href="http://localhost:81/IDStudio/ConsultarLosPagos.php"> Consultar los Pagos </a> 

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

    <div id="contenedor-citas" class="contenedor-citas">
        <div></div>
        <form id="formCitas" action="" method="get" >
            <!-- Circulos que indican la etapa -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>

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

                <br>

                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Selecciona el número de días trabajados</h1>
                <div style="text-align:center;" id="div-centrador">
                    <select name="workdays" id="workdaysSelect" class="servicioSelect"  onmousedown="if(this.options.length>10){this.size=10;}" onchange='this.size=0;' onblur="this.size=0;" style="border-radius:5px;border-color:transparent;">
                        <option value="default">Días trabajados</option>
                            <option value="Uno">1</option>
                            <option value="Dos">2</option>
                            <option value="Tres">3</option>
                            <option value="Cuatro">4</option>
                            <option value="Cinco">5</option>
                            <option value="Seis">6</option>
                            <option value="Siete">7</option>
                        </optgroup>
                    </select>
                    <br>
                    <button type="button" id="add" class="btn" onclick="addElementWorkDays(event)">Añadir</button>
                    <div id="div-lista-workdays">

                    </div>
                </div>
            </div>
                <br>
            <div id="div-paso2" class="tab">
                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Selecciona el primer día trabajado de la semana</h1>
                <div style="text-align:center;" id="div-centrador-date">
                    <!-- <div style="display:grid;grid-template-columns:50% auto auto 20%"> -->
                    <div></div>
                    <strong style="text-align: center;font-family:'Raleway'">Fecha</strong>
                    <div></div>

                    <div></div>
                    <input type="date" name="fechaInicial" id="fechaInicial" class="input">
                        
                    <div style="display:grid;grid-template-columns:50% auto auto 20%" id="div-boton-centrador">
                            
                    </div>
                    <div></div>
                    <button type="button" id="add" class="btn" onclick="addElementFechaInicial(event)">Añadir</button>
                    <div id="div-lista-fecha-inicial">

                    </div>
                </div>

                <br>

                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Selecciona el último día trabajado de la semana</h1>
                <div style="text-align:center;" id="div-centrador-date">
                    <!-- <div style="display:grid;grid-template-columns:50% auto auto 20%"> -->
                    <div></div>
                    <strong style="text-align: center;font-family:'Raleway'">Fecha</strong>
                    <div></div>

                    <div></div>
                    <input type="date" name="fechaFinal" id="fechaFinal" class="input">
                        
                    <div style="display:grid;grid-template-columns:50% auto auto 20%" id="div-boton-centrador">
                            
                    </div>
                    <div></div>
                    <button type="button" id="add" class="btn" onclick="addElementFechaFinal(event)">Añadir</button>
                    <div id="div-lista-fecha-final">

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

    <footer>
          <div class="container-footer">
                <div class="redes-container">
                    <ul> 
                        <li><a href="https://www.facebook.com/idstudio.oficial/" class="facebook" target="blank"><i class="fab fa-facebook-f"></i></a> </li> 
                        <li><a href="https://www.instagram.com/idstudio.oficial/" class="instagram" target="blank"><i class="fab fa-instagram"></i></a> </li> 
                    </ul>
                </div>
          </div>
    </footer>
    <script src="js/funCitas3.js"> </script>
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