<?php
// Verifica se o arquivo foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['pdfFile'])) {
    // Caminho para o diretório onde o PDF será armazenado
    $uploadDir = 'pdfs/';
    $uploadFile = $uploadDir . 'nota_atual.pdf'; // Nome fixo do arquivo

    // Move o arquivo enviado para o diretório de upload
    if (move_uploaded_file($_FILES['pdfFile']['tmp_name'], $uploadFile)) {
        echo "Arquivo enviado com sucesso!";
    } else {
        echo "Erro ao enviar o arquivo.";
    }
} else {
    echo "Nenhum arquivo enviado.";
}
?>