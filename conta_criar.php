<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="layout/styles/layout.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crie sua conta</title>
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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advocacia";


$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
  ?>
  
  <div class="wrapper row3">
<form action="conta_criar.php" method="post">
  <label for="numero_oab">Número OAB:</label>
  <input type="text" id="numero_oab" name="numero_oab"><br><br>
  <label for="nome_completo">Nome Completo:</label>
  <input type="text" id="nome_completo" name="nome_completo"><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="cpf">CPF:</label>
  <input type="text" id="cpf" name="cpf"><br><br>
  <input type="submit" value="Criar Conta">
  <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $numero_oab = $_POST['numero_oab'];
  $nome_completo = $_POST['nome_completo'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];

  $sql_check = "SELECT * FROM conta WHERE numero_oab = '$numero_oab'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "Erro: O número OAB já está cadastrado!";
    } else {
        $sql = "INSERT INTO conta (numero_oab, nome_completo, email, cpf) 
                VALUES ('$numero_oab', '$nome_completo', '$email', '$cpf')";

        if ($conn->query($sql) === TRUE) {
            echo "Conta inserida com sucesso!";
        } else {
            echo "Erro ao inserir registro: " . $conn->error;
        }
      }
    }
     

    ?>

    <?php
    include 'rodape.php';
    ?>
</form>
</body>
</html>