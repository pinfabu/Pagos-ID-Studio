<html lang="es">
    <head>
        <title>ID STUDIO</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel=stylesheet href="http://localhost:81/IDStudio/css/estiloInicio.css">
        <link rel=stylesheet href="http://localhost:81/IDStudio/css/all.css"><!--Estilo para los símbolos de las redes sociales-->
        <link rel="stylesheet" href="http://localhost:81/IDStudio/css/navbar.css"><!--Estilo para el  menu del header-->
        <link rel="stylesheet" href="http://localhost:81/IDStudio/css/footer.css"><!--Estilo para el footer general-->
        <link rel="stylesheet" href="http://localhost:81/IDStudio/css/estilos.css"><!--Estilo para la galería de imágenes-->
        <link rel="stylesheet" href="http://localhost:81/IDStudio/css/general.css"><!--Estilo Formato general de la página-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,200&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
        <script src="http://localhost:81/IDStudio/js/modernizr.js" type="text/javascript"></script>
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
        $workDays=$_GET['workdays'];
        $fechaI=$_GET['fechaI'];
        $fechaF=$_GET['fechaF'];
        $trabajadora=$_GET['trabajadora'];

        if($trabajadora=="estilista"){
            $resultEstilista=mysqli_query($conexion,"select ID_Estilista from Estilista where Nombre_Completo=\"$estilista\" ;");//obtenemos id
            $rowEstilista=mysqli_fetch_assoc($resultEstilista);
            $ID_Estilista=$rowEstilista["ID_Estilista"];
            echo "<h4> Estilista: ".$estilista."</h4>";
            $Pago_semanal=$workDays*250;
            $ComisionesTotales=array();
            $ComisionesObtenidas=mysqli_query($conexion,"select Comision from Cita where ID_Estilista=\"$ID_Estilista\" and (Fecha BETWEEN \"$fechaI\" AND \"$fechaF\");");//obtenemos id
            if(mysqli_num_rows($ComisionesObtenidas)>0){
                while($rowComisiones=mysqli_fetch_assoc($ComisionesObtenidas)){
                    array_push($ComisionesTotales,$rowComisiones["Comision"]);
                }
            }else{  
                echo "<script>console.log('0 resultados')</script>";
            }
            $Total_Comisiones=0;
            echo "Comisiones a pagar: ";
            for($i=0;$i<sizeof($ComisionesTotales);$i++){
                echo "".$ComisionesTotales[$i].", ";
                $Total_Comisiones+=$ComisionesTotales[$i];
            }
            echo "<br>Total de comisiones a pagar: $".$Total_Comisiones;
            echo "<br>Pago semanal a pagar: $".$Pago_semanal;
            $Pago_total=$Total_Comisiones+$Pago_semanal;
            echo "<br><br><h4>Pago total a pagar: $".$Pago_total."</h4>";
            echo "<h4>Correspondiente a la semana del día: ".$fechaI." al día ".$fechaF."</h4>";
            mysqli_query($conexion,"insert into Pagos values(null,$ID_Estilista,null,'Semana de: $fechaI a $fechaF',$Total_Comisiones,$Pago_semanal,$Pago_total,\"$fechaI\",\"$fechaF\");");//INSERT en servicio_cita
            $resultID_Pago=mysqli_query($conexion,"select ID_Pago from Pagos where ID_Estilista=\"$ID_Estilista\" and Primer_dia_semana='$fechaI' and Ultimo_dia_semana='$fechaF';");//obtenemos id
            $rowID_Pago=mysqli_fetch_assoc($resultID_Pago);
            $ID_Pago=$rowID_Pago["ID_Pago"];
            //echo "<br>ID_Pago: ".$ID_Pago;
    
            $ID_Cita=array();
            $resultID_Cita=mysqli_query($conexion,"select ID_Cita from Cita where ID_Estilista=\"$ID_Estilista\" and (Fecha BETWEEN \"$fechaI\" AND \"$fechaF\");");//obtenemos id
            if(mysqli_num_rows($resultID_Cita)>0){
                while($rowID_Cita=mysqli_fetch_assoc($resultID_Cita)){
                    array_push($ID_Cita,$rowID_Cita["ID_Cita"]);
                }
            }else{  
                echo "<script>console.log('0 resultados')</script>";
            }
            for($i=0;$i<sizeof($ID_Cita);$i++){
                //echo "<br>ID_Cita: ".$ID_Cita[$i];
                mysqli_query($conexion,"update cita set ID_Pago= $ID_Pago where cita.ID_Cita=$ID_Cita[$i];");//obtenemos id
            }
        }
        else{
            $result=mysqli_query($conexion,"select ID_Auxiliar from Auxiliar where Nombre_Completo=\"$estilista\" ;");//obtenemos id
            $row=mysqli_fetch_assoc($result);
            $ID_Auxiliar=$row["ID_Auxiliar"];
            echo "<h4> Auxiliar: ".$estilista."</h4>";
            $Pago_semanal=$workDays*200;
            echo "Pago Semanal: ".$Pago_semanal."<br>";
            $ComisionesTotales=array();
            $ComisionesObtenidas=mysqli_query($conexion,"select Comision from Cita where ID_Auxiliar=\"$ID_Auxiliar\" and (Fecha BETWEEN \"$fechaI\" AND \"$fechaF\");");//obtenemos id
            if(mysqli_num_rows($ComisionesObtenidas)>0){
                while($rowComisiones=mysqli_fetch_assoc($ComisionesObtenidas)){
                    array_push($ComisionesTotales,$rowComisiones["Comision"]);
                }
            }else{  
                echo "<script>console.log('0 resultados')</script>";
            }
            $Total_Comisiones=0;
            echo "Comisiones a pagar: ";
            for($i=0;$i<sizeof($ComisionesTotales);$i++){
                echo "".$ComisionesTotales[$i].", ";
                $Total_Comisiones+=$ComisionesTotales[$i];
            }
            echo "<br>Total de comisiones a pagar: $".$Total_Comisiones;
            echo "<br>Pago semanal a pagar: $".$Pago_semanal;
            $Pago_total=$Total_Comisiones+$Pago_semanal;
            echo "<br><br><h4>Pago total a pagar: $".$Pago_total."</h4>";
            echo "<h4>Correspondiente a la semana del día: ".$fechaI." al día ".$fechaF."</h4>";
            mysqli_query($conexion,"insert into Pagos values(null,null,$ID_Auxiliar,'Semana de: $fechaI a $fechaF',$Total_Comisiones,$Pago_semanal,$Pago_total,\"$fechaI\",\"$fechaF\");");//INSERT en servicio_cita
            $resultID_Pago=mysqli_query($conexion,"select ID_Pago from Pagos where ID_Auxiliar=\"$ID_Auxiliar\" and Primer_dia_semana='$fechaI' and Ultimo_dia_semana='$fechaF';");//obtenemos id
            $rowID_Pago=mysqli_fetch_assoc($resultID_Pago);
            $ID_Pago=$rowID_Pago["ID_Pago"];
            //echo "<br>ID_Pago: ".$ID_Pago;
    
            $ID_Cita=array();
            $resultID_Cita=mysqli_query($conexion,"select ID_Cita from Cita where ID_Auxiliar=\"$ID_Auxiliar\" and (Fecha BETWEEN \"$fechaI\" AND \"$fechaF\");");//obtenemos id
            if(mysqli_num_rows($resultID_Cita)>0){
                while($rowID_Cita=mysqli_fetch_assoc($resultID_Cita)){
                    array_push($ID_Cita,$rowID_Cita["ID_Cita"]);
                }
            }else{  
                echo "<script>console.log('0 resultados')</script>";
            }
            for($i=0;$i<sizeof($ID_Cita);$i++){
                //echo "<br>ID_Cita: ".$ID_Cita[$i];
                mysqli_query($conexion,"update cita set ID_Pago= $ID_Pago where cita.ID_Cita=$ID_Cita[$i];");//obtenemos id
            }
        }

    ?>
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
    </body>
</html>