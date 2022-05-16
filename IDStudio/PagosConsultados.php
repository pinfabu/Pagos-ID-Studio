<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID STUDIO</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel=stylesheet href="http://localhost:81/IDStudio/css/estiloInicio.css">
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
              <a href="http://localhost:81/IDStudio/ConsultarLosPagos.php"> Modificar Citas </a> 
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

        <br><br>
<div class="mision">
<h2>  El pago correspondiente es el siguiente:  </h2><br>
<?php 
        $conexion = mysqli_connect("localhost", "root", "","id_studio");
        if (! $conexion) { dispError(); exit(); }

        # mysql_select_db('NE221', $db_cnx);    # nombre de la BD
        //mysql_select_db('idstudio', $conexion);
        //aqui se obtienen las variaables del get todos pueden ser tipo text
        $estilista=$_GET['estilistas'];
        $fechaI=$_GET['fechaI'];
        $fechaF=$_GET['fechaF'];
        $trabajadora=$_GET['trabajadora'];

        if($trabajadora=="estilista"){
            $resultEstilista=mysqli_query($conexion,"select ID_Estilista from Estilista where Nombre_Completo=\"$estilista\" ;");//obtenemos id
            $rowEstilista=mysqli_fetch_assoc($resultEstilista);
            $ID_Estilista=$rowEstilista["ID_Estilista"];
            echo "<h4> Estilista: ".$estilista."</h4>";
            echo "<h4> Trabajos realizados: </h4>";
            $ID_Cita=array();
            $Trabajo=array();
            $Precio=array();
            $Comision=array();
            $Fecha=array();
            $resultCita=mysqli_query($conexion,"select ID_Cita,Trabajo,Precio,Comision,Fecha from Cita where ID_Estilista=\"$ID_Estilista\" and (Fecha BETWEEN \"$fechaI\" AND \"$fechaF\");");//obtenemos id
            if(mysqli_num_rows($resultCita)>0){
                while($rowCita=mysqli_fetch_assoc($resultCita)){
                    array_push($ID_Cita,$rowCita["ID_Cita"]);
                    array_push($Trabajo,$rowCita["Trabajo"]);
                    array_push($Precio,$rowCita["Precio"]);
                    array_push($Comision,$rowCita["Comision"]);
                    array_push($Fecha,$rowCita["Fecha"]);
                }
            }else{  
                echo "<script>console.log('0 resultados')</script>";
            }
            for($i=0;$i<sizeof($Trabajo);$i++){
                echo "<br>Trabajo: ".$Trabajo[$i];
                echo "<br>Precio: $".$Precio[$i];
                echo "<br>Comision: $".$Comision[$i];
                echo "<br>Fecha: ".$Fecha[$i];
                echo "<br>ID_Cita: ".$ID_Cita[$i]."<br>";

            }
            $Semana_a_pagar=array();
            $Total_Comisiones=array();
            $Pago_Semanal=array();
            $Pago_Total=array();
            $resultPago=mysqli_query($conexion,"select Semana_a_pagar,Total_Comisiones,Pago_Semanal,Pago_Total from Pagos where ID_Estilista=\"$ID_Estilista\" and Primer_dia_semana='$fechaI' and Ultimo_dia_semana='$fechaF';");//obtenemos id
            if(mysqli_num_rows($resultPago)>0){
                while($rowCita=mysqli_fetch_assoc($resultPago)){
                    array_push($Semana_a_pagar,$rowCita["Semana_a_pagar"]);
                    array_push($Total_Comisiones,$rowCita["Total_Comisiones"]);
                    array_push($Pago_Semanal,$rowCita["Pago_Semanal"]);
                    array_push($Pago_Total,$rowCita["Pago_Total"]);
                }
            }else{  
                echo "<script>console.log('0 resultados')</script>";
            }
            echo "<br><h4> Pagos totales: </h4>";
            for($i=0;$i<sizeof($Semana_a_pagar);$i++){
                echo "<br>".$Semana_a_pagar[$i];
                echo "<br>Total Comisiones: $".$Total_Comisiones[$i];
                echo "<br>Pago Semanal: $".$Pago_Semanal[$i];
                echo "<br>Pago Total: $".$Pago_Total[$i]."<br>";
            }
        }
        else{
            $resultAuxiliar=mysqli_query($conexion,"select ID_Auxiliar from Auxiliar where Nombre_Completo=\"$estilista\" ;");//obtenemos id
            $rowAuxiliar=mysqli_fetch_assoc($resultAuxiliar);
            $ID_Auxiliar=$rowAuxiliar["ID_Auxiliar"];
            echo "<h4> Auxiliar: ".$estilista."</h4>";
            echo "<h4> Trabajos realizados: </h4>";
            $ID_Cita=array();
            $Trabajo=array();
            $Precio=array();
            $Comision=array();
            $Fecha=array();
            $resultCita=mysqli_query($conexion,"select ID_Cita,Trabajo,Precio,Comision,Fecha from Cita where ID_Auxiliar=\"$ID_Auxiliar\" and (Fecha BETWEEN \"$fechaI\" AND \"$fechaF\");");//obtenemos id
            if(mysqli_num_rows($resultCita)>0){
                while($rowCita=mysqli_fetch_assoc($resultCita)){
                    array_push($ID_Cita,$rowCita["ID_Cita"]);
                    array_push($Trabajo,$rowCita["Trabajo"]);
                    array_push($Precio,$rowCita["Precio"]);
                    array_push($Comision,$rowCita["Comision"]);
                    array_push($Fecha,$rowCita["Fecha"]);
                }
            }else{  
                echo "<script>console.log('0 resultados')</script>";
            }
            for($i=0;$i<sizeof($Trabajo);$i++){
                echo "<br>Trabajo: ".$Trabajo[$i];
                echo "<br>Precio: $".$Precio[$i];
                echo "<br>Comision: $".$Comision[$i];
                echo "<br>Fecha: ".$Fecha[$i];
                echo "<br>ID_Cita: ".$ID_Cita[$i]."<br>";
            }
            $Semana_a_pagar=array();
            $Total_Comisiones=array();
            $Pago_Semanal=array();
            $Pago_Total=array();
            $resultPago=mysqli_query($conexion,"select Semana_a_pagar,Total_Comisiones,Pago_Semanal,Pago_Total from Pagos where ID_Auxiliar=\"$ID_Auxiliar\" and Primer_dia_semana='$fechaI' and Ultimo_dia_semana='$fechaF';");//obtenemos id
            if(mysqli_num_rows($resultPago)>0){
                while($rowCita=mysqli_fetch_assoc($resultPago)){
                    array_push($Semana_a_pagar,$rowCita["Semana_a_pagar"]);
                    array_push($Total_Comisiones,$rowCita["Total_Comisiones"]);
                    array_push($Pago_Semanal,$rowCita["Pago_Semanal"]);
                    array_push($Pago_Total,$rowCita["Pago_Total"]);
                }
            }else{  
                echo "<script>console.log('0 resultados')</script>";
            }
            echo "<br><h4> Pagos totales: </h4>";
            for($i=0;$i<sizeof($Semana_a_pagar);$i++){
                echo "<br>".$Semana_a_pagar[$i];
                echo "<br>Total Comisiones: $".$Total_Comisiones[$i];
                echo "<br>Pago Semanal: $".$Pago_Semanal[$i];
                echo "<br>Pago Total: $".$Pago_Total[$i]."<br>";
            }
        }

