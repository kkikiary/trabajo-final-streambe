<?php
// Verificar si la extensión PDO está habilitada
if (defined('PDO::ATTR_DRIVER_NAME')) {
    echo "PDO está habilitado.";
} else {
    echo "PDO no está habilitado.";
}
?>
