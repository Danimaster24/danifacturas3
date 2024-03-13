<?php
// Obtener datos del formulario
$nombreCliente = $_POST['nombreCliente'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$producto = $_POST['producto'];
$costoProducto = $_POST['costoProducto'];
$costoEnvio = $_POST['costoEnvio'];
$total = $_POST['total'];

// Crear contenido de la factura
$contenidoFactura = "Nombre del Cliente: $nombreCliente\n";
$contenidoFactura .= "Dirección: $direccion\n";
$contenidoFactura .= "Teléfono: $telefono\n";
$contenidoFactura .= "Producto: $producto\n";
$contenidoFactura .= "Costo del Producto: $costoProducto\n";
$contenidoFactura .= "Costo de Envío: $costoEnvio\n";
$contenidoFactura .= "Total: $total\n";

// Generar un nombre único para el archivo de factura
$nombreArchivo = 'factura_' . date('Y-m-d_H-i-s') . '.txt';

// Guardar la factura en un archivo
if (file_put_contents($nombreArchivo, $contenidoFactura)) {
    // Descargar el archivo de factura
    header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
    header('Content-Type: application/octet-stream');
    header('Content-Length: ' . filesize($nombreArchivo));
    readfile($nombreArchivo);
    // Eliminar el archivo después de descargarlo
    unlink($nombreArchivo);
    exit;
} else {
    echo "Error al generar la factura";
}
?>