?>
</div>
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

            <h1 style="font-family:Raleway;text-align:center;font-weight: bold;"><?php echo "".$trabajadora;?> a modificar:
            <div style="text-align:center;" id="div-centrador">
            <div id="div-lista-estilistas">
                <?php echo "".$estilista;?>
            </div></div></h1><br>
                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Añade los ID_Cita de las citas que deseas modificar</h1>
                <div style="text-align:center;" id="div-centrador">
                    <select name="citas" id="citasSelect" class="servicioSelect"  onmousedown="if(this.options.length>10){this.size=10;}" onchange='this.size=0;' onblur="this.size=0;" style="border-radius:5px;border-color:transparent;">
                        <option value="default">Selecciona el ID_Cita</option>

                            <?php for($i=0;$i<sizeof($ID_Cita);$i++){
                                        echo "<option value=".$ID_Cita[$i].">".$ID_Cita[$i]."</option>";
                            }   ?>
                        </optgroup>
                    </select>
                    <br>
                    <button type="button" id="add" class="btn" onclick="addElementCitas(event)">Añadir</button>
                    <div id="div-lista-citas">

                    </div>
                </div>

                <br>

                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Selecciona el nuevo servicio y añádelo</h1>
                <div style="text-align:center;" id="div-centrador">
                    <select name="servicio" id="servicioSelect" class="servicioSelect"  onmousedown="if(this.options.length>10){this.size=10;}" onchange='this.size=0;' onblur="this.size=0;" style="border-radius:5px;border-color:transparent;">
                        <option value="default">Selecciona un servicio</option>
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
                        <optgroup label="Peinado y maquillaje">
                            <option value="peinadoymaquillaje">Peinado y maquillaje</option>
                            <option value="maquillajecasual">Maquillaje casual</option>
                            <option value="peinadocasual">Peinado casual</option>
                            <option value="peinadostraightwave">Peinado Straight/Wave</option>
                            <option value="lavado">Lavado</option>
                        </optgroup>
                        <optgroup label="Cortes">
                            <option value="cortedama">Corte dama/niña</option>
                            <option value="cortecaballero">Corte caballero/niño</option>
                        </optgroup>
                        <optgroup label="Balayage/Babylights">
                            <option value="balayage">Balayage</option>
                        </optgroup>
                        <optgroup label="Nanoplastia">
                            <option value="nano">Nanoplastia</option>
                        </optgroup>
                        <optgroup label="Tratamientos">
                            <option value="ampolleta">Ampolleta</option>
                            <option value="olaplex">Tratamiento Olaplex</option>
                            <option value="hidratacionintensiva">Tratamieno hidratación intensiva</option>
                            <option value="avyna">Avyna</option>
                        </optgroup>
                        <optgroup label="Tintes">
                            <option value="tinte">Tinte</option>
                        </optgroup>
                        <optgroup label="Matiz">
                            <option value="matiz">Matiz</option>
                        </optgroup>
                        <optgroup label="Global">
                            <option value="global">Global</option>
                        </optgroup>
                    </select>
                    <br>
                    <button type="button" id="add" class="btn" onclick="addElementServicios(event)">Añadir</button>
                    <div id="div-lista-servicios">

                    </div>
                </div>

                <br>

                <h1 style="font-family:Raleway;text-align:center;font-weight: bold;">Selecciona el nuevo precio y añádelo</h1>            
                <div style="text-align:center;" id="div-centrador">
                    <select name="precio" id="precioSelect" class="precioSelect"  onmousedown="if(this.options.length>10){this.size=10;}" onchange='this.size=0;' onblur="this.size=0;" style="border-radius:5px;border-color:transparent;">
                        <option value="default">Selecciona el precio correspondiente</option>
                        <optgroup label="Precios">
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                            <option value="400">400</option>
                            <option value="500">500</option>
                            <option value="600">600</option>
                            <option value="700">700</option>
                            <option value="800">800</option>
                            <option value="900">900</option>
                            <option value="1000">1000</option>
                            <option value="1100">1100</option>
                            <option value="1200">1200</option>
                            <option value="1300">1300</option>
                            <option value="1400">1400</option>
                            <option value="1500">1500</option>
                            <option value="1600">1600</option>
                            <option value="1700">1700</option>
                            <option value="1800">1800</option>
                            <option value="1900">1900</option>
                            <option value="2000">2000</option>
                            <option value="2100">2100</option>
                            <option value="2200">2200</option>
                            <option value="2300">2300</option>
                            <option value="2400">2400</option>
                            <option value="2500">2500</option>
                            <option value="2600">2600</option>
                            <option value="270">2700</option>
                            <option value="2800">2800</option>
                            <option value="2900">2900</option>
                            <option value="3000">3000</option>
                            <option value="3100">3100</option>
                            <option value="3200">3200</option>
                            <option value="3300">3300</option>
                            <option value="3400">3400</option>
                            <option value="3500">3500</option>
                            <option value="3600">3600</option>
                            <option value="3700">3700</option>
                            <option value="3800">3800</option>
                            <option value="3900">3900</option>
                        </optgroup>
                    </select>
                    <br>
                    <button type="button" id="add" class="btn" onclick="addElementPrecios(event)">Añadir</button>
                    <div id="div-lista-precios">

                    </div>
                </div>

            </div>
                <br>
            <!--PASO2:Elegir dia de cita-->
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
            <!--PASO3:Elegir dia trabajado-->
            <div id="div-paso3" class="tab">
                
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
    <script src="http://localhost:81/IDStudio/js/funCitas5.js"> </script>
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