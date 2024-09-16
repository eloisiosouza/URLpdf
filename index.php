<?php
// Diretório onde os arquivos serão armazenados
$target_dir = "uploads/";

// Verifica se o diretório existe, se não, cria
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

// Caminho completo do arquivo a ser salvo
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica se é um arquivo PDF
if ($fileType != "pdf") {
    echo "Somente arquivos PDF são permitidos.";
    $uploadOk = 0;
}

// Tenta fazer o upload do arquivo se não houver erro
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // Exibe o link para acessar o arquivo PDF
        echo "O arquivo ". basename($_FILES["file"]["name"]). " foi enviado com sucesso.<br>";
        echo "Acesse o PDF <a href='" . $target_file . "' target='_blank'>aqui</a>.";
    } else {
        echo "Ocorreu um erro ao fazer o upload do arquivo.";
    }
}
?>
