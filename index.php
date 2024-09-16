<?php
// Configuração do diretório onde os arquivos serão armazenados
$uploadDir = 'C:\uploads';
$uploadFile = $uploadDir . basename($_FILES['file']['name']);

// Verifica se o diretório existe, se não, cria-o
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Verifica se o arquivo foi enviado com sucesso
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
    // Gera a URL pública do arquivo
    $fileUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/' . $uploadFile;

    // Retorna a URL do arquivo em formato JSON
    echo json_encode(['fileUrl' => $fileUrl]);
} else {
    // Retorna um erro se o upload falhar
    http_response_code(500);
    echo json_encode(['error' => 'Falha no upload do arquivo.']);
}
?>
