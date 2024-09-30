<?php
// Ruta al archivo que almacena el número de likes
$likeFile = 'likes.txt';

// Verificar si el archivo existe, si no, crearlo con 0 likes
if (!file_exists($likeFile)) {
    file_put_contents($likeFile, 0);
}

// Leer el número actual de likes desde el archivo
$likes = (int)file_get_contents($likeFile);

// Manejar la solicitud POST para agregar o quitar likes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data['action'] === 'add') {
        $likes++; // Agregar like
    } elseif ($data['action'] === 'remove') {
        $likes--; // Quitar like
        if ($likes < 0) $likes = 0; // Evitar que los likes sean negativos
    }
    // Guardar el nuevo número de likes en el archivo
    file_put_contents($likeFile, $likes);
}

// Devolver el número de likes como JSON
header('Content-Type: application/json');
echo json_encode(['likes' => $likes]);
