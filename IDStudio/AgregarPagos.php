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
<h2>  Se agregaron los siguientes valores: </h2>
    <?php 
        $conexion = mysqli_connect("localhost", "root", "","id_studio");
        if (! $conexion) { dispError(); exit(); }

        # mysql_select_db('NE221', $db_cnx);    # nombre de la BD
        //mysql_select_db('idstudio', $conexion);
        //aqui se obtienen las variaables del get todos pueden ser tipo text
        $estilistas=$_GET['estilistas'];
        $trabajos=$_GET['trabajos'];
        $precios=$_GET['precios'];
        $fechas=$_GET['fechas'];
        $comisiones=$_GET['comisiones'];
        $trabajadora=$_GET['trabajadora'];

        //envio a DB
        //echo /*$servicios.*/;
        $estilista=explode("-",$estilistas);
        $jobes=explode("-",$trabajos);
        $prices=explode("-",$precios);
        $commission=explode("-",$comisiones);
        $fechas_sin_formato=explode("-",$fechas);
        $fecha_correcta= array();
        if($trabajadora=="estilista"){
        //echo "Estilista;".$estilista[0];        
        $result=mysqli_query($conexion,"select ID_Estilista from Estilista where Nombre_Completo=\"$estilista[0]\" ;");//obtenemos id
        $row=mysqli_fetch_assoc($result);
        echo "<br><h4> Estilista: ".$estilista[0]."<h4>";
        $ID_Estilista=$row["ID_Estilista"];
        for($i=2;$i<sizeof($fechas_sin_formato);$i+=3){
            $fecha_auxiliar_year=$fechas_sin_formato[$i-2];
            $fecha_auxiliar_month=$fechas_sin_formato[$i-1];
            $fecha_auxiliar_day=$fechas_sin_formato[$i];
            array_push($fecha_correcta,"$fecha_auxiliar_year-$fecha_auxiliar_month-$fecha_auxiliar_day" );
        }
        
        for($i=0;$i<sizeof($commission)-1;$i++){
            mysqli_query($conexion,"insert into Cita values(null,$ID_Estilista,null,null,\"$jobes[$i]\",\"$prices[$i]\",\"$commission[$i]\",\"$fecha_correcta[$i]\");");//INSERT en cita
        }
        $total=0;
        echo "<h4>Servicios Solicitados: </h4>";
        for($i=0;$i<sizeof($commission)-1;$i++){
            echo "<br>".$jobes[$i]." - $".$commission[$i]." del día: ".$fecha_correcta[$i].", ";
            $total+=intval($commission[$i]);
        }
        echo "<h4><br>Total a pagar: $".$total."</h4>";
        echo "<h2><br><br>Vaya a Agregar Pagos para relacionarlos con el pago semanal<h2>";
        }
        else{  
        $result=mysqli_query($conexion,"select ID_Auxiliar from Auxiliar where Nombre_Completo=\"$estilista[0]\" ;");//obtenemos id
        $row=mysqli_fetch_assoc($result);
        echo "<br><h4> Auxiliar: ".$estilista[0]."<h4>";
        $ID_Auxiliar=$row["ID_Auxiliar"];
        for($i=2;$i<sizeof($fechas_sin_formato);$i+=3){
            $fecha_auxiliar_year=$fechas_sin_formato[$i-2];
            $fecha_auxiliar_month=$fechas_sin_formato[$i-1];
            $fecha_auxiliar_day=$fechas_sin_formato[$i];
            array_push($fecha_correcta,"$fecha_auxiliar_year-$fecha_auxiliar_month-$fecha_auxiliar_day" );
        }
        
        for($i=0;$i<sizeof($commission)-1;$i++){
            mysqli_query($conexion,"insert into Cita values(null,null,null,$ID_Auxiliar,\"$jobes[$i]\",\"$prices[$i]\",\"$commission[$i]\",\"$fecha_correcta[$i]\");");//INSERT en cita
        }
        $total=0;
        echo "<h4>Servicios Solicitados: </h4>";
        for($i=0;$i<sizeof($commission)-1;$i++){
            echo "<br>".$jobes[$i]." - $".$commission[$i]." del día: ".$fecha_correcta[$i].", ";
            $total+=intval($commission[$i]);
        }
        echo "<h4><br>Total a pagar: $".$total."</h4>";
        echo "<h2><br><br>Vaya a Agregar Pagos para relacionarlos con el pago semanal<h2>";
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