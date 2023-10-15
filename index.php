<?php
require_once 'config.php';
require_once 'funcoes.php'; // Certifique-se de que o caminho para o arquivo funcoes.php está correto

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);

    // Configuração adicional de segurança para o PDO
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Falha na conexão: " . $e->getMessage());
}

// Gerar uma senha segura
$novaSenha = gerarSenhaSegura();
$senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

echo "Nova senha gerada: $novaSenha<br>";
echo "Senha criptografada: $senhaHash";

// Resto do seu código...

// Exemplo de consulta usando PDO
$query = "SELECT * FROM sua_tabela";
$result = $conn->query($query);

if ($result) {
    foreach ($result as $row) {
        // Processar os resultados
    }
}

// Feche a conexão quando terminar
$conn = null;
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
