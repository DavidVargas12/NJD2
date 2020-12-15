<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//1. Establecemos la conexion:
$conexion = new mysqli("localhost", "root", "", "tienda");

//2. Comprobamos la conexion:

if ($conexion->connect_errno) {
    exit("***ERROR: $mysqli->connect_errno");
}
$conexion->set_charset('utf8');


/* @var $GET type */
$idProducto = $GET['idproducto'];
$edit = "SELECT * FROM productos WHERE id_producto ='$idProducto'";


$resultado_edit = mysqli_query($conexion, $edit);


mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Editar</title>
        <style>
            body {
                background-image: url();
                background-repeat: no-repeat;
               
            }

            .titulo {
                text-align: center;
                font-family: "Times New Roman";
            }

            .panel{
                width: 100%;
                height: 20%;
                background-color: #212121;
                color: white;
            }

            .cuadros {
                width: 60%;
                height: 22em;
                margin: auto;
                background-color: #4B515D;
            }

            .cuadro1 {
                width: 50%;
                height: 22em;
                float: left;
            }

            .cuadro2 {
                width: 50%;
                height: auto;
                float: left;
            }


            .imagenes > img {
                width: 100%;
                height: auto;
                border-radius: 8px 8px 8px;
            }

            .guardar {
                float: right;
                width: 100%;
            }

            .cambiar {
                float: left;
                width: 100%;
            }

            .descripcion {
                overflow: scroll;
                height: 100px;
            }



        </style>
        <script>
            window.onload = function () {

                let childs = document.getElementById("wrapper").childNodes;
                for (let k in childs) {
                    if (childs[k].nodeType === Node.ELEMENT_NODE && childs[k].firstElementChild.tagName == 'A')
                        addEvent("dblclick", childs[k], setInput);
                }
            }

            function setInput() {
                this.innerHTML = `<input type="text" value="${this.firstElementChild.innerHTML}">`;
            }

            function addEvent(eventtype, element, callback) {
                element.addEventListener(eventtype, callback);
            }

        </script>
    </head>
    <body>
        <div class="panel">
            <h2 class="titulo">Edita tus productos</h2>
            <h4><a href="clothes.php">Volver</a></h4>
        </div>

        <br>
        <br>

        <?php while ($fila = $resultado_edit->fetch_assoc()): ?>
            <?php
            $nombreProducto = $fila['nombre'];
            $descripcionProducto = $fila['descripcion'];
            $categoriaProducto = $fila['categoria'];
            $precioProducto = $fila['precio'];
            ?>

            <div class="cuadros">
                <div class="cuadro1 imagenes"><img  src=<?= "imagenes/descargas" . $idProducto . ".jpg" ?> alt="...">
                    <input type="submit" class="btn btn-warning cambiar" value="Cambiar imagen"></div>
                <div class="cuadro2">
                    <div class="list-group listas" id="wrapper">
                        <div><a href="#" class="list-group-item list-group-item-action active">Información del producto</a></div>
                        <div><a href="#" class="list-group-item list-group-item-action" id="name"><strong>Nombre:</strong> <?= $nombreProducto ?></a></div>
                        <div><a href="#" class="list-group-item list-group-item-action descripcion"><strong>Descripción:</strong> <?= $descripcionProducto ?></a></div>
                        <div><a href="#" class="list-group-item list-group-item-action"><strong>Categoria:</strong> <?= $categoriaProducto ?> </a></div>
                        <div><a href="#" class="list-group-item list-group-item-action"><strong>Precio:</strong> <?= $precioProducto ?> </a></div>
                        <input type="submit" class="btn btn-success guardar" value="Guardar">
                    </div>
                </div>
            </div>


        <?php
        endwhile;
        $resultado_edit->free();
        ?>
    </body>
</html>