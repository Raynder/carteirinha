<?php
session_start(); // Inicia a sessão

include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Consulta SQL para verificar o usuário e senha
    $sql = "SELECT * FROM users WHERE user='$user' AND pass='$pass'";
    $result = $conn->query($sql);

    // Verifica se encontrou algum registro
    if ($result->num_rows > 0) {
        // Obtém os dados do usuário
        $row = $result->fetch_assoc();

        // Define as variáveis de sessão com os dados do usuário
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_nome'] = $row['nome'];
        $_SESSION['user_user'] = $row['user'];
        $_SESSION['user_img'] = $row['img'];
        $_SESSION['user_curso'] = $row['curso'];
        $_SESSION['user_modalidade'] = $row['modalidade'];

        // Redireciona para a página de dashboard ou qualquer outra página desejada
        header("Location: dashboard.php");
        exit();
    } else {
        // Usuário não encontrado ou senha incorreta
        // Redireciona de volta para a página de login com mensagem de erro
        header("Location: login.php");
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
