<?php

$conn = mysqli_connect('localhost', 'root', '', 'crud');
header('Access-Control-Allow-Origin: *'); // Replace * with the appropriate origin in a production environment
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
?>