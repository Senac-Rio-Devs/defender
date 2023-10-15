<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "seuserver";
$username = "seuusuario";
$password = "suasenha";
$dbname = "meubanco";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processamento do formulário de cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Use funções de hash para armazenar senhas de forma segura
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    $sql = "INSERT INTO usuarios (nome, email, senha, cpf, endereco, telefone) VALUES ('$nome', '$email', '$senha', '$cpf', '$endereco', '$telefone')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso.";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #888888;
        }
        h2 {
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form method="post" action="">
            Nome: <input type="text" name="nome"><br>
            Email: <input type="text" name="email"><br>
            Senha: <input type="password" name="senha"><br>
            CPF: <input type="text" name="cpf"><br>
            Endereço: <input type="text" name="endereco"><br>
            Telefone: <input type="text" name="telefone"><br>
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
