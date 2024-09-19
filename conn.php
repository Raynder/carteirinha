<?php

// Configurações de conexão com o banco de dados
$hostname = 'localhost';  // Host do banco de dados
$username = 'root'; // Usuário do banco de dados
$password = ''; // Senha do banco de dados
$database = 'ifg'; // Nome do banco de dados

// Conexão com o banco de dados MySQL
$conn = new mysqli($hostname, $username, $password, $database);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$sql = "SHOW TABLES LIKE 'users'";
$result = $conn->query($sql);

// Se a tabela 'users' não existe, cria ela
if ($result->num_rows == 0) {
    $create_table_sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        user VARCHAR(50) NOT NULL,
        pass VARCHAR(255) NOT NULL,
        img VARCHAR(255) NOT NULL,
        curso VARCHAR(100),
        modalidade VARCHAR(50)
    )";

    if ($conn->query($create_table_sql) === TRUE) {
        echo "Tabela 'users' criada com sucesso!";
    } else {
        echo "Erro ao criar tabela: " . $conn->error;
    }
} else {
    echo "A tabela 'users' já existe no banco de dados.";
}

?>