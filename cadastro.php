<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Usuário com Imagem</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .container {
        width: 400px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    form {
        display: flex;
        flex-direction: column;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }
    input[type="text"],
    input[type="password"],
    input[type="file"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
        width: calc(100% - 22px); /* Ajuste para o padding */
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    p{
        color: black;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Cadastro de Usuário com Imagem</h2>
    <form action="processar_cadastro.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="user">Usuário:</label>
            <input type="text" id="user" name="user" required>
        </div>
        <div class="form-group">
            <label for="pass">Senha:</label>
            <input type="password" id="pass" name="pass" required>
        </div>
        <div class="form-group">
            <label for="img">Imagem (somente arquivos JPG, JPEG, PNG):</label>
            <input type="file" id="img" name="img" accept="image/jpeg, image/png" required>
        </div>
        <div class="form-group">
            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso">
        </div>
        <div class="form-group">
            <label for="modalidade">Modalidade:</label>
            <input type="text" id="modalidade" name="modalidade">
        </div>
        <div class="form-group">
            <input type="submit" value="Cadastrar">
        </div>
    </form>
</div>
</body>
</html>
