<?php 
 if($_POST) {
 $validator = array('success' => false, 'message_create_documentos' => array());

 if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], '../../tienda/imagenes/' . basename($_FILES['archivo']['name']))) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}

$titulo = $_POST['titulo'];

$nombre = $_FILES['archivo']['name'];
$tipo = $_FILES['archivo']['type'];
$tamanio = $_FILES['archivo']['size'];
$ruta = $_FILES['archivo']['tmp_name'];
$destino = "archivos/" . $nombre;

$sql = "INSERT INTO productos (titulo,ruta) VALUES ('$titulo', '$destino')";
$query = $connect->query($sql);

if($query === TRUE) {
    $validator['success'] = true;
    $validator['message_create_documentos'] = "Agregado Exitosamente";
} else {
    $validator['success'] = false;
    $validator['message_create_documentos'] = "Error mientras agrega la información";
 }

$connect->close();
echo json_encode($validator);
}

?>