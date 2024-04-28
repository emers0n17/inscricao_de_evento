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

// Consulta para buscar todos os usuários cadastrados
$sql = "SELECT name, email, phone FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Saída de dados de cada linha
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td></tr>";
  }
} else {
  echo "0 resultados";
}
$conn->close();
?>
