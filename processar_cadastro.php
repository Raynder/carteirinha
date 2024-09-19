<?php
include('conn.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura dos dados do formulário
    $nome = $_POST['nome'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $curso = isset($_POST['curso']) ? $_POST['curso'] : null;
    $modalidade = isset($_POST['modalidade']) ? $_POST['modalidade'] : null;

    // Processamento do upload da imagem
    $target_dir = "users/"; // Diretório onde a imagem será armazenada
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Verifica se o arquivo de imagem é válido
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check !== false) {
            echo "Arquivo é uma imagem - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }
    }

    // Verifica se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    // Verifica o tamanho máximo do arquivo (5MB)
    if ($_FILES["img"]["size"] > 5000000) {
        echo "Desculpe, seu arquivo é muito grande.";
        $uploadOk = 0;
    }

    // Permitir apenas determinados formatos de arquivo
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG são permitidos.";
        $uploadOk = 0;
    }

    // Se $uploadOk estiver configurado como 0, ocorreu um erro
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi enviado.";
    // Se tudo estiver correto, tenta fazer o upload do arquivo
    } else {
        $temp = explode(".", $_FILES["img"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);

        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_dir . $newfilename)) {
            echo "O arquivo ". htmlspecialchars( basename( $_FILES["img"]["name"])). " foi enviado com sucesso.";
        } else {
            echo "Desculpe, houve um problema ao enviar seu arquivo.";
        }
    }

    // Insere os dados no banco de dados
    $img_path = $target_dir . $newfilename; // Caminho completo para a imagem no servidor

    $sql = "INSERT INTO users (nome, user, pass, img, curso, modalidade)
            VALUES ('$nome', '$user', '$pass', '$img_path', '$curso', '$modalidade')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        header("Location: cadastro.php");
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
