<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="layout/styles/layout.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento</title>
    <link rel="shortcut icon" href="images/demo/balanca png.png" />
    <!-- REFERENCIAS PARA O BOOTSTRAP FUNCIONAR --> 

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>
<body>
<?php
  include 'cabecalho.php';
?>
<div class="wrapper row3">
<h1>Faça seu Orçamento</h1>
    <form method="post" action="orcamento.php">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br><br>
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" id="nome_completo" name="nome_completo" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>
        <label for="turno_contato">Turno para Contato:</label>
        <select id="turno_contato" name="turno_contato">
            <option value="Manhã">Manhã</option>
            <option value="Tarde">Tarde</option>
            <option value="Noite">Noite</option>
        </select><br><br>
        <label for="vara_processual">Vara Processual:</label>
        <input type="text" id="vara_processual" name="vara_processual"><br><br>

        <label for="descricao_processo">Descrição do Processo:</label>
        <textarea id="descricao_processo" name="descricao_processo"></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</div>
<?php
  
  $servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "advocacia"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $cpf = $_POST['cpf'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $turno_contato = $_POST['turno_contato'];
    $vara_processual = $_POST['vara_processual'];
    $descricao_processo = $_POST['descricao_processo'];

    $sql = "INSERT INTO orcamento (cpf, nome_completo, email, telefone, turno_contato, vara_processual, descricao_processo)
            VALUES ('$cpf', '$nome_completo', '$email', '$telefone', '$turno_contato', '$vara_processual', '$descricao_processo')";

    if ($conn->query($sql) === TRUE) {
        echo "Orçamento inserido com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

include 'rodape.php';
?>
</body>
</html>