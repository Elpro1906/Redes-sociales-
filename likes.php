<?php
// Ruta al archivo que almacena el número de likes
$likeFile = 'likes.txt';

// Verificar si el archivo existe, si no, crearlo con 0 likes
if (!file_exists($likeFile)) {
    file_put_contents($likeFile, 0);
}

// Leer el número actual de likes desde el archivo
$likes = (int)file_get_contents($likeFile);

// Si la solicitud es de tipo POST, incrementamos los likes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $likes++;
    file_put_contents($likeFile, $likes); // Guardar el nuevo número de likes en el archivo
}

// Devolver el número de likes como JSON
header('Content-Type: application/json');
echo json_encode(['likes' => $likes]);
