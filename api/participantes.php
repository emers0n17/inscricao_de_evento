<?php
// Substitua estas variáveis pelos detalhes do seu banco de dados
$servername = "localhost";
$username = "root";
$password = "entrar";
$dbname = "Inscritos";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  // Prepara e executa a declaração SQL para inserir os dados do usuário
  $stmt = $conn->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $phone);

  if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Novo registro criado com sucesso']);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao criar registro']);
  }

  $stmt->close();
}

$conn->close();
?>
