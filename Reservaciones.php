<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "tienda";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

if (!$enlace) {

    echo "Error de conexion";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>NJD2-Reservas</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
        <div class="contenedor">
            <form action="" class="formulario" id="formulario" name="tienda" method="POST">
                <div class="contenedor-inputs">
                    <input type="text" name="Nombre" placeholder="Nombre">
                    <br/>
                    <input type="text" name="Telefono" placeholder="Telefono">
                    <br/>
                    <input type="text" name="Correo" placeholder="Correo">
                    <br/>
                    <input type="date" name="Fecha_reserva" placeholder="Fecha de la reserva">
                    <br/>
                    <input type="text" name="Num_personas" placeholder="Numero de personas">
                    <br/>
                   





                  

                    <ul class="error" id="error"></ul>
                </div>

                <input type="submit" class="btn" name="reservaciones" value="Reservar">
                <li class="active"><a href="inicio2.php">Volver</a></li>
            </form>
            <div class="tabla">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Fecha de reserva</th> 
                        <th>Numero de personas</th>   
                        <th></th>

                    </tr>
            
<?php
$consulta = "SELECT * FROM reservaciones";
$ejecutarConsulta = mysqli_query($enlace, $consulta);
$verFilas = mysqli_num_rows($ejecutarConsulta);
$fila = mysqli_fetch_array($ejecutarConsulta);

if (!$ejecutarConsulta) {

    echo"Error en la consulta";
} else {
    if ($verFilas < 1) {

        echo"<tr><td>No se encontraron registros</td></tr>";
    } else {

        for ($i = 0; $i <= $fila; $i++) {

            echo' 
                            <tr>
                                <td>' . $fila[5] . '</td>
                                <td>' . $fila[0] . '</td>
                                <td>' . $fila[1] . '</td>
                                <td>' . $fila[2] . '</td>
                                <td>' . $fila[3] . '</td>
                                <td>' . $fila[4] . '</td>
                               
                                
                                
                                
                            
                            </tr>
                        
                        ';
            $fila = mysqli_fetch_array($ejecutarConsulta);
        }
    }
}
?>





                </table>
            </div>
        </div>
        
    </body>
</html>

<?php
/* @var $_POST type */
if (isset($_POST['reservaciones'])) {

    $Nombre = $_POST["Nombre"];
    $Telefono = $_POST["Telefono"];
    $Correo = $_POST["Correo"];
    $Fecha_reserva = $_POST["Fecha_reserva"];
    $Num_personas = $_POST["Num_personas"];
    $id = rand(100, 10000);

    $insertarDatos = "INSERT INTO reservaciones VALUES ('$Nombre','$Telefono','$Correo','$Fecha_reserva','$Num_personas','$id')";


    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

    if (!$ejecutarInsertar) {

        echo"Error en la linea sql";
    }
}
?>